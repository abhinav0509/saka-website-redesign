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
$(document).ready(function(){


});
</script>

<script>
function More(id)
{
	window.location="<?php echo base_url(); ?>index.php/welcome/detail_news?id="+id;
}



</script>

<!-- page title Start -->


<div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
    <div class="container">
      <div class="lms_title">News & Events</div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">News & Events</li>
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
          <h2 class="lms_heading_title">News & Events</h2>
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
			<?php if($row->image!=""){ ?>
				<div class="lms_hover_section"> 			
				  <img src="<?php echo  base_url(); ?>uploads/News/<?php echo $row->image; ?>" style="border:1px solid #CCC; height: 120px; padding: 5px;" alt="" />
					<div class="lms_hover_overlay"><a class="lms_image_link" data-gal="" href="javascript:;"></a></div>
				</div>
			<?php } ?>
            <a href="#"><h3><i class="fa fa-file-text-o"></i> <?php echo $row->Title; ?></h3></a>
           
           <p><?php echo substr("$row->Description",0,300)."......."; ?></p>
           <br /> 
            
         <a href="javascript:;" class="btn btn-default" id="tp" onclick="More(<?php echo $row->n_id; ?>);">Read More...</a>
         					
        </div>
		 <?php } } else { ?>
        
					<div class="alert alert-success" id="alert1">
					<strong>No Data Available.</strong> 
					</div>
    
		 <?php } ?>
        
        </div>
        
         <div class="row">
         <div class="col-lg-12">
            <div class="lms_pagination Pager">
                <?php if(isset($links)){
                   echo $links;
                  } ?>
              </div>
            </div>
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