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
    $("#studmnu").removeClass("active");
    $("#franmnu").addClass("active");
    $("#brandmnu").removeClass("active");
    $("#galmnu").removeClass("active");
    $("#cntmnu").removeClass("active");
 });   
</script>
   <style>
   .alert {
      border: 1px solid transparent;
      border-radius: 4px;
      margin-bottom: 20px;
      padding: 4px 18px 5px;
    }
	.input-icon i{
			z-index: 99999;
			/* overflow: visible; */
			position: absolute;
			float: left;
			margin-left: 90%;
			top: 47%;
	}
	.viewPassword:hover{
		cursor: pointer;
	}
   </style>
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
           j('#city').append("<option>Select</option>");
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


  $('#enq_form').submit(function(e) {
        $("#lod").show();
        e.preventDefault();
        $.ajax({
          url       :'<?php echo base_url(); ?>index.php/welcome/franch_enquiry', 
          contentType: false,
          processData: false,
          cache: false,
          type: 'POST',
          data      : new FormData(this),
		  error : function(error){
			 $(".alert").show();
             $("#lod").hide();
             $('input:text').val('');
             $('#bAdd').val('');
             $("#state").val( $("#state option:first-child").val() );
             $("#alert").delay(3200).fadeOut(300);
		  },
          success : function (data)
          {
             //var obj = $.parseJSON(data);
             $(".alert").show();
             $("#lod").hide();
             $('input:text').val('');
             $('#bAdd').val('');
             $("#state").val( $("#state option:first-child").val() );
             $("#alert").delay(3200).fadeOut(300);

          }
        });
        return false;
  });



});
</script>

<script>
function get_addr()
{
   var cid=j("#city").val();
   var sid=j("#state").val();
   j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/get_addr',
          type: 'post',
          data: {'cid':cid,'sid':sid},
          success: function(data) {
           var obj = j.parseJSON(data);
           
           j('#st_name').val(obj[0].State_Name);
           j('#ct_name').val(obj[0].City_Name);

           get_lat_long();
          },
          error: function() {
          alert("error");
         }
      }); 
}

function pasteuser(str)
{
     j('#uname').val(str);
}

function get_lat_long()
{
  var add= j('#bAdd').val()+" "+j('#st_name').val()+" "+j('#ct_name').val();
  
    j.ajax({
                type: "GET",
                dataType: "json",
                url: "http://maps.googleapis.com/maps/api/geocode/json",
                data: { 'address': add, 'sensor': false },
                success: function (data) {
                    lat1 = data.results[0].geometry.location.lat;
                    lng1 = data.results[0].geometry.location.lng;
               
                 j('#lat').val(lat1);
                 j('#lng').val(lng1);
               
                },
                error: function () {
                    alert("Fail..");
                }
            });
}
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
        $(".viewPassword").css("color","red");
    } else {
        x.type = "password";
        $(".viewPassword").css("color","#ccc");
    }
} 
</script>

<!-- page title Start -->
<div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
    <div class="container">
      <div class="lms_title">Franchisee Registration</div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="index-2.html">Home</a></li>
          <li class="active">Franchisee Registration</li>
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
      <h2 style="margin-top:20px; text-align:center;">Franchise Registration</h2>
    </div>
    <div class="col-lg-12 col-md-12">
        
          <div class="lms_login_window lms_login_light">
            <h3>Franchise Registration</h3>
            <div class="alert alert-success" id="alert" style="display:none;">
                <strong>Mail Send...! We Will Contact Yot.</strong> 
            </div>
            <div class="lms_login_body">
             <div class="row"> 
        <form role="form" id="enq_form" action="<?php echo base_url(); ?>index.php/welcome/franch_enquiry" method="post">
          <div class="col-lg-6 col-md-6">
           <div class="form-group">
            <label for="signup_pass">Name <span class="asterisk">*</span></label>             
            <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Name" required pattern="[a-zA-Z ]+" title="Please enter your name">
           </div>
          </div>     
        <div class="col-lg-6 col-md-6">
           <div class="form-group">
                       <label for="signup_pass">Institute Name <span class="asterisk">*</span></label>              
             <input type="text" class="form-control" id="finst" name="finst" placeholder="Enter Name" required pattern="[a-zA-Z ]+" title="Please enter your Institute Name">
                   </div>
          </div>  
        <div class="col-lg-6 col-md-6">
           <div class="form-group">
                       <label for="signup_pass">Address <span class="asterisk">*</span></label>             
             <textarea  class="form-control" id="bAdd" name="bAdd" placeholder="Enter Your Address" required="" title="Please enter your Address" style="height: 32px;"></textarea>
                  </div>
          </div>
        <div class="col-lg-6 col-md-6"> 
           <div class="form-group">
               <label for="signup_pass">Pincode <span class="asterisk">*</span></label>               
               <input type="text" class="form-control" id="pin" name="pin" placeholder="Enter Pincode" pattern="[0-9]{6,6}" required title="Please enter your Pincode">
           </div>
        </div>   
        <div class="col-lg-6 col-md-6">     
           <div class="form-group">
           <label for="signup_pass">Select State <span class="asterisk">*</span></label>                
                      <select class="form-control" id="state" name="state">
              <option value="">State</option>
                      </select>     
                   </div>
        </div>
        
        <div class="col-lg-6 col-md-6">     
           <div class="form-group">
           <label for="signup_pass">Select District <span class="asterisk">*</span></label>               
                     <select class="form-control" id="city" name="city">
                <option value="">Select</option>
                     </select>
             </div>
          </div>  
        <div class="col-lg-6 col-md-6">
          <div class="form-group">
              <label for="signup_pass">Select City <span class="asterisk">*</span></label>               
              <input type="text" class="form-control" id="dist" pattern="[a-zA-Z ]+" name="dist" placeholder="Select" required title="Please enter your District">
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="form-group">
          <label for="signup_pass">Email <span class="asterisk">*</span></label>                
             <input type="email" pattern="([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})" class="form-control" id="femail" onchange="pasteuser(this.value)" name="femail" placeholder="Enter Email" required title="Please enter your Email">
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <label for="signup_pass">Mobile No <span class="asterisk">*</span></label>                
          <div class="form-group">
              <input type="text" class="form-control" pattern="^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$" id="fCont3" name="fCont3" placeholder="Contact No" required title="Please enter your Phoneno">
          </div>
        </div>  
        <div class="col-lg-6 col-md-6">
          <div class="form-group">
          <label for="signup_pass">User Id <span class="asterisk">*</span></label>                
                  <input type="text" class="form-control" id="uname" name="uname" placeholder="Login ID">
          </div>
        </div>  
        <div class="col-lg-6 col-md-6">
              <div class="form-group">
              <label for="signup_pass">Password <span class="asterisk">*</span></label> 
			  <div class="input-icon right">
				  <i class="fa fa-eye-slash viewPassword" onclick="myFunction()"></i>              
				  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
			  </div>
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