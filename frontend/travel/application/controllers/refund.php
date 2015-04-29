<?php

class refund extends RS_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('refund_model');
    }
    
    public function index(){
        $this->load->model('agent_model');
        $header['scripts'] = array(
            
        );
        $header['external_scripts'] = array();
        
        $idagent = $this->session->userdata('agentid');
        
        $result = $this->agent_model->ismasteragent($idagent);
        $where = "agentid = ".$idagent;
        if($result){
            $where = "";
        }
        
        
        $data['ismaster'] = $result;
        
        
        $data['refunds'] = $this->refund_model->getlist(0,10,$where);
        $this->load->view('refund/listrefund',$data);
        $this->load->view('templates/footer',$header);
    }
    
    public function simpan(){
        $idrefund = $this->input->post('idrefund');
        
        $data['nilairefund'] = $this->input->post('nilairefund');
        $data['agentid'] = $this->session->userdata('agentid');
        $data['idticketing_detail'] = $this->input->post('kodebooking');
        $data['tanggalrequest'] = time();
        $data['createdby'] = $this->session->userdata('username');
        $status = "REQUEST";
        if($idrefund != null && $idrefund != ""){
            $status = $this->input->post('status');
            $data['status'] = $status;
            if($status == 'SUBMIT'){
                $data['submitby'] = $this->session->userdata('username');
                $data['tanggalsubmit'] = time();
            }else if($status == "APPROVED"){
                $data['approvedby'] = $this->session->userdata('username');
                $data['tanggalapprove'] = time();
            }
            $result = $this->refund_model->edit($data,$idrefund);
            if($status == 'APPROVED' && $result['status'] == 1){
            //    $data['agentid'] = $this->input->post('idagent');
                //$this->transaksirefund($data,$result);
            }
        }else
        {
            $data['agentid'] = $this->session->userdata('agentid');
            $result = $this->refund_model->add($data,$this->session->userdata('username'),$data['agentid']);
        }
        
        redirect(base_url().'index.php/refund');
    }
    
    
    
    function transaksirefund($data,$result){
        $this->load->model('transaksi_model');
        $this->load->model('agent_model');
        $username = $this->session->userdata('username');
        
//        $datatrans['kodeakun'] = "100.02";
//        $datatrans['debet'] = $data['nilairefund'];
//        $datatrans['kredit'] = 0;
//        $datatrans['idagent'] = $data['agentid'];
//        $datatrans['keterangan'] = "refund";
//        //$datatrans['tanggal'] = UNIX_TIME
//        $datatrans['ref'] = $result['idrefund'];
//        
//        $this->transaksi_model->add($datatrans,$username);
        
        $datatrans['kodeakun'] = "200.05";
        $datatrans['debet'] = $data['nilairefund'];
        $datatrans['kredit'] = 0;
        $datatrans['idagent'] = $data['agentid'];
        $datatrans['keterangan'] = "refund";
        //$datatrans['tanggal'] = DateTime();
        $datatrans['ref'] = $result['idrefund'];
        
        $this->transaksi_model->add($datatrans,$username);
        
        
        
        $masteragent = $this->agent_model->getmasteragentid();
        $datatrans['kodeakun'] = "100.02";
        $datatrans['debet'] = 0;
        $datatrans['kredit'] = $data['nilairefund'];
        $datatrans['idagent'] = $masteragent;
        $datatrans['keterangan'] = "refund";
        //$datatrans['tanggal'] = DateTime();
        $datatrans['ref'] = $result['idrefund'];
        
        $this->transaksi_model->add($datatrans,$username);
        
        
        $masteragent = $this->agent_model->getmasteragentid();
        $datatrans['kodeakun'] = "100.02";
        $datatrans['debet'] = 0;
        $datatrans['kredit'] = $data['nilairefund'];
        $datatrans['idagent'] = $masteragent;
        $datatrans['keterangan'] = "refund";
        //$datatrans['tanggal'] = DateTime();
        $datatrans['ref'] = $result['idrefund'];
        
        $this->transaksi_model->add($datatrans,$username);
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
