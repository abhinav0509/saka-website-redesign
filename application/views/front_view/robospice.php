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
.examdetails .col-lg-4 {
	padding-left: 5px !important;
	padding-right: 5px !important;
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
			  <div class="lms_title">ROBOSPICE (Advance level)</div>
			  <div class="pull-right">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">ROBOSPICE (Advance level)</li>
				</ol>
			  </div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-2">
				<div class="lms_title_center">
					<div class="lms_heading_1">
					  <h2 class="lms_heading_title">ROBOSPICE (Advance level)</h2>
					</div>
				</div>
			</div>
  
			<div class="col-lg-12 examdetails"> 
				<div class="col-lg-4"> 
					<img src="<?php echo base_url();?>Style/images/courses/robospice1.png" style="height:250px;" width="100%">
				</div>
				<div class="col-lg-4">
					<img  src="<?php echo base_url();?>Style/images/courses/robospice2.png" style="height:250px;" width="100%">
				</div> 
				<div class="col-lg-4"> 
					<p style="margin-top:20px;"> 
						<ul>
							<li> <b> Duration</b> :  5 months </li>
							<li> <b> Module</b> :  1 module </li>
							<li> <b>No of Projects </b> : 10 Projects</li>
							<li><b> No of Sessions</b> : 20 Sessions (Only Sunday)</li>
							<li> <b>Certificate </b> : ROBOSPICE (Advance level) Certificate </li>
							<li> <b>Training mode </b> : Practical  </li>
						</ul>
					</p>
				</div>
			</div>
   
			<div class='col-lg-12'>
				<p style="margin-top:20px;">From 2016 we entered in Robotics for teaching kids in the age group of 9-15 years. We provide an after school hands on training in Science, Electronics & Robotics for school kids. Our programme is specifically designed for kids in the grades 4 - 9. It helps to spark curiosity & develop the inherent interest amongst children about science & technology. We also provide hobby programs that encourage children’s to make their own Science, Electronics & Robotics projects which they can take home.  </p>
			</div>
  
			<div class="row">
				<div class="col-lg-8">
					<div class="col-lg-12">
						<div class="panel-group" id="multi_collapse_accordion">
							<div class="panel panel-default">
							  <div class="panel-heading">
								<h3 class="panel-title"> <a data-toggle="collapse" data-parent="#multi_collapse_accordion" href="#collapseOne1"> Module </a> </h3>
							  </div>
							  <div id="collapseOne1" class="panel-collapse collapse in">
								<div class="panel-body coursePage">
									<div class="row">
										<ul>
											<li>Mechanical Designing</li>
											<li>Learn on the electronics field</li>
											<li>Concepts of  mechanical gears, grip, torque, power and more.</li>
											<li>Move objects or find their own way.</li>
										</ul>       
									</div>
								</div>
							  </div>
							</div>  
						</div>  
					</div>
		
					<div class="row">
						<h3 class="panel-title" style="margin-bottom:20px;"> <b>STUDENT PROJECT KITS</b> </h3>
						<li>Water Level Indicator.</li>
						<li>Solar Lights.</li>
						<li>Temperature Controlled Fan.</li>
						<li>Object Detector.</li>
						<li>Electricity Generator.</li>
						<li>Dice.</li>
						<li>Door bell.</li>
						<li>Flasher.</li>
						<li>Motor reversal.</li>
						<li>Street light.</li>
					</div>
				</div>

			    <div  class="col-xs-12 col-md-4 col-lg-4">
				   <?php $this->load->view('front_view/sidebar'); ?>    
			    </div>
				<!--sidebar end--> 
 
			</div>
		</div>
	</div>
  