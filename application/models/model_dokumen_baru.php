<?php 
class model_dokumen_baru extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function get_dokumen(){
		$query=$this->db->query('
		SELECT
        tb_dokumen_baru.id_dokumen,
        tb_dokumen_baru.kode,
        tb_dokumen_baru.nama_dokumen,
        tb_jenis_dokumen.jenis_dokumen,
        tb_dokumen_baru.keterangan,
        revisi.revisi,
        status_dokumen.status_dokumen,
        tb_dokumen_baru.`file`,
        tb_dokumen_baru.entry_date
        FROM
        tb_dokumen_baru
        Inner Join tb_jenis_dokumen ON tb_dokumen_baru.id_jenis_dokumen = tb_jenis_dokumen.id_jenis_dokumen
        Inner Join status_dokumen ON tb_dokumen_baru.id_status_dokumen = status_dokumen.id_status_dokumen
        Inner Join revisi ON tb_dokumen_baru.id_revisi = revisi.id_revisi
        order by id_dokumen desc 
		');

		return $query->result_array();
	}




  function insert_dokumen($data, $table){

    $this->db->insert($table, $data);
   
  }

    function hapus_dokumen($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
        
    }

  function get_jenis_dokumen(){
		$data=array();
    	$query = $this->db->get('tb_jenis_dokumen');
    	if($query->num_rows()>0){
    		foreach ($query->result_array() as $row) {
    			$data[]=$row;
    		}
    	}
    	$query->free_result();
    	return $data;
	}

	function get_revisi(){
		$data=array();
    	$query = $this->db->get('revisi');
    	if($query->num_rows()>0){
    		foreach ($query->result_array() as $row) {
    			$data[]=$row;
    		}
    	}
    	$query->free_result();
    	return $data;
	}

	function get_status(){
		$data=array();
    	$query = $this->db->get('status_dokumen');
    	if($query->num_rows()>0){
    		foreach ($query->result_array() as $row) {
    			$data[]=$row;
    		}
    	}
    	$query->free_result();
    	return $data;
	}

	function get_unit_user(){
		$data=array();
    	$query = $this->db->query('
           SELECT
            unit.unit,
            unit.id_unit
            FROM
            unit
            WHERE
            unit.id_unit > 1
            ');
    	if($query->num_rows()>0){
    		foreach ($query->result_array() as $row) {
    			$data[]=$row;
    		}
    	}
    	$query->free_result();
    	return $data;
	}

    function get_unit_admin(){
        $data=array();
        $query = $this->db->query('
            SELECT
            unit.unit,
            unit.id_unit
            FROM
            unit
            ');
        if($query->num_rows()>0){
            foreach ($query->result_array() as $row) {
                $data[]=$row;
            }
        }
        $query->free_result();
        return $data;
    }


  function edit_dokumen($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update_dokumen($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('tb_dokumen_baru');
        if(array_key_exists('id_dokumen',$params) && !empty($params['id_dokumen'])){
            $this->db->where('id_dokumen',$params['id_dokumen']);
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