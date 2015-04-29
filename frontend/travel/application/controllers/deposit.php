<?php

class deposit extends RS_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('deposit_model');
    }
    
    public function index(){
        $this->load->model('agent_model');
        $header['scripts'] = array(
            
        );
        $header['external_scripts'] = array();
        
        $idagent = $this->session->userdata('agentid');
        
        $result = $this->agent_model->ismasteragent($idagent);
        $where = "agent.idagent = ".$idagent;
        if($result){
            $where = "";
        }
        
        
        $data['ismaster'] = $result;
        
        
        $data['deposits'] = $this->deposit_model->getlist(0,10,$where);
        $this->load->view('deposit/listdeposit',$data);
        $this->load->view('templates/footer',$header);
    }
    
    public function simpan(){
        $iddeposit = $this->input->post('iddeposit');
        
        $data['nilai'] = $this->input->post('nilai');
        
        
        if($iddeposit != null && $iddeposit != ""){
            $status = $this->input->post('statusdeposit');
            $data['statusdeposit'] = $status;
            if($status == 'VERIFIED'){
                $data['verifiedby'] = $this->session->userdata('username');
                $data['tanggalverified'] = time();
            }
            $result = $this->deposit_model->edit($data,$iddeposit);
            if($status == 'VERIFIED' && $result['status'] == 1){
                $data['idagent'] = $this->input->post('idagent');
                $this->transaksiverifikasi($data,$result);
            }
        }else
        {
            $data['idagent'] = $this->session->userdata('agentid');
            $result = $this->deposit_model->add($data,$this->session->userdata('username'));
        }
        
        redirect(base_url().'index.php/finance/verifikasi-topup');
    }
    
    
    
    function transaksiverifikasi($data,$result){
        $this->load->model('transaksi_model');
        $this->load->model('agent_model');
        $username = $this->session->userdata('username');
        
        $datatrans['kodeakun'] = "100.02";
        $datatrans['debet'] = 0;
        $datatrans['kredit'] = $data['nilai'];
        $datatrans['idagent'] = $data['idagent'];
        $datatrans['keterangan'] = "deposit";
        //$datatrans['tanggal'] = UNIX_TIME
        $datatrans['ref'] = $result['iddeposit'];
        
        $this->transaksi_model->add($datatrans,$username);
        
        $datatrans['kodeakun'] = "200.01";
        $datatrans['debet'] = $data['nilai'];
        $datatrans['kredit'] = 0;
        $datatrans['idagent'] = $data['idagent'];
        $datatrans['keterangan'] = "deposit";
        //$datatrans['tanggal'] = DateTime();
        $datatrans['ref'] = $result['iddeposit'];
        
        $this->transaksi_model->add($datatrans,$username);
        
        
        
        $masteragent = $this->agent_model->getmasteragentid();
        $datatrans['kodeakun'] = "100.02";
        $datatrans['debet'] = $data['nilai'];
        $datatrans['kredit'] = 0;
        $datatrans['idagent'] = $masteragent;
        $datatrans['keterangan'] = "deposit";
        //$datatrans['tanggal'] = DateTime();
        $datatrans['ref'] = $result['iddeposit'];
        
        $this->transaksi_model->add($datatrans,$username);
        
        
        
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
