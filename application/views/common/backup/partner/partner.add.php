<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card" style="display: none" id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/PatnerClient/Add')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group row">
              <div class="col-md-6" style="margin-bottom: 10px;">
                <label>Type</label>
                <select class="form-control" name="type" required="">
                  <option>partner</option>
                  <option>client</option>
                </select>
              </div>
              <div class="col-md-6" style="margin-bottom: 10px;">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama..." required="">
              </div>
            </div>
            <div class="form-group">
              <label>URL</label>
              <input type="text" class="form-control" name="url" placeholder="cth : <?php echo base_url()?>" required="">
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
            $data = array('jumnya' => $this->PatnerClient_M->All()->num_rows());
            $this->load->view('common/baris.php', $data);
          ?>
          <a href="javascript:void(0);" class="btn btn-success" style="margin-bottom: 20px;" id="btn-add"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah data</a>
          <a href="javascript:void(0);" class="btn btn-danger" style="margin-bottom: 20px; display: none;" id="hide-add"><i class="fas fa-times"></i>&nbsp;&nbsp;Tutup</a>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Type</th>
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
                $pc = $this->PatnerClient_M->Show()->result_array();
                foreach ($pc as $s_pc) {
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td>
                  <?php echo $s_pc['nama']?></br>
                  <small><label>
                    Type : <?php echo $s_pc['type']?></br>
                    Tampilkan : <?php echo $this->Model_main->show($s_pc['tampilkan']);?>
                  </label></small>
                </td>
                <td><img class="lazyload" data-src="<?php echo $this->Model_main->exists($s_pc['file'], 'no.png')?>" style="width: 100px;"></td>
                <td><?php echo $this->Model_main->made($s_pc['create_by'])?></br><small><?php echo $this->Model_main->tgl($s_pc['tgl']);?></small></td>
                <td>
                  <a href="<?php echo base_url('Panel/URI/'.$this->uri->segment(3).'/edit/'.$s_pc['id'])?>" class="btn btn-warning btn-sm">Edit</a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url('common/PatnerClient/Delete/'.$s_pc['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda ingin menghapus data ( <?php echo $s_pc['nama']?> ) ?')">Delete</a>
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
