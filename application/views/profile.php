<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ask|Enkindle</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('media/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('media/css/style.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('media/js/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('media/js/bootstrap.min.js')?>"></script>
  </head>
  <body style="background-color: #F5F5F5">
    
    <!--nav-->
    <nav class="navbar navbar-inverse navbar-fixed-top" >
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Ask|Enkindle</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <?php if ($this->session->userdata('uid')){ ?>
            <li><a href="<?php echo base_url(""); ?>">Home</a></li>
          <li style="text-transform: capitalize;"><a href="<?php echo base_url("index.php/profile"); ?>"><?php echo $this->session->userdata('fname'); ?></a></li>
          <li><a href="<?php echo base_url("index.php/ask"); ?>">Ask</a></li>
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
          <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
          <li><a href="<?php echo base_url("index.php/signup"); ?>">Signup</a></li>
          <?php } ?>
        </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
     <!--nav-end-->

    <!--content-->
    <div class="container-fluid" style="padding-top: 70px;">
      <div class="row">
        <div class="col-md-3 ">
          <div class="card" style=" background-color: #fff;margin-top: 4%;">
              <div style="background-image: url(<?php echo base_url("media/image/profile.jpg"); ?>); height: 120px;">
              </div>
            
            <div class="center-block image-cropper" style="margin-top:-50px;width:100px;height:100px;">
            <img src="<?php echo base_url(); ?>media/img/avtar/<?php echo $profileimg; ?>" alt="..." class='profie-pic'>
            </div>
          <div class="card-block">
              <br>
                  <button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target=".bs-example-modal-lg">Change</button>
                  <p class="text-center" style="font-weight: 500; text-transform: capitalize;font-family: 'Roboto', sans-serif;font-size: 18px;margin:0;"><?php echo $fname; ?> <?php echo $lname; ?></p>
                  <p class="text-center" style="font-family: 'Roboto', sans-serif;font-style: italic;font-size: 14px;margin:0;"><?php echo $email; ?></p>
                </div>
                <br>
                <button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target=".bs-example-modal-sm">Change Password</button>
          <br>


          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <?php $attributes = array("name" => "loginform");
                    echo form_open("profile/profileimg", $attributes);?>
                  <div class="row text-center">
                  <div class="col-md-3 ">
                      <div class="center-block image-cropper" style="margin-top:50px;width:100px;height:100px;">
                      <img src="<?php echo base_url(); ?>media/img/avtar/profile1.png" alt="..." class='profie-pic'>
                      </div>
                      <br>
                      <label class="radio-inline">
                        <input type="radio" name="img" id="inlineRadio1" value="profile1.png" required> Profile 1
                      </label>
                  </div>
                  <div class="col-md-3">
                      <div class="center-block image-cropper" style="margin-top:50px;width:100px;height:100px;">
                      <img src="<?php echo base_url(); ?>media/img/avtar/profile2.png" alt="..." class='profie-pic'>
                      </div>
                      <br>
                      <label class="radio-inline">
                        <input type="radio" name="img" id="inlineRadio2" value="profile2.png" required>Profile 2
                      </label>
                      </div>
                  <div class="col-md-3">
                      <div class="center-block image-cropper" style="margin-top:50px;width:100px;height:100px;">
                      <img src="<?php echo base_url(); ?>media/img/avtar/profile3.png" alt="..." class='profie-pic'>
                      </div>
                      <br>
                      <label class="radio-inline">
                        <input type="radio" name="img" id="inlineRadio3" value="profile3.png" required>Profile 3
                      </label>
                  </div>
                  <div class="col-md-3">
                      <div class="center-block image-cropper" style="margin-top:50px;width:100px;height:100px;">
                      <img src="<?php echo base_url(); ?>media/img/avtar/profile4.png" alt="..." class='profie-pic'>
                      </div>
                      <br>
                      <label class="radio-inline">
                        <input type="radio" name="img" id="inlineRadio4" value="profile4.png" required>Profile 4
                      </label>
                  </div>
                  <div class="col-md-3">
                      <div class="center-block image-cropper" style="margin-top:50px;width:100px;height:100px;">
                      <img src="<?php echo base_url(); ?>media/img/avtar/profile5.png" alt="..." class='profie-pic'>
                      </div>
                      <br>
                      <label class="radio-inline">
                        <input type="radio" name="img" id="inlineRadio5" value="profile5.png" required>Profile 5
                      </label>
                  </div>
                  <div class="col-md-3">
                      <div class="center-block image-cropper" style="margin-top:50px;width:100px;height:100px;">
                      <img src="<?php echo base_url(); ?>media/img/avtar/profile6.png" alt="..." class='profie-pic'>
                      </div>
                      <br>
                      <label class="radio-inline">
                        <input type="radio" name="img" id="inlineRadio6" value="profile6.png" required>Profile 6
                      </label>
                  </div>
                  <br>
                  <div class="col-md-3">
                  <br><br><br><br><br>
                      <button type="submit" class="btn btn-default" style="background-color:#207d4b;color:white;border:0px;">Submit</button>
                  </div>
                  </div>
                  <?php echo form_close(); ?>
                  <br><br>
                </div>
              </div>
            </div>

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
              <div class="modal-dialog modal-sm" role="document" style="margin-top:20%;">
                <div class="modal-content" style="padding-right: 5px;padding-left: 5px;">
                  <?php $attributes = array("name" => "password");
                    echo form_open("profile/password", $attributes);?>
                      <h5>Update Password</h5>
                      <div class="form-group" >
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
                      </div>
                      <button type="submit" class="btn btn-default" style="background-color:#207d4b;color:white;border:0px;float: right;">Submit</button>
                      <br><br>
                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>


          </div>
        </div>

        <div class="col-md-6" style="padding-top: 50px;">
          <div class="row" style="background-color: #fff;border-radius: 3px;padding-top: 50px;">
          <br>
                <?php $attributes = array("name" => "update");
            echo form_open("profile", $attributes);?>
                <div class="col-md-6">
                <div class="form-group ">
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="First Name" name="fname" value="<?php echo $fname; ?>">
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group ">
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Last Name" name="lname" value=" <?php echo $lname; ?>">
              </div>
              </div>
              <div class="col-md-12">
              <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value=" <?php echo $email; ?>" readonly>
              </div>
              <div class="form-group">
                <input type="number" class="form-control" id="exampleInputPassword2" placeholder="Contact Number" name="contact" value="<?php echo $contact; ?>">
              </div>
              <button type="submit" class="btn btn-default" style="background-color:#207d4b;color:white;border:0px;float:right;width:30%;">Submit</button>
              <br><br><br>
              </div>
            <?php echo form_close(); ?>
          </div>
          <?php echo $this->session->flashdata('msg'); ?>
        </div>


        <div class="col-md-3">
            <div class="card" style=" background-color: #FFF;margin-top: 4%;min-width:300px;max-width: 300px;padding: 6% 6% 2% 6%; ">
                <div class="form-horizontal" style="margin:5%;">
                <h4 style="font-family: 'Open Sans', sans-serif;font-size: 18px;" class="text-center">Search</h4>
                <hr>
                  <div class="form-group">

                    <button type="submit" class="btn btn-default" style="background-color:#f0b637;color:white;border:0px;float:right;width:100%;">Jee Main Expert</button>
                    <hr>
                    <button type="submit" class="btn btn-default" style="background-color:#f0b637;color:white;border:0px;float:right;width:100%;">Jee Advance Expert</button>
                  </div>
              </div>
        </div>
      </div>
    </div>




    
    
  </body>
</html>