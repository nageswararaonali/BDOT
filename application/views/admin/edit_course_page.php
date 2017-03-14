<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Edit Course</h1>
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
                  <h3 class="box-title">Update Course</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo base_url('Coursescontroller/courseEditAction');?>" method="post" id="editproduct">
                  <div class="box-body">
				  
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label">Course Category</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="category_name" id="category_name" onchange="dispSubCategory(this.value);">
						<option value="">SELECT CATEGORY</option>
						<?php 
						foreach($course_categories as $ccategories) {
							if($vwcourse[0]['category_id']==$ccategories['cat_id']) {
								$select = 'selected="selected"';
							} else {
								$select = '';
							}
						?>
						<option value="<?php echo $ccategories['cat_id'];?>" <?php echo $select;?>><?php echo $ccategories['category_name'];?></option>
						<?php }?>
						</select>
                      </div>
                    </div>
					
					<!--<div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label">Product Sub Category</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="sub_category_name" id="sub_category_name">
						<option value="">SELECT SUBCATEGORY</option>
						<?php 
						foreach($sub_course_categories as $sccategories) {
							if($vwcourse[0]['sub_category_id']==$sccategories['scid']) {
								$select2 = 'selected="selected"';
							} else {
								$select2 = '';
							}
						?>
						<option value="<?php echo $sccategories['scid'];?>" <?php echo $select2;?>><?php echo $sccategories['sub_category_name'];?></option>
						<?php }?>
						</select>
                      </div>
                    </div>-->
					<div id="subcategories"></div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Code</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="course_code" id="course_code" value="<?php echo $vwcourse[0]['course_code'];?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Name</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="course_name" id="course_name" value="<?php echo $vwcourse[0]['course_name'];?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Description</label>
                      <div class="col-sm-6">
                        <textarea class="form-control" name="course_description" id="course_description"><?php echo $vwcourse[0]['course_description'];?></textarea>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Features</label>
                      <div class="col-sm-6">
                        <textarea class="form-control" name="course_features" id="course_features"><?php echo $vwcourse[0]['course_features'];?></textarea>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Duration</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="course_duration" id="course_duration" value="<?php echo $vwcourse[0]['course_duration'];?>">
						<span>Hint: Enter the Duration like 40 Hours</span>
                      </div>
					  
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Price</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="course_price" id="course_price" value="<?php echo $vwcourse[0]['course_price'];?>">
						<span>Hint: Enter the Prices seperated by "|" symbol- INDIA | US | UK</span>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course End Date</label>
                      <div class="col-sm-6">
                        <input type="date" class="form-control" name="course_start_date" id="course_start_date" value="<?php echo $vwcourse[0]['course_start_date'];?>">
						<span>Hint: Enter the course start date</span>
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course End Date</label>
                      <div class="col-sm-6">
                        <input type="date" class="form-control" name="course_end_date" id="course_end_date" value="<?php echo $vwcourse[0]['course_end_date'];?>">
						<span>Hint: Enter the course end date</span>
                      </div>
                    </div>

                  </div><!-- /.box-body -->
                  <div class="box-footer">
					<input type="hidden" name="productid" value="<?php echo $vwcourse[0]['id'];?>" />
          <input type="hidden" name="old_wsub_categoryid" value="<?php echo $vwcourse[0]['sub_category_id'];?>" />
                    <button type="button" class="btn btn-default" onclick="window.location='<?php echo base_url('courses')?>'">Cancel</button>
                    <input type="submit" class="btn btn-info pull-right" value="Update" name="update">
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     