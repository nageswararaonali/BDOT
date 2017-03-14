<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Create Course</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Courses</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Course</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo base_url('Coursescontroller/courseAddAction');?>" method="post" id="addproduct">
                  <div class="box-body">
				  
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label">Course Category</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="category_name" id="category_name" onchange="dispSubCategory(this.value);">
						<option value="">SELECT CATEGORY</option>
						<?php foreach($course_categories as $ccategories) {?>
						<option value="<?php echo $ccategories['cat_id'];?>"><?php echo $ccategories['category_name'];?></option>
						<?php }?>
						</select>
                      </div>
                    </div>
					
					<div id="subcategories"></div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Code</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="course_code" id="course_code" title="Enter Course Code!" required>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Name</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="course_name" id="course_name" title="Enter Course Name!" required>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Description</label>
                      <div class="col-sm-6">
                        <textarea class="form-control" name="course_description" id="course_description" title="Enter Course Description!" required></textarea>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Features</label>
                      <div class="col-sm-6">
                        <textarea class="form-control" name="course_features" id="course_features" title="Enter Course Features!" required></textarea>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Duration</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="course_duration" id="course_duration" title="Enter Course Duration!" required>
						<span>Hint: Enter the Duration like 40 Hours</span>
                      </div>
					  
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Price</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="course_price" id="course_price" title="Enter Course Prices!" required>
						<span>Hint: Enter the Prices seperated by "|" symbol- INDIA | US | UK</span>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Start Date</label>
                      <div class="col-sm-6">
                        <input type="date" class="form-control" name="course_start_date" id="course_start_date" title="Enter Course Start Date!" required>
						<span>Hint: Enter the course start date</span>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course End Date</label>
                      <div class="col-sm-6">
                        <input type="date" class="form-control" name="course_end_date" id="course_end_date" title="Enter Course Start Date!!" required>
						<span>Hint: Enter the course end date</span>
                      </div>
                    </div>

                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" class="btn btn-default" onclick="window.location='<?php echo base_url('courses')?>'">Cancel</button>
                    <input type="submit" class="btn btn-info pull-right" value="Save" name="save">
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      