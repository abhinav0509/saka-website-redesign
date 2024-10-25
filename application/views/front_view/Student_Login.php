<!-- page title Start -->
<script type="text/javascript">
$(document).ready(function(){
    $("#about").removeClass("active");
    $("#home").removeClass("active");
    $("#course").removeClass("active");
    $("#placement").removeClass("active");
    $("#studmnu").addClass("active");
    $("#franmnu").removeClass("active");
    $("#brandmnu").removeClass("active");
    $("#galmnu").removeClass("active");
    $("#cntmnu").removeClass("active");
 });   
</script>
<div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
    <div class="container">
      <div class="lms_title">Student Login</div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="index-2.html">Home</a></li>
          <li class="active">Student Login</li>
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
      <h2 style="margin-top:20px; text-align:center;">Student Login</h2>
    </div>
  
  <div class="col-lg-3 col-md-3">
  </div>
  
  
  
  
    <div class="col-lg-6 col-md-6">
          <div class="lms_login_window lms_login_light">
            <h3>Sign In</h3>
            <div class="lms_login_body">
              <form role="form">
                <div class="form-group">
                  
                  <input type="text" class="form-control" id="login_email" placeholder="LoginID">
                </div>
                <div class="form-group">
                  
                  <input type="password" class="form-control" id="login_pass" placeholder="Password">
                </div>
                
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
          </div>
        </div>
    
  </div>
</div>

<!--main container end-->