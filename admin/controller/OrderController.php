<?php 
	
	class OrderController extends Controller
	{		
		function __construct()
		{
			$this->checkLoginUser();
			$this->order=$this->loadModel('order');
		}
		function index()
		{
			$this->orderList=$this->order->selectAllOrder();
			$this->loadView('order/index');
		}
		function detail()
		{
			$this->orderDetail=$this->order->selectAllOrderDetail();
			$this->loadView('order/detail');
		}
	}
?>