<script type="text/javascript">
$(document).ready(function(){
    $("#about").removeClass("active");
    $("#home").removeClass("active");
    $("#course").removeClass("active");
    $("#placement").addClass("active");
    $("#studmnu").removeClass("active");
    $("#franmnu").removeClass("active");
    $("#brandmnu").removeClass("active");
    $("#galmnu").removeClass("active");
    $("#cntmnu").removeClass("active");
 });   
</script>
<script>
function More(id)
{
	window.location="<?php echo base_url(); ?>index.php/welcome/more_testimonal?id="+id;
}
</script>

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
          <div class="lms_hover_section"> 
			<?php if($row->Image!=""){ ?>
                 <img src="<?php echo  base_url(); ?>uploads/Testimonial/<?php echo $row->Image; ?>" alt="" style="height:150px;" />
			<?php } else{ ?>
				<img src="<?php echo  base_url(); ?>Style/images/testimonial/testimonial2.jpg" alt="" style="height:150px;" />
			<?php } ?>
                <div class="lms_hover_overlay"><a class="lms_image_link" data-gal="prettyPhoto[gallery2]" href="<?php echo base_url(); ?>Style/images/team/team_list1.jpg"></a></div>
            </div>
            <a href="#"><h3><i class="fa fa-user"></i> <?php echo $row->Name; ?></h3></a>
           
          <p><?php echo substr("$row->Content",0,300)."......."; ?></p>
            
            
         <a href="javascript:;" class="btn btn-default" id="tp" onclick="More(<?php echo $row->T_id; ?>);">Read More...</a>
         					
        </div>
		 <?php } } else { ?>
        
					<div class="alert alert-success" id="alert1">
					<strong>No Data Available.</strong> 
					</div>
    
		 <?php } ?>
        
        </div>
        
        
    </div>
  
  <!--sidebar start-->
    <div  class="col-xs-12 col-md-4 col-lg-4">
       <?php $this->load->view('front_view/sidebar'); ?>
    </div>
    <!--sidebar end--> 
 </div>
</div>

<!--main container end-->