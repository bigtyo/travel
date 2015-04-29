<?php
class masteragent extends RS_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('agent_model');
        $this->load->model('agentmaskapai_model');
    }
    
    public function index(){
        $header['scripts'] = array(
            "masteragent/dashboard"
        );
        $header['external_scripts'] = array();
        
        
    }
    
    public function subagentlist(){
        $header['scripts'] = array(
            
        );
        $header['external_scripts'] = array();
        
        $param['agents'] = $this->agent_model->getlist();
        
        $this->load->view("masteragent/subagent",$param);
        $this->load->view("templates/footer",$header);
    }
    
    public function subagentsimpan(){
        $agentid = $this->input->post('agentid');
        $data['namaagen'] = $this->input->post('namaagen');
        $data['alamat'] = $this->input->post('alamat');
        $data['email'] = $this->input->post('email');
        $data['telepon'] = $this->input->post('telepon');
        $username = $this->input->post('username');
        $data['username'] = $username;
        
        if($agentid != null && $agentid != ""){
            
            $results = $this->agent_model->edit($data,$agentid);
            
        }else{
            $results = $this->agent_model->add($data,$username,$agentid);
            if($results['status'] == 1){
                $this->agent_model->fillmaskapai($results['idagent']);
            }
        }
       // $json['json'] = json_encode($results);
       // $this->load->view('json_view',$json);
        redirect(base_url().'index.php/sub-agent/list');
        
        
    }
    
    public function delete(){
        $agentid = $this->input->post('agentid');
        
        $result = $this->agent_model->delete($agentid);
        
        $json['json'] = json_encode($result);
        
        $this->load->view('json_view',$json);
    }
    
    public function activate(){
        $agentid = $this->input->post('agentid');
        $active = $this->input->post('active');
        
        $result = $this->agent_model->activate($agentid,$active);
        
        $json['json'] = json_encode($result);
        
        $this->load->view('json_view',$json);
    }
    
    
}
?>

