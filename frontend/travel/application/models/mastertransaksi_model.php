<?php
class mastertransaksi_model extends CI_Model{
    public function __construct()
    {
        
	$this->load->database();
    }
    
    public function getlist($page=0,$limit=10)
    {
        $this->db->from('mastertransaksi');
        

        $this->db->select('*');
        $this->db->offset($page);
        return $this->db->limit($limit)->get()->result();
    }
    
    public function get($idmastertranskasi){
        $this->db->from('mastertransaksi');
        $this->db->where('idmastertransaksi',$idmastertranskasi);

        $this->db->select('*');
        
        return $this->db->get()->row();
    }
    
    public function add($data){
        
       $input['namatransaksi'] = $data['namatransaksi'];
       $input['persenmod'] = $data['persenmod'];
       
       
       
       
       try {
           $this->db->insert('mastertransaksi',$data);
           $result['status'] = 1;
           $data['idmastertransaksi'] = $this->db->insert_id();
           $result['data'] = $data;
       } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal menyimpan data mastertransaksi baru";
           $result['detail'] = $exc->getMessage();
       }
       
       return $result;
    }
    
    public function edit($data,$idmastertransaksi){
        try {
            $this->db->where('idmastertransaksi',$idmastertransaksi);
            $this->db->update('mastertransaksi',$data);
            $result['status'] = 1;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data mastertransaksi";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function delete($idmastertransaksi){
        try {
            $this->db->delete('mastertransaksi', array('idmastertransaksi' => $idmastertransaksi)); 
            $result['status'] = 1;
        } catch (Exception $exc) {
            $result['status'] = 0;
           $result['error'] = "gagal mengubah data mastertransaksi";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
}
?>
