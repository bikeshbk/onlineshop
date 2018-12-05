<?php 
	
	class CategoryModel extends Model
	{
		public $id,$name,$slug,$rank,$status,$role,$parent_id,$image,$created_date,$created_by,$modified_date,$modified_by;
		function create()
		{
			$sql = "insert into tbl_category(name,slug,rank,status,role,parent_id,image,created_date,created_by) values ('$this->name','$this->slug','$this->rank','$this->status','$this->role','$this->parent_id','$this->image','$this->created_date','$this->created_by')";
			return $this->insert($sql);
		}
		function selectByCategory()
		{
			$sql="select * from tbl_category where role='category'";
			return $this->select($sql);
		}
		function selectSubcategoryByProduct_id()
		{
			$sql="select * from tbl_category where parent_id='$this->parent_id'";
			return $this->select($sql);
		}
		function selectAllCategory()
		{
			$sql="select * from tbl_category";
			return $this->select($sql);
		}
		function deleteById(){
			$sql="delete from tbl_category where id='$this->id'";
			return $this->delete($sql);
		}
		function selectById()
		{
			$sql="select * from tbl_category where id='$this->id'";
			return $this->select($sql);
		}
		function editById(){
			if ($this->image == ''){
				$sql="update tbl_category set name = '$this->name',slug = '$this->slug',rank = '$this->rank',status = '$this->status',role = '$this->role',parent_id = '$this->parent_id',modified_date = '$this->modified_date',modified_by = '$this->modified_by' where id='$this->id'";
			}else{
				$sql="update tbl_category set name = '$this->name',slug = '$this->slug',rank = '$this->rank',image='$this->image', status = '$this->status',role = '$this->role',parent_id = '$this->parent_id',modified_date = '$this->modified_date',modified_by = '$this->modified_by' where id='$this->id'";
			}	
			
			return $this->update($sql);
		}

		function selectByCategoryId()
		{
			$sql="select * from tbl_category where id='$this->id'";
			return $this->select($sql);
		}

		function selectBySubcategoryId()
		{
			$sql="select * from tbl_category where id='$this->id'";
			return $this->select($sql);
		}
		function getByActiveCategory()
		{
			$sql="select * from tbl_category where role='category' and status=1 order by rank";
			return $this->select($sql);
		}
		function getByActiveSubcategory()
		{
			$sql="select * from tbl_category where role='subcategory' and status=1 order by rank";
			return $this->select($sql);
		}
		function getByRole()
		{
			$sql="select * from tbl_category where role='$this->role'";
			return $this->select($sql);
		}
		function getByActiveProductTitle()
		{
			$sql="select * from tbl_category where role='producttitle' and status=1 order by rank";
			return $this->select($sql);
		}	
		/*function getProductTitleId($id)
		{
			$sql="select * from tbl_category where role='producttitle' and status=1 and id='$id' order by rank limit 1";
			return $this->select($sql);
		} */
		
		
	}
?>