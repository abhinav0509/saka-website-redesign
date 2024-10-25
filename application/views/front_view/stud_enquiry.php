<style>
.form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */		
	font-style: normal;		
}
</style>
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
<script>
var j=jQuery.noConflict();
j(document).ready(function(){
 j(".alert").delay(3200).fadeOut(300);
    j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master',
          type: 'post',
          data: {'action': 'Country'},
          success: function(data) {
           
           var obj = j.parseJSON(data);
           j('#state').append("<option value=''>Select</option>");
           for(i=0;i<obj.length;i++)
              { 
                j('#state').append("<option value=\""+obj[i].state_id+"\">"+obj[i].name+"</option>");
               }
           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      }); 
       
       j('#state').change(function(){
         j('#city').empty();
         j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/getcity',
          type: 'post',
          data: {'cntid':j(this).val()},
              success: function(data, status) {
               var obj = j.parseJSON(data);
               j('#city').append("<option value=''>Select</option>");
               for(i=0;i<obj.length;i++)
                  { 
                    j('#city').append("<option value=\""+obj[i].city_id+"\">"+obj[i].name+"</option>");
                  }
                             
               },
             error: function(xhr, desc, err) {
              alert("error");
             }
            }); 
    });

     j('#city').change(function(){
      j('#franch').empty();
       j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/getfranch',
          type: 'post',
          data: {'sid': j('#state').val(),'cid':j(this).val()},
          success: function(data, status) {
           var obj = j.parseJSON(data);
           j('#franch').append("<option value=''>Select</option>");
           for(i=0;i<obj.length;i++)
              { 
                j('#franch').append("<option value=\""+obj[i].institute_name+"\">"+obj[i].institute_name+"</option>");
                 
               }
               
              
           },
         error: function(xhr, desc, err) {
          alret("error");
         }
      }); 
       
   });
  
  
  /********************Start**************************************/
  
   $('#enq_form').submit(function(e) {
        $("#lod").show();
        e.preventDefault();
        $.ajax({
          url       :'<?php echo base_url(); ?>index.php/welcome/student_enquiry', 
          contentType: false,
          processData: false,
          cache: false,
          type: 'POST',
          data      : new FormData(this),
          success : function (data)
          {
			  
             var obj = $.parseJSON(data);
             $(".alert").show();
			 $("#lod").hide();
             $("#name_id").val("");
             $('#email_id').val("");
             $('#cont').val("");
             $('#cmp').val("");
             $('#msg').val("");
             $('#city').val("");
             $("#state").val( $("#state option:first-child").val() );
             $("#alert").delay(3200).fadeOut(300);
			 
          }
        });
        return false;
  });
  
  
  
  /***************************End**********************************/
  
});
</script>


<script>
function sval1()
{
   /* 
    j("#stud1").validate({

            rules:{
                    fname:"required",
                    finst:"required",
                    bAdd:"required",
                    stat:"required",,
                    cit:"required",
                    femail:"required",
                    fCont1:"required",
                },
            message:{
                    fname:"Please Enter Your Full Name",
                    finst:"Please Enter Your Institute Name",
                    bAdd:"Please Enter Buissness Address",
                    stat:"Please Select State",
                    cit:"Please Select City",
                    femail:"Please Enter Your Email Id",
                    fCont1:"Please Enter Contact No",
            }
        });
		*/
}


</script>



