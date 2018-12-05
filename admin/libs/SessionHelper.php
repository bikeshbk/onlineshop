<?php
	
	class SessionHelper
	{
		
		public static function init()
		{
			@session_start();
		}
		public static function end()
		{
			self::init();
			session_destroy();
		}
		public static function set($key,$value)
		{
			self::init();
			$_SESSION[$key]=$value;
		}
		public static function get($key)
		{
			self::init();
			if (isset($_SESSION[$key])) {
				return $_SESSION[$key];
			}			
		}
		public static function flashMessage(){
			self::init();
			$ht="";
			if (isset($_SESSION['success_message'])) {
				$msg=$_SESSION['success_message'];
				echo $ht="<div class='alert alert-success'>$msg</div>";
				unset($_SESSION['success_message']);
			}
			if (isset($_SESSION['error_message'])) {
				$msg=$_SESSION['error_message'];
				echo $ht="<div class='alert alert-danger'>$msg</div>";
				unset($_SESSION['error_message']);				
			}
			if (isset($_SESSION['login_message'])) {
				$msg=$_SESSION['login_message'];
				echo $ht="<div class='alert alert-info'>$msg</div>";
				unset($_SESSION['login_message']);
			}
		
		}
	}
?>