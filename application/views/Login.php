<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Dashboard | Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url();?>assetss/css/app.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assetss/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assetss/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assetss/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assetss/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href="<?php echo base_url();?>assets/img/sakafavicon.ico"/>
</head>
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

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header d-flex justify-content-between">
                <h4>Login</h4>
                <img src="<?php echo base_url(); ?>uploads/Slider/logo.png" style="height:30px; width:80px">
              </div>
              <!-- <div class="card-header text-center">
                  <img src="<?php echo base_url(); ?>uploads/Slider/logo.png" style="height:80px; width:200px;">
               </div> -->
              <div class="card-body">
                <form action="<?php echo base_url();?>index.php/Login_cont/check_login" onsubmit="return validate()" method="post">
                 <div class="form-group">
                  <fieldset style="border:none;">
                   <select class="form-control" name="user_type" style="width:100%;" >
                          <option value="">Select User Type</option>
                              <option>Admin</option>
                               <option>Employee</option>
							                <!-- <option>Exam</option> -->
                     </select>
                    </fieldset>
                  </div>   
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="name" id="nm" class="form-control" placeholder="Username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                  <label for="password">Password</label>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" value="Login">              
                  </div>
                </form>
                <!-- <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div> -->
                <div class="row sm-gutters">             
                </div>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
               <a href="<?php echo base_url();?>">Back to website</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="<?php echo base_url();?>assetss/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?php echo base_url();?>assetss/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url();?>assetss/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>