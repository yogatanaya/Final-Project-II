<?php
class model_peraturan extends CI_Model{
	function __construct(){
		parent::__construct();
	}


	function get_peraturan(){
		$query=$this->db->query('
		SELECT
        tb_peraturan.id_peraturan,
        tb_instansi.instansi,
        tb_peraturan.judul,
        tb_peraturan.tahun,
        regulator.regulator,
        tb_peraturan.`file`,
        tb_peraturan.entry_date,
        tb_peraturan.masa_berlaku,
        unit.unit,
        tb_admin.nama
        FROM
        tb_peraturan
        Inner Join tb_admin ON tb_peraturan.id_admin=tb_admin.id_admin
        Inner Join unit ON tb_admin.id_unit=unit.id_unit
        Inner Join tb_instansi ON tb_instansi.id_instansi = tb_peraturan.id_instansi
        Inner Join regulator ON regulator.id_regulator = tb_peraturan.id_regulator
        order by id_peraturan desc 
		');

		return $query->result_array();
	}

    public function getPeraturanExportLike($dari, $sampai)
    {

        $query =$this->db->query("
            SELECT
            tb_peraturan.id_peraturan,
            tb_instansi.instansi,
            tb_peraturan.judul,
            tb_peraturan.tahun,
            regulator.regulator,
            tb_peraturan.`file`,
            tb_peraturan.entry_date,
            tb_peraturan.masa_berlaku,
            unit.unit,
            tb_admin.nama
            FROM
            tb_peraturan
            Inner Join tb_admin ON tb_peraturan.id_admin=tb_admin.id_admin
            Inner Join unit ON tb_admin.id_unit=unit.id_unit
            Inner Join tb_instansi ON tb_instansi.id_instansi = tb_peraturan.id_instansi
            Inner Join regulator ON regulator.id_regulator = tb_peraturan.id_regulator
            where tb_peraturan.entry_date BETWEEN '$dari' AND '$sampai'
            order by id_peraturan desc 
        ");
        return $query->result_array();
    }

    //FILTER 
    public function getPeraturanWhereLike($field, $search)
    {

        $query =$this->db->query("
            SELECT
            tb_peraturan.id_peraturan,
            tb_instansi.instansi,
            tb_peraturan.judul,
            tb_peraturan.tahun,
            regulator.regulator,
            tb_peraturan.`file`,
            tb_peraturan.entry_date,
            tb_peraturan.masa_berlaku,
            unit.unit,
            tb_admin.nama
            FROM
            tb_peraturan
            Inner Join tb_admin ON tb_peraturan.id_admin=tb_admin.id_admin
            Inner Join unit ON tb_admin.id_unit=unit.id_unit
            Inner Join tb_instansi ON tb_instansi.id_instansi = tb_peraturan.id_instansi
            Inner Join regulator ON regulator.id_regulator = tb_peraturan.id_regulator
            WHERE $field LIKE '%$search%'
            order by id_peraturan desc 
        ");
        return $query->result_array();
    }

    

	function insert_peraturan($data, $table){
    	$this->db->insert($table, $data);
   
  	}
    function insert_instansi($data, $table){
        $this->db->insert($table, $data);
   
    }

	function get_instansi(){
		$data=array();
    	$query = $this->db->get('tb_instansi');
    	if($query->num_rows()>0){
    		foreach ($query->result_array() as $row) {
    			$data[]=$row;
    		}
    	}
    	$query->free_result();
    	return $data;
	}

	function get_regulator(){
		$data=array();
    	$query = $this->db->get('regulator');
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

      function hapus_peraturan($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
        
    }

    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('tb_peraturan');
        if(array_key_exists('id_peraturan',$params) && !empty($params['id_peraturan'])){
            $this->db->where('id_peraturan',$params['id_peraturan']);
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

     function edit_peraturan($where,$table){      
        return $this->db->get_where($table,$where);
    }

    function update_peraturan($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    } 

    function insert_regulator($data, $table){
        $this->db->insert($table, $data);
   
    }  

}
?>