<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php 
            if ($this->input->get('seller') == 'no') {
              $data = array('jumnya' => $this->Penilaian_M->All($this->input->get('query'))->num_rows());
            }else{
              $data = array('jumnya' => $this->Penilaian_M->AllJoin($this->input->get('query'))->num_rows());
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
                <th>User ID</th>
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
                  $query = $this->Penilaian_M->Show($this->input->get('query'))->result_array();
                }else{
                  $query = $this->Penilaian_M->ShowJoin($this->input->get('query'))->result_array();
                }
                foreach ($query as $show) {
                  if(!empty($this->input->get('query'))){
                    $url = base_url('Panel/URI/Penilaian?query='.$this->input->get('query').'&seller='.$this->input->get('seller').'&id='.$show['id']);
                  }else{
                    $url = base_url('Panel/URI/Penilaian?id='.$show['id']);
                  }
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td><?php echo $this->Produk_M->getDetail($show['post_id'], 'id', 'judul');?></td>
                <td><?php echo $this->UserApp_M->getDetail($show['user_id'], 'id', 'fullname');?></td>
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
