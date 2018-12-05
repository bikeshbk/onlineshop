  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>product/index">Product Management</a></li>
        <li class="active">Create Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Product</h3>
              <?php SessionHelper::flashMessage(); ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form action="" method="post" id="productForm" enctype="multipart/form-data" >
              <div class="box-body">
                <div class="form-group">
                  <label for="category">Select Category</label>
                  <select name="category" id="category" class="form-control" autofocus>
                    <option value="<?php echo $this->productList->category_id ; ?>"><?php echo $this->cidname->name ; ?></option>
                    <?php foreach ($this->allCategory as $ac) { ?>
                      <option value="<?php echo $ac->id?>"><?php echo $ac->name?></option>
                    <?php } ?>                   
                    
                  </select>
                </div>
                <div class="form-group">
                  <label for="subCategory">Select Subcategory</label>
                  <select name="subcategory" id="subCategory" class="form-control">                
                    <option value="<?php echo $this->productList->subcategory_id ; ?>"><?php echo $this->scidname->name ; ?></option>                               
                  </select>
                </div>
                <div class="form-group">
                  <label for="subCategory">Select Product Title</label>
                  <select name="producttitle" id="producttitle" class="form-control">                
                    <option>Choose Product Title</option>                               
                  </select>
                </div>
                <div class="form-group">
                  <label for="name">Product Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $this->productList->name ; ?>" required>
                </div>
                <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="<?php echo $this->productList->slug ; ?>" required>
                </div> 
                 <div class="form-group">
                  <label for="image1">File input 1:</label>
                  <input type="file" name="image1" id="image1">
                  <img src="<?php echo base_url(); ?>public/image/product/<?php echo $this->productList->image1 ; ?>" width="185" height="110">                 
                </div><div class="form-group">
                  <label for="image2">File input 2:</label>
                  <input type="file" name="image2" id="image2">
                  <img src="<?php echo base_url(); ?>public/image/product/<?php echo $this->productList->image2 ; ?>" width="185" height="110">                  
                </div><div class="form-group">
                  <label for="image3">File input 3:</label>
                  <input type="file" name="image3" id="image3">
                  <img src="<?php echo base_url(); ?>public/image/product/<?php echo $this->productList->image3 ; ?>" width="185" height="110">                  
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo $this->productList->price ; ?>" required>
                </div> 
                <div class="form-group">
                  <label for="discount">Discount</label>
                  <input type="number" class="form-control" id="discount" name="discount" value="<?php echo $this->productList->discount ; ?>" placeholder="Discount">
                </div>
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $this->productList->quantity ; ?>" placeholder="Quantity" required>
                </div> 
                <div class="form-group">
                  <label for="color">Color</label>
                  <input type="text" class="form-control" id="color" name="color" value="<?php echo $this->productList->color ; ?>" placeholder="Color">
                </div> 
                <div class="form-group">
                  <label for="size">Size</label>
                  <input type="text" class="form-control" id="size" name="size" value="<?php echo $this->productList->size ; ?>" placeholder="Size">
                </div>  
                 <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id ="description" name="description"><?php echo html_entity_decode($this->productList->description) ; ?></textarea>
                </div> 
                <div class="form-group">
                  <label>Slider Product:</label>
                  <?php if ($this->productList->slider_product==1) { ?>
                    <input type="radio" id="sactive" value=1 name="slider_key" checked><label for="sactive">Active</label>
                    <input type="radio" id="sdeactive" value=0 name="slider_key"  ><label for="sdeactive">Deactive</label>
                  <?php }else{ ?>
                    <input type="radio" id="sactive" value=1 name="slider_key" ><label for="sactive">Active</label>
                    <input type="radio" id="sdeactive" value=0 name="slider_key"  checked><label for="sdeactive">Deactive</label>
                  <?php } ?> 
                </div> 
                <div class="form-group">
                  <label>Feature Product:</label>
                  <?php if ($this->productList->feature_product==1) { ?>
                    <input type="radio" id="factive" value=1 name="feature_key" checked><label for="factive">Active</label>
                    <input type="radio" id="fdeactive" value=0 name="feature_key" ><label for="fdeactive">Deactive</label>
                  <?php }else{ ?>
                    <input type="radio" id="factive" value=1 name="feature_key" ><label for="factive">Active</label>
                    <input type="radio" id="fdeactive" value=0 name="feature_key" checked ><label for="fdeactive">Deactive</label>
                    <?php } ?>
                </div> 
                <div class="form-group">
                  <label>Status:</label>
                  <?php if ($this->productList->status==1) { ?>
                    <input type="radio" id="active" value=1 name="status" checked><label for="active">Active</label>
                    <input type="radio" id="deactive" value=0 name="status" ><label for="deactive">Deactive</label>
                  <?php }else{ ?>
                    <input type="radio" id="active" value=1 name="status" ><label for="active">Active</label>
                    <input type="radio" id="deactive" value=0 name="status" checked ><label for="deactive">Deactive</label>
                  <?php } ?>
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="btnSave" class="btn btn-primary">Update Product</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>public/plugins/validate/dist/jquery.validate.min.js"></script>
  <script>
    $(function () {
      $("#productForm").validate(); 
      $("#category").change(function(){
      var cid = $(this).val();
      var path= "<?php echo base_url() ; ?>product/filterSubcategoryByProduct_id";
        $.ajax({
          url:path,
          data:{'cid':cid},
          method:'post',
          dataType:'text',
          success:function(response){
            $("#subCategory").empty();
            $("#subCategory").append(response);
          }
        });
      });
      $("#subCategory").change(function(){
      var cid = $(this).val();
      var path= "<?php echo base_url() ; ?>product/filterSubcategoryByProduct_id";
        $.ajax({
          url:path,
          data:{'cid':cid},
          method:'post',
          dataType:'text',
          success:function(response){
            $("#producttitle").empty();
            $("#producttitle").append(response);
          }
        });
      });
      CKEDITOR.replace( 'description' );
    });
  </script>
