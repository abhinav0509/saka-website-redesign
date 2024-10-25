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
.galnm h3 {
    
    padding-left: 20px;
    padding-top:8px;
    border-top:1px solid #CCC;
}
.lms_hover_section img {
    margin-bottom: 10px;
    padding-right: 10px;
    padding-top: 7px;
    width: 100%;
	height: 170px !important;
}
.lms_course_syllabus .lms_video {
    margin-bottom: 20px;
    border:1px solid #CCC;
}
.lms_course_syllabus .lms_video {
	margin-bottom: 25px;
	border: 1px solid #CCC;
	height: 250px !important;
}

</style>

<script>
function More(id)
{
  window.location="<?php echo base_url(); ?>index.php/welcome/more_Gallery?id="+id;
}

</script>

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
    <div class="col-lg-8 col-lg-offset-2">
      <div class="lms_title_center">
        <div class="lms_heading_1">
          <h2 class="lms_heading_title">CCA Gallery</h2>
        </div>
        <!--<p>Duis tortor lacus, dictum nec augue a, euismod sagittis eros. Aliquam id ligula 
          malesuada, egestas est ultricies, ullamcorper diam.</p>-->
      </div>
    </div>
  </div>
  <!--offer courses start-->
  <div class="lms_course_syllabus lms_offer_courses">
    <div class="row">
      
      
      <?php if(!empty($results)) { foreach($results as $row) 
              { 
            ?>
            <?php 
            $x=explode(",",$row->name);
            ?>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="lms_video">
              <div class="lms_hover_section"> 
                <img src="<?php echo base_url(); ?>uploads/Gallery/<?php echo $x[0]; ?>" alt="Multimedia">
                <div class="lms_hover_overlay">
                <a class="lms_image_link" data-gal="" onclick="More(<?php echo $row->id; ?>);" href="javascript:;" title=""></a>
                </div>
              </div>
              <a href="javascript:;" onclick="More(<?php echo $row->id; ?>);" class="galnm"><h3><i class="fa fa-picture-o"></i> <?php echo $row->album_name; ?></h3></a>
            </div>
          </div>

       <?php } } ?>   


     
    </div>
  </div>
  <!--offer courses end-->
  
  <div class="row">
         <div class="col-lg-12">
          <div class="lms_pagination">
              <?php if(isset($links)){
                 echo $links;
                } ?>
            </div>
         </div>
      </div>
  
  
</div>

<!--main container end-->