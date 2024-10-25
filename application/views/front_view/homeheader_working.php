<!DOCTYPE html>

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
<link rel="icon" type="image/ico" href="favicon.ico" />
<!-- main css -->
<link rel="stylesheet" href="<?php echo base_url();?>Style/New_temp/css/main.css" media="screen"/>
<title>CCA India | Accounting Course | Tally Professional Institute | Tally Courses | Tally Certification | Tally course in pune | Accounting Course | Smart Tally | Tally Franchisee</title>

<style>
.read{color:#FF6600;
padding-left:10px; 
padding-right:10px;
}

</style>

</head>
<!-- Header End -->

<!-- Body Start -->
<body>
<!--Pre loader start-->
<!--<div id="preloader">
  <div id="status"> 
  	<p>Loading</p>
  </div>
</div>-->
<!--pre loader end--> 
<!--slider start-->
<div class="lms_slider">
  <div id="lms_simple_slider" class="carousel slide" data-ride="carousel"> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#lms_simple_slider" data-slide-to="0" class="active"></li>
      <li data-target="#lms_simple_slider" data-slide-to="1"></li>
      <li data-target="#lms_simple_slider" data-slide-to="2"></li>
       <li data-target="#lms_simple_slider" data-slide-to="3"></li>
    </ol>
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active"> 
        <img src="<?php echo base_url();?>Style/images/slider/slider3.jpg" class="animated bounceInRight lms_delay_01" alt="simple slider slide-1">
        <div class="carousel-caption lms_ss_caption animated bounceInRight lms_delay_03">
        <div class="lms_ss_icon">
            	<div class="lms_ss_laptop"><i class="fa fa-pencil"></i></div>
            </div>
        	<h3>Online Certified Courses from the</h3>
            <h1 class="lms_label lms_ss_heading">"CCA"</h1>
        </div>
      </div>
      <div class="item"> 
        <img src="<?php echo base_url();?>Style/images/slider/slider2.jpg" class="animated bounceInRight lms_delay_01" alt="simple slider slide-1">
        <div class="carousel-caption lms_ss_caption animated bounceInRight lms_delay_03">
        	<div class="lms_ss_icon">
            	<div class="lms_ss_laptop"><i class="fa fa-laptop"></i></div>
            </div>
            <h1 class="lms_ss_heading lms_label">"CCA Skills"</h1>	
        </div>
      </div>
      
      
      <div class="item"> 
        <img src="<?php echo base_url();?>Style/images/slider/slider4.jpg" class="animated bounceInRight lms_delay_01" alt="simple slider slide-1">
        <div class="carousel-caption lms_ss_caption animated bounceInRight lms_delay_03">
        	<div class="lms_ss_icon">
            	<div class="lms_ss_laptop"><i class="fa fa-building-o"></i></div>
            </div>
            <h1 class="lms_ss_heading lms_label">"CCA Institutes"</h1>	
        </div>
      </div>
      
      
      
      <div class="item"> 
        <img src="<?php echo base_url();?>Style/images/slider/slider1.jpg" class="animated bounceInRight lms_delay_01" alt="simple slider slide-1">
        <div class="carousel-caption lms_ss_caption animated bounceInRight lms_delay_03">
        <div class="lms_ss_icon">
            	<div class="lms_ss_laptop"><i class="fa fa-cogs"></i></div>
            </div>
            <h1>Services we have serve our</h1>
            <h1 class="lms_ss_heading lms_label">"Students"</h1>			
        </div>
      </div>
       </div>
    
    <!-- Controls --> 
     </div>
    
    <div class="lms_slider_overlay"></div>
    
