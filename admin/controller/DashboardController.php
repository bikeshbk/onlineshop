<?php 
	
	class DashboardController extends Controller
	{		
			
		function __construct()
		{
			$this->category=$this->loadModel('category');
		}
		
		function index()
		{	
			$this->checkLoginUser();
			$this->loadView("dashboard/index");
		}

	}
 ?>