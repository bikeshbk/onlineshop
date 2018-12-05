<?php
	
	class Controller
	{
		
		function redirect($path)
		{
			$h=base_url().$path;
			header("location:$h");
		}
		function loadView($name,$header=true,$footer=true)
		{	
			if ($header) {
				require_once "view/layout/header.php";
			}
			
			require_once "view/$name.php";

			if($footer){
				require_once "view/layout/footer.php";
			}
			
		}
		function loadModel($name,$admin=false)
		{
			$nm=ucfirst($name).'Model';
			if ($admin) {
				require_once "admin/model/$nm.php";
			}else{
				require_once "model/$nm.php";
			}
			$obj = new $nm();
			return $obj;
			
		}
		function checkLoginUser()
		{	
			SessionHelper::init();
			if (!isset($_SESSION['admin_username'])) {
				$this->redirect('user/login');
				SessionHelper::set('error_message','First You Have To Login To Access Admin');
			}

			
		}
	}
?>