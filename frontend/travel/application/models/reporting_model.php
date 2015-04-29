<?php
class reporting_model extends CI_Model{
    public function __construct()
    {
	$this->load->database();
    }
    
    public function transactionreport(){
        $query = "";
        
        return $query->result();
    }
}
?>
