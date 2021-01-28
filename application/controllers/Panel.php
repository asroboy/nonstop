<?php 

class Panel extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Model_action');
		$this->load->model('Model_main');
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat()){
			redirect(base_url("Notfound"));
		}	
	}



	public function Logout(){
		$this->session->sess_destroy();
		redirect(base_url('common/Auth'));
	}

	public function profile(){
		$data = array(
			'konf' => $this->Model_main->Konf(),
			'menu' => 'Profile',
			'alert' => 'result_profile'
		);
		$this->load->view('common/index', $data);
	}

	public function Dashboard(){
		$data = array(
			'konf' => $this->Model_main->Konf(),
			'menu' => 'Dashboard',
			'alert' => 'result'
		);
		$this->load->view('common/index', $data);
	}

	public function Permission(){
		$data = array(
			'konf' => $this->Model_main->Konf(),
			'menu' => 'Dilarang!',
			'alert' => 'result'
		);
		$this->load->view('common/index', $data);
	}

	public function index(){
		if ($this->uri->segment(3) == 'permiss') {
			$this->Permission();
		}elseif ($this->uri->segment(3) == 'Dashboard') {
			$this->Dashboard();
		}elseif ($this->uri->segment(3) == 'profile') {
			$this->profile();
		}elseif ($this->uri->segment(3) == 'logout') {
			$this->Logout();
		}else{
	        $s_door = $this->Door_M->getData($this->uri->segment(3), 'url')->row_array();
	        if ($this->session->userdata('uri_'.$s_door['code']) == 'Y'){
				$data = array(
					'konf' => $this->Model_main->Konf(),
					'menu' => $s_door['nama'],
					'alert' => 'result'
				);
				$this->load->view('common/index', $data);
			}else{
				redirect(base_url("Panel/URI/permiss"));
			}
		}
	}

}