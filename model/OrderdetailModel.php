<?php
class OrderdetailModel extends Model{
	public $id,$order_id,$product_id,$color,$size,$price,$discount,$quantity;

	function saveOrderDetails(){
		
			 echo $sql = "insert into tbl_order_details(order_id,product_id,color,size,price,discount,quantity) values ('$this->order_id','$this->product_id','$this->color','$this->size','$this->price','$this->discount','$this->quantity')";		
		 return $this->insert($sql);
	}		
}

?>