<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card" style="display: none" id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/Akses/Add')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group">
              <label>Nama akses</label>
              <input type="text" class="form-control" name="nama_akses" placeholder="Nama akses..." required="">
            </div>
            <div class="form-group row">
              <?php
                $door = $this->Door_M->All()->result_array();
                foreach ($door as $s_door) {
                  $rules = array("_");
                  $change = array(" ");
                  echo '<div class="col-md-3"><label style="font-weight:400"><input type="checkbox" name="'.$s_door['code'].'" value="Y">&nbsp;&nbsp;'.$s_door['nama'].'</label></div>'; 
                }
              ?>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="btn_crud">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php 
            $data = array('jumnya' => $this->Akses_M->All()->num_rows());
            $this->load->view('common/baris.php', $data);
          ?>
          <a href="javascript:void(0);" class="btn btn-success" style="margin-bottom: 20px;" id="btn-add"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah data</a>
          <a href="javascript:void(0);" class="btn btn-danger" style="margin-bottom: 20px; display: none;" id="hide-add"><i class="fas fa-times"></i>&nbsp;&nbsp;Tutup</a>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Nama Akses</th>
                <th>Jumlah Pengguna</th>
                <th>Akses</th>
                <th>Optional</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(1*$this->uri->segment(4) == 0){
                  $no = 1;
                }else{
                  $no = 1*$this->uri->segment(4);
                }
                $query = $this->Akses_M->Show()->result_array();
                foreach ($query as $show) {
                  $jml = $this->Akses_M->Count('pengguna', 'akses', $show['id']);
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td>
                  <?php echo $show['nama_akses']?>
                </td>
                <td>
                  <?php echo $jml;?>
                </td>
                <td>
                  <?php
                    $door = $this->Door_M->All()->result_array();
                    foreach ($door as $s_door) {
                      if ($show[$s_door['code']] == "Y") {
                        echo '<label class="badge badge-success" style="">'.$s_door['nama'].'</label>&nbsp; ';
                      }
                    }
                  ?>
                </td>
                <td>
                  <a href="<?php echo base_url('Panel/URI/Akses/edit/'.$show['id'])?>" class="btn btn-warning btn-sm">Edit</a>
                  <?php if ($jml > 0) { }else{ ?>
                  &nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url('common/Akses/Delete/'.$show['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda ingin menghapus data ( <?php echo $show['nama_akses']?> ) ?')">Delete</a>
                  <?php } ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>