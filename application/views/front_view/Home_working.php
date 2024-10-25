<!--Our Partners start-->
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="lms_title_center">
        <div class="lms_heading_1">
          <h2 class="lms_heading_title">CCA Brands</h2>
        </div>
       
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="lms_our_partner">
        <div id="lms_our_partner_slider" class="owl-carousel owl-theme">
          <div class="lms_our_partner_slider_item">
            <div class="lms_our_partner_item"> <img src="<?php echo base_url(); ?>Style/images/partner/4.jpg" alt="partner" />
              <hr/>
              
              <p>CCA is among the nation's most placed consultancy. CCA has a long history of established programs in Accounts education, research and service. <br/><a href="<?php echo base_url();?>index.php/welcome/institute">Read More → </a></p>
              
            </div>
          </div>
          <div class="lms_our_partner_slider_item">
            <div class="lms_our_partner_item"> <img src="<?php echo base_url(); ?>Style/images/partner/3.jpg" alt="partner" />
              <hr/>
             
              <p>CCA is among the nation's most placed consultancy. CCA has a long history of established programs in Accounts education, research and service. <br/><a href="<?php echo base_url();?>index.php/welcome/franchisee">Read More → </a>   </p>
              
            </div>
          </div>
          <div class="lms_our_partner_slider_item">
            <div class="lms_our_partner_item"> <img src="<?php echo base_url(); ?>Style/images/partner/2.jpg" alt="partner" />
              <hr/>
              
              <p>CCA is among the nation's most placed consultancy. CCA has a long history of established programs in Accounts education, research and service. <br/><a href="<?php echo base_url();?>index.php/welcome/cca_college">Read More → </a>  </p>
             
            </div>
          </div>
          <div class="lms_our_partner_slider_item">
            <div class="lms_our_partner_item"> <img src="<?php echo base_url(); ?>Style/images/partner/1.jpg" alt="partner" />
              <hr/>
             
              <p>CCA is among the nation's most placed consultancy. CCA has a long history of established programs in Accounts education, research and service.  <br/><a href="<?php echo base_url();?>index.php/welcome/cca_skills">Read More → </a> </p>
             
            </div>
          </div>
        </div>
        <div class="customNavigation"> <a class="lms_prev_next prev"><i class="fa fa-angle-left"></i></a> <a class="lms_prev_next next"><i class="fa fa-angle-right"></i></a> </div>
      </div>
    </div>
  </div>
</div>
<!--Our Partners end-->


