<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
      <div class="card"  id="form-add">
        <div class="card-body pad">
          <form action="<?php echo base_url('common/Voucher/Update')?>" method="POST" enctype="multipart/form-data" id="frm_crud">
            <div class="row">
              <div class="form-group col-md-6">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title..." required="" value="<?php echo $show['title']?>">
              </div>
              <div class="form-group col-md-3">
                <label>Code</label>
                <input type="text" class="form-control" name="code" placeholder="Code..." required="" value="<?php echo $show['code']?>">
              </div>
              <div class="form-group col-md-3">
                <label>Potongan</label>
                <input type="text" class="form-control" name="potongan" placeholder="Potongan..." required="" value="<?php echo $show['potongan']?>">
              </div>
              <div class="form-group col-md-4">
                <label>Start</label>
                <input type="date" class="form-control" name="start_date" required="" value="<?php echo $show['start_date']?>">
              </div>
              <div class="form-group col-md-4">
                <label>End</label>
                <input type="date" class="form-control" name="end_date" required="" value="<?php echo $show['end_date']?>">
              </div>
              <div class="form-group col-md-4">
                <label>Maksimal</label>
                <input type="number" min="1" class="form-control" name="max_count" placeholder="Maksimal..." required="" value="<?php echo $show['max_count']?>">
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