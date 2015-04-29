<?php
class masterlogin_model extends CI_Model{
    public function __construct()
    {
	$this->load->database();
    }
    
    public function getloginmaskapai(){
        $query = $this->db->query("SELECT a.*,b.namamaskapai 
                 FROM masterloginmaskapai a 
                 join mastermaskapai b on a.idmastermaskapai = b.idmastermaskapai");
        
        return $query->result();
    }
    
    public function get($idmasterlogin){
        $query = $this->db->query("SELECT a.*,b.namamaskapai 
                    FROM travel.masterloginmaskapai a 
                    join mastermaskapai b on a.idmastermaskapai = b.idmastermaskapai where idmasterloginmaskapai = ".$idmasterlogin);
        
        return $query->row();
    }
    
    
    public function add($data){
        
        
        
       $input['idmastermaskapai'] = $data['idmastermaskapai'];
       $input['login'] = $data['login'];
       $input['password'] = $data['password'];
       
       
       
       try {
           $this->db->insert('masterloginmaskapai',$data);
           $result['status'] = 1;
           $data['idmasterloginmaskapai'] = $this->db->insert_id();
           $result['data'] = $data;
       } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal menyimpan data masterloginmaskapai baru";
           $result['detail'] = $exc->getMessage();
       }
       
       return $result;
    }
    
    public function edit($data,$idmastermaskapai){
        try {
            $this->db->where('idmastermaskapai',$idmastermaskapai);
            $this->db->update('masterloginmaskapai',$data);
            $result['status'] = 1;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data masterloginmaskapai";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function delete($idmastermaskapai){
        try {
            $this->db->delete('masterloginmaskapai', array('idmastermaskapai' => $idmastermaskapai)); 
            $result['status'] = 1;
        } catch (Exception $exc) {
            $result['status'] = 0;
           $result['error'] = "gagal mengubah data masterloginmaskapai";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
}
?>
