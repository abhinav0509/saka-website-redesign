
<script>
var j=jQuery.noConflict();
function sval()
{
    
    j("#stud").validate({

            rules:{
                    name_id:"required",
                    cont:"required",
                    cmp:"required",
                    msg:"required",
                    email_id:"required"
                },
            message:{
                    name_id:"Please Enter Your Full Name",
                    cont:"Please Enter Your Contact No",
                    cmp:"Please Enter Subject",
                    msg:"Please Fill The Information",
                    email_id:"Please Enter Your Email Id"
            }
        });
}

function sval1()
{
    
    j("#stud1").validate({

            rules:{
                    fname:"required",
                    finst:"required",
                    bAdd:"required",
                    stat:"required",,
                    cit:"required",
                    femail:"required",
                    fCont1:"required",
                },
            message:{
                    fname:"Please Enter Your Full Name",
                    finst:"Please Enter Your Institute Name",
                    bAdd:"Please Enter Buissness Address",
                    stat:"Please Select State",
                    cit:"Please Select City",
                    femail:"Please Enter Your Email Id",
                    fCont1:"Please Enter Contact No",
            }
        });
}


</script>

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
            <div class="col-md-8">
			<div class="widget-main">
			
                    <div class="widget-inner shortcode-typo">
								
                               
                                    
                                        <div class="contact-page-content">
                    <form class="request-info clearfix" id="stud" method="post" action="<?php echo base_url(); ?>index.php/welcome/student_enquiry" > 
						<div class="contact-heading">
                        <h3 style="margin-top:-57px;">Enquiry Form For Student.</h3>
						<hr>
                    </div>
                     <p class="full-row">
                            <span class="contact-label">
                                <?php if(isset($message)) { ?>
                                <label for="name-id"></label><span style="color:green;font-size:14px; "><?php echo $message; ?></span>
                             </span>
                             <?php } ?>
                            
                        </p>
                    <div class="contact-form clearfix">

                        <p class="full-row">
                            <span class="contact-label">
                                <label for="name-id">Name:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
                             </span>
                            <input type="text" id="name_id" name="name_id">
                        </p>
                       <!-- <p class="full-row"> 
                            <span class="contact-label">
                                <label for="surname-id">Last Name:</label>
                             </span>
                            <input type="text" id="surname-id" name="surname-id">
                        </p>-->
                         
                        <p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">E-mail:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
                               
                            </span>
                            <input type="email" id="email_id" name="email_id">
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Contact:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
                                
                            </span>
                            <input type="text" id="cont" name="cont">
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Subject:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
                                
                            </span>
                            <input type="text" id="cmp" name="cmp">
                        </p>
                        <p class="full-row">
                            <span class="contact-label">
                                <label for="message">Message:</label><span style="margin-left:10px; color:red;font-size:12px; ">*</span>
                               
                            </span>
                            <textarea name="msg" id="msg" rows="4" style="width:273px;"></textarea>
                        </p>

						<hr>
                         <span class="contact-label">
                                
                               
                            </span>
                        <p class="full-row">
                            <input class="mainBtn" type="submit" name="submit" value="Send Message" onclick="return sval()" />
                        </p>
                    </div>
                   
					</form>
                </div>
			
                
                                    
                                   
                                
              

                <div class="row">
                    <div class="col-md-12">
                        <div class="load-more-btn">
                            <!---<a href="#">Click here to load more events</a>--->
                        </div>
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
				</div>
				</div>
            </div> <!-- /.col-md-8 -->

            <!-- Here begin Sidebar -->
                       
			
			
			<div class="col-md-4">
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

               
                    </div> <!-- /.widget-inner -->
					
					
	
	
	
	
	
        </div> <!-- /.row -->
    </div> <!-- /.container -->