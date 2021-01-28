<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card"  id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/'.$this->uri->segment(3).'/Update')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group">
              <label>Nama akses</label>
              <input type="text" class="form-control" name="nama_akses" placeholder="Nama akses..." required="" value="<?php echo $show['nama_akses']?>">
            </div>
            <div class="form-group row">
              <?php
                $door = $this->Door_M->All()->result_array();
                foreach ($door as $s_door) {
                  if ($show[$s_door['code']] == "Y") {
                    $kondisi = 'checked';
                  }else{
                    $kondisi = '';
                  }
                  echo '<div class="col-md-3"><label style="font-weight:400"><input type="checkbox" name="'.$s_door['code'].'" value="Y" '.$kondisi.'>&nbsp;&nbsp;'.$s_door['nama'].'</label></div>'; 
                }
              ?>
            </div>
            <div class="form-group">
              <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-default">Kembali</a>
                <input type="hidden" class="form-control" name="id" required="" value="<?php echo $show['id']?>">

              <button type="submit" class="btn btn-primary" id="btn_crud">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>