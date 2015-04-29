<?php
class login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('user_model');
        $this->load->model('agent_model');
    }
    
    public function index()
    {
        $data['scripts'] = array(
            "plugins/md5",
            "login/login"
            
        );
        $failed = $this->input->get('failed');
        if($failed != null && $failed)
        {
            $data['success'] = false;
        }
        $this->load->view("login/index",$data);
    }
    
    public function signin()
   {
       $userid = $this->input->post("username");
       $md5pass = md5($this->input->post("password"));
       
       $data = $this->user_model->getUser($userid);
       $user = $data['user'];
       echo json_encode($user);
       if(!empty($data))
       {
           if($user->password == $md5pass)
           {
               $json['status']= 1;
               $json['referrer'] = base_url();
               $userdata = array(
                   "username" => $userid,
                   "is_logged_in" => true,
                   "nama" => $user->nama,
                   "email" => $user->email,
                   "telepon" => $user->telepon,
                   "agentid" => $user->idagent,
                   "roleid" => $user->idrole,
                   "ismaster" => $this->agent_model->ismasteragent($user->idagent)
                );
                $this->session->set_userdata($userdata);
                //$this->load->library('user_agent');
//                if ($this->agent->is_referral())
//                {
                    redirect(base_url());
//                    return;
//                }else
//                {
//                    redirect(base_url());
//                    return;
//                }
            //    $return['json'] = json_encode($json);
              //  $this->load->view("json_view",$return);
                //return;
                
           }  else {
               //$json['status'] = 0;
               //$json['error'] = "Password salah.";
               redirect('login?failed=true&err=1');
           }
       }
       else 
       {    
          // $json['status'] = -1;
          // $json['error'] = "User belum terdaftar";
            redirect('login?failed=true&err=2');
       }
       //$return['json'] = json_encode($json);
       //$this->load->view("json_view",$return);
      
   }
    
    public function forgotpassword()
    {
        
    }
    
    public function signup()
    {
        
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login','refresh');
    }
 
}

?>

