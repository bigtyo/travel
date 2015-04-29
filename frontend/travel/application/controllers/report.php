<?php

class report extends RS_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('reporting_model');
    }
    
    public function getbalance(){
        $headers['scripts'] = array();
        $headers['external-scripts'] = array();
        
        $this->load->model('deposit_model');
        $data['balances'] = $this->deposit_model->getbalance();
        $this->load->view('report/balancesubagent',$data);
        $this->load->view('templates/footer',$headers);
    }
    
    public function gettransactionreport(){
        $headers['scripts'] = array();
        $headers['external-scripts'] = array();
        
        $idagent = $this->session->userdata('agentid');
        
        $data = $this->reporting_model->transactionreport($idagent);
        
        $this->load->view('report/laporantransaksi');
        $this->load->view('templates/footer',$headers);
    }
}
?>
