<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="description"  content="CCA INDIA"/>
<?php $query=$this->db->get('meta');
      $result=$query->result_array();
	  foreach($result as $res){ ?>
<meta name="keywords" content="<?php echo $res['meta_data']; ?>">
	  <?php } ?>
<meta name="author"  content="CCA INDIA, Accounting Institute"/>
<meta name="MobileOptimized" content="320">
<!-- favicon links -->
<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
<link rel="icon" type="image/ico" href="https://www.ccaindia.in/Style/images/logo.png" />
<!-- main css -->
<link rel="stylesheet" href="<?php echo base_url();?>Style/New_temp/css/main.css?V=1.1" media="screen"/>
<title>CCA India | Accounting Course | Tally Professional Institute | Tally Courses | Tally Certification | Tally course in pune | Accounting Course | Smart Tally | Tally Franchisee</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<style>
    #email_validation, #name_validation {
    display:none;
}

label.required:after {
  content:'*';
  color:red;
}

span.error {
  background-color:#FFDFDF;
  color:red;
}
.row {
  margin:5px;

}
.read{color:#FF6600;
padding-left:10px; 
padding-right:10px;
font-size:14px;
}
.lms_blog_single ul{padding-left:14px;}
p{text-align:justify;}
#accordion ul{list-style:none;}
#accordion{ border: 1px solid #CCCCCC;}
.lms_sidebar_rp > ul {
    padding-left: 6px;
    padding-right: 10px;
}
.lms_heading_1 .lms_heading_title {	
	border-bottom: 0px solid;	
}
.lms_heading_1 .lms_heading_title::after {
	content: "";
	position: absolute;
	top: 100%;
	margin: -10px 0 0 -5px;
	left: 50%;
	width: 10px;
	height: 20px;
	background: #fff;
	border-left: 0px solid;
	border-right: 0px solid;
	-webkit-transform: rotate(20deg);
	-moz-transform: rotate(20deg);
	-ms-transform: rotate(20deg);
	-o-transform: rotate(20deg);
}
.breadcrumb > li > a {
	color: #ff9933;
}

/************************Header CSS Start************************/
.logo img{
	height: 90px;
	width: 104px;
}
#lms_header {
	min-height: 102px;
}
#lms_header nav ul.nav-main li a {
	color: #fff;
	font-size: 17px;
	font-style: normal;
	line-height: 0;
	margin-left: 3px;
	margin-right: 3px;
	text-transform: capitalize;
	font-weight: 400;
	cursor: pointer;
	padding: 43px 1px 22px 18px;
	border-bottom: 3px solid rgba(255,255,255,0);
	-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	-ms-transition: all 0.3s;
	-o-transition: all 0.3s;
}
#lms_header nav ul.nav-main ul.dropdown-menu li{
	padding:  12px 8px 0px 4px;
}
#lms_header nav ul.nav-main ul.dropdown-menu > li > a {
	padding: 2px 12px 18px 5px;
}
.lms_fixed_header nav > ul.nav-main > li > a {
	padding: 39px 9px 18px 12px !important;
	-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	-ms-transition: all 0.3s;
	-o-transition: all 0.3s;
}

/************************Header CSS End************************/
</style>
    




</head>
<!-- Header End -->

<!-- Body Start -->
<body>
<!-- page title Start -->

