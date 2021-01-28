<?php 

class Voucher extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_voucher') == 'N'){
			redirect(base_url("Panel/URI/permiss"));
		}
	}

	public function Add(){
		$data = array();
		$data['title'] = $this->Model_action->htrim($this->input->post('title'));
		$data['code'] = $this->Model_action->htrim($this->input->post('code'));
		$data['potongan'] = $this->Model_action->htrim($this->input->post('potongan'));
		$data['start_date'] = $this->Model_action->htrim($this->input->post('start_date'));
		$data['end_date'] = $this->Model_action->htrim($this->input->post('end_date'));
		$data['max_count'] = $this->Model_action->htrim($this->input->post('max_count'));
		$data['create_by'] = $this->session->ses_id;
		if (!empty($this->Voucher_M->getDetail($data['code'], 'code', 'id'))) {
			echo "Gagal! Code sudah terdaftar|||none";
		}else{
			// proses
			$tambah = $this->Model_action->Insert('voucher',$data);
			if ($tambah > 0) {
				echo "Berhasil!|||reload";
		    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
				// redirect('Panel/URI/voucher');
			}else{
				echo "Gagal!|||none";
		    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
				// redirect('Panel/URI/voucher');
			}
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		date_default_timezone_set("Asia/Jakarta");
		$data = array();
		$data['title'] = $this->Model_action->htrim($this->input->post('title'));
		$data['code'] = $this->Model_action->htrim($this->input->post('code'));
		$data['potongan'] = $this->Model_action->htrim($this->input->post('potongan'));
		$data['start_date'] = $this->Model_action->htrim($this->input->post('start_date'));
		$data['end_date'] = $this->Model_action->htrim($this->input->post('end_date'));
		$data['max_count'] = $this->Model_action->htrim($this->input->post('max_count'));
		if ($this->Voucher_M->getDetail($data['code'], 'code', 'id') != $id) {
			echo "Gagal! Code sudah terdaftar|||none";
		}else{
			// proses
			$Ubah = $this->Model_action->Update('voucher',$data,$id,'id');
			if ($Ubah) {
				echo "Berhasil!|||back";
				// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
				// redirect('Panel/URI/voucher');
			}else{
				echo "Gagal!|||none";
		    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
				// redirect('Panel/URI/voucher');
			}
		}
	}

	public function Delete($id){
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('voucher');
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}