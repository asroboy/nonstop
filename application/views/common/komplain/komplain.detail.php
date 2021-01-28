<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <?php
            	$invoice = $this->Transaksi_M->getDetail2($show['transaction_detail_id'], 'id', 'invoice_id');
                $transaction_id = $this->Transaksi_M->getDetail2($show['transaction_detail_id'], 'id', 'transaction_id');
                $kode_transaksi = $this->Transaksi_M->getDetail($transaction_id, 'id', 'kode_transaksi');
                $post_id = $this->Transaksi_M->getDetail2($show['transaction_detail_id'], 'id', 'post_id');
                $seller_id =  $this->Produk_M->getDetail($post_id, 'id', 'seller_id');

                $label = array(
                    'Produk',
                    'Kode Transaksi',
                    'User ID',
                    'Seller ID',
                    'Tanggal',
                    'Deskripsi',
                );
                $value = array(
                    $this->Produk_M->getDetail($show['post_id'], 'id', 'judul'),
                    $kode_transaksi.' .  '.$invoice,
                    $this->UserApp_M->getDetail($show['user_id'], 'id', 'fullname'),
                    $this->UserApp_M->getDetail($seller_id, 'id', 'fullname'),
                    $this->Model_main->tgl($show['create_date']),
                    $show['description'],
                );
                echo '<table class="table">';
                for ($i=0; $i < count($label) ; $i++) { 
                    if ($i == 0) {
                        $style = 'style="border-top:0px !important;"';                        
                    }else{
                        $style = '';                        
                    }
                    echo '<tr>';
                    if ($label[$i] == 'User ID' || $label[$i] == 'Seller ID') {
                    	echo '<td width="150" '.$style.' align="right">'.$label[$i].'</td>';
                    }else{
                   	 	echo '<td width="150" '.$style.'>'.$label[$i].'</td>';
                    }
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
