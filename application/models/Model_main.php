<?php  defined('BASEPATH') OR exit('No direct script access allowed');

	class Model_main extends CI_Model{	

		public function Konf(){
			$result = $this->db->query("SELECT * FROM konfigurasi")->row_array();
			return $result;
		}

		public function JumData($tb){
			$result = $this->db->query("SELECT * FROM $tb ")->num_rows();
			return $result;
		}

		public function JumDataW($tb, $field, $data){
			$result = $this->db->query("SELECT * FROM $tb WHERE $field = '$data'")->num_rows();
			return $result;
		}

		public function admn_login(){
			$result = $this->db->query("SELECT * FROM pengguna WHERE id='".$this->session->ses_id."'")->row_array();
			return $result;
		}

		public function made($id){
			$result = $this->db->query("SELECT * FROM pengguna WHERE id='".$id."' OR username='".$id."'")->row_array();
			return $result['nama_pengguna'];
		}

		public function exists($file, $gbr){
            if(file_exists($file)){ return base_url().$file;}
            else{ return base_url().'img/'.$gbr;}
        }

        public function show($kondisi){
            if($kondisi == 'YES'){ return '<label class="badge badge-success">Ya</label>';}
            else{ return '<label class="badge badge-danger">Tidak</label>';}
        }

        public function GetPassword()
        {
        	$data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890%$.,%/';
		    $rand= mt_rand(11,11);
		   	$string = '';
		    for ($i=0; $i < $rand ; $i++) {
		        $pos = rand(0, strlen($data)-1);
		        $string.= $data{$pos}; 
		    } 
			$password = $this->Model_action->trim($this->input->post('password'));
			$hashing = $string.password_hash($password, PASSWORD_BCRYPT);
			return $hashing;
        }

        public function offset()
        {
        	$num = $this->config->item('offset');
        	$run = ( $this->uri->segment(4) - 1 );
        	if ($run > 0) {
        		$hasil = $run;
        	}else{
        		$hasil = 0;
        	}
			$offset = $hasil * $num;
			return $offset;
        }
        
        public function tgl($tanggal){
            return date ('H:i, d/m/Y', strtotime($tanggal));
        }

        public function date($tanggal){
            return date ('d-m-Y', strtotime($tanggal));
        }

        public function jam($tanggal){
            return date ('H:i', strtotime($tanggal));
        }

        public function diffHari($t_awal, $t_selesai)
        {
        	$awal  = strtotime($t_awal);
    		$selesai    = strtotime($t_selesai); // Waktu sekarang
   		 	$diff   = $selesai - $awal;
    		$result = floor($diff / (60 * 60 * 24));
    		return $result;
        }

        public function diffJam($t_awal, $t_selesai)
        {
        	$awal  = strtotime($t_awal);
    		$selesai    = strtotime($t_selesai);
   		 	$diff   = $selesai - $awal;
    		$result = floor($diff / (60 * 60));
    		return $result;
        }

        public function bulan($bulan){
        	if ($bulan == '01') { return 'Januari';}
        	elseif ($bulan == '02') { return 'Februari';}
        	elseif ($bulan == '03') { return 'Maret';}
        	elseif ($bulan == '04') { return 'April';}
        	elseif ($bulan == '05') { return 'Mei';}
        	elseif ($bulan == '06') { return 'Juni';}
        	elseif ($bulan == '07') { return 'Juli';}
        	elseif ($bulan == '08') { return 'Agustus';}
        	elseif ($bulan == '09') { return 'September';}
        	elseif ($bulan == '10') { return 'Oktober';}
        	elseif ($bulan == '11') { return 'November';}
        	elseif ($bulan == '12') { return 'Desember';}
         }

		public function Gagal_alert($pesan)
		{
			return '<div class="alert alert-danger" role="alert">'.$pesan.'</div>';
		}

		public function Berhasil_alert($pesan)
		{
			return '<div class="alert alert-success" role="alert">'.$pesan.'</div>';
		}

		public function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka);
            return $hasil_rupiah;
        }

        public function NumToRom($number) {
            $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
            $returnValue = '';
            while ($number > 0) {
                foreach ($map as $roman => $int) {
                    if($number >= $int) {
                        $number -= $int;
                        $returnValue .= $roman;
                        break;
                    }
                }
            }
            return $returnValue;
        }

        public function ConfigMail()
        {
			$config = array();
	        $config['useragent'] = 'Codeigniter';
		    $config['protocol'] = 'smtp';
			$config['mailpath'] = 'html';
	        $config['mailtype']= "html";
		    $config['charset'] = 'utf-8';
		    $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
			$config['smtp_port']= '465';
			$config['smtp_timeout']= '400';
		    $config['smtp_user']= 'rifdah.a122@gmail.com'; // isi dengan email kamu
		    $config['smtp_pass']= 'Neazy122'; // isi dengan password kamu
			$config['crlf']="\r\n"; 
			$config['newline']="\r\n"; 
			$config['wordwrap'] = TRUE;
			$config['send_multipart'] = FALSE;
			return $config;
		}

		public function ConfigPagination($base, $total_rows, $per_page)
		{
			$config['base_url'] = $base ;
			$config['total_rows'] = $total_rows;
		  	$config['enable_query_strings'] = TRUE;
	   	 	$config['page_query_string'] = TRUE;
	    	$config['use_page_numbers'] = TRUE;
	    	$config['query_string_segment'] = 'page';
			$config['per_page'] = $per_page;
			$config['full_tag_open'] = '<ul class="">';
			$config['full_tag_close'] = '</ul>';
			$config['last_tag_open'] = '<li class="">';
			$config['last_tag_open'] = '</li>';
			$config['cur_tag_open'] = '<li class="">';
			$config['cur_tag_close'] = '</li>';
			$config["num_tag_open"] = '<li class="">';
			$config["num_tag_close"] = '</li>';
			$config['first_link'] = '1';
			$config["first_tag_open"] = '<li class="">';
			$config["first_tag_close"] = '</li>';
			$config['last_link'] = round($config['total_rows'] / $config['per_page']);
			$config["last_tag_open"] = '<li class="">';
			$config["last_tag_close"] = '</li>';
			$config['next_link'] = '<i class="ui-arrow-right"></i>';
			$config['next_tag_open'] = '<li href="#" class="">';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '<i class="ui-arrow-left"></i>';
			$config['prev_tag_open'] = '<li href="#" class="">';
			$config['prev_tag_close'] = '</li>';
			return $config;
		}

		public function vc()
		{
			date_default_timezone_set('Asia/Jakarta');
		    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		      $ip = $_SERVER['HTTP_CLIENT_IP'];
		    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		    }else{
		      $ip = $_SERVER['REMOTE_ADDR'];
		    }
		    $data = array(
		    	'ip' => $ip,
		    	'online' => date("H:i:s"),
		    	'tgl' => date("Y-m-d"),
		    	'target' => $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
		    );
			$tambah = $this->db->insert('visitor',$data);
    		return $tambah;
		}

		public function penyebut($nilai) {
    		$nilai = abs($nilai);
    		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    		$temp = "";
    		if ($nilai < 12) {
    			$temp = " ". $huruf[$nilai];
    		} else if ($nilai <20) {
    			$temp = $this->penyebut($nilai - 10). " belas";
    		} else if ($nilai < 100) {
    			$temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
    		} else if ($nilai < 200) {
    			$temp = " seratus" . $this->penyebut($nilai - 100);
    		} else if ($nilai < 1000) {
    			$temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
    		} else if ($nilai < 2000) {
    			$temp = " seribu" . $this->penyebut($nilai - 1000);
    		} else if ($nilai < 1000000) {
    			$temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
    		} else if ($nilai < 1000000000) {
    			$temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
    		} else if ($nilai < 1000000000000) {
    			$temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
    		} else if ($nilai < 1000000000000000) {
    			$temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
    		}     
    		return $temp;
    	}
    	
    	public function terbilang($nilai) {
    		if($nilai<0) {
    			$hasil = "minus ". trim($this->penyebut($nilai));
    		} else {
    			$hasil = trim($this->penyebut($nilai));
    		}     		
    		return $hasil;
    	}
    	function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);

            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;

            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }

            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }

	}