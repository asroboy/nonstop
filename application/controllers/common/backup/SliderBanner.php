<?php 

class SliderBanner extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_slider_banner') == 'N'){
			redirect(base_url("Notfound"));
		}

	}

	public function Add(){
		$type = $this->Model_action->htrim($this->input->post('type'));
		$query = $this->db->query("SELECT max(urutan) as jumlah FROM sliderbanner where type ='".$type."'")->row_array();
		$jumlah = $query['jumlah']+1;
		$data = array();
		$data['judul'] = $this->Model_action->htrim($this->input->post('judul'));
		$data['type'] = $type;
		$data['urutan'] = $jumlah;
		if ($type == 'slider') {
			$size = 800;
		}elseif ($type == 'banner') {
			$size = 400;
		}
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/sliderbanner/', $size, 'file');
			$data['file'] = 'img/sliderbanner/'.trim($file);
		}
		$data['create_by'] = $this->session->ses_id;
		// proses
		$tambah = $this->Model_action->Insert('sliderbanner',$data);
		if ($tambah > 0) {
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/SliderBanner');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/SliderBanner');
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		$type = $this->Model_action->htrim($this->input->post('type'));
		$data = array();
		$data['judul'] = $this->Model_action->htrim($this->input->post('judul'));
		$data['type'] = $type;
		$data['urutan'] = $this->Model_action->htrim($this->input->post('urutan'));
		if ($type == 'slider') {
			$size = 800;
		}elseif ($type == 'banner') {
			$size = 400;
		}
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/sliderbanner/', $size, 'file');
			$data['file'] = 'img/sliderbanner/'.trim($file);
		}
		$data['tampilkan'] = $this->Model_action->trim($this->input->post('tampilkan'));
		$datanya = $this->db->query("SELECT * FROM sliderbanner WHERE id='$id'")->row_array();
		// proses
		$Ubah = $this->Model_action->Update('sliderbanner',$data,$id,'id');
		if ($Ubah) {
			if (!empty($_FILES['file']['name'])) {
				unlink($datanya['file']);
			}
			echo "Berhasil!|||back";
			// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/SliderBanner');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/SliderBanner');
		}
	}

	public function Delete($id){
		$datanya = $this->db->query("SELECT * FROM sliderbanner WHERE id='$id'")->row_array();
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('sliderbanner');
		unlink($datanya['file']);
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}