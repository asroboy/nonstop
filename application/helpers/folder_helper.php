<?php
function base_folder(){
	return '../ini_filenonstop/';
}
function strleft($s1, $s2) { 
	return substr($s1, 0, strpos($s1, $s2)); 
}
function call_folder($value=""){
	$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; 
	$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; 
	return $protocol."://".$_SERVER['SERVER_NAME'].'/ini_filenonstop/'.$value;
}