<?php

class subagent extends RS_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('agent_model');
        $this->load->model('agentmaskapai_model');
        $this->load->model('masterpenerbangan_model');
    }
    
    public function profil(){
        $header['scripts'] = array(
            
        );
        $header['external_scripts'] = array();
        $agentid = $this->session->userdata('agentid');
        
        $data['agent'] = $this->agent_model->get($agentid);
        
        $data['listmaskapai'] = $this->agentmaskapai_model->getlist($agentid);
        //echo json_encode($data);
        $this->load->view('agent/profil',$data);
        $this->load->view('templates/footer',$header);
    }
    
    public function saveagentmaskapai(){
        $idagent_maskapai = $this->input->post('idagent_maskapai');
        $data['agentid'] = $this->session->userdata('agentid');
        $data['idmaskapai'] = $this->input->post('idmaskapai');
        $data['persen_markup'] = $this->input->post('persen_markup');
        $data['fix_markup'] = $this->input->post('fix_markup');
        $data['tipemarkup'] = $this->input->post('tipemarkup');
        $data['plafon_markup'] = $this->input->post('plafon_markup');
        
        $result = $this->agentmaskapai_model->edit($data,$idagent_maskapai);
        
        redirect(base_url().'index.php/sub-agent/profil');
    }
    
    public function simpanprofil(){
        $idagent = $this->input->post('idagent');
        
        $data['namaagen'] = $this->input->post('namaagen');
        $data['alamat'] = $this->input->post('alamat');
        $data['telepon'] = $this->input->post('telepon');
        $data['email'] = $this->input->post('email');
        //$data['plafon_markup'] = $this->input->post('plafon_markup');
        
        $result = $this->agent_model->edit($data,$idagent);
        
        redirect(base_url().'index.php/sub-agent/profil');
    }
}

?>