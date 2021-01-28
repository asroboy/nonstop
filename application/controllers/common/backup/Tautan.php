<?php 

class Tautan extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_tautan') == 'N'){
			redirect(base_url("Notfound"));
		}
	}

	public function Add(){
		$type = $this->Model_action->htrim($this->input->post('type'));
		$query = $this->db->query("SELECT max(urutan) as jumlah FROM tautan where type ='".$type."'")->row_array();
		$jumlah = $query['jumlah']+1;
		$data = array();
		$data['nama'] = $this->Model_action->htrim($this->input->post('nama'));
		$data['target'] = $this->Model_action->htrim($this->input->post('target'));
		$data['type'] = $this->Model_action->htrim($this->input->post('type'));
		$data['url'] = $this->Model_action->htrim($this->input->post('url'));
		$data['urutan'] = $jumlah;
		$data['create_by'] = $this->session->ses_id;
		// proses
		$tambah = $this->Model_action->Insert('tautan',$data);
		if ($tambah > 0) {
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Tautan');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Tautan');
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		date_default_timezone_set("Asia/Jakarta");
		$data = array();
		$data['nama'] = $this->Model_action->htrim($this->input->post('nama'));
		$data['target'] = $this->Model_action->htrim($this->input->post('target'));
		$data['type'] = $this->Model_action->htrim($this->input->post('type'));
		$data['url'] = $this->Model_action->htrim($this->input->post('url'));
		$data['urutan'] = $this->Model_action->htrim($this->input->post('urutan'));

		// proses
		$Ubah = $this->Model_action->Update('tautan',$data,$id,'id');
		if ($Ubah) {
			echo "Berhasil!|||back";
			// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Tautan');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Tautan');
		}
	}

	public function Delete($id){
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('tautan');
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}