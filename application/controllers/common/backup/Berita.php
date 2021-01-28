<?php 

class Berita extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_berita') == 'N'){
			redirect(base_url("Notfound"));
		}

	}

	public function Add(){
		$data = array();
		$data['judul'] = $this->Model_action->htrim($this->input->post('judul'));
		$data['url'] = url_title(strtolower($data['judul']));
		$data['des'] = $this->Model_action->trim($this->input->post('des'));
		$data['category'] = $this->Model_action->trim($this->input->post('category'));
		$data['keyword'] = $this->Model_action->trim($this->input->post('keyword'));
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/berita/', 400, 'file');
			$data['foto'] = 'img/berita/'.trim($file);
		}
		$data['create_by'] = $this->session->ses_id;
		// proses
		$tambah = $this->Model_action->Insert('berita',$data);
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
		$data['judul'] = $this->Model_action->htrim($this->input->post('judul'));
		$data['url'] = url_title(strtolower($data['judul']));
		$data['category'] = $this->Model_action->trim($this->input->post('category'));
		$data['des'] = $this->Model_action->trim($this->input->post('des'));
		$data['keyword'] = $this->Model_action->trim($this->input->post('keyword'));
		$data['tampilkan'] = $this->Model_action->trim($this->input->post('tampilkan'));
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/berita/', 400, 'file');
			$data['foto'] = 'img/berita/'.trim($file);
		}
		$datanya = $this->db->query("SELECT * FROM berita WHERE id='$id'")->row_array();
		// proses
		$Ubah = $this->Model_action->Update('berita',$data,$id,'id');
		if ($Ubah) {
			if (!empty($_FILES['file']['name'])) {
				unlink($datanya['foto']);
			}
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
		$datanya = $this->db->query("SELECT * FROM berita WHERE id='$id'")->row_array();
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('berita');
		unlink($datanya['foto']);
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}