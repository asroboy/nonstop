<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card" style="display: none" id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/'.$this->uri->segment(3).'/Add')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group ">
              <label>Nama Video</label>
              <input type="text" class="form-control" name="judul" placeholder="Nama video..." required="">
            </div>
            <div class="form-group ">
              <label>Link Video</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">https://www.youtube.com/watch?v=</span>
                </div>
                <input type="text" class="form-control" name="des" placeholder="ApL8HZDLitg" required="">
              </div>
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
            $data = array('jumnya' => $this->File_M->All('video')->num_rows());
            $this->load->view('common/baris.php', $data);
          ?>
          <a href="javascript:void(0);" class="btn btn-success" style="margin-bottom: 20px;" id="btn-add"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah data</a>
          <a href="javascript:void(0);" class="btn btn-danger" style="margin-bottom: 20px; display: none;" id="hide-add"><i class="fas fa-times"></i>&nbsp;&nbsp;Tutup</a>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Judul</th>
                <th>Video</th>
                <th>Created</th>
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
                $query = $this->File_M->Show('video')->result_array();
                foreach ($query as $show) {
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td>
                  <?php echo $show['judul']?></br>
                  <small><label>
                    Tampilkan : <?php echo $this->Model_main->show($show['tampilkan']);?>
                  </label></small>
                </td>
                <td>
                  <a href="https://www.youtube.com/watch?v=<?php echo $show['des']?>" target="_blank" class="btn btn-danger"><i class="fa fa-play"></i></a>
                </td>
                <td><?php echo $this->Model_main->made($show['create_by'])?></br><small><?php echo $this->Model_main->tgl($show['tgl']);?></small></td>
                <td>
                  <a href="<?php echo base_url('Panel/URI/'.$this->uri->segment(3).'/edit/'.$show['id'])?>" class="btn btn-warning btn-sm">Edit</a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url('common/'.$this->uri->segment(3).'/Delete/'.$show['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda ingin menghapus data ( <?php echo $show['judul']?> ) ?')">Delete</a>
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