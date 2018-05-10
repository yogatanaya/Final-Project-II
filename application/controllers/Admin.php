<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
 
	public function __construct(){
	parent::__construct();
	$this->load->model('model_peraturan');
	$this->load->model('model_login');
	$this->load->model('model_dokumen_baru');
	$this->load->model('model_catatan_mutu');
	$this->load->helper('url');
	$this->load->library('form_validation');
	$this->load->library('session');

	if($this->session->userdata('logged_in') != 'Sudah Login'){
			redirect(base_url('auth'));
		}
	
	}

	function index(){
		$data['title']='Admin Dashboard';
		$data['tb_dokumen_baru']=$this->model_dokumen_baru->get_dokumen_setuju();
		$data['count_baru']=$this->model_dokumen_baru->count_baru();
		$data['count_revisi']=$this->model_dokumen_baru->count_revisi();
		$data['count_setuju']=$this->model_dokumen_baru->count_setuju();
		$data['count_unit']=$this->model_dokumen_baru->count_unit();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/dashboard', $data);
	}


	function bantuan(){
		$data['title']='Bantuan';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/bantuan',$data);
	}
	/*

	function berkasUnit(){
		$data['title']='Berkas Unit';
		$data['tb_dokumen_baru']=$this->model_dokumen_baru->getAllFile();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/berkasUnit', $data);
	}

	function berkasEksternal(){
		$data['title']='Berkas Unit';
		$data['tb_peraturan']=$this->model_peraturan->getAllFile();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/berkasEksternal', $data);
	}
	*/


	//Buat Dokumen Baru 

	public function buatDokumenBaru(){
		$data['title']='Buat Baru';
		$data['tb_jenis_dokumen']=$this->model_dokumen_baru->get_jenis_dokumen();
		$data['revisi']=$this->model_dokumen_baru->get_revisi();
		//$data['unit']=$this->model_dokumen_baru->get_unit_admin();
		$data['status_dokumen']=$this->model_dokumen_baru->get_status();
		$data['tb_dokumen_baru']=$this->model_dokumen_baru->get_dokumen();

		//filter search...
		$filter=$this->input->post('filter');
		$field=$this->input->post('field');
		$search=$this->input->post('search');
		if (isset($filter) && !empty($search)) {
           $data['tb_dokumen_baru'] = $this->model_dokumen_baru->getDokumenWhereLike($field, $search);
        } else {
            $data['tb_dokumen_baru'] = $this->model_dokumen_baru->get_dokumen();
        }

		$this->load->view('admin/header',$data);
		$this->load->view('admin/dokumenUtama',$data);
	}

	//Submit Dokumen

	public function submitDokumen(){
		$data['title']='Submit';
		//set library
		$this->load->library('upload');
		$this->load->library('session');
		//retrieve value from form
		$id_jenis_dokumen=$this->input->post('id_jenis_dokumen');
		$kode=$this->input->post('kode');
		$nama_dokumen=$this->input->post('nama_dokumen');
		$id_status_dokumen=$this->input->post('id_status_dokumen');
		$id_revisi=$this->input->post('id_revisi');
		$keterangan=$this->input->post('keterangan');
		$entry_date=$this->input->post('entry_date');
		$id_admin=$_SESSION['id_admin'];
		//$kode=$this->input->post('kode');

		$this->form_validation->set_rules('id_jenis_dokumen','id_jenis_dokumen','required');
        $this->form_validation->set_rules('nama_dokumen','nama_dokumen','required');
        $this->form_validation->set_rules('id_status_dokumen','id_status_dokumen','required');
        $this->form_validation->set_rules('id_revisi','id_revisi','required');

		$config['upload_path']          = 'files';
       $config['allowed_types']        = '*';
       $config['max_size']             = 0;
  
	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);

	    if($this->form_validation->run()==FALSE){
	    	echo "<script>alert('Form kurang lengkap');
			document.location='".base_url()."admin/buatDokumenBaru';
			</script>";
	    }else {
	    	 if (!$this->upload->do_upload('file')) {
	        $error = ['error' => $this->upload->display_errors()];
	        //var_dump($error);
	        
	        echo "<script>alert('Upload Gagal!');
				document.location='".base_url()."admin/buatDokumenBaru';
				</script>";
			
			
	        //redirect(base_url('admin/buatDokumenBaru'));
	    }else {
	    	$dokumen=$this->upload->data();
	        $data = array(
	          	'file' => $dokumen['file_name'],
	          	'kode'=>$kode,
	          	'id_status_dokumen'=>$id_status_dokumen,
	          	'id_jenis_dokumen'=>$id_jenis_dokumen,
				'nama_dokumen'=>$nama_dokumen,
				'id_revisi'=>$id_revisi,
				'keterangan'=>$keterangan,
				'entry_date'=>date('Y-m-d'),
				'id_admin'=>$id_admin
	      		);
	      	
	          $this->model_dokumen_baru->insert_dokumen($data, 'tb_dokumen_baru');
	          echo "<script>alert('Dokumen Unit Tersimpan');
				</script>";
	          redirect(base_url('admin/buatDokumenBaru'));
	          
	    	}
	    }
	   
		
	}

	//download dokumen
	public function download($id){
    	if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->model_dokumen_baru->getRows(array('id_dokumen' => $id));
            
            //file path
            $file = 'files/'.$fileInfo['file'];
            
            //download file from directory
            force_download($file, NULL);
        }else{
        	echo "<script>alert('File tidak ditemukan!');
			document.location='".base_url()."admin/buatDokumenBaru';
			</script>";
        }

	}
	


	//Edit Dokumen
	public function editDokumen($id){
		$data['title']='Edit Dokumen';
		$where = array('id_dokumen' => $id
					);
		$data['tb_jenis_dokumen']=$this->db->get('tb_jenis_dokumen')->result();
		$data['revisi']=$this->db->get('revisi')->result();
		//$data['unit']=$this->model_dokumen_baru->get_unit_user();
		$data['status_dokumen']=$this->db->get('status_dokumen')->result();
		$data['tb_dokumen_baru'] = $this->model_dokumen_baru->edit_dokumen($where,'tb_dokumen_baru')->result();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/editDokumenUtama',$data);
	}

	//update dokumen
	public function updateDokumen(){
		$nama_dokumen=$this->input->post('nama_dokumen');
		$id_dokumen=$this->input->post('id_dokumen');
		$id_jenis_dokumen=$this->input->post('id_jenis_dokumen');
		$id_status_dokumen=$this->input->post('id_status_dokumen');
		$id_revisi=$this->input->post('id_revisi');
		$kode=$this->input->post('kode');
		$keterangan=$this->input->post('keterangan');
		$entry_date=$this->input->post('entry_date');
		
		$config['upload_path']          = 'files';
        $config['allowed_types']        = '*';
        $config['max_size']             = 0;
  		$config['overwrite'] = TRUE;

	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {
	        	$error = ['error' => $this->upload->display_errors()];
	        	echo "<script>alert('File Harus Ada Yang DiUpload!');
				document.location='".base_url()."admin/buatDokumenBaru';
				</script>";
	        	//redirect(base_url('admin/editDokumen'));
	    } else {
	    	$dokumen=$this->upload->data();
		        $data = array(
		        'kode'=>$kode,
		        'file' => $dokumen['file_name'],
		        'id_status_dokumen'=>$id_status_dokumen,
		        'id_jenis_dokumen'=>$id_jenis_dokumen,
				'nama_dokumen'=>$nama_dokumen,
				'id_revisi'=>$id_revisi,
				'keterangan'=>$keterangan,
				'entry_date'=>date('Y-m-d')
	      		);
	        $where=array('id_dokumen'=>$id_dokumen);
	        $this->model_dokumen_baru->update_dokumen($where, $data, 'tb_dokumen_baru');
	        redirect(base_url('admin/buatDokumenBaru'));
	    }
		
	}

	//hapus dokumen
	function hapusDokumen($id){
		 $this->db->where('id_dokumen',$id);
    	 $query = $this->db->get('tb_dokumen_baru');
     	$row = $query->row();

     	unlink("./files/$row->file");
		$this->db->delete('tb_dokumen_baru', array('id_dokumen' => $id));
		redirect(base_url('admin/buatDokumenBaru'));
		
	}
	public function detailUtama(){
		$data['title']='Detail Dokumen';
		
		$data['tb_jenis_dokumen']=$this->model_dokumen_baru->get_jenis_dokumen();
		$data['revisi']=$this->model_dokumen_baru->get_revisi();
		//$data['unit']=$this->model_dokumen_baru->get_unit_user();
		$data['catatan_mutu']=$this->model_catatan_mutu->get_judul();
		$data['status_dokumen']=$this->model_dokumen_baru->get_status();
		$data['tb_dokumen_baru']=$this->model_dokumen_baru->get_dokumen();
		$data['internal']=$this->model_dokumen_baru->get_detail_admin();

		//filter search...
		$filter=$this->input->post('filter');
		$field=$this->input->post('field');
		$search=$this->input->post('search');
		if (isset($filter) && !empty($search)) {
           $data['internal'] = $this->model_dokumen_baru->getDetailWhereLike($field, $search);
        } else {
            $data['internal'] = $this->model_dokumen_baru->get_detail_admin();
        }

		$this->load->view('admin/header',$data);
		$this->load->view('admin/detailUtama',$data);
	}

	public function hapusTautan($id){
		$this->db->where('id',$id);
    	 $query = $this->db->get('internal');
     	$row = $query->row();

		$this->db->delete('internal', array('id' => $id));
		redirect(base_url('admin/detailUtama'));
	}

	public function addDetail(){
		$id_dokumen=$this->input->post('id_dokumen');
		$id_catatan=$this->input->post('id_catatan');
		$data=array(
			'id_dokumen'=>$id_dokumen,
			'id_catatan'=>$id_catatan
		);
		
		$this->model_dokumen_baru->insert_detail($data, 'internal');
		redirect(base_url('admin/detailUtama'));
	}









	//////////////////////////////////////Peraturan external/////////////////////////////////////
	public function buatPeraturan(){
		$data['title']='Peraturan Baru';
		$data['tb_instansi']=$this->model_peraturan->get_instansi();
		$data['regulator']=$this->model_peraturan->get_regulator();
		$data['tb_peraturan']=$this->model_peraturan->get_peraturan();
		//$data['unit']=$this->model_peraturan->get_unit_admin();

		//filter search...
		$filter=$this->input->post('filter');
		$field=$this->input->post('field');
		$search=$this->input->post('search');
		if (isset($filter) && !empty($search)) {
           $data['tb_peraturan'] = $this->model_peraturan->getPeraturanWhereLike($field, $search);
        } else {
            $data['tb_peraturan'] = $this->model_peraturan->get_peraturan();
        }

		$this->load->view('admin/header',$data);
		$this->load->view('admin/peraturan',$data);
	}

	//submit peraturan 
	//submit peraturan 
	public function submitPeraturan(){
		
		$id_instansi=$this->input->post('id_instansi');
		$judul=$this->input->post('judul');
		$tahun=$this->input->post('tahun');
		$id_regulator=$this->input->post('id_regulator');
		$entry_date=$this->input->post('entry_date');
		$masa_berlaku=$this->input->post('masa_berlaku');
		$id_admin=$_SESSION['id_admin'];
		
		$this->form_validation->set_rules('id_instansi','id_instansi','required');
		$this->form_validation->set_rules('judul','judul','required');
		$this->form_validation->set_rules('id_regulator','id_regulator','required');
		$this->form_validation->set_rules('masa_berlaku','masa_berlaku','required');

		if($this->form_validation->run()==false){
			echo "<script>
			alert('Form kurang lengkap');
			document.location='".base_url()."admin/buatPeraturan';
			</script>";
		}
		
		$config['upload_path']          = 'files';
        $config['allowed_types']        = '*';
        $config['max_size']             = 0;
  
	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);
	    if (!$this->upload->do_upload('file')) {
	        $error = ['error' => $this->upload->display_errors()];
	        //var_dump($error);
	        echo "<script>alert('Upload Gagal!');
				document.location='".base_url()."admin/buatPeraturan';
				</script>";
	        redirect(base_url('admin/buatPeraturan'));
	    } else {
	    	$file=$this->upload->data();
	        $data = array(
	          	'file' => $file['file_name'],
	          	'id_instansi'=>$id_instansi,
				'judul'=>$judul,
				'tahun'=>$tahun,
				'id_regulator'=>$id_regulator,
				'entry_date'=>date('Y-m-d'),
				'masa_berlaku'=>$masa_berlaku,
				'id_admin'=>$id_admin
	      		);
	          $this->model_peraturan->insert_peraturan($data, 'tb_peraturan');
	          echo "<script>alert('Peraturan Tersimpan');
				document.location='".base_url()."admin/buatPeraturan';
				</script>";
	          redirect(base_url('admin/buatPeraturan'));
	    }
	}

	function hapusPeraturan($id){
		 $this->db->where('id_peraturan',$id);
    	 $query = $this->db->get('tb_peraturan');
     		$row = $query->row();

     	unlink("./files/$row->file");

		$this->db->delete('tb_peraturan', array('id_peraturan' => $id));
		redirect(base_url('admin/buatPeraturan'));
	}
	//hapus peraturan


	public function downloadPeraturan($id){
    	if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->model_peraturan->getRows(array('id_peraturan' => $id));
            
            //file path
            $file = 'files/'.$fileInfo['file'];
            
            //download file from directory
            force_download($file, NULL);
        }else{
        	echo "<script>alert('File tidak ditemukan!');
			document.location='".base_url()."admin/buatPeraturan';
			</script>";
        }
	}
	//edit peraturan 
	public function editPeraturan($id){
		$data['title']='Edit Peraturan';
		$where = array('id_peraturan' => $id
					);
		$data['tb_peraturan']=$this->model_peraturan->edit_peraturan($where,'tb_peraturan')->result();
		$data['tb_instansi']=$this->db->get('tb_instansi')->result();
		//$data['unit']=$this->model_peraturan->get_unit_user();
		$data['regulator']=$this->db->get('regulator')->result();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/editPeraturan',$data);
	}

	//update peraturan
	//update peraturan
	public function updatePeraturan(){
		$id_peraturan=$this->input->post('id_peraturan');
		$judul=$this->input->post('judul');
		$id_instansi=$this->input->post('id_instansi');
		$tahun=$this->input->post('tahun');
		$id_regulator=$this->input->post('id_regulator');
		$masa_berlaku=$this->input->post('masa_berlaku');
		$entry_date=$this->input->post('entry_date');
		
		$config['upload_path']          = 'files';
        $config['allowed_types']        = '*';
        $config['max_size']             = 0;
  		$config['overwrite'] = TRUE;

	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);

	    if (!$this->upload->do_upload('file')) {
	        $error = ['error' => $this->upload->display_errors()];
	        //var_dump($error);
	        echo "<script>alert('File Harus Ada Yang DiUpload!');
				document.location='".base_url()."admin/buatPeraturan';
				</script>";
	        //redirect(base_url('admin/buatPeraturan'));
	    } else {
	    	$file=$this->upload->data();
	        $data = array(
	          	'file' => $file['file_name'],
	          	'id_instansi'=>$id_instansi,
				'judul'=>$judul,
				'tahun'=>$tahun,
				'id_regulator'=>$id_regulator,
				'entry_date'=>date('Y-m-d'),
				'masa_berlaku'=>$masa_berlaku
	      		);
	        $where=array('id_peraturan'=>$id_peraturan);
	          $this->model_peraturan->update_peraturan($where, $data, 'tb_peraturan');
	          echo "<script>alert('Peraturan Tersimpan');
				document.location='".base_url()."admin/buatPeraturan';
				</script>";
	          redirect(base_url('admin/buatPeraturan'));
	    }
		
	}


	/////////////////////////////////CATATAN MUTU//////////////////////////////////////////


	public function buatCatatanMutu(){
		$data['title']='Catatan Baru';
		$data['status_cm']=$this->model_catatan_mutu->get_status_cm();
		$data['metode']=$this->model_catatan_mutu->get_metode();
		$data['catatan_mutu']=$this->model_catatan_mutu->get_catatan();

		//filter search...
		$filter=$this->input->post('filter');
		$field=$this->input->post('field');
		$search=$this->input->post('search');
		if (isset($filter) && !empty($search)) {
           $data['catatan_mutu'] = $this->model_catatan_mutu->getCatatanWhereLike($field, $search);
        } else {
            $data['catatan_mutu'] = $this->model_catatan_mutu->get_catatan();
        }

		$this->load->view('admin/header',$data);
		$this->load->view('admin/catatanMutu',$data);
	}


	public function submitCatatan(){
		$judul=$this->input->post('judul');
		//$id_catatan=$this->input->post('id_catatan');
		$id_status_cm=$this->input->post('id_status_cm');
		$masa_berlaku=$this->input->post('masa_berlaku');
		$lokasi_simpan=$this->input->post('lokasi_simpan');
		$id_metode=$this->input->post('id_metode');
		$keterangan=$this->input->post('keterangan');
		$entry_date=$this->input->post('entry_date');
		$id_admin=$_SESSION['id_admin'];

		$this->form_validation->set_rules('judul','judul','required');
		$this->form_validation->set_rules('id_catatan','id_catatan','required');
		$this->form_validation->set_rules('id_status_cm','id_status_cm','required');
		$this->form_validation->set_rules('masa_berlaku','masa_berlaku','required');
		$this->form_validation->set_rules('lokasi_simpan','lokasi_simpan','required');
		$this->form_validation->set_rules('id_metode','id_metode','required');

		if($this->form_validation->run()==FALSE){
			echo "<script>
			alert('Form kurang lengkap');
			document.location='".base_url()."admin/buatCatatanMutu';
			</script>";
		}
		$config['upload_path']          = 'files/catatan';
        $config['allowed_types']        = '*';
        $config['max_size']             = 0;
  
	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);
	    if (!$this->upload->do_upload('file')) {
	        $error = ['error' => $this->upload->display_errors()];
	        //var_dump($error);
	        echo "<script>alert('Upload Gagal!');
				document.location='".base_url()."admin/buatCatatanMutu';
				</script>";
	        redirect(base_url('admin/buatCatatanMutu'));
	    } else {
	    	$catatan=$this->upload->data();
	        $data = array(
	          	'file' => $catatan['file_name'],
	          	'id_status_cm'=>$id_status_cm,
				'judul'=>$judul,
				//'id_catatan'=>$id_catatan,
				'masa_berlaku'=>$masa_berlaku,
				'lokasi_simpan'=>$lokasi_simpan,
				'entry_date'=>date('Y-m-d'),
				'id_metode'=>$id_metode,
				'id_admin'=>$id_admin
	      		);
	          $this->model_catatan_mutu->insert_catatan($data, 'catatan_mutu');
	          echo "<script>alert('Catatan Tersimpan');
				document.location='".base_url()."admin/buatCatatanMutu';
				</script>";
	          redirect(base_url('admin/buatCatatanMutu'));
	          $this->model_catatan_mutu->insert_catatan($data, 'catatan_mutu');
	    }

		
	}


	public function editCatatan($id){
		$data['title']='Edit Catatan';
		$where = array('id_catatan' => $id
					);
		$data['status_cm']=$this->db->get('status_cm')->result();
		$data['metode']=$this->db->get('metode')->result();
		$data['catatan_mutu']=$this->model_catatan_mutu->edit_catatan($where,'catatan_mutu')->result();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/editCatatan',$data);
	}

	public function updateCatatan(){
		$judul=$this->input->post('judul');
		$id_status_cm=$this->input->post('id_status_cm');
		$masa_berlaku=$this->input->post('masa_berlaku');
		$lokasi_simpan=$this->input->post('lokasi_simpan');
		$id_metode=$this->input->post('id_metode');
		$keterangan=$this->input->post('keterangan');
		$entry_date=$this->input->post('entry_date');
		$id_catatan=$this->input->post('id_catatan');
		
		$config['upload_path']          = 'files/catatan';
        $config['allowed_types']        = '*';
        $config['max_size']             = 0;
  		$config['overwrite'] = TRUE;

	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);

	    if (!$this->upload->do_upload('file')) {
	        $error = ['error' => $this->upload->display_errors()];
	        //var_dump($error);
	        echo "<script>alert('File Harus Ada Yang Diupload!');
				document.location='".base_url()."admin/buatCatatanMutu';
				</script>";
	        //redirect(base_url('admin/buatPeraturan'));
	    } else {
	    	$catatan=$this->upload->data();
	        $data = array(
	          	'file' => $catatan['file_name'],
	          	'id_status_cm'=>$id_status_cm,
				'judul'=>$judul,
				'masa_berlaku'=>$masa_berlaku,
				'lokasi_simpan'=>$lokasi_simpan,
				'entry_date'=>date('Y-m-d'),
				'keterangan'=>$keterangan,
				'id_metode'=>$id_metode
	      	);
	        $where=array('id_catatan'=>$id_catatan);
	        $this->model_catatan_mutu->update_catatan($where, $data, 'catatan_mutu');
	        echo "<script>alert('Peraturan Tersimpan');
				document.location='".base_url()."admin/buatCatatanMutu';
				</script>";
	          redirect(base_url('admin/buatCatatanMutu'));
	    }
		
		
	}

	public function downloadCM($id){
    	if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->model_catatan_mutu->getRows(array('id_catatan' => $id));
            
            //file path
            $file = 'files/catatan/'.$fileInfo['file'];
            
            //download file from directory
            force_download($file, NULL);
        }else{
        	echo "<script>alert('File tidak ditemukan!');
			document.location='".base_url()."admin/buatCatatanMutu';
			</script>";
        }
	}

	//hapus catatan
	function hapusCatatan($id){
		 $this->db->where('id_catatan',$id);
    	 $query = $this->db->get('catatan_mutu');
     	$row = $query->row();

     	unlink("./files/catatan/$row->file");

		$this->db->delete('catatan_mutu', array('id_catatan' => $id));
		redirect(base_url('admin/buatCatatanMutu'));
	}








