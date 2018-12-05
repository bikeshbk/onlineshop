  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order Management        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url(); ?>order/index">Order Management</a></li>
        <li class="active">Order Detail</li>
      </ol>
    </section>    
    <section class="content">
      <div class="row">
        <div class="col-xs-12"> 
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Order Detail</h3>
            </div>
            <?php SessionHelper::flashMessage(); ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="orderDetail" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Order ID</th>
                  <th>Product Name</th>                 
                  <th>Color</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; 
                  foreach ($this->orderDetail as $od) { ?>
                  <tr>
                    <td><?php echo $i ; ?></td>
                    <td><?php echo $od->order_id ; ?></td>
                    <td><?php echo $od->product_id ; ?></td>
                    <td><?php echo $od->color ; ?></td>
                    <td><?php echo $od->size ; ?></td>
                    <td><?php echo $od->price ; ?></td>
                    <td><?php echo $od->discount ; ?></td>
                    <td><?php echo $od->quantity ; ?></td> 
                  </tr>                    
                  <?php $i++; } ?>
                                  
                </tbody>
                <tfoot>
                <tr>
                  <th>S.N</th>
                  <th>Order ID</th>
                  <th>Product Name</th>                 
                  <th>Color</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Quantity</th>
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
    $('#orderDetail').DataTable();
});
  </script>  
