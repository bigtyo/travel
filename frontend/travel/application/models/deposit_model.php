<?php
class deposit_model extends CI_Model{
    public function __construct()
    {
	$this->load->database();
    }
    
    public function getlist($page = 0,$limit = 10,$where = "")
    {
        $this->db->from('deposit');
        $this->db->join('agent','agent.idagent = deposit.idagent');
        if($where != ""){
            $this->db->where($where,NULL,FALSE);
        }
        

        $this->db->select('deposit.*,agent.namaagen');
        $this->db->offset($page);
        return $this->db->limit($limit)->get()->result();
    }
    
    public function getbalance($idagent = ''){
        if($idagent == ''){
            $query = $this->db->query('SELECT sum(nilai) - sum(b.nta+b.komisi+b.insentif) as balance,a.idagent,d.namaagen,d.telepon,d.email,d.alamat
                    FROM travel.deposit a 
                    join ticketing c on a.idagent = c.idagent
                    join ticketing_detail b on c.idticketing = b.idticketing
                    join agent d on a.idagent = d.idagent
                    group by a.idagent');
            return $query->result();
        }else{
            $query = $this->db->query('SELECT sum(nilai) - sum(b.nta+b.komisi+b.insentif) as balance,a.idagent,d.namaagen,d.telepon,d.email,d.alamat
                    FROM travel.deposit a 
                    join ticketing c on a.idagent = c.idagent
                    join ticketing_detail b on c.idticketing = b.idticketing
                    join agent d on a.idagent = d.idagent 
                    where a.idagent = '.$idagent.'
                    group by a.idagent');
            return $query->row();
        }
        
        
    }
    
    public function get($iddeposit){
        $this->db->from('deposit');
        $this->db->join('agent','agent.idagent = deposit.idagent');
        
        $this->db->where('deposit.iddeposit',$iddeposit);
        
        

        $this->db->select('deposit.*,agent.namaagen');
        
        return $this->db->get()->row();
    }
    
    
    public function add($data,$username){
        
       $input['idagent'] = $data['idagent'];
       $input['nilai'] = $data['nilai'];
       $input['statusdeposit'] = $data['statusdeposit'];
       $input['createdby'] = $username;
       
       
       try {
           $this->db->insert('deposit',$data);
           $result['status'] = 1;
           $data['iddeposit'] = $this->db->insert_id();
           $result['data'] = $data;
       } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal menyimpan data deposit baru";
           $result['detail'] = $exc->getMessage();
       }
       
       return $result;
    }
    
    public function edit($data,$iddeposit){
        try {
            $this->db->where('iddeposit',$iddeposit);
            $this->db->update('deposit',$data);
            $result['status'] = 1;
            $result['iddeposit'] = $iddeposit;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data deposit";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function delete($iddeposit){
        try {
            $this->db->delete('deposit', array('iddeposit' => $iddeposit)); 
            $result['status'] = 1;
        } catch (Exception $exc) {
            $result['status'] = 0;
           $result['error'] = "gagal menghapus data deposit";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
}
?>
