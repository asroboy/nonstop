<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class ContactUs_M extends CI_Model{	

		public function All(){
			$this->db->order_by("id", "DESC");
			$result = $this->db->get('contact_us');
        	return $result;
		}

		public function Show(){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->order_by("id", "desc");
        	$result = $this->db->get('contact_us', $num, $offset);
			return $result;
		}

		public function HariIni(){
			date_default_timezone_set('Asia/jakarta');
			$this->db->like("tgl", $date);
			$this->db->order_by("id", "DESC");
			$result = $this->db->get('contact_us');
        	return $result;
		}


	}