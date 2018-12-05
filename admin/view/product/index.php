  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product Management        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>product/create">Product Management</a></li>
        <li class="active">Product List</li>
      </ol>
    </section>    
    <section class="content">
      <div class="row">
        <div class="col-xs-12"> 
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product List</h3>
            </div>
            <?php SessionHelper::flashMessage(); ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="product" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Name</th>
                  <th>Category Name</th>                 
                  <th>Image</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; 
                  foreach ($this->productList as $pl) { ?>
                  <tr>
                    <td><?php echo $i ; ?></td>
                    <td><?php echo $pl->name ; ?></td>
                    <td><?php echo $pl->cname ; ?></td>                   
                    <td><img src="<?php echo base_url(); ?>public/image/product/<?php echo $pl->image1 ; ?>" width='80' height="50"></td>
                    <td><?php echo $pl->price ; ?></td>
                    <td><?php echo $pl->quantity ; ?></td>
                    <td><?php if ($pl->status==1) { ?>
                    <label class='label label-success'>Active</label>
                    <?php }else{ ?>
                      <label class='label label-danger'>DeActive</label>
                    </td>
                    <?php } ?>
                    <td><span class="btn btn-info"><a href="<?php echo base_url(); ?>product/edit/<?php echo $pl->id; ?>">Edit</a></span>&nbsp;<span class="btn btn-danger" onclick="confirm('Are you sure want to delete')"><a href="<?php echo base_url(); ?>product/delete/<?php echo $pl->id; ?>">Delete</span></td>
                  </tr> 
                <?php $i++; } ?>
                                  
                </tbody>
                <tfoot>
                <tr>
                  <th>S.N</th>
                  <th>Name</th>
                  <th>Category Name</th>                 
                  <th>Image</th>
                  <th>Price</th>
                  <th>Quantity</th>
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
    $('#product').DataTable();
});
  </script>  
