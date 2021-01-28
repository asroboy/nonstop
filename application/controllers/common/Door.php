<?php 

class Door extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_door') == 'N'){
			redirect(base_url("Panel/URI/permiss"));
		}

	}

	public function Add(){
		$query = $this->db->query("SELECT max(urutan) as jumlah FROM door")->row_array();
		$jumlah = $query['jumlah']+1;
		$data = array();
		$data['nama'] = $this->Model_action->htrim($this->input->post('nama'));
		$data['path'] = $this->Model_action->htrim($this->input->post('path'));
		$data['font'] = $this->Model_action->htrim($this->input->post('font'));
		$data['code'] = $this->Model_action->htrim($this->input->post('code'));
		$data['tb'] = $this->Model_action->htrim($this->input->post('tb'));
		$data['url'] = $this->Model_action->htrim($this->input->post('url'));
		$data['urutan'] = $jumlah;
		// proses
		$tambah = $this->Model_action->Insert('door',$data);
		if ($tambah > 0) {
	    	$this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			redirect('Panel/URI/Door');
		}else{
	    	$this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			redirect('Panel/URI/Door');
		}
	}

	public function Update(){
		$id = $this->Model_action->htrim($this->input->post('id'));
		date_default_timezone_set("Asia/Jakarta");
		$data = array();
		$data['nama'] = $this->Model_action->htrim($this->input->post('nama'));
		$data['path'] = $this->Model_action->htrim($this->input->post('path'));
		$data['font'] = $this->Model_action->htrim($this->input->post('font'));
		$data['code'] = $this->Model_action->htrim($this->input->post('code'));
		$data['tb'] = $this->Model_action->htrim($this->input->post('tb'));
		$data['url'] = $this->Model_action->htrim($this->input->post('url'));
		$data['urutan'] = $this->Model_action->htrim($this->input->post('urutan'));

		// proses
		$Ubah = $this->Model_action->Update('door',$data,$id,'id');
		if ($Ubah) {
			$this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			redirect('Panel/URI/Door');
		}else{
	    	$this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			redirect('Panel/URI/Door');
		}
	}

	public function Delete($id){
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('door');
		header("location:".$_SERVER['HTTP_REFERER']);
    }

	public function Position(){
		$i=1;
		$urutan = $_POST['urutan'];
		
		foreach($urutan as $k=>$v){
			$data = array();
			$data['urutan'] = $i;
			$Ubah = $this->Model_action->Update('door',$data,$v,'id');
			$i++;
		}
	}


}