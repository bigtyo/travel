<?php

class dashboard extends RS_Controller{
    
    public function __construct(){
        parent::__construct();
        
    }
    
    public function index(){
        $header['scripts'] = array(
            
        );
        $header['external_scripts'] = array();
        
        $this->load->view('general/dashboard');
        $this->load->view('templates/footer',$header);
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
