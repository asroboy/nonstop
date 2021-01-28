<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <a href="<?php echo base_url('Panel/URI/Door')?>" class="btn btn-default" style="margin-bottom: 20px;">Kembali</a>
          <div class="row_position">
            <?php
              $door = $this->Door_M->All()->result_array();
              foreach ($door as $s_door) {
            ?>
            <div class="col-md-3" style="float:left; padding:10px;">
              <div class="btn btn-primary"  id="<?php echo $s_door['id'] ?>" style="width: 100%; padding: 2em">
                <?php echo $s_door['nama'] ?>
              </div>
            </div>
            <?php } ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
