<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card"  id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/ServiceCategory/Update')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            
            <div class="form-group ">
              <label>Judul</label>
              <input type="text" class="form-control" name="title" placeholder="title..." required="" value="<?php echo $show['title']?>">
            </div>
            <div class="form-group ">
              <label>Kode</label>
              <input type="text" class="form-control" name="code" placeholder="code..." required="" value="<?php echo $show['code']?>">
            </div>
            <div class="form-group ">
              <label>Foto</label></br>
              <input type="file" name="file" accept="image/*"></br></br>
              <img class="lazyload" data-src="<?php echo call_folder($show['file'])?>"style="width: 150px;">
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