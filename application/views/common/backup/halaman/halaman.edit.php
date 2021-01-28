<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card"  id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/Halaman/Update')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group ">
              <label>Judul</label>
              <input type="text" class="form-control" name="judul" placeholder="Judul..." required="" value="<?php echo $s_page['judul']?>">
            </div>
            <div class="form-group ">
              <label>Keyword</label>
              <textarea class="form-control" rows="3" name="keyword" placeholder="cth : artikel, artikel terkini, info terkini" required=""><?php echo $s_page['keyword']?></textarea>
            </div>
            <div class="form-group ">
              <label>Konten</label>
              <textarea class="ckeditor" rows="3" name="des" required=""><?php echo $s_page['des']?></textarea>
            </div>
            <div class="form-group">
              <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-default">Kembali</a>
                <input type="hidden" class="form-control" name="id" required="" value="<?php echo $s_page['id']?>">
              <button type="submit" class="btn btn-primary" id="btn_crud">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>