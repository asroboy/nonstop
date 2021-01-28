<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class MainMenu_M extends CI_Model{	

		public function All(){
			$this->db->order_by("urutan", "asc");
			$result = $this->db->get('main_menu');
        	return $result;
		}

		public function Front(){
			$this->db->order_by("urutan", "asc");
			$result = $this->db->get('main_menu');
        	return $result;
		}

		public function Show(){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->order_by("urutan", "asc");
        	$result = $this->db->get('main_menu', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('main_menu');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('main_menu')->row_array();
			return $result[$show];
		}

	}