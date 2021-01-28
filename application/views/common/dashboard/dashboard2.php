<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $menu; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active"><?php echo $menu; ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?php echo $this->UserApp_M->getAmount('SELLER', date('Y-m-d'))->num_rows(); ?></h3>
          <p>Seller hari ini</p>
        </div>
        <div class="icon">
          <i class="fas fa-id-badge"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?php echo $this->UserApp_M->getAmount('SELLER', date('Y-m'))->num_rows(); ?></h3>
          <p>Seller bulan ini</p>
        </div>
        <div class="icon">
          <i class="fas fa-id-badge"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?php echo $this->UserApp_M->getAmount('SELLER', date('Y'))->num_rows(); ?></h3>
          <p>Seller tahun ini</p>
        </div>
        <div class="icon">
          <i class="fas fa-id-badge"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?php echo $this->UserApp_M->getAmount('SELLER', '')->num_rows(); ?></h3>
          <p>Total seller</p>
        </div>
        <div class="icon">
          <i class="fas fa-id-badge"></i>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?php echo $this->UserApp_M->getAmount('MEMBER', date('Y-m-d'))->num_rows(); ?></h3>
          <p>User hari ini</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-circle"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?php echo $this->UserApp_M->getAmount('MEMBER', date('Y-m'))->num_rows(); ?></h3>
          <p>User bulan ini</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-circle"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?php echo $this->UserApp_M->getAmount('MEMBER', date('Y'))->num_rows(); ?></h3>
          <p>User tahun ini</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-circle"></i>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?php echo $this->UserApp_M->getAmount('MEMBER', '')->num_rows(); ?></h3>
          <p>Total user</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-circle"></i>
        </div>
      </div>
    </div>
    <?php  
      $s_b_1 = $this->UserApp_M->getAmount('SELLER', date('Y-').'01')->num_rows();
      $s_b_2 = $this->UserApp_M->getAmount('SELLER', date('Y-').'02')->num_rows();
      $s_b_3 = $this->UserApp_M->getAmount('SELLER', date('Y-').'03')->num_rows();
      $s_b_4 = $this->UserApp_M->getAmount('SELLER', date('Y-').'04')->num_rows();
      $s_b_5 = $this->UserApp_M->getAmount('SELLER', date('Y-').'05')->num_rows();
      $s_b_6 = $this->UserApp_M->getAmount('SELLER', date('Y-').'06')->num_rows();
      $s_b_7 = $this->UserApp_M->getAmount('SELLER', date('Y-').'07')->num_rows();
      $s_b_8 = $this->UserApp_M->getAmount('SELLER', date('Y-').'08')->num_rows();
      $s_b_9 = $this->UserApp_M->getAmount('SELLER', date('Y-').'09')->num_rows();
      $s_b_10 = $this->UserApp_M->getAmount('SELLER', date('Y-').'10')->num_rows();
      $s_b_11 = $this->UserApp_M->getAmount('SELLER', date('Y-').'11')->num_rows();
      $s_b_12 = $this->UserApp_M->getAmount('SELLER', date('Y-').'12')->num_rows();

      $s_b_1m = $this->UserApp_M->getAmount('SELLER', date('Y-', strtotime('-1 year')).'01')->num_rows();
      $s_b_2m = $this->UserApp_M->getAmount('SELLER', date('Y-', strtotime('-1 year')).'02')->num_rows();
      $s_b_3m = $this->UserApp_M->getAmount('SELLER', date('Y-m-d', strtotime('-1 year')).'03')->num_rows();
      $s_b_4m = $this->UserApp_M->getAmount('SELLER', date('Y-', strtotime('-1 year')).'04')->num_rows();
      $s_b_5m = $this->UserApp_M->getAmount('SELLER', date('Y-', strtotime('-1 year')).'05')->num_rows();
      $s_b_6m = $this->UserApp_M->getAmount('SELLER', date('Y-', strtotime('-1 year')).'06')->num_rows();
      $s_b_7m = $this->UserApp_M->getAmount('SELLER', date('Y-', strtotime('-1 year')).'07')->num_rows();
      $s_b_8m = $this->UserApp_M->getAmount('SELLER', date('Y-', strtotime('-1 year')).'08')->num_rows();
      $s_b_9m = $this->UserApp_M->getAmount('SELLER', date('Y-', strtotime('-1 year')).'09')->num_rows();
      $s_b_10m = $this->UserApp_M->getAmount('SELLER', date('Y-', strtotime('-1 year')).'10')->num_rows();
      $s_b_11m = $this->UserApp_M->getAmount('SELLER', date('Y-', strtotime('-1 year')).'11')->num_rows();
      $s_b_12m = $this->UserApp_M->getAmount('SELLER', date('Y-', strtotime('-1 year')).'12')->num_rows();

      $m_b_1 = $this->UserApp_M->getAmount('MEMBER', date('Y-').'01')->num_rows();
      $m_b_2 = $this->UserApp_M->getAmount('MEMBER', date('Y-').'02')->num_rows();
      $m_b_3 = $this->UserApp_M->getAmount('MEMBER', date('Y-').'03')->num_rows();
      $m_b_4 = $this->UserApp_M->getAmount('MEMBER', date('Y-').'04')->num_rows();
      $m_b_5 = $this->UserApp_M->getAmount('MEMBER', date('Y-').'05')->num_rows();
      $m_b_6 = $this->UserApp_M->getAmount('MEMBER', date('Y-').'06')->num_rows();
      $m_b_7 = $this->UserApp_M->getAmount('MEMBER', date('Y-').'07')->num_rows();
      $m_b_8 = $this->UserApp_M->getAmount('MEMBER', date('Y-').'08')->num_rows();
      $m_b_9 = $this->UserApp_M->getAmount('MEMBER', date('Y-').'09')->num_rows();
      $m_b_10 = $this->UserApp_M->getAmount('MEMBER', date('Y-').'10')->num_rows();
      $m_b_11 = $this->UserApp_M->getAmount('MEMBER', date('Y-').'11')->num_rows();
      $m_b_12 = $this->UserApp_M->getAmount('MEMBER', date('Y-').'12')->num_rows();

      $m_b_1m = $this->UserApp_M->getAmount('MEMBER', date('Y-', strtotime('-1 year')).'01')->num_rows();
      $m_b_2m = $this->UserApp_M->getAmount('MEMBER', date('Y-', strtotime('-1 year')).'02')->num_rows();
      $m_b_3m = $this->UserApp_M->getAmount('MEMBER', date('Y-', strtotime('-1 year')).'03')->num_rows();
      $m_b_4m = $this->UserApp_M->getAmount('MEMBER', date('Y-', strtotime('-1 year')).'04')->num_rows();
      $m_b_5m = $this->UserApp_M->getAmount('MEMBER', date('Y-', strtotime('-1 year')).'05')->num_rows();
      $m_b_6m = $this->UserApp_M->getAmount('MEMBER', date('Y-', strtotime('-1 year')).'06')->num_rows();
      $m_b_7m = $this->UserApp_M->getAmount('MEMBER', date('Y-', strtotime('-1 year')).'07')->num_rows();
      $m_b_8m = $this->UserApp_M->getAmount('MEMBER', date('Y-', strtotime('-1 year')).'08')->num_rows();
      $m_b_9m = $this->UserApp_M->getAmount('MEMBER', date('Y-', strtotime('-1 year')).'09')->num_rows();
      $m_b_10m = $this->UserApp_M->getAmount('MEMBER', date('Y-', strtotime('-1 year')).'10')->num_rows();
      $m_b_11m = $this->UserApp_M->getAmount('MEMBER', date('Y-', strtotime('-1 year')).'11')->num_rows();
      $m_b_12m = $this->UserApp_M->getAmount('MEMBER', date('Y-', strtotime('-1 year')).'12')->num_rows();
    ?>

    <!-- <?php
    echo date('Y-m-d', strtotime('-1 year'));

    ?> -->

    <div class="col-lg-6 col-12">
      <center><h4>Seller Grafik</h4></center>
      <div style="">
        <canvas id="barChart_1" style="height:300px;"></canvas>
      </div>
    </div>
    <div class="col-lg-6 col-12">
      <center><h4>Seller User</h4></center>
      <div style="">
        <canvas id="barChart_2" style="height:300px;"></canvas>
      </div>
    </div>
  </div>
</section>

<script>
  $(function () {
    var barChartData_1 = {
      labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [
        {
          label               : '<?php echo date('Y', strtotime('-1 year')); ?>',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?= $s_b_1m; ?>, <?= $s_b_2m; ?>, <?= $s_b_3m; ?>, <?= $s_b_4m; ?>, <?= $s_b_5m; ?>, <?= $s_b_6m; ?>, <?= $s_b_7m; ?>, <?= $s_b_8m; ?>, <?= $s_b_9m; ?>, <?= $s_b_10m; ?>, <?= $s_b_11m; ?>, <?= $s_b_12m; ?>]
        },{
          label               : '<?php echo date('Y'); ?>',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?= $s_b_1; ?>, <?= $s_b_2; ?>, <?= $s_b_3; ?>, <?= $s_b_4; ?>, <?= $s_b_5; ?>, <?= $s_b_6; ?>, <?= $s_b_7; ?>, <?= $s_b_8; ?>, <?= $s_b_9; ?>, <?= $s_b_10; ?>, <?= $s_b_11; ?>, <?= $s_b_12; ?>]
        },
      ]
    }

    var barChartCanvas_1 = $('#barChart_1').get(0).getContext('2d')
    var barChartData_1 = jQuery.extend(true, {}, barChartData_1)
    var temp0 = barChartData_1.datasets[0]
    barChartData_1.datasets[0] = temp0

    var barChartOptions_1 = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart_1 = new Chart(barChartCanvas_1, {
      type: 'bar', 
      data: barChartData_1,
      options: barChartOptions_1
    })

    // -------------------------------------------------------------------------------------------

    var barChartData_2 = {
      labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [
        {
          label               : '<?php echo date('Y', strtotime('-1 year')); ?>',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?= $m_b_1m; ?>, <?= $m_b_2m; ?>, <?= $m_b_3m; ?>, <?= $m_b_4m; ?>, <?= $m_b_5m; ?>, <?= $m_b_6m; ?>, <?= $m_b_7m; ?>, <?= $m_b_8m; ?>, <?= $m_b_9m; ?>, <?= $m_b_10m; ?>, <?= $m_b_11m; ?>, <?= $m_b_12m; ?>]
        },{
          label               : '<?php echo date('Y'); ?>',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?= $m_b_1; ?>, <?= $m_b_2; ?>, <?= $m_b_3; ?>, <?= $m_b_4; ?>, <?= $m_b_5; ?>, <?= $m_b_6; ?>, <?= $m_b_7; ?>, <?= $m_b_8; ?>, <?= $m_b_9; ?>, <?= $m_b_10; ?>, <?= $m_b_11; ?>, <?= $m_b_12; ?>]
        },
      ]
    }

    var barChartCanvas_2 = $('#barChart_2').get(0).getContext('2d')
    var barChartData_2 = jQuery.extend(true, {}, barChartData_2)
    var temp0 = barChartData_2.datasets[0]
    barChartData_2.datasets[0] = temp0

    var barChartOptions_2 = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart_2 = new Chart(barChartCanvas_2, {
      type: 'bar', 
      data: barChartData_2,
      options: barChartOptions_2
    })
    
  })
</script>
<script src="<?php echo base_url('');?>assets/backend/plugins/chart.js/Chart.min.js"></script>

<section class="content" style="margin-top:20px;">
  <div class="container-fluid">
      <div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daily Aktif User</h3>
          </div>
          <div class="card-body" style="    padding-top: 0px;">
            <table class="table table-bordered example1">
              <thead>                  
                <tr>
                  <th style="width: 10px">#</th>
                  <th>User</th>
                  <th>Role</th>
                  <th>IP Address</th>
                  <th>User Agent</th>
                  <th width="80">Status</th>
                  <th width="150">Last Active</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                  $query = $this->UserApp_M->ShowLog()->result_array();
                  foreach ($query as $show) {
                      $to_time = strtotime(date("Y-m-d H:i:s"));
                      $from_time = strtotime($show['log_date']);
                      $diff =  round(abs($to_time - $from_time) / 60,2);
                      
                ?>
                <tr>
                  <td><?php echo $no++; ?>.</td>
                  <td><?php echo $show['fullname']?></td>
                  <td><?php echo $show['log_role']?></td>
                  <td><?php echo $show['log_ip']?></td>
                  <td><?php echo $show['log_user_agent']?></td>
                  <td><?php if($diff<=5){echo "<span style='color:green;'>Active</span>";}else{echo "<span style='color:red;'>Inactive</span>";}?></td>
                  <td align="left"><?php echo $this->Model_main->time_elapsed_string($show['log_date']);?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Transaksi Seller</h3>
          </div>
          <div class="card-body" style="    padding-top: 0px;">
            <table class="table table-bordered example1">
              <thead>                  
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Seller</th>
                  <th width="80">Transaksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                  $query = $this->UserApp_M->All('SELLER')->result_array();
                  foreach ($query as $show) {
                      $jum = $this->Transaksi_M->AllJoin($show['id'])->num_rows();
                ?>
                <tr>
                  <td><?php echo $no++; ?>.</td>
                  <td><?php echo $show['fullname']?></td>
                  <td align="center"><?php echo $jum;?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Transaksi Seller</h3>
          </div>
          <div class="card-body" style="    padding-top: 0px;" >
            <table class="table table-bordered example1">
              <thead>                  
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Seller</th>
                  <th width="80">Transaksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                  $query = $this->UserApp_M->All('SELLER')->result_array();
                  foreach ($query as $show) {
                      $jum = $this->Transaksi_M->AllJoin($show['id'])->num_rows();
                ?>
                <tr>
                  <td><?php echo $no++; ?>.</td>
                  <td><?php echo $show['fullname']?></td>
                  <td align="center"><?php echo $jum;?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</section>
