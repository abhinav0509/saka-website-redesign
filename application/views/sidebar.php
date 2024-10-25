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
                                <input type="text" id="yourname" name="yourname" placeholder="Your Name">
                                
                        </div> <!-- /.full-row -->
                        <div class="full-row">
                                <input type="text" id="contact" name="contact" placeholder="Contact No" pattern="[0-9]{10,10}">                                
                        </div> <!-- /.full-row -->
                        
                            <div class="full-row">
                               <div class="input-select">
                                    <select name="state" style="color:#999;" id="state" class="postform" placeholder="State">
                                        
                                         <option value="">State</option>
                                         <option>Maharashtra</option>   
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
                                         </select>
                                </div> <!-- /.input-select -->
                            </div> <!-- /.full-row -->

                            <div class="full-row">
                                 <textarea id="msg" name="msg" style="width:100%; border:1px solid; border-color: #000; height:38px;"  placeholder="Message"></textarea>
                            </div> <!-- /.full-row -->

                            <div class="full-row">
                                <div class="submit_field">
                                    <span class="small-text pull-left"></span>
                                    <input class="mainBtn pull-right" type="submit" style="margin-top: -11px;" name="submit" onclick="return val();" value="Submit">
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
                                <img src="<?php echo base_url(); ?>Style/images/1.jpg" alt="tally">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Betty Hunt</h5>-->
                                <p class="small-text">CCA Educations Pvt.Ltd. Pune  is very proud to be associated withGlobsyn Skill Development Pvt.Ltd. Kolkata which is National Skill Development Corporation.....</p>
                                
                                 <a href="<?php echo  base_url(); ?>index.php/welcome/cca_skills" style="color:#169FE6; float:right;">Read More...</a>                             
                           </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                                <img src="<?php echo base_url(); ?>Style/images/2.jpg" alt="cea">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Victor Johns</h5>-->
                                <p class="small-text">Besides franchisees, in the year 2013 requirements came in from university colleges to provide a short term courses to their students in their own premise.....</p>
                                <a href="<?php echo  base_url(); ?>index.php/welcome/cca_college" style="color:#169FE6; float:right;">Read More...</a>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                                <img src="<?php echo base_url(); ?>Style/images/3.jpg" alt="excel">
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
                                <img src="<?php echo base_url(); ?>Style/images/4.jpg" alt="excel">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Charles Conway</h5>-->
                                <p class="small-text">With the Great success of our institution, A thought of why not start up with Franchisee’s clicked us.....</p>
                                <a href="<?php echo  base_url(); ?>index.php/welcome/institute" style="color:#169FE6; float:right;">Read More...</a>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->


               