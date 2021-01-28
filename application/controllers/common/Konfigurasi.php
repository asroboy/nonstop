<?php 

class Konfigurasi extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Model_action');
		$this->load->library('upload');
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_konfigurasi') == 'N'){
			redirect(base_url("Panel/URI/permiss"));
		}
	}

	public function update(){
       	date_default_timezone_set("Asia/Jakarta");
        $show = $this->db->query("SELECT * FROM konfigurasi")->row_array();
		$id = $this->Model_action->htrim($this->input->post('id'));
		$data = array();
		$data['nama_company_id'] = $this->Model_action->htrim($this->input->post('nama_company_id'));
		$data['title_web'] = $this->Model_action->htrim($this->input->post('nama_company_id'));

		$data['mobile'] = $this->Model_action->htrim($this->input->post('mobile'));
		$data['telp'] = $this->Model_action->htrim($this->input->post('telp'));
		$data['fax'] = $this->Model_action->htrim($this->input->post('fax'));
		$data['email'] = $this->Model_action->htrim($this->input->post('email'));

		if (!empty($_FILES['logo_web']['name'])) {
			$logo_web= $this->Model_action->upload('img/konfigurasi/', 256, 'logo_web');
			$data['logo_web'] = 'img/konfigurasi/'.trim($logo_web);
			$data['logo_title'] = 'img/konfigurasi/'.trim($logo_web);
		}

		$datanya = $this->db->query("SELECT * FROM konfigurasi")->row_array();
		$ubah = $this->Model_action->Update('konfigurasi',$data,$id,'id');
		if ($ubah) {
			if (!empty($_FILES['logo_web']['name'])) {
				unlink($datanya['logo_web']);
			}
			if (!empty($_FILES['logo_title']['name'])) {
				unlink($datanya['logo_title']);
			}
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result_konfigurasi', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Konfigurasi');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result_konfigurasi', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Konfigurasi');
		}
	}


}