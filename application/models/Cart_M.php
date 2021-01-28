<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class Cart_M extends CI_Model{	

		public function All($user_id=""){
			if(!empty($user_id)){
				$this->db->where('user_id', $user_id);
			}
			$this->db->order_by("id", "DESC");
			$result = $this->db->get('cart');
        	return $result;
		}

		public function Show($user_id=""){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			if(!empty($user_id)){
				$this->db->where('user_id', $user_id);
			}
			$this->db->order_by("id", "desc");
        	$result = $this->db->get('cart', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('cart');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('cart')->row_array();
			return $result[$show];
		}


	}