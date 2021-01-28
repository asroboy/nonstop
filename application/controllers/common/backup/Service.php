<?php 

class Service extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_layanan_kami') == 'N'){
			redirect(base_url("Notfound"));
		}

	}

	public function Add(){
		$query = $this->db->query("SELECT max(urutan) as jumlah FROM service")->row_array();
		$jumlah = $query['jumlah']+1;
		$data = array();
		$data['judul'] = $this->Model_action->htrim($this->input->post('judul'));
		$data['url'] = url_title(strtolower($data['judul']));
		$data['des'] = $this->Model_action->trim($this->input->post('des'));
		$data['keyword'] = $this->Model_action->trim($this->input->post('keyword'));
		$data['urutan'] = $jumlah;
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/service/', 300, 'file');
			$data['file'] = 'img/service/'.trim($file);
		}
		$data['create_by'] = $this->session->ses_id;
		// proses
		$tambah = $this->Model_action->Insert('service',$data);
		if ($tambah > 0) {
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/LayananKami');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/LayananKami');
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		date_default_timezone_set("Asia/Jakarta");
		$data = array();
		$data['judul'] = $this->Model_action->htrim($this->input->post('judul'));
		$data['url'] = url_title(strtolower($data['judul']));
		$data['des'] = $this->Model_action->trim($this->input->post('des'));
		$data['keyword'] = $this->Model_action->trim($this->input->post('keyword'));
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/service/', 300, 'file');
			$data['file'] = 'img/service/'.trim($file);
		}
		$data['tampilkan'] = $this->Model_action->htrim($this->input->post('tampilkan'));
		$data['urutan'] = $this->Model_action->htrim($this->input->post('urutan'));
		$datanya = $this->db->query("SELECT * FROM service WHERE id='$id'")->row_array();
		// proses
		$Ubah = $this->Model_action->Update('service',$data,$id,'id');
		if ($Ubah) {
			if (!empty($_FILES['file']['name'])) {
				unlink($datanya['file']);
			}
			echo "Berhasil!|||back";
			// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/LayananKami');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/LayananKami');
		}
	}

	public function Delete($id){
		$datanya = $this->db->query("SELECT * FROM service WHERE id='$id'")->row_array();
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('service');
		unlink($datanya['file']);
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}