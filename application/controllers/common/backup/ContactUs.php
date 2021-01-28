<?php 

class ContactUs extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$lib = $this->conf_status->adm_masuk();
		if($this->session->userdata('status') != $this->conf_status->stat() || $this->session->userdata('uri_hubungi_kami') == 'N'){
			redirect(base_url("Notfound"));
		}

	}

	public function Delete($id){
		$data = array('id' => $id);
		$this->db->where($data);
	    $this->db->delete('contact_us');
		header("location:".$_SERVER['HTTP_REFERER']);
    }

}