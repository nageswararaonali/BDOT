<div class="copyrights">
	 <p>© 2016 Shoppy. All Rights Reserved </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
			<a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
		        <li id="menu-home" ><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
		        <li><a href="<?php echo base_url('productcategories');?>"><i class="fa fa-cogs"></i><span>Product Categories</span></a></li>
		        <li><a href="<?php echo base_url('products');?>"><i class="fa fa-map-marker"></i><span>Products</span></a></li>
		        <li id="menu-academico" ><a href="<?php echo base_url('productorders');?>"><i class="fa fa-file-text"></i><span>Orders</span></li>		        
		        <!-- <li><a href="charts.html"><i class="fa fa-bar-chart"></i><span>Charts</span></a></li> -->
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->

<!-- mother grid end here-->
</body>
</html> 