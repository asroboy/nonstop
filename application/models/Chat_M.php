<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class Chat_M extends CI_Model{	

		public function All($value=""){
			if (!empty($value)) {
				$this->db->where('user_id', $value);
				$this->db->or_where('seller_id', $value);
			}
			$this->db->order_by("id", "DESC");
			$result = $this->db->get('app_discussion');
        	return $result;
		}

		public function Show($value=""){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			if (!empty($value)) {
				$this->db->where('user_id', $value);
				$this->db->or_where('seller_id', $value);
			}
			$this->db->order_by("id", "desc");
        	$result = $this->db->get('app_discussion', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('app_discussion');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('app_discussion')->row_array();
			return $result[$show];
		}

		public function Chat($id){
			$num = 10;
            $run = ( $this->input->get('o_page') - 1 );
            if ($run > 0) {
                $hasil = $run;
            }else{
                $hasil = 0;
            }
            $offset = $hasil * $num;

			$this->db->where('discussion_id', $id);
			$this->db->order_by("create_date", "asc");
        	$result = $this->db->get('app_discussion_chat', $num, $offset);
			return $result;
		}

		public function AllChat($id){
			$this->db->where('discussion_id', $id);
			$this->db->order_by("create_date", "asc");
			$result = $this->db->get('app_discussion_chat');
        	return $result;
		}


	}