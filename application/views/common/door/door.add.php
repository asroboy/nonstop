<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card" style="display: none" id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/Door/Add')?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
              <div class="col-md-6" style="margin-bottom: 10px;">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama..." required="">
              </div>
              <div class="col-md-6">
                <label>Font</label>
                <input type="text" class="form-control" name="font" placeholder="cth : fas fa-cogs" required="">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4" style="margin-bottom: 10px;">
                <label>Path</label>
                <input type="text" class="form-control" name="path" placeholder="... / ... .format" required="">
              </div>
              <div class="col-md-4" style="margin-bottom: 10px;">
                <label>Table</label>
                <input type="text" class="form-control" name="tb" placeholder="Table..." required="">
              </div>
              <div class="col-md-4">
                <label>Code Akses</label>
                <input type="text" class="form-control" name="code" placeholder="Code Akses..." required="">
              </div>
            </div>
            <div class="form-group ">
              <label>Link</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><?php echo base_url()?>Panel/URI/</span>
                </div>
                <input type="text" class="form-control" name="url" placeholder="..." required="">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
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
            $data = array('jumnya' => $this->Door_M->All()->num_rows());
            $this->load->view('common/baris.php', $data);
          ?>
          <a href="<?php echo base_url('Panel/URI/Door/position')?>" class="btn btn-primary" style="margin-bottom: 20px;">Urutan</a>
          <a href="javascript:void(0);" class="btn btn-success" style="margin-bottom: 20px;" id="btn-add"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah data</a>
          <a href="javascript:void(0);" class="btn btn-danger" style="margin-bottom: 20px; display: none;" id="hide-add"><i class="fas fa-times"></i>&nbsp;&nbsp;Tutup</a>
          
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th>Urutan</th>
                <th>Nama</th>
                <th>Optional</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = $this->Door_M->Show()->result_array();
                foreach ($query as $show) {
              ?>
              <tr>
                <td>
                  <?php echo $show['urutan']?>
                  
                </td>
                <td>
                  <i class="<?php echo $show['font']?>"></i>&nbsp;&nbsp;<?php echo $show['nama']?></br>
                  <small><label><b>
                    Url : <a href="<?php echo base_url().'Panel/URI/'.$show['url']?>"><?php echo base_url().'Panel/URI/'.$show['url']?></a></br>
                    Path : <?php echo $show['path']?></br>
                    Table : <?php echo $show['tb']?></br>
                    Code Akses : <?php echo $show['code']?>
                  </b></label></small>
                </td>
                <td>
                  <a href="<?php echo base_url('Panel/URI/Door/edit/'.$show['id'])?>" class="btn btn-warning btn-sm">Edit</a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url('common/Door/Delete/'.$show['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda ingin menghapus data ( <?php echo $show['nama']?> ) ?')">Delete</a>
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
