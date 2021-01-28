<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $menu; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo base_url("Panel/URI/Dashboard")?>">Dashboard</a></li>
          <li class="breadcrumb-item active"><?php echo $menu; ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="row">
    <div class="col-12">
      <?php echo $this->session->flashdata($alert); ?>    
    </div>
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php 
            $data = array('jumnya' => $this->ContactUs_M->All()->num_rows());
            $this->load->view('common/baris.php', $data);
          ?>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Pesan</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(1*$this->uri->segment(4) == 0){
                  $no = 1;
                }else{
                  $no = 1*$this->uri->segment(4);
                }
                $query = $this->ContactUs_M->Show()->result_array();
                foreach ($query as $show) {
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                <td>
                  <span style="font-weight: 600"><?php echo $show['subjek']?></span></br>
                  <?php echo $show['pesan']?>
                  </br>
                  Nama : <?php echo $show['nama']?></br>
                  E-Mail : <a href="mailto:<?php echo $show['email']?>" target="_blank"><?php echo $show['email']?></a></br>
                  Post : <?php echo $this->Model_main->tgl($show['tgl']);?></br></br>
                  <a href="<?php echo base_url('common/ContactUs/Delete/'.$show['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda ingin menghapus data ( <?php echo $show['subjek']?> ) ?')">Delete</a>
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