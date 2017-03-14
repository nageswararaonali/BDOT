<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Pages</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pages List</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Pages - <a href="<?php echo base_url('admin/page_create');?>">Add Page</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>							
							<th>Page Name</th>
							<th>Page Content</th>							
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($viewpages as $page) { ?>
						<tr>
							<td><?php echo $page['page_title']; ?></td>
							<td><?php echo mysql_real_escape_string(substr($page['content'],0,300)); ?></td>														
							<td><a href="<?php echo base_url('admin/pagedetails/'.$page['cid']);?>"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a></td>
							<td><a onclick="return checkDelete()" href="<?php echo base_url('admin/deletepage/'.$page['cid']);?>"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a></td>
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
	function checkDelete(){
	  return confirm('Are you sure to delete?');
	}
    </script>
  </body>
</html>