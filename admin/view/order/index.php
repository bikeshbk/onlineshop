  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order Management        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>order/detail">Order Management</a></li>
        <li class="active">Order List</li>
      </ol>
    </section>    
    <section class="content">
      <div class="row">
        <div class="col-xs-12"> 
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Order List</h3>
            </div>
            <?php SessionHelper::flashMessage(); ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="orderList" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Customer ID</th>
                  <th>Customer Name</th>
                  <th>Email</th>                 
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Total Amount</th>
                  <th>Transaction ID</th>
                  <th>Order Date</th>
                  <th>Status</th>
                  <th>Report</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; 
                  foreach ($this->orderList as $ol) { ?>
                  <a href="<?php echo base_url(); ?>order/detail/<?php echo $ol->id; ?>">
                  <tr>                   
                    <td><?php echo $i ; ?></td>
                    <td><?php echo $ol->customer_id ; ?></td>
                    <td><?php echo $ol->name ; ?></td>
                    <td><?php echo $ol->email ; ?></td>
                    <td><?php echo $ol->phone ; ?></td>
                    <td><?php echo $ol->address ; ?></td>
                    <td><?php echo $ol->total_amount ; ?></td> 
                    <td><?php echo $ol->transaction_id ; ?></td> 
                    <td><?php echo $ol->order_date ; ?></td>
                    <td><?php echo $ol->status ; ?></td>                   
                    <td><span class="btn btn-info"><a href="<?php echo base_url(); ?>product/edit/<?php echo $pl->id; ?>">Edit</a></span>&nbsp;<span class="btn btn-danger" onclick="confirm('Are you sure want to delete')"><a href="<?php echo base_url(); ?>product/delete/<?php echo $pl->id; ?>">Delete</span></td>
                    </tr></a>              
                <?php $i++; } ?>                                  
                </tbody>
                <tfoot>
                <tr>
                  <th>S.N</th>
                  <th>Customer ID</th>
                  <th>Customer Name</th>
                  <th>Email</th>                 
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Total Amount</th>
                  <th>Transaction ID</th>
                  <th>Order Date</th>
                  <th>Status</th>
                  <th>Report</th>
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
    $('#orderList').DataTable();
});
  </script>  
