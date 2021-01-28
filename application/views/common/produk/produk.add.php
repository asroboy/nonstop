<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php 
            $data = array('jumnya' => $this->Produk_M->All($this->input->get('query'))->num_rows());
            if ($data['jumnya'] > $this->config->item('offset')) {
              $this->load->view('common/baris.php', $data);
              echo '<div style="margin-top: 60px;"></div>';
            }
          ?>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Seller ID</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Create Date</th>
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
                $query = $this->Produk_M->Show($this->input->get('query'))->result_array();
                foreach ($query as $show) {
                  if (!empty($this->input->get('query'))) {
                    $url = base_url('Panel/URI/Produk?id='.$show['id'].'&query='.$this->input->get('query')) ;
                  }else{
                    $url = base_url('Panel/URI/Produk?id='.$show['id']) ;
                  }
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td><?php echo $this->UserApp_M->getDetail($show['seller_id'], 'id', 'fullname');?></td>
                <td><?php echo $show['judul']?></td>
                <td><?php echo $this->Minat_M->getDetail($show['category_id'], 'id', 'judul');?></td>
                <td><?php echo $this->Model_main->rupiah($show['price']);?></td>
                <td><?php echo $this->Model_main->tgl($show['create_date']);?></td>
                <td>
                  <a href="<?php echo $url;?>" class="btn btn-warning btn-sm">Detail</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
