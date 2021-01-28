<?php 

class ChooseUs extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_keunggulan_kami') == 'N'){
			redirect(base_url("Notfound"));
		}

	}

	public function Add(){
		$query = $this->db->query("SELECT max(urutan) as jumlah FROM choose_us")->row_array();
		$jumlah = $query['jumlah']+1;
		$data = array();
		$data['judul'] = $this->Model_action->htrim($this->input->post('judul'));
		$data['des'] = $this->Model_action->trim($this->input->post('des'));
		$data['urutan'] = $jumlah;
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/choose_us/', 256, 'file');
			$data['file'] = 'img/choose_us/'.trim($file);
		}
		$data['create_by'] = $this->session->ses_id;
		// proses
		$tambah = $this->Model_action->Insert('choose_us',$data);
		if ($tambah > 0) {
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/KeunggulanKami');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/KeunggulanKami');
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		date_default_timezone_set("Asia/Jakarta");
		$data = array();
		$data['judul'] = $this->Model_action->htrim($this->input->post('judul'));
		$data['des'] = $this->Model_action->trim($this->input->post('des'));
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/choose_us/', 256, 'file');
			$data['file'] = 'img/choose_us/'.trim($file);
		}
		$data['urutan'] = $this->Model_action->htrim($this->input->post('urutan'));
		$data['tampilkan'] = $this->Model_action->htrim($this->input->post('tampilkan'));
		$datanya = $this->db->query("SELECT * FROM choose_us WHERE id='$id'")->row_array();
		// proses
		$Ubah = $this->Model_action->Update('choose_us',$data,$id,'id');
		if ($Ubah) {
			if (!empty($_FILES['file']['name'])) {
				unlink($datanya['file']);
			}
			echo "Berhasil!|||back";
			// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/KeunggulanKami');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/KeunggulanKami');
		}
	}

	public function Delete($id){
		$datanya = $this->db->query("SELECT * FROM choose_us WHERE id='$id'")->row_array();
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('choose_us');
		unlink($datanya['file']);
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}