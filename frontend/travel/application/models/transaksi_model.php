<?php
class transaksi_model extends CI_Model{
    public function __construct()
    {
	$this->load->database();
    }
    
    public function getlist($page,$limit)
    {
        $this->db->from('transaksi');
        

        $this->db->select('*');
        $this->db->offset($page);
        return $this->db->limit($limit)->get()->result();
    }
    
    
    public function add($data,$username){
        
       $input['kodeakun'] = $data['kodeakun'];
       $input['debet'] = $data['debet'];
       $input['kredit'] = $data['kredit'];
       $input['idagent'] = $data['idagent'];
       $input['keterangan'] = $data['keterangan'];
       $input['tanggal'] = time();
       $input['ref'] = $data['ref'];
       
       $input['createdby'] = $username;
       
       
       try {
           $this->db->insert('transaksi',$input);
           $result['status'] = 1;
           $data['idtransaksi'] = $this->db->insert_id();
           $result['data'] = $data;
       } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal menyimpan data transaksi baru";
           $result['detail'] = $exc->getMessage();
       }
       
       return $result;
    }
    
    public function edit($data,$idtransaksi){
        try {
            $this->db->where('idtransaksi',$idtransaksi);
            $this->db->update('transaksi',$data);
            $result['status'] = 1;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data transaksi";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function delete($idtransaksi){
        try {
            $this->db->delete('transaksi', array('idtransaksi' => $idtransaksi)); 
            $result['status'] = 1;
        } catch (Exception $exc) {
            $result['status'] = 0;
           $result['error'] = "gagal menghapus data transaksi";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
}
?>
