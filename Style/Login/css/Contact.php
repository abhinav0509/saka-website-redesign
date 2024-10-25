<?php include("include/header.php");?>
<?php
  if(isset($_POST["save"])) 
  { 
   echo ContactSave($_POST,"contact_enq");
   }
?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="dist/js/jquery.validate.js"></script>
  <link rel="stylesheet" type="text/css" href="TopLevelImageDocument.css"> 
  <script src="dist/js/bootstrap.min.js"></script>
  <script src="dist/js/bootstrap-datepicker.js"></script>
  
<script>
 var j=jQuery.noConflict(); 
j(document).ready(function(){	
   j("#formVideo").validate({
  rules: {
  name: "required",
  email:"required",
  msg:"required",
  cont:"required",
 
   
  },
  messages: {
  name: "Please Enter Name",
  email:"Please Enter Emial id",
  msg:"Please Enter Message",
  cont:"Please Enter Contact",
 
   }
  });
 
});
</script>
       <div id="content">
          <div id="breadcrumb">
		<!-- breadcrumb starts-->
		<div class="container" >
			<div class="one-half">
				<h4>CONTACT DETAIL</h4>
			</div>
			<div class="one-half">
				<nav id="breadcrumbs">
				<!--breadcrumb nav starts-->
				
                
				</nav>
				<!--breadcrumb nav ends -->
			</div>
		</div>
	</div>
         <div class="container" >
       
         <div class="one" style="margin-bottom:40px; margin-top:40px;">
         <form method="post" class="simple-form one" id="formVideo" action="">
				<section class="one-half">
               
			<!--	<form method="post" class="simple-form " id=" " action="mail.php">--->
          
                
                	
					<div id="error-field">
					</div>
                   
                   
                   <b><label for="a">Enter Your Name:</label></b>
					<fieldset>
                    <input type="text" name="name" class="one" required   >
					</fieldset>
                 
                      <label for="a">Enter Your Email_ID:</label>
					<fieldset>
					<input type="text" name="email" class="one" pattern="([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})" required>
                  
					</fieldset>
                      <label for="a">Enter Your Contact No:</label>
					<fieldset>
						<input type="text" class="one" name="cont" required>
				</fieldset>
                    
                      <label for="a">Enter Your Massage:</label>
                    <fieldset>
						
						<textarea class="text requiredField"  rows="1" cols="30"  class="form-control" name="msg"></textarea>
					</fieldset>
                   
					<div class="three-fourth">
						<input type="Submit" class="button big grey round" value="Submit" name="save">
                        <?php
                       /*  if(isset($_GET['st'])){
                            $st=$_GET['st'];
                           if($st=="Succ")
                             { 
                              echo "Enquiry Send Successfully !....";
                             }else{
                              echo "Sorry your enquiry not send Please try again....";
                             } 

                          }*/
                         ?>
					</div>
                   
                  	</section>  
				</form>
		
			<!--<section class="one-third" style="color:#656E7B;font-size:16px;">
            <h3 style="font-size:17px; color:#656E7B; margin-bottom:5px;">Safari Kid.</h3>
            <i class="icon-map-marker" style="margin-right:5px;"></i>34899 Newark Blvd.,<br/>
            Newark - 94560<br/>
            <i class="icon-phone" style="margin-right:5px;"></i>510-739-1511<br/>
            <i class="icon-envelope" style="margin-right:5px;"></i>Email: safarikidinc@yahoo.com
          
	      </section>---->
                </div>
			</div>
       </div>
<?php include("include/footer.php");?>
