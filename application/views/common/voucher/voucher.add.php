<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card" style="display: none" id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/'.$this->uri->segment(3).'/Add')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="row">
              <div class="form-group col-md-6">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title..." required="">
              </div>
              <div class="form-group col-md-3">
                <label>Code</label>
                <input type="text" class="form-control" name="code" placeholder="Code..." required="">
              </div>
              <div class="form-group col-md-3">
                <label>Potongan</label>
                <input type="text" class="form-control" name="potongan" placeholder="Potongan..." required="">
              </div>
              <div class="form-group col-md-4">
                <label>Start</label>
                <input type="date" class="form-control" name="start_date" required="">
              </div>
              <div class="form-group col-md-4">
                <label>End</label>
                <input type="date" class="form-control" name="end_date" required="">
              </div>
              <div class="form-group col-md-4">
                <label>Maksimal</label>
                <input type="number" min="1" class="form-control" name="max_count" placeholder="Maksimal..." required="">
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
            $data = array('jumnya' => $this->Berat_M->All()->num_rows());
            $this->load->view('common/baris.php', $data);
          ?>
          <a href="javascript:void(0);" class="btn btn-success" style="margin-bottom: 20px;" id="btn-add"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah data</a>
          <a href="javascript:void(0);" class="btn btn-danger" style="margin-bottom: 20px; display: none;" id="hide-add"><i class="fas fa-times"></i>&nbsp;&nbsp;Tutup</a>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Title</th>
                <th>Code</th>
                <th>Potongan</th>
                <th>Start</th>
                <th>End</th>
                <th>Maksimal</th>
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
                $query = $this->Voucher_M->Show()->result_array();
                foreach ($query as $show) {
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td><?php echo $show['title']?></td>
                <td><?php echo $show['code']?></td>
                <td><?php echo $show['potongan']?></td>
                <td><?php echo $show['start_date']?></td>
                <td><?php echo $show['end_date']?></td>
                <td><?php echo $show['max_count']?></td>
                <td>
                  <a href="<?php echo base_url('Panel/URI/'.$this->uri->segment(3).'/edit/'.$show['id'])?>" class="btn btn-warning btn-sm">Edit</a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url('common/'.$this->uri->segment(3).'/Delete/'.$show['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda ingin menghapus data ( <?php echo $show['code']?> ) ?')">Delete</a>
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
