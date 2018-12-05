<?php 
	
	class CustomerModel extends Model
	{
		function selectAllCustomer()
		{
			$sql="select * from tbl_customer order by created_date desc";
			return $this->select($sql);
		}
		
	}
?>