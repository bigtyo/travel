<?php
class ticketing_model extends CI_Model{
    public function __construct()
    {
	$this->load->database();
    }
    
    public function getlist($page,$limit)
    {
        $query = $this->db->query("SELECT a.idticketing,COALESCE(b.kodebooking,'belum booking') as kodebooking,a.tanggal, SUM((nta+komisi+insentif+markup) * ( b.mod / 100) + nta+komisi+insentif+markup) as total, 
                        COALESCE(c.namamaskapai,'belum booking') as namamaskapai,b.statusmaskapai as status,a.createdby
                        FROM travel.ticketing a
                        join travel.ticketing_detail b on a.idticketing = b.idticketing
                        left join travel.mastermaskapai c on b.idmaskapaipergi = c.idmastermaskapai

                        group by a.idticketing");
        

        //$this->db->select('*');
        //$this->db->offset($page);
        return $query->result();
    }
    
    public function savecaptcha($input,$idticketing){
        $data['captcha'] = $input;
        $res = $this->edit($data, $idticketing);
        
        return $res;
    }
    
    public function getdetail($idticketing){
        $query = $this->db->query("select a.* "
                . "from ticketing_detail a "
                
                . "where idticketing = ".$idticketing);
        
        return $query->result();
    }
    
    
    public function add($data){
        
       
       
       
       
       
       
       try {
           $this->db->insert('ticketing',$data);
           $result['status'] = 1;
           $result['idticketing'] = $this->db->insert_id();
           $result['data'] = $data;
       } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal menyimpan data ticketing baru";
           $result['detail'] = $exc->getMessage();
       }
       
       return $result;
    }
    
    public function edit($data,$idticketing){
        try {
            $this->db->where('idticketing',$idticketing);
            $this->db->update('ticketing',$data);
            $result['status'] = 1;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data ticketing";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function delete($idticketing){
        try {
            $this->db->delete('ticketing', array('idticketing' => $idticketing)); 
            $result['status'] = 1;
        } catch (Exception $exc) {
            $result['status'] = 0;
           $result['error'] = "gagal menghapus data ticketing";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function getbandaralist($where){
        $this->db->from('bandara');
        $this->db->like('lokasi', $where); 

        $this->db->select('*');
        
        return $this->db->get()->result();
    }
    
    public function deletecaptcha($idticketing){
        $data['captcha'] = Null;
        $res = $this->edit($data, $idticketing);
        
        return $res;
    }
}
?>
