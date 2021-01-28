<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class File_M extends CI_Model{	

		public function All($value){
			$this->db->where("jenis_file", $value);
			$result = $this->db->get('file');
        	return $result;
		}

		public function Show($value){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->where("jenis_file", $value);
			$this->db->order_by("id", "desc");
        	$result = $this->db->get('file', $num, $offset);
			return $result;
		}

		public function getData($id, $value){
			$this->db->where('id', $id);
			$this->db->where("jenis_file", $value);
			$result = $this->db->get('file');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('file')->row_array();
			return $result[$show];
		}

	}