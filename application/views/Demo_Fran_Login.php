<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>College Of Computer Application | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="<?php echo base_url();?>Style/Login/images/favicon.gif"/>
<link rel="stylesheet" href="<?php echo base_url();?>Style/Login/css/style.css" media="screen"/><!-- MAIN STYLE CSS FILE -->
<link rel="stylesheet" href="<?php echo base_url();?>Style/Login/css/responsive.css" media="screen"/><!-- RESPONSIVE CSS FILE -->
<link rel="stylesheet" id="style-color" href="<?php echo base_url();?>Style/Login/css/colors/light-yellow-color.css" media="screen"/><!-- DEFAULT BLUE COLOR CSS FILE -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'><!-- ROBOTO FONT FROM GOOGLE CSS FILE -->
<link rel="stylesheet" href="<?php echo base_url();?>Style/Login/css/prettyPhoto.css" media="screen"/><!--PRETTYPHOTO CSS FILE -->
<link rel="stylesheet" href="<?php echo base_url();?>Style/Login/css/font-awesome/font-awesome.min.css" media="screen"/><!-- FONT AWESOME ICONS CSS FILE -->
 <script type="text/javascript" src="<?php echo base_url();?>Style/Login/js/jquery-1.10.2.min.js"></script>
 <script>
 $(document).ready(function(){
   $('#pass').focus(function(){
      $('#passer').hide();
   });
   $('#name').focus(function(){
      $('#nmer').hide();
   });
	
 });
 function validate()
 {
 
	   if($('#name').val()=="")
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
</head>
<body style="background:#003a6a;">

 <div class="container">
    <section class="one">
    <center>
       <div style="margin-top:10px;width:45%;">
       </div>
       <div style="border-radius: 7px; width: 60%; height: auto; box-shadow: 0px 3px 10px 3px #434a54; background:#fff; margin-top:30px;">
         <div style="background-color: #ccd0d9; border-top-left-radius: 7px; border-top-right-radius: 7px;padding: 9px;width: 97%;">  
            <span style="color: #4c93ef; font-family: roboto;font-size: 20px"> Demo Franchisee Login</span>
          </div> 
           <br/>
           <div id="form">
            <form class="simple-form" style="width:75%; margin-left:65px;" action="<?php echo base_url();?>index.php/login_cont/Demo_Franchisee_Login" onsubmit="return validate()" method="post">
            <ul>
              <li><span style="color:#F01C2B; display:none; float:left;font-size:14px;" id="nmer">Username is required field</span></li>
               <li>&nbsp;</li>
              <li><fieldset>
				<i class="icon-user tooltip left"></i>
                <input type="text" name="name" id="name" class="text requiredField" title="User Name" placeholder="Username" style="width:85%;"/> 
		     </fieldset></li>
             <li><span style="color:#F01C2B; display:none; float:left;font-size:14px;" id="passer">Password is required field</span></li>
             <li>&nbsp;</li>
              <li>
              <fieldset>
			   <i class="icon-user tooltip left"></i>
                <input type="password" name="pass" id="pass" class="text requiredField" title="Password" placeholder="Password" style="width:85%;"/> </fieldset></li>
                  <li>
                  <?php if(isset($message)){ ?>
                  <span style="float:left; color:#FF0000;"><?php echo $message; ?> </span>
                  <?php } ?>
                  </li>
                  <li>
              <fieldset style="border:none;">
                   <input type="submit" class="button big grey round" value="Login" style="margin-bottom:20px; float:left;">
                  
               </fieldset>
              </li>
        </ul>        

            </form>
            </div>
             <div class="clear"></div>
       </div>
    </center>		
	</section>
    </div>
    
</body>
</html>
