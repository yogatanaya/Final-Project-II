<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
 
	
	function index(){
		$data['title']='Admin Dashboard';
		$this->load->view('admin/dashboard', $data);
	}

	
	
}
?>