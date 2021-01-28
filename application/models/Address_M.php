<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class Address_M	 extends CI_Model{	

		public function All($value, $user_id=""){
			$this->db->where('type', $value);
			if(!empty($user_id)){
				$this->db->where('user_id', $user_id);
			}
			$this->db->order_by("id", "DESC");
			$result = $this->db->get('user_app_address');
        	return $result;
		}

		public function Show($value, $user_id=""){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->where('type', $value);
			if(!empty($user_id)){
				$this->db->where('user_id', $user_id);
			}
			$this->db->order_by("id", "desc");
        	$result = $this->db->get('user_app_address', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('user_app_address');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('user_app_address')->row_array();
			return $result[$show];
		}


	}