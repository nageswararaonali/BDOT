<!-- Content Wrapper. Contains page content -->
 <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>     
	 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Products</h1>
		  <?php if($this->session->flashdata('message')){
			  echo $this->session->flashdata('message');
		  }
		  ?>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Products List</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                
                <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
						    <th>Order ID</th>
						    <th>Transaction ID</th>
							<th>Username</th>							
							<th>Product Name</th>							
							<th>Qty</th>
							<th>Amount</th>
							<th>Weight</th>
							<th>Phone Number</th>
							<th>Address</th>
							<th>Order Date</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					<?php
					foreach($viewproducts as $products) {
						
						if($products['order_status'] == 'P'){
							$status = 'Approve';
						}else if($products['order_status'] == 'A'){
							$status = "Dispatch";
						}else if($products['order_status'] == 'D'){
							$status = "Complete";
						}else{
							$status = "Shipped";
						}
						
						?>
						<tr>
						    <td><?php echo $products['orid'];?></td>
							<td><?php echo $products['order_transaction_id'];?></td>
							<td><?php echo $products['first_name']; echo $products['last_name'];?></td>							
							<td><?php echo $this->mainModel->selectProductByid($products['product_id']);?></td>
							<td><?php echo $products['quantity'];?></td>
							<td><?php echo $products['amount'];?></td>
							<td><?php echo $products['weight'];?></td>
							<td><?php echo $products['phone_num'];?></td>
							<td><?php echo $products['address'];?></td>
							<td><?php echo $products['order_date_time'];?></td>
							<?php if($products['order_status'] == 'C'){ ?>
							<td><?php echo $status;?></td>
							<?php }else if($products['order_status'] == 'A'){ ?>
							<td><a href="<?php echo base_url('dptchorder/'.$products['orid']);?>"><?php echo $status;?></a></td>
							<?php }else if($products['order_status'] == 'D'){ ?>
							<td><a href="<?php echo base_url('cmpltorder/'.$products['orid']);?>"><?php echo $status;?></a></td>
							<?php }else{ ?>
							<td><a href="<?php echo base_url('approveorder/'.$products['orid']);?>"><?php echo $status;?></a></td>
							<?php } ?>
						</tr>
					<?php }?>
					</tbody>
                </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs"><b>Version</b> 1.0.0</div>
        <strong><p>© 2016 Shoppy. All Rights Reserved </p></strong>
      </footer>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
   
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>