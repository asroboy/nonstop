<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php 
            $data = array('jumnya' => $this->Transaksi_M->All($this->input->get('query'))->num_rows());
            if ($data['jumnya'] > $this->config->item('offset')) {
              $this->load->view('common/baris.php', $data);
              echo '<div style="margin-top: 60px;"></div>';
            }
          ?>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Kode Transakksi</th>
                <th>Tanggal</th>
                <th>Total Ongkir</th>
                <th>Total Potongan</th>
                <th>Sub Total</th>
                <th>Grand Total</th>
                <th>User ID</th>
                <th>Payment Method</th>
                <th>Status</th>
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
                $query = $this->Transaksi_M->Show($this->input->get('query'))->result_array();
                foreach ($query as $show) {
                  if (!empty($this->input->get('query'))) {
                    $url = base_url('Panel/URI/Transaksi?id='.$show['id'].'&query='.$this->input->get('query')) ;
                  }else{
                    $url = base_url('Panel/URI/Transaksi?id='.$show['id']) ;
                  }
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td><?php echo $show['kode_transaksi']?></td>
                <td><?php echo $show['tgl']?></td>
                <td><?php echo $this->Model_main->rupiah($show['total_ongkir'])?></td>
                <td><?php echo $this->Model_main->rupiah($show['total_potongan'])?></td>
                <td><?php echo $this->Model_main->rupiah($show['sub_total'])?></td>
                <td><?php echo $this->Model_main->rupiah($show['grand_total'])?></td>
                <td><?php echo $this->UserApp_M->getDetail($show['user_id'], 'id', 'fullname')?></td>
                <td><?php echo $show['payment_method']?></td>
                <td><?php echo $show['status']?></td>
                <td><a href="<?php echo $url;?>" class="btn btn-warning btn-sm">Detail</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
