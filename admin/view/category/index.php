  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category Management        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>category/create">Category Management</a></li>
        <li class="active">Category List</li>
      </ol>
    </section>    
    <section class="content">
      <div class="row">
        <div class="col-xs-12"> 
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category List</h3>
            </div>
            <?php SessionHelper::flashMessage(); ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="category" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; 
                  foreach ($this->categoryList as $cl) { ?>
                  <tr>
                    <td><?php echo $i ; ?></td>
                    <td><?php echo $cl->name ; ?></td>
                    <td><?php echo $cl->role ; ?></td>
                    <td><img src="<?php echo base_url(); ?>public/image/category/<?php echo $cl->image ; ?>" width='80' height="50"></td>
                    <td><?php if ($cl->status==1) { ?>
                      <label class='label label-success'>Active</label>
                    <?php }else{ ?>
                      <label class='label label-danger'>DeActive</label>
                    </td>
                    <?php } ?>
                    <td><span class="btn btn-info"><a href="<?php echo base_url(); ?>category/edit/<?php echo $cl->id; ?>">Edit</a></span>&nbsp;<span class="btn btn-danger" onclick="confirm('Are you sure want to delete')"><a href="<?php echo base_url(); ?>category/delete/<?php echo $cl->id; ?>">Delete</span></td>
                  </tr> 
                <?php $i++; } ?>
                                  
                </tbody>
                <tfoot>
                <tr>
                  <th>S.N</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
      $(document).ready(function(){
    $('#category').DataTable();
});
  </script>  
