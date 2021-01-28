<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php 
            $data = array('jumnya' => $this->UserApp_M->All('SELLER')->num_rows());
            if ($data['jumnya'] > $this->config->item('offset')) {
              $this->load->view('common/baris.php', $data);
              echo '<div style="margin-top: 60px;"></div>';
            }
          ?>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Nama</th>
                <th>E-Mail</th>
                <!-- <th>Phone</th> -->
                <th>Status</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(1*$this->uri->segment(4) == 0){
                  $no = 1;
                }else{
                  $no = 1*$this->uri->segment(4);
                }
                $query = $this->UserApp_M->Show('SELLER')->result_array();
                foreach ($query as $show) {
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td><?php echo $show['fullname']?></td>
                <td><?php echo $show['email']?></td>
                <!-- <td><?php echo $show['phone']?></td> -->
                <td><?php echo $show['status']?></td>
                <td>
                  <?php
                    if ($this->session->userdata('uri_user_app_address') == 'Y'){ 
                      echo '<a href="'.base_url('Panel/URI/AddressSeller?query='.$show['id']).'" class="btn btn-warning btn-sm" style="margin-bottom:10px;">Alamat</a>&nbsp;&nbsp;&nbsp;';
                    }

                    if ($this->session->userdata('uri_diskusi') == 'Y'){ 
                      echo '<a href="'.base_url('Panel/URI/Diskusi?query='.$show['id']).'" class="btn btn-warning btn-sm" style="margin-bottom:10px;">Diskusi</a>&nbsp;&nbsp;&nbsp;';
                    }

                    if ($this->session->userdata('uri_chat') == 'Y'){ 
                      echo '<a href="'.base_url('Panel/URI/Chat?query='.$show['id']).'" class="btn btn-warning btn-sm" style="margin-bottom:10px;">Chat</a>&nbsp;&nbsp;&nbsp;';
                    }

                    if ($this->session->userdata('uri_produk') == 'Y'){ 
                      echo '<a href="'.base_url('Panel/URI/Produk?query='.$show['id']).'" class="btn btn-warning btn-sm" style="margin-bottom:10px;">Produk</a>&nbsp;&nbsp;&nbsp;';
                    }

                    if ($this->session->userdata('uri_transaksi') == 'Y'){ 
                      echo '<a href="'.base_url('Panel/URI/Transaksi?query='.$show['id'].'&seller=yes').'" class="btn btn-warning btn-sm" style="margin-bottom:10px;">Transaksi</a>&nbsp;&nbsp;&nbsp;';
                    }

                    if ($this->session->userdata('uri_komplain') == 'Y'){ 
                      echo '<a href="'.base_url('Panel/URI/ReturKomplain?query='.$show['id'].'&seller=yes').'" class="btn btn-warning btn-sm" style="margin-bottom:10px;">Retur Komplain</a>&nbsp;&nbsp;&nbsp;';
                    }

                    if ($this->session->userdata('uri_penilaian') == 'Y'){ 
                      echo '<a href="'.base_url('Panel/URI/Penilaian?query='.$show['id'].'&seller=yes').'" class="btn btn-warning btn-sm" style="margin-bottom:10px;">Penilaian</a>&nbsp;&nbsp;&nbsp;';
                    }

                    echo '<a href="'.base_url('Panel/URI/Seller?id='.$show['id']).'" class="btn btn-warning btn-sm" style="margin-bottom:10px;">Detail</a>&nbsp;&nbsp;&nbsp;';
                  ?>
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
