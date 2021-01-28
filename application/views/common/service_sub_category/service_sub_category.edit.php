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
              <label>Judul</label>
              <input type="text" class="form-control" name="title" placeholder="title..." required="" value="<?php echo $show['title']?>">
            </div>
           
            <div class="form-group ">
              <label>Foto</label></br>
              <input type="file" name="file" accept="image/*"></br></br>
              <img class="lazyload" data-src="<?php echo call_folder($show['file'])?>"style="width: 150px;">
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