<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class conf_status {

        protected $CI;

        public function __construct(){
                $this->CI =& get_instance();
                $this->CI->config->load('custom_config');
        }

        public function stat()
        {
        	return $this->CI->config->item('stat_admin');
        }

        public function adm_masuk()
        {
        	$data = array();
                $data['adm_masuk'] = $this->CI->config->item('adm_masuk');
        	$data['st_masuk'] = $this->CI->config->item('st_masuk');
        	return $data;
        }
}