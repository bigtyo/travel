<?php
class agent_model extends CI_Model{
    public function __construct()
    {
            parent::__construct();

            $this->load->database();
    }
    
    public function getlist($page=0,$limit=10)
    {
        $this->db->from('agent');
        $this->db->where('active',1);
        
        $this->db->select('*');
        $this->db->offset($page);
        return $this->db->limit($limit)->get()->result();
    }
    
    public function ismasteragent($idagent){
        $this->db->from('agent');
        $this->db->where('idagent',$idagent);
        $this->db->select('*');
        $row = $this->db->get()->row();
        
        if($row != null && $row->parent != null){
            $result = false;
        }else{
            $result = true;
        }
        
        return $result;
    }
    
    
    public function getmasteragentid(){
        $this->db->from('agent');
        $this->db->where('parent',null);
        $this->db->select('*');
        $res = $this->db->get()->row();
        
        return $res->idagent;
    }
    
    public function get($idagent){
        $this->db->from('agent');
        $this->db->where('idagent',$idagent);
        
        $this->db->select('*');
        
        return $this->db->get()->row();
    }
    
    public function add($data,$username,$parent){
        
       $input['namaagen'] = $data['namaagen'];
       $input['alamat'] = $data['alamat'];
       $input['telepon'] = $data['telepon'];
       $input['email'] = $data['email'];
       //$input['gambar'] = $data['gambar'];
       $input['username'] = $username;
       $input['parent'] = $parent;
       
       try {
           $this->db->insert('agent',$data);
           $result['status'] = 1;
           $data['idagent'] = $this->db->insert_id();
           $result['data'] = $data;
       } catch (Exception $exc) { 
           $result['status'] = 0;
           $result['error'] = "gagal menyimpan data agent baru";
           $result['detail'] = $exc->getMessage();
       }
       
       return $result;
    }
    
    public function edit($data,$idagent){
        try {
            $this->db->where('idagent',$idagent);
            $this->db->update('agent',$data);
            $result['status'] = 1;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data agent";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function delete($idagent){
        try {
            $this->db->delete('agent', array('idagent' => $idagent)); 
            $result['status'] = 1;
        } catch (Exception $exc) {
            $result['status'] = 0;
           $result['error'] = "gagal mengubah data agent";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function activate($idagent,$active){
        $data['active'] = 0;
        try {
            $this->db->where('idagent',$idagent);
            $this->db->update('agent',$data);
            $result['status'] = 1;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data agent";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    
}
?>
