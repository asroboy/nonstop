<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class UserFront_M extends CI_Model{	

		public function CekUserFront($email){
			$result = $this->db->query("SELECT * FROM user_front WHERE email='$email'");
			return $result;
		}

	}