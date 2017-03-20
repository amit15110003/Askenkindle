<!-- Container fed-->
	<div class="container-fluid">
		<div class="row" style="padding-top: 15%;">
			<div class="col-md-4 col-md-offset-4 " style="">
				<div class="row">
				<ul class="nav nav-tabs">
					<li  class="btn btn-primary col-md-12 text-center" id="user" style="border-radius:5px 0 0 0px;padding:2%;font-family: 'Open Sans', sans-serif;font-size: 16px;background-color:#207d4b;color:white;border:0px;">User</li>
					</ul>
				</div>
		   	</div>
				<div class="col-md-4 col-md-offset-4 user" style="padding-bottom: 2%;padding-top: 1%;background-color: #ffffff; border-radius:0 0 5px 5px; ">
		   		<h4 style="font-family: 'Open Sans', sans-serif;font-size: 18px;" class="text-center">USER SIGNUP</h4>
					<hr>
		   		<?php $attributes = array("name" => "loginform");
				echo form_open("signup", $attributes);?>
		   		  <div class="col-md-6">
		   		  <div class="form-group ">
				    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="First Name" name="fname">
				  </div>
				  </div>
				  <div class="col-md-6">
				  <div class="form-group ">
				    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Last Name" name="lname">
				  </div>
				  </div>
				  <div class="col-md-12">
				  <div class="form-group">
				    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
				  </div>
				  <div class="form-group">
				    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
				  </div>
				  <button type="submit" class="btn btn-default" style="background-color:#207d4b;color:white;border:0px;float:right;width:30%;">Submit</button>
				  </div>
				  
				<?php echo $this->session->flashdata('msg'); ?>
				<?php echo form_close(); ?>

		   	</div>

		   	
		</div>
	</div>
<!-- Container fed end-->

</body>
</html>
