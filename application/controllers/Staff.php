<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Staff extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('model_peraturan');
		$this->load->model('model_dokumen_baru');
		$this->load->model('model_catatan_mutu');
		$this->load->model('model_login');
		 $this->load->helper('url');
		  $this->load->library('form_validation');
		  $this->load->library('session');


		 if($this->session->userdata('logged_in') != 'Sudah Login'){
			redirect(base_url('auth'));
		}
	}

	public function index()
	{
		$data['title']='Staff Dashboard';
		$data['tb_dokumen_baru']=$this->model_dokumen_baru->get_dokumen_setuju();
		$data['count_baru']=$this->model_dokumen_baru->count_baru();
		$data['count_revisi']=$this->model_dokumen_baru->count_revisi();
		$data['count_setuju']=$this->model_dokumen_baru->count_setuju();
		$data['count_unit']=$this->model_dokumen_baru->count_unit();
		$this->load->view('staff/header',$data);
		$this->load->view('staff/dashboard', $data);
	}



	/////////////////////////////// DOKUMEN UNIT ////////////////////////////////////////////////

	//Buat Dokumen Baru 

	public function buatDokumenBaru(){
		$data['title']='Buat Baru';
		$data['tb_jenis_dokumen']=$this->model_dokumen_baru->get_jenis_dokumen();
		$data['revisi']=$this->model_dokumen_baru->get_revisi();
		//$data['unit']=$this->model_dokumen_baru->get_unit_user();
		//$data['catatan_mutu']=$this->model_catatan_mutu->get_judul();
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

		$this->load->view('staff/header',$data);
		$this->load->view('staff/dokumenUtama',$data);
	}

	public function detailUtama(){
		$data['title']='Detail Dokumen';
		
		$data['tb_jenis_dokumen']=$this->model_dokumen_baru->get_jenis_dokumen();
		$data['revisi']=$this->model_dokumen_baru->get_revisi();
		//$data['unit']=$this->model_dokumen_baru->get_unit_user();
		$data['catatan_mutu']=$this->model_catatan_mutu->get_judul();
		$data['status_dokumen']=$this->model_dokumen_baru->get_status();
		$data['tb_dokumen_baru']=$this->model_dokumen_baru->get_dokumen();
		$data['internal']=$this->model_dokumen_baru->get_detail();

		//filter search...
		$filter=$this->input->post('filter');
		$field=$this->input->post('field');
		$search=$this->input->post('search');
		if (isset($filter) && !empty($search)) {
           $data['internal'] = $this->model_dokumen_baru->getDetailWhereLike($field, $search);
        } else {
            $data['internal'] = $this->model_dokumen_baru->get_detail();
        }

		$this->load->view('staff/header',$data);
		$this->load->view('staff/detailUtama',$data);
	}
	//Submit Dokumen

	public function submitDokumen(){
		$data['title']='Submit';
		//set library
		$this->load->library('upload');
		$this->load->library('session');
		//retrieve value from form
		$id_jenis_dokumen=$this->input->post('id_jenis_dokumen');
		//$id_dokumen=$this->input->post('id_dokumen');
		$nama_dokumen=$this->input->post('nama_dokumen');
		$id_status_dokumen=$this->input->post('id_status_dokumen');
		$id_revisi=$this->input->post('id_revisi');
		$keterangan=$this->input->post('keterangan');
		$entry_date=$this->input->post('entry_date');
		$id_admin=$_SESSION['id_admin'];
		$kode=$this->input->post('kode');

		$config['upload_path']          = 'files';
        $config['allowed_types']        = '*';
        $config['max_size']             = 0;
  
        $this->form_validation->set_rules('id_jenis_dokumen','id_jenis_dokumen','required');
        $this->form_validation->set_rules('nama_dokumen','nama_dokumen','required');
        $this->form_validation->set_rules('id_status_dokumen','id_status_dokumen','required');
        $this->form_validation->set_rules('id_revisi','id_revisi','required');

	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);

	    if($this->form_validation->run()==FALSE){
	    	echo "<script>alert('Form kurang lengkap');
			document.location='".base_url()."staff/buatDokumenBaru';
			</script>";
	    }
	    else {
	    	if (!$this->upload->do_upload('file')) {
	        $error = ['error' => $this->upload->display_errors()];
	        //var_dump($error);
	        echo "<script>alert('Upload Gagal!');
				document.location='".base_url()."staff/buatDokumenBaru';
				</script>";
	        redirect(base_url('staff/buatDokumenBaru'));
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
				'entry_date'=>date('Y-m-d'),
				'id_admin'=>$id_admin
	      		);
	      	
	          $this->model_dokumen_baru->insert_dokumen($data, 'tb_dokumen_baru');
	          redirect(base_url('staff/buatDokumenBaru'));
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
			document.location='".base_url()."staff/buatDokumenBaru';
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
		$data['status_dokumen']=$this->db->query('SELECT
        status_dokumen.id_status_dokumen,
        status_dokumen.status_dokumen
        FROM
        status_dokumen
        WHERE
        status_dokumen.id_status_dokumen <>  2')->result();
		$data['tb_dokumen_baru'] = $this->model_dokumen_baru->edit_dokumen($where,'tb_dokumen_baru')->result();

		$this->load->view('staff/header',$data);
		$this->load->view('staff/editDokumenUtama',$data);
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
				document.location='".base_url()."staff/buatDokumenBaru';
				</script>";
	        	//redirect(base_url('staff/editDokumen'));
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
	          	redirect(base_url('staff/buatDokumenBaru'));
	    }
		
		
	}

	public function addDetail(){
		$id_dokumen=$this->input->post('id_dokumen');
		$id_catatan=$this->input->post('id_catatan');
		$data=array(
			'id_dokumen'=>$id_dokumen,
			'id_catatan'=>$id_catatan
		);
		
		$this->model_dokumen_baru->insert_detail($data, 'internal');
		redirect(base_url('staff/detailUtama'));
	}

	public function hapusTautan($id){
		$this->db->where('id',$id);
    	 $query = $this->db->get('internal');
     	$row = $query->row();

		$this->db->delete('internal', array('id' => $id));
		redirect(base_url('staff/detailUtama'));
	}












	/////////////////////////////////CATATAN MUTU//////////////////////////////////////////


	public function buatCatatanMutu(){
		$data['title']='Catatan Baru';
		$data['status_cm']=$this->model_catatan_mutu->get_status_cm();
		$data['metode']=$this->model_catatan_mutu->get_metode();
		$data['catatan_mutu']=$this->model_catatan_mutu->get_catatan();
		$data['tb_dokumen_baru']=$this->model_catatan_mutu->get_dokumen_terkait();

		//filter search...
		$filter=$this->input->post('filter');
		$field=$this->input->post('field');
		$search=$this->input->post('search');
		if (isset($filter) && !empty($search)) {
           $data['catatan_mutu'] = $this->model_catatan_mutu->getCatatanWhereLike($field, $search);
        } else {
            $data['catatan_mutu'] = $this->model_catatan_mutu->get_catatan();
        }

		$this->load->view('staff/header',$data);
		$this->load->view('staff/catatanMutu',$data);
	}


	public function submitCatatan(){
		//$id_catatan=$this->input->post('id_catatan');
		$judul=$this->input->post('judul');
		$id_status_cm=$this->input->post('id_status_cm');
		$masa_berlaku=$this->input->post('masa_berlaku');
		$lokasi_simpan=$this->input->post('lokasi_simpan');
		$id_metode=$this->input->post('id_metode');
		$keterangan=$this->input->post('keterangan');
		$entry_date=$this->input->post('entry_date');
		$id_admin=$_SESSION['id_admin'];

		$config['upload_path']          = 'files/catatan';
        $config['allowed_types']        = '*';
        $config['max_size']             = 0;
  		$config['overwrite'] = TRUE;

	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);


		//$this->form_validation->set_rules('id_catatan','id_catatan','required');
		$this->form_validation->set_rules('judul','judul','required');
		$this->form_validation->set_rules('id_status_cm','id_status_cm','required');
		$this->form_validation->set_rules('masa_berlaku','masa_berlaku','required');
		$this->form_validation->set_rules('lokasi_simpan','lokasi_simpan','required');
		$this->form_validation->set_rules('id_metode','id_metode','required');

		if($this->form_validation->run()==FALSE){
	    	echo "<script>alert('Form kurang lengkap');
			document.location='".base_url()."staff/buatCatatanMutu';
			</script>";
	    }else {
	    	 if (!$this->upload->do_upload('file')) {
	        $error = ['error' => $this->upload->display_errors()];
	        //var_dump($error);
	        
	        echo "<script>alert('Upload Gagal!');
				document.location='".base_url()."staff/buatCatatanMutu';
				</script>";
			
			
	        //redirect(base_url('admin/buatDokumenBaru'));
	    }else {
	    	$catatan=$this->upload->data();
	        $data = array(
	          	'file' => $catatan['file_name'],
	          	'judul'=>$judul,
	          	'id_status_cm'=>$id_status_cm,
	          	'masa_berlaku'=>$masa_berlaku,
				'lokasi_simpan'=>$lokasi_simpan,
				'id_metode'=>$id_metode,
				'keterangan'=>$keterangan,
				'entry_date'=>date('Y-m-d'),
				'id_admin'=>$id_admin
	      		);
	      	
	          $this->model_catatan_mutu->insert_catatan($data, 'catatan_mutu');
	          echo "<script>alert('Catatan Mutu Tersimpan');
				</script>";
	          redirect(base_url('staff/buatCatatanMutu'));
	          
	    	}
	    }
		
	}


	public function editCatatan($id){
		$data['title']='Edit Catatan';
		$where = array('id_catatan' => $id
					);
		$data['status_cm']=$this->db->get('status_cm')->result();
		$data['metode']=$this->db->get('metode')->result();
		$data['catatan_mutu']=$this->model_catatan_mutu->edit_catatan($where,'catatan_mutu')->result();

		$this->load->view('staff/header',$data);
		$this->load->view('staff/editCatatan',$data);
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
	        echo "<script>alert('File Harus Ada Yang DiUpload!');
				document.location='".base_url()."staff/buatCatatanMutu';
				</script>";
	        //redirect(base_url('staff/buatPeraturan'));
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
	          redirect(base_url('staff/buatCatatanMutu'));
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
			document.location='".base_url()."staff/buatCatatanMutu';
			</script>";
        }
	}



	//////////////////////////////////////Peraturan external/////////////////////////////////////
	public function buatPeraturan(){
		$data['title']='Peraturan Baru';
		$data['tb_instansi']=$this->model_peraturan->get_instansi();
		//$data['unit']=$this->model_peraturan->get_unit_user();
		$data['regulator']=$this->model_peraturan->get_regulator();
		$data['tb_peraturan']=$this->model_peraturan->get_peraturan();

		//filter search...
		$filter=$this->input->post('filter');
		$field=$this->input->post('field');
		$search=$this->input->post('search');
		if (isset($filter) && !empty($search)) {
           $data['tb_peraturan'] = $this->model_peraturan->getPeraturanWhereLike($field, $search);
        } else {
            $data['tb_peraturan'] = $this->model_peraturan->get_peraturan();
        }
		
		$this->load->view('staff/header',$data);
		$this->load->view('staff/peraturan',$data);
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
		
		$this->form_validation->set_rules('id_instansi','id_instansi','required');
		$this->form_validation->set_rules('judul','judul','required');
		$this->form_validation->set_rules('id_regulator','id_regulator','required');
		$this->form_validation->set_rules('masa_berlaku','masa_berlaku','required');

		if($this->form_validation->run()==false){
			echo "<script>
			alert('Mohon Lengkapi Form');
			document.location='".base_url()."staff/buatPeraturan';
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
				document.location='".base_url()."staff/buatPeraturan';
				</script>";
	        redirect(base_url('staff/buatPeraturan'));
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
	          redirect(base_url('staff/buatPeraturan'));
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

		$this->load->view('staff/header',$data);
		$this->load->view('staff/editPeraturan',$data);
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
				document.location='".base_url()."staff/buatPeraturan';
				</script>";
	        //redirect(base_url('staff/buatPeraturan'));
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
	          redirect(base_url('staff/buatPeraturan'));
	    }
		
	}

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
        }
	}

