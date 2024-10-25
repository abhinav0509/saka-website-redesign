<style>
p {
    line-height: 20px;
    padding-top: 12px;
    text-align: justify;
    font-family: calibri;
    font-size: 14px;
}
</style>

<!-- page title Start -->
<div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
    <div class="container">
      <div class="lms_title">Testimonials</div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Testimonials</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- page title end --> 


<!--main container start-->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="lms_title_center">
        <div class="lms_heading_1">
          <h2 class="lms_heading_title">Student's Testimonials</h2>
        </div>
      
      </div>
    </div>
  </div>
  
  <div class="row">
  <div class="col-lg-8">
      
        
        <div class="lms_cource lms_team_list">
        
		 <?php if(!empty($results)){ foreach($results as $row)
						   {
						   ?>
		
        <div class="lms_cource_list">
         <div class="col-md-3"> 
          <div class="lms_hover_section"> 
              <?php if($row->Image!=""){ ?>
                 <img src="<?php echo  base_url(); ?>uploads/Testimonial/<?php echo $row->Image; ?>" alt="" style="height:150px;" />
			<?php } else{ ?>
				<img src="<?php echo  base_url(); ?>Style/images/testimonial/testimonial2.jpg" alt="" style="height:150px;" />
			<?php } ?>
                <div class="lms_hover_overlay"><a class="lms_image_link" href="javascript:;"></a></div>
            </div>
            
           </div>
           <div class="col-md-9">
              <a href="#"><h3><i class="fa fa-user"></i> <?php echo $row->Name; ?></h3></a>
              <p><?php echo $row->Content; ?></p>           
              <br />
              <a href="<?php echo base_url(); ?>index.php/welcome/stud_testimonal" class="btn btn-default" id="tp"><i class="fa fa-arrow-left"></i> Back to Testimonial</a>
         		</div>			
        </div>
		 <?php } } else { ?>
        
					<div class="alert alert-success" id="alert1">
					<strong>No Data Available.</strong> 
					</div>
    
		 <?php } ?>
        
        </div>
        
        
    </div>
  
  <!--sidebar start-->
    <div  class="col-lg-4 col-md-4 col-sm-5">
       <?php $this->load->view('front_view/sidebar'); ?>
    </div>
    <!--sidebar end--> 
 </div>
</div>

<!--main container end-->