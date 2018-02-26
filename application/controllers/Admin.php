<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
 
	public function __construct(){
	parent::__construct();
	$this->load->model('model_peraturan');
	$this->load->model('model_dokumen_baru');
	$this->load->model('model_catatan_mutu');
	$this->load->helper('url');
	$this->load->library('form_validation');
	$this->load->library('session');

	
	}

	function index(){
		$data['title']='Admin Dashboard';
		$data['count_baru']=$this->model_dokumen_baru->count_baru();
		$data['count_revisi']=$this->model_dokumen_baru->count_revisi();
		$data['count_setuju']=$this->model_dokumen_baru->count_setuju();
		$data['count_unit']=$this->model_dokumen_baru->count_unit();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/dashboard', $data);
	}


	//Buat Dokumen Baru 

	public function buatDokumenBaru(){
		$data['title']='Buat Baru';
		$data['tb_jenis_dokumen']=$this->model_dokumen_baru->get_jenis_dokumen();
		$data['revisi']=$this->model_dokumen_baru->get_revisi();
		//$data['unit']=$this->model_dokumen_baru->get_unit_admin();
		$data['status_dokumen']=$this->model_dokumen_baru->get_status();
		$data['tb_dokumen_baru']=$this->model_dokumen_baru->get_dokumen();

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
		$nama_dokumen=$this->input->post('nama_dokumen');
		$id_status_dokumen=$this->input->post('id_status_dokumen');
		$id_revisi=$this->input->post('id_revisi');
		$keterangan=$this->input->post('keterangan');
		$entry_date=$this->input->post('entry_date');
		//$id_unit=$this->input->post('id_unit');


		$file = $_FILES['file']['name'];
    	$file_loc = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_type = $_FILES['file']['type'];
		$folder="./files/";
		
		$data=array(
			'id_jenis_dokumen'=>$id_jenis_dokumen,
			'nama_dokumen'=>$nama_dokumen,
			'id_revisi'=>$id_revisi,
			'keterangan'=>$keterangan,
			'file'=>$file,
			'keterangan'=>$keterangan,
			'id_status_dokumen'=>$id_status_dokumen,
			'entry_date'=>$entry_date
		);
		$this->session->set_userdata('nama',$data);
		echo "<script>alert('Dokumen Tersimpan');
			document.location='".base_url()."admin/buatDokumenBaru';
			</script>";
		 move_uploaded_file($file_loc,$folder.$file);
		$this->model_dokumen_baru->insert_dokumen($data, 'tb_dokumen_baru');
		//Save the file name into the db
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
		$data['tb_jenis_dokumen']=$this->model_dokumen_baru->get_jenis_dokumen();
		$data['revisi']=$this->model_dokumen_baru->get_revisi();
		//$data['unit']=$this->model_dokumen_baru->get_unit_user();
		$data['status_dokumen']=$this->model_dokumen_baru->get_status();
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
		$keterangan=$this->input->post('keterangan');
		$entry_date=$this->input->post('entry_date');
		
		IF($_FILES['file']['name']!=''){
			$file='./files/';
			@unlink($file);
           	$tmp_name = $_FILES["file"]["tmp_name"];
           	$namefile = $_FILES["file"]["name"];
			$ext = end(explode(".", $namefile));
			$image_name=time().".".$ext;
            $fileUpload = move_uploaded_file($tmp_name,"./files/".$image_name);
		}else{
			$image_name=$edit['file'];
		}

		$data=array(
			'id_dokumen'=>$id_dokumen,
			'nama_dokumen'=>$nama_dokumen,
			'id_jenis_dokumen'=>$id_jenis_dokumen,
			'id_status_dokumen'=>$id_status_dokumen,
			'id_revisi'=>$id_revisi,
			'keterangan'=>$keterangan,
			'entry_date'=>$entry_date,
			'file'=>$image_name
		);
		$where=array('id_dokumen'=>$id_dokumen);
		//die($data);
		$this->session->set_userdata('nama',$data);
		echo "<script>alert('Dokumen Tersimpan');
			document.location='".base_url()."admin/buatDokumenBaru';
			</script>";
		$this->model_dokumen_baru->update_dokumen($where, $data, 'tb_dokumen_baru');


	}

	//hapus dokumen
	function hapusDokumen($id){
		 $this->db->where('id_dokumen',$id);
    	 $query = $this->db->get('tb_dokumen_baru');
     	$row = $query->row();

     	unlink("./files/$row->file");

     	
     	echo "<script>alert('Dokumen Terhapus');
			document.location='".base_url()."admin/buatDokumenBaru';
			</script>";
		$this->db->delete('tb_dokumen_baru', array('id_dokumen' => $id));

	}






	//////////////////////////////////////Peraturan external/////////////////////////////////////
	public function buatPeraturan(){
		$data['title']='Peraturan Baru';
		$data['tb_instansi']=$this->model_peraturan->get_instansi();
		$data['regulator']=$this->model_peraturan->get_regulator();
		$data['tb_peraturan']=$this->model_peraturan->get_peraturan();
		//$data['unit']=$this->model_peraturan->get_unit_admin();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/peraturan',$data);
	}

	//submit peraturan 
	public function submitPeraturan(){
		$id_instansi=$this->input->post('id_instansi');
		$judul=$this->input->post('judul');
		$tahun=$this->input->post('tahun');
		$id_regulator=$this->input->post('id_regulator');
		$entry_date=$this->input->post('entry_date');
		$masa_berlaku=$this->input->post('masa_berlaku');
		$id_admin=$_SESSION['id_admin'];

		$this->load->library('upload');
		$this->load->library('session');
		
		$file = $_FILES['file']['name'];
    	$file_loc = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_type = $_FILES['file']['type'];
		$folder="./files/";

		$data=array(
			'id_instansi'=>$id_instansi,
			'judul'=>$judul,
			'tahun'=>$tahun,
			'id_regulator'=>$id_regulator,
			'entry_date'=>$entry_date,
			'masa_berlaku'=>$masa_berlaku,
			'file'=>$file,
			'id_admin'=>$id_admin
		);
		

		echo "<script>alert('Peraturan Tersimpan');
			document.location='".base_url()."admin/buatPeraturan';
			</script>";
		move_uploaded_file($file_loc,$folder.$file);
		$this->model_peraturan->insert_peraturan($data, 'tb_peraturan');


	}

	function hapusPeraturan($id){
		 $this->db->where('id_peraturan',$id);
    	 $query = $this->db->get('tb_peraturan');
     		$row = $query->row();

     	unlink("./files/$row->file");

     	
     	echo "<script>alert('Peraturan Terhapus');
			document.location='".base_url()."admin/buatPeraturan';
			</script>";
		$this->db->delete('tb_peraturan', array('id_peraturan' => $id));
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
		$data['tb_instansi']=$this->model_peraturan->get_instansi();
		//$data['unit']=$this->model_peraturan->get_unit_user();
		$data['regulator']=$this->model_peraturan->get_regulator();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/editPeraturan',$data);
	}

	//update peraturan
	public function updatePeraturan(){
		$id_peraturan=$this->input->post('id_peraturan');
		$judul=$this->input->post('judul');
		$id_instansi=$this->input->post('id_instansi');
		$tahun=$this->input->post('tahun');
		$id_regulator=$this->input->post('id_regulator');
		$masa_berlaku=$this->input->post('masa_berlaku');
		$entry_date=$this->input->post('entry_date');
		
		IF($_FILES['file']['name']!=''){
			$file='./files/';
			@unlink($file);
           	$tmp_name = $_FILES["file"]["tmp_name"];
           	$namefile = $_FILES["file"]["name"];
			$ext = end(explode(".", $namefile));
			$image_name=time().".".$ext;
            $fileUpload = move_uploaded_file($tmp_name,"./files/".$image_name);
		}else{
			$image_name=$edit['file'];
		}

		$data=array(
			'id_peraturan'=>$id_peraturan,
			'judul'=>$judul,
			'id_instansi'=>$id_instansi,
			'tahun'=>$tahun,
			'id_regulator'=>$id_regulator,
			'masa_berlaku'=>$masa_berlaku,
			'entry_date'=>date('Y-m-d'),
			'file'=>$image_name
		);
		$where=array('id_peraturan'=>$id_peraturan);
		//die($data);

		echo "<script>alert('Peraturan Tersimpan');
			document.location='".base_url()."admin/buatPeraturan';
			</script>";
		
		$this->model_dokumen_baru->update_peraturan($where, $data, 'tb_peraturan');
	}


	/////////////////////////////////CATATAN MUTU//////////////////////////////////////////


	public function buatCatatanMutu(){
		$data['title']='Catatan Baru';
		$data['status_cm']=$this->model_catatan_mutu->get_status_cm();
		$data['metode']=$this->model_catatan_mutu->get_metode();
		$data['catatan_mutu']=$this->model_catatan_mutu->get_catatan();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/catatanMutu',$data);
	}


	public function submitCatatan(){
		$judul=$this->input->post('judul');
		$id_status_cm=$this->input->post('id_status_cm');
		$masa_berlaku=$this->input->post('masa_berlaku');
		$lokasi_simpan=$this->input->post('lokasi_simpan');
		$id_metode=$this->input->post('id_metode');
		$keterangan=$this->input->post('keterangan');
		$entry_date=$this->input->post('entry_date');
		$id_admin=$_SESSION['id_admin'];

		$file = $_FILES['file']['name'];
    	$file_loc = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_type = $_FILES['file']['type'];
		$folder="./files/catatan/";

		$data=array(
			'judul'=>$judul,
			'id_status_cm'=>$id_status_cm,
			'masa_berlaku'=>$masa_berlaku,
			'lokasi_simpan'=>$lokasi_simpan,
			'file'=>$file,
			'keterangan'=>$keterangan,
			'id_metode'=>$id_metode,
			'entry_date'=>date('Y-m-d'),
			'id_admin'=>$id_admin
		);
		

		echo "<script>alert('Catatan Baru Tersimpan');
			document.location='".base_url()."admin/buatCatatanMutu';
			</script>";
		 move_uploaded_file($file_loc,$folder.$file);
		$this->model_catatan_mutu->insert_catatan($data, 'catatan_mutu');

	}
	public function editCatatan($id){
		$data['title']='Edit Catatan';
		$where = array('id_catatan' => $id
					);
		$data['status_cm']=$this->model_catatan_mutu->get_status_cm();
		$data['metode']=$this->model_catatan_mutu->get_metode();
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
		
		IF($_FILES['file']['name']!=''){
			$file='./files/catatan/';
			@unlink($file);
           	$tmp_name = $_FILES["file"]["tmp_name"];
           	$namefile = $_FILES["file"]["name"];
			$ext = end(explode(".", $namefile));
			$image_name=time().".".$ext;
            $fileUpload = move_uploaded_file($tmp_name,"./files/".$image_name);
		}else{
			$image_name=$edit['file'];
		}

		$data=array(
			'id_catatan'=>$id_catatan,
			'judul'=>$judul,
			'id_status_cm'=>$id_status_cm,
			'masa_berlaku'=>$masa_berlaku,
			'lokasi_simpan'=>$lokasi_simpan,
			'keterangan'=>$keterangan,
			'entry_date'=>date('Y-m-d'),
			'file'=>$image_name,
			'id_metode'=>$id_metode
		);
		$where=array('id_catatan'=>$id_catatan);
		//die($data);

		echo "<script>alert('Catatan Tersimpan');
			document.location='".base_url()."admin/buatCatatanMutu';
			</script>";
		
		$this->model_catatan_mutu->update_catatan($where, $data, 'catatan_mutu');
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

     	
     	echo "<script>alert('Catatan Terhapus');
			document.location='".base_url()."admin/buatCatatanMutu';
			</script>";
		$this->db->delete('catatan_mutu', array('id_catatan' => $id));

	}

	


}


