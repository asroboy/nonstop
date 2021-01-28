<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card"  id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/Testimonial/Update')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group row">
              <div class="col-md-6" style="margin-bottom: 10px;">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama..." required="" value="<?php echo $s_testimoial['nama']?>">
              </div>
              <div class="col-md-6">
                <label>Instansi</label>
                <input type="text" class="form-control" name="instansi" placeholder="Instansi..." required="" value="<?php echo $s_testimoial['instansi']?>">
              </div>
            </div>
            <div class="form-group ">
              <label>Testimonial</label>
              <textarea class="form-control" name="des" placeholder="Testimonial..." required="" rows="3"><?php echo $s_testimoial['des']?></textarea>
            </div>
            <div class="form-group ">
              <label>File</label></br>
              <input type="file" name="file" accept="image/*" ></br></br>
              <img class="lazyload" data-src="<?php echo $this->Model_main->exists($s_testimoial['foto'], 'no.png')?>" style="width: 100px;">
            </div>
             <div class="form-group">
              <label>Tampilkan</label></br>
              <label style="font-weight: 500;"><input type="radio"  name="tampilkan" value="YES" <?php if($s_testimoial['tampilkan'] == 'YES') { echo "checked"; } ?>>&nbsp;Ya</label>&nbsp;&nbsp;&nbsp;
              <label style="font-weight: 500;"><input type="radio"  name="tampilkan" value="NO"<?php if($s_testimoial['tampilkan'] == 'NO') { echo "checked"; } ?>>&nbsp;Tidak</label>&nbsp;&nbsp;&nbsp;
            </div>
            <div class="form-group">
              <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-default">Kembali</a>
                <input type="hidden" class="form-control" name="id" required="" value="<?php echo $s_testimoial['id']?>">

              <button type="submit" class="btn btn-primary" id="btn_crud">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>