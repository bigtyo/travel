<?php
class maskapai extends RS_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('masterlogin_model');
        $this->load->model('agent_model');
        $this->load->model('masterpenerbangan_model');
    }
    
    public function listairline(){
        $header['scripts'] = array(

        );
        $header['external_scripts'] = array();
        
        $list = $this->masterpenerbangan_model->getlist();
        $data['maskapailist'] = $list;
        $this->load->view("maskapai/listmaskapai",$data);
        $this->load->view('templates/footer',$header);
    }
    
    public function listlogin(){
        $idagent = $this->session->userdata('agentid');
        $header['scripts'] = array(

        );
        $header['external_scripts'] = array();
        $ismaster = $this->agent_model->ismasteragent($idagent);
        $data['ismaster'] = $ismaster;
        if($ismaster){
            $data['maskapailist'] = $this->masterlogin_model->getloginmaskapai();
        }

        $this->load->view('maskapai/listlogin',$data);
        $this->load->view('templates/footer',$header);
    }
    
    
    public function simpanlogin(){
        $agentid = $this->input->post('agentid');
        
        $data['login'] = $this->input->post('login');
        $data['password'] = $this->input->post('password');
        $idmasterloginmaskapai = $this->input->post('idmasterloginmaskapai');
        
        $ismaster = $this->agent_model->ismasteragent($agentid);
        
        if($ismaster){
            $result = $this->masterlogin_model->edit($data,$idmasterloginmaskapai);
        }
        
        redirect(base_url().'index.php/maskapai/listlogin');
    }
    
    
    public function simpanmaskapai(){
        $idmastermaskapai = $this->input->post('idmastermaskapai');
        
        $data['namamaskapai'] = $this->input->post('namamaskapai');
        $data['alamat'] = $this->input->post('alamat');
        $data['telepon'] = $this->input->post('telepon');
        $data['email'] = $this->input->post('email');
        //$data['password'] = $this->input->post('password');
        //$idmasterloginmaskapai = $this->input->post('idmasterloginmaskapai');
        
        //$ismaster = $this->agent_model->ismasteragent($agentid);
        
        //if($ismaster){
        $result = $this->masterpenerbangan_model->edit($data,$idmastermaskapai);
        
        //echo json_encode($result);
       // }
        
        redirect(base_url().'index.php/master-data/airline');
    }
}
?>