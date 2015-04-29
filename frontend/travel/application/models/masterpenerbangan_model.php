<?php
class masterpenerbangan_model extends CI_Model{
    public function __construct()
    {
	$this->load->database();
        
    }
    
    public function get($id){
        $this->db->from('mastermaskapai');
        
        $this->db->like('idmastermaskapai = '.$id);

        $this->db->select('*');
        //$this->db->offset($page);
        return $this->db->get()->row();
    }
    
    public function getlist()
    {
        $this->db->from('mastermaskapai');
        $this->db->join('masterloginmaskapai','mastermaskapai.idmastermaskapai = masterloginmaskapai.idmastermaskapai');
        //$this->db->like('namamaskapai','citilink');

        $this->db->select('mastermaskapai.*,masterloginmaskapai.filescrap');
        //$this->db->offset($page);
        return $this->db->get()->result();
    }
    
    public function getbyname($name){
        $this->db->from('masterloginmaskapai');
        $this->db->like('filescrap',$name);
        $this->db->select('*');
        
        return $this->db->get()->row();
        
    }
    
    public function getfilescrap($id){
        $this->db->from('masterloginmaskapai');
        $this->db->where('idmastermaskapai',$id);
        $this->db->select('*');
        //echo $this->db->get()->row();
        $filescrap = $this->db->get()->row()->filescrap;
        //echo $this->db->last_query();
        return $filescrap;
    }
    
    
    public function add($data){
        
        
        
       $input['namamaskapai'] = $data['namamaskapai'];
       $input['alamat'] = $data['alamat'];
       $input['telepon'] = $data['telepon'];
       $input['email'] = $data['email'];
       
       
       try {
           $this->db->insert('mastermaskapai',$data);
           $result['status'] = 1;
           $data['idmastermaskapai'] = $this->db->insert_id();
           $result['data'] = $data;
       } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal menyimpan data agent baru";
           $result['detail'] = $exc->getMessage();
       }
       
       return $result;
    }
    
    public function edit($data,$idmastermaskapai){
        try {
            $this->db->where('idmastermaskapai',$idmastermaskapai);
            $this->db->update('mastermaskapai',$data);
            $result['status'] = 1;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data agent";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function delete($idmastermaskapai){
        try {
            $this->db->delete('mastermaskapai', array('idmastermaskapai' => $idmastermaskapai)); 
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