<!-- page title Start -->
<div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
    <div class="container">
      <div class="lms_title">Employer's Request</div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="index-2.html">Home</a></li>
          <li class="active">Employer's Request</li>
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
      <h2 style="margin-top:20px; text-align:center;">Enquiry Form For Student</h2>
    </div>
    <div class="col-lg-12 col-md-12">
        
          <div  style=""class="lms_login_window lms_login_light">
            <h3>Enquiry Form For Student</h3>
			
			 <div class="alert alert-success" id="alert" style="display:none;">
                <strong>Mail Send...! We Will Contact Yot.</strong> 
            </div>
			
            <div class="lms_login_body">
			<form name="frm" id="enq_form" action="<?php echo base_url(); ?>index.php/welcome/student_enquiry" method='post'>
			
              <!----<form role="form">---->
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="form-group">
             <label for="signup_pass"><b>Name</b> <span class="asterisk">*</span></label>
             <input type="text" class="form-control" id="name_id" name="name_id" pattern="[a-zA-Z ]+" placeholder="Enter Name" required title="Please enter your name">
            </div>
         </div> 
          <div class="col-lg-6 col-md-6">
            <div class="form-group">
              <label for="signup_pass"><b>Email Id</b> <span class="asterisk">*</span></label>           
              <input type="email" class="form-control" id="email_id" pattern="([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})" name="email_id" placeholder="Enter Email" required title="Please enter your Email">
            </div>
          </div>
          <div class="col-lg-6 col-md-6"> 
             <div class="form-group">
                  <label for="signup_pass"><b>Mobile No</b> <span class="asterisk">*</span></label>            
                      <input type="phoneno" class="form-control" id="cont" name="cont" pattern="^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$" placeholder="Contact No" required title="Please enter your Phoneno">
             </div>
            </div>       
        
		
		<div class="col-lg-6 col-md-6">
           <div class="form-group">
            <label for="signup_pass"><b>Interested Course</b> <span class="asterisk">*</span></label>
                    <select class="form-control" id="cour" name="cour" required>
                                       <option value="">Select</option>
                              <?php foreach($courses as $co){ ?>                  
                               <option><?php echo $co->Course_Name; ?></option>
                               <?php } ?>                          
                                                
                          </select>  
           </div>
        </div>   
		
		
		
		
		  <div class="col-lg-6 col-md-6"> 
            <div class="form-group">
                <label for="signup_pass"><b>Select State</b> <span class="asterisk">*</span></label> 
              <select class="form-control" id="state" name="Campus">
                 <option value="">State</option>
              </select>     
            </div>
          </div>
		
		

		 <div class="col-lg-6 col-md-6">
           <div class="form-group">
               <label for="signup_pass"><b>Subject</b> <span class="asterisk">*</span></label>
            <input type="Subject" class="form-control" id="cmp" name="cmp" placeholder="Subject" pattern="[a-zA-Z ]+" required title="Please enter Subject">
          </div>
        </div>
	
		 <div class="col-lg-6 col-md-6"> 
            <div class="form-group">
              <label for="signup_pass"><b>Select City</b> <span class="asterisk">*</span></label>
                    <select class="form-control" id="city" name="Discipline">
						<option value="">City</option>
					</select>  
                  </div>
          </div>
     
             
		<div class="col-lg-6 col-md-6">
        <div class="form-group">
                     <label for="signup_pass"><b>Message</b> <span class="asterisk">*</span></label>
           <textarea name="msg" id="msg"class="form-control"  placeholder="Enter Your message" required="" title="Please enter your message"></textarea>
                </div>
          </div>	 
	
	 
	 <div class="col-lg-6 col-md-6" style="margin-top: -39px;">
          <div class="form-group">
                     <label for="signup_pass"><b>Enter In Interested Franchisee</b> <span class="asterisk">*</span></label>
           <select id="franch" name="Study_Level" class="form-control">
                
                     </select>
          </div>
        </div>  
	 
     
       </div>  
       <div class="col-lg-4 col-md-4">
         </div>
        
         <div class="col-lg-4 col-md-4">
         </div>
         <br />
        
        </div>
         <div class="col-lg-offset-5 col-lg-4 col-md-4">
            <button type="submit" class="btn btn-default" style="margin-top: 20px;color: red;">Submit</button><img src="<?php echo base_url(); ?>Style/images/enq_loder.gif" id="lod" style="display:none; height:30px; padding-left:10px;">
         </div>
              </form>   
        
        
        
          </div>
          </div>
        </div>
      </div>
       
  </div>
 </div>

<!--main container end-->