<?php
class modal extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
    }
    
    public function scrap(){
        
    }
    public function addagent(){
        $this->load->model('agent_model');
        $this->load->model('user_model');
        $idagent = $this->input->get('id');
        
         
        if($idagent != null && $idagent != ""){
            
            $dataagent = $this->agent_model->get($idagent);
            
            $data['agent'] = $dataagent;
            //echo json_encode($data);
            
        }else{
            $idagent = $this->session->userdata("agentid");
            
            
            
            
        }
        $data['userlist'] = $this->user_model->getAllNoAgentUsers();
        
        
        $data['parent'] = $idagent;
        $this->load->view('masteragent/addagent',$data);
    }
    
    
    public function addpayment(){
        $this->load->model('mastertransaksi_model');
        
        $idmastertransaksi = $this->input->get('id');
        
        $data = array();
        if($idmastertransaksi != null && $idmastertransaksi != ""){
            
            $datpayment = $this->mastertransaksi_model->get($idmastertransaksi);
            
            $data['payment'] = $datpayment;
            //echo json_encode($data);
            
        }
        //$data['acountlist'] = $this->masterakun_model->getAllFriendAcount($idmastertransaksi);
        
        
        
        $this->load->view('finance/addpayment',$data);
    }
    
    public function addakun(){
        $this->load->model('masterakun_model');
        
        $kodeakun = $this->input->get('id');
        
        
        if($kodeakun != null && $kodeakun != ""){
            
            $datakun = $this->masterakun_model->get($kodeakun);
            
            $data['acount'] = $datakun;
            //echo json_encode($data);
            
        }
        $data['acountlist'] = $this->masterakun_model->getAllFriendAcount($kodeakun);
        
        
        
        $this->load->view('finance/addakun',$data);
    }
    
    public function addmastermaskapai(){
        $this->load->model('masterpenerbangan_model');
        $idmastermaskapai = $this->input->get('id');
        
        if($idmastermaskapai != null && $idmastermaskapai != ""){
            $datamaskapai = $this->masterpenerbangan_model->get($idmastermaskapai);
            
            $data['maskapai'] = $datamaskapai;
        }
        
        //$data['maskapailist'] = $this->masterpenerbangan_model->getlist();
        //echo json_encode($data);
        $this->load->view('maskapai/addmaskapai',$data);
    }
    
    public function addmaskapai(){
        $this->load->model('agentmaskapai_model');
        $this->load->model('masterpenerbangan_model');
        $idagent_maskapai = $this->input->get('id');
        
        if($idagent_maskapai != null && $idagent_maskapai != ""){
            $datamaskapai = $this->agentmaskapai_model->get($idagent_maskapai);
            
            $data['maskapai'] = $datamaskapai;
        }
        
        //$data['maskapailist'] = $this->masterpenerbangan_model->getlist();
        //echo json_encode($data);
        $this->load->view('agent/addmaskapai',$data);
    }
    
    
    public function adduser(){
        $this->load->model('user_model');
        //$this->load->model('masterpenerbangan_model');
        $login = $this->input->get('id');
        
        if($login != null && $login != ""){
            $datauser = $this->user_model->getUserDetail($login);
            
            $data['user'] = $datauser;
            $data['isnew'] = "";
        }else{
            $data['isnew'] = "yes";
        }
        
        //$data['maskapailist'] = $this->masterpenerbangan_model->getlist();
        //echo json_encode($data);
        $this->load->view('user/adduser',$data);
    }
    
    public function adddeposit(){
        $this->load->model('deposit_model');
        $this->load->model('agent_model');
        
        $iddeposit = $this->input->get('id');
        
        
        if($iddeposit != null && $iddeposit != ""){
            
            $datadeposit = $this->deposit_model->get($iddeposit);
            
            $data['deposit'] = $datadeposit;
            //echo json_encode($data);
            
        }
        $statuses = array();
        array_push($statuses,array(
            'statusdeposit' => "UNVERIFIED"
        ));
        array_push($statuses,array(
            'statusdeposit' => "VERIFIED"
        ));
        $data['statuslist'] = $statuses;
        
        $ismaster = $this->session->userdata('ismaster');
        
        $data['ismaster'] = $ismaster;
        //echo json_encode($data);
        $this->load->view('deposit/adddeposit',$data);
    }
    
    public function getbandaralist(){
        $this->load->model('ticketing_model');
        $lokasi = $this->input->get('lokasi');
        $data['data'] = $this->ticketing_model->getbandaralist($lokasi);
        
        $json['json'] = json_encode($data);
        
        $this->load->view('json_view',$json);
    }
    
    public function addloginmaskapai(){
        $this->load->model('masterlogin_model');
        
        
        $idmasterloginmaskapai = $this->input->get('id');
        
        $datalogin = $this->masterlogin_model->get($idmasterloginmaskapai);
        
        $data['loginmaskapai'] = $datalogin;
        $ismaster = $this->session->userdata('ismaster');
        
        $data['ismaster'] = $ismaster;
        if($ismaster){
            $this->load->view('maskapai/addlogin',$data);
        }
    }
    public function addrefund(){
        $this->load->model('refund_model');
        $this->load->model('agent_model');
        $this->load->model('masterpenerbangan_model');
        
        $agentid = $this->session->userdata('agentid');
        $data['agent'] = $this->agent_model->get($agentid);
        $idmasterloginmaskapai = $this->input->get('id');
        if($idmasterloginmaskapai != null && $idmasterloginmaskapai != ""){
            
            $datadeposit = $this->refund_model->get($idmasterloginmaskapai);
            
            $data['refund'] = $datadeposit;
            //echo json_encode($data);
            
        }
        //$datalogin = $this->refund_model->get($idmasterloginmaskapai);
        
        //$data['refund'] = $datalogin;
        $ismaster = $this->session->userdata('ismaster');
        $data['maskapailist'] = $this->masterpenerbangan_model->getlist();
        $data['statuslist'] = array("Request","Submit","Approved");
        //echo json_encode($data);
        //$data = array();
        $data['ismaster'] = $this->session->userdata('ismaster');
        //if($ismaster){
        $this->load->view('refund/addrefund',$data);
        //}
    }
    
    public function addpassenger(){
        $this->load->model('ticketingdetail_model');
        
        
        $idticketing_detail = $this->input->get('id');
        
        $datadetail = $this->ticketingdetail_model->get($idticketing_detail);
        
        $data['detail'] = $datadetail;
        //$ismaster = $this->session->userdata('ismaster');
        
       // $data['ismaster'] = $ismaster;
        $data['salutationlist'] = array('MR','MRS','MS');
        $this->load->view('ticketing/addpassenger',$data);
    }
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
