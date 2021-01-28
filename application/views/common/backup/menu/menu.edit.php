<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/Menu/Update')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="form-group row">
              <div class="col-md-6" style="margin-bottom: 10px;">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama..." required="" value="<?php echo $show['nama']?>">
              </div>
              <div class="col-md-6">
                <label>Target</label>
                <select class="form-control" name="target">
                  <option value="_self" <?php if($show['target'] == '_self') { echo "selected"; }?>>Tab lama</option>
                  <option value="_blank" <?php if($show['target'] == '_blank') { echo "selected"; }?>>Tab baru</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4"  style="margin-bottom: 10px;">
                <label>Type</label></br>
                  <label style="font-weight: 500"><input name="type" type="radio" value="custom" onclick="return rbPkg_onclick(this.value)" <?php if($show['type'] == 'custom') { echo "checked"; }?> >&nbsp;custom</label>&nbsp;&nbsp; &nbsp;&nbsp;
                  <label style="font-weight: 500"><input name="type" type="radio" value="static page" onclick="return rbPkg_onclick(this.value)" <?php if($show['type'] == 'static page') { echo "checked"; }?> >&nbsp;static page </label>
              </div>
              <div id="url_tipe" class="col-md-4">
                <?php 
                  echo '<div class="form-group row"><label>URL</label>';
                  if($show['type'] == 'static page'){
                    echo '<select class="form-control" name="url">';
                    $halaman = $this->Halaman_M->All()->result_array();
                    foreach ($halaman as $s_halaman) {
                      if ($show['url'] == $s_halaman['id']) {
                        $kondisi = 'selected';
                      }else{
                        $kondisi = '';
                      }
                      echo '<option value="'.$s_halaman['id'].'" '.$kondisi.'>'.$s_halaman['judul'].'</option>';
                    }
                    echo '</select>';
                  }else{
                    echo '<input type="text" class="form-control" name="url" placeholder="home ATAU demoteknologi.com" value="'.$show['url'].'">';    
                  }
                  echo "</div>";
                ?>
              </div>
              <div class="col-md-4">
                <label>Urutan</label>
                <input type="number" min="1" class="form-control" name="urutan" placeholder="cth : 1" required="" value="<?php echo $show['urutan']?>">
              </div>
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
<script language="Javascript">
  function rbPkg_onclick(pil){
    var combo='';
    if(pil=='static page'){
      combo+='<label>URL</label><select class="form-control" name="url" style="width:100%" required>';
      combo+='<option value="">- Pilih halaman -</option>';
      <?php
        $query_halaman = $this->Halaman_M->All()->result_array();
        foreach ($query_halaman as $s_halaman) {
      ?>
      combo+='<option value="<?php echo $s_halaman['id']?>"><?php echo $s_halaman['judul']?></option>';
      <?php } ?>
      combo+='</select>';
    }
    if(pil=='custom'){
      combo+='<label>URL</label><input type="text" class="form-control" name="url" placeholder="home ATAU demoteknologi.com" required>';
    }
    document.getElementById('url_tipe').innerHTML=combo;
} 
</script>