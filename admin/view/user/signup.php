 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registration From
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>user/signup">Sign Up</a></li>
        <li class="active">Form</li>
      </ol>
    </section>
   <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Sign Up Form</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php SessionHelper::flashMessage(); ?>

        
         <form action="" method="post" id="categoryForm" enctype="multipart/form-data" >
              <div class="box-body">
                
                <div class="form-group">
                  <label for="name">Full Name</label>
                  <input type="text" class="form-control" id="name" name="name" minlength=8 placeholder="Full Name" required>
                </div>
                <div class="form-group">
                  <label for="uname">UserName</label>
                  <input type="text" class="form-control" id="uname" name="uname" placeholder="UserName" required>
                </div> 
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div> 
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                </div> 
                <div class="form-group">
                  <label>Status</label>
                  <input type="radio" id="active" value=1 name="status" checked><label for="active">Active</label>
                  <input type="radio" id="deactive" value=0 name="status" ><label for="deactive">DeActive</label>
                </div>
        </div>
        <!-- /.box-body -->
              

              <div class="box-footer">
                <button type="submit" name="btnSave" class="btn btn-primary">Sign Up</button>
              </div>
            </form>
        <!-- /.box-footer-->
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
    });
  </script>


 