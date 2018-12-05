<?php
class OrderModel extends Model{
	public $id,$custumer_id,$name,$email,$phone,$total_amount,$address,$transaction_id,$status,$order_date;

	function saveOrder(){
		if (!empty($this->phone)) {
			 $sql = "insert into tbl_order(name,custumer_id,email,phone,total_amount,address,transaction_id,status,order_date) values ('$this->name','$this->custumer_id','$this->email','$this->phone','$this->total_amount','$this->address','$this->transaction_id','$this->status','$this->order_date')";		
		} else {
			$sql = "insert into tbl_order(name,custumer_id,email,total_amount,address,transaction_id,status,order_date) values ('$this->name','$this->custumer_id','$this->email','$this->total_amount','$this->address','$this->transaction_id','$this->status','$this->order_date')";		
		}
		
		 return $this->insert($sql);
	}		
}

?>