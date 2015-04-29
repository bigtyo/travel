<?php
class ticketingdetail_model extends CI_Model{
    public function __construct()
    {
	$this->load->database();
    }
    
    public function getlist($idticketing,$page = 0,$limit = 10)
    {
        $this->db->from('ticketing_detail');
        
        $this->db->where('idticketing',$idticketing);
        $this->db->select('*');
        $this->db->offset($page);
        return $this->db->limit($limit)->get()->result();
    }
    
    
    public function simpan($data,$idticketing_detail,$idticketing){
        if($idticketing_detail != null && $idticketing_detail != ""){
            $result = $this->edit($data,$idticketing_detail);
        }else{
            $data['idticketing'] = $idticketing;
            $result = $this->add($data);
        }
        
        return $result;
    }
    
    public function simpanlist($datalist,$idticketing){
        $query = 'update td
        set td.idmaskapai = det.idmaskapai,
	td.firstname = det.firstname,
	td.middlename = det.middlename,
	td.lastname = det.lastname,
	td.salutation = det.salutation,
	td.tanggallahir = det.tanggallahir,
	td.kodebooking = det.kodebooking,
        td.rute = det.rute,
	td.tanggalbooking = det.tanggalbooking,
	td.infant = det.infant,
	td.idticketing = det.idticketing,
	td.kelas = det.kelas,
	td.nta = det.nta,
	td.komisi = det.komisi,
	td.insentif = det.insentif,
	td.markup = det.markup,
	td.mod = det.mod,
	td.statusmaskapai = "BOOKED" 
        FROM ticketing_detail as td 
        JOIN (';
        $datacount = 0;
        if($idticketing != null && $idticketing != ""){
            try {
                foreach($datalist as $data){
                    if($datacount > 0){
                        $query+= " UNION ALL ";
                    }
                    $query += 'SELECT '.$data['idticketing_detail'].' as idticketing_detail, '
                            . ''.$data['idmaskapai'].' as idmaskapai, '
                            . ''.$data['firstname'].' as firstname, '
                            . ''.$data['salutation'].' as salutation, '
                            . ''.$data['middlename'].' as middlename, '
                            . ''.$data['lastname'].' as lastname, '
                            . ''.$data['tanggallahir'].' as tanggallahir, '
                            . ''.$data['kodebooking'].' as kodebooking, '
                            . ''.$data['rute'].' as rute, '
                            . ''.$data['tanggalbooking'].' as tanggalbooking, '
                            . ''.$data['infant'].' as infant, '
                            . ''.$idticketing.' as idticketing, '
                            . ''.$data['kelas'].' as kelas, '
                            . ''.$data['nta'].' as nta, '
                            . ''.$data['komisi'].' as komisi, '
                            . ''.$data['insentif'].' as insentif, '
                            . ''.$data['mod'].' as mod, '
                            . ''.$data['tanggalbooking'].' as tanggalbooking, ';
                            
                    
                    
                    $datacount++;
                }
                $query += ") as det ON det.idticketing_detail = td.idticketing_detail";
                $result = $this->db->query($query);
            } catch (Exception $exc) {
                $result['status'] = 0;
                $result['error'] = "gagal melakukan penyimpanan";
                $result['detail'] = $exc->getMessage();
            }

            
        }else{
            
            $result['status'] = 0;
            $result['error'] = "gagal melakukan penyimpanan";
            $result['detail'] = "idticketing tidak boleh kosong";
        }
        
        return $result;
    }
    
    public function get($idticketing_detail){
        
    }
    
    public function add($data){
        
       
       
       
       
       
       
       try {
           $this->db->insert('ticketing_detail',$data);
           $result['status'] = 1;
           $result['idticketing_detail'] = $this->db->insert_id();
           $result['data'] = $data;
       } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal menyimpan data ticketing baru";
           $result['detail'] = $exc->getMessage();
       }
       
       return $result;
    }
    
    public function edit($data,$idticketing_detail){
        try {
            $this->db->where('idticketing_detail',$idticketing_detail);
            $this->db->update('ticketing_detail',$data);
            $result['status'] = 1;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data ticketing_detail";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function editbyticketing($data,$idticketing){
        try {
            $this->db->where('idticketing',$idticketing);
            $this->db->update('ticketing_detail',$data);
            $result['status'] = 1;
        } catch (Exception $exc) {
           $result['status'] = 0;
           $result['error'] = "gagal mengubah data ticketing_detail";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
    
    public function delete($idticketing_detail){
        try {
            $this->db->delete('ticketing_detail', array('idticketing_detail' => $idticketing_detail)); 
            $result['status'] = 1;
        } catch (Exception $exc) {
            $result['status'] = 0;
           $result['error'] = "gagal menghapus data ticketing";
           $result['detail'] = $exc->getMessage();
        }

        return $result;
    }
}
?>
