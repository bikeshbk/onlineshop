<?php
	class UserModel extends Model
	{	public	$id,$name,$password,$username,$salt,$email,$last_login,$status;
		function selectUserByEmail(){		 
			$sql = "select * from tbl_admin where email='$this->email' or username='$this->username' and status=1";
			return $this->select($sql);
		}
		function create()
		{
			$sql = "insert into tbl_admin(name,password,username,salt,email,status) values ('$this->name','$this->password','$this->username','$this->salt','$this->email','$this->status')";
			return $this->insert($sql);
		}
	}
?>