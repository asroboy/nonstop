<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card" style="display: none" id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/'.$this->uri->segment(3).'/Add')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group row">
              <div class="col-md-6" style="margin-bottom: 10px;">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama..." required="">
              </div>
              <div class="col-md-6">
                <label>Instansi</label>
                <input type="text" class="form-control" name="instansi" placeholder="Instansi..." required="">
              </div>
            </div>
            <div class="form-group ">
              <label>Testimonial</label>
              <textarea class="form-control" name="des" placeholder="Testimonial..." required="" rows="3"></textarea>
            </div>
            <div class="form-group ">
              <label>File</label></br>
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
            $data = array('jumnya' => $this->Testimonial_M->All()->num_rows());
            $this->load->view('common/baris.php', $data);
          ?>
          <a href="javascript:void(0);" class="btn btn-success" style="margin-bottom: 20px;" id="btn-add"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah data</a>
          <a href="javascript:void(0);" class="btn btn-danger" style="margin-bottom: 20px; display: none;" id="hide-add"><i class="fas fa-times"></i>&nbsp;&nbsp;Tutup</a>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Testimoni</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(1*$this->uri->segment(4) == 0){
                  $no = 1;
                }else{
                  $no = 1*$this->uri->segment(4);
                }
                $testimonial = $this->Testimonial_M->Show()->result_array();
                foreach ($testimonial as $s_testimonial) {
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td>
                  <img class="img-circle  lazyload" data-src="<?php echo $this->Model_main->exists($s_testimonial['foto'], 'no.png')?>" style="width: 50px;">&nbsp;&nbsp;
                  <span style="font-weight: 600"><?php echo $s_testimonial['nama']." - ".$s_testimonial['instansi']?></span></br></br>
                  <?php echo $s_testimonial['des']?></br></br>
                  Tampilkan : <?php echo $this->Model_main->show($s_testimonial['tampilkan']);?></br>
                  Created : <?php echo $this->Model_main->made($s_testimonial['create_by'])?></br>
                  Post : <?php echo $this->Model_main->tgl($s_testimonial['tgl']);?></br></br>
                  <a href="<?php echo base_url('Panel/URI/'.$this->uri->segment(3).'/edit/'.$s_testimonial['id'])?>" class="btn btn-warning btn-sm">Edit</a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url('common/'.$this->uri->segment(3).'/Delete/'.$s_testimonial['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda ingin menghapus data ( <?php echo $s_testimonial['nama']?> ) ?')">Delete</a>
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