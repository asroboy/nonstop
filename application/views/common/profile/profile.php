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
    <div class="col-md-12">
      <?php echo $this->session->flashdata($alert); ?>    
    </div>
    <div class="col-md-3">
      <div class="card card-primary card-outline">
        <div class="box-profile">
          <div class="text-center">
            <img class="img-fluid lazyload"  data-src="<?php echo $this->Model_main->exists($login['foto'], 'user.png')?>" style="width: 100%;">
          </div>
          <h3 class="profile-username text-center"><?php echo $login['nama_pengguna']?></h3>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="card">
        <div class="card-body">
          <div class="tab-content">
            <div class="active tab-pane" id="settings">
              <form class="form-horizontal" action="<?php echo base_url('common/Pengguna/Update')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nama" value="<?php echo $login['nama_pengguna']?>" required="" name="nama_pengguna">
                    <input type="hidden" value="<?php echo $login['akses']?>" required="" name="akses">
                    <input type="hidden" value="<?php echo $login['id']?>" required="" name="id">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" placeholder="Email" value="<?php echo $login['username']?>" name="username">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="New password" name="password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Profile</label>
                  <div class="col-sm-10">
                    <input type="file" name="foto" accept="image/*">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" id="btn_crud">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
