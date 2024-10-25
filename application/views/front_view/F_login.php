<!-- page title Start -->
<script type="text/javascript">
$(document).ready(function(){
    $("#about").removeClass("active");
    $("#home").removeClass("active");
    $("#course").removeClass("active");
    $("#placement").removeClass("active");
    $("#studmnu").removeClass("active");
    $("#franmnu").addClass("active");
    $("#brandmnu").removeClass("active");
    $("#galmnu").removeClass("active");
    $("#cntmnu").removeClass("active");
 });   
</script>
<div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
    <div class="container">
      <div class="lms_title">Franchisee Login</div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="index-2.html">Home</a></li>
          <li class="active">Franchisee Login</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- page title end --> 

<!--main container start-->
<div class="container">
  
  <div class="row">
    <div class="col-lg-12">
      <h2 style="margin-top:20px; text-align:center;">Franchisee Login</h2>
    </div>
  
  <div class="col-lg-3 col-md-3">
  </div>
  
  
  
  
    <div class="col-lg-6 col-md-6">
          <div class="lms_login_window lms_login_light">
            <h3>Sign In</h3>
            <div class="lms_login_body">
              <form id="lform" action="<?php echo base_url();?>index.php/login_cont/Franchisee_Login" method="post">
                <div class="form-group">
                  
                  <input type="text" class="form-control" id="nm" name="name" placeholder="User Name" required title="Please Enter Your User Id">
                </div>
                <div class="form-group">
                  
                  <input type="password" class="form-control" id="pass" name="Password" placeholder="Password" required title="Please Enter Your Password">
                </div>
               
                 <button type="submit" class="btn btn-default">Submit</button>
                    
                  <a href="javascript:;" class="pull-right">Forget Password?</a>
                  <br />
                  <?php if(isset($message)){ ?>
                      <span style="float:left; color:#FF0000;"><?php echo $message; ?> </span>
                  <?php } ?>
                  </li>
              </form>
               
            </div>
          </div>
        </div>
    
    
    
    <div class="col-lg-3 col-md-3">
  </div>
  </div>
</div>

<!--main container end-->