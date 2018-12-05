  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>category/index">Category Management</a></li>
        <li class="active">Create Category</li>
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
              <h3 class="box-title">Create Category</h3>
              <?php SessionHelper::flashMessage(); ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form action="" method="post" id="categoryForm" enctype="multipart/form-data" >
              <div class="box-body">
                <div class="form-group">
                  <label for="role">Role</label>
                  <select name="role" id="role" class="form-control" autofocus>
                    <option>Choose Category</option>
                    <option value="category">Category</option>
                    <option value="subcategory">Sub Category</option>
                    <option value="producttitle">Product Title</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="parent">Parent</label>
                  <select name="parent" id="parent" class="form-control">      
                      <option>Choose Parent </option>                                                  
                  </select>
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                  <label for="slug">Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" required>
                </div> 
                <div class="form-group">
                  <label for="rank">Rank</label>
                  <input type="number" class="form-control" id="rank" name="rank" placeholder="Rank" required>
                </div> 
                <div class="form-group">
                  <label for="image">File input</label>
                  <input type="file" name="image" id="image">                 
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <input type="radio"  value=1 id="active" name="status" ><label for="active">Active</label>
                  <input type="radio"  value=0 id="deactive" name="status" checked><label for="deactive">DeActive</label>
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="btnSave" class="btn btn-primary">Save Category</button>
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
