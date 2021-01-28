<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <?php
                $label = array(
                    'Seller ID',
                    'Judul',
                    'Kategori',
                    'Unit',
                    'Berat',
                    'Harga',
                    'Deskripsi',
                    'Create Date',
                );
                $value = array(
                    $this->UserApp_M->getDetail($show['seller_id'], 'id', 'fullname'),
                    $show['judul'],
                    $this->Minat_M->getDetail($show['category_id'], 'id', 'judul'),
                    $show['unit'].' '.$this->Satuan_M->getDetail($show['unit_id'], 'id', 'nama'),
                    $show['weight'].' '.$this->Berat_M->getDetail($show['weight_id'], 'id', 'nama'),
                    $this->Model_main->rupiah($show['price']),
                    $show['description'],
                    $this->Model_main->tgl($show['create_date']),
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
            <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-default">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</section>
