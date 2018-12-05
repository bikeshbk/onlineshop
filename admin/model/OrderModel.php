<?php 
	
	class OrderModel extends Model
	{
		function selectAllOrder()
		{
			$sql="select * from tbl_order order by order_date desc";
			return $this->select($sql);
		}
		function selectAllOrderDetail()
		{
			$sql="select * from tbl_order_details";
			return $this->select($sql);
		}
		
	}
?>