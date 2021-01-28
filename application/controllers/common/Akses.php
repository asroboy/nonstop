<?php 

class Akses extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_akses') == 'N'){
			redirect(base_url("Panel/URI/permiss"));
		}

	}

	public function Add(){
		$data = array();
		$data['nama_akses'] = $this->Model_action->htrim($this->input->post('nama_akses'));
        $door = $this->Door_M->All()->result_array();
        foreach ($door as $s_door) {
			$data[$s_door['code']] = $this->Model_action->htrim($this->input->post($s_door['code']));
        }
		// proses
		$tambah = $this->Model_action->Insert('akses',$data);
		if ($tambah > 0) {
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Akses');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Akses');
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		date_default_timezone_set("Asia/Jakarta");
		$data = array();
		$data['nama_akses'] = $this->Model_action->htrim($this->input->post('nama_akses'));
  		$door = $this->Door_M->All()->result_array();
        foreach ($door as $s_door) {
			$data[$s_door['code']] = $this->Model_action->htrim($this->input->post($s_door['code']));
        }

		// proses
		$Ubah = $this->Model_action->Update('akses',$data,$id,'id');
		if ($Ubah) {
			echo "Berhasil!|||back";
			// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Akses');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Akses');
		}
	}

	public function Delete($id){
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('akses');
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}