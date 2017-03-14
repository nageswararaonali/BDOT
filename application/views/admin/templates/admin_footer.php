<footer class="main-footer">
        <div class="pull-right hidden-xs"><b>Version</b> 1.0.0</div>
        <strong><p>© 2017 Bigdata. All Rights Reserved </p></strong>
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
	<script src="<?php echo base_url();?>assets/dist/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#addproduct").validate();
		});
	</script>
	<script>
	function dispSubCategory(category) {
		if(category!='') {
			$.ajax({
				url: "<?php echo base_url('Productscontroller/getSubCategories');?>",
				type: "POST",
				data: "catid="+category,
				success: function(result) {
					$('#subcategories').html('');
					$('#subcategories').html(result);
				}
			});
		} else {
			alert("Please select Product Category");
		}
	}
	</script>
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