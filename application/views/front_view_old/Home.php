
<script src="<?php echo base_url(); ?>Style/js/jquery.tabSlideOut.v1.3.js"></script> 
<style>
.rd {
    float: right;
    height: 35px;
    width: 100px;
    border: 1px solid black;
    margin-top: -12px;
    padding-left: 15px;
    padding-top: 6px;
    background-color: #3678B2;
    color:#fff;

}
.rd:hover{
    
    color:#fff;

}


#yourname:hover{
   
   border: 1px solid #3678B2;
}
.request-information select:hover{
   
   border-color: #3678B2;
}
.request-information textarea:hover{
   
   border-color: #3678B2;
}
</style>

<script>
var j=jQuery.noConflict();

j('document').ready(function(){
  
    j("#alert").delay(3200).fadeOut(300);


});
function val()
{
	//alert("fgfd");
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


<!--<div class="slide-out-div" style="display:none;">
                  <p id="blinking"><a class="handle" href="http://link-for-non-js-users.html">Content</a></p>
            <h4 style="color:red;">Quick connect CCA!</h4>
            <form method='post' action='#'>
            <input type='text' placeholder='Enter Name' name='name' required >
            <input type='email' placeholder='Enter Email' name='email' style="margin-top:8px;" required>
            <input type='text' placeholder='Enter Mobile No' name='mobile' style="margin-top:8px;" required>
           <input type='text' placeholder='Message' name='mobile' style="margin-top:8px;" required>
            <select id="interest" name="interest1" style="width:195px; margin-top:8px; height:33px;">
            <option selected=''>Enquiry For</option>
            <option value='lg_himacs'>Course</option>
            <option value='interior_styling'>Franchise</option>
            <option value='Home_decor'>Student</option>
            <option value='Home_decor'>Call Back</option>
            <option value='call'></option>
            </select>
            <textarea name="msg" id="msg" placeholder='Enter Name' rows="3" > </textarea>
            <input type='submit' class='btn btn-warning' value='submit' name='submit' id='submit' style="margin-top:4px; margin-bottom:2px; border:none;margin-left:25px;color:#fff;background-color:#3678B2;">
            </form>
</div>-->




<div class="container slidecontent">
        <div class="row">
		<!--<div class="col-md-12">
		<div style="margin-top:1%; margin-bottom:-1%;">
		<p class="widget-title" style="color:red; font-size:18px; margin-left:auto; margin-right:auto; text-align:center;"><i class="fa fa-phone"></i>&nbsp;&nbsp; 020 -32392121
             &nbsp;/&nbsp;&nbsp;+91 9373703928  
          </p>
   
		</div>-->
		</div>
            <div class="col-md-8">
                <div class="main-slideshow">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="<?php echo base_url(); ?>style/images/slides/1.jpg" height="400" width="770" />
                                <div class="slider-caption">
                                    <h2><a href="#">Smart Tally</a></h2>
                                    <p>Smart Tally is a prerequiste for Tally Professional</p>
                                </div>
                            </li>
                            <li>
                                <img src="<?php echo base_url(); ?>style/images/slides/2.jpg" height="400" width="770" />
                                <div class="slider-caption">
                                    <h2><a href="#">Achive Success With Us</a></h2>
                                    <p>College Of Computer Accounts!</p>
                                </div>
                            </li>
                             <li>
                                <img src="<?php echo base_url(); ?>style/images/slides/6.jpg" height="400" width="770" />
                                <div class="slider-caption">
                                    <h2><a href="#">Achive Success With Us</a></h2>
                                    <p>College Of Computer Accounts!</p>
                                </div>
                            </li>
                             <li>
                                <img src="<?php echo base_url(); ?>style/images/slides/7.jpg" height="400" width="770" />
                                <div class="slider-caption">
                                    <h2><a href="#">Achive Success With Us</a></h2>
                                    <p>College Of Computer Accounts!</p>
                                </div>
                            </li>
                            <li>
                                <img src="<?php echo base_url(); ?>style/images/slides/8.jpg" height="400" width="770" />
                                <div class="slider-caption">
                                    <h2><a href="#">Achive Success With Us</a></h2>
                                    <p>College Of Computer Accounts!</p>
                                </div>
                            </li>
                        </ul> <!-- /.slides -->
                    </div> <!-- /.flexslider -->
                </div> <!-- /.main-slideshow -->
            </div> <!-- /.col-md-12 -->
            
            <div class="col-md-4">
                <div class="widget-item rform" style="height:auto;">
                    <div class="request-information">
                        <?php if(isset($message)) { ?>
                        <div class="alert alert-success" id="alert">
                                    <strong>Well done!</strong> <?php echo $message; ?>
                                </div>
                                <?php } ?>
                        <h4 class="widget-title">Get in touch with us</h4>
                        <form class="request-info clearfix" id="enqui_form" method="post" action="<?php echo  base_url(); ?>index.php/welcome/sent_enquiry"> 
                        <div class="full-row">
                                <input type="text" id="yourname" name="yourname" placeholder="Your Name" required title="Please Type Your Name">
                                
                        </div> <!-- /.full-row -->
                        <div class="full-row">
                                <input type="text" id="contact" name="contact" placeholder="Contact No" pattern="[0-9]{10,10}" required title="Please Type Your Contact No">                                
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
                                <input type="text" id="city" name="city" placeholder="City" required title="Please Type Your City">                                
                           </div> <!-- /.full-row --> 
                            <div class="full-row">
                               <div class="input-select">
                                    <select name="interest" id="interest" class="postform" required title="Please Select Field From List">
                                         <option value="">Interest</option>
                                         <option>Course</option>  
                                         <option>Franchise</option>
                                         <option>Student</option> 
                                         </select>
                                </div> <!-- /.input-select -->
                            </div> <!-- /.full-row -->

                            <div class="full-row">
                                 <textarea id="msg" name="msg" style="width:100%; border:1px solid; border-color: #000; height:38px;"  placeholder="Message" required title="Please Type Message Here"></textarea>
                            </div> <!-- /.full-row -->

                            <div class="full-row">
                                <div class="submit_field">
                                    <span class="small-text pull-left"></span>
                                    <input class="mainBtn pull-right" type="button" style="margin-top: -11px;" name="submit" onclick="return val();" value="Submit">
                                </div> <!-- /.submit-field -->
                            </div> <!-- /.full-row -->


                        </form> <!-- /.request-info -->
                    </div> <!-- /.request-information -->
                </div> <!-- /.widget-item -->

           
            </div> <!-- /.col-md-4 -->
        </div>
    </div>


    <div class="container">
        <div class="row">
            
            <!-- Here begin Main Content -->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget-item iteem">
                            <h2 class="welcome-text"><strong><font color="#004884"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;&nbsp;WELCOME TO CCA</font></strong></h2>
                            <p class="small-text">
                               Centre of computer accountants popularly known as CCA, is a leading accounting institute- 
                               ISO certified. It was established in 2007 by Mr. SachinMaheshwari, a professionaly 
                               managed institute today with a large no.of franchisee, under its umbrella. 
							</p>
                             <p class="small-text">                                
                                Although the center started by focusing on education to make students a great competitor 
                                in every walk of life and shine in all areas.
                            </p>
                            <p class="small-text">                                  
                                    After its short span success with its own center,the year 2009 bought an idea of CCA franchisee. 
                                    With highly dedicated performance and delivery from the year 2011 till this academic year 2014-2015,
                                    We stand with 250+ franchisees all over Maharashtra, 50+ franchisees in Rajasthan,25+ 
                                    franchisee in Punjab & 25+ franchisee in Gujarat in total 350+ franchisees.....
                                </p>
							 <a href="<?php echo base_url(); ?>index.php/welcome/about" class="rd">Read More...</a>
						</div> <!-- /.widget-item -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->

                <div class="row">
                    
                    <!-- Show Latest Blog News -->
                    <div class="col-md-6">
                          <div class="widget-main">
                                    <div class="widget-main-title">
                                        <h4 class="widget-title"><i class="fa fa-file-text"></i>&nbsp;&nbsp;&nbsp;Latest News</h4>
                                    </div> <!-- /.widget-main-title -->
                            <div class="widget-inner">
                               <marquee direction="up" scrollamount="2" height="200px">
                              <div  class="one" style="padding: 5px; margin: 10px; border-bottom: 1px solid; text-align:justify;">
                               <p class="small-text"> HURRAY!!!! !!!! FREE TRAINING !! Presents 7 Days FREE Training  on  Tally.ERP 9 Day /Date:  1st Oct...</p>
                               
                               <p> <a href="#">Read More...</a></p>
                              </div>
                              <div  class="one" style="padding: 5px; margin: 10px; border-bottom: 1px solid; text-align:justify;">
                               <p class="small-text">Advanced Excel Corporate Training For Company Employee/Professionals/Students. Training On: Advanced Excel 2010 Duration : 15 Days Program, 1...</p>
                              
                              <p><a href="#">Read More...</a></p>
                              </div>
                                </marquee>
                        </div> <!-- /.widget-inner -->
                        </div> <!-- /.widget-main -->
                    </div> <!-- /col-md-6 -->


                     <div class="col-md-6">
                          <div class="widget-main">
                                    <div class="widget-main-title">
                                        <h4 class="widget-title"><i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;Master Frnchise</h4>
                                    </div> <!-- /.widget-main-title -->
                            <div class="widget-inner" style="">
                               <marquee direction="up" scrollamount="2" height="200px">
                             
                                   <b class=""><span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;Pimpri- Branch</b>
                                        
                                            <!--<h5 class="prof-name-list">Prof. Betty Hunt</h5>-->
                                        <div  class="one" style="padding: 5px; margin: 10px; border-bottom: 1px solid; text-align:justify;">
                                            <p class="small-text">
                                                    Office No 1,Jamthani Corner,
                                                    Jaihind Highschool Chowk,
                                                    Opp. Ganesh Hotel,
                                                    Pimpri, Pune-411017<br />
                                                    
                                                   
                                            </p>
                                            <p><i class="fa fa-phone"></i>&nbsp;&nbsp;09373703928 / 09145706205</p>
                                        </div>                                
                                       
                             
                             
                             <div class="prof-list-item clearfix">
                          
                                    
                                        <b class=""><span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;Corporate Office Dhule</b>
                                       <div  class="one" style="padding: 5px; margin: 10px; border-bottom: 1px solid; text-align:justify;">
                                        <p class="small-text">
                                                23, Muncipal Colony,
                                                Neharu Nagar, Behind Deopur Church,
                                                W.B.Road,
                                                Deopur,Dhule-424001<br />
                                                <i class="fa fa-phone"></i>&nbsp;&nbsp;09326059560 / 09373381119
                                        </p>
                                    </div>
                                    
                              
                                        <b class=""><span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;Akurdi - Branch</b>
                                        <div  class="one" style="padding: 5px; margin: 10px; border-bottom: 1px solid;">
                                        <p class="small-text">
                                            Office No 4,
                                            ABC Complex, 
                                            opp. Akurdi Railway Station,
                                            Akurdi, Pune-411035<br />
                                            <i class="fa fa-phone"></i>&nbsp;&nbsp;9372499988 / 09326427400
                                        </p>
                                        </div>
                                        
                                    
                        </marquee>
                        </div> <!-- /.widget-inner -->
                        </div> <!-- /.widget-main -->
                    </div> <!-- /col-md-6 -->
                    <!-- Show Latest Events List -->
                   
                    
                </div> <!-- /.row -->
                
                <!--<div class="row">
                    <div class="col-md-12">
                        <div class="widget-main">
                            <div class="widget-main-title">
                                <h4 class="widget-title"><i class="fa fa-building"></i>&nbsp;&nbsp;&nbsp;Our Campus</h4>
                            </div> 
                            <div class="widget-inner">
                                <div class="our-campus clearfix">
                                    <ul>
                                        <li><img src="<?php //echo base_url(); ?>style/images/a1.jpg" alt=""></li>
                                        <li><img src="<?php //echo base_url(); ?>style/images/a2.jpg" alt=""></li>
                                        <li><img src="<?php //echo base_url(); ?>style/images/a3.jpg" alt=""></li>
                                        <li><img src="<?php //echo base_url(); ?>style/images/a4.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                        </div> 
                    </div>  
                </div> -->

            </div> <!-- /.col-md-8 -->
            
            <!-- Here begin Sidebar -->
            <div class="col-md-4">
                 
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


                 <!--<div class="widget-main">
                    <div class="widget-main-title">
                        <h4 class="widget-title">Testimonial</h4>
                    </div>
                    <div class="widget-inner">
                        <div id="slider-testimonials">
                            <ul>
                                <li>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum <strong class="dark-text">Shannon D. Edwards</strong></p>
                                </li>
                                <li>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum <strong class="dark-text">Shannon D. Edwards</strong></p>
                                </li>
                                <li>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, quos, veniam optio voluptas hic delectus soluta odit nemo harum <strong class="dark-text">Shannon D. Edwards</strong></p>
                                </li>
                            </ul>
                            <a class="prev fa fa-angle-left" href="#"></a>
                            <a class="next fa fa-angle-right" href="#"></a>
                        </div>
                    </div>
                </div> -->

                

               

              

            </div>
        </div>
    </div>