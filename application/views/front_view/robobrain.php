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
			  <div class="lms_title">ROBOBRAIN (Expert level)</div>
			  <div class="pull-right">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">ROBOBRAIN (Expert level)</li>
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
					  <h2 class="lms_heading_title">ROBOBRAIN (Expert level)</h2>
					</div>
				</div>
			</div>
  
  			<div class="col-lg-12 examdetails"> 
				<div class="col-lg-4"> 
					<img src="<?php echo base_url();?>Style/images/courses/robobrain1.png" style="height:250px;" width="100%">
				</div>
				<div class="col-lg-4">
					<img  src="<?php echo base_url();?>Style/images/courses/robobrain2.png" style="height:250px;" width="100%">
				</div> 
				<div class="col-lg-4"> 
					<p style="margin-top:20px;"> 
						<ul>
							<li> <b> Duration</b> :  5 months </li>
							<li> <b> Module</b> :  1 module </li>
							<li> <b>No of Projects </b> : 20 Projects + Robot</li>
							<li><b> No of Sessions</b> : 20 Sessions (Only Sunday)</li>
							<li> <b>Certificate </b> : ROBOBRAIN (Expert level) Certificate </li>
							<li> <b>Training mode </b> : Practical  </li>
						</ul>
					</p>
				</div>
			</div>
   			<div class='col-lg-12'>
				<p style="margin-top:20px;">We have several programs available to fully engage and challenge your aspiring little engineer or scientist. In each session, your child work to plan and build a new project and robot under the guidance of our faculty. They learn various science, engineering and technology concepts, such as working of electronic circuits and their components, motors and gears, etc.</p>
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
											<li>Build his own electronics Model </li>
											<li>Automation</li>
											<li>Programming from basics to automating robot</li>
										</ul>       
									</div>
								</div>
							  </div>
							</div>  
						</div>
					</div>
					<div class="row">
						<h3 class="panel-title" style="margin-bottom:20px;"> <b>STUDENT PROJECT KITS</b> </h3>
						<div class="col-md-6">
							<li>Motor Reversal.</li>
							<li>Bread Board Power Supply.</li>
							<li>Audio Amplifier.</li>
							<li>Ac Supply Detector.</li>
							<li>Dual Motor Robot.</li>
							<li>Fork Lift Robo.</li>
							<li>Dual Motor Robot.</li>
							<li>Fork Lift Robo.</li>
							<li>Line Follower Robo.</li>
							<li>Solar Tracking System .</li>
							<li>Wire Less Robo.</li>				
						</div>
						<div class="col-md-6">
							<li>Water Level Indicator.</li>
							<li>Solar Lights System.</li>
							<li>Temperature Controlled Fan.</li>
							<li>Object Detector.</li>
							<li>Generator.</li>
							<li>Touch ON/OFF.</li>
							<li>Flashing Light(IC 555).</li>
							<li>Snake And Ladder.</li>
							<li>Four Tone Generator.</li>
							<li>Remote Operated Fan.</li>
							<li>Dual Motor Robo.</li>
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
  