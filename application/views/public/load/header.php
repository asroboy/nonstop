<?php
			echo '<ul>';

	        $no = 0;
	        $dt_mm = $this->MainMenu_M->Front()->result_array(); 
	        foreach ($dt_mm as $sh_mm) {
	            $no++;
	            if($sh_mm['type'] == 'custom'){
	                $explode = explode(':', $sh_mm['url']);
	                if ($explode[0] == 'http' || $explode[0] == 'https') {
	                	$link = $sh_mm['url'];
	                }else{
	                    $link = base_url().$sh_mm['url'];
	                }
	                $uri = $sh_mm['url'];
	           	}elseif($sh_mm['type'] == 'static page'){
	                error_reporting(0);
	                $q_hlm = $this->Halaman_M->getData($sh_mm['url'])->row_array(); 
	                $link = base_url()."page/".$q_hlm['url']."-".$q_hlm['id'];
	                $uri = $q_hlm['url']."-".$q_hlm['id'];
	            }
	            $j_sm = $this->SubMenu_M->getSub($sh_mm['id'])->num_rows(); 
	            if ($j_sm > 0) {
	            	echo '<li><span><a href="'.$link.'" target="'.$sh_mm['target'].'">'.$sh_mm['nama'].'</a></span>';
	            	// sub menu
					echo '<ul>';
					$q_sm = $this->SubMenu_M->getSub($sh_mm['id'])->result_array(); 
                  	foreach ($q_sm as $s_sm) {
	                    if($s_sm['type'] == 'custom'){
	                      	$link_2 = base_url().$s_sm['url'];
	                      	$uri_2 = $s_sm['url'];
	                    }elseif($s_sm['type'] == 'static page'){
	                      	error_reporting(0);
	                        $q_hlm_2 = $this->Halaman_M->getData($s_sm['url'])->row_array(); 
	                        $link_2 = base_url()."page/".$q_hlm_2['url']."-".$q_hlm_2['id'];
	                        $uri_2 = $q_hlm_2['url']."-".$q_hlm_2['id'];
	                    }
	                    echo ' <li><a href="'.$link_2.'" target="'.$s_sm['target'].'">'.$s_sm['nama'].'</a></li>';
	                  }
					echo '</ul>';
					// end
					echo '</li>';
				} else {
					echo '<li><span><a href="'.$link.'" target="'.$sh_mm['target'].'">'.$sh_mm['nama'].'</a></span></li>';
				}
			}

			echo '</ul>';
	    ?>