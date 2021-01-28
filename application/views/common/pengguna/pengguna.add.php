<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card" style="display: none" id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/Pengguna/Add')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group row">
              <div class="col-md-6" style="margin-bottom: 10px;">
                <label>Akses</label>
                <select name="akses" class="form-control" required="">
                  <option value="">- Pilih akses -</option>
                  <?php
                    $akses = $this->Akses_M->All()->result_array();
                    foreach ($akses as $s_akses) {
                      echo '<option value="'.$s_akses['id'].'">'.$s_akses['nama_akses'].'</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="col-md-6">
                <label>Nama pengguna</label>
                <input type="text" class="form-control" name="nama_pengguna" placeholder="Nama pengguna..." required="">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6" style="margin-bottom: 10px;">
                <label>Email</label>
                <input type="email" class="form-control" name="username" placeholder="Email..." required="">
              </div>
              <div class="col-md-6">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password..." required="">
              </div>
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
            $data = array('jumnya' => $this->Pengguna_M->All()->num_rows());
            $this->load->view('common/baris.php', $data);
          ?>
          <a href="javascript:void(0);" class="btn btn-success" style="margin-bottom: 20px;" id="btn-add"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah data</a>
          <a href="javascript:void(0);" class="btn btn-danger" style="margin-bottom: 20px; display: none;" id="hide-add"><i class="fas fa-times"></i>&nbsp;&nbsp;Tutup</a>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Gambar</th>
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
                $pengguna = $this->Pengguna_M->Show()->result_array();
                foreach ($pengguna as $s_pengguna) {
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td>
                  <?php echo $s_pengguna['nama_pengguna']?></br>
                  <small><label>
                    Akses : <?php echo$this->Akses_M->getDetail($s_pengguna['akses'], 'id', 'nama_akses')?>
                  </label></small>
                </td>
                <td>
                  <?php echo $s_pengguna['username']?></br>
                </td>
                <td>
                  <img class="lazyload" data-src="<?php echo $this->Model_main->exists($s_pengguna['foto'], 'user.png')?>" style="width: 50px;">
                </td>
                <td>
                  <a href="<?php echo base_url('Panel/URI/Pengguna/edit/'.$s_pengguna['id'])?>" class="btn btn-warning btn-sm">Edit</a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url('common/Pengguna/Delete/'.$s_pengguna['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda ingin menghapus data ( <?php echo $s_pengguna['nama_pengguna']?> ) ?')">Delete</a>
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