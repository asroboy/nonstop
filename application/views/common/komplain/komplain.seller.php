<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php 

            echo $this->Komplain_M->AllJoin($this->input->get('query'))->num_rows();
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
