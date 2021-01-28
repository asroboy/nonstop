<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/'.$this->uri->segment(3).'/Update')?>" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
              <div class="col-md-4" style="margin-bottom: 10px;">
                <label>Urutan</label>
                <input type="number" min="1" class="form-control" name="urutan" placeholder="cth : 1" required="" value="<?php echo $show['urutan']?>">
              </div>
              <div class="col-md-4" style="margin-bottom: 10px;">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama..." required="" value="<?php echo $show['nama']?>">
              </div>
              <div class="col-md-4">
                <label>Font</label>
                <input type="text" class="form-control" name="font" placeholder="cth : fas fa-cogs" required="" value="<?php echo $show['font']?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4" style="margin-bottom: 10px;">
                <label>Path</label>
                <input type="text" class="form-control" name="path" placeholder="... / ... .format" required=""  value="<?php echo $show['path']?>">
              </div>
              <div class="col-md-4" style="margin-bottom: 10px;">
                <label>Table</label>
                <input type="text" class="form-control" name="tb" placeholder="Table..." required="" value="<?php echo $show['tb']?>">
              </div>
              <div class="col-md-4">
                <label>Code Akses</label>
                <input type="text" class="form-control" name="code" placeholder="Code Akses..." required="" value="<?php echo $show['code']?>">
              </div>
            </div>
            <div class="form-group ">
              <label>Link</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><?php echo base_url()?>Panel/URI/</span>
                </div>
                <input type="text" class="form-control" name="url" placeholder="..." required="" value="<?php echo $show['url']?>">
              </div>
            </div>
            <div class="form-group">
              <a href="<?php echo base_url("Panel/URI/".$this->uri->segment(3));?>" class="btn btn-default">Kembali</a>
              <input type="hidden" class="form-control" name="id" required="" value="<?php echo $show['id']?>">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
