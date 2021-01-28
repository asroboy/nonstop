<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class SubMenu_M extends CI_Model{	

		public function All(){
			$this->db->order_by("id_menu", "asc");
			$result = $this->db->get('sub_menu');
        	return $result;
		}

		public function Show(){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->order_by("id_menu", "asc");
        	$result = $this->db->get('sub_menu', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('sub_menu');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('sub_menu')->row_array();
			return $result[$show];
		}

		public function getSub($id){
			$this->db->where('id_menu', $id);
			$result = $this->db->get('sub_menu');
			return $result;
		}

	}