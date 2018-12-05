<?php 
	
	class CustomerController extends Controller
	{		
		function __construct()
		{
			$this->checkLoginUser();
			$this->customer=$this->loadModel('customer');
		}
		function index()
		{
			$this->customerList=$this->customer->selectAllCustomer();
			$this->loadView('customer/index');
		}
		
	}
?>