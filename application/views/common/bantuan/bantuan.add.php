<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <?php 
            $data = array('jumnya' => $this->Bantuan_M->All('bantuan')->num_rows());
            if ($data['jumnya'] > $this->config->item('offset')) {
              $this->load->view('common/baris.php', $data);
              echo '<div style="margin-top: 60px;"></div>';
            }
          ?>
          <table class="table table-hover table-bordered table-striped example1">
            <thead>
              <tr>
                <th width="20">No</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(1*$this->uri->segment(4) == 0){
                  $no = 1;
                }else{
                  $no = 1*$this->uri->segment(4);
                }
                $query = $this->Bantuan_M->Show('bantuan')->result_array();
                foreach ($query as $show) {
                	$getJawaban = $this->Bantuan_M->getData($show['id'], 'bantuan_id', 'bantuan_jawab');
                  $showJawaban = $getJawaban->row_array();
              ?>
              <tr>
                <td align="center"><?php echo $no++?></td>
                 <td>
                  <span style="font-weight: 600"><?php echo $show['title']?></span></br>
                  <p><?php echo $show['description']?></p>
                  <b>Type :</b> <?php echo $show['type'];?></br>
                  <b>Create By :</b> <?php echo $this->UserApp_M->getDetail($show['user_id'], 'id', 'fullname')?></br>
                  <b>Post :</b> <?php echo $this->Model_main->tgl($show['tgl']);?></br></br>
                  <?php 
                    echo '<div id="container_'.$show['id'].'" style="display:none"><div style="border-top:1px dashed #c5c5c5; margin-bottom:10px;"></div>'.$showJawaban['description'].'<div style="border-top:1px dashed #c5c5c5; margin-top:10px; margin-bottom:10px;"></div></div>';
                  	if ($getJawaban->num_rows() <= 0) {
                  		echo '<a href="'.base_url('Panel/URI/'.$this->uri->segment(3).'/jawab/'.$show['id']).'" class="btn btn-primary btn-sm">Jawab</a>';
                  	}else{
                      echo '<a id="open_'.$show['id'].'" style="color:white" class="btn btn-success btn-sm">Lihat Jawaban</a>';
                      echo '<a id="close_'.$show['id'].'" style="color:white; display:none;" class="btn btn-danger btn-sm">Tutup Jawaban</a>';
                    }
                  ?>
                  
                  &nbsp;&nbsp;&nbsp;
                  <a href="<?php echo base_url('common/'.$this->uri->segment(3).'/Delete/'.$show['id'])?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda ingin menghapus data ( <?php echo $show['title']?> ) ?')">Delete</a>
                  <script type="text/javascript">
                    $('#open_<?= $show['id']; ?>').click(function(){
                      $("#container_<?= $show['id']; ?>").show();
                      $("#close_<?= $show['id']; ?>").show();
                      $("#open_<?= $show['id']; ?>").hide();
                    });

                    $('#close_<?= $show['id']; ?>').click(function(){
                      $("#container_<?= $show['id']; ?>").hide();
                      $("#close_<?= $show['id']; ?>").hide();
                      $("#open_<?= $show['id']; ?>").show();
                    });
                  </script>
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
