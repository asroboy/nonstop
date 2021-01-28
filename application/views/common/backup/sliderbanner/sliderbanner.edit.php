<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card"  id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/'.$this->uri->segment(3).'/Update')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group row">
              <div class="col-md-4" style="margin-bottom: 10px;">
                <label>Type</label>
                <select name="type" class="form-control" required="">
                  <option value="">- Pilih type -</option>
                  <option value="slider" <?php if ($s_sb['type'] == 'slider') { echo 'selected';}?> >slider</option>
                  <option value="banner" <?php if ($s_sb['type'] == 'banner') { echo 'selected';}?> >banner</option>
                </select>
              </div>
              <div class="col-md-4">
                <label>Nama</label>
                <input type="text" class="form-control" name="judul" placeholder="Nama..." required=""  value="<?php echo $s_sb['judul']?>">
              </div>
              <div class="col-md-4">
                <label>Urutan</label>
                <input type="number" class="form-control" name="urutan" min="1" placeholder="cth : 1" required=""  value="<?php echo $s_sb['urutan']?>">
              </div>
            </div>
            <div class="form-group ">
              <label>File</label></br>
              <input type="file" name="file" accept="image/*" ></br></br>
              <img class="lazyload" data-src="<?php echo $this->Model_main->exists($s_sb['file'], 'no.png')?>" style="width: 100px;">
            </div>
            <div class="form-group">
              <label>Tampilkan</label></br>
              <label style="font-weight: 500;"><input type="radio"  name="tampilkan" value="YES" <?php if($s_sb['tampilkan'] == 'YES') { echo "checked"; } ?>>&nbsp;Ya</label>&nbsp;&nbsp;&nbsp;
              <label style="font-weight: 500;"><input type="radio"  name="tampilkan" value="NO"<?php if($s_sb['tampilkan'] == 'NO') { echo "checked"; } ?>>&nbsp;Tidak</label>&nbsp;&nbsp;&nbsp;
            </div>
            <div class="form-group">
              <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-default">Kembali</a>
                <input type="hidden" class="form-control" name="id" required="" value="<?php echo $s_sb['id']?>">

              <button type="submit" class="btn btn-primary" id="btn_crud">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>