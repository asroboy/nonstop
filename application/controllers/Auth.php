<?php 

class Auth extends CI_Controller{

	function __construct(){
		parent::__construct();

	}

	public function Google(){
	    $email = $this->Model_action->htrim($this->input->post('email'));
	    $data = array();
		$data['nama'] = $this->Model_action->htrim($this->input->post('nama'));
		$data['email'] = $email;
		$data['file'] = $this->Model_action->htrim($this->input->post('file'));
		$data['sumber_file'] = 'Google';
		if($this->UserFront_M->CekUserFront($email)->num_rows() > 0){
		    $this->session->set_userdata('usf_email',$data['email']);
			$this->session->set_userdata('usf_status', 'login success');
			echo 'berhasil/-/'.base_url('Welcome');
		}else{
		    $tambah = $this->Model_action->Insert('user_front',$data);
			$this->session->set_userdata('usf_email',$data['email']);
			$this->session->set_userdata('usf_status', 'login success');
			echo 'berhasil/-/'.base_url('Welcome');
		}
	}

}