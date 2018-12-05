<?php 
	
	class CartModel extends Model
	{
		public $id,$product_id,$quantity,$color,$size,$price,$discount,$session_id,$customer_id;
		function create()
		{
			if ($this->customer_id == '') {
				$sql = "insert into tbl_cart(product_id,quantity,color,size,price,discount,session_id) values ('$this->product_id','$this->quantity','$this->color','$this->size','$this->price','$this->discount','$this->session_id')";
			}else{
				$sql = "insert into tbl_cart(product_id,quantity,color,size,price,discount,session_id,customer_id) values ('$this->product_id','$this->quantity','$this->color','$this->size','$this->price','$this->discount','$this->session_id','$this->customer_id')";
			}
			return $this->insert($sql);
		}
		function selectAllCartItem()
		{
			$sql="select c.*,p.name,p.image1,p.stock from tbl_cart as c join tbl_product as p on c.product_id=p.id where c.session_id='$this->session_id'";
			return $this->select($sql);
		}
		function selectCartItem()
		{
			$sql="select * from tbl_cart where session_id='$this->session_id' and color='$this->color' and size='$this->size' ";
			return $this->select($sql);
		}
		public function updateCartQuantity()
		{
			$sql = "update tbl_cart set quantity='$this->quantity' where id='$this->id'";
			return $this->update($sql);
		}
		public function deleteCartById()
		{
			$sql="delete from tbl_cart where id='$this->id'";
			return $this->delete($sql);
		}

	}
?>