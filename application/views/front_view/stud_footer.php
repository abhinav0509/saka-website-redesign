<style>
#lms_footer ul li{
  list-style: none;
}
</style>

<footer id="lms_footer">
  <div class="lms_footer_center">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="lms_footer_logo"> <img src="<?php echo base_url();?>Style/images/logo.png" alt="footer logo"/> </div>
          <p>The College of Computer Accountants is a major public, comprehensive and research institute. The state's oldest and most comprehensive institute. 

Read More...</p>
          <div class="lms_social">
            <ul>
              <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google+"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
            </ul>
          </div>

         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="lms_footer_course_category">
            <h3></h3>
            <ul>
			<li><a href="<?php echo base_url();?>index.php/welcome/terms">Terms & Condition</a></li>
			<li><a href="<?php echo base_url();?>index.php/welcome/privacy">Privacy Policy</a></li>
			<li><a href="<?php echo base_url();?>index.php/welcome/cancellation">Cancellation & Refund</a></li>
			<li><a href="<?php echo base_url();?>index.php/welcome/shipping">Shipping Policy</a></li>
     
		</ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="lms_footer_course_category">
            <h3>CCA Brands</h3>
            <ul>
             <li><a href="<?php echo base_url();?>index.php/welcome/cca_skills">CCA Skills</a></li>
			       <li><a href="<?php echo base_url();?>index.php/welcome/franchisee">CCA Franchisee</a></li>
			       <li><a href="<?php echo base_url();?>index.php/welcome/institute">CCA Group of Institutes</a></li>
			       <li><a href="<?php echo base_url();?>index.php/welcome/cca_college">CCA Colleges</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="lms_footer_contact">
            <h3>Contacts</h3>
            <p>Head Office</p>
            <p class="lms_address"><span class="lms_theme_color">Address :</span> 310,311, 3rd Floor, Mahalaxmi Market, Near Desai Bandhu, Shanipar Chowk, Mandai Road, Shukrawar Peth, Pune -411002 </p>
            <p class="lms_phone"><span class="lms_theme_color">Phone no :</span>020-32392121 / 09373703928</p>
            <p class="lms_fax"><span class="lms_theme_color">Fax no :</span> +00 1234 56789</p>
            <p class="lms_email"><span class="lms_theme_color">Email id :</span> <a href="mailto:enqiury@ccaindia.in">  enqiury@ccaindia.in</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="lms_footer_bottom">
    <p style="text-align: center;">&copy; CCA India. All rights Reserved.<br/> Developed by <a href="http://mavericksoftware.in" target="_blank" style="color: #ff9933;">Maverick Software (I) Pvt. Ltd.</a></p>
  </div>
</footer>

<!-- Enqury Popup Start-->

<a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>
<!--<div class="lms_chat_window">
  <div class="lms_chat_header">
      <div class="lms_chat_icon_left"><i class="fa fa-envelope-o"></i></div>
        <h4>Enquiry Form</h4>
        <div class="lms_chat_icon_right"><a><img src="images/icon/close.png" alt="close" /></a></div>
    </div>
    <div class="lms_chat_body">
      <div class="lms_group_descusion_main">
        <div class="lms_group_descusion">
          <ul>
          <form action="#"> 
          <li> <input style=" width:230px; height:30px;" name="fname" type="text" class="appt-form-txt" placeholder=" Name*(required)" required title="Please Type your name" pattern="[a-zA-Z]+"/></li>
                
                <li><input style=" width:230px; height:30px; margin-top:10px;"  name="phone" type="text" class="appt-form-txt" placeholder="Phone*(required)" required title="Please Type phoneno" pattern=                   
                "^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$" /></li>
                <li><input  style="width:230px; height:30px; margin-top:10px;" name="email"  type="email" class="appt-form-txt" placeholder="Email"  required title="Please Type your Emailid"/></li>
              <select name="state" style="color:#999;  width:230px; height:30px; margin-top:20px;" id="state" class="postform" placeholder="State" required="" title="Please Select Field From List">
                                        
                                         <option value="">State</option>
                                                                                    <option>Maharashtra</option>
                                                                                    <option>Rajasthan</option>
                                                                                    <option>Gujrat</option>
                                                                                    <option>Punjab</option>
                                                                                    <option>MP</option>
               </select>
               <li> <input style=" width:230px; height:30px; margin-top:10px;" name="city" type="text" class="appt-form-txt" placeholder=" City" required title="Please Type your city" /></li>
               <select name="enquiry" style="color:#999;  width:230px; height:30px; margin-top:13px;" id="enquiry" class="postform" placeholder="Enquiry" required="" title="Please Select Field From List">
                                        
                                         <option value="">Enquiry for</option>
                                                                                    <option>Course</option>
                                                                                    <option>Franchise</option>
                                                                                    <option>Student</option>
                                                                                   
                                                                                   
               </select><br/><br/>
            
               
                <button type="submit" style="background-color:#003399; color:#FFFFFF; width:100px; height:30px;" >Submit</button>
                </form>
          </ul>
        </div>
        
      </div>
    </div>
</div>-->


        
      </div>
    </div>
</div>


<!-- All Js And CSSS Start-->

<!--main js file start--> 

<!--plugin--> 

<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/plugin/appear/jquery.appear.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/plugin/count/jquery.countTo.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/plugin/mediaelement/mediaelement-and-player.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/plugin/mixitup/jquery.mixitup.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/plugin/modernizr/modernizr.custom.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/plugin/owl-carousel/owl.carousel.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/plugin/parallax/jquery.stellar.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/plugin/prettyphoto/js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/plugin/revslider/js/jquery.themepunch.plugins.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/plugin/revslider/js/jquery.themepunch.revolution.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/plugin/single/single.js"></script> 
 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/plugin/wow/wow.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/grid-gallery.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/bootstrap.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/custom.js"></script> 
<!--main js file end-->
</body>
<!-- Body End -->


</html>


<!-- All Js And CSSS End-->




<!-- Enqury Popup End-->