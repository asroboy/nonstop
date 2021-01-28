<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class PatnerClient_M extends CI_Model{	

		public function All($type=""){
			if (!empty($type)) {
				$this->db->where('type', $type);
			}
			$result = $this->db->get('partnerclient');
			return $result;
		}

		public function Show(){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->order_by("id", "desc");
        	$result = $this->db->get('partnerclient', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('partnerclient');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('partnerclient')->row_array();
			return $result[$show];
		}

	}