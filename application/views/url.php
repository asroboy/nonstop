<?php
	if(isset($_SERVER['HTTPS']) == 'on'){
	        
	}else{
	    redirect("https://".$_SERVER['HTTP_HOST']."/web");
	}
?>