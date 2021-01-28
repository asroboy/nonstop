<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <?php
                $label = array(
                    'Judul',
                    'Post Date',
                    'Create By',
                    'Deskripsi',
                    'Kategori',
                    'Status',
                );
                $value = array(
                    $show['judul'],
                    $this->Model_main->tgl($show['post_date']),
                    $this->UserApp_M->getDetail($show['user_id'], 'id', 'fullname'),
                    $show['description'],
                    $show['category'],
                    $show['status'],
                );
                echo '<table class="table">';
                for ($i=0; $i < count($label) ; $i++) { 
                    if ($i == 0) {
                        $style = 'style="border-top:0px !important;"';                        
                    }else{
                        $style = '';                        
                    }
                    echo '<tr>';
                    echo '<td width="120" '.$style.'>'.$label[$i].'</td>';
                    echo '<td width="10" '.$style.'>&nbsp;:&nbsp;</td>';
                    echo '<td '.$style.'>'.$value[$i].'</td>';
                    echo '</tr>';
                }
                echo '</table>';
            ?>
            </br>
            <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-default">Kembali</a>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
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
            <div class="direct-chat-messages">
                <?php 
                $comment = $this->Diskusi_M->getComment($show['id']);
                foreach ($comment->result_array() as $s_c) {
                ?>
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left"><?php echo $this->UserApp_M->getDetail($s_c['user_id'], 'id', 'fullname');?>&nbsp;&nbsp;&nbsp;</span>
                        <span class="direct-chat-timestamp float-left"><?php echo $this->Model_main->tgl($s_c['comment_time']);?></span>
                    </div>
                    <div class="direct-chat-text" style="margin-left: 0px; width: 500px; max-width: 80%;">
                        <?php echo $s_c['comment'];?>
                    </div>
                </div>
                <?php 
                $sub_comment = $this->Diskusi_M->getSubComment($s_c['id']);
                foreach ($sub_comment->result_array() as $sb_c) {
                ?>
                <div class="direct-chat-msg" style="margin-left: 30px;">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">
                            <?php echo $this->UserApp_M->getDetail($sb_c['user_id'], 'id', 'fullname');?>
                            &nbsp;&nbsp;<i class="fas fa-chevron-right" style="color: #607D8B; font-size: 10px;"></i>&nbsp;&nbsp;
                            <?php echo $this->UserApp_M->getDetail($s_c['user_id'], 'id', 'fullname');?>
                            &nbsp;&nbsp;&nbsp;
                        </span>
                        <span class="direct-chat-timestamp float-left"><?php echo $this->Model_main->tgl($sb_c['comment_time']);?></span>
                    </div>
                    <div class="direct-chat-text" style="margin-left: 0px; width: 500px; max-width: 80%;">
                        <?php echo $sb_c['comment'];?>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
