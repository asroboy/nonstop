<?php 

class Auth extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('Model_action');
	}

	public function index(){
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') == $this->conf_status->stat() && $this->session->userdata($lib['adm_masuk']) == $lib['st_masuk']){
			$this->session->set_flashdata('result', $this->Model_main->Gagal_alert('<strong>Pemberitahuan!</strong> anda sudah login!'));
			redirect(base_url("Panel/URI/Dashboard"));
		}else{
			$this->load->view('sign_in');
		}
	}

	function auth(){
		$lib = $this->conf_status->adm_masuk();
		$username = $this->Model_action->htrim($_POST['username']);
		$password = $_POST['password'];

		$cek_id = $this->db->query("SELECT * FROM pengguna WHERE status='Y' AND username = '".$username."'");
	    if($cek_id->num_rows() > 0){
        	$show=$cek_id->row_array();
			$hasil = substr($show['password'], 11);
        	if (password_verify($password, $hasil)) {
        		$data=$cek_id->row_array();
		       	$this->session->set_userdata($lib['adm_masuk'], $lib['st_masuk']);
				$this->session->set_userdata('ses_id',$data['id']);
				$this->session->set_userdata('ses_akses',$data['akses']);

          		$show_nav = $this->db->query("SELECT * FROM akses WHERE id='".$data['akses']."'")->row_array();
				$door = $this->Door_M->All()->result_array();
          		foreach ($door as $s_door) {
            		if ($show_nav[$s_door['code']] == "Y") {
						$this->session->set_userdata('uri_'.$s_door['code'], 'Y');
            		}else{
						$this->session->set_userdata('uri_'.$s_door['code'], 'N');
            		}
          		}
				$this->session->set_userdata('file_manager_slur',true);
				$this->session->set_userdata('status', $this->conf_status->stat());

  				date_default_timezone_set('Asia/jakarta');

				redirect(base_url("Panel/URI/Dashboard"));
	    	}else{
	    		$this->session->set_flashdata('result_login', $this->Model_main->Gagal_alert('Username atau Password salah!'));
				redirect(base_url("common/Auth"));
	    	}
		}
		else{
			$this->session->set_flashdata('result_login', $this->Model_main->Gagal_alert('Username atau Password salah!'));
			redirect(base_url("common/Auth"));
		}

	}
}