<style type="text/css">
  .nav-pills .nav-link {
    color: #c2c7d0;
}
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <center><a href="<?php echo base_url('Panel/URI/Dashboard')?>" class="brand-link">
    <!-- <img data-src="<?php // echo $this->Model_main->exists($konf['logo_title'], 'no.png')?>" alt="<?php // echo $konf['nama_company_id'] ?>" class="brand-image img-circle elevation-3 lazyload"style="opacity: .8"> -->
    <span class="brand-text font-weight-light"><?php echo $konf['nama_company_id'] ?></span>
  </a></center>
  <div class="sidebar" style="height: calc(100% - 6.5rem)">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php
          $uri_t = $this->uri->segment(3);
        ?>
        <li class="nav-item has-treeview">
          <a href="<?php echo base_url("Panel/URI/Dashboard"); ?>" class="nav-link <?php if($this->uri->segment(3) == 'Dashboard'){ echo "active"; };?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard 
            </p>
          </a>
        </li>
         <?php
          $url = array('visitor', 'door');
          $group = $this->Door_M->Group($url)->result_array();
          foreach ($group as $s_group) {
            $check = $this->Door_M->getData($s_group['grup'], 'grup')->num_rows();
            if ($check > 1) {
              $ungroup = $this->Door_M->getData($s_group['grup'], 'grup');
              $i = -1;
              foreach ($ungroup->result_array() as $s_ungroup) {
                $i++;
                $akses[$i] = $s_ungroup['code'];
              }
              $check_akses = $this->Akses_M->getCheck($akses);
              if(count($check_akses) > 0){
        ?>
        <li class="nav-item has-treeview <?php foreach ($ungroup->result_array() as $s_ungroup) { if($this->uri->segment(3) == $s_ungroup['url']){ echo 'menu-open'; } } ?>">
            <a href="#" class="nav-link ">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                <?= $s_group['grup']; ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php
                foreach ($ungroup->result_array() as $s_ungroup) {
                  if ($this->session->userdata('uri_'.$s_ungroup['code']) == 'Y'){ 
              ?>
              <li class="nav-item">
                <a href="<?php echo base_url().'Panel/URI/'.$s_ungroup['url']?>" class="nav-link <?php if($this->uri->segment(3) == $s_ungroup['url']){ echo "active"; };?>">
                  <i class="nav-icon <?php echo $s_ungroup['font']?>"></i>
                  <p>
                      <?php echo $s_ungroup['nama']?> 
                  </p>
                </a>
              </li>
              <?php } } ?>
            </ul>
          </li>
        <?php 
          } } else {
          if ($this->session->userdata('uri_'.$s_group['code']) == 'Y'){ 
        ?>

        <li class="nav-item has-treeview">
          <a href="<?php echo base_url().'Panel/URI/'.$s_group['url']?>" class="nav-link <?php if($this->uri->segment(3) == $s_group['url']){ echo "active"; };?>">
            <i class="nav-icon <?php echo $s_group['font']?>"></i>
            <p>
                <?php echo $s_group['nama']?> 
            </p>
          </a>
        </li>
        <?php } } } ?>

      </ul> 
    </nav>
  </div>
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="border-top:1px solid #4b545c;">
    <li class="nav-item has-treeview">
      <a href="<?php echo base_url("Panel/URI/Logout"); ?>" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
          Logout ! 
        </p>
      </a>
    </li>
  </ul>
</aside>
