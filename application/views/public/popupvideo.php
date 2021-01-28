<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?php echo base_url()?>assets/backend/plugins/jquery/jquery.min.js"></script>
        <style type="text/css">
@media only screen and (max-width: 767px) {
  .small{ width: 50% !important  }
#video-popup-container {width: 90% !important; left: 50%; margin-left: -45% !important; top: 10% !important;}
}
/*.text-des{margin-top: 56.25%; background: #15161e; color: #83858F !important; padding: 10px; border:2px solid black;}*/
#video-popup-container {display:none; position: fixed; z-index: 996; width: 60%; left: 50%; margin-left: -30%; top: 5%; background-color: #15161e;}
#video-popup-close {cursor: pointer; position: absolute; right: -10px; top: -10px; z-index: 998; width: 25px; height: 25px; border-radius: 25px; text-align: center; font-size: 12px; background-color: #000;
  line-height: 25px; color: #fff; opacity: 1 !important}
#video-popup-iframe-container {position: absolute; z-index: 997; width: 100%; padding-bottom: 56.25%; border: 2px solid #000; border-radius: 2px; background-color: #000;}
#video-popup-iframe {z-index: 999; position: absolute; width: 100%; height: 100%; left: 0; top: 0;background-color: #000;}
#video-popup-overlay {display: none; position: fixed; z-index: 995; top: 0; left: 0; background-color: #000; opacity: 0.1; width: 100%; height: 100%; }
#video-popup-close:hover {color: #DE0023;}
        </style>

    </head>
    <body>
	<div class="vpop" data-type="youtube" data-id="zOoKjwfIRtI" data-autoplay='true' data-des='https://img.youtube.com/vi/zOoKjwfIRtI/hqdefault.jpg' style="background-image: url('https://img.youtube.com/vi/zOoKjwfIRtI/hqdefault.jpg'); width: 200px; height: 150px; background-position: center; background-size: 100%; background-repeat: no-repeat;">
		<div style="background: #00000066;  width: 200px; height: 150px; ">

		</div>
	</div>
<!-- copy this stuff and down -->
<div id="video-popup-overlay"></div>
  <div id="video-popup-container">
    <div id="video-popup-close" class="fade">&#10006;</div>
    <div id="video-popup-iframe-container">
      <iframe id="video-popup-iframe" src="" width="100%" height="100%" frameborder="0" allowFullScreen="allowFullScreen"></iframe>
    </div>
    <div class="text-des" id="des"></div>
  </div>
  <script type="text/javascript">
    $(".vpop").on('click', function(e) {
      e.preventDefault();
      $("#video-popup-overlay,#video-popup-iframe-container,#video-popup-container,#video-popup-close").show();
      var srchref='',autoplay='',id=$(this).data('id');
      var srchref="https://www.youtube.com/embed/";
      var des=$(this).data('des')
  
      if($(this).data('autoplay') == true) autoplay = '?autoplay=1';
        $("#video-popup-iframe").attr('src', srchref+id+autoplay);
        $("#video-popup-iframe").on('load', function() {
          $("#video-popup-container").show();
        });
    });

    $("#video-popup-close, #video-popup-overlay").on('click', function(e) {
      $("#video-popup-iframe-container,#video-popup-container,#video-popup-close,#video-popup-overlay,#des").hide();
      $("#video-popup-iframe").attr('src', '');
    });
  </script>

  <?php
    $show = $this->db->query('SELECT (6371 * acos( 
                cos( radians(-6.605883) ) 
              * cos( radians( -6.604839 ) ) 
              * cos( radians( 106.727790 ) - radians(106.728275) ) 
              + sin( radians(-6.605883) ) 
              * sin( radians( -6.604839 ) )
                ) ) as distance ')->row_array();
    echo $show['distance'];
  ?>
   </body>
</html>