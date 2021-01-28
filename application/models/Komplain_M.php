<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class Komplain_M extends CI_Model{	

		public function All($value=""){
			if (!empty($value)) {
				$this->db->where('user_id', $value);
			}
			$this->db->order_by("id", "DESC");
			$result = $this->db->get('app_complain');
        	return $result;
		}

		public function Show($value=""){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			if (!empty($value)) {
				$this->db->where('user_id', $value);
			}
			$this->db->order_by("id", "desc");
        	$result = $this->db->get('app_complain', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('app_complain');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('app_complain')->row_array();
			return $result[$show];
		}

		public function AllJoin($value='')
		{
			$this->db->select('app_complain.id, 
				app_complain.user_id, 
				app_complain.post_id, 
				app_complain.transaction_detail_id,
				app_complain.description,
				app_complain.file,
				app_complain.create_date,
				');
			$this->db->from('app_complain');
			$this->db->join('app_post_seller', 'app_post_seller.id = app_complain.post_id');
			if (!empty($value)) {
				$this->db->where('app_post_seller.seller_id', $value);
			}
			$this->db->order_by("app_complain.id", "desc");
			$result = $this->db->get();
        	return $result;
		}

		public function ShowJoin($value=""){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->select('app_complain.id, 
				app_complain.user_id, 
				app_complain.post_id, 
				app_complain.transaction_detail_id,
				app_complain.description,
				app_complain.file,
				app_complain.create_date,
				');
			$this->db->from('app_complain');
			$this->db->join('app_post_seller', 'app_post_seller.id = app_complain.post_id');
			if (!empty($value)) {
				$this->db->where('app_post_seller.seller_id', $value);
			}
			$this->db->order_by("app_complain.id", "desc");
        	$result = $this->db->get('', $num, $offset);
			return $result;
		}


	}