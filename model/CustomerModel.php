<?php 
	
	class CustomerModel extends Model
	{
		public $id,$name,$email,$password,$address,$salt,$created_date,$last_login,$verification,$status;
		function create()
		{
			$sql="insert into tbl_customer(name,email,password,address,salt,created_date,verification) values ('$this->name','$this->email','$this->password','$this->address','$this->salt','$this->created_date','$this->verification')";
			return $this->insert($sql);
		}
		function getExitUser()
		{
			$sql="select * from tbl_customer where verification='$this->verification'";
			return $this->select($sql);
		}
		public function updateUser()
		{
			$sql = "update tbl_customer set status=1,verification='' where verification='$this->verification'";
			return $this->update($sql);
		}
		function selectExitEmail()
		{
			$sql="select * from tbl_customer where email='$this->email' and status=1 ";
			return $this->select($sql);
		}	
		public function updateLogin()
		{
			$sql = "update tbl_customer set last_login='$this->last_login' where id='$this->id'";
			return $this->update($sql);
		}
		
	}
?>