<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class UserApp_M	 extends CI_Model{	

		public function All($value){
			$this->db->where('type', $value);
			$this->db->order_by("id", "DESC");
			$result = $this->db->get('user_app');
        	return $result;
		}

		public function Show($value){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->where('type', $value);
			$this->db->order_by("id", "desc");
        	$result = $this->db->get('user_app', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('user_app');
			return $result;
		}

		public function getAmount($type, $time=""){
			$this->db->where('type', $type);
			if (!empty($time)) {
				$this->db->like('created_at', $time);
			}
			$result = $this->db->get('user_app');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('user_app')->row_array();
			return $result[$show];
		}

		public function getMinat($user_id){
			$this->db->where('user_id', $user_id);
			$result = $this->db->get('user_minat_member');
			return $result;
		}
		public function ShowLog(){
			 $this->db->select('app_log.*,user_app.fullname');
             $this->db->from('app_log');
             $this->db->join('user_app', 'user_app.id = app_log.log_user_id', 'left');
            $this->db->order_by('user_app.fullname', 'asc');
            $result = $this->db->get();
        	return $result;
		}

	}