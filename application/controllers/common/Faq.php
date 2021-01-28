<?php 

class Faq extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_faq') == 'N'){
			redirect(base_url("Panel/URI/permiss"));
		}
	}

	public function Add(){
		$data = array();
		$data['question'] = $this->Model_action->htrim($this->input->post('question'));
		$data['answer'] = $this->Model_action->trim($this->input->post('answer'));
		$data['create_by'] = $this->session->ses_id;
		// proses
		$tambah = $this->Model_action->Insert('faq',$data);
		if ($tambah > 0) {
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Faq');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Faq');
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		date_default_timezone_set("Asia/Jakarta");
		$data = array();
		$data['question'] = $this->Model_action->htrim($this->input->post('question'));
		$data['answer'] = $this->Model_action->trim($this->input->post('answer'));
		$data['tampilkan'] = $this->Model_action->htrim($this->input->post('tampilkan'));

		// proses
		$Ubah = $this->Model_action->Update('faq',$data,$id,'id');
		if ($Ubah) {
			echo "Berhasil!|||back";
			// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Faq');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Faq');
		}
	}

	public function Delete($id){
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('faq');
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}