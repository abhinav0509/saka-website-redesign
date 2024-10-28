<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAKA INDIA | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="<?php echo base_url();?>uploads/Slider/logo.png"/>
<link rel="stylesheet" href="<?php echo base_url();?>Style/Login/css/style.css" media="screen"/><!-- MAIN STYLE CSS FILE -->
<link rel="stylesheet" href="<?php echo base_url();?>Style/Login/css/responsive.css" media="screen"/><!-- RESPONSIVE CSS FILE -->
<link rel="stylesheet" id="style-color" href="<?php echo base_url();?>Style/Login/css/colors/light-yellow-color.css" media="screen"/><!-- DEFAULT BLUE COLOR CSS FILE -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'><!-- ROBOTO FONT FROM GOOGLE CSS FILE -->
<link rel="stylesheet" href="<?php echo base_url();?>Style/Login/css/prettyPhoto.css" media="screen"/><!--PRETTYPHOTO CSS FILE -->
<link rel="stylesheet" href="<?php echo base_url();?>Style/Login/css/font-awesome/font-awesome.min.css" media="screen"/><!-- FONT AWESOME ICONS CSS FILE -->
 <script type="text/javascript" src="<?php echo base_url();?>Style/Login/js/jquery-1.10.2.min.js"></script>
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/adminlte.min.css">
 <script>
 $(document).ready(function(){
   $('#pass').focus(function(){
      $('#passer').hide();
   });
   $('#nm').focus(function(){
      $('#nmer').hide();
   });
	
 });
 function validate()
 {
 
	   if($('#nm').val()=="")
	   {
         $('#nmer').show();
		 return false;
	   }
	   if($('#pass').val()=="")
	   {
	     $('#passer').show();
		 return false;
	   }
	   return true;
	
 }
 </script>

 <style>

form.simple-form select {
    background: #ffffff none repeat scroll 0 0;
    border: 1px solid #aab2bd;
    color: #888;
    display: block;
    font-family: "Roboto",Arial,Verdana;
    font-size: 12px;
    margin: 0;
    max-width: 100%;
    outline: medium none;
    height: 30px;
    float:left;
}
 </style>
</head>
<body style="background-image: url('<?php echo base_url();?>uploads/Slider/test.jpg');">

 <div class="container">
    <section class="one">
    <center>
    <div class="login-box" style="margin-top: 50px;">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <img src="<?php echo base_url(); ?>uploads/Slider/logo.png" style="height:80px; width:200px;">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo base_url();?>index.php/login_cont/check_login" onsubmit="return validate()" method="post">
      <div class="input-group mb-3">
                  <fieldset style="border:none;">
                   <select class="form-control" name="user_type" style="width:100%;" >
                          <option value="">Select User Type</option>
                              <option>Admin</option>
                              <option>Employee</option>
							                <!-- <option>Exam</option> -->
                    </select>
                  </fieldset>
                  </div>   
        <div class="input-group mb-3">
        <input type="text" name="name" id="nm" class="text requiredField" title="User Name" placeholder="Username" style="width:85%;"/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
         <input type="password" name="pass" id="pass" class="text requiredField" title="Password" placeholder="Password" style="width:85%;"/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>            
          <!-- /.col -->
          <div class="col-4">
          <input type="submit" class="button big grey round" value="Login" style="margin-bottom:20px; float:left;">
          </div>
          <!-- /.col -->
        </div>
      </form>    
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->	
</center>
	</section>
    </div>
    <script src="<?php echo base_url();?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist/js/adminlte.min.js"></script>
</body>
</html>
