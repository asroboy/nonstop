<?php 

class Video extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_video') == 'N'){
			redirect(base_url("Notfound"));
		}
	}

	public function Add(){
		$data = array();
		$data['judul'] = $this->Model_action->htrim($this->input->post('judul'));
		$data['jenis_file'] = 'video';
		$data['des'] = $this->Model_action->trim($this->input->post('des'));
		$data['create_by'] = $this->session->ses_id;
		// proses
		$tambah = $this->Model_action->Insert('file',$data);
		if ($tambah > 0) {
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Video');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Video');
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		$data = array();
		$data['judul'] = $this->Model_action->htrim($this->input->post('judul'));
		$data['des'] = $this->Model_action->trim($this->input->post('des'));
		$data['tampilkan'] = $this->Model_action->trim($this->input->post('tampilkan'));
		// proses
		$Ubah = $this->Model_action->Update('file',$data,$id,'id');
		if ($Ubah) {
			echo "Berhasil!|||back";
			// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Video');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Video');
		}
	}

	public function Delete($id){
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('file');
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}