<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class Bantuan_M	 extends CI_Model{	

		public function All($table){
			$this->db->order_by("id", "DESC");
			$result = $this->db->get($table);
        	return $result;
		}

		public function Show($table){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->order_by("id", "desc");
        	$result = $this->db->get($table, $num, $offset);
			return $result;
		}

		public function getData($value, $field, $table){
			$this->db->where($field, $value);
			$result = $this->db->get($table);
			return $result;
		}

		public function getDetail($value, $field, $show, $table){
			$this->db->where($field, $value);
			$result = $this->db->get($table)->row_array();
			return $result[$show];
		}


	}