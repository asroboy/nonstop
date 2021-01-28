  <section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php 
            $data = array('jumnya' => $this->Diskusi_M->All($this->input->get('query'))->num_rows());
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
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
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
                $query = $this->Diskusi_M->Show($this->input->get('query'))->result_array();
                foreach ($query as $show) {
                  if (!empty($this->input->get('query'))) {
                    $url = base_url('Panel/URI/Diskusi?id='.$show['id'].'&query='.$this->input->get('query'));
                  }else{
                    $url = base_url('Panel/URI/Diskusi?id='.$show['id']);
                  }
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td><?php echo $this->UserApp_M->getDetail($show['user_id'], 'id', 'fullname');?></td>
                <td><?php echo $show['judul']?></td>
                <td><?php echo $show['category']?></td>
                <td><?php echo $show['status']?></td>
                <td><?php echo $this->Model_main->tgl($show['post_date']);?></td>
                <td>
                  <a href="<?php echo $url; ?>" class="btn btn-warning btn-sm">Detail</a>
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
