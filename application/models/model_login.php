<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_login extends CI_Model{
	
  public function cek_user($data){
    $query = $this->db->get_where('tb_admin',$data);
    return $query;
  }

  function get_user(){
  	$query=$this->db->query('
		SELECT
		tb_admin.id_admin,
		tb_admin.nama,
		tb_admin.id_unit,
		tb_admin.username,
		tb_admin.password,
		tb_admin.date_user,
		tb_admin.tipe
		FROM
		tb_admin
		Inner Join unit ON tb_admin.id_unit = unit.id_unit
		order by id_admin desc 
							 
		');

		return $query->result_array();
  }
 
}
