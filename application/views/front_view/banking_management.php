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
      <div class="lms_title">Banking & Finance Management</div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Banking & Finance Management</li>
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
					  <h2 class="lms_heading_title">Banking & Finance Management</h2>
					</div>
				</div>
			</div>
		  
		    <div class="col-lg-12 examdetails"> 
				<div class="col-lg-6"> 
					<img src="<?php echo base_url();?>Style/images/courses/banking.png" style="height:465px;" width="100%">
				</div>
				<div class="col-lg-6">
					<p style="margin-top:20px;"> 
					  <ul>
						<li> <b>Duration     : </b>30 Hrs Classroom Session</li>
						<li> <b>Training Mode: </b>1400 Hrs on the job Training</li>
					  </ul>
					</p>
					<p style="margin-top:20px;">CCA's and it's knowledge  partner Eduskill addresses the skills gaps between the education and employability skills demanded in BFSI Industry .Designed in collaboration with the industry , our Post Graduate Certificate Programme provides real insight into today’s fast- moving financial services arena. The programme focuses on imparting the core knowledge demanded by BFSI industry and provide the strategic management skills and the analytical tools to evaluate contemporary industry issues .The Programme is meant for recent graduates and banking career aspirants to kick start entry level career in modern BFSI industry . Our programs are perfect blend of theoretical and practical knowledge with assured on the job training and placement assistance in BFSI Industry delivery by the expert faculties from BFSI industry.</p><br/>
					
					<h4><b>Eligibility Criteria:-</b></h4>
					<ul>
						<li>Age limit -25 yrs or less</li>
						<li>Education- Graduate / Post Graduation</li>
						<li>50% throughout in academics</li>
						<li>No year Gaps during studies</li>
						<li>Regular Degree course</li>
					</ul>
				</div> 
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
											<div class="col-xs-12 col-md-6 col-lg-6">
												<ul>
													<li>Regularity framework </li>
													<li>Modules of NISM,NCFM,IRDA</li>
													<li>Banking Products </li>
													<li>Risk Management  </li>
													<li>Corporate Finance </li>
													<li>Portfolio Management </li>
												</ul>       
											</div>
											  
											<div class="col-xs-12 col-md-6 col-lg-6">
												<ul>
													<li>Sales and Marketing  </li>
													<li>Digital Banking </li>
													<li>Analytical skills </li>
													<li>Leadership in financial services sector </li>
													<li>Business English Language And Soft skills</li> 
												</ul> 													
											</div>
												
										</div>
									</div>
								</div>
							</div>  
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6 col-lg-6">
							<h3>Selection Process:-</h3>

							<li>Online Aptitude test (MCQ based)</li>
							<li>English Language Test</li>
							<li>Group Discussion</li>
							<li>Personal Round Of interview</li>
							<br/>
						</div>
						<div class="col-xs-12 col-md-6 col-lg-6">
							<h3>Key Benefits:-</h3>

							<li>Day 1 Job Ready programme</li>
							<li>Assured Placement support in BFSI industry after 3 Months</li>
							<li>Industry vetted Course curricula</li>
							<li>Hands on Learning & Extensive OJT</li>
							<li>Training by BFSI Experts & Professional</li>
							<br/>
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
  