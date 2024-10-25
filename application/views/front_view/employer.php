<style>
.form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */		
	font-weight: bold;
	font-style: normal;		
}
</style>

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

 <script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#about").removeClass("active");
    $("#home").removeClass("active");
    $("#course").removeClass("active");
    $("#placement").addClass("active");
    $("#studmnu").removeClass("active");
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
var dt= new Date();

   j('#doa').datepicker({
        autoclose: true,
        todayHighlight: true,
       dateFormat: 'dd-mm-yy',
       onSelect: function(dateText){
            getDuration();
       }
    });

   
	j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master',
          type: 'post',
          data: {'action': 'Country'},
          success: function(data) {
           
           var obj = j.parseJSON(data);
           j('#state').append("<option>Select</option>");
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
	
	

  /********************Start**************************************/
  
   $('#stud1').submit(function(e) {
        $("#lod").show();
        e.preventDefault();
        $.ajax({
          url       :'<?php echo base_url(); ?>index.php/Employee1/Save_Data', 
          contentType: false,
          processData: false,
          cache: false,
          type: 'POST',
          data      : new FormData(this),
          success : function (data)
          {
			$("#lod").hide();
			alert("Employer's Detail Added Successfully");
			 var obj = $.parseJSON(data);
             $(".alert").html(obj.msg);
             $(".alert").show();
			 $("#lod").hide();
             $("#cname").val("");
             $('#name').val("");
             $('#email').val("");
             $('#contact').val("");
             $('#add1').val("");
			 $("#gend").val("");
			 $("#job").val("");
			 $("#description").val("");
			 $("#vacancy").val("");
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


<style>
.mainBtn {
    margin-left: 500px;
    margin-top: 25px;
}

.lms_register_window .lms_register_body label {
    color: #000;
    font-weight: 100;
}
.form-control {
    background-color: transparent;
    background-image: none;
    border: 1px solid #9a9a9a;
    color: #9a9a9a;
    display: block;
    font-size: 14px;
    height: 32px;
    line-height: 1.42857;
    padding: 6px 12px;
    transition: all 0.3s ease 0s;
    width: 100%;
}
.asterisk {
    color: red;
 }
</style>
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
         <h2 style="margin-top:20px; text-align:center;">Employer's Detail</h2>
    </div>
	
	
			  <input type="hidden" name="st_name" id="st_name" />
              <input type="hidden" name="ct_name" id="ct_name" />
              <input type="hidden" name="lat" id="lat" />           
              <input type="hidden" name="lng" id="lng" />

	
	
    <div class="col-lg-12 col-md-12">
          <div class="lms_register_window lms_register_light">
            <h3>Employer Details</h3>
            <div class="lms_register_body">
              <form class="request-info clearfix" id="stud1" name="stud1" role="form" method="post" action="<?php echo base_url(); ?>index.php/Employee1/Save_Data" enctype="multipart/form-data"> 
                <div class="row">
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="signup_pass">Name Of Company <span class="asterisk">*</span></label>
                    <input type="text" class="form-control" id="cname" name="cname" placeholder="Company Name" required title="Please Enter Company Name">
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="signup_repass">Name Of Contact Person <span class="asterisk">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Contact Person Name" rerquired title="Please Enter Contact Person Name">
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="signup_repass">Email <span class="asterisk">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Id" required title="Please Enter orrect Email Id">
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="signup_repass">Mobile No <span class="asterisk">*</span></label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Mobile No" required title="Please Enetr Correct Mobile No">
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="signup_repass">Select State <span class="asterisk">*</span></label>
                    <select class="form-control" id="state" name="state" required title="Please Select State"> 
                      
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="signup_repass">Select City <span class="asterisk">*</span></label>
                    <select class="form-control" id="city" name="city" required title="Please Select City"> 
                       <option value="">Select City</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="signup_repass">Date <span class="asterisk">*</span></label>
                   <input type="text" id="doa" name="doa" class="form-control" data-rel="datepicker" value="<?php echo date('d/m/Y'); ?>" required title="Please Select  Date" />
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="signup_repass">Address <span class="asterisk">*</span></label>
                    <textarea id="add1" name="add1" class="form-control" required title="Please Type Your Address"></textarea>
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="signup_repass">Gender Required <span class="asterisk">*</span></label>
                    <select class="form-control" name="gend" id="gend" required title="Please Select Gender"> 
                       <option value="">Select Gender</option>
                       <option>Male</option>
                       <option>FeMale</option>
                       <option>Both</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="signup_repass">Job Type <span class="asterisk">*</span></label>
                    <select class="form-control" name="job" id="job" required title="Please Select Gender"> 
                       <option value="">Select Job Type</option>
                       <option>Part Time</option>
                       <option>Full Time</option>
                       <option>Both</option>
                    </select>
                  </div>
				  <div class="form-group col-lg-12 col-md-12">
                    <label for="signup_repass">Job Description <span class="asterisk">*</span></label>
                    <textarea id="description" name="description" class="form-control" required title="Please Enter Job Description"></textarea>
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="signup_repass">No Of Vacancies <span class="asterisk">*</span></label>
                    <input type="text" id="vacancy" name="vacancy" class="form-control" required title="Please Enter No Of Vacansies"/>
                  </div>
                  <div class="form-group col-lg-6 col-md-6">
                    <label for="signup_repass">Upload Company Logo </label>
                    <input type="file" name="upload" id="upload" class="form-control" style="padding-top:0;" title="Please Upload Your ompany Logo"/>
                  </div>
                                   
                </div>
                <div class="form-group col-lg-4 col-md-4">
                </div>
                <div class="form-group col-lg-4 col-md-4">
                      <button type="submit" class="btn btn-default">Save</button><img src="<?php echo base_url(); ?>Style/images/enq_loder.gif" id="lod" style="display:none; height:30px; padding-left:10px;">
                </div>
                <div class="form-group col-lg-4 col-md-4">
				
				 <div class="alert alert-success" id="alert" style="display:none;">
                <strong>Mail Send...! We Will Contact You.</strong> 
				</div>
			
                </div>
                <br/>
              </form>
            </div>
          </div>
    </div>
  </div>
</div>
       
</div>
</div>