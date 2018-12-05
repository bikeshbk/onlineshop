<?php
	require_once "admin/config/config.php";
	require_once "admin/libs/Model.php";
	require_once "admin/libs/SessionHelper.php";
	require_once "admin/libs/Controller.php";
	$url = $_GET['url'];
	$urlarr=explode('/', $url);
	$cname=ucfirst($urlarr[0])."Controller";	
	$cfname="controller/".$cname.".php";
	
	if (file_exists($cfname)) {
		require_once $cfname;
		$obj=new $cname;		
		if (method_exists($obj, $urlarr[1])) {
			if (!empty($urlarr[2])) {
				$obj->{$urlarr[1]}($urlarr[2]);
			}else{	
				$obj->{$urlarr[1]}();
			}			
		}else{
			echo "Cannot find $urlarr[1] method";
		}
	}else{
		echo "Cannot find $cname class.";
	}
 ?>