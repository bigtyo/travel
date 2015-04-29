<?php


class user extends RS_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        
    }
    
    function userlist(){
        $agentid = $this->session->userdata('agentid');
        $list = $this->user_model->getUserlist($agentid);
        
        $header['scripts'] = array(

        );
        $header['external_scripts'] = array();
        
        $data['userlist'] = $list;
        $this->load->view('user/userlist',$data);
        $this->load->view('templates/footer',$header);
    }
    
    function simpanuser(){
        $login = $this->input->post('username');
        
        $isnew = $this->input->post('isnew') != "";
        
        $data['nama'] = $this->input->post('nama');
        $data['alamat'] = $this->input->post('alamat');
        $data['email'] = $this->input->post('email');
        $data['telepon'] = $this->input->post('telepon');
        $data['password'] = md5('password');
        $data['agent'] = $this->session->userdata('agentid');
        //$idmasterloginmaskapai = $this->input->post('idmasterloginmaskapai');
        
        if($isnew){
            $data['username'] = $login;
            $result = $this->user_model->add($data);
        }else{
            $result = $this->user_model->edit($data,$login);
        }
        
        
        
        redirect(base_url().'index.php/user/userlist');
    }
}

?>