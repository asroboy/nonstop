<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class Model_action extends CI_Model{	
	// CRUD
		public function Update($table_name,$data,$id,$field){
	    	$this->db->where($field,$id);
			$ubah = $this->db->update($table_name,$data);
			return $ubah;
		}

		public function Insert($table_name,$data){
			$tambah = $this->db->insert($table_name,$data);
			return $tambah;
		}

		public function Delete_batch($table_name,$id,$field){
        	$this->db->where_in($field, $id);
			$this->db->delete($table_name);
		}
	// END CRUD

	// LOG
		public function AddLog($ket){
			$data = array(
				'id_pengguna' => $this->session->ses_id, 
				'ket' => $ket
			);
			$this->Insert('log', $data);
		}

		public function GetLogAdd($tb, $value, $field){
			return 'Tambah '.$tb.' [ '.$field.' = '.$value.' ]';
		}

		public function GetLogUpdate($tb, $v_id, $f_id, $form_name){
			$datanya = $this->db->query("SELECT * FROM $tb WHERE $f_id='$v_id'")->row_array();
			for ($i=0; $i < count($form_name) ; $i++) { 
				if ($datanya[$form_name[$i]] == $this->input->post($form_name[$i])) {
					$text[$form_name[$i]] = '';
				}else{
					$text[$form_name[$i]] = '[ '.$form_name[$i].' = '.$datanya[$form_name[$i]].' > '.$this->input->post($form_name[$i]).' ]';
				}
			}
			return $text;
		}

		public function GetLogDelete($tb, $v_id, $f_id, $v_tb, $field){
			$datanya = $this->db->query("SELECT * FROM $tb WHERE $f_id='$v_id'")->row_array();
			return 'Hapus '.$v_tb.' [ '.$field.' = '.$datanya[$field].' ]';
		}
	// END LOG

	// FORM
		public function htrim($field){
        	$result = htmlspecialchars(trim($field));
        	return $result;
		}

		public function trim($field){
        	$result = trim($field);
        	return $result;
		}
	// END FORM

	// UPLOAD
		public function upload($folder, $img, $name)
		{
			include APPPATH.'libraries/conf_img.php';
	        $config['upload_path'] = './'.$folder;
	   	 	$config['allowed_types'] = 'jpg|png|jpeg';
	    	$config['encrypt_name'] = $encrypt_name; 
	        $this->upload->initialize($config);  
	        $this->upload->do_upload($name);
	        $data = $this->upload->data();
	        $gambar = $data['file_name'];

	        $config['image_library']='gd2';
	        $config['source_image']='./'.$folder.$data['file_name'];
	        $config['create_thumb']= FALSE;
	        $config['maintain_ratio']= $maintain_ratio;
			$config['quality']= '100%';
			$config['width']= $img;
	        $config['new_image']= './'.$folder.$data['file_name'];
	        $this->image_lib->clear();
	        $this->image_lib->initialize($config);
	        $this->image_lib->resize();
	      	return $gambar;
		}
	// END UPLOAD

	}