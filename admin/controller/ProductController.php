<?php 

	
	class ProductController extends Controller
	{
		
		function __construct()				
		{	
			$this->checkLoginUser();
			$this->product=$this->loadModel('product');
			$this->category=$this->loadModel('category');
		}
		function create()
		{							
			if (isset($_POST['btnSave'])) {
				$err=array();
				extract($_POST);
				if (isset($name) && empty($name)) {
					$err['name']="Enter Name";
				}
				if (isset($slug) && empty($slug)) {
					$err['slug']="Enter slug";
				}
				if (isset($price) && empty($price)) {
					$err['rank']="Enter Rank";
				}
				if (!isset($err['name']) && !isset($err['slug']) && !isset($err['price'])) {					
					$this->product->name=$this->product->checkInputValue($name);
					$this->product->slug=$this->product->checkInputValue($slug);
					$this->product->category_id=$category;
					$this->product->subcategory_id=$subcategory;
					$this->product->producttitle_id=$producttitle;
					$this->product->price=$price;					
					$this->product->discount=$discount;
					$this->product->quantity=$quantity;
					$this->product->stock=$quantity;
					$this->product->color=$color;
					$this->product->size=$size;
					$this->product->description=$this->product->checkInputValue($description);
					$this->product->slider_product=$slider_key;
					$this->product->feature_product=$feature_key;
					$this->product->status=$status;
					$this->product->created_date=date("Y-m-d H:i:s");
					$this->product->created_by=SessionHelper::get('admin_username');
					if ($_FILES['image1']['error'] == 0) {
						$rimage=uniqid().$_FILES['image1']['name'];
						if (move_uploaded_file($_FILES['image1']['tmp_name'],'public/image/product/'.$rimage)) {
							$this->product->image1=$rimage;
							SessionHelper::set('success_message','Successfully Upload image');
						}else{
							SessionHelper::set('error_message','Fail To Upload Image ');
						}
					}
					if ($_FILES['image2']['error'] == 0) {
						$rimage=uniqid().$_FILES['image2']['name'];
						if (move_uploaded_file($_FILES['image2']['tmp_name'],'public/image/product/'.$rimage)) {
							$this->product->image2=$rimage;
							SessionHelper::set('success_message','Successfully Upload image');
						}else{
							SessionHelper::set('error_message','Fail To Upload Image ');
						}
					}
					if ($_FILES['image3']['error'] == 0) {
						$rimage=uniqid().$_FILES['image3']['name'];
						if (move_uploaded_file($_FILES['image3']['tmp_name'],'public/image/product/'.$rimage)) {
							$this->product->image3=$rimage;
							SessionHelper::set('success_message','Successfully Upload image');
						}else{
							SessionHelper::set('error_message','Fail To Upload Image ');
						}
					}
					$result=$this->product->create();
					if ($result) {
						SessionHelper::set('success_message','Successfully Saved Product');
					}else{
						SessionHelper::set('error_message','Fail To Save Product ');
					}
				}
			}
			$this->allCategory=$this->category->selectByCategory();
			$this->loadView("product/create");
		}
		function filterSubcategoryByProduct_id()
		{
			$this->category->parent_id=$_POST['cid'];
			$selectSubcategory=$this->category->selectSubcategoryByProduct_id();
			$option='';
			if (count($selectSubcategory>0)) {
				foreach ($selectSubcategory as $ssc) {
					$option=$option."<option value='$ssc->id'>$ssc->name</option>";
				}
			}else{
				$option="<option>Not Found</option>";
			}
			echo $option;
		}
		function index()
		{	
			$this->productList=$this->product->selectAllProduct();
			$this->loadView("product/index");			
		}
		function delete($id)
		{	
			$this->product->id=$id;
			$deleteMsg=$this->product->deleteById();
			if ($deleteMsg) {
				SessionHelper::set('success_message','Successfully Deleted Product');
			}else{
				SessionHelper::set('error_message','Fail To Delete Product');
			}
			$this->redirect("product/index");
		}
		function edit($id)
		{
			$this->product->id=$id;
			if (isset($_POST['btnSave'])) {
				$err=array();
				extract($_POST);
				if (isset($name) && empty($name)) {
					$err['name']="Enter Name";
				}
				if (isset($slug) && empty($slug)) {
					$err['slug']="Enter slug";
				}
				if (isset($price) && empty($price)) {
					$err['rank']="Enter Rank";
				}
				if (!isset($err['name']) && !isset($err['slug']) && !isset($err['price'])) {					
					$this->product->name=$name;
					$this->product->slug=$slug;
					$this->product->category_id=$category;
					$this->product->subcategory_id=$subcategory;
					$this->product->price=$price;					
					$this->product->discount=$discount;
					$this->product->quantity=$quantity;
					$this->product->stock=$quantity;
					$this->product->color=$color;
					$this->product->size=$size;
					$this->product->description=$this->product->checkInputValue($description);
					$this->product->slider_product=$slider_key;
					$this->product->feature_product=$feature_key;
					$this->product->status=$status;
					$this->product->modified_date=date("Y-m-d H:i:s");
					$this->product->modified_by=SessionHelper::get('admin_username');
					if ($_FILES['image1']['error'] == 0) {
						$rimage=uniqid().$_FILES['image1']['name'];
						if (move_uploaded_file($_FILES['image1']['tmp_name'],'public/image/product/'.$rimage)) {
							$this->product->image1=$rimage;
							SessionHelper::set('success_message','Successfully Upload image');
						}else{
							SessionHelper::set('error_message','Fail To Upload Image ');
						}
					}else{
						$product=$this->product->selectById();
						$this->productList=$product[0];	
						$this->product->image1=$this->productList->image1;
					}
					if ($_FILES['image2']['error'] == 0) {
						$rimage=uniqid().$_FILES['image2']['name'];
						if (move_uploaded_file($_FILES['image2']['tmp_name'],'public/image/product/'.$rimage)) {
							$this->product->image2=$rimage;
							SessionHelper::set('success_message','Successfully Upload image');
						}else{
							SessionHelper::set('error_message','Fail To Upload Image ');
						}
					}else{
						$product=$this->product->selectById();
						$this->productList=$product[0];	
						$this->product->image2=$this->productList->image2;
					}
					if ($_FILES['image3']['error'] == 0) {
						$rimage=uniqid().$_FILES['image3']['name'];
						if (move_uploaded_file($_FILES['image3']['tmp_name'],'public/image/product/'.$rimage)) {
							$this->product->image3=$rimage;
							SessionHelper::set('success_message','Successfully Upload image');
						}else{
							SessionHelper::set('error_message','Fail To Upload Image ');
						}
					}else{
						$product=$this->product->selectById();
						$this->productList=$product[0];	
						$this->product->image3=$this->productList->image3;
					}
					$result=$this->product->editById();
					if ($result) {
						SessionHelper::set('success_message','Successfully Upload Product');
					}else{
						SessionHelper::set('error_message','Fail To Upload Product ');
					}
				}
			}

			$this->allCategory=$this->category->selectByCategory();
			$product=$this->product->selectById();
			$this->productList=$product[0];			
			
			$this->category->id=$this->productList->category_id;
			$cname=$this->category->selectByCategoryId();
			$this->cidname=$cname[0];
			$this->category->id=$this->productList->subcategory_id;
			$scname=$this->category->selectBySubcategoryId();
			$this->scidname=$scname[0];
			$this->loadView("product/edit");
		}
	}
?>

