<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Staff extends CI_Controller {
	public function index()
	{
		$data['title']='Staff Dashboard';
		$this->load->view('staff/header',$data);
		$this->load->view('staff/dashboard', $data);
	}

	public function buatDokumenBaru(){
		$data['title']='Buat Baru';
		$this->load->view('staff/header',$data);
		$this->load->view('staff/dokumenUtama',$data);
	}

	public function buatCatatanMutu(){
		$data['title']='Catatan Baru';
		$this->load->view('staff/header',$data);
		$this->load->view('staff/catatanMutu',$data);
	}

	public function buatPeraturan(){
		$data['title']='Peraturan Baru';
		$this->load->view('staff/header',$data);
		$this->load->view('staff/peraturan',$data);
	}
}
?>