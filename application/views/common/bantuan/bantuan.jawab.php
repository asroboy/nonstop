<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card"  id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/Bantuan/Add')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group ">
              <label>Pertanyaan <code>[<?php echo $show['title']?>]</code></label>
              <p><?php echo $userApp['fullname']?> / <?php echo $userApp['email']?></p>
            </div>
            <div class="form-group ">
              <label>Jawaban</label>
              <textarea class="ckeditor" rows="3" name="description" required="">Tulis jawaban</textarea>
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