<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Categories</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Categories</li>
          </ol>
        </section>
<?php if($this->session->flashdata('message') != '') { ?>
<div class="alert alert-info"><?php echo $this->session->flashdata('message');?></div>
<?php }?>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Course Categories - <a href="javascript:void(0);" data-toggle="modal" data-target="#addCategoryModal">Add Category</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
						<th style="width: 10px">#</th>
						<th>Category Name</th>
						<th>Category Ref ID</th>				
						<th>Edit</th>
						<th>Delete</th>
                    </tr>
					<?php $i=1; foreach($course_categories as $ccategories) {?>
                    <tr>
                      <td><?php echo $i;?>.</td>
                      <td><?php echo $ccategories['category_name'];?></td>
					  <td><?php echo $ccategories['category_ref_id'];?></td>
                      <td>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#editCategoryModal" data-id="<?php echo $ccategories['cat_id']?>">
						<i class="fa fa-pencil" aria-hidden="true"></i></a>
                      </td>
                      <td><a href="<?php echo base_url('admin/deleteCategory/'.$ccategories['cat_id']);?>" onclick="return checkDelete()">
					<i class="fa fa-trash-o" aria-hidden="true"></i></a>	</td>
                    </tr>
                    <?php $i++;}?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
           <!-- <div class="col-md-6">
              
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Course SubCategories - <a href="javascript:void(0);" data-toggle="modal" data-target="#addSubCategoryModal">Add SubCategory</a></h3>
                </div>
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
						<th style="width: 10px">#</th>
						<th>Sub Category Name</th>
						<th>Category</th>				
						<th>Edit</th>
						<th>Delete</th>
                    </tr>
					<?php $j=1; foreach($sub_course_categories as $sccategories) {?>
                    <tr>
						<td><?php echo $j;?>.</td>
						<td><?php echo $sccategories['sub_category_name'];?></td>
						<td><?php echo $sccategories['category_name'];?></td>
						<td><a href="javascript:void(0);" data-toggle="modal" data-target="#editSubCategoryModal" data-id="<?php echo $sccategories['scid'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
						<td><a href="<?php echo base_url('deleteSubCategory/'.$sccategories['scid']);?>" onclick="return checkDelete();"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php $j++;}?>
                  </table>
                </div>
              </div>
            </div>-->
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
		<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong><p>© 2017 Bigdata. All Rights Reserved </p></strong>
      </footer>
    </div><!-- ./wrapper -->
<!-- Products Modal -->
<div id="addCategoryModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Category</h4>
      </div>
      <div class="modal-body">
		<form action="<?php echo base_url('Coursescategorycontroller/categoryAddAction');?>" method="post" id="addcategory" style="padding:0px;">
		<fieldset>
		<section>
			<label class="input" style="width:50%;">
			Category Name:
				<input type="text" class="form-control" name="category_name" id="category_name" title="Enter Category Name" required>
			</label>
		</section>
		<section>
			<label class="input" style="width:50%;">
			Category Ref ID:
				<input type="text" class="form-control" name="category_ref_id" id="category_ref_id" title="Enter Category Reference Id" required>
			</label>
		</section>
		
		</fieldset>
		<footer>
		<button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
		</footer>		
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="editCategoryModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Category</h4>
      </div>
      <div class="modal-body">
		<form action="<?php echo base_url('Coursescategorycontroller/categoryeditAction');?>" method="post" id="editcategory" style="padding:0px;">
		<fieldset>
		<section>
			<label class="input" style="width:50%;">
			Category Name:
				<input type="text" class="form-control" name="category_name1" id="category_name1" title="Enter Category Name" required>
			</label>
		</section>
		<section>
			<label class="input" style="width:50%;">
			Category Ref ID:
				<input type="text" class="form-control" name="category_ref_id1" id="category_ref_id1" title="Enter Category Reference Id" required>
			</label>
		</section>
		
		</fieldset>
		<footer>
		<input type="hidden" name="category_ids" id="category_ids" />
		<button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
		</footer>		
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="addSubCategoryModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New SubCategory</h4>
      </div>
      <div class="modal-body">
		<form action="<?php echo base_url('Coursescategorycontroller/subcategoryAddAction');?>" method="post" id="addsubcategory" style="padding:0px;">
		<fieldset>
		<section>
			<label class="input" style="width:50%;">
			Category Name:
				<select class="form-control" name="category_name" id="category_name" title="Select Category Name" required>
				<option value="">Select</option>
				<?php foreach($course_categories as $categories) {?>
				<option value="<?php echo $categories['cat_id'];?>"><?php echo $categories['category_name'];?></option>
				<?php }?>
				</select>
			</label>
		</section>
		
		<section>
			<label class="input" style="width:50%;">
			Sub Category Name:
				<input type="text" class="form-control" name="sub_category_name" id="sub_category_name" title="Enter Sub-Category Name" required>
			</label>
		</section>
		
		</fieldset>
		<footer>
		<button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
		</footer>		
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="editSubCategoryModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit SubCategory</h4>
      </div>
      <div class="modal-body">
		<form action="<?php echo base_url('Coursescategorycontroller/subcategoryeditAction');?>" method="post" id="editsubcategory" style="padding:0px;">
		<fieldset>
		<section>
			<label class="input" style="width:50%;">
			Category Name:
				<select class="form-control" name="category_name2" id="category_name2" title="Select Category Name" required>
				<option value="">Select</option>
				<?php foreach($course_categories as $categories) {?>
				<option value="<?php echo $categories['cat_id'];?>"><?php echo $categories['category_name'];?></option>
				<?php }?>
				</select>
			</label>
		</section>
		
		<section>
			<label class="input" style="width:50%;">
			Sub Category Name:
				<input type="text" class="form-control" name="sub_category_name2" id="sub_category_name2" title="Enter Sub-Category Name" required>
			</label>
		</section>
		
		</fieldset>
		<footer>
		 <input type="hidden" name="sub_category_ids" id="sub_category_ids" />
		<button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
		</footer>		
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
	<script src="<?php echo base_url();?>assets/dist/js/jquery.validate.min.js"></script>
<script>
	$(document).ready(function(){
		$("#addcategory").validate();
		$("#editcategory").validate();
		$("#addsubcategory").validate();
		$("#editsubcategory").validate();
	});
</script>

<script type="text/javascript">
$('#editCategoryModal').on('show.bs.modal', function(e) {
    var catId = $(e.relatedTarget).data('id');
	$.ajax({
		url: '<?php echo base_url('Coursescategorycontroller/selCategory');?>',
		type: 'post',
		data: 'ctid='+catId,
		success: function(result) {
			var vls = result.split('#');
			$('#category_name1').val(vls[0]);
			$('#category_ref_id1').val(vls[1]);
			$('#category_ids').val(catId);
		}
	});
});

$('#editSubCategoryModal').on('show.bs.modal', function(e) {
    var subcatid = $(e.relatedTarget).data('id');
	$.ajax({
		url: 'Coursescategorycontroller/selSubCategory',
		type: 'post',
		data: 'subcatid='+subcatid,
		success: function(result) {
			var vls1 = result.split('#');
			$('#sub_category_name2').val(vls1[0]);
			$('#category_name2').val(vls1[1]);
			$('#sub_category_ids').val(subcatid);
		}
	});
});

function checkDelete(){
    return confirm('Are you sure to delete?');
}
</script>
  </body>
</html>