//////////////////////////////OTHER SETTINGS////////////////////////////////////////////////



	public function formTambahRegulator(){
		$data['title']='Settings Regulator';
		$data['regulator']=$this->model_peraturan->get_regulator();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/formTambahRegulator',$data);
	}

	public function addRegulator(){
		$regulator=$this->input->post('regulator');
		$data=array(
			'regulator'=>$regulator
		);
		$this->model_peraturan->insert_regulator($data, 'regulator');
		redirect(base_url('admin/formTambahRegulator'));
	}
	public function hapusRegulator($id){
		$this->db->where('id_regulator',$id);
    	 $query = $this->db->get('regulator');
     	$row = $query->row();
		$this->db->delete('regulator', array('id_regulator' => $id));
		redirect(base_url('admin/formTambahRegulator'));
	}
	//REGULATOR 
	
	public function formTambahJenis(){
		$data['title']='Settings Jenis';
		$data['tb_jenis_dokumen']=$this->model_dokumen_baru->get_jenis_dokumen();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/formTambahJenis',$data);
	}

	public function addJenis(){
		$jenis_dokumen=$this->input->post('jenis_dokumen');
		$data=array(
			'jenis_dokumen'=>$jenis_dokumen
		);
		$this->model_dokumen_baru->insert_jenis($data, 'tb_jenis_dokumen');
		redirect(base_url('admin/formTambahJenis'));
	}
	public function hapusJenis($id){
		$this->db->where('id_jenis_dokumen',$id);
    	 $query = $this->db->get('tb_jenis_dokumen');
     	$row = $query->row();
		$this->db->delete('tb_jenis_dokumen', array('id_jenis_dokumen' => $id));
		redirect(base_url('admin/formTambahJenis'));
	}
	//JENIS

	public function formTambahInstansi(){
		$data['title']='Settings Instansi';
		$data['tb_instansi']=$this->model_peraturan->get_instansi();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/formTambahInstansi',$data);
	}

	public function addInstansi(){
		$instansi=$this->input->post('instansi');
		$data=array(
			'instansi'=>$instansi
		);
		$this->model_peraturan->insert_instansi($data, 'tb_instansi');
		redirect(base_url('admin/formTambahInstansi'));
	}
	public function hapusInstansi($id){
		$this->db->where('id_instansi',$id);
    	 $query = $this->db->get('tb_instansi');
     	$row = $query->row();
		$this->db->delete('tb_instansi', array('id_instansi' => $id));
		redirect(base_url('admin/formTambahInstansi'));
	}
	//INSTANSI

	//REGISTRASI 
	public function formRegistrasi(){
		$data['title']='New User';
		$data['unit']=$this->model_login->get_unit();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/formRegistrasi',$data);
	}

	public function register(){
		$nama=$this->input->post('nama');
		$id_unit=$this->input->post('id_unit');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$tipe=$this->input->post('tipe');
		if($id_unit==1 || $id_unit==5){
			$data=array(
				'nama'=>$nama,
				'id_unit'=>$id_unit,
				'username'=>$username,
				'password'=>sha1($password),
				'date_user'=>date('Y-m-d'),
				'tipe'=>0
			);
			$this->model_login->addUser($data, 'tb_admin');
			redirect(base_url('admin/formRegistrasi'));
		}else{
			$data=array(
				'nama'=>$nama,
				'id_unit'=>$id_unit,
				'username'=>$username,
				'password'=>sha1($password),
				'date_user'=>date('Y-m-d'),
				'tipe'=>1
			);
			$this->model_login->addUser($data, 'tb_admin');
			redirect(base_url('admin/formRegistrasi'));
		}
	}

	function addUnit(){
		$unit=$this->input->post('unit');
		$data=array('unit'=>$unit);
		$this->model_login->addUnit($data, 'unit');
		redirect(base_url('admin/formRegistrasi'));
	}
	function hapusUnit($id){
		$this->db->where('unit',$id);
    	 $query = $this->db->get('unit');
     	$row = $query->row();
		$this->db->delete('unit', array('id_unit' => $id));
		redirect(base_url('admin/formRegistrasi'));
	}

	//Ubah Password 
	public function formUbahPassword(){
		$data['title']='My Profile';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/formUbahPassword',$data);
	}
	public function ubahPassword(){
		$nama=$this->input->post('nama');
		$username=$this->input->post('username');
		$oldpass=$this->input->post('oldPass');
		$newpass=$this->input->post('newPass');
		$confirmPass=$this->input->post('confirmPass');

		if($confirmPass==$newpass){
			$data=array('password'=>sha1($newpass));
			$where=array('nama'=>$this->session->userdata('nama'));
			 $this->model_login->edit_pass($where, $data, 'tb_admin');
	       	redirect(base_url('admin/formUbahPassword'));
	     }
	     else{
	        echo '<script>
	        alert("Password baru dan konfirmasi tidak sama");
	        document.location="'.base_url('admin/formUbahPassword').'";
	        </script>';
		}
		
		
	}


	//////////////////////////////////FUNGSI EXPORT ///////////////////////////////////////////////////////////
	//export ke dalam format excel
     public function exportUnit(){
      	$dari=$this->input->post('dari');
      	$sampai=$this->input->post('sampai');
      	if(isset($_POST['export'])) {
      		$data['tb_jenis_dokumen']=$this->model_dokumen_baru->get_jenis_dokumen();
			$data['status_dokumen']=$this->model_dokumen_baru->get_status();
      		$data['tb_dokumen_baru'] = $this->model_dokumen_baru->getDokumenExportLike($dari, $sampai);
      	}else{
      		$data['tb_jenis_dokumen']=$this->model_dokumen_baru->get_jenis_dokumen();
			$data['status_dokumen']=$this->model_dokumen_baru->get_status();
			$data['tb_dokumen_baru']=$this->model_dokumen_baru->get_dokumen();
      		$data['tb_dokumen_baru'] = $this->model_dokumen_baru->get_dokumen();
      	}
          // $data = array( 'title' => 'Laporan Dokumen Unit',
            //    'tb_dokumen_baru' => $this->model_dokumen_baru->get_dokumen());
 
           $this->load->view('admin/export_dokumen_unit',$data);
      }

      public function exportPeraturan(){
      	$dari=$this->input->post('dari');
      	$sampai=$this->input->post('sampai');
      	if (isset($_POST['export'])) {
      		$data['tb_instansi']=$this->model_peraturan->get_instansi();
			$data['regulator']=$this->model_peraturan->get_regulator();
      		$data['tb_peraturan'] = $this->model_peraturan->getPeraturanExportLike($dari, $sampai);
      	}else{
      		$data['tb_instansi']=$this->model_peraturan->get_instansi();
			$data['regulator']=$this->model_peraturan->get_regulator();
      		$data['tb_peraturan'] = $this->model_peraturan->get_peraturan();
      	}
          // $data = array( 'title' => 'Laporan Dokumen Unit',
            //    'tb_dokumen_baru' => $this->model_dokumen_baru->get_dokumen());
 
           $this->load->view('admin/exportPeraturan',$data);
      }

      public function exportCatatan(){
      	$dari=$this->input->post('dari');
      	$sampai=$this->input->post('sampai');
      	if (isset($_POST['export'])) {
      		$data['status_cm']=$this->model_catatan_mutu->get_status_cm();
			$data['metode']=$this->model_catatan_mutu->get_metode();
      		$data['catatan_mutu'] = $this->model_catatan_mutu->getCatatanExportLike($dari, $sampai);
      	}else{
      		$data['status_cm']=$this->model_catatan_mutu->get_status_cm();
			$data['metode']=$this->model_catatan_mutu->get_metode();
      		$data['catatan_mutu'] = $this->model_catatan_mutu->get_catatan();
      	}
          // $data = array( 'title' => 'Laporan Dokumen Unit',
            //    'tb_dokumen_baru' => $this->model_dokumen_baru->get_dokumen());
 
           $this->load->view('admin/exportCatatan',$data);
      }
	
	


}


