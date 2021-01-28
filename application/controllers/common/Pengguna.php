<?php 

class Pengguna extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_pengguna') == 'N'){
			redirect(base_url("Panel/URI/permiss"));
		}

	}

	public function Add(){
		$data = array();
		$data['nama_pengguna'] = $this->Model_action->htrim($this->input->post('nama_pengguna'));
		$data['username'] = $this->Model_action->htrim($this->input->post('username'));
		$data['password'] = $this->Model_main->GetPassword();
		$data['akses'] = $this->Model_action->htrim($this->input->post('akses'));
		$data['foto'] = 'img/pengguna/user.png';
		$data['status'] = 'Y';
		// proses
		$tambah = $this->Model_action->Insert('pengguna',$data);
		if ($tambah > 0) {
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Pengguna');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Pengguna');
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		$username = $this->Model_action->htrim($this->input->post('username'));
		$jum = $this->db->query("SELECT * FROM pengguna WHERE NOT id='$id' AND username='$username'")->num_rows();
		if ($jum > 0) {
			$this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data! Username telah dipakai!'));
			header("location:".$_SERVER['HTTP_REFERER']);
		}else{
			$datanya = $this->db->query("SELECT * FROM pengguna WHERE id='$id'")->row_array();
			$data = array();
			$data['nama_pengguna'] = $this->Model_action->htrim($this->input->post('nama_pengguna'));
			$data['username'] = $this->Model_action->htrim($this->input->post('username'));
			if (!empty($this->input->post('password'))) {
				$data['password'] = $this->Model_main->GetPassword();
			}
			$data['akses'] = $this->Model_action->htrim($this->input->post('akses'));
			if (!empty($_FILES['foto']['name'])) {
				$foto= $this->Model_action->upload('img/pengguna/', 256, 'foto');
				$data['foto'] = 'img/pengguna/'.trim($foto);
			}
			// proses
			$Ubah = $this->Model_action->Update('pengguna',$data,$id,'id');
			if ($Ubah) {
				if (!empty($_FILES['foto']['name'])) {
		   			if ($datanya['foto'] != 'img/pengguna/user.png') {
						unlink($datanya['foto']);
					}
				}
				echo "Berhasil!|||back";
				// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
				// header("location:".$_SERVER['HTTP_REFERER']);
			}else{
				echo "Gagal!|||none";
		    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
				// header("location:".$_SERVER['HTTP_REFERER']);
			}
		}
	}
	public function AktivasiSeller($id){

		$data = array();
			$data['status'] = 'ACTIVE';
			// proses
			$Ubah = $this->Model_action->Update('user_app',$data,$id,'id');
			if ($Ubah) {
				
				//echo "Berhasil!|||back";
				$this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
				redirect('Panel/URI/Seller');
			}else{
				//echo "Gagal!|||none";
		    	$this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
				header("location:".$_SERVER['HTTP_REFERER']);
			}
	}
	public function AktivasiUser($id){

		$data = array();
			$data['status'] = 'ACTIVE';
			// proses
			$Ubah = $this->Model_action->Update('user_app',$data,$id,'id');
			if ($Ubah) {
				
				//echo "Berhasil!|||back";
				$this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
				redirect('Panel/URI/User');
			}else{
				//echo "Gagal!|||none";
		    	$this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
				header("location:".$_SERVER['HTTP_REFERER']);
			}
	}
	public function InActiveSeller($id){

		$data = array();
			$data['status'] = 'INACTIVE';
			// proses
			$Ubah = $this->Model_action->Update('user_app',$data,$id,'id');
			if ($Ubah) {
				
				//echo "Berhasil!|||back";
				$this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
				redirect('Panel/URI/Seller');
			}else{
				//echo "Gagal!|||none";
		    	$this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
				header("location:".$_SERVER['HTTP_REFERER']);
			}
	}
	public function InActiveUser($id){

		$data = array();
			$data['status'] = 'INACTIVE';
			// proses
			$Ubah = $this->Model_action->Update('user_app',$data,$id,'id');
			if ($Ubah) {
				
				//echo "Berhasil!|||back";
				$this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
				redirect('Panel/URI/User');
			}else{
				//echo "Gagal!|||none";
		    	$this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
				header("location:".$_SERVER['HTTP_REFERER']);
			}
	}
	
	public function DeleteSeller($id){
		$datanya = $this->db->query("SELECT * FROM user_app WHERE id='$id'")->row_array();
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('user_app');
	    
		header("location:".$_SERVER['HTTP_REFERER']);
    }
	public function Delete($id){
		$datanya = $this->db->query("SELECT * FROM pengguna WHERE id='$id'")->row_array();
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('pengguna');
	    if ($datanya['foto'] != 'img/pengguna/user.png') {
			unlink($datanya['foto']);
	    }
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}