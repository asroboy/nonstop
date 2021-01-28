<?php 

class Bantuan extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_bantuan') == 'N'){
			redirect(base_url("Panel/URI/permiss"));
		}
	}

	public function Add(){
		$data = array();
		$data['description'] = $this->Model_action->trim($this->input->post('description'));
		$data['bantuan_id'] = $this->Model_action->trim($this->input->post('id'));
		$data['create_by'] = $this->session->ses_id;
		// proses
		if ($this->Bantuan_M->getData($data['bantuan_id'], 'bantuan_id', 'bantuan_jawab')->num_rows() > 0) {
			echo "Gagal! Bantuan sudah ditangani.|||none";
		}else{
			$tambah = $this->Model_action->Insert('bantuan_jawab',$data);
			if ($tambah > 0) {
				echo "Berhasil!|||back";
		    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
				// redirect('Panel/URI/Faq');
			}else{
				echo "Gagal!|||none";
		    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
				// redirect('Panel/URI/Faq');
			}
		}
	}


	public function Delete($id){
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('bantuan');

	    $data2 = array('bantuan_id' => $id);
		$this->db->where($data2);
	    $this->db->delete('bantuan_jawab');
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}	