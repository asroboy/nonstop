<?php 

class PatnerClient extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_partner') == 'N'){
			redirect(base_url("Notfound"));
		}

	}

	public function Add(){
		$data = array();
		$data['type'] = $this->Model_action->htrim($this->input->post('type'));
		$data['nama'] = $this->Model_action->htrim($this->input->post('nama'));
		$data['url'] = $this->Model_action->htrim($this->input->post('url'));
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/partner/', 256, 'file');
			$data['file'] = 'img/partner/'.trim($file);
		}
		$data['create_by'] = $this->session->ses_id;
		// proses
		$tambah = $this->Model_action->Insert('partnerclient',$data);
		if ($tambah > 0) {
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Partner');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Partner');
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		$data = array();
		$data['type'] = $this->Model_action->htrim($this->input->post('type'));
		$data['nama'] = $this->Model_action->htrim($this->input->post('nama'));
		$data['url'] = $this->Model_action->htrim($this->input->post('url'));
		$data['tampilkan'] = $this->Model_action->htrim($this->input->post('tampilkan'));
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/partner/', 256, 'file');
			$data['file'] = 'img/partner/'.trim($file);
		}
		$datanya = $this->db->query("SELECT * FROM partnerclient WHERE id='$id'")->row_array();
		// proses
		$Ubah = $this->Model_action->Update('partnerclient',$data,$id,'id');
		if ($Ubah) {
			if (!empty($_FILES['file']['name'])) {
				unlink($datanya['file']);
			}
			echo "Berhasil!|||back";
			// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Partner');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Partner');
		}
	}

	public function Delete($id){
		$datanya = $this->db->query("SELECT * FROM partnerclient WHERE id='$id'")->row_array();
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('partnerclient');
		unlink($datanya['file']);
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}