<?php
error_reporting(0);
?>
<style>
#preview
{
color:#cc0000;
font-size:12px
}
.imgList 
{
max-height:150px;
margin-left:5px;
border:1px solid #dedede;
padding:4px;	
float:left;	
}
</style>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Course Gallery</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">courses</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Course Images</h3>
            </div>
            <div class="box-body">
				<?php
				$uploaddir = "assets/course_images/";
				$imagesArr = $this->mainModel->getuploadedImages($vwcourse[0]['id']);
				echo "<table>";
				if(count($imagesArr)>0) {
					foreach($imagesArr as $imgArr) {
						echo "<tr><td><img src='".base_url().$uploaddir.$imgArr['course_image']."' class='imgList'></td>";
						$img_type[] = $imgArr['image_type'];
						 ?>
						 <td><?php echo $imgArr['image_type']; ?></td>
						 <td><a href="<?php echo base_url('deletecourse');?>/<?php echo $imgArr['mdid']; ?>">Delete</a></td></tr>
						 <?php
					}
				}				
				echo "</table>";
				?>
				<div id="preview"></div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
		  
		            <!-- Default box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Upload Course Images</h3>
            </div>
			<?php if (!in_array("course_image", $img_type)): ?>
            <div class="box-body">
				<!--<form id="imageform" method="post" enctype="multipart/form-data" action="<?php echo base_url('Coursescontroller/photosAction');?>" style="clear:both">
				<div id="imageloadstatus" style="display:none">
				<img src="loader.gif" alt="Uploading...."/></div>
				<div id="imageloadbutton">
				<input type="file" name="photos[]" id="photoimg" multiple="true" />
				<input type="hidden" name="courseid" value="<?php echo $vwcourse[0]['id'];?>" />
				<input type="hidden" name="coursecode" value="<?php echo $vwcourse[0]['course_code'];?>" />
				</div>
				</form>-->
				
				<h3>Courses Page Image</h3>
				<form id="imageform" method="post" enctype="multipart/form-data" action="<?php echo base_url('Coursescontroller/photosAction');?>" style="clear:both">
				<div id="imageloadstatus" style="display:none">
				<img src="loader.gif" alt="Uploading...."/></div>
				<div id="imageloadbutton">
				<input type="file" name="course_image[]" id="photoimg"/>
				<input type="hidden" name="image_type" value="course_image" />
				<input type="hidden" name="courseid" value="<?php echo $vwcourse[0]['id'];?>" />
				<input type="hidden" name="coursecode" value="<?php echo $vwcourse[0]['course_code'];?>" />
				</div>
				</form>				
			</div>
			<?php endif; ?>
			<?php if (!in_array("course_home_image", $img_type)): ?>
			<div class="box-body">
			<h3>Home Page Course Image</h3>
				<form id="imageform1" method="post" enctype="multipart/form-data" action="<?php echo base_url('Coursescontroller/photosAction');?>" style="clear:both">
				<div id="imageloadstatus" style="display:none">
				<img src="loader.gif" alt="Uploading...."/></div>
				<div id="imageloadbutton">
				<input type="file" name="course_home_image[]" id="photoimg1"/>
				<input type="hidden" name="image_type" value="course_home_image" />
				<input type="hidden" name="courseid" value="<?php echo $vwcourse[0]['id'];?>" />
				<input type="hidden" name="coursecode" value="<?php echo $vwcourse[0]['course_code'];?>" />
				</div>
				</form>
			</div>
			<?php endif; ?>
			<?php if (!in_array("course_feature_image", $img_type)): ?>
			<div class="box-body">
			<h3>Home Page Featured Image</h3>
				<form id="imageform2" method="post" enctype="multipart/form-data" action="<?php echo base_url('Coursescontroller/photosAction');?>" style="clear:both">
				<div id="imageloadstatus" style="display:none">
				<img src="loader.gif" alt="Uploading...."/></div>
				<div id="imageloadbutton">
				<input type="file" name="course_feature_image[]" id="photoimg2"/>
				<input type="hidden" name="image_type" value="course_feature_image" />
				<input type="hidden" name="courseid" value="<?php echo $vwcourse[0]['id'];?>" />
				<input type="hidden" name="coursecode" value="<?php echo $vwcourse[0]['course_code'];?>" />
				</div>
				</form>
            </div><!-- /.box-body -->
			<?php endif; ?>
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs"><b>Version</b> 1.0.0</div>
        <strong><p>© 2017 Bigdata. All Rights Reserved </p></strong>
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
	<script src="<?php echo base_url();?>assets/dist/js/jquery.wallform.js"></script>
<script>
 $(document).ready(function() { 
		
            $('#photoimg').off('click').on('change', function(){ 
			           //$("#preview").html('');
			    
				$("#imageform").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
					
					console.log('ttest');
					$("#imageloadstatus").show();
					 $("#imageloadbutton").hide();
					 }, 
					success:function(){ 
				    console.log('test');
					 $("#imageloadstatus").hide();
					 $("#imageloadbutton").show();
					}, 
					error:function(){ 
					console.log('xtest');
					 $("#imageloadstatus").hide();
					$("#imageloadbutton").show();
					} }).submit();
					
		
			});
        }); 
</script>
<script>
 $(document).ready(function() { 
		
            $('#photoimg1').off('click').on('change', function(){ 
			           //$("#preview").html('');
			    
				$("#imageform1").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
					
					console.log('ttest');
					$("#imageloadstatus").show();
					 $("#imageloadbutton").hide();
					 }, 
					success:function(){ 
				    console.log('test');
					 $("#imageloadstatus").hide();
					 $("#imageloadbutton").show();
					}, 
					error:function(){ 
					console.log('xtest');
					 $("#imageloadstatus").hide();
					$("#imageloadbutton").show();
					} }).submit();
					
		
			});
        }); 
</script>
<script>
 $(document).ready(function() { 
		
            $('#photoimg2').off('click').on('change', function(){ 
			           //$("#preview").html('');
			    
				$("#imageform2").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
					
					console.log('ttest');
					$("#imageloadstatus").show();
					 $("#imageloadbutton").hide();
					 }, 
					success:function(){ 
				    console.log('test');
					 $("#imageloadstatus").hide();
					 $("#imageloadbutton").show();
					}, 
					error:function(){ 
					console.log('xtest');
					 $("#imageloadstatus").hide();
					$("#imageloadbutton").show();
					} }).submit();
					
		
			});
        }); 
</script>
  </body>
</html>