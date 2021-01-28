<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/flexslider.css" />
    <script src="http://localhost/generasibisa.com//assets/frontend/js/jquery.min.js"></script>
  </head>
  <body>

<div class="container">
  <section class="slider  trending-now" style="height: auto !important;">
    <div class="flexslider main-slider">
      <ul class="slides">
        <?php
          for ($i=0; $i <3 ; $i++) { 
            echo '<li><img src="https://img.youtube.com/vi/zOoKjwfIRtI/hqdefault.jpg" class=""/></li>';
          }
        ?>
      </ul>
    </div>
  </section>
</div>
  <script src="<?php echo base_url();?>assets/jquery.flexslider.js"></script>
    <script type="text/javascript">
  
    $(window).load(function(){
      $('.main-slider').flexslider({
        controlNav: false,
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
  </body>
</html>