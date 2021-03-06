<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ckfinder/ckfinder.js"></script>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Edit Page</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pages</li>
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
                  <h3 class="box-title">Update Page</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo base_url('Pagescontroller/pageEditAction');?>" method="post" id="editproduct">
                  <div class="box-body">
				  
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Page Title</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="page_title" id="page_title" value="<?php echo $vwcourse[0]['page_title'];?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-4 control-label">Course Description</label>
                      <div class="col-sm-6">
                        <!--<textarea class="form-control" name="page_description" id="page_description"><?php echo $vwcourse[0]['content'];?></textarea>-->
						<?php echo $this->ckeditor->editor("page_description",$vwcourse[0]['content']); ?>
                      </div>
                    </div>
					
                  </div><!-- /.box-body -->
                  <div class="box-footer">
					<input type="hidden" name="pid" value="<?php echo $vwcourse[0]['cid'];?>" />
          
                    <button type="button" class="btn btn-default" onclick="window.location='<?php echo base_url('pages')?>'">Cancel</button>
                    <input type="submit" class="btn btn-info pull-right" value="Update" name="update">
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     