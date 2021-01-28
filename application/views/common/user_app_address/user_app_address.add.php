<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php 
            if ($this->uri->segment(3) == 'AddressUser') {
              $type = 'MEMBER';
            }else{
              $type = 'SELLER';
            }
            $data = array('jumnya' => $this->Address_M->All($type, $this->input->get('query'))->num_rows());
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
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Kecamatan</th>
                <th>Kode Pos</th>
                <th>Alamat</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(1*$this->uri->segment(4) == 0){
                  $no = 1;
                }else{
                  $no = 1*$this->uri->segment(4);
                }
                
                $query = $this->Address_M->Show($type, $this->input->get('query'))->result_array();
                foreach ($query as $show) {
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td><?php echo $this->UserApp_M->getDetail($show['user_id'], 'id', 'fullname');?></td>
                <td><?php echo $show['province_id']?></td>
                <td><?php echo $show['city_id']?></td>
                <td><?php echo $show['district_id']?></td>
                <td><?php echo $show['postcode']?></td>
                <td><?php echo $show['address']?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
  