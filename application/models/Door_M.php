<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class Door_M extends CI_Model{	

		public function All($url=''){
			if (!empty($url)) {
				$this->db->where_not_in('url', $url);
			}
			$this->db->order_by("urutan", "asc");
			$result = $this->db->get('door');
        	return $result;
		}

		public function Group($url=''){
			if (!empty($url)) {
				$this->db->where_not_in('url', $url);
			}
			$this->db->where_not_in('grup', '');
			$this->db->order_by("urutan", "asc");
			$this->db->group_by("grup");
			$result = $this->db->get('door');
        	return $result;
		}

		public function Show(){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->order_by("urutan", "asc");
        	$result = $this->db->get('door', $num, $offset);
			return $result;
		}

		public function getData($value, $field){
			$this->db->where($field, $value);
			$result = $this->db->get('door');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('door')->row_array();
			return $result[$show];
		}

	}