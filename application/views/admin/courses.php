<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Courses</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Courses List</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Courses - <a href="<?php echo base_url('admin/course_create');?>">Add Course</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Course Code</th>
							<th>Course Name</th>
							<th>Category Name</th>
							<th>Course Images</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($viewcourses as $courses) {?>
						<tr>
							<td><?php echo $courses['course_code'];?></td>
							<td><?php echo $courses['course_name'];?></td>
							<td><?php echo $courses['category_name'];?></td>
							<td><a href="<?php echo base_url('admin/coursegallery/'.$courses['id']);?>">Upload</a></td>
							<td><a href="<?php echo base_url('admin/coursedetails/'.$courses['id']);?>"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i></a></td>
							<td><a onclick="return checkDelete()" href="<?php echo base_url('admin/deletecourse/'.$courses['id']);?>"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></a></td>
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