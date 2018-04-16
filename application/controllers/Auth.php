<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('model_login');
    	$this->load->library('form_validation');
	}

	public function index(){
    $data['title']='Login';
		$this->load->view('login',$data);
	}

	public function cek_login()
  {
    $username=$this->input->post('username');
    $password=$this->input->post('password');

    $data = array('username' =>  $username, 
            'password' => sha1($password)
            );

    $hasil = $this->model_login->cek_user($data);
    if ($hasil->num_rows() == 1){
      foreach($hasil->result() as $sess)
            {
              $sess_data['logged_in'] = 'Sudah Login';
              $sess_data['nama'] = $sess->nama;
              $sess_data['username'] = $sess->username;
              $sess_data['unit']=$sess->unit;
              $sess_data['id_admin']=$sess->id_admin; 
              $sess_data['unit']=$sess->unit; 
              $sess_data['tipe'] = $sess->tipe;
              $this->session->set_userdata($sess_data);
            }
      if ($this->session->userdata('tipe')==0){
        redirect(base_url('admin'));
      }
      elseif ($this->session->userdata('tipe')==1){
        redirect(base_url('staff'));
      }
    }
    else
    {
      echo " <script>alert('Gagal Login: Cek username , password!');history.go(-1);</script>";
      //var_dump($data);
    }
    
    
  }


  
  function logout(){
    $this->session->sess_destroy();
    redirect(base_url('auth'));
  }
}