<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bigdata Center</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>assets/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>assets/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>assets/img/apple-touch-icon-152x152.png" />
    <!-- owl carousel css -->

    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	
    <style>
       .box-simple p{
	   
	   font-size:18px;
	   }
	   #copyright {
	   position:fixed;
	   left:0px;
	   bottom:0px;
	   height:30px;
	   width:100%;
	   background:#373b47; 
      }

  @media (min-width:960px){.video {
    height:447px;
  }
  }
  @media (min-width:768px){
  .list-inline>li {
    display: inline-block;
    padding-right: 31px !important;
    padding-left: 20px !important
    }
	.list-font{
	font-size:20px;
	}
	}
   
       .homepage-hero-module {
  border-right: none;
  border-left: none;
  position: relative;
}
.no-video .video-container video,
.touch .video-container video {
  display: none;
}
.no-video .video-container .poster,
.touch .video-container .poster {
  display: block;
}
.video-container {
  position: relative;
  bottom: 0%;
  left: 0%;
  height:450px;
  width: 100%;
  overflow: hidden;
  background: #000;
}
.video-container .poster img {
  width: 100%;
  bottom: 0;
  position: absolute;
}
.video-container .filter {
  z-index: 100;
  position: absolute;
  background: rgba(0, 0, 0, 0.4);
  width: 100%;
}
.video-container .title-container {
  z-index: 1000;
  position: absolute;
  top: 15%;
  width: 100%;
  text-align: center;
  color: #fff;
}
.video-container .description .inner {
  font-size: 1em;
  width: 45%;
  margin: 0 auto;
}
.video-container .link {
  position: absolute;
  bottom: 3em;
  width: 100%;
  text-align: center;
  z-index: 1001;
  font-size: 2em;
  color: #fff;
}
.video-container .link a {
  color: #fff;
}
.video-container video {
  position: absolute;
  z-index: 0;
  bottom: 0;
}
.video-container video.fillWidth {
  width: 100%;
}
    
	   #navigation-bar {
    position: relative;
    height: 60px;
    padding-left: 60px;
}
#search {
    position: relative;
    float: left;
    width: 48px;
    height: 48px;
    margin-left: -60px;
}
#label {
    width: 48px;
    height: 48px;
    position: relative;
    z-index: 20;
}
#label label {
    display: block;
    width: 40px;
    height: 40px;
    background: url(../img/search1.png) 0 0;
    font-size: 0;
    color: rgba(0, 0, 0, 0);
    text-indent: -9999px;
    cursor: pointer;
    margin-top: 7px;
}
/*#label label {
    background: url("img/search1.png") -40px 0;
	background-repeat: repeat;
}*/
#label.active label {
    background: url("img/search1.png") -40px 0
	background-repeat: repeat;
}
#input {
    top: 7px;
    left: 48px;
    height: 40px;
    z-index: 5;
    position: absolute;
}
#input input {
    display: block;
    position: absolute;
    top: 0;
    width: 280px;
    height: 100%;
    margin: 0;
    padding: 0 10px;
    border: 1px #eee solid;
    /*background-color: #23688b;*/
    color: #fff;
    font-size: 15px;
    font-weight: 300;
    -webkit-backface-visibility: none;
    -moz-backface-visibility: none;
    -ms-backface-visibility: none;
    backface-visibility: none;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    -webkit-transition: left 0;
    -moz-transition: left 0;
    -ms-transition: left 0;
    -o-transition: left 0;
    transition: left 0;
}
#input input:focus {
    outline: none
}
#input.focus {
    z-index: 20
}
#input.focus input {
    left: 0;
    -webkit-transition: left 0.3s;
    -moz-transition: left 0.3s;
    -ms-transition: left 0.3s;
    -o-transition: left 0.3s;
    transition: left 0.3s;
	margin-top:3px;
}
nav {
    width: 100%;
    float: left;
    padding-left: 10px;
    position: relative;
    z-index: 10;
}
nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
nav li {
    display: inline-block;
    height: 60px;
    line-height: 60px;
    font-size: 24px;
    font-family: "Oswald", sans-serif;
    font-weight: 300;
    text-transform: uppercase;
}
nav a {
    display: block;
    padding: 0 15px;
    color: #c8c8c8;
}
nav a:hover {
    color: #3296c8
}
	
	   .clients
{
  filter: gray; /* IE6-9 */
  -webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
   -webkit-transition: all .5s ease;
  -moz-transition: all .5s ease;
  -o-transition: all .5s ease;
  -ms-transition: all .5s ease;
  transition: all .5s ease;
  cursor:pointer;
}


.clients:hover
{
  filter: none; /* IE6-9 */
  -webkit-filter: grayscale(0); /* Google Chrome, Safari 6+ & Opera 15+ */
}
	
	
	@media (min-width: 768px) {
  .ga-instructor a{font-size:12px;}
}
	
       

.sidebar-nav {
    padding: 9px 0;
}

.dropdown-menu .sub-menu {
    left: 100%;
    position: absolute;
    top: 0;
    visibility: hidden;
    margin-top: -1px;
}

.dropdown-menu li:hover .sub-menu {
    visibility: visible;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.nav-tabs .dropdown-menu, .nav-pills .dropdown-menu, .navbar .dropdown-menu {
    margin-top: 0;
}

.navbar .sub-menu:before {
    border-bottom: 7px solid transparent;
    border-left: none;
    border-right: 7px solid rgba(0, 0, 0, 0.2);
    border-top: 7px solid transparent;
    left: -7px;
    top: 10px;
}
.navbar .sub-menu:after {
    border-top: 6px solid transparent;
    border-left: none;
    border-right: 6px solid #fff;
    border-bottom: 6px solid transparent;
    left: 10px;
    top: 11px;
    left: -6px;
}
.text p{
margin-bottom: 0;
    color: #000;
    font-size: 15px;
    line-height: 27px;}
	hr.style1{
	border-top: 1px solid #8c8b8b;
}
hr.style1{
	border-top: 1px solid #8c8b8b;
	width:150px;
	margin-top:0px;
	margin-bottom:0px;
}
    .carousel-inner > .item > img, .carousel-inner > .item > a > img {
        display: block;
        height: 400px;
        min-width: 100%;
        width: 100%;
        max-width: 100%;
        line-height: 1;
    }

    </style>

</head>

<body>

    <div id="all">

        <header>

            <!-- *** TOP ***
_________________________________________________________ -->
            <div id="top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-10 contact">
                            <p class="top-offres">Get a Skill offer Buy one Get one Valid till Aug 15th / wait till Oct 10th</p>

                        </div>
                        <div class="col-xs-2">
                            <div class="social">
                                <a href="#" class="external facebook top-closebtn" data-animate-hover="pulse"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- *** TOP END *** -->

            <!-- *** NAVBAR ***
    _________________________________________________________ -->
     <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200" style="border-bottom: 1px solid #ddd;">

                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="home.html">
                                <img src="<?php echo base_url();?>assets/img/logo1.png" alt="Universal logo" class="hidden-xs hidden-sm logo-measure">
                                <img src="<?php echo base_url();?>assets/img/logo-small.png" alt="Universal logo" class="visible-xs visible-sm">
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>  
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse" id="navigation">
                           <div class="hidden-xs nav-bar2">
                           
                           <div class="dropdown">
                                <ul class="nav nav-pills">
                                <li class="dropdown">
                                  <a href="#" data-toggle="dropdown" style="text-transform: none;" class="dropdown-toggle"><span class="top-hdr"><i class="fa fa-th-list" aria-hidden="true"></i>Browse</span> </a>
								  <ul class="dropdown-menu" id="menu1" style="z-index: 10000;background: #0099cb;">
										 <li><a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Development<i class="fa fa-caret-right" aria-hidden="true" style="float:right; "></i>
										 <ul class="dropdown-menu sub-menu">
											<li><a href="#"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New Task</a></li>
										
										 <li><a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Overview</a></li>
										
										<li><a href="#"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New Task</a></li>
										
										 <li><a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Overview</a></li>
										
										<li><a href="#"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New Task</a></li>
										
										   </ul>
										 
										 
										 </a></li>
										 
										<li><a href="#"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Business<i class="fa fa-caret-right" aria-hidden="true" style="float:right;"></i>
										
										<ul class="dropdown-menu sub-menu">
											<li><a href="#"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New Task</a></li>
										
										 <li><a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Overview</a></li>
										
										<li><a href="#"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New Task</a></li>
										
										 <li><a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Overview</a></li>
										
										<li><a href="#"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New Task</a></li>
										
										   </ul>
										
										
										</a></li>
										
										 <li><a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> IT & Software</a></li>
										
										<li><a href="#"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Office productivity</a></li>
										
										 <li><a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Design<i class="fa fa-caret-right" aria-hidden="true" style="float:right;"></i></a></li>
										
										<li><a href="#"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Development</a></li>
										
										 <li><a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Overview</a></li>
										 
										<li><a href="#"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New Task</a></li>
										
										 <li><a href="#"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Overview</a></li>
										 
										<li><a href="#"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New Task</a></li>
										
										<li><a href="#">Categories</a></li>
									  </ul>
								  
                            </div>
							</div>
                          <div class="hidden-sm hidden-xs hidden-md search" style="margin-left: 308px; position:absolute; margin-top:4px;">
                              <form id="search" action="#" method="post">
								<div class="input-group" style="width: 450px; margin-top:0px;">
                                                <input type="text" class="form-control" placeholder="Search" style="border: 1px #eee solid;height: 36px;">
                                             <span class="input-group-btn">
                        
                                                <button type="submit" class="btn btn-template-main" style="background: none;color:#0099cb;width: 100%;border-bottom: 1px #eee solid;border-top: 1px #eee solid;border-right: 1px #eee solid;border-left: 1px #fff solid; height:36px;">
                                                   <i class="fa fa-search"></i>
                                                </button>
                            
                                             </span>
                                        </div>
							</form>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
							
                            <li class="ga-allcourses">
                              <a href="/all-courses">For Instructors</a>                            </li>
                            <li class="ga-allcourses">
                              <a href="Courses.html">Courses</a>                            </li>
							   <li class=" active" id="cart-line">
                                    <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown" style="padding: 5px 5px 0;font-size: 28px;"><img src="img/cart.png" alt=" " width="34" style="padding:3px;" /></a>
                                </li>
                                <li class="" id="header-line">
                                    <a href="Login.html">Log In</a>
                                </li>
								<li class="dropdown" id="header-line">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-bell" aria-hidden="true"></span></a>
							  <ul class="dropdown-menu" id="menu1" style="z-index: 10000;background: #0099cb;">
								<li><a href="http://www.fgruber.ch/" target="_blank">
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> User Settings</a></li>
								<li><a href="http://www.fgruber.ch/" target="_blank">
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> My Profile</a></li><li><a href="http://www.fgruber.ch/" target="_blank">
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> My Wishlist</a></li>
								<li><a href="http://www.fgruber.ch/" target="_blank">
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> User Settings</a></li>
								<li><a href="/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
							 </ul>
							</li>
								
								 <li class="dropdown" id="header-line">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
							  <ul class="dropdown-menu" id="menu1" style="z-index: 10000;background: #0099cb;">
								<li><a href="http://www.fgruber.ch/" target="_blank">
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> User Settings</a></li>
								<li><a href="http://www.fgruber.ch/" target="_blank">
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> My Profile</a></li><li><a href="http://www.fgruber.ch/" target="_blank">
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> My Wishlist</a></li>
								<li><a href="http://www.fgruber.ch/" target="_blank">
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> User Settings</a></li>
								<li><a href="/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
							 </ul>
							</li>
                                <!-- ========== FULL WIDTH MEGAMENU END ================== -->

                               
                            </ul>

                        </div>
                        <!--/.nav-collapse -->



                        <div class="collapse clearfix" id="search">

                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">

                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                </span>
                                </div>
                            </form>

                        </div>
                        <!--/.nav-collapse -->

                    </div>


                </div>
                <!-- /#navbar -->

            </div>

            <!-- *** NAVBAR END *** -->

        </header>

        <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- *** LOGIN MODAL END *** -->
        