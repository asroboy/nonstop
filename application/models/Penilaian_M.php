<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class Penilaian_M extends CI_Model{	

		public function All($value=""){
			if (!empty($value)) {
				$this->db->where('user_id', $value);
			}
			$this->db->order_by("id", "DESC");
			$result = $this->db->get('app_rating');
        	return $result;
		}

		public function Show($value=""){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			if (!empty($value)) {
				$this->db->where('user_id', $value);
			}
			$this->db->order_by("id", "desc");
        	$result = $this->db->get('app_rating', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('app_rating');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('app_rating')->row_array();
			return $result[$show];
		}

		public function AllJoin($value='')
		{
			$this->db->select('app_rating.id, 
				app_rating.user_id, 
				app_rating.post_id, 
				app_rating.description,
				app_rating.file,
				app_rating.create_date,
				');
			$this->db->from('app_rating');
			$this->db->join('app_post_seller', 'app_post_seller.id = app_rating.post_id');
			if (!empty($value)) {
				$this->db->where('app_post_seller.seller_id', $value);
			}
			$this->db->order_by("app_rating.id", "desc");
			$result = $this->db->get();
        	return $result;
		}

		public function ShowJoin($value=""){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->select('app_rating.id, 
				app_rating.user_id, 
				app_rating.post_id, 
				app_rating.description,
				app_rating.file,
				app_rating.create_date,
				');
			$this->db->from('app_rating');
			$this->db->join('app_post_seller', 'app_post_seller.id = app_rating.post_id');
			if (!empty($value)) {
				$this->db->where('app_post_seller.seller_id', $value);
			}
			$this->db->order_by("app_rating.id", "desc");
        	$result = $this->db->get('', $num, $offset);
			return $result;
		}


	}