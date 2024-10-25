<style>
p {
    line-height: 20px;
    padding-top: 12px;
    text-align: justify;
    font-family: calibri;
    font-size: 16px;
}
</style>

<div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
    <div class="container">
      <div class="lms_title">CCA News & Events</div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="index-2.html">Home</a></li>
          <li class="active">CCA News & Events</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- page title end --> 

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="lms_title_center">
        <div class="lms_heading_1">
          <h2 class="lms_heading_title"><?php echo $news[0]['Title']; ?></h2>
        </div>
        <p></p>
      </div>
    </div>
  </div>
  <div class="row"> 
    <!--blog single page start-->
    
    <div class="col-lg-8 col-md-8 col-sm-7">
     <?php if(!empty($news)) { foreach($news as $nw){ ?> 
      <div class="lms_blog_single"> <?php if($nw['image']!=""){ ?> <img src="<?php echo base_url().'uploads/News/'.$nw['image']; ?>" style="height:350px; border:1px solid #CCC;" alt="single page image" /> <?php } ?>
        <h3><i class="fa fa-file-text-o"></i> <?php echo $nw['Title']; ?></h3>
           <?php 
                $arr=array();
                $arr =explode("-",$nw['Publish_Date']); 
                $arr=array_reverse($arr);
                $newtdate1 =implode($arr,"-");
                $tdt=str_replace("-","/",$newtdate1);
           ?> 

        <div class="lms_entry_meta"> <span><a href="javascript:;" title="Publish Date"><i class="fa fa-calendar"></i> <?php echo $tdt; ?></a></span></div>
        <br />
        <p><?php echo $nw['Description']; ?></p>
      </div>
     <?php } }?>

     <a href="<?php echo base_url(); ?>index.php/welcome/news" class="btn btn-default" id="tp"><i class="fa fa-arrow-left"></i> Back to News & Events</a>
        
    </div>
    
    <!--blog single page end--> 
    
    <!--sidebar start-->
    <div class="col-lg-4 col-md-4 col-sm-5">
        <?php $this->load->view('front_view/sidebar'); ?>
    </div>
    <!--sidebar end--> 
  </div>
  
</div>
<!--main container end-->