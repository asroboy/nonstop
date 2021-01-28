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
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php
            $query = $this->db->get('visitor');

            $data = array('jumnya' => $query->num_rows());
            $this->load->view('common/baris.php', $data);
          ?>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th>IP</th>
                <th>Jam</th>
                <th>Tanggal</th>
                <th>Target</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($query->result_array() as $s_query) {
              ?>
              <tr>
                <td>
                  <?php echo $s_query['ip']?>
                </td>
                <td>
                  <?php echo $s_query['online']?>
                </td>
                <td>
                  <?php echo $s_query['tgl']?>
                </td>
                <td>
                  <a href="<?php echo $s_query['target']?>" target="_blank"><?php echo $s_query['target']?></a>
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
