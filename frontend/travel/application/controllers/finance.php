<?php
class finance extends RS_Controller{
    public function __construct() {
        parent::__construct();
        
    }
    
    
    
    public function akunlist(){
        $this->load->model('masterakun_model');
        $header['scripts'] = array(
            
        );
        $header['external_scripts'] = array();
        
        $param['acounts'] = $this->masterakun_model->getlist();
        
        $this->load->view("finance/listakun",$param);
        $this->load->view("templates/footer",$header);
    }
    
    public function simpanakun(){
        $this->load->model('masterakun_model');
        $kodeakun = $this->input->post('kodeakun');
        $data['namaakun'] = $this->input->post('namaakun');
        $data['parent'] = $this->input->post('parent');
        
        
        if($kodeakun != null && $kodeakun != ""){
            
            $results = $this->masterakun_model->edit($data,$kodeakun);
            
        }else{
            $results = $this->masterakun_model->add($data);
        }
       // $json['json'] = json_encode($results);
       // $this->load->view('json_view',$json);
        redirect(base_url().'index.php/finance/akunlist');
    }
    
    public function listpaymenttype(){
        $this->load->model('mastertransaksi_model');
        $header['scripts'] = array(
            
        );
        $header['external_scripts'] = array();
        
        $param['payments'] = $this->mastertransaksi_model->getlist();
        
        $this->load->view("finance/listpayment",$param);
        $this->load->view("templates/footer",$header);
    }
    
    public function simpanpayment(){
        $this->load->model('mastertransaksi_model');
        $idpayment = $this->input->post('idpayment');
        $data['namatransaksi'] = $this->input->post('namatransaksi');
        $data['persenmod'] = $this->input->post('persenmod');
        
        
        if($idpayment != null && $idpayment != ""){
            
            $results = $this->mastertransaksi_model->edit($data,$idpayment);
            
        }else{
            $results = $this->mastertransaksi_model->add($data);
        }
       // $json['json'] = json_encode($results);
       // $this->load->view('json_view',$json);
        redirect(base_url().'index.php/finance/listpaymenttype');
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
