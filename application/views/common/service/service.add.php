<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card" style="display: none" id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/'.$this->uri->segment(3).'/Add')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group ">
              <label>Category Service</label>
              <select class="form-control" name='category_id'>
              <option value="">- Pilih Category -</option>
                  <?php
                    $service = $this->ServiceCategory_M->All()->result_array();
                    foreach ($service as $s_ser) {
                        
                      echo '<option value="'.$s_ser['id'].'">'.$s_ser['title'].'</option>';
                    }
                  ?>
              </select>
            </div>
            <div class="form-group ">
              <label>Category Sub Service</label>
              <select class="form-control" name='sub_category_id'>
              <option value="">- Pilih Sub Category -</option>
                  <?php
                    $sservice = $this->ServiceSubCategory_M->All()->result_array();
                    foreach ($sservice as $s_sser) {
                        
                      echo '<option value="'.$s_sser['id'].'">'.$s_sser['title'].'</option>';
                    }
                  ?>
              </select>
            </div>
            <div class="form-group ">
              <label>Judul</label>
              <input type="text" class="form-control" name="title" placeholder="title..." required="">
            </div>
            
            <div class="form-group ">
              <label>Kode Produk</label>
              <input type="text" class="form-control" name="kode_produk" placeholder="kode produk..." required="">
            </div>
            <div class="form-group ">
              <label>Kode Provider (Untuk Pulsa)</label>
              <input type="text" class="form-control" name="kode_provider" placeholder="title..." >
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="btn_crud">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php 
            $data = array('jumnya' => $this->Service_M->All()->num_rows());
            $this->load->view('common/baris.php', $data);
          ?>
          <a href="javascript:void(0);" class="btn btn-success" style="margin-bottom: 20px;" id="btn-add"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah data</a>
          <a href="javascript:void(0);" class="btn btn-danger" style="margin-bottom: 20px; display: none;" id="hide-add"><i class="fas fa-times"></i>&nbsp;&nbsp;Tutup</a>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Judul</th>
                <th>Kode Produk</th>
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
                $query = $this->Service_M->Show()->result_array();
                foreach ($query as $show) {
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td><?php echo $show['title']?><br>
                    <small>
                        Category : <?php echo $this->ServiceCategory_M->getDetail($show['category_id'],'id','title')?><br>
                        Sub Category : <?php echo $this->ServiceSubCategory_M->getDetail($show['sub_category_id'],'id','title')?><br>
                        Status : <?php echo $show['status']?>
                    </small>
                </td>
                <td><?php echo $show['kode_produk']?></td>
                <td>
                  <a href="<?php echo base_url('Panel/URI/'.$this->uri->segment(3).'/edit/'.$show['id'])?>" class="btn btn-warning btn-sm">Edit</a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url('common/'.$this->uri->segment(3).'/Delete/'.$show['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda ingin menghapus data ( <?php echo $show['title']?> ) ?')">Delete</a>
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