</div>
<!--slider end--> 
<!--Header start-->
<header id="lms_header">
  <div class="container">
    <h1 class="logo"> <a href="#"> <img alt="Porto" width="71" height="60" data-sticky-width="82" data-sticky-height="40" src="<?php echo base_url();?>Style/images/logo.jpg"> </a> </h1>
    <button class="lms_menu_toggle btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse"><i class="fa fa-bars"></i> </button>
  </div>
  <div class="navbar-collapse nav-main-collapse collapse">
    <div class="container">
      <nav class="nav-main mega-menu">
        <ul class="nav nav-pills nav-main" id="mainMenu">
           <li class="active"><a href="<?php echo base_url();?>index.php/Welcome">Home</a></li>
           <li class="dropdown"><a class="dropdown-toggle">About Us<i class="icon icon-angle-down"></i> </a>
            <ul class="dropdown-menu">
             <li><a href="<?php echo base_url();?>index.php/welcome/about">About CCA</a></li>
						
            </ul>
          </li>
           
          <li class="dropdown"> <a class="dropdown-toggle" href="javascript:;"> Courses</a>
            <ul class="dropdown-menu">
                    <li class="dropdown-submenu"> <a>Tally ERP9</a>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo base_url();?>index.php/welcome/quick_tally">Quick Tally</a></li>
                            <li><a href="<?php echo base_url();?>index.php/welcome/smart_tally">Smart Tally</a></li>
                            <li><a href="<?php echo base_url();?>index.php/welcome/tally_professional">Tally Professional</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu"> <a>Microsoft Excel 2010</a>
                        <ul class="dropdown-menu">
                          <li><a href="<?php echo base_url();?>index.php/welcome/smart_excel">Smart Excel</a></li>
                          <li><a href="<?php echo base_url();?>index.php/welcome/master_excel">Master in Excel</a></li>
                        </ul>
                    </li>

                    <li><a href="<?php echo base_url();?>index.php/welcome/cea">Certified e-Accountant</a></li>

                    <li class="dropdown-submenu"> <a>Govt Project</a>
                        <ul class="dropdown-menu">
						  <li><a href="<?php echo base_url();?>index.php/welcome/pkmvy">NSDC - PMKVY</a></li>
                          <li><a href="<?php echo base_url();?>index.php/welcome/NULM">NULM</a></li>
                          <li><a href="<?php echo base_url();?>index.php/welcome/virtual_mba">Virtual MBA</a></li>
                          <li><a href="<?php echo base_url();?>index.php/welcome/gfs_project">GFS Project Training</a></li>
                        </ul>
                    </li>
            </ul>
          </li>
          <li class="dropdown"><a class="dropdown-toggle">Placements <i class="icon icon-angle-down"></i> </a>
            <ul class="dropdown-menu">
            <li><a href="<?php echo base_url();?>index.php/welcome/fran_placement">CCA Placement</a></li>
						<li><a href="<?php echo base_url();?>index.php/welcome/employer">Employer's Request</a></li>
						<li><a href="<?php echo base_url();?>index.php/welcome/jobs">Job Opening</a></li>
						<li><a href="<?php echo base_url();?>index.php/welcome/stud_testimonal">Student Testimonial</a></li>
            <li><a href="<?php echo base_url();?>index.php/welcome/news">News & Events</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="dropdown-toggle">Students <i class="icon icon-angle-down"></i> </a>
            <ul class="dropdown-menu">
             <li><a href="#">Apply Online Exam</a></li>
						<li><a href="<?php echo base_url();?>index.php/welcome/Student">Go Online Exam</a></li>
						<li><a href="<?php echo base_url();?>index.php/welcome/enquiry"><i class="icon-info circle"></i>Student Enquiry</a></li>
						<li><a href="<?php echo base_url();?>index.php/welcome/download"><i class="icon-download"></i>Download</a></li>
            <li><a href="<?php echo base_url();?>index.php/welcome/stud_details"><i class="icon-download"></i>Student Details</a></li>
            </ul>
          </li>
          <li class="dropdown"> <a class="dropdown-toggle"> Franchise <i class="icon icon-angle-down"></i> </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url();?>index.php/welcome/cca_franchisee">Our Franchise</a></li>
						  <li><a href="<?php echo base_url();?>index.php/welcome/Franchisee_Enq">Franchise Enquiry</a></li>
						  <li><a href="<?php echo base_url();?>index.php/welcome/Franchisee_Login">Franchise Login</a></li>
						</ul>
          </li>
          <li class="dropdown"> <a class="dropdown-toggle"> CCA Brands <i class="icon icon-angle-down"></i> </a>
            <ul class="dropdown-menu">
             <li><a href="<?php echo base_url();?>index.php/welcome/cca_skills"><i class="icon-cog"></i>CCA Skill</a></li>
						<li><a href="<?php echo base_url();?>index.php/welcome/franchisee"><i class="icon-group"></i>CCA Franchise</a></li>
						<li><a href="<?php echo base_url();?>index.php/welcome/institute"><i class="icon-building"></i>CCA Group Of Institute</a></li>
						<li><a href="<?php echo base_url();?>index.php/welcome/cca_college"><i class="icon-building"></i>CCA College</a></li>
            </ul>
          </li>
         
         
         <li class="dropdown"><a class="dropdown-toggle">Gallery<i class="icon icon-angle-down"></i> </a>
            <ul class="dropdown-menu">
             <li><a href="<?php echo base_url();?>index.php/welcome/Gallery">Image Gallery</a></li>
				     <li><a href="#">Video Gallery</a></li>		
            </ul>
          </li>
         
         
         
         
          <li class="dropdown"><a class="dropdown-toggle">Contact Us<i class="icon icon-angle-down"></i> </a>
            <ul class="dropdown-menu">
                        <li><a href="<?php echo  base_url();?>index.php/welcome/cca_franchisee">Locate Us</a> </li>
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
<!--Header end-->