<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card"  id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/Pengguna/Update')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group row">
              <div class="col-md-6" style="margin-bottom: 10px;">
                <label>Akses</label>
                <select name="akses" class="form-control" required="">
                  <option value="">- Pilih akses -</option>
                  <?php
                    $akses = $this->Akses_M->All()->result_array();
                    foreach ($akses as $s_akses) {
                      if ($s_pengguna['akses'] == $s_akses['id']) {
                        $kondisi = 'selected';
                      }else{
                        $kondisi = '';
                      }
                      echo '<option value="'.$s_akses['id'].'" '.$kondisi.'>'.$s_akses['nama_akses'].'</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="col-md-6">
                <label>Nama pengguna</label>
                <input type="text" class="form-control" name="nama_pengguna" placeholder="Nama pengguna..." required="" value="<?php echo $s_pengguna['nama_pengguna']?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6" style="margin-bottom: 10px;">
                <label>Email</label>
                <input type="email" class="form-control" name="username" placeholder="Email..." required="" value="<?php echo $s_pengguna['username']?>">
              </div>
              <div class="col-md-6">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukan password baru" >
              </div>
            </div>
            <div class="form-group ">
              <label>File</label></br>
              <input type="file" name="foto" accept="image/*" ></br></br>
              <img class="lazyload" data-src="<?php echo $this->Model_main->exists($s_pengguna['foto'], 'no.png')?>" style="width: 100px;">
            </div>
            <div class="form-group">
              <a href="<?php echo base_url("Panel/URI/".$this->uri->segment(3));?>" class="btn btn-default">Kembali</a>
                <input type="hidden" class="form-control" name="id" required="" value="<?php echo $s_pengguna['id']?>">

              <button type="submit" class="btn btn-primary" id="btn_crud">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>