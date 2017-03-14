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
		<form action="<?php echo base_url('Profilecontroller/categoryAddAction');?>" method="post" id="addcategory" style="padding:0px;">
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
				<input type="text" class="form-control" name="category_ref_id" id="category_ref_id" title="Enter Category Reference ID" required>
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
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Category</h4>
      </div>
      <div class="modal-body">
		<form action="<?php echo base_url('Profilecontroller/categoryeditAction');?>" method="post" id="editcategory" style="padding:0px;">
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
				<input type="text" class="form-control" name="category_ref_id1" id="category_ref_id1" title="Enter Category Reference ID" required>
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


<script type="text/javascript">
$('#editCategoryModal').on('show.bs.modal', function(e) {
    var catId = $(e.relatedTarget).data('id');
	$.ajax({
		url: 'Profilecontroller/selCategory',
		type: 'post',
		data: 'ctid='+catId,
		success: function(result) {
		alert(result);
			var vls = result.split('#');
			$('#category_name1').val(vls[0]);
			$('#category_ref_id1').val(vls[1]);
			$('#category_ids').val(catId);
		}
	});
});

function checkDelete(){
    return confirm('Are you sure to delete?');
}
</script>