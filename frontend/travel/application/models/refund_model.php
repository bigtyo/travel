<?php
class refund_model extends CI_Model{
    public function __construct()
    {
	$this->load->database();
    }
    
    public function getlist($page,$limit)
    {
        $query = $this->db->query("select a.*,b.namaagen,c.namamaskapai from refund a join agent b on a.agentid = b.idagent join mastermaskapai c on a.idmaskapai = c.idmastermaskapai");
        
        return $query->result();
    }
    
    public function get($idrefund)
    {
        $this->db->from('refund');
        $this->db->where('idrefund',$idrefund);

        $this->db->select('*');
        
        return $this->db->get()->row();
    }
    
    public function add($data,$username,$agentid){
        
       $input['agentid'] = $agentid;
       $input['tanggalrequest'] = $data['tanggalrequest'];
       $input['status'] = "Request";
       $input['idticketing'] = $data['idticketing'];
       $input['idmaskapai'] = $data['idmaskapai'];
       $input['kodebooking'] = $data['kodebooking'];
       $input['createdby'] = $username;
       
       
       try {
           $this->db->insert('refund',$input);
           $result['status'] = 1;
           $data['$idrefund'] = $this->db->insert_id();
           $result['data'] = $data;
       } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal menyimpan data agent baru";
           $result['detail'] = $exc->getMessage();
       }
       
       return $result;
    }
    
    public function edit($data,$idrefund){
        try {
            $this->db->where('idrefund',$idrefund);
            $this->db->update('refund',$data);
            $result['status'] = 1;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data agent";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function delete($idrefund){
        try {
            $this->db->delete('refund', array('idrefund' => $idrefund)); 
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