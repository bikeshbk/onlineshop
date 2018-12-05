<?php
	
	class UserController extends Controller
	{		
		function login()
		{	
			if (isset($_COOKIE['remember']) && !empty($_COOKIE['remember'])) {
				$this->redirect("dashboard/index");
			}
			if (isset($_POST['btnlogin'])) {
				$err = array();
				extract($_POST);
				if (isset($email) && empty($email)) {
					$err['email']="Enter Email";
				}				
				if (isset($password) && empty($password)) {
					$err['password']="Enter Password";
				}

				if (!isset($err['email']) && !isset($err['password'])) {
					$obj=$this->loadModel('user');  					
					$obj->email=$email;
					$obj->username=$email;
					$obj->password=$password;
					$userData=$obj->selectUserByEmail();
					if (count($userData) == 1) {
						$pm = sha1($password.$userData[0]->salt);
						if ($pm == $userData[0]->password) {
							$name=$userData[0]->name;
							SessionHelper::set('admin_name',$userData[0]->name);
							SessionHelper::set('admin_email',$userData[0]->email);
							SessionHelper::set('admin_username',$userData[0]->username);
							SessionHelper::set('login_message','Welcome ! '.$name);
							if (isset($remember) && !empty($remember)) {
								setcookie('remember',$userData[0]->username, time()+(6*24*60*60));
							}
							$this->redirect("dashboard/index");				
						}else{
							$this->errLogin = "Password Not Matched";
						}						
					}else{
						$this->errLogin="Email OR Username Not Matched";
					}
				}
			}
			$this->loadView("user/login",false,false);
		}
		function signup()
		{
			$this->checkLoginUser();
			$this->signup=$this->loadModel('user');
									
			if (isset($_POST['btnSave'])) {
				$err=array();
				extract($_POST);
				if (isset($name) && empty($name)) {
					$err['name']="Enter Name";
				}
				if (isset($password) && empty($password)) {
					$err['password']="Enter Password";
				}
				if (isset($email) && empty($email)) {
					$err['email']="Enter Email";
				}
				if (!isset($err['name']) && !isset($err['email']) && !isset($err['password'])) {					
					$this->signup->name=$name;
					$this->signup->username=$uname;
					$salt=uniqid();
					$this->signup->salt=$salt;					
					$this->signup->password=sha1($password.$salt);
					$this->signup->email=$email;
					$this->signup->status=$status;			
					$result=$this->signup->create();
					if ($result) {
						SessionHelper::set('success_message','Successfully SignUp');
					}else{
						SessionHelper::set('error_message','Fail To SignUp ');
					}
				}
			}		
			
			$this->loadView("user/signup");
		}

		function logout(){						
			SessionHelper::end();
			setcookie('remember','', time()-1);
			$this->redirect("user/login");
		}
		
	}

?>