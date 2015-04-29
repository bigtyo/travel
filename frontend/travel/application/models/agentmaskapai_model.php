<?php
class agentmaskapai_model extends CI_Model{
    public function __construct()
    {
	$this->load->database();
    }
    
    public function getlist($idagent)
    {
        $this->db->from('agent_maskapai');
        $this->db->join('mastermaskapai','mastermaskapai.idmastermaskapai = agent_maskapai.idmaskapai');
        $this->db->where('agentid',$idagent);
        

        $this->db->select('agent_maskapai.*,mastermaskapai.namamaskapai');
        
        return $this->db->get()->result();
    }
    
    public function get($idagent_maskapai){
        $this->db->from('agent_maskapai');
        $this->db->join('mastermaskapai','agent_maskapai.idmaskapai = mastermaskapai.idmastermaskapai');
        
        $this->db->where('agent_maskapai.idagent_maskapai',$idagent_maskapai);
        
        

        $this->db->select('agent_maskapai.*,mastermaskapai.namamaskapai');
        
        return $this->db->get()->row();
    }
    
    public function getmarkup($idagent,$idmaskapai,$harga){
        $query = $this->db->query('select * 
                from agent_maskapai 
                where idagent = '.$idagent.' and idmaskapai = '.$idmaskapai);
        $row = $query->row();
        
        if($row->plafon_markup > $harga){
            if($row->tipemarkup == 1){
                $markup = $harga * $row->persen_markup / 100;
            }else{
                $markup = $row->fix_markup;
            }
        }else{
            $markup = 0;
        }
        
        $json['plafon_markup'] = $row->plafon_markup;
        $json['markup'] = $markup;
        
        return $json;
    }
    
    
    public function add($data,$username){
        
       $input['agentid'] = $data['idagent'];
       $input['idmaskapai'] = $data['idmaskapai'];
       $input['tipemarkup'] = $data['tipemarkup'];
       $input['persenmarkup'] = $data['persenmarkup'];
       $input['fixmarkup'] = $data['fixmarkup'];
       $input['plafonmarkup'] = $data['plafonmarkup'];
       
       
       try {
           $this->db->insert('agent_maskapai',$input);
           $result['status'] = 1;
           $data['idagent_maskapai'] = $this->db->insert_id();
           $result['data'] = $data;
       } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal menyimpan data deposit baru";
           $result['detail'] = $exc->getMessage();
       }
       
       return $result;
    }
    
    public function edit($data,$idagent_maskapai){
        try {
            $this->db->where('idagent_maskapai',$idagent_maskapai);
            $this->db->update('agent_maskapai',$data);
            $result['status'] = 1;
            $result['idagent_maskapai'] = $idagent_maskapai;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data deposit";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function delete($idagent_maskapai){
        try {
            $this->db->delete('agent_maskapai', array('idagent_maskapai' => $idagent_maskapai)); 
            $result['status'] = 1;
        } catch (Exception $exc) {
            $result['status'] = 0;
           $result['error'] = "gagal menghapus data deposit";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function fillmaskapai($idagent){
        try {
            $this->db->query("INSERT INTO agent_maskapai(agentid,idmaskapai) "
                . "select ".$idagent." as agentid,idmastermaskapai as idmaskapai FROM travel.mastermaskapai");
            $result['status'] = 1;
        } catch (Exception $exc) {
            $result['status'] = 0;
            $result['error'] = "gagal mengisi data maskapai ke agent";
            
        }

        return $result;
        
    }
}
?>
