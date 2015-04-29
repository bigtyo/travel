<?php
class masterakun_model extends CI_Model{
    public function __construct()
    {
	$this->load->database();
    }
    
    public function getlist($page=0,$limit=10)
    {
        $this->db->from('masterakun');
        

        $this->db->select('*');
        $this->db->offset($page);
        return $this->db->limit($limit)->get()->result();
    }
    
    
    public function add($data){
        
        
        
       $input['kodeakun'] = $data['kodeakun'];
       $input['namaakun'] = $data['namaakun'];
       $input['parent'] = $data['parent'];
       
       
       
       try {
           $this->db->insert('masterakun',$data);
           $result['status'] = 1;
           $data['kodeakun'] = $this->db->insert_id();
           $result['data'] = $data;
       } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal menyimpan data masterakun baru";
           $result['detail'] = $exc->getMessage();
       }
       
       return $result;
    }
    
    public function get($kodeakun){
        $this->db->from('masterakun');
        $this->db->where('kodeakun like "'.$kodeakun.'"');

        $this->db->select('*');
        
        return $this->db->get()->row();
    }
    
    public function edit($data,$kodeakun){
        try {
            $this->db->where('kodeakun',$kodeakun);
            $this->db->update('masterakun',$data);
            $result['status'] = 1;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data masterakun";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function delete($kodeakun){
        try {
            $this->db->delete('masterakun', array('kodeakun' => $kodeakun)); 
            $result['status'] = 1;
        } catch (Exception $exc) {
            $result['status'] = 0;
           $result['error'] = "gagal mengubah data masterakun";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function getAllFriendAcount($kodeakun){
        $this->db->from('masterakun');
        $this->db->where('kodeakun not like "'.$kodeakun.'"');

        $this->db->select('*');
        
        return $this->db->get()->result();
    }
}
?>
