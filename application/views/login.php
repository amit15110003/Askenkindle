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
          <li><a href="<?php echo base_url("index.php/profile/asked"); ?>">Asked</a></li>
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

    <!--content-->
    <div class="container" style="padding-top: 70px;">
      <div class="row">
        <div class="col-md-4 col-md-offset-4  col-xs-12" style="padding: 4%;">
          <?php if ($this->session->userdata('fname')){ ?>

          <div class="card" style=" background-color: #fff;margin-top: 4%;">
            <a href="<?php echo base_url("index.php/profile"); ?>" style="padding:5%; color:#bbbbbb" class="pull-right edt"><span class="glyphicon glyphicon-pencil" aria-hidden="true">edit</span></a>
              <div style="background-image: url(<?php echo base_url("media/image/profile.jpg"); ?>); height: 120px;">
              </div>
              <?php $details=$this->user->get_profile($this->session->userdata('uid'))?>
              <div class="center-block image-cropper" style="margin-top:-50px;width:100px;height:100px;">
                 <img src="<?php echo base_url(); ?>media/img/avtar/<?php echo $details[0]->profileimg; ?>" class="profie-pic">
              </div>
                <div class="card-block">
                  <p class="text-center" style="font-weight: 500; text-transform: capitalize;font-family: 'Roboto', sans-serif;font-size: 18px;margin:0;"><?php echo $this->session->userdata('fname'); ?> <?php echo $this->session->userdata('lname'); ?></p>
                  <p class="text-center" style="font-family: 'Roboto', sans-serif;font-style: italic;font-size: 14px;margin:0;"><?php echo $details[0]->email; ?></p>
                </div>
                <br>
          </div>
          <?php }
          else{ ?>
          <div class="card" style=" background-color: #FFF;margin-top: 4%;padding: 6% 6% 2% 6%; ">
                <div class="form-horizontal" style="margin:5%;">
                    <?php $attributes = array("name" => "loginform");
                echo form_open("Login", $attributes);?>
                <h4 style="font-family: 'Open Sans', sans-serif;font-size: 18px;" class="text-center">LOGIN</h4>
                <hr>
                  <div class="form-group">
                    <label for="inputEmail3" style="margin-left:1%;font-family: 'Open Sans', sans-serif;">Email</label>
                    <div>
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" style="margin-left:1%;font-family: 'Open Sans', sans-serif;">Password</label>
                    <div>
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="pass">
                    </div>
                  </div>
                  <div class="form-group">

                    <button type="submit" class="btn btn-default" style="background-color:#f0b637;color:white;border:0px;float:right;width:100%;">Login</button>
                  </div>
                  <?php echo $this->session->flashdata('msg'); ?>
                  <?php echo form_close(); ?>
                  <p class="text-center">Don't have an account? <a href="<?php echo base_url(); ?>index.php/signup">Sign up!</a></p>
                  <p class="text-center"><a href="<?php echo base_url(); ?>index.php/forget">Forgot Password</a></p>
                </div>
          </div>

                  <?php }?>
          </div>



        <div class="col-md-4">
            
        </div>

      </div>
    </div>
    
  </body>
</html>