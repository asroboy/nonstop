<?php 

class Notfound extends CI_Controller{

	function __construct(){
		parent::__construct();

	}

	public function index(){
	    $this->load->library('user_agent');
		if ($this->agent->is_robot())
		{
		        $agent = $this->agent->robot();
		        redirect(base_url('home'));
		}
		elseif ($this->agent->is_mobile())
		{
		        $agent = $this->agent->mobile();
		        redirect(base_url('Mobile/index'));
		}
		else
		{
		        $agent = 'Unidentified User Agent';
		        redirect(base_url('home'));
		}

// 		echo $agent;
	}


}