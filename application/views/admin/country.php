<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Countries</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Countries</li>
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
                  <h3 class="box-title">Course Countries - <a href="javascript:void(0);" data-toggle="modal" data-target="#addCountryModal">Add Country</a></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
						<th style="width: 10px">#</th>
						<th>Country Name</th>
						<th>Country Ref ID</th>				
						<th>Edit</th>
						<th>Delete</th>
                    </tr>
					<?php $i=1; foreach($course_countries as $country) {?>
                    <tr>
                      <td><?php echo $i;?>.</td>
                      <td><?php echo $country['country_name'];?></td>
					  <td><?php echo $country['country_ref_id'];?></td>
                      <td>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#editCountryModal" data-id="<?php echo $country['cun_id']?>">
						<i class="fa fa-pencil" aria-hidden="true"></i></a>
                      </td>
                      <td><a href="<?php echo base_url('admin/deleteCountry/'.$country['cun_id']);?>" onclick="return checkDelete()">
					<i class="fa fa-trash-o" aria-hidden="true"></i></a>	</td>
                    </tr>
                    <?php $i++;}?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
            
          </div><!-- /.row -->
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
<div id="addCountryModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Category</h4>
      </div>
      <div class="modal-body">
		<form action="<?php echo base_url('Coursescategorycontroller/countryAddAction');?>" method="post" id="addcategory" style="padding:0px;">
		<fieldset>
		<section>
			<label class="input" style="width:50%;">
			Country Name:
				<input type="text" class="form-control" name="country_name" id="country_name" title="Enter Country Name" required>
			</label>
		</section>
		<section>
			<label class="input" style="width:50%;">
			Country Ref ID:
				<input type="text" class="form-control" name="country_ref_id" id="category_ref_id" title="Enter Country Reference Id" required>
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

<div id="editCountryModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Country</h4>
      </div>
      <div class="modal-body">
		<form action="<?php echo base_url('Coursescategorycontroller/countryeditAction');?>" method="post" id="editcountry" style="padding:0px;">
		<fieldset>
		<section>
			<label class="input" style="width:50%;">
			Country Name:
				<input type="text" class="form-control" name="country_name1" id="country_name1" title="Enter Country Name" required>
			</label>
		</section>
		<section>
			<label class="input" style="width:50%;">
			Country Ref ID:
				<input type="text" class="form-control" name="country_ref_id1" id="country_ref_id1" title="Enter Country Reference Id" required>
			</label>
		</section>
		
		</fieldset>
		<footer>
		<input type="hidden" name="country_ids" id="country_ids" />
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
		$("#addcountry").validate();
		$("#editcountry").validate();
	});
</script>

<script type="text/javascript">
$('#editCountryModal').on('show.bs.modal', function(e) {
    var catId = $(e.relatedTarget).data('id');
	$.ajax({
		url: '<?php echo base_url('Coursescategorycontroller/selCountry');?>',
		type: 'post',
		data: 'ctid='+catId,
		success: function(result) {
			var vls = result.split('#');
			$('#country_name1').val(vls[0]);
			$('#country_ref_id1').val(vls[1]);
			$('#country_ids').val(catId);
		}
	});
});

function checkDelete(){
    return confirm('Are you sure to delete?');
}
</script>
  </body>
</html>