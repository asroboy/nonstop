<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class ChooseUs_M extends CI_Model{	

		public function All(){
			$this->db->order_by("id", "DESC");
			$result = $this->db->get('choose_us');
        	return $result;
		}

		public function Show(){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->order_by("id", "DESC");
        	$result = $this->db->get('choose_us', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('choose_us');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('choose_us')->row_array();
			return $result[$show];
		}

	}