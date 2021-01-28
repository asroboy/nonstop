<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php 
            $data = array('jumnya' => $this->Cart_M->All($this->input->get('query'))->num_rows());
            if ($data['jumnya'] > $this->config->item('offset')) {
              $this->load->view('common/baris.php', $data);
              echo '<div style="margin-top: 60px;"></div>';
            }
          ?>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>User ID</th>
                <th>Produk</th>
                <th>QTY</th>
                <th>Potongan</th>
                <th>Harga</th>
                <th>Ongkir</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(1*$this->uri->segment(4) == 0){
                  $no = 1;
                }else{
                  $no = 1*$this->uri->segment(4);
                }
                $query = $this->Cart_M->Show($this->input->get('query'))->result_array();
                foreach ($query as $show) {
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td><?php echo $this->UserApp_M->getDetail($show['user_id'], 'id', 'fullname');?></td>
                <td><?php echo $this->Produk_M->getDetail($show['post_id'], 'id', 'judul');?></td>
                <td><?php echo $show['qty'];?></td>
                <td><?php echo $this->Model_main->rupiah($show['potongan']);?></td>
                <td><?php echo $this->Model_main->rupiah($this->Produk_M->getDetail($show['post_id'], 'id', 'price'));?></td>
                <td><?php echo $this->Model_main->rupiah($show['ongkir']);?></td>
                <td><?php echo $this->Model_main->rupiah($show['total']);?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
