
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
                                 <textarea id="msg" name="msg" style="width:100%; border:1px solid; border-color: #000; height:38px;"  placeholder="Message"></textarea>
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