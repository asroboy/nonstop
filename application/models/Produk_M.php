<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class Produk_M	 extends CI_Model{	

		public function All($value=""){
			if (!empty($value)) {
				$this->db->where('seller_id', $value);
			}
			$this->db->order_by("id", "DESC");
			$result = $this->db->get('app_post_seller');
        	return $result;
		}

		public function Show($value=""){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			if (!empty($value)) {
				$this->db->where('seller_id', $value);
			}
			$this->db->order_by("id", "desc");
        	$result = $this->db->get('app_post_seller', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('app_post_seller');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('app_post_seller')->row_array();
			return $result[$show];
		}


	}