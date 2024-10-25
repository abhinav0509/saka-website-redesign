
<script>
var j=jQuery.noConflict();

j('document').ready(function(){
  
    j("#alert").delay(3200).fadeOut(300);
	//val();

});
function val()
{
	var name=j("#yourname").val();
	var cont=j("#contact").val();
	var stat=j("#state").val();
	var cit=j("#city").val();
	var intr=j("#interest").val();
	var ms=j("#msg").val();
	  j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Welcome/sent_enquiry',
            type: 'POST',
            data:{'yourname':name,'contact':cont,'msg':ms,'state':stat,'city':cit,'interest':intr},
      
            success: function (data) {
			//alert("Mail Send Successfully");
			//alert(data);
			var obj=j.parseJSON(data);
			alert(obj.message);
            j("#yourname").val("");
            j("#contact").val("");
            j("#state").val("");
            j("#city").val("");
            j("#interest").val("Select");
            j("#msg").val("");
            },
            error: function () {
                
            }
        });
}




</script>
                  <div class="widget-item rform" style="height:321px;">
                    <div class="request-information">
                        <?php if(isset($message)) { ?>
                        <div class="alert alert-success" id="alert">
                                    <strong>Well done!</strong> <?php echo $message; ?>
                                </div>
                                <?php } ?>
                        <h4 class="widget-title">Get in touch with us</h4>
                        <form class="request-info clearfix" id="enqui_form" method="post" action="<?php echo  base_url(); ?>index.php/welcome/sent_enquiry"> 
                        <div class="full-row">
                                <input type="text" id="yourname" name="yourname" placeholder="Your Name">
                                
                        </div> <!-- /.full-row -->
                        <div class="full-row">
                                <input type="text" id="contact" name="contact" placeholder="Contact No" pattern="[0-9]{10,10}">                                
                        </div> <!-- /.full-row -->
                        
                            <div class="full-row">
                               <div class="input-select">
                                   <select name="state" style="color:#999;" id="state" class="postform" placeholder="State" required title="Please Select Field From List">
                                     <option value="">State</option>
                                        <?php if(!empty($states)){ foreach ($states as $s) { ?>
                                            <option><?php echo $s->name; ?></option>
                                        <?php } } ?>
                                    </select>
                                </div> <!-- /.input-select -->  
                            </div> <!-- /.full-row -->
                            <div class="full-row">
                                <input type="text" id="city" name="city" placeholder="City">                                
                           </div> <!-- /.full-row --> 
                            <div class="full-row">
                               <div class="input-select">
                                    <select name="interest" id="interest" class="postform">
                                         <option value="">Interest</option>
                                         <option>Course</option>  
                                         <option>Franchise</option>
                                         <option>Student</option>  
                                        <!--<option class="level-0" value="49">Germany</option>
                                        <option class="level-0" value="56">United Kingdom</option>
                                        <option class="level-0" value="59">Italy</option>
                                        <option class="level-0" value="76">France</option>
                                        <option class="level-0" value="77">Belgium</option>
                                        <option class="level-0" value="79">Monaco</option>-->
                                    </select>
                                </div> <!-- /.input-select -->
                            </div> <!-- /.full-row -->

                            <div class="full-row">
                                 <textarea id="msg" name="msg" style="width:100%; border:1px solid; border-color: #000; height:38px;"  placeholder="Message"></textarea>
                            </div> <!-- /.full-row -->

                            <div class="full-row">
                                <div class="submit_field">
                                    <span class="small-text pull-left"></span>
                                    <input class="mainBtn pull-right" type="button" style="margin-top: -11px;" name="submit" onclick="return val()" value="Submit">
                                </div> <!-- /.submit-field -->
                            </div> <!-- /.full-row -->


                        </form> <!-- /.request-info -->
                    </div> <!-- /.request-information -->
                </div> <!-- /.widget-item -->


                <div class="widget-main">
                    <div class="widget-main-title">
                        <h4 class="widget-title"><span><i class="fa fa-star"></i></span>&nbsp;&nbsp;&nbsp;Our Brands</h4>
                    </div>
                    <div class="widget-inner">
                        <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                                <img src="<?php echo base_url(); ?>Style/images/121.jpg" alt="tally">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Betty Hunt</h5>-->
                                <p class="small-text">CCA Educations Pvt.Ltd. Pune  is very proud to be associated withGlobsyn Skill Development Pvt.Ltd. Kolkata which is National Skill Development Corporation.....</p>
                                
                                 <a href="<?php echo  base_url(); ?>index.php/welcome/cca_skills" style="color:#169FE6; float:right;">Read More...</a>                             
                           </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                                <img src="<?php echo base_url(); ?>Style/images/122.jpg" alt="cea">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Victor Johns</h5>-->
                                <p class="small-text">Besides franchisees, in the year 2013 requirements came in from university colleges to provide a short term courses to their students in their own premise.....</p>
                                <a href="<?php echo  base_url(); ?>index.php/welcome/cca_college" style="color:#169FE6; float:right;">Read More...</a>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                                <img src="<?php echo base_url(); ?>Style/images/123.jpg" alt="excel">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Charles Conway</h5>-->
                                <p class="small-text">COLLEGE OF COMPUTER ACCOUNTANTS (Pune) is a major Accounts education, service and research 
                                    Institute.....</p>
                                <a href="<?php echo  base_url(); ?>index.php/welcome/franchisee" style="color:#169FE6; float:right;">Read More...</a>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                         <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                                <img src="<?php echo base_url(); ?>Style/images/124.jpg" alt="excel">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Charles Conway</h5>-->
                                <p class="small-text">With the Great success of our institution, A thought of why not start up with Franchisee’s clicked us.....</p>
                                <a href="<?php echo  base_url(); ?>index.php/welcome/institute" style="color:#169FE6; float:right;">Read More...</a>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->
