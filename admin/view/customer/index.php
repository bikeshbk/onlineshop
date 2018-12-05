  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customer Management        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>dashboard/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>customer/index">Customer Management</a></li>
        <li class="active">Customer List</li>
      </ol>
    </section>    
    <section class="content">
      <div class="row">
        <div class="col-xs-12"> 
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customer List</h3>
            </div>
            <?php SessionHelper::flashMessage(); ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="customer" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Created Date</th>
                  <th>Last Login</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; 
                  foreach ($this->customerList as $cl) { ?>
                  <tr>
                    <td><?php echo $i ; ?></td>
                    <td><?php echo $cl->name ; ?></td>
                    <td><?php echo $cl->email ; ?></td>
                    <td><?php echo $cl->address ; ?></td>
                    <td><?php echo $cl->created_date ; ?></td>
                    <td><?php echo $cl->last_login ; ?></td>
                    <td><?php if ($cl->status==1) { ?>
                      <label class='label label-success'>Active</label>
                    <?php }else{ ?>
                      <label class='label label-danger'>DeActive</label>
                    </td>
                    <?php } ?>
                  </tr> 
                <?php $i++; } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>S.N</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Created Date</th>
                  <th>Last Login</th>
                  <th>Status</th>
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
    $('#customer').DataTable();
});
  </script>  
