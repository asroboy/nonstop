<?php 

class Bank extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_bank') == 'N'){
			redirect(base_url("Panel/URI/permiss"));
		}

	}

	public function Add(){
		$data = array();
		$data['nama'] = $this->Model_action->htrim($this->input->post('nama'));
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload(base_folder().'bank/', 600, 'file');
			$data['file'] = 'bank/'.trim($file);
		}
		$data['create_by'] = $this->session->ses_id;
		// proses
		$tambah = $this->Model_action->Insert('bank',$data);
		if ($tambah > 0) {
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Berita');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Berita');
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		$data = array();
		$data['nama'] = $this->Model_action->htrim($this->input->post('nama'));
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload(base_folder().'bank/', 600, 'file');
			$data['file'] = 'bank/'.trim($file);
		}
		$datanya = $this->db->query("SELECT * FROM bank WHERE id='$id'")->row_array();
		// proses
		$Ubah = $this->Model_action->Update('bank',$data,$id,'id');
		if ($Ubah) {
			// if (!empty($_FILES['file']['name'])) {
				// unlink($datanya['file']);
			// }
			echo "Berhasil!|||back";
			// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Berita');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Berita');
		}
	}

	public function Delete($id){
		$datanya = $this->db->query("SELECT * FROM bank WHERE id='$id'")->row_array();
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('bank');
		unlink($datanya['file']);
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}