<?php

class user_model extends CI_Model{
    public function __construct()
    {
	$this->load->database();
    }
    
    public function getUserlist($agentid){
        
        
        $this->db->from("user");
        $this->db->where('agent = '.$agentid);
        $result = $this->db->get()->result();
        
        return $result;
    }
    
    public function getUser($username)
    {
        $this->db->from("user");
        $this->db->join("agent","agent.idagent = user.agent");
        //$this->db->join("roleusers","roleusers.username = user.username");
        //$this->db->join("role","role.idrole = roleusers.roleid");
        $this->db->like('user.username',$username,'none');
        //$this->db->select("user.*,agent.idagent,agent.namaagen,role.idrole,role.namarole",FALSE);
        $this->db->select("user.*,agent.idagent,agent.namaagen",FALSE);
        //$query = $this->db->get_where("user",array('userid' => $username));
        $query = $this->db->get();
        $data['user'] = $query->row();
        if($query->row() == null){
            $data = array();
            return $data;
        }
        
        return $data;
    }
    
    public function isOwnerUser($username,$ischeckmasteruser = false){
        $query = $this->db->query("SELECT * FROM travel.user a join agent b on a.agent = b.idagent where ISNULL(b.parent) and a.username = b.username and a.username like '".$username."'");
        if($ischeckmasteruser){
            $query = $query = $this->db->query("SELECT * FROM travel.user a join agent b on a.agent = b.idagent JOIN agent_masteruser c ON c.username = a.username where ISNULL(b.parent) and a.username = b.username and a.username like '".$username."'");
        }
        return $query->num_rows() > 0;
        
        
    }
    
    
    
    public function getUserDetail($userid){
        $this->db->from('user');
        $this->db->where(array('username' => $userid));
        $query = $this->db->get();
        
        return $query->row();
    }
    
    public function add($data){
        
        
        
       $input['username'] = $data['username'];
       $input['nama'] = $data['nama'];
       $input['alamat'] = $data['alamat'];
       $input['telepon'] = $data['telepon'];
       $input['email'] = $data['email'];
       $input['agent'] = $this->session->userdata('agentid');
       
       
       try {
           $this->db->insert('user',$data);
           $result['status'] = 1;
           $data['username'] = $this->db->insert_id();
           $result['data'] = $data;
       } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal menyimpan data user baru";
           $result['detail'] = $exc->getMessage();
       }
       
       return $result;
    }
    
    public function getAllNoAgentUsers(){
        
        
        
        $this->db->from('user');
        $this->db->where("isnull(agent) = true");
        return $this->db->get()->result();
        
        
    }
    
    
    
    
    public function edit($data,$login){
        try {
            $this->db->where('username',$login);
            $this->db->update('user',$data);
            $result['status'] = 1;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data user";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>