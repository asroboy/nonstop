<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php 
            if ($this->input->get('seller') == 'no') {
              $data = array('jumnya' => $this->Komplain_M->All($this->input->get('query'))->num_rows());
            }else{
              $data = array('jumnya' => $this->Komplain_M->AllJoin($this->input->get('query'))->num_rows());
            }
            if ($data['jumnya'] > $this->config->item('offset')) {
              $this->load->view('common/baris_transaksi.seller.php', $data);
              echo '<div style="margin-top: 60px;"></div>';
            }
          ?>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Produk</th>
                <th>Kode Transaksi</th>
                <th>Tanggal</th>
                <th>Optional</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(1*$this->uri->segment(4) == 0){
                  $no = 1;
                }else{
                  $no = 1*$this->uri->segment(4);
                }
                if ($this->input->get('seller') == 'no') {
                  $query = $this->Komplain_M->Show($this->input->get('query'))->result_array();
                }else{
                  $query = $this->Komplain_M->ShowJoin($this->input->get('query'))->result_array();
                }
                foreach ($query as $show) {
                  if(!empty($this->input->get('query'))){
                    $url = base_url('Panel/URI/ReturKomplain?query='.$this->input->get('query').'&seller='.$this->input->get('seller').'&id='.$show['id']);
                  }else{
                    $url = base_url('Panel/URI/ReturKomplain?id='.$show['id']);
                  }
                  $invoice = $this->Transaksi_M->getDetail2($show['transaction_detail_id'], 'id', 'invoice_id');
                  $transaction_id = $this->Transaksi_M->getDetail2($show['transaction_detail_id'], 'id', 'transaction_id');
                  $kode_transaksi = $this->Transaksi_M->getDetail($transaction_id, 'id', 'kode_transaksi');
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td><?php echo $this->Produk_M->getDetail($show['post_id'], 'id', 'judul');?></td>
                <td><?php echo $kode_transaksi.' .  '.$invoice; ?></td>
                <td><?php echo $this->Model_main->tgl($show['create_date'])?></td>
                <td><a href="<?php echo $url; ?>" class="btn btn-warning btn-sm">Detail</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
