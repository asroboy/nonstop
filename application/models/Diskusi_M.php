<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class Diskusi_M extends CI_Model{	

		public function All($user_id=""){
			if (!empty($user_id)) {
				$this->db->where('user_id', $user_id);
			}
			$this->db->order_by("id", "DESC");
			$result = $this->db->get('app_forum');
        	return $result;
		}

		public function Show($user_id=""){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			if (!empty($user_id)) {
				$this->db->where('user_id', $user_id);
			}
			$this->db->order_by("id", "desc");
        	$result = $this->db->get('app_forum', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('app_forum');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('app_forum')->row_array();
			return $result[$show];
		}

		public function getComment($id){
			$this->db->where('forum_id', $id);
			$result = $this->db->get('app_forum_comment');
			return $result;
		}

		public function getSubComment($id){
			$this->db->where('comment_id', $id);
			$result = $this->db->get('app_forum_sub_comment');
			return $result;
		}

	}