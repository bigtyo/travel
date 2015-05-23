<?php

class ticketing extends RS_Controller{
    
    public function __construct(){
        
        parent::__construct();
        $this->load->model('ticketing_model');
        //$this->load->model('ticketingdetail_model');
    }
    
    public function getidmaskapaibyname($name){
        $this->load->model('masterpenerbangan_model');
        
        $maskapai = $this->masterpenerbangan_model->getbyname($name);
        return $maskapai;
    }
    
    public function search(){
        $this->load->model("masterpenerbangan_model");
        $this->load->model('agent_model');
        $header['scripts'] = array("jquery.tablesorter");
        $header['external_scripts'] = array(); 
        
        $idagent= $this->session->userdata('agentid');
        $data['agent'] = $this->agent_model->get($idagent);
        //echo json_encode($this->agent_model->get($idagent));
        $data['bandaralist'] = $this->ticketing_model->getbandaralist('');
        $data['maskapailist'] = $this->masterpenerbangan_model->getlist();
        $this->load->view('general/search',$data);
        $this->load->view('templates/footer',$header);
    }
    
    public function simpanticketing(){
        $data['idagent'] = $this->session->userdata('agentid');
        $data['createdby'] = $this->session->userdata('username');
        $data['idticketing'] = $this->input->post('idticketing');
        $data['teleponpelanggan'] = $this->input->post('teleponpelanggan');
        $result = $this->ticketing_model->add($data);
        $details = json_decode($this->input->post('details'),true);
        $datapergi = json_decode($this->input->post('datapergi'),true);
        $datapulang = json_decode($this->input->post('datapulang'),true);
        
        if($result['status'] == 1){
            //echo json_encode($result);
            $data_details = array();
            if(count($details) > 0){
                $maskapaipergi = $this->getidmaskapaibyname($datapergi['kodemaskapai']);
                //try {
                $maskapaipulang = $this->getidmaskapaibyname($datapulang['kodemaskapai']);
                //} catch (Exception $exc) {
                    //echo $exc->getTraceAsString();
                //}

                
            }
            foreach($details as $detail){
                $detail['createdby'] = $this->session->userdata('username');
                //$jampergi = explode(" - ",$datapergi['jam']);
                
                //$detail['tanggalpergi'] = $datapergi['tanggalberangkat'] + " " + $jampergi[0] +":00";
                $detail['tanggalpergi'] = $datapergi['tanggalberangkat'];
                $detail['kodeterbangpergi'] = $datapergi['kodeterbang'];
                $detail['idmaskapaipulang'] = $maskapaipulang->idmastermaskapai;
                $detail['idmaskapaipergi'] = $maskapaipergi->idmastermaskapai;
                //$detail
                //$jamkembali = explode(" - ",$datapulang['jam']);
                //echo json_encode($jamkembali);
                $detail['kodeterbangpulang'] = $datapulang['kodeterbang'];
                //$detail['tanggalpulang'] = $datapulang['tanggalberangkat'] + " " + $jamkembali[0] +":00";
                $detail['tanggalpulang'] = $datapulang['tanggalberangkat'];// + " " + $jamkembali[0] +":00";
                $temp_detail = $this->simpanticketingdetail($result['idticketing'],$detail);
                $data_detail = $temp_detail['data'];
                $data_detail['idticketing_detail'] = $temp_detail['idticketing_detail'];
                array_push($data_details, $temp_detail);
            }
            $result['details'] = $data_details;
        }
        $data['json'] = json_encode($result);
        $this->load->view('json_view',$data);
    }
    
    
    public function simpanpassenger(){
        $this->load->model('ticketingdetail_model');
        
        $idticketing_detail = $this->input->post('idticketing_detail');
        $idticketing = $this->input->post('idticketing');
        $data['firstname'] = $this->input->post('firstname');
        $data['middlename'] = $this->input->post('middlename');
        $data['lastname'] = $this->input->post('lastname');
        $data['tanggallahir'] = $this->input->post('tanggallahir');
        $data['infant'] = $this->input->post('infant');
        $data['salutation'] = $this->input->post('salutation');
        $data['createdby'] = $this->session->userdata('username');
        $result = $this->ticketingdetail_model->simpan($data,$idticketing_detail,$idticketing);
        $json['json'] = json_encode($result);
        $this->load->view('json_view',$json);
    }
    
    public function simpanticketingdetail($idticketing,$detail){
        $this->load->model('ticketingdetail_model');
        
        if(array_key_exists('idticketing_detail', $detail)){
            $idticketing_detail = $detail['idticketing_detail'];
        }else{
            $idticketing_detail = null;
        }
        
        //$idticketing = $this->input->post('idticketing');
        //$data['firstname'] = $this->input->post('firstname');
        //$data['middlename'] = $this->input->post('middlename');
        //$data['lastname'] = $this->input->post('lastname');
        //$data['tanggallahir'] = $this->input->post('tanggallahir');
        //$data['infant'] = $this->input->post('infant');
        //$data['salutation'] = $this->input->post('salutation');
        //$data['createdby'] = $this->session->userdata('username');
        $result = $this->ticketingdetail_model->simpan($detail,$idticketing_detail,$idticketing);
        //$json['json'] = json_encode($result);
        //$this->load->view('json_view',$json);
        return $result;
    }
    
    public function getmarkup(){
        $idagent = $this->session->userdata('agentid');
        $idmaskapai = $this->input->post('idmaskapai');
        $harga = $this->input->post('idmaskapai');
        
        $this->load->model('agentmaskapai_model');
        
        $json = $this->agentmaskapai_model->getmarkup($idagent,$idmaskapai,$harga);
        $json['harga'] = $harga;
        
        $this->load->view('json_view',$data);
        
    }
    
    public function listtransaksiticket(){
        $this->load->model('agent_model');
        $header['scripts'] = array(
            
        );
        $header['external_scripts'] = array();
        
        $idagent = $this->session->userdata('agentid');
        
        $result = $this->agent_model->ismasteragent($idagent);
        $where = "idagent = ".$idagent;
        if($result){
            $where = "";
        }
        
        
        $data['ismaster'] = $result;
        
        
        $data['tickets'] = $this->ticketing_model->getlist(0,10,$where);
        
        $this->load->view('ticketing/listtransaksi',$data);
        $this->load->view('templates/footer',$header);
    }
    
    public function getdetail(){
        $idticketing = $this->input->post('idticketing');
        
        $data['details'] = $this->ticketing_model->getdetail($idticketing);
        $data['idticketing'] = $idticketing;
        $this->load->view('ticketing/detailbooking',$data);
        
    }
    
    public function booking(){
        $idticketing = $this->input->post('idticketing');
        
        $data['idagent'] = $this->session->userdata('agentid');
        $data['createdby'] = $this->session->userdata('username');
        
        $details = json_decode($this->input->post('details'),TRUE);
//        $ticketing_details = array();
//        $detailcount = 0;
//        foreach ($details as $detail){
//            $idticketing_detail = $detail['idticketing_detail'];
//            $data_detail['idmaskapai'] = $detail['idmaskapai'];
//            $data_detail['tanggalbooking'] = date("Y-m-d H:i:s");
//            $data_detail['rute'] = $detail['rute'];
//            $data_detail['kodebooking'] = $detail['kodebooking'];
//            //$data_detail['jml'] = $this->input->post('jml');
//            $data_detail['namapenumpang'] = $detail['namapenumpang'];
//            $data_detail['kelas'] = $detail['kelas'];
//            $data_detail['keterangan'] = $detail['keterangan'];
//            $data_detail['nta'] = $detail['nta'];
//            $data_detail['komisi'] = $detail['komisi'];
//            $data_detail['insentif'] = $detail['insentif'];
//            $ticketing_details[$detailcount] = $detail;
//            $detailcount++;
//        }
        
        
        
        
        if($idticketing != null && $idticketing != ""){
            
            $result = $this->ticketing_model->edit($data,$idticketing);
            //$this->ticketingdetail_model->deletebyticketing($idticketing);
            $result_detail = $this->ticketingdetail_model->simpanlist($details,$idticketing);
            $result['details'] = $result_detail;
        }else
        {
            
            $result = $this->ticketing_model->add($data,$this->session->userdata('username'));
            if($result['status'] == 1){
                //$result_detail = $this->ticketingdetail_model->addbulk($details,$result['idticketing']);
                $result_detail = $this->ticketingdetail_model->simpan($data_detail,$idticketing_detail,$result['idticketing']);
                $result['details'] = $result_detail;
            }
        }
        
        $json['json'] = json_decode($data);
        $this->load->view('json_view',$json);
    }
    
    public function issued(){
        $idticketing = $this->input->post('idticketing');
        $idticketing_detail = $this->input->post('idticketing_detail');
        $data['idmastermaskapai'] = $this->input->post('idmastermaskapai');
        $data['tanggalissued'] = date("Y-m-d H:i:s");
        
        $data['issuedby'] = $this->session->userdata('username');
        $data['nomortiket'] = $this->input->post('kodeticketissued');
        
        
        if($idticketing != null && $idticketing != ""){
            $result = $this->ticketingdetail_model->edit($data,$idticketing_detail);
                        
        }else
        {
            $result['status'] = 0;
            $result['error'] = "Id Ticketing tidak terdaftar";
            
        }
        
        $json['json'] = json_decode($data);
        $this->load->view('json_view',$json);
    }
    
    function transaksiissued($data,$result){
        $this->load->model('transaksi_model');
        $this->load->model('agent_model');
        $username = $this->session->userdata('username');
        
        $datatrans['kodeakun'] = "100.02";
        $datatrans['debet'] = 0;
        $datatrans['kredit'] = $data['nilai'];
        $datatrans['idagent'] = $data['idagent'];
        $datatrans['keterangan'] = "ticket";
        //$datatrans['tanggal'] = UNIX_TIME
        $datatrans['ref'] = $result['idticketing'];
        
        $this->transaksi_model->add($datatrans,$username);
        
        $datatrans['kodeakun'] = "200.01";
        $datatrans['debet'] = $data['nilai'];
        $datatrans['kredit'] = 0;
        $datatrans['idagent'] = $data['idagent'];
        $datatrans['keterangan'] = "ticket";
        //$datatrans['tanggal'] = DateTime();
        $datatrans['ref'] = $result['idticketing'];
        
        $this->transaksi_model->add($datatrans,$username);
        
        
        
        $masteragent = $this->agent_model->getmasteragentid();
        $datatrans['kodeakun'] = "100.02";
        $datatrans['debet'] = $data['nilai'];
        $datatrans['kredit'] = 0;
        $datatrans['idagent'] = $masteragent;
        $datatrans['keterangan'] = "ticket";
        //$datatrans['tanggal'] = DateTime();
        $datatrans['ref'] = $result['idticketing'];
        
        $this->transaksi_model->add($datatrans,$username);
        
        
        
    }
    
    
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