<!-- page title end -->
<!--Header start-->
<header id="lms_header">
	<div class="container">
		<h1 class="logo"> <a href="javascript:;"> <img alt="Porto" width="71" height="60" data-sticky-width="82" data-sticky-height="40" src="<?php echo base_url();?>Style/images/ccalogo.jpg"> </a> </h1>
		<button class="lms_menu_toggle btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse"><i class="fa fa-bars"></i> </button>
	</div>
	<div class="navbar-collapse nav-main-collapse collapse">
		<div class="container">
			<nav class="nav-main mega-menu">
				<ul class="nav nav-pills nav-main" id="mainMenu">
				    <li id="home"><a href="<?php echo base_url();?>index.php/welcome">Home</a></li>
				    <li id="about" class="dropdown"><a class="dropdown-toggle">About Us<i class="icon icon-angle-down"></i> </a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url();?>index.php/welcome/about">About CCA</a></li>
						</ul>
					</li>   
		   
					<li id="course" class="dropdown active"> <a class="dropdown-toggle" href="javascript:;"> Courses</a>
						<ul class="dropdown-menu">
							<li class="dropdown-submenu"> <a>Tally ERP9</a>
								<ul class="dropdown-menu">
								  <li><a href="<?php echo base_url();?>index.php/welcome/quick_tally">Quick Tally</a></li>
									<li><a href="<?php echo base_url();?>index.php/welcome/smart_tally">Smart Tally ERP9</a></li>
									<li><a href="<?php echo base_url();?>index.php/welcome/tally_professional">Tally Professional ERP9</a></li>
								</ul>
							</li>
							<li class="dropdown-submenu"> <a>Microsoft Excel 2016</a>
								<ul class="dropdown-menu">
								  <li><a href="<?php echo base_url();?>index.php/welcome/smart_excel">Smart Excel 2016</a></li>
								  <li><a href="<?php echo base_url();?>index.php/welcome/master_excel">Master Excel 2016</a></li>
								</ul>
							</li>
							<li><a href="<?php echo base_url();?>index.php/welcome/cea">Master in Accounts & Taxation (MAT)</a></li>
							<li><a href="<?php echo base_url();?>index.php/welcome/banking_management">Banking & Finance Management</a></li>
							<li class="dropdown-submenu"> <a>CCA Einstein Robo Club</a>
								<ul class="dropdown-menu">
								  <li><a href="<?php echo base_url();?>index.php/welcome/robotouch">ROBOTOUCH (Beginner level)</a></li>
								  <li><a href="<?php echo base_url();?>index.php/welcome/robospice">ROBOSPICE (Advance level)</a></li>
								  <li><a href="<?php echo base_url();?>index.php/welcome/robobrain">ROBOBRAIN (Expert level)</a></li>
							   
								</ul>
							</li>
							<li class="dropdown-submenu"> <a>Govt Project</a>
								<ul class="dropdown-menu">
								  <li><a href="<?php echo base_url();?>index.php/welcome/pkmvy">NSDC - PMKVY</a></li>
								  <li><a href="<?php echo base_url();?>index.php/welcome/NULM">NULM</a></li>
								  <li><a href="<?php echo base_url();?>index.php/welcome/virtual_mba">Virtual MBA</a></li>-->
								  <li><a href="<?php echo base_url();?>index.php/welcome/gfs_project">GFS Project Training</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<!--<li id="placement" class="dropdown"><a class="dropdown-toggle">Placements <i class="icon icon-angle-down"></i> </a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url();?>index.php/welcome/fran_placement">CCA Placement</a></li>
							<li><a href="<?php echo base_url();?>index.php/welcome/employer">Employer's Request</a></li>
							<li><a href="<?php echo base_url();?>index.php/welcome/jobs">Job Opening</a></li>
							<li><a href="<?php echo base_url();?>index.php/welcome/stud_testimonal">Student Testimonial</a></li>
							<li><a href="<?php echo base_url();?>index.php/welcome/news">News & Events</a></li>  
						</ul>
					</li>-->
					<li id="studmnu" class="dropdown"><a class="dropdown-toggle">Students <i class="icon icon-angle-down"></i> </a>
						<ul class="dropdown-menu">
						<li><a href="<?php echo base_url();?>index.php/welcome/Student">Go Online Exam</a></li>
						<li><a href="<?php echo base_url();?>index.php/welcome/enquiry"><i class="icon-info circle"></i>Student Enquiry</a></li>
						<!--<li><a href="<?php echo base_url();?>index.php/welcome/download"><i class="icon-download"></i>Download</a></li>-->
						<li><a href="<?php echo base_url();?>index.php/welcome/stud_details"><i class="icon-download"></i>Student Details</a></li>
						</ul>
					</li>
					<li id="franmnu" class="dropdown"> <a class="dropdown-toggle"> Franchise <i class="icon icon-angle-down"></i> </a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url();?>index.php/welcome/cca_franchisee">Our Franchise</a></li>
							<li><a href="<?php echo base_url();?>index.php/welcome/Franchisee_Enq">Franchise Registration</a></li>
							<li><a href="<?php echo base_url();?>index.php/welcome/Franchisee_Login">Franchise Login</a></li>
						</ul>
					</li>
					<li id="brandmnu" class="dropdown"> <a class="dropdown-toggle"> CCA Brands <i class="icon icon-angle-down"></i> </a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url();?>index.php/welcome/cca_skills"><i class="icon-cog"></i>CCA Skill</a></li>
							<li><a href="<?php echo base_url();?>index.php/welcome/franchisee"><i class="icon-group"></i>CCA Franchise</a></li>
							<li><a href="<?php echo base_url();?>index.php/welcome/institute"><i class="icon-building"></i>CCA Group Of Institute</a></li>
							<li><a href="<?php echo base_url();?>index.php/welcome/cca_college"><i class="icon-building"></i>CCA College</a></li>
						</ul>
					</li>
					<li id="galmnu" class="dropdown"><a class="dropdown-toggle">Gallery<i class="icon icon-angle-down"></i> </a>
						<ul class="dropdown-menu">
						   <li><a href="<?php echo base_url();?>index.php/welcome/Gallery">Image Gallery</a></li>
							<li><a href="javascript:;">Video Gallery</a></li>		
					</ul>
					</li>
					<li class="active"><a href="https://www.ccajobs.in" target="_blank"> CCA Jobs</a></li>
					<!--<li id="careermenu" class="dropdown"><a class="dropdown-toggle">CCA Jobs<i class="icon icon-angle-down"></i> </a>
						<ul class="dropdown-menu">
							<li id="" class="dropdown"><a href="https://www.ccajobs.in/">CCA Jobs</a></li>
						 </ul>
					</li>--> 
         
         
			
          <li id="cntmnu" class="dropdown"><a class="dropdown-toggle">Contact Us<i class="icon icon-angle-down"></i> </a>
            <ul class="dropdown-menu">
                         <li><a href="<?php echo base_url();?>index.php/welcome/cca_franchisee">Locate Us</a> </li>
                         <!--<li><a href="#">Contact Us</a></li>-->
                         <li><a href="<?php echo base_url();?>index.php/welcome/enquiry">Student Enquiry</a></li>
                         <li><a href="<?php echo base_url();?>index.php/welcome/Franchisee_Enq">Franchise Registration</a></li>
                      </ul>
                    </li>
                  
                      </ul>
                    </div>
                    
                    
                  </div>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
    
    </div>
  </div>
</header>