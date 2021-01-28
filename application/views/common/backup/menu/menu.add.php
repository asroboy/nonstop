<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card" style="display: none" id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/Menu/Add')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group row">
              <div class="col-md-6" style="margin-bottom: 10px;">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama..." required="">
              </div>
              <div class="col-md-6">
                <label>Target</label>
                <select class="form-control" name="target">
                  <option value="_self">Tab lama</option>
                  <option value="_blank">Tab baru</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6" style="margin-bottom: 10px;">
                <label>Type</label></br>
                  <label style="font-weight: 500"><input name="type" type="radio" value="custom" onclick="return rbPkg_onclick(this.value)">&nbsp;custom</label>&nbsp;&nbsp; &nbsp;&nbsp;
                  <label style="font-weight: 500"><input name="type" type="radio" value="static page" onclick="return rbPkg_onclick(this.value)">&nbsp;static page </label>
              </div>
              <div id="url_tipe" class="col-md-6"><i>Pilih type menu terlebih dahulu</i></div>
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
            $data = array('jumnya' => $this->MainMenu_M->All()->num_rows());
            $this->load->view('common/baris.php', $data);
          ?>
          <a href="javascript:void(0);" class="btn btn-success" style="margin-bottom: 20px;" id="btn-add"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah data</a>
          <a href="javascript:void(0);" class="btn btn-danger" style="margin-bottom: 20px; display: none;" id="hide-add"><i class="fas fa-times"></i>&nbsp;&nbsp;Tutup</a>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">Urutan</th>
                <th>Nama</th>
                <th>URL</th>
                <th>Created</th>
                <th>Optional</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = $this->MainMenu_M->Show()->result_array();
                foreach ($query as $show) {
              ?>
              <tr>
                <td align="center">
                  <?php echo $show['urutan']?>
                </td>
                <td>
                  <?php echo $show['nama']?></br>
                  <small><label><b>
                    Type : <?php echo $show['type']?></br>
                    Target : <?php echo $show['target']?>
                  </b></label></small>
                </td>
                <td>
                  <?php 
                    if ($show['type'] == 'static page') {
                      echo $this->Halaman_M->getDetail($show['url'],'id','url');
                    }else{
                      echo $show['url'];
                    }
                  ?>
                </td>
                <td><?php echo $this->Model_main->made($show['create_by'])?></br><small><?php echo $this->Model_main->tgl($show['tgl']);?></small></td>
                <td>
                  <a href="<?php echo base_url('Panel/URI/MainMenu/edit/'.$show['id'])?>" class="btn btn-warning btn-sm">Edit</a>
                  &nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url('common/Menu/Delete/'.$show['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda ingin menghapus data ( <?php echo $show['nama']?> ) ?')">Delete</a>
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
<script language="Javascript">
  function rbPkg_onclick(pil){
    var combo='';
    if(pil=='static page'){
      combo+='<label>URL</label><select class="form-control" name="url" style="width:100%" required>';
      combo+='<option value="">- Pilih halaman -</option>';
      <?php
        $query_halaman = $this->Halaman_M->All()->result_array();
        foreach ($query_halaman as $show_halaman) {
      ?>
      combo+='<option value="<?php echo $show_halaman['id']?>"><?php echo $show_halaman['judul']?></option>';
      <?php } ?>
      combo+='</select>';
    }
    if(pil=='custom'){
      combo+='<label>URL</label><input type="text" class="form-control" name="url" placeholder="home ATAU demoteknologi.com" required>';
    }
    document.getElementById('url_tipe').innerHTML=combo;
} 
</script>