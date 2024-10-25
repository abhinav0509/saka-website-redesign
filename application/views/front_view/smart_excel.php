<style>
.examdetails ul li{
	list-style:none;
	padding-left: 10px;
}
li i {
	padding-right: 5px;
}
.panel-group .panel-title {
    font-size: 20px;
}
.panel-title > a > i {	
	background: #ff9933;
	color: #fff;
}
.coursePage ul li{
	list-style:none;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
    $("#about").removeClass("active");
    $("#home").removeClass("active");
    $("#course").addClass("active");
    $("#placement").removeClass("active");
    $("#studmnu").removeClass("active");
    $("#franmnu").removeClass("active");
    $("#brandmnu").removeClass("active");
    $("#galmnu").removeClass("active");
    $("#cntmnu").removeClass("active");
	$(".coursePage").find('li').prepend('<i class="fa fa-caret-right"></i>');
 });   
</script>
<div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
    <div class="container">
      <div class="lms_title"> Smart Excel 2016</div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active"> Smart Excel 2016</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!--main container start-->
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-2">
      <div class="lms_title_center">
        <div class="lms_heading_1">
          <h2 class="lms_heading_title">Smart Excel 2016</h2>
            
        </div>
        
      </div>
    
   
  </div>
  
   <div class="col-lg-12 "> 
  <div class="col-lg-4"> 
  <img src="<?php echo base_url();?>Style/images/courses/8.jpg" width="100%">
  </div>
  
  <!--<div class="col-lg-3"> 
  <img  src="<?php echo base_url();?>Style/images/courses/9.jpg"  width="100%">
  </div>-->
  
  <div class="col-lg-4"> 
  <img src="<?php echo base_url();?>Style/images/courses/S_Excel.jpg" width="100%">
  </div>
  
   <div class="col-lg-4"> 
		<p style="margin-top:40px;"> 
			<ul>
				<li> <b>Duration     : </b>70 Hrs</li>
				<li> <b>Module       : </b>2 Modules</li>
				<li> <b>Exam         : </b>2 Online Exams</li>
				<li> <b>Certificate  : </b>Smart Excel 2016 Certificate  </li>
				<li> <b>Training Mode: </b>Online & Class Room </li>
			</ul>
		</p>
    </div>
	
   </div>
   <div class="col-lg-12"> 
   <p style="margin-top:20px;">Microsoft Excel is a spreadsheet application developed by Microsoft for Microsoft Windows, Mac OS, and iOS. It is an invaluable tool for portfolio managers, traders and accountants.</p>
  </div>
  <div class="row">
    <div class="col-lg-8">
        <div class="col-lg-12">
			<div class="panel-group" id="multi_collapse_accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#multi_collapse_accordion" href="#collapseOne1">Module 1 </a> </h4>
					</div>
					<div id="collapseOne1" class="panel-collapse collapse in">
						<div class="panel-body coursePage"><h4 style="color: #B22222;font-size: 20px;">Complete Excel 2016</h4>
							<div class="col-lg-6">
								<ul>
									<li>Introduction MS excel 2016</li>
									<li>Create a new Workoook in Microsoft Excel 2016</li>
									<li>Worksheet Fundamentals</li>
									<li>Selecting Cells & Ranges</li>
									<li>Formatting Cell & Worksheet</li>
									<li>Cell Style</li>
									<li>Conditional Formatting</li>
									<li>Creating Table In Excel 2016</li>
									<li>Sorting Data in Excel</li>
									<li>Filter In Excel 2016</li>
								</ul>
							</div>
							<div class="col-lg-6">
								<ul>
									<li>Creating Charts and Graphics</li>
									<li>Pivot Table & Pivot Chart Option</li>
									<li>Graphics & Designing in Excel</li>
									<li>Add Ins Group Buttons of Insert Tab Excel 2016</li>
									<li>Linking & Hyperlinking In Excel 2016</li>
									<li>Analyzing Data with Excel</li>
									<li>Data Validation In Excel</li>
									<li>Solver Option</li>
									<li>Inking Option</li>
									<li>Using Macros In Excel</li>
								</ul>
							</div>
						</div>
						<!--one module end-->
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#multi_collapse_accordion" href="#collapseTwo1"> Module 2</a> </h4>
					</div>
					<div id="collapseTwo1" class="panel-collapse collapse">
						<div class="panel-body coursePage"><h4 style="color: #B22222;font-size: 20px;">Functions and Formulas in Excel</h4>
							<div class="col-lg-6">
								<ul>
									<li>Formula & Functions In Excel 2016</li>
									<li>Date and Time Function</li>
									<li>Financial Function</li>
									<li>Concatenate & T Functions</li>
									<li>LOOKUP & Reference function</li>
									<li>Mathematical & Trigonometry Functions Function</li>
								</ul>
							</div>
							<div class="col-lg-6">
								<ul>
									<li>Trigonometry Functions</li>
									<li>Database Function</li>
									<li>Statistical Functions In Excel</li>
									<li>Information Functions In Excel</li>
									<li>Engineering Function</li>
								</ul>
							</div>
						</div>
						<!--second module end-->
					</div>
				</div>
			</div>
		</div>
    </div>
    
    

 
  <div  class="col-xs-12 col-md-4 col-lg-4">
    <?php $this->load->view('front_view/sidebar'); ?>
  </div>
   <!--sidebar end--> 
 
  </div>

</div>
</div>