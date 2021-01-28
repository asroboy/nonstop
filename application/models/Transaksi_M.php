<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class Transaksi_M extends CI_Model{	

		public function All($value=""){
			if (!empty($value)) {
				$this->db->where('user_id', $value);
			}
			$this->db->order_by("id", "DESC");
			$result = $this->db->get('transaction');
        	return $result;
		}

		public function Show($value=""){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			if (!empty($value)) {
				$this->db->where('user_id', $value);
			}
			$this->db->order_by("id", "desc");
        	$result = $this->db->get('transaction', $num, $offset);
			return $result;
		}

		public function AllJoin($value='')
		{
			$this->db->select('transaction_detail.invoice_id, 
				transaction_detail.post_id, 
				transaction_detail.address_id, 
				transaction_detail.qty,
				transaction_detail.potongan,
				transaction_detail.ongkir,
				transaction_detail.total,
				transaction_detail.status
				');
			$this->db->from('transaction_detail');
			$this->db->join('app_post_seller', 'app_post_seller.id = transaction_detail.post_id');
			if (!empty($value)) {
				$this->db->where('app_post_seller.seller_id', $value);
			}
			$this->db->order_by("transaction_detail.id", "desc");
			$result = $this->db->get();
        	return $result;
		}

		public function ShowJoin($value=""){
			$num = $this->config->item('offset');
			$offset = $this->Model_main->offset();
			$this->db->select('transaction_detail.invoice_id, 
				transaction_detail.post_id, 
				transaction_detail.address_id, 
				transaction_detail.qty,
				transaction_detail.potongan,
				transaction_detail.ongkir,
				transaction_detail.total,
				transaction_detail.status
				');
			$this->db->from('transaction_detail');
			$this->db->join('app_post_seller', 'app_post_seller.id = transaction_detail.post_id');
			if (!empty($value)) {
				$this->db->where('app_post_seller.seller_id', $value);
			}
			$this->db->order_by("transaction_detail.id", "desc");
        	$result = $this->db->get('', $num, $offset);
			return $result;
		}

		public function getData($id){
			$this->db->where('id', $id);
			$result = $this->db->get('transaction');
			return $result;
		}

		public function getDetail($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('transaction')->row_array();
			return $result[$show];
		}

		public function getDetail2($value, $field, $show){
			$this->db->where($field, $value);
			$result = $this->db->get('transaction_detail')->row_array();
			return $result[$show];
		}

		public function getMore($id){
			$this->db->where('transaction_id', $id);
			$result = $this->db->get('transaction_detail');
			return $result;
		}


	}