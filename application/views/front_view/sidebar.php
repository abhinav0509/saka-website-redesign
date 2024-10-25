   <style>
   .alert {
      border: 1px solid transparent;
      border-radius: 4px;
      margin-bottom: 20px;
      padding: 4px 18px 5px;
    }
	.myPanel > .panel-heading.active .panel-title > a > i {
		display: none;
	}
	.form-control::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */		
		font-style: normal;		
	}
	.lms_sidebar_rp ul li {
		width: 100%;
		float: left;
		margin-bottom: 5px;
	}
	.lms_sidebar_rp ul li h3{
		font-family: Broadway;
		text-shadow: 2px 2px #C1F0F6;
		font-weight: bold;
	}
	.lms_sidebar_rp ul li p{text-align: left;}
   </style>
   <script>
    //var j=jQuery.noConflict();
    $('document').ready(function(){
        $("#alert").delay(3200).fadeOut(300);
   

  $('#enq_form').submit(function(e) {
        $("#lod").show();
        e.preventDefault();
        $.ajax({
          url       :'<?php echo base_url(); ?>index.php/welcome/sent_enquiry', 
          contentType: false,
          processData: false,
          cache: false,
          type: 'POST',
          data      : new FormData(this),
          success : function (data)
          {
             var obj = $.parseJSON(data);
             $(".alert").html(obj.message);
             $(".alert").show();
             $("#lod").hide();
             $('#login_name').val("");
             $('#login_email').val("");
             $('#login_pass').val("");
             $('#msg').val("");
             $('#city').val("");
             $("#state").val( $("#state option:first-child").val() );
             $("#alert").delay(3200).fadeOut(300);

          }
        });
        return false;
  });

   });//document ready

   </script>

   <div class="lms_login_window lms_login_light">
            <h3>Enquiry</h3>
            <div class="alert alert-success" id="alert" style="display:none;">
                <strong>Mail Send...! We Will Contact Yot.</strong> 
            </div>
            <div class="lms_login_body">
           <form name="frm" id="enq_form" action="<?php echo base_url(); ?>index.php/Welcome/sent_enquiry" method='post'>
         <div class="form-group">
                  
                  <input type="text" class="form-control" name="name" id="login_name" placeholder="Enter Name" required title="Please enter your name">
                </div>
                <div class="form-group">
                  
                  <input type="text" class="form-control" name="email" id="login_email" placeholder="Enter Email" required title="Please enter your Email">
                </div>
                <div class="form-group">
                  
                  <input type="text" class="form-control" name="mobno" id="login_pass" placeholder="Contact no." required title="Please enter your Contact no">
                </div>
         <div class="form-group">
                 
                   <select name="state"  id="state" name="state" class="form-control" placeholder="State" required="" title="Please Select Field From List">
                         <option value="">State</option>
                         <?php if(!empty($states)){ foreach ($states as $s) { ?>
                         <option><?php echo $s->name; ?></option>
                         <?php } } ?>
                   </select>
                </div>
        
        <div class="form-group">
           <input type="text" name="city" class="form-control" id="city" placeholder="City" required title="Please enter your City">
        </div>
        
        
        
        
               <div class="form-group">
                  
                  <select name="enquiry"  id="enquiry" class="form-control" placeholder="Enquiry" required="" title="Please Select Field From List">
                   <option value="">Select</option>
                   <option>Enquiry</option>
                   <option>Course</option>
                   <option>Franchise</option>
                   <option>Student</option>
                                                                                   
          
          
          </select>
        </div>
          <div class="form-group">
            <textarea name="msg" id="msg" class="form-control" placeholder="Type Your Message" required title="Please Type Your Message"></textarea>
          </div>               
                <button type="submit" class="btn btn-default">Submit</button><img src="<?php echo base_url(); ?>Style/images/enq_loder.gif" id="lod" style="display:none; height:30px; padding-left:10px;">
              </form>
            </div>
          </div>


          <div class="lms_sidebar_item">
        <div class="panel-group" id="accordion">
          <div class="panel panel-default myPanel">
            <div class="panel-heading">
              <h4 class="panel-title"> <a  href="#collapseOne"> Our Brands </a> </h4>
            </div>
            <div id="#" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class="lms_sidebar_rp">
				  <!--<div class="col-md-offset-2 col-md-4">
					 <img src="<?php echo base_url()?>/Style/images/ccalogo.jpg" style="width: 170px; height: 150px;margin-bottom: 5px;">
				  </div>-->
                  <ul>
                    <li> 
					  <h3>SKILL</h3>	
                      <p>CCA Educations Pvt.Ltd. Pune is very proud to be associated with Globsyn Skill Development Pvt.Ltd. Kolkata which is National Skill Development Corporation..... <br/><div class="read pull-right"><a href="<?php echo base_url();?>index.php/welcome/cca_skills">Read More → </a></div></p>
                      </a> </li>
                    <li>
					  <h3>COLLEGE</h3>	
                      <p>Besides franchisees, in the year 2013 requirements came in from university colleges to provide a short term courses to their students in their own premise.....<br/><div class="read pull-right"><a href="<?php echo base_url();?>index.php/welcome/cca_college">Read More → </a></div> </p>
                      </a> </li>
                    <li>
					  <h3>FRANCHISE</h3>
                      <p>COLLEGE OF COMPUTER ACCOUNTANTS (Pune) is a major Accounts education, service and research Institute.....<br/><div class="read pull-right"><a href="<?php echo base_url();?>index.php/welcome/franchisee">Read More → </a></div> </p>
                      </a> </li>
                    <li>
					  <h3>INSTITUTE</h3>
                      <p>With the Great success of our institution, A thought of why not start up with Franchisee’s clicked us.....<br/><div class="read pull-right"><a href="<?php echo base_url();?>index.php/welcome/institute">Read More → </a></div></p>
                      </a> </li>
            
                  </ul>
                </div>
              </div>
            </div>
          <div class="panel panel-default">
          </div>
            
           
          </div>
          
        </div>
      </div>