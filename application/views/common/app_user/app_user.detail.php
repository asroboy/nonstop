<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <?php
                $label = array(
                    'Fullname',
                    'Type',
                    'Email',
                    'Phone',
                    'Description',
                    'Status',
                    'Token SMS',
                );
                $value = array(
                    $show['fullname'],
                    $show['type'],
                    $show['email'],
                    $show['phone'],
                    $show['description'],
                    $show['status'],
                    $show['token_sms'],
                );
                echo '<table class="table">';
                for ($i=0; $i < count($label) ; $i++) { 
                    if ($i == 0) {
                        $style = 'style="border-top:0px !important;"';                        
                    }else{
                        $style = '';                        
                    }
                    echo '<tr>';
                    echo '<td width="120" '.$style.'>'.$label[$i].'</td>';
                    echo '<td width="10" '.$style.'>&nbsp;:&nbsp;</td>';
                    echo '<td '.$style.'>'.$value[$i].'</td>';
                    echo '</tr>';
                }
                echo '</table>';
            ?>
            </br>
            <p style="margin-bottom: 0px;">
                <b>Minat : </b>
                <?php
                if ($this->session->userdata('uri_minat') == 'Y'){ 
                    echo '<a href="'.base_url('Panel/URI/Minat').'"  target="_blank" style="color:#c7254e; border-bottom:1px dashed #c7254e;">Cek</a>';
                }
                ?>
            </p>
            <?php
                $no = 0;
                $q_m = $this->UserApp_M->getMinat($show['id'])->result_array();
                foreach ($q_m as $s_m) {
                    $no++;
                    if ($no != "1") {
                        echo "&nbsp;&nbsp;&nbsp;";
                    }
                    echo "<code>".$this->Minat_M->getDetail($s_m['minat_id'], 'id', 'judul')."</code>";
                }
            ?>
            </br>
            </br>
            <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-default">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</section>
