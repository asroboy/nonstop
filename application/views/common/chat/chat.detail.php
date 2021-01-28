<style type="text/css">
  .direct-chat-messages {
    -webkit-transform: translate(0,0);
    transform: translate(0,0);
    height: auto;
    overflow: hidden;
    padding: 10px;
  }
  .direct-chat-text {
    border-radius: .3rem;
    background: #d2d6de;
    border: 1px solid #d2d6de;
    color: #444;
    margin: 5px 0 0 50px;
    padding: 5px 10px;
    width: 45%;
    position: relative;
  }
  .right .direct-chat-text {
    margin-left: 55%;
    margin-right: 50px;
  }
</style>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive">
          <div class="row">
            <div class="col-12">
              <div class="direct-chat direct-chat-primary">
                <style type="text/css">
                  .direct-chat-primary .right>.gambar::after, .direct-chat-primary .right>.gambar::before {border-left-color: #d2d6de;}
                  .gambar {
                      background: #ffffff !important;
                      border-color: #d2d6de !important;
                      color: #444 !important  ;
                  }
                </style>
                <div class="direct-chat-messages">
                  <?php 
                    $q_c = $this->Chat_M->Chat($show['id'])->result_array();
                    foreach ($q_c as $s_c) {
                    if($s_c['type'] == 'MEMBER'){
                      $a = '';
                      $b_1 = 'float-left';
                      $b_2 = '&nbsp;&nbsp;&nbsp;';
                      $b_3 = '';
                      $c = 'margin-left: 0px;';
                    }else{
                      $a = 'right';
                      $b_1 = 'float-right';
                      $b_2 = '';
                      $b_3 = '&nbsp;&nbsp;&nbsp;';
                      $c = 'margin-right: 0px;';
                    }
                    $produk = $this->Produk_M->getData($s_c['post_id']);
                  ?>

                  <div class="direct-chat-msg <?= $a; ?>">

                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name <?= $b_1; ?>"><?php echo $this->UserApp_M->getDetail($s_c['user_id'], 'id', 'fullname');?><?= $b_2; ?></span>
                      <span class="direct-chat-timestamp <?= $b_1; ?>"><?php echo $this->Model_main->tgl($s_c['create_date']);?><?= $b_3; ?></span>
                    </div>
                    <?php 
                      if (!empty($produk->num_rows())) { 
                        $s_p = $produk->row_array(); 
                        if(strlen($s_p['description']) >= '200'){
                          $desc = substr($s_p['description'], 0,200).' ...';
                        }else{
                          $desc = $s_p['description'];
                        }
                    ?>
                    <div class="direct-chat-text gambar" style="<?= $c; ?> padding: 10px;">
                      <div class="row">
                        <div class="col-4">
                          <img class="lazyload" data-src="<?php echo base_url('img/dummy.jpeg');?>" style="width: 100%">
                        </div>
                        <div class="col-8">
                          <p style="margin-bottom: 5px;"><b><?= $s_p['judul']; ?></b></p>
                          <p style="font-size: 80%;"><?= $desc; ?></p>
                          <a href="<?php echo base_url('Panel/URI/Produk?id='.$s_c['post_id']);?>" class="btn btn-default btn-sm" target="_blank">Detail Produk</a>

                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    <div class="direct-chat-text" style="<?= $c; ?>">
                      <?php echo $s_c['description']; ?>
                    </div>
                  </div>
                  <?php } ?>
                  
                </div>
              </div>
            </div>
            <div class="col-12" id="ini_chat">
              <center>
                <?php
                  echo '<a href="'.$link.'" class="btn btn-default btn-sm">Kembali</a>';

                  $jumnya = $this->Chat_M->AllChat($show['id'])->num_rows();
                  $j = ceil($jumnya/10);
                  if ($this->input->get('o_page') > 1) {
                    $prev_1 = $this->input->get('o_page')-1;
                    if (!empty($this->input->get('query'))) {
                      $prev = base_url('Panel/URI/Chat?id='.$show['id'].'&o_page='.$prev_1.'&query='.$this->input->get('query'));
                    }else{
                      $prev = base_url('Panel/URI/Chat?id='.$show['id'].'&o_page='.$prev_1);
                    }
                    echo '<a href="'.$prev.'" style="margin-left:10px;" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i></a>';
                  }
                  if ($j > $this->input->get('o_page')) {
                    $next_1 = $this->input->get('o_page')+1;
                    if (!empty($this->input->get('query'))) {
                      $next = base_url('Panel/URI/Chat?id='.$show['id'].'&o_page='.$next_1.'&query='.$this->input->get('query'));
                    }else{
                      $next = base_url('Panel/URI/Chat?id='.$show['id'].'&o_page='.$next_1);
                    }
                    echo '<a style="margin-left:10px;" href="'.$next.'" class="btn btn-primary btn-sm"><i class="fas fa-arrow-right"></i></a>';
                  }
                ?>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
