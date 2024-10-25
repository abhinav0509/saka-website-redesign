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


function get_lat_long()
{
  var add= j('#bAdd').val()+" "+j('#ct_name').val()+" "+j('#st_name').val();
 

       j.ajax({
                type: "GET",
                dataType: "json",
                url: "http://maps.googleapis.com/maps/api/geocode/json",
                data: { 'address': add, 'sensor': false },
                success: function (data) {
                    lat1 = data.results[0].geometry.location.lat;
                    lng1 = data.results[0].geometry.location.lng;
                 //alert("Lat"+lat1+"Long"+lng1);
                 j('#lat').val(lat1);
                 j('#lng').val(lng1);
               
                },
                error: function () {
                    alert("Fail..");
                }
            });
}


function pasteuser(str)
{
  
   j('#uname').val(str);
}


</script>
<style>
.mainBtn {
    margin-left: 500px;
    margin-top: 25px;
}
</style>

<div class="container">
        <div class="page-title clearfix coursecontent">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="index.html">Home</a></h6>
                    <h6><span class="page-active">Enquiry</span></h6>
                    <div class="grid-or-list">
                        <ul>
                            <li><a href="#"><i class="fa fa-th"></i></a></li>
                            <li><a href="#"><i class="fa fa-list"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <!-- Here begin Main Content -->
            <div class="col-md-12">
			<div class="widget-main">
			
				<form class="request-info clearfix" id="stud1" method="post" action="<?php echo base_url(); ?>index.php/welcome/franch_enquiry"> 
                  <div class="row">
				  <div class="col-sm-12">
						   <div class="contact-heading">
								<p><center><h2>Franchise Registration</h2></center></p>
							</div>
                            <hr />


				  </div>
        
          <div class="col-md-12" style="margin-left: 50px !important;">    
			<div class="col-sm-6">
          <p class="full-row">
                        <?php if(isset($message)) { ?>
                            <div class="alert alert-success">
                                    <strong><?php echo $message; ?></strong>
                                </div>
                         <?php } ?>       
                            
                        </p>

					<input type="hidden" name="st_name" id="st_name" />
              <input type="hidden" name="ct_name" id="ct_name" />
              <input type="hidden" name="lat" id="lat" />           
              <input type="hidden" name="lng" id="lng" />
				  <div class="contact-form clearfix">
				        <p class="full-row">
                            <span class="contact-label">
                                <label for="name-id">Name:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
                                
                            </span>
                            <input type="text" id="fname" name="fname" placeholder="Enter your Name" required>
                        </p>
                       
                        <p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Institute Name:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
                               
                            </span>
                            <input type="text" id="finst" name="finst" placeholder="Enter Your Institute Name" required>
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Address:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
                                
                            </span>
                            <textarea name="bAdd" id="bAdd" rows="2" style="width:250px;" placeholder="Enter Your Business Address" required></textarea>
							<!--<input type="text" id="bAdd" name="bAdd">-->
                        </p>
                 <p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Pincode:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
                                
                            </span>
                            <input type="text" id="pin" name="pin" placeholder="Enter Your Pincode" required pattern="[0-9]{6,6}" title="Please Enter 6 Digits Pincode">
              <!--<input type="text" id="bAdd" name="bAdd">-->
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">State:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
                                
                            </span>
						</p>
                          
								<div class="input-select">
                                       <select class="postform" style="color:#000; -moz-appearance: none; width:46%;" id="state" name="state">
                                                
                                       </select>
                                </div> <!-- /.input-select -->  
						 
                        					
				  </div>
			</div>
				
			<div class="col-sm-6">
				  <div class="contact-form clearfix">
            <p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">District:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
                                
                            </span>
							
                          
							 <div class="input-select">
                                    <select name="city" onchange="get_addr()" style="color:#000; -moz-appearance: none; width:46%;" id="city" class="postform" placeholder="" required>
                                       
                                     </select>
                                </div> <!-- /.input-select -->  
                        </p>
            <p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">City:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
                                
                            </span>
                             <input type="text" id="dist" name="dist" placeholder="Enter Your City" required  title="Please Enter City">
                        </p>
						
						
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Email_ID:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
                                
                            </span>
                             <input type="email" id="femail" name="femail" onchange="pasteuser(this.value)" placeholder="Enter Your Email-id" required>
                        </p>
							
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Mobile:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>                                
                            </span>
                             <input type="text" id="fCont3" name="fCont3" placeholder="Enter Your Contact Number" required>
                        </p>	
							
						
						<p class="full-row">
							<span class="contact-label">
								<label for="email-id">User Name</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
							</span>
								<input type="text" id="uname" name="uname" readonly="true" placeholder="Enter Your Desired User Name" required>
						</p>
						
						<p class="full-row">
							<span class="contact-label">
								<label for="email-id">Password</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
							</span>
								<input type="password" name="psw" name="psw" placeholder="Enter Your Desired Password" required>
						</p>
						
				 
					
		    </div>

		</div>	
     <p class="full-row">
           <input class="mainBtn" type="submit" name="submit" value="Send Message" onclick="return sval()" />
     </p>
      </div>
    
                    </form>
			
			
		</div>
				
				
            </div> <!-- /.col-md-8 -->

        </div> <!-- /.row -->
    </div>
    </div> <!-- /.container -->
