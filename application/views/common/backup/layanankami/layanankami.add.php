<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card" style="display: none" id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/Service/Add')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group ">
              <label>Judul</label>
              <input type="text" class="form-control" name="judul" placeholder="Judul..." required="">
            </div>
            <div class="form-group ">
              <label>Keyword</label>
              <textarea class="form-control" rows="3" name="keyword" placeholder="cth : artikel, artikel terkini, info terkini" required=""></textarea>
            </div>
            <div class="form-group ">
              <label>Konten</label>
              <textarea class="ckeditor" rows="3" name="des" required="">Masukan konten halaman</textarea>
            </div>
            <div class="form-group ">
              <label>Foto</label></br>
              <input type="file" name="file" accept="image/*" required="">
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
            $data = array('jumnya' => $this->Service_M->All()->num_rows());
            $this->load->view('common/baris.php', $data);
          ?>
          <a href="javascript:void(0);" class="btn btn-success" style="margin-bottom: 20px;" id="btn-add"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah data</a>
          <a href="javascript:void(0);" class="btn btn-danger" style="margin-bottom: 20px; display: none;" id="hide-add"><i class="fas fa-times"></i>&nbsp;&nbsp;Tutup</a>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Judul</th>
                <th>URL</th>
                <th>Gambar</th>
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
                $service = $this->Service_M->Show()->result_array();
                foreach ($service as $s_service) {
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td>
                  <?php echo $s_service['judul']?></br>
                  <small><label>
                    Tampilkan : <?php echo $this->Model_main->show($s_service['tampilkan']);?>
                  </label></small>
                </td>
                <td><?php echo $s_service['url'];?></td>
                <td><img class="lazyload" data-src="<?php echo $this->Model_main->exists($s_service['file'], 'no.png')?>" style="width: 100px;"></td>
                <td><?php echo $this->Model_main->made($s_service['create_by'])?></br><small><?php echo $this->Model_main->tgl($s_service['tgl']);?></small></td>
                <td>
                  <a href="<?php echo base_url('Panel/URI/'.$this->uri->segment(3).'/edit/'.$s_service['id'])?>" class="btn btn-warning btn-sm">Edit</a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url('common/Service/Delete/'.$s_service['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda ingin menghapus data ( <?php echo $s_service['judul']?> ) ?')">Delete</a>
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
