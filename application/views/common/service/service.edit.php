<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card"  id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/ServiceSubCategory/Update')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
             <div class="form-group ">
              <label>Category Service</label>
              <select class="form-control" name='category_id'>
              <option value="">- Pilih Category -</option>
                  <?php
                    $service = $this->ServiceCategory_M->All()->result_array();
                    foreach ($service as $s_ser) {
                        
                        if($s_ser['id'] == $show['category_id']){
                            $selected = "selected";
                        }else{
                            $selected = "";
                        }
                      echo '<option value="'.$s_ser['id'].'" '.$selected.'>'.$s_ser['title'].'</option>';
                    }
                  ?>
              </select>
            </div>
            <div class="form-group ">
              <label>Sub Category Service</label>
              <select class="form-control" name='category_id'>
              <option value="">- Pilih Sub Category -</option>
                  <?php
                    $sservice = $this->ServiceSubCategory_M->All()->result_array();
                    foreach ($sservice as $s_sser) {
                        
                        if($s_sser['id'] == $show['sub_category_id']){
                            $selected = "selected";
                        }else{
                            $selected = "";
                        }
                      echo '<option value="'.$s_sser['id'].'" '.$selected.'>'.$s_sser['title'].'</option>';
                    }
                  ?>
              </select>
            </div>
            <div class="form-group ">
              <label>Judul</label>
              <input type="text" class="form-control" name="title" placeholder="title..." required="" value="<?php echo $show['title']?>">
            </div>
            <div class="form-group ">
              <label>Kode Produk</label>
              <input type="text" class="form-control" name="kode_produk" placeholder="title..." required="" value="<?php echo $show['kode_produk']?>">
            </div>
           <div class="form-group ">
              <label>Kode Provider (Untuk Pulsa)</label>
              <input type="text" class="form-control" name="kode_provider" placeholder="081..."  value="<?php echo $show['kode_provider']?>">
            </div>
           <div class="form-group ">
              <label>Tampilkan ?</label>
              <select class="form-control" name="status">
                  <option value="active" <?php if($show['status'] == 'active'){echo "selected";}?>>Ya</option>
                  <option value="inactive" <?php if($show['status'] == 'inactive'){echo "selected";}?>>Tidak</option>
              </select>
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
</section>