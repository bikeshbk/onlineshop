<?php
	class CustomerController extends Controller{
		function __construct()
		{
			$this->category=$this->loadModel('category',true);
			$this->getCategory=$this->category->getByActiveCategory();
			$this->getSubcategory=$this->category->getByActiveSubcategory();
			$this->getProductTitle=$this->category->getByActiveProductTitle();
			$this->product=$this->loadModel('product',true);
			$this->customer=$this->loadModel('customer');
			$this->cart=$this->loadModel('cart');
			SessionHelper::init();
			$this->cart->session_id=session_id();		
		}
		function login()
		{	
			$this->title="Login";
			if (isset($_POST['btnlogin'])) {
				extract($_POST);
				$this->customer->password=$password;
				$this->customer->email=$email;
				$result=$this->customer->selectExitEmail();
				if (count($result)==1) {
					$this->customer->password=sha1($password.$result[0]->salt);					
					if ($this->customer->password==$result[0]->password) {
						SessionHelper::set('customer_id',$result[0]->id);
						SessionHelper::set('customer_name',$result[0]->name);
						SessionHelper::set('customer_username',$result[0]->username);
						SessionHelper::set('success_message','Success!!! ON Login');
						$this->customer->last_login=date("Y-m-d H:i:s");
						$this->customer->id=$result[0]->id;
						$this->customer->updateLogin();
						SessionHelper::set('success_message','WelCome!!!'.$result[0]->name);
						$this->redirect('cart/checkOut');						
					}else{		
						SessionHelper::set('error_message','Password Not Match');
					}
				}else{
					SessionHelper::set('error_message','Email Not Match ');
				}
			}
			$this->loadView("customer/login");
		}
		function register()
		{
			$this->title="Registation";
			if (isset($_POST['btnsave'])) {
				extract($_POST);
				if ($password==$cpassword) {
					$this->customer->password=sha1($password.$this->customer->salt);				
					$this->customer->name=$name;
					$this->customer->email=$email;
					$this->customer->salt=uniqid();				
					$this->customer->address=$address;
					$this->customer->created_date=date("Y-m-d H:i:s");
					$this->customer->verification=uniqid();
					$result=$this->customer->create();
					$path=base_url()."customer/verification/".$this->customer->verification;
					$ht="<a href='$path' target='_blank'>Click Here To Veriy Your Account</a>";
					//mail(to, subject, message,header);
					if ($result) {
						SessionHelper::set('success_message','Success!!! Your Account is Created, Please Visit Your Email To Verify'.$ht);
					}else{
						SessionHelper::set('error_message','Registation Fail ');
					}						
				}else{
					SessionHelper::set('error_message','Password and Confirm Password not match');
				}			
			}
			$this->loadView("customer/register");
		}
		function verification($key)
		{	$this->title="Registation";
			$this->customer->verification=$key;
			$result=$this->customer->getExitUser();
			if (count($result) == 1 ){
				$res=$this->customer->updateUser();
				if ($res) {
					SessionHelper::set('success_message','Success!!! Now You Can Login With Your Email & Password');
				}else{
					SessionHelper::set('error_message','Verification Fail ');
				}				
			}else {
				SessionHelper::set('error_message','Invalid verification link');
			}
			$this->redirect('customer/login');	
		}
	}
?>	