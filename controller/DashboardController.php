<?php
	class DashboardController extends Controller{
		function __construct()
		{
			$this->category=$this->loadModel('category',true);
			$this->getCategory=$this->category->getByActiveCategory();
			$this->getSubcategory=$this->category->getByActiveSubcategory();
			$this->getProductTitle=$this->category->getByActiveProductTitle();
			$this->product=$this->loadModel('product',true);
		}
		function index()
		{	
			$this->specialProduct=$this->product->selectByActiveSlider();
			$this->newProduct=$this->product->selectLatestProduct();			
			$this->title="Home";		
			$this->loadView("dashboard/index");
		}
		function productlist($producttitleid)
		{	
			$id1=substr($producttitleid,0,-5);
			$id2=explode('-',$id1);
			$id= $id2[count($id2) - 1];		
			$this->gpt=$this->product->getProductTitleId($id);			
			$this->title="Product List";		
			$this->loadView("dashboard/productlist");
		}
		function productdetail($productid)
		{
			$this->title="Product Detail";
			$id1=substr($productid,0,-5);
			$id2=explode('-',$id1);
			$id= $id2[count($id2) - 1];		
			$this->gp=$this->product->getProductId($id);		 
			$this->loadView("dashboard/productdetail");
		}
	}

?>
