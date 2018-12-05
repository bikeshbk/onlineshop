<?php 

	
	class CategoryController extends Controller
	{
		
		function __construct()				
		{	
			$this->checkLoginUser();
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
				if (isset($rank) && empty($rank)) {
					$err['rank']="Enter Rank";
				}
				if (!isset($err['name']) && !isset($err['slug']) && !isset($err['rank'])) {					
					$this->category->name=$this->category->checkInputValue($name);
					$this->category->slug=$this->category->checkInputValue($slug);
					$this->category->rank=$rank;
					$this->category->role=$role;
					$this->category->parent_id=$parent;
					$this->category->status=$status;
					$this->category->created_date=date("Y-m-d H:i:s");
					$this->category->created_by=SessionHelper::get('admin_username');
					if ($_FILES['image']['error'] == 0) {
						$rimage=uniqid().$_FILES['image']['name'];
						if (move_uploaded_file($_FILES['image']['tmp_name'],'public/image/category/'.$rimage)) {
							$this->category->image=$rimage;
							SessionHelper::set('success_message','Successfully Upload image');
						}else{
							SessionHelper::set('error_message','Fail To Upload Image ');
						}
					}
					$result=$this->category->create();
					if ($result) {
						SessionHelper::set('success_message','Successfully Saved Category');
					}else{
						SessionHelper::set('error_message','Fail To Save Category ');
					}
				}
			}
			$this->loadView("category/create");
		}
		function filterByRole()
		{	
			if ($_POST['cid']=='subcategory') {
				$this->category->role='category';
			}elseif ($_POST['cid'] == 'producttitle') {
				$this->category->role='subcategory';
			}
			$selectSubcategory=$this->category->getByRole();
			$option='';
			if (count($selectSubcategory>0)) {
				foreach ($selectSubcategory as $ssc) {
					$option=$option."<option value='$ssc->id'>$ssc->name</option>";
				}
			}else{
				$option="<option>Sub Category Not Found</option>";
			}
			echo $option;
		}
		function index()
		{			

			$this->categoryList=$this->category->selectAllCategory();
			$this->loadView("category/index");
			

		}
		function delete($id)
		{	
			$this->category->id=$id;
			$deleteMsg=$this->category->deleteById();
			if ($deleteMsg) {
				SessionHelper::set('success_message','Successfully Deleted Category');
			}else{
				SessionHelper::set('error_message','Fail To Delete Category');
			}
			$this->redirect("category/index");
		}

		function edit($id)
		{	
			$this->category->id=$id;
			if (isset($_POST['btnUpdate'])) {
				$err=array();
				extract($_POST);
				if (isset($name) && empty($name)) {
					$err['name']="Enter Name";
				}
				if (isset($slug) && empty($slug)) {
					$err['slug']="Enter slug";
				}
				if (isset($rank) && empty($rank)) {
					$err['rank']="Enter Rank";
				}
				if (!isset($err['name']) && !isset($err['slug']) && !isset($err['rank'])) {					
					$this->category->name=$name;
					$this->category->slug=$slug;
					$this->category->rank=$rank;
					$this->category->role=$role;
					$this->category->parent_id=$parent;
					$this->category->status=$status;
					$this->category->modified_date=date("Y-m-d H:i:s");
					$this->category->modified_by=SessionHelper::get('admin_username');
					if ($_FILES['image']['error'] == 0) {
						$rimage=uniqid().$_FILES['image']['name'];
						if (move_uploaded_file($_FILES['image']['tmp_name'],'public/image/category/'.$rimage)) {
							$this->category->image=$rimage;
							SessionHelper::set('success_message','Successfully Upload image');
						}else{
							SessionHelper::set('error_message','Fail To Upload Image');
						}
					}					
					$result=$this->category->editById();
					if ($result) {
						SessionHelper::set('success_message','Successfully Updated Category');
					}else{
						SessionHelper::set('error_message','Fail To Update Category');
					}
				}
			}
			$this->parent=$this->category->selectByCategory();	
			$category=$this->category->selectById();
			$this->categoryList=$category[0];
			$this->loadView("category/edit");
		}
	}
?>