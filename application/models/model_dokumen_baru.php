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
        tb_dokumen_baru.entry_date,
        unit.unit
        FROM
        tb_dokumen_baru
        Inner Join tb_admin On tb_dokumen_baru.id_admin=tb_admin.id_admin
        Inner Join unit On tb_admin.id_unit=unit.id_unit
        Inner Join tb_jenis_dokumen ON tb_dokumen_baru.id_jenis_dokumen = tb_jenis_dokumen.id_jenis_dokumen
        Inner Join status_dokumen ON tb_dokumen_baru.id_status_dokumen = status_dokumen.id_status_dokumen
        Inner Join revisi ON tb_dokumen_baru.id_revisi = revisi.id_revisi
        order by id_dokumen desc 
		');

		return $query->result_array();
	}


    public function getAllFile(){
        $query=$this->db->query('
            SELECT
            tb_dokumen_baru.id_dokumen,
            tb_dokumen_baru.kode,
            tb_dokumen_baru.nama_dokumen,
            tb_jenis_dokumen.jenis_dokumen,
            tb_dokumen_baru.keterangan,
            tb_dokumen_baru.file,
            revisi.revisi,
            status_dokumen.status_dokumen,
            tb_dokumen_baru.`file`,
            tb_dokumen_baru.entry_date,
            unit.unit
            FROM
            tb_dokumen_baru
            Inner Join tb_admin On tb_dokumen_baru.id_admin=tb_admin.id_admin
            Inner Join unit On tb_admin.id_unit=unit.id_unit
            Inner Join tb_jenis_dokumen ON tb_dokumen_baru.id_jenis_dokumen = tb_jenis_dokumen.id_jenis_dokumen
            Inner Join status_dokumen ON tb_dokumen_baru.id_status_dokumen = status_dokumen.id_status_dokumen
            Inner Join revisi ON tb_dokumen_baru.id_revisi = revisi.id_revisi
            order by id_dokumen desc 
            ');
        return $query->result_array();
    }


    //FILTER 
    public function getDokumenWhereLike($field, $search)
    {

        $query =$this->db->query("
            SELECT
            tb_dokumen_baru.id_dokumen,
            tb_dokumen_baru.kode,
            tb_dokumen_baru.nama_dokumen,
            tb_jenis_dokumen.jenis_dokumen,
            tb_dokumen_baru.keterangan,
            revisi.revisi,
            status_dokumen.status_dokumen,
            tb_dokumen_baru.`file`,
            tb_dokumen_baru.entry_date,
            unit.unit
            FROM tb_dokumen_baru
            Inner Join tb_admin On tb_dokumen_baru.id_admin=tb_admin.id_admin
            Inner Join unit On tb_admin.id_unit=unit.id_unit
            Inner Join tb_jenis_dokumen ON tb_dokumen_baru.id_jenis_dokumen = tb_jenis_dokumen.id_jenis_dokumen
            Inner Join status_dokumen ON tb_dokumen_baru.id_status_dokumen = status_dokumen.id_status_dokumen
            Inner Join revisi ON tb_dokumen_baru.id_revisi = revisi.id_revisi
            WHERE $field LIKE '%$search%'
            ORDER BY id_dokumen desc 
        ");
        return $query->result_array();
    }


    public function getDokumenExportLike($dari, $sampai)
    {

        $query =$this->db->query("
            SELECT
            tb_dokumen_baru.id_dokumen,
            tb_dokumen_baru.kode,
            tb_dokumen_baru.nama_dokumen,
            tb_jenis_dokumen.jenis_dokumen,
            tb_dokumen_baru.keterangan,
            revisi.revisi,
            status_dokumen.status_dokumen,
            tb_dokumen_baru.`file`,
            tb_dokumen_baru.entry_date,
            unit.unit
            FROM tb_dokumen_baru
            Inner Join tb_admin On tb_dokumen_baru.id_admin=tb_admin.id_admin
            Inner Join unit On tb_admin.id_unit=unit.id_unit
            Inner Join tb_jenis_dokumen ON tb_dokumen_baru.id_jenis_dokumen = tb_jenis_dokumen.id_jenis_dokumen
            Inner Join status_dokumen ON tb_dokumen_baru.id_status_dokumen = status_dokumen.id_status_dokumen
            Inner Join revisi ON tb_dokumen_baru.id_revisi = revisi.id_revisi
            WHERE tb_dokumen_baru.entry_date BETWEEN '$dari' AND '$sampai'
            ORDER BY id_dokumen desc 
        ");
        return $query->result_array();
    }

    function getDetailWhereLike($field, $search){
        $query=$this->db->query("
        SELECT
        internal.id,
        tb_dokumen_baru.nama_dokumen,
        catatan_mutu.judul,
        tb_jenis_dokumen.jenis_dokumen,
        tb_dokumen_baru.kode,
        status_dokumen.status_dokumen,
        tb_dokumen_baru.entry_date,
        unit.unit,
        tb_admin.nama
        FROM
        catatan_mutu
        Inner Join internal ON catatan_mutu.id_catatan = internal.id_catatan
        Inner Join tb_dokumen_baru ON internal.id_dokumen = tb_dokumen_baru.id_dokumen
        Inner Join tb_jenis_dokumen ON tb_dokumen_baru.id_jenis_dokumen = tb_jenis_dokumen.id_jenis_dokumen
        Inner Join status_dokumen ON tb_dokumen_baru.id_status_dokumen = status_dokumen.id_status_dokumen
        Inner Join tb_admin ON catatan_mutu.id_admin = tb_admin.id_admin AND tb_dokumen_baru.id_admin = tb_admin.id_admin
        Inner Join unit ON tb_admin.id_unit = unit.id_unit
        WHERE $field LIKE '%$search%'
        order by id desc 
        ");

        return $query->result_array();
    }
   

     function get_detail_admin(){
        $query=$this->db->query('
        SELECT
        internal.id,
        tb_dokumen_baru.nama_dokumen,
        catatan_mutu.judul,
        tb_jenis_dokumen.jenis_dokumen,
        tb_dokumen_baru.kode,
        status_dokumen.status_dokumen,
        tb_dokumen_baru.entry_date,
        unit.unit,
        tb_admin.nama
        FROM
        catatan_mutu
        Inner Join internal ON catatan_mutu.id_catatan = internal.id_catatan
        Inner Join tb_dokumen_baru ON internal.id_dokumen = tb_dokumen_baru.id_dokumen
        Inner Join tb_jenis_dokumen ON tb_dokumen_baru.id_jenis_dokumen = tb_jenis_dokumen.id_jenis_dokumen
        Inner Join status_dokumen ON tb_dokumen_baru.id_status_dokumen = status_dokumen.id_status_dokumen
        Inner Join tb_admin ON catatan_mutu.id_admin = tb_admin.id_admin AND tb_dokumen_baru.id_admin = tb_admin.id_admin
        Inner Join unit ON tb_admin.id_unit = unit.id_unit
        order by id desc 
        ');

        return $query->result_array();
    }

    function get_detail(){
        $query=$this->db->query('
        SELECT
        internal.id,
        tb_dokumen_baru.nama_dokumen,
        catatan_mutu.judul,
        tb_jenis_dokumen.jenis_dokumen,
        tb_dokumen_baru.kode,
        status_dokumen.status_dokumen,
        tb_dokumen_baru.entry_date,
        unit.unit,
        tb_admin.nama
        FROM
        catatan_mutu
        Inner Join internal ON catatan_mutu.id_catatan = internal.id_catatan
        Inner Join tb_dokumen_baru ON internal.id_dokumen = tb_dokumen_baru.id_dokumen
        Inner Join tb_jenis_dokumen ON tb_dokumen_baru.id_jenis_dokumen = tb_jenis_dokumen.id_jenis_dokumen
        Inner Join status_dokumen ON tb_dokumen_baru.id_status_dokumen = status_dokumen.id_status_dokumen
        Inner Join tb_admin ON catatan_mutu.id_admin = tb_admin.id_admin AND tb_dokumen_baru.id_admin = tb_admin.id_admin
        Inner Join unit ON tb_admin.id_unit = unit.id_unit
        Where unit="'.$this->session->userdata('unit').'"
        order by id desc 
        ');

        return $query->result_array();
    }

    
    function get_dokumen_setuju(){
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
        tb_dokumen_baru.entry_date,
        unit.unit
        FROM
        tb_dokumen_baru
        Inner Join tb_admin On tb_dokumen_baru.id_admin=tb_admin.id_admin
        Inner Join unit On tb_admin.id_unit=unit.id_unit
        Inner Join tb_jenis_dokumen ON tb_dokumen_baru.id_jenis_dokumen = tb_jenis_dokumen.id_jenis_dokumen
        Inner Join status_dokumen ON tb_dokumen_baru.id_status_dokumen = status_dokumen.id_status_dokumen
        Inner Join revisi ON tb_dokumen_baru.id_revisi = revisi.id_revisi
        WHERE
        status_dokumen.id_status_dokumen =  "2"
        order by id_dokumen desc
         
        ');

        return $query->result_array();
    }

     


    function insert_detail($data, $table){

    $this->db->insert($table, $data);
   
  }

  function insert_dokumen($data, $table){

    $this->db->insert($table, $data);
   
  }

  function insert_jenis($data, $table){

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

    /*
    function get_status_user(){
        $data=array();
        $query = $this->db->query('
        SELECT
        status_dokumen.id_status_dokumen,
        status_dokumen.status_dokumen
        FROM
        status_dokumen
        WHERE
        status_dokumen.id_status_dokumen <>  2

         ');
        if($query->num_rows()>0){
            foreach ($query->result_array() as $row) {
                $data[]=$row;
            }
        }
        $query->free_result();
        return $data;
    }*/

    
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

    function count_baru(){
        $query = $this->db->query("
            SELECT 
            tb_dokumen_baru.id_dokumen,
            tb_dokumen_baru.id_status_dokumen
            From 
            tb_dokumen_baru
            Where 
            id_status_dokumen=3
            
            ");
        
        return $query->num_rows();
    }
     function count_revisi(){
        $query = $this->db->query("
            SELECT 
            tb_dokumen_baru.id_dokumen,
            tb_dokumen_baru.id_status_dokumen
            From 
            tb_dokumen_baru
            Where 
            id_status_dokumen=1
            
            ");
        
        return $query->num_rows();
    }
     function count_setuju(){
        $query = $this->db->query("
            SELECT 
            tb_dokumen_baru.id_dokumen,
            tb_dokumen_baru.id_status_dokumen
            From 
            tb_dokumen_baru
            Where 
            id_status_dokumen=2
            
            ");
        
        return $query->num_rows();
    }
     function count_unit(){
        $query = $this->db->query("
            SELECT 
            tb_dokumen_baru.id_dokumen,
            tb_dokumen_baru.id_status_dokumen
            From 
            tb_dokumen_baru
            Where 
            id_status_dokumen=4
            
            ");
        
        return $query->num_rows();
    }

 
}
?>