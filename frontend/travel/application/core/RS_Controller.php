<?php
class RS_Controller extends CI_Controller {
    public $dataheader;
    public function dateFormat($date) //date
    {
        $tempdate = explode('/',$date);
        
        $year = $tempdate[2];
        $month = $tempdate[0];
        $day = $tempdate[1];
        
        return $year."-".$month."-".$day;
    }
    public function __construct()
	{
            header('Access-Control-Allow-Origin: *');
            header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding, X-Requested-With");
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
            //$method = $_SERVER['REQUEST_METHOD'];
            //if($method == "OPTIONS") {
            //    die();
            //}
		parent::__construct();
                if(function_exists('is_logged_in'))    
                {
                    if(!is_logged_in())
                    {
                        redirect("/login");
                    }
                    else 
                    {
                        $CI =& get_instance();
                        //$userid = $CI->session->userdata('userid');
                        //$agentid = $CI->session->userdata('agentid');
                        
                        
                       // $this->load->model('user_model');
                        
                        //$row = $this->user_model->getUserDetail($userid);
                        
                        //$userdata = $row;
                        
                        
                        
                        //echo json_encode($row);
                        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                            $dataheader['nama'] = $CI->session->userdata('nama');
                            
                            $dataheader['email'] = $CI->session->userdata('email');
                            $dataheader['telepon'] = $CI->session->userdata('telepon');
                            $dataheader['ismaster'] = $CI->session->userdata('ismaster');
                            
                            $dataheader['ismasteruser'] = $CI->session->userdata('ismasteruser');
                            $dataheader['isowneruser'] = $CI->session->userdata('isowneruser');
                            $dataheader['isbook'] = $CI->session->userdata('isbook');
                            $dataheader['isissued'] = $CI->session->userdata('isissued');
                            $dataheader['isfinance'] = $CI->session->userdata('isfinance');
                            $dataheader['isdeposit'] = $CI->session->userdata('isdeposit');
                            $dataheader['isprice'] = $CI->session->userdata('isprice');
                            $dataheader['ismanageuser'] = $CI->session->userdata('ismanageuser');
                            $dataheader['ismasterdata'] = $CI->session->userdata('ismasterdata');
                            $this->load->view('templates/header',$dataheader);
                        }
                        
                        //$CI->session->set_userdata($userdata);
                        
                    }
                    
                }else
                {
                        show_404();
                }
                
                       
		
	}
}
?>