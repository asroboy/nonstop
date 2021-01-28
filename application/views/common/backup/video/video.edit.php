<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card"  id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/Video/Update')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group ">
              <label>Nama Video</label>
              <input type="text" class="form-control" name="judul" placeholder="Nama Portofolio..." required="" value="<?php echo $show['judul']?>">
            </div>
            <div class="form-group ">
              <label>Link Video</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">https://www.youtube.com/watch?v=</span>
                </div>
                <input type="text" class="form-control" name="des" placeholder="ApL8HZDLitg" required="" value="<?php echo $show['des']?>">
              </div>
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
  </div>
</section>