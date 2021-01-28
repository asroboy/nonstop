<?php 

class Testimonial extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_testimonial') == 'N'){
			redirect(base_url("Notfound"));
		}
	}

	public function Add(){
		$data = array();
		$data['nama'] = $this->Model_action->htrim($this->input->post('nama'));
		$data['instansi'] = $this->Model_action->htrim($this->input->post('instansi'));
		$data['des'] = $this->Model_action->trim($this->input->post('des'));
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/testimonial/', 300, 'file');
			$data['foto'] = 'img/testimonial/'.trim($file);
		}
		$data['create_by'] = $this->session->ses_id;
		// proses
		$tambah = $this->Model_action->Insert('testimonial',$data);
		if ($tambah > 0) {
			echo "Berhasil!|||reload";
	    	// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Testimonial');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Testimonial');
		}
	}

	public function Update(){
		include APPPATH.'libraries/conf_size_img.php';
		$id = $this->Model_action->htrim($this->input->post('id'));
		$data = array();
		$data['nama'] = $this->Model_action->htrim($this->input->post('nama'));
		$data['instansi'] = $this->Model_action->htrim($this->input->post('instansi'));
		$data['des'] = $this->Model_action->trim($this->input->post('des'));
		$data['tampilkan'] = $this->Model_action->trim($this->input->post('tampilkan'));
		if (!empty($_FILES['file']['name'])) {
			$file= $this->Model_action->upload('img/testimonial/', $testimonial, 'file');
			$data['foto'] = 'img/testimonial/'.trim($file);
		}
		$datanya = $this->db->query("SELECT * FROM testimonial WHERE id='$id'")->row_array();
		// proses
		$Ubah = $this->Model_action->Update('testimonial',$data,$id,'id');
		if ($Ubah) {
			if (!empty($_FILES['file']['name'])) {
				unlink($datanya['foto']);
			}
			echo "Berhasil!|||back";
			// $this->session->set_flashdata('result', $this->Model_main->Berhasil_alert('Berhasil menyimpan data!'));
			// redirect('Panel/URI/Testimonial');
		}else{
			echo "Gagal!|||none";
	    	// $this->session->set_flashdata('result', $this->Model_main->Gagal_alert('Gagal menyimpan data!'));
			// redirect('Panel/URI/Testimonial');
		}
	}

	public function Delete($id){
		$datanya = $this->db->query("SELECT * FROM testimonial WHERE id='$id'")->row_array();
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('testimonial');
		unlink($datanya['foto']);
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}