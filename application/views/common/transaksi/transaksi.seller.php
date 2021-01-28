<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
           <?php
            $data = array('jumnya' => $this->Transaksi_M->AllJoin($this->input->get('query'))->num_rows());
            $this->load->view('common/baris_transaksi.seller.php', $data);
            echo $data['jumnya'];
           ?>
            <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-default">Kembali</a></br></br>
           <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Invoice ID</th>
                <th>Produk</th>
                <th>Alamat</th>
                <th>QTY</th>
                <th>Potongan</th>
                <th>Ongkir</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(1*$this->uri->segment(4) == 0){
                  $no = 1;
                }else{
                  $no = 1*$this->uri->segment(4);
                }
                $query = $this->Transaksi_M->ShowJoin($this->input->get('query'));
                foreach ($query->result_array() as $show) {
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td><?php echo $show['invoice_id']?></td>
                <td><?php echo $this->Produk_M->getDetail($show['post_id'], 'id', 'judul')?></td>
                <td><?php echo $show['address_id']?></td>
                <td><?php echo $show['qty']?></td>
                <td><?php echo $this->Model_main->rupiah($show['potongan'])?></td>
                <td><?php echo $this->Model_main->rupiah($show['ongkir'])?></td>
                <td><?php echo $this->Model_main->rupiah($show['total'])?></td>
                <td><?php echo $show['status']?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