//////////////////////////////OTHER SETTINGS////////////////////////////////////////////////



	public function formTambahRegulator(){
		$data['title']='Settings Regulator';
		$data['regulator']=$this->model_peraturan->get_regulator();
		$this->load->view('staff/header',$data);
		$this->load->view('staff/formTambahRegulator',$data);
	}

	public function addRegulator(){
		$regulator=$this->input->post('regulator');
		$data=array(
			'regulator'=>$regulator
		);
		$this->form_validation->set_rules('regulator','regulator','required');
		if($this->form_validation->run()==FALSE){
	    	echo "<script>alert('Silahkan Isi Regulator Baru');
			document.location='".base_url()."staff/formTambahRegulator';
			</script>";
	    }else{
	    	$this->model_peraturan->insert_regulator($data, 'regulator');
			redirect(base_url('staff/formTambahRegulator'));
	    }
		
	}
	public function hapusRegulator($id){
		$this->db->where('id_regulator',$id);
    	 $query = $this->db->get('regulator');
     	$row = $query->row();
		$this->db->delete('regulator', array('id_regulator' => $id));
		redirect(base_url('staff/formTambahRegulator'));
	}
	//REGULATOR 
	
	public function formTambahJenis(){
		$data['title']='Settings Jenis';
		$data['tb_jenis_dokumen']=$this->model_dokumen_baru->get_jenis_dokumen();
		$this->load->view('staff/header',$data);
		$this->load->view('staff/formTambahJenis',$data);
	}

	public function addJenis(){
		$jenis_dokumen=$this->input->post('jenis_dokumen');
		$data=array(
			'jenis_dokumen'=>$jenis_dokumen
		);
		$this->form_validation->set_rules('jenis_dokumen', 'jenis_dokumen', 'required');
		if($this->form_validation->run()==FALSE){
	    	echo "<script>alert('Silahkan Isi Jenis Dokumen Baru');
			document.location='".base_url()."staff/formTambahJenis';
			</script>";
	    }else{
	   		$this->model_dokumen_baru->insert_jenis($data, 'tb_jenis_dokumen');
			redirect(base_url('staff/formTambahJenis'));
	    }
		
	}
	public function hapusJenis($id){
		$this->db->where('id_jenis_dokumen',$id);
    	 $query = $this->db->get('tb_jenis_dokumen');
     	$row = $query->row();
		$this->db->delete('tb_jenis_dokumen', array('id_jenis_dokumen' => $id));
		redirect(base_url('staff/formTambahJenis'));
	}
	//JENIS

	public function formTambahInstansi(){
		$data['title']='Settings Instansi';
		$data['tb_instansi']=$this->model_peraturan->get_instansi();
		$this->load->view('staff/header',$data);
		$this->load->view('staff/formTambahInstansi',$data);
	}

	public function addInstansi(){
		$instansi=$this->input->post('instansi');
		$data=array(
			'instansi'=>$instansi
		);
		$this->form_validation->set_rules('instansi', 'instansi', 'required');
		if($this->form_validation->run()==FALSE){
	    	echo "<script>alert('Silahkan Isi Kode Instansi');
			document.location='".base_url()."staff/formTambahInstansi';
			</script>";
	    }else{
	    		$this->model_peraturan->insert_instansi($data, 'tb_instansi');
				redirect(base_url('staff/formTambahInstansi'));
	    }
	
	}
	public function hapusInstansi($id){
		$this->db->where('id_instansi',$id);
    	 $query = $this->db->get('tb_instansi');
     	$row = $query->row();
		$this->db->delete('tb_instansi', array('id_instansi' => $id));
		redirect(base_url('staff/formTambahInstansi'));
	}
	//INSTANSI


	//Ubah Password 
	public function formUbahPassword(){
		$data['title']='My Profile';
		$this->load->view('staff/header',$data);
		$this->load->view('staff/formUbahPassword',$data);
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
			echo '<script>
	        alert("Password Baru Telah Tersimpan");
	        document.location="'.base_url('staff/formUbahPassword').'";
	        </script>';
	        //redirect(base_url('staff/formUbahPassword'));
	     }
	     else{
	        echo '<script>
	        alert("Password baru dan konfirmasi tidak sama");
	        document.location="'.base_url('staff/formUbahPassword').'";
	        </script>';

		}
		
		
	}
	//////////////BANTUAN////////////

	function bantuan(){
		$data['title']='Bantuan';
		$this->load->view('staff/header',$data);
		$this->load->view('staff/bantuan',$data);
	}


}