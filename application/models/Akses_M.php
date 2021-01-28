<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class Akses_M extends CI_Model{	

		public function All(){
			$this->db->order_by("id", "DESC");
			$result = $this->db->get('akses');
        	return $result;
		}

		public function Show(){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->order_by("id", "desc");
        	$result = $this->db->get('akses', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('akses');
			return $result;
		}

		public function getCheck($data){
			$this->db->where('id', $this->session->userdata('ses_akses'));
			$result = $this->db->get('akses');
            $no = -1;
            $akses = array();
			foreach ($result->result_array() as $show) {
                $no++;
				for ($i=0; $i < count($data) ; $i++) { 
	                if ($show[$data[$i]] == 'Y') {
	                	$akses[$i] = TRUE;
	                }
	            }
			}
			return $akses;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('akses')->row_array();
			return $result[$show];
		}

		public function Count($tb, $field, $value){
			$this->db->where($field, $value);
			$result = $this->db->get($tb);
			return $result->num_rows();
		}

	}