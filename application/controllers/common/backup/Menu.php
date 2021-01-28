<?php 

class Menu extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_main_menu') == 'N'){
			redirect(base_url("Notfound"));
		}

	}

	function FormName(){
		$form_name = array('nama', 'target', 'type', 'url', 'urutan');
		return $form_name;
	}

	public function Add(){
		$query = $this->db->query("SELECT max(urutan) as jumlah FROM main_menu")->row_array();
		$urutan = $query['jumlah']+1;
		$form_name = $this->FormName();
		$data = array();
		for ($i=0; $i < count($form_name)-1 ; $i++) { 
			$data[$form_name[$i]] = $this->Model_action->htrim($this->input->post($form_name[$i]));
		}
		$data['urutan'] = $urutan;
		$data['create_by'] = $this->session->ses_id;
		// proses
		$tambah = $this->Model_action->Insert('main_menu',$data);
		if ($tambah > 0) {
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/MainMenu');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/MainMenu');
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		date_default_timezone_set("Asia/Jakarta");
		$datanya = $this->db->query("SELECT * FROM main_menu WHERE id='$id'")->row_array();
		$form_name = $this->FormName();
		$data = array();
		for ($i=0; $i < count($form_name) ; $i++) { 
			$data[$form_name[$i]] = $this->Model_action->htrim($this->input->post($form_name[$i]));
		}
		// proses
		$Ubah = $this->Model_action->Update('main_menu',$data,$id,'id');
		if ($Ubah) {
			echo "Berhasil!|||back";
			// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/MainMenu');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/MainMenu');
		}
	}

	public function Delete($id){
		$data = array('id' => $id);
		$ket = $this->Model_action->GetLogDelete('main_menu', $id, 'id', 'MAIN MENU', 'nama');
		$this->db->where($data);
	    $this->db->delete('main_menu');
		$AddLog = $this->Model_action->AddLog($ket);
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}