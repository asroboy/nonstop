<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $menu; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo base_url("Panel/URI/Dashboard")?>">Dashboard</a></li>
          <li class="breadcrumb-item active"><?php echo $menu; ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card">
        <div class="card-body pad">
          <form action="<?php echo base_url("common/Konfigurasi/update");?> " method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="row">
              <div class="form-group col-md-6">
                <label>Nama</label>
                <input type="hidden" name="id" value="<?php echo $konf['id']?>" required="">
                <input type="text" class="form-control" name="nama_company_id" placeholder="Nama web..." value="<?php echo $konf['nama_company_id']?>" required="">
              </div>

              <div class="form-group col-md-6">
                <label>Mobile</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">+62</span>
                  </div>
                  <input type="text" class="form-control" placeholder="8********" name="mobile" value="<?php echo $konf['mobile']?>">
                </div>
              </div>

              <div class="form-group col-md-6">
                <label>Telp</label>
                <input type="text" class="form-control" name="telp" placeholder="Telp..." value="<?php echo $konf['telp']?>">
              </div>

              <div class="form-group col-md-6">
                <label>Fax</label>
                <input type="text" class="form-control" name="fax" placeholder="Fax..." value="<?php echo $konf['fax']?>">
              </div>

              <div class="form-group col-md-6">
                <label>E - Mail</label>
                <input type="text" class="form-control" name="email" placeholder="E - Mail..." value="<?php echo $konf['email']?>">
              </div>
              <div class="form-group col-md-6">
                <label>Minimal Order User</label>
                <input type="number" class="form-control" name="user_minimal_post" value="<?php echo $konf['user_minimal_post']?>">
              </div>

              <div class="form-group col-md-6">
                <label>Logo</label></br>
                <input type="file"  name="logo_web" accept="image/*"></br></br>
                <img class="lazyload" data-src="<?php echo $this->Model_main->exists($konf['logo_web'], 'no.png')?>" style="width: 200px;">
              </div>
            </div>
            <div class="form-group">
              <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
              <button type="submit" class="btn btn-primary" id="btn_crud">Simpan</button>
            </div>
            <script>
              $(function () {
                // Summernote
                $('.textarea').summernote()
              })
            </script>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>