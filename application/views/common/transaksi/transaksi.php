<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $menu; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo base_url("Panel/URI/Dashboard")?>">Dashboard</a></li>
          <?php
            if (!empty($this->input->get('query'))) {
              $link = base_url('Panel/URI/Transaksi?query='.$this->input->get('query')) ;
            }else{
              $link = base_url('Panel/URI/Transaksi') ;
            }

            if (!empty($this->input->get('query')) && $this->input->get('seller') == 'yes') {
                echo '<li class="breadcrumb-item active">'.$menu.'</li>';
            }else{
              if (empty($this->input->get('id'))) {
                echo '<li class="breadcrumb-item active">'.$menu.'</li>';
              }else{
                $query = $this->Transaksi_M->getData($this->input->get('id'));
                $show = $query->row_array();
                echo '<li class="breadcrumb-item"><a href="'.$link.'">'.$menu.'</a></li>';
                echo '<li class="breadcrumb-item active">'.$show['kode_transaksi'].'</li>';
              }
            }
          ?>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
  if (!empty($this->input->get('query')) && $this->input->get('seller') == 'yes') {
    include 'transaksi.seller.php'; 
  }else{
    if (empty($this->input->get('id'))) {
      include 'transaksi.add.php'; 
    }else{
      if ($query->num_rows() > 0) {
        include 'transaksi.detail.php'; 
      }else{
        redirect(base_url("Panel/URI/".$this->uri->segment(3)));
      }
    }
  }
?>