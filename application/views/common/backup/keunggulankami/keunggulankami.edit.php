<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card"  id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/ChooseUs/Update')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group row">
              <div class="col-md-6">
                <label>Urutan</label>
                <input type="number" min="1" class="form-control" name="urutan" placeholder="cth : 1" required="" value="<?php echo $show['urutan']?>"> 
              </div>
              <div class="col-md-6">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" placeholder="Judul..." required="" value="<?php echo $show['judul']?>"> 
              </div>
            </div>
            <div class="form-group ">
              <label>Konten</label>
              <textarea class="ckeditor" rows="3" name="des" required=""><?php echo $show['des']?></textarea>
            </div>
            <div class="form-group ">
              <label>Foto</label></br>
              <input type="file" name="file" accept="image/*"></br></br>
              <img class="lazyload" data-src="<?php echo $this->Model_main->exists($show['file'], 'no.png')?>" style="width: 100px;">
            </div>
            <div class="form-group">
              <label>Tampilkan</label></br>
              <label style="font-weight: 500;"><input type="radio"  name="tampilkan" value="YES" <?php if($show['tampilkan'] == 'YES') { echo "checked"; } ?>>&nbsp;Ya</label>&nbsp;&nbsp;&nbsp;
              <label style="font-weight: 500;"><input type="radio"  name="tampilkan" value="NO"<?php if($show['tampilkan'] == 'NO') { echo "checked"; } ?>>&nbsp;Tidak</label>&nbsp;&nbsp;&nbsp;
            </div>
            <div class="form-group">
              <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-default">Kembali</a>
                <input type="hidden" class="form-control" name="id" required="" value="<?php echo $show['id']?>">
              <button type="submit" class="btn btn-primary" id="btn_crud">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>