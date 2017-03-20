<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IndexIndia</title>
	<link href="<?php echo base_url('media/css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('media/css/card.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('media/css/style.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('media/css/header.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('media/css/star-rating.css'); ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Sansita" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('media/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('media/js/star-rating.js')?>"></script>
    <script type="text/javascript">
		$(document).ready(function () {
              $(".ngo").hide();
        });
	</script>
	<script type="text/javascript" src="<?php echo base_url('media/js/state.js')?>"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHftURWH4wKE_x4T1V7BTld2tUdwZSj0U&sensor=false&libraries=places"
  type="text/javascript"></script>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="<?php echo base_url('media/js/locationpicker.jquery.js')?>"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:600|Roboto" rel="stylesheet">
	<style type="text/css">
    	.btn-default1{
    		color: #333 !important;
    		background-color: #fff !important;
    		border-color: #ccc !important;
    	}
    	.btn-danger{
    		color: #fff;
    		background-color: #d9534f;
    		border-color: #d43f3a;}
    </style>							<!--font-->
</head>
<body>
<!-- navbar start-->
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?php echo base_url(""); ?>" style="font-family: 'Sansita', sans-serif;">Indexindia</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	      	<?php if ($this->session->userdata('fname')){ ?>
						<li><a href="<?php echo base_url(""); ?>">Home</a></li>
	      	<?php
	      	  if(($this->session->userdata('type'))=='user'){?>
	      	<li style="text-transform: capitalize;"><a href="<?php echo base_url("index.php/profile"); ?>"><?php echo $this->session->userdata('fname'); ?></a></li>
	      	 <?php
	      	  } elseif(($this->session->userdata('type'))=='ngo'){?>
	      	  <li style="text-transform: capitalize;"><a href="<?php echo base_url("index.php/Organisation"); ?>"><?php echo $this->session->userdata('fname'); ?></a></li>
	      	  <?php }?>
	        <li><a href="<?php echo base_url("index.php/analysis"); ?>">Index</a></li>
	      	<li><a href="<?php echo base_url("index.php/profile/post"); ?>">Upload</a></li>

			<!--notification
			<li class="dropdown">
				<a  data-target="#" href="/page.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="dLabel"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></a>
			  <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">
				<div class="notification-heading"><h4 class="menu-title">Notifications</h4><h4 class="menu-title pull-right">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4>
				</div>
				<li class="divider"></li>
			   <div class="notifications-wrapper">
				 <a class="content" href="#">
				   <div class="notification-item">
					<h4 class="item-title">Evaluation Deadline 1 · day ago</h4>
					<p class="item-info">Marketing 101, Video Assignment</p>
				  </div>
				</a>
				 <a class="content" href="#">
				  <div class="notification-item">
					<h4 class="item-title">Evaluation Deadline 1 · day ago</h4>
					<p class="item-info">Marketing 101, Video Assignment</p>
				  </div>
				</a>
				 <a class="content" href="#">
				  <div class="notification-item">
					<h4 class="item-title">Evaluation Deadline 1 • day ago</h4>
					<p class="item-info">Marketing 101, Video Assignment</p>
				  </div>
				</a>
			   </div>
				<li class="divider"></li>
				<div class="notification-footer"><h4 class="menu-title">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4></div>
			  </ul>
			</li>-->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-object-align-left" aria-hidden="true"></span><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo base_url("index.php/profile"); ?>">Profile</a></li>
	            <li><a href="<?php echo base_url("index.php/profile/edit"); ?>">Edit Profile</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="<?php echo base_url("index.php/home/logout"); ?>" style="background-color:#843787;color:white;">Logout</a></li>
	          </ul>
	        </li>
	        <?php } else { ?>
	        <li><a href="<?php echo base_url(""); ?>">Home</a></li>
	       	<li><a href="<?php echo base_url("index.php/analysis"); ?>">Index</a></li>
	        <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
	        <li><a href="<?php echo base_url("index.php/signup"); ?>">Signup</a></li>
	        <?php } ?>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
<!-- navbar end-->

<!--login-->


	<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog " role="document">
	    <div class="modal-content col-sm-12 col-md-8 col-md-offset-2 " style="margin-top:30%;">
	      <div class="modal-body ">
	        <div class="form-horizontal">
	      		<?php $attributes = array("name" => "loginform");
				echo form_open("login/index", $attributes);?>
				<h4 style="font-family: 'Open Sans', sans-serif;font-size: 18px;" class="text-center">LOGIN</h4>
				<hr>
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-3 control-label" >Email</label>
				    <div class="col-sm-9">
				      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-3 control-label" >Password</label>
				    <div class="col-sm-9">
				      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="pass">
				    </div>
				  </div>
				  <div class="form-group">
				    <div >
				      <button type="submit" class="btn btn-default" style="background-color:#f0b637;color:white;border:0px;float:right;width:30%;margin-right:15px;">login</button>
				    </div>
				  </div>
				  <?php echo form_close(); ?>
				  <?php echo $this->session->flashdata('msg'); ?>
				  <p class="text-center">Don't have an account? <a href="<?php echo base_url(); ?>index.php/signup">Sign up!</a></p>
					<p class="text-center"><a href="<?php echo base_url(); ?>index.php/forget">Forgot Password</a></p>
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>
