<?php 
	
	class ProductModel extends Model
	{
		public $id,$name,$slug,$price,$color,$size,$discount,$stock,$quantity,$description,$category_id,$subcategory_id,$producttitle_id,$feature_product,$slider_product,$status,$image1,$image2,$image3,$created_date,$created_by,$modified_date,$modified_by;
		function create()
		{
			$sql = "insert into tbl_product(name,slug,price,color,size,discount,stock,quantity,description,category_id,subcategory_id,producttitle_id,feature_product,slider_product,status,image1,image2,image3,created_date,created_by) values ('$this->name','$this->slug','$this->price','$this->color','$this->size','$this->discount','$this->stock','$this->quantity','$this->description','$this->category_id','$this->subcategory_id','$this->producttitle_id','$this->feature_product','$this->slider_product','$this->status','$this->image1','$this->image2','$this->image3','$this->created_date','$this->created_by')";
			return $this->insert($sql);
		}
		function selectAllProduct()
		{
			$sql="select tbl_product.*,tbl_category.name as cname from tbl_product join tbl_category on tbl_product.category_id=tbl_category.id";
			return $this->select($sql);
		}
		function deleteById(){
			$sql="delete from tbl_product where id='$this->id'";
			return $this->delete($sql);
		}
		
		function selectById()
		{
			$sql="select * from tbl_product where id='$this->id'";
			return $this->select($sql);
		}

		function editById(){
			$sql="update tbl_product set name='$this->name',slug='$this->slug',price='$this->price',color='$this->color',size='$this->size',discount='$this->discount',stock='$this->stock',quantity='$this->quantity',description='$this->description',category_id='$this->category_id',subcategory_id='$this->subcategory_id',feature_product='$this->feature_product',slider_product='$this->slider_product',status='$this->status',image1='$this->image1',image2='$this->image2',image3='$this->image3',modified_date='$this->modified_date',modified_by='$this->modified_by' where id='$this->id'";
			return $this->update($sql);
		}
		function selectByActiveFeature()
		{
			$sql="select * from tbl_product where feature_product=1 and status=1 order by created_date desc limit 9";
			return $this->select($sql);
		}
		function selectByActiveSlider()
		{
			$sql="select * from tbl_product where slider_product=1 and status=1 order by created_date desc limit 1";
			return $this->select($sql);
		}
		
		function getAllCategoryProductBySlug($slug)
		{
			$sql="select p.*,c.name as cname from tbl_product as p join tbl_category as c on p.category_id=c.id where c.slug='$slug'";
			return $this->select($sql);
		}
		function getAllSubcategoryProductBySlug($slug)
		{
			$sql="select p.*,c.name as cname from tbl_product as p join tbl_category as c on p.subcategory_id=c.id where c.slug='$slug'";
			return $this->select($sql);
		}
		function getAllProductTitleBySlug($slug)
		{
			$sql="select p.*,c.* as cname from tbl_product as p join tbl_category as c on p.subcategory_id=c.id where c.slug='$slug'";
			return $this->select($sql);
		}
		function getProductTitleId($id)
		{
			$sql="select p.*,c.name as cname,c.image as cimage from tbl_product as p join tbl_category as c on p.producttitle_id=c.id where c.id='$id' and p.producttitle_id='$id'";
			return $this->select($sql);
		}
		function selectLatestProduct()
		{
			$sql="select * from tbl_product where status=1 order by created_date desc limit 4";
			return $this->select($sql);
		}	
		function getProductId($id)
		{
			$sql="select * from tbl_product where id='$id' and status=1";
			return $this->select($sql);
		}	
	}
?>
