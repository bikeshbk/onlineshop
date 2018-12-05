  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>/category/index">Category Management</a></li>
        <li class="active">Edit Category</li>
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
              <h3 class="box-title">Edit Category</h3>
              <?php SessionHelper::flashMessage(); ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form action="" method="post" id="categoryForm" enctype="multipart/form-data" >
              <div class="box-body">
                <div class="form-group">
                  <label for="role">Role</label>
                  <select name="role" id="role" class="form-control" autofocus>
                    <option value="<?php echo $this->categoryList->role ; ?>"><?php echo $this->categoryList->role ; ?></option>
                    <option value="category">Category</option>
                    <option value="subcategory">Sub Category</option>
                    <option value="producttitle">Product Title</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="parent">Parent</label>
                  <select name="parent" id="parent" class="form-control">      
                  </select>
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $this->categoryList->name ; ?>" required>
                </div>
                <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="<?php echo $this->categoryList->slug ; ?>" required>
                </div> 
                <div class="form-group">
                  <label for="rank">Rank</label>
                  <input type="number" class="form-control" id="rank" name="rank" placeholder="Rank" value="<?php echo  $this->categoryList->rank ; ?>" required>
                </div> 
                <div class="form-group">
                  <label for="image">File 1 input</label>
                  <input type="file" name="image" id="image">
                  <img src="<?php echo base_url();?>public/image/category/<?php echo $this->categoryList->image; ?>" width="90" height="60">                 
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <?php if ($this->categoryList->status == 1) { ?>
                    <input type="radio"  value=1 name="status" checked >Active
                    <input type="radio"  value=0 name="status">DeActive
                  <?php } else{ ?>
                    <input type="radio"  value=0 name="status">Active             
                    <input type="radio"  value=0 name="status" checked>DeActive
                  <?php }?>
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="btnUpdate" class="btn btn-primary">Update Category</button>
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
      $("#categoryForm").validate();
      $("#role").change(function(){
      var cid = $(this).val();
      var path= "<?php echo base_url() ; ?>category/filterByRole";
        $.ajax({
          url:path,
          data:{'cid':cid},
          method:'post',
          dataType:'text',
          success:function(response){
            $("#parent").empty();
            $("#parent").append(response);
          }
        });
      });     
    });
  </script>
