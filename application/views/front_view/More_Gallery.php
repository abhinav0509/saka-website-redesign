<script type="text/javascript">
$(document).ready(function(){
    $("#about").removeClass("active");
    $("#home").removeClass("active");
    $("#course").removeClass("active");
    $("#placement").removeClass("active");
    $("#studmnu").removeClass("active");
    $("#franmnu").removeClass("active");
    $("#brandmnu").removeClass("active");
    $("#galmnu").addClass("active");
    $("#cntmnu").removeClass("active");
 });   
</script>
<style>
.lms_hover_section > img {
    height: 180px;
}

#courses_item_detail2 > img {
    height: 400px;
}

.lms_popular_courses_item {
    border: 1px solid #ccc;
    margin-bottom: 15px;
}
.lms_hover_section img {
    margin-bottom: 10px;
    padding-right: 10px;
    padding-top: 7px;
    width: 100%;
}
.galnm h3 {
    border-top: 1px solid #ccc;
    padding-bottom: 11px;
    padding-left: 70px;
    padding-top: 15px;
}

.lms_popular_courses_item h3 {
    font-size: 22px;
    line-height: 22px;
    margin-bottom: 0;
    margin-top: 0;
}
</style>
<!-- page title Start -->
<div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
    <div class="container">
      <div class="lms_title">CCA Gallery</div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="index-2.html">Home</a></li>
          <li class="active">CCA Gallery</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- page title end -->

<!--main container start-->
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="lms_title_center">
        <div class="lms_heading_1">
          <h2 class="lms_heading_title"><?php foreach($results as $row1){ echo $row1->album_name; }?></h2>
        </div>
        <p></p>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
      

      <div class="lms_popular_courses">
        <div id="lms_popular_courses_slider" class="owl-carousel owl-theme">
           <?php if(!empty($results)) { foreach($results as $row) 
              { 
               
                $x=explode(",",$row->name); 
              }
            ?>
                    
            <?php 
            
            $cnt=count($x);
            $j=0;
            for($i=0;$i<$cnt;$i++)
            {
            ?>
          <div class="lms_popular_courses_slider_item">
            <div class="lms_popular_courses_item galnm">
              <div class="lms_hover_section"> <img src="<?php echo base_url(); ?>uploads/Gallery/<?php echo $x[$i]; ?>" alt="" />
                <div class="lms_hover_overlay"> <a id="<?php echo $j; ?>" class="lms_image_link"></a> </div>
              </div>
              <h3><?php echo $row->album_name."(".($i+1).")"; ?></h3>
            </div>
           </div>
            <?php $j++; } }  ?>

           </div>

         <div class="customNavigation"> <a class="lms_prev_next prev"><i class="fa fa-angle-left"></i></a> <a class="lms_prev_next next"><i class="fa fa-angle-right"></i></a> <a class="lms_prev_next">+</a> </div>
     


    </div>
  </div>

    <div class="col-lg-6 col-md-6 col-sm-6">
      <?php for($k=0; $k<$cnt; $k++){ ?>
      
      <div class="lms_popular_courses_item_detail" id="courses_item_detail<?php echo $k; ?>"> <img src="<?php echo base_url(); ?>uploads/Gallery/<?php echo $x[$k]; ?>" alt="" />
        
        <a href="<?php echo base_url();?>index.php/welcome/Gallery" class="btn btn-default"><i class="fa fa-arrow-left"></i>
  Back To Gallery</a>
        
      </div>
      <?php } ?>
   

    </div>
  </div>
  <!--Our Popular Courses end--> 
  
  
</div>

<!--main container end-->