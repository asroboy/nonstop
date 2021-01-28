<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card" id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/Tautan/Update')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group row">
              <div class="col-md-4" style="margin-bottom: 10px;">
                <label>Type</label>
                <select name="type" class="form-control" required="">
                  <option value="">- Pilih type -</option>
                  <option value="header" <?php if($s_tautan['type'] == 'header') { echo 'selected'; }?> >header</option>
                </select>
              </div>
              <div class="col-md-4">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama..." required="" value="<?php echo $s_tautan['nama']?>">
              </div>
              <div class="col-md-4">
                <label>Target</label>
                <select class="form-control" name="target">
                  <option value="_self" <?php if($s_tautan['type'] == '_self') { echo 'selected'; }?>>Tab lama</option>
                  <option value="_blank" <?php if($s_tautan['type'] == '_blank') { echo 'selected'; }?>>Tab baru</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-8" style="margin-bottom: 10px;">
                <label>URL</label>
                <input type="text" class="form-control" name="url" placeholder="home  ATAU  <?php echo base_url()?>" required value="<?php echo $s_tautan['url']?>">
              </div>
              <div class="col-md-4">
                <label>Urutan</label>
                <input type="number" min="1" class="form-control" name="urutan" placeholder="cth : 1" required="" value="<?php echo $s_tautan['urutan']?>">
              </div>
            </div>
            <div class="form-group">
              <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-default">Kembali</a>
                <input type="hidden" class="form-control" name="id" required="" value="<?php echo $s_tautan['id']?>">
              <button type="submit" class="btn btn-primary" id="btn_crud">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>