<div class="container-fluid"> 
  <!--Testimonials start-->
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="lms_title_center">
        <div class="lms_heading_1">
          <h2 class="lms_heading_title">Testimonials</h2>
        </div>
        <p>Look what the Students says about us </p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="lms_testimonials_bg" data-stellar-background-ratio="0.5">
      <div class="lms_testimonials_bg2">
        <div class="container">
          <div class="lms_testimonials wow bounce">
            <div id="lms_testimonials_slider" class="owl-carousel owl-theme">


			<?php if(!empty($results)){ foreach($results as $row)
						   {
						   ?>


              <div class="lms_testimonials_slider_item">
                <p class="lms_testimonial_quote">"</p>
                <p class="lms_testimonials_txt"><?php echo $row->Content; ?></p>
                 <img src="<?php echo  base_url(); ?>uploads/Testimonial/<?php echo $row->Image; ?>" alt="" />
                <h4><?php echo $row->Name; ?></h4>
              </div>

				   <?php } } else {?>


              <div class="lms_testimonials_slider_item">
                <p class="lms_testimonial_quote">"</p>
                <p class="lms_testimonials_txt">I am very Thankful to CCA for Best training in Smart Tally & gave me Job in Company.</p>
                <img src="<?php echo base_url();?>Style/images/testimonial/testimonial2.jpg" alt="Testimonials" />
                <h4>Mr.ABC</h4>
              </div>
              <div class="lms_testimonials_slider_item">
                <p class="lms_testimonial_quote">"</p>
                <p class="lms_testimonials_txt">I am very Thankful to CCA for Best training in Smart Excel & gave me Job in Company.</p>
                <img src="<?php echo base_url();?>Style/images/testimonial/testimonial2.jpg" alt="Testimonials" />
                <h4>Mr.PQR</h4>
              </div>

				   <?php } ?>

            </div>
            <div class="customNavigation"> <a class="lms_prev_next prev"><i class="fa fa-angle-left"></i></a> <a class="lms_prev_next next"><i class="fa fa-angle-right"></i></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!--Testimonials end--> 
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="lms_title_center">
        <div class="lms_heading_1">
         
        </div>
        
      </div>
    </div>
  </div>
  <!--offer courses start-->
  <div class="lms_course_syllabus lms_offer_courses">
    <div class="row">
      <div  class="col-lg-6 col-md-6 col-sm-6">
         <div  style="border:#CCCCCC 1px solid;"class="lms_sidebar_item">
            
                <div class="panel panel-default">
                 <div class="panel-heading">
                    <h4 class="panel-title"> <a href="#"> Recent News </a> </h4>
                  </div>
                 <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                     <div class="lms_sidebar_rp"> 
                      <marquee direction="up" scrollamount="3" onMouseOver="this.stop();" onMouseOut="this.start();"  height="250px" >
                        <ul>
                       
                         <li> <!--<a href="#"> <img src="images/sidebar/recent_post1.jpg" alt=""/>-->
                           <p style="padding-left:10px; text-align:justify;padding-right:10px; font-family:calibri;">HURRAY!!!! FREE TRAINING !! Presents 7 Days FREE Training on Tally.ERP 9 <br/>Day /Date: 1st Oct...<br/><div class="read"><a href="#">Read More → </a></div></p>
                            </li>
                         <li> <!--<a href="#"> <img src="images/sidebar/recent_post2.jpg" alt=""/>-->
                           <p style="padding-left:10px; padding-right:10px; font-family:calibri;">Advanced Excel Corporate Training For Company Employee/Professionals/Students. Training On: Advanced Excel 2010<br/> Duration : 15 Days Program, 1... <br/><div class="read"><a href="#">Read More → </a></div>
 </p>
                            </li>
                         <li> <!--<a href="#"> <img src="images/sidebar/recent_post3.jpg" alt=""/>-->
                           <p style="padding-left:10px; text-align:justify;padding-right:10px;font-family:calibri;">HURRAY!!!!  FREE TRAINING !! Presents 7 Days FREE Training on Tally.ERP 9 <br/>Day /Date: 1st Oct... <br/><div class="read"><a href="#">Read More → </a></div></p>
                           </li>
                           
                       </ul>
                       </marquee>
                      </div>
                   </div>
                  </div>
               </div>
               </div>
               </div>
      <div  class="col-lg-6 col-md-6 col-sm-6">
       <div  style="border:#CCCCCC 1px solid;" class="lms_sidebar_item">
            
                <div class="panel panel-default">
                         <div class="panel-heading">
                            <h4 class="panel-title"> <a href="#"> Our Partners</a> </h4>
                         </div>
               <!-- <div class="col-sm-6 col-md-6">-->
                
                  <div  class="lms_experts_team">
        <div id="lms_experts_team_slider" class="owl-carousel owl-theme">
          <div class="lms_experts_team_slider_item">
          <h3 style="font-size:16px; font-family:calibri; text-align:center;">Wipro</h3>
            <div class="lms_hover_section"> <img src="<?php echo base_url();?>Style/images/team/experts_team1_smaill.jpg" alt="" />
              <div class="lms_hover_overlay"><a id="11" class="lms_image_link"></a></div>
            </div>
            
          </div>
          <div class="lms_experts_team_slider_item">
           <h3 style="font-size:16px; font-family:calibri; text-align:center;">L & T Infotech</h3>
            <div class="lms_hover_section"> <img src="<?php echo base_url();?>Style/images/team/experts_team2_smaill.jpg" alt="" />
              <div class="lms_hover_overlay"><a id="22" class="lms_image_link"></a></div>
            </div>
           
          </div>
          <div class="lms_experts_team_slider_item">
           <h3 style="font-size:16px; font-family:calibri; text-align:center;">WNS</h3>
            <div class="lms_hover_section"> <img src="<?php echo base_url();?>Style/images/team/experts_team3_smaill.jpg" alt="" />
              <div class="lms_hover_overlay"><a id="33" class="lms_image_link"></a></div>
            </div>
           
          </div>
         <!-- item starts-->
           <div class="lms_experts_team_slider_item">
           <h3 style="font-size:16px; font-family:calibri; text-align:center;">Finolex</h3>
            <div class="lms_hover_section"> <img src="<?php echo base_url();?>Style/images/team/experts_team5_smaill.jpg" alt="" />
              <div class="lms_hover_overlay"><a id="33" class="lms_image_link"></a></div>
            </div>
            
          </div>
          
         <!-- item end-->
         
         
          <!-- item starts-->
           <div class="lms_experts_team_slider_item">
           <h3 style="font-size:16px; font-family:calibri; text-align:center;">Venky's</h3>
            <div class="lms_hover_section"> <img src="<?php echo base_url();?>Style/images/team/experts_team6_smaill.jpg" alt="" />
              <div class="lms_hover_overlay"><a id="33" class="lms_image_link"></a></div>
            </div>
            
          </div>          
         <!-- item end-->
         
         
         
          <!-- item starts-->
           <div class="lms_experts_team_slider_item">
           <h3 style="font-size:16px; font-family:calibri; text-align:center;">Exl Service</h3>
            <div class="lms_hover_section"> <img src="<?php echo base_url();?>Style/images/team/experts_team7_smaill.jpg" alt="" />
              <div class="lms_hover_overlay"><a id="33" class="lms_image_link"></a></div>
            </div>
            
          </div>          
         <!-- item end-->
         
         
          <!-- item starts-->
           <div class="lms_experts_team_slider_item">
            <h3 style="font-size:16px; font-family:calibri; text-align:center;">Syntel</h3>
            <div class="lms_hover_section"> <img src="<?php echo base_url();?>Style/images/team/experts_team8_smaill.jpg" alt="" />
              <div class="lms_hover_overlay"><a id="33" class="lms_image_link"></a></div>
            </div>
           
          </div>          
         <!-- item end-->
         
         
         
          <div class="lms_experts_team_slider_item">
          <h3 style="font-size:16px; font-family:calibri; text-align:center;">IBM daksh</h3>
            <div class="lms_hover_section"> <img src="<?php echo base_url();?>Style/images/team/experts_team4_smaill.jpg" alt="" />
              <div class="lms_hover_overlay"><a id="44" class="lms_image_link"></a></div>
            </div>
            
          </div>
        </div>
        <div style="padding-top: 34px;" class="customNavigation"> <a class="lms_prev_next prev"><i class="fa fa-angle-left"></i></a> <a class="lms_prev_next next"><i class="fa fa-angle-right"></i></a> </div>
      </div>
               </div>
               </div>
               </div>
               </div>
               
               
</div>
</div>

</div>