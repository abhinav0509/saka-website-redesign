<div class="container coursecontent">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="index.html">Home</a></h6>
                    <h6><a href="Course.html">Courses</a></h6>
                    <h6><span class="page-active">Smart Tally</span></h6>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <!-- Here begin Main Content -->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="event-container clearfix">
						<?php if(!empty($results)){ foreach($results as $row) { ?>
                            <div class="left-event-content">
                                <img src="<?php echo  base_url(); ?>uploads/Testimonial/<?php echo $row->Image; ?>" height="150" width="200" alt="">
                                <div class="event-contact">
                                    <a href="<?php echo base_url(); ?>index.php/welcome/stud_testimonal"><h6 style="color:blue;"><i class="fa fa-long-arrow-left"></i>&nbsp;Back To Testimonial</h6></a>
                                    
                                </div>
                            </div> <!-- /.left-event-content -->
                            <div class="right-event-content">
                                <h2 class="event-title"><?php echo $row->Name; ?></h2> 
                                <!----<span class="event-time"><i class="fa fa-globe"></i>&nbsp;&nbsp;Accountant</span>---->
                                <p><?php echo $row->Content; ?></p>
								<hr />

                               
                            </div> <!-- /.right-event-content -->
						<?php } } ?>
							
                        </div> <!-- /.event-container -->
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.col-md-8 -->

            <!-- Here begin Sidebar -->
           <div class="col-md-4">
                <div class="widget-item rform">
                    <div class="request-information">
                        <h4 class="widget-title">Get in touch with us</h4>
                        <form class="request-info clearfix"> 
						<div class="full-row">
                                <input type="text" id="yourname" name="yourname" placeholder="Your Name">
                                
                        </div> <!-- /.full-row -->
						<div class="full-row">
                                <input type="text" id="contact" name="contact" placeholder="Contact No">                                
                        </div> <!-- /.full-row -->
						
                            <div class="full-row">
                               <div class="input-select">
                                    <select name="state" style="color:#999;" id="state" class="postform" placeholder="State">
                                        <option value="-1">State</option>
                                        <!--<optgroup label="Picnic">
                                          <option>Mustard</option>
                                          <option>Ketchup</option>
                                          <option>Relish</option>
                                        </optgroup>
                                        <optgroup label="Camping">
                                          <option>Tent</option>
                                          <option>Flashlight</option>
                                          <option>Toilet Paper</option>
                                        </optgroup>-->
                                    </select>
                                </div> <!-- /.input-select -->  
                            </div> <!-- /.full-row -->
                            <div class="full-row">
                                <input type="text" id="city" name="city" placeholder="City">                                
                           </div> <!-- /.full-row --> 
                            <div class="full-row">
                               <div class="input-select">
                                    <select name="interest" id="interest" class="postform">
                                        <option value="-1">Interest</option>
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
                                 <textarea id="yourname" name="yourname" style="width:100%; border:1px solid; border-color: #D5DBE0; color:#999; height:38px;"  placeholder="Message"></textarea>
                            </div> <!-- /.full-row -->

                            <div class="full-row">
                                <div class="submit_field">
                                    <span class="small-text pull-left"></span>
                                    <input class="mainBtn pull-right" type="submit" style="margin-top: -11px;" name="" value="Submit">
                                </div> <!-- /.submit-field -->
                            </div> <!-- /.full-row -->


                        </form> <!-- /.request-info -->
                    </div> <!-- /.request-information -->
                </div> <!-- /.widget-item -->
				
				<div class="widget-main">
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
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->
				
            </div> <!-- /.col-md-4 -->
    
        </div> <!-- /.row -->
    </div> <!-- /.container -->