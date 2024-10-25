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
                                 <textarea id="msg" name="msg" style="width:100%; border:1px solid; border-color: #000;  height:38px;"  placeholder="Message"></textarea>
                            </div> <!-- /.full-row -->

                            <div class="full-row">
                                <div class="submit_field">
                                    <span class="small-text pull-left"></span>
                                    <input class="mainBtn pull-right" type="submit" style="margin-top: -11px;" name="submit" onclick="return val()" value="Submit">
                                </div> <!-- /.submit-field -->
                            </div> <!-- /.full-row -->


                        </form> <!-- /.request-info -->
                    </div> <!-- /.request-information -->
                </div> <!-- /.widget-item -->


<div class="widget-main">
                    <div class="widget-main-title">
                        <h4 class="widget-title">Courses</h4>
                    </div>
                    <div class="widget-inner">
                        <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                                <img src="<?php echo base_url(); ?>Style/images/tally.jpg" alt="tally">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Betty Hunt</h5>-->
                                <p class="small-text">CCA offers a Tally Professional Course using latest version of Tally. ERP9 in the field of computerised accounts which is widely used in and across India..</p>
                                 <a href="#" style="color:#169FE6; float:right;">Read More...</a>                             
						   </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                                <img src="<?php echo base_url(); ?>Style/images/cea.jpg" alt="cea">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Victor Johns</h5>-->
                                <p class="small-text">CCA offers a Certified-e-Accountant course which covers the following 15 modules . The syllabus for this course is designed on a research made by.</p>
								<a href="#" style="color:#169FE6; float:right;">Read More...</a>
							</div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                           <div class="prof-thumb">
                                <img src="<?php echo base_url(); ?>Style/images/excel.jpg" alt="excel">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Charles Conway</h5>-->
                                <p class="small-text">Excel 2010 includes Complete MS Excel 2010,all Formulas & Functions Excel 2010Macros & VBA Programming in Excel 2010 with its Examples.</p>
                                <a href="#" style="color:#169FE6; float:right;">Read More...</a>
							</div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->
               
                <div class="widget-main">
                            <div class="widget-main-title">
                                <h4 class="widget-title">Latest News</h4>
                            </div> <!-- /.widget-main-title -->
                            <div class="widget-inner">
                               <marquee direction="up" scrollamount="2" onMouseOver="this.stop();" onMouseOut="this.start();">
                                      <div  class="one" style="padding: 5px; margin: 10px; border-bottom: 1px solid;">
                                        HURRAY!!!! !!!! FREE TRAINING !! Presents 7 Days FREE Training  on  Tally.ERP 9 Day /Date:  1st Oct...
                                        <br/>
                                        <a href="#">Read More...</a>
                                      </div>
                                      <div  class="one" style="padding: 5px; margin: 10px; border-bottom: 1px solid;">
                                       Advanced Excel Corporate Training For Company Employee/Professionals/Students. Training On: Advanced Excel 2010 Duration : 15 Days Program, 1...
                                        <br/>
                                        <a href="#">Read More...</a>
                                      </div>
                                </marquee>
                            </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->

               <div class="widget-main">
                            <div class="widget-main-title">
                                <h4 class="widget-title">Upcoming Batches</h4>
                            </div> <!-- /.widget-main-title -->
                            <div class="widget-inner">
                    <marquee direction="up" scrollamount="2" onMouseOver="this.stop();" onMouseOut="this.start();">
                              <div  class="one" style="padding: 5px; margin: 10px; border-bottom: 1px solid;">
                                <h3>Smart Tally</h3>
                                <p class="blink">New Batch start Date<p>
                                    <p>21-4-2015&nbsp;&nbsp;&nbsp;<a href="#">View More...</a></p>
                                
                                <p></p>
                              </div>
                          <div  class="one" style="padding: 5px; margin: 10px; border-bottom: 1px solid;">
                                <h3>Smart Tally</h3>
                                <p class="blink">New Batch start Date<p>
                                    <p>21-4-2015&nbsp;&nbsp;&nbsp;<a href="#">View More...</a></p>
                                
                                <p></p>
                              </div>
                               <div  class="one" style="padding: 5px; margin: 10px; border-bottom: 1px solid;">
                                <h3>Smart Tally</h3>
                                <p class="blink">New Batch start Date<p>
                                    <p>21-4-2015&nbsp;&nbsp;&nbsp;<a href="#">View More...</a></p>
                                
                                <p></p>
                              </div>
                               <div  class="one" style="padding: 5px; margin: 10px; border-bottom: 1px solid;">
                                <h3>Smart Tally</h3>
                                <p class="blink">New Batch start Date<p>
                                    <p>21-4-2015&nbsp;&nbsp;&nbsp;<a href="#">View More...</a></p>
                                
                                <p></p>
                              </div>
                     </marquee>
                            </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->