<?php 
class model_catatan_mutu extends CI_Model{
	function __construct(){
		parent::__construct();
	}

    function get_judul(){
        $data=array();
        $query = $this->db->get('catatan_mutu');
        if($query->num_rows()>0){
            foreach ($query->result_array() as $row) {
                $data[]=$row;
            }
        }
        $query->free_result();
        return $data;
    }
    function get_status_cm(){
        $data=array();
        $query = $this->db->get('status_cm');
        if($query->num_rows()>0){
            foreach ($query->result_array() as $row) {
                $data[]=$row;
            }
        }
        $query->free_result();
        return $data;   
    }

    function get_metode(){
        $data=array();
        $query = $this->db->get('metode');
        if($query->num_rows()>0){
            foreach ($query->result_array() as $row) {
                $data[]=$row;
            }
        }
        $query->free_result();
        return $data;   
    }
	
    function get_catatan(){
        $query=$this->db->query('
        SELECT
        catatan_mutu.id_catatan,
        catatan_mutu.judul,
        status_cm.status_cm,
        catatan_mutu.masa_berlaku,
        catatan_mutu.lokasi_simpan,
        catatan_mutu.`file`,
        catatan_mutu.keterangan,
        catatan_mutu.entry_date,
        metode.metode,
        tb_admin.nama,
        unit.unit
        FROM
        catatan_mutu
        Inner Join tb_admin ON catatan_mutu.id_admin = tb_admin.id_admin
        Inner Join unit ON tb_admin.id_unit = unit.id_unit
        Inner Join status_cm ON status_cm.id_status_cm = catatan_mutu.id_status_cm
        Inner Join metode ON metode.id_metode = catatan_mutu.id_metode
        order by id_catatan desc 
        ');
        
        return $query->result_array();
    }

     //FILTER 
    public function getCatatanWhereLike($field, $search)
    {

        $query =$this->db->query("
             SELECT
            catatan_mutu.id_catatan,
            catatan_mutu.judul,
            status_cm.status_cm,
            catatan_mutu.masa_berlaku,
            catatan_mutu.lokasi_simpan,
            catatan_mutu.`file`,
            catatan_mutu.keterangan,
            catatan_mutu.entry_date,
            metode.metode,
            tb_admin.nama,
            unit.unit
            FROM
            catatan_mutu
            Inner Join tb_admin ON catatan_mutu.id_admin = tb_admin.id_admin
            Inner Join unit ON tb_admin.id_unit = unit.id_unit
            Inner Join status_cm ON status_cm.id_status_cm = catatan_mutu.id_status_cm
            Inner Join metode ON metode.id_metode = catatan_mutu.id_metode
            WHERE $field LIKE '%$search%'
            ORDER BY id_catatan desc 
        ");
        return $query->result_array();
    }




     function insert_catatan($data, $table){

    $this->db->insert($table, $data);
   
  }


  function get_dokumen_terkait(){
    $data=array();
        $query = $this->db->get('tb_dokumen_baru');
        if($query->num_rows()>0){
            foreach ($query->result_array() as $row) {
                $data[]=$row;
            }
        }
        $query->free_result();
        return $data;

  }


    function edit_catatan($where,$table){       
        return $this->db->get_where($table,$where);
    }

    function update_catatan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }  

     function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('catatan_mutu');
        if(array_key_exists('id_catatan',$params) && !empty($params['id_catatan'])){
            $this->db->where('id_catatan',$params['id_catatan']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }
 
}
?>