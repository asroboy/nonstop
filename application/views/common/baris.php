<?php 
if ($jumnya > $this->config->item('offset')) {
$url_baris2 = base_url("Panel/URI/".$this->uri->segment(3)."/");
if(!empty($this->input->get('query'))){
  $url_baris1 = base_url("Panel/URI/".$this->uri->segment(3)."?query=".$this->input->get('query'));
  $url_baris2_1 = "?query=".$this->input->get('query');
}else{
  $url_baris1 = base_url("Panel/URI/".$this->uri->segment(3)."/");
  $url_baris2_1 = "";
}
?>
<form  class="form-search" name="baris" id="baris">
  <select class="form-control ke_form" name="ke">
    <?php
      echo '<option value="" selected disabled>- Table -</option>';
      $j = round($jumnya/$this->config->item('offset'));
      for ($i=1; $i <= $j ; $i++) {
        if ($this->uri->segment(4) == $i) {
          echo '<option value='.$i.' selected>Table '.$i.'</option>';
        }else{
          echo '<option value='.$i.'>Table '.$i.'</option>';
        }
      }
    ?>
  </select>
</form>

<?php if ($this->uri->segment(3) == 'HubungiKami'){ ?>
<a class="btn btn-danger" style="margin-bottom: 20px; opacity: 0"><i class="fas fa-times"></i>&nbsp;&nbsp;Tutup</a>
<?php } ?>

<script type="text/javascript">
  document.baris.onclick = function(){

  var radVal = document.baris.ke.value;
  <?php  if (empty($this->uri->segment(4))) { ?>

    if (radVal == false) {
    }else if (radVal == 'reset') {
      window.location = "<?php echo $url_baris1; ?>";
    }else{
      window.location = "<?php echo $url_baris2; ?>"+radVal+"<?php echo $url_baris2_1; ?>";
    }

  <?php } else { ?>

    if (radVal == false) {
    }else if (radVal == 'reset') {
      window.location = "<?php echo $url_baris1; ?>";
    }else if(radVal == <?php echo $this->uri->segment(4);?>){
    }else{
      window.location = "<?php echo $url_baris2; ?>"+radVal+"<?php echo $url_baris2_1; ?>";
    }
  <?php }?>
  }
</script>
<?php } ?>