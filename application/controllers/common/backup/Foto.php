<?php 

class Foto extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_foto') == 'N'){
			redirect(base_url("Notfound"));
		}

	}

	public function Add(){
		$data = array();
		$data['judul'] = $this->Model_action->htrim($this->input->post('judul'));
		$data['jenis_file'] = 'foto';
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/foto/', 300, 'file');
			$data['file'] = 'img/foto/'.trim($file);
		}
		$data['create_by'] = $this->session->ses_id;
		// proses
		$tambah = $this->Model_action->Insert('file',$data);
		if ($tambah > 0) {
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Foto');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Foto');
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		$data = array();
		$data['judul'] = $this->Model_action->htrim($this->input->post('judul'));
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/foto/', 300, 'file');
			$data['file'] = 'img/foto/'.trim($file);
		}
		$data['tampilkan'] = $this->Model_action->trim($this->input->post('tampilkan'));
		$datanya = $this->db->query("SELECT * FROM file WHERE id='$id'")->row_array();
		// proses
		$Ubah = $this->Model_action->Update('file',$data,$id,'id');
		if ($Ubah) {
			if (!empty($_FILES['file']['name'])) {
				unlink($datanya['file']);
			}
			echo "Berhasil!|||back";
			// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Foto');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Foto');
		}
	}

	public function Delete($id){
		$datanya = $this->db->query("SELECT * FROM file WHERE id='$id'")->row_array();
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('file');
		unlink($datanya['file']);
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}