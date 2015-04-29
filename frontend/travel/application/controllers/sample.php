<?php
class sample extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
    }
    
    public function garuda(){
        $this->load->view('sample/garuda');
    }
    
    public function garudabooking(){
        $this->load->view('sample/garudabooking');
    }
    
    public function garudafare(){
        $this->load->view('sample/garudafare');
    }
    
    public function lionairbooking(){
        $this->load->view('sample/lionairbooking');
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

