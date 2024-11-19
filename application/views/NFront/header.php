<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>Saka India | Process Engineering Solution</title>

    <!--Favicon-->
    <link rel="icon" href="<?php echo base_url();?>assets/img/sakafavicon.ico" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Line Awesome CSS -->
    <link href="<?php echo base_url('assets/css/line-awesome.min.css')?>" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="<?php echo base_url('assets/css/fontAwesomePro.css')?>" rel="stylesheet">    
    <!-- Animate CSS-->
    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">        
    <!-- Owl Carousel CSS -->
    <link href="<?php echo base_url('assets/css/owl.carousel.css')?>" rel="stylesheet">
    <!-- Slick Slider CSS -->
    <link href="<?php echo base_url('assets/css/slick.css')?>" rel="stylesheet">    
    <!-- Back to Top -->
    <link href="<?php echo base_url('assets/css/backToTop.css')?>" rel="stylesheet">
    <!-- Metis Menu -->
    <link href="<?php echo base_url('assets/css/metismenu.css')?>" rel="stylesheet">
    <!-- Style CSS -->
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">


    <!-- jquery -->
    <script src="<?php echo base_url('assets/js/jquery-1.12.4.min.js')?>"></script>
</head>

<body>

    <!-- preloader -->
    <div class="preloader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <!-- Mouse Cursor  -->
    <div class="mouseCursor cursor-outer"></div>
    <div class="mouseCursor cursor-inner"><span>Drag</span></div>

    <div id="smooth-wrapper">

    <!-- Header Area  -->

    <div class="header-area">   
        <div id="header-sticky">
            <div class="navigation">
                <div class="container">
                    <div class="header-inner-box">

                        <a href="<?php echo base_url();?>" class="logo"><img src="<?php echo base_url();?>uploads/About/logo1.png" style="height:50px; width:150px;"></a>           

                        <div class="main-menu d-none d-lg-block">
                            <ul>
                                <li class="active"><a class="navlink" href="<?php echo base_url();?>">Home</a>
                                <ul class="sub-menu">
                                        <li><a href="<?php echo base_url();?>"> Home - One</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/Home_two">Home - Two</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/Home_three">Home - Three</a></li>
                                    </ul>
                                </li>
                                <li><a class="navlink" href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo base_url();?>index.php/About_us">About Us</a></li>                                    
                                        <li><a href="services.html">Our Products</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/Team">Our Team</a></li>
                                        <!-- <li><a href="price.html">Pricing Plans</a></li> -->
                                        <li><a href="faq.html">FAQs</a></li>                                    
                                    </ul>
                                </li>                                

                                <li><a class="navlink" href="#">Project</a>
                                    <ul class="sub-menu">
                                    <li><a href="project.html">Applications</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/Project">Projects</a></li>                                        
                                        <li><a href="<?php echo base_url();?>index.php/Project_details">Project Details</a></li>                                        
                                    </ul>
                                </li>
                                <li><a class="navlink" href="#">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo base_url();?>index.php/Blog">Blogs</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/Blog_details">Blog Details</a></li>
                                    </ul>
                                </li>
                               
                                <li><a class="navlink" href="project-details.html">Solutions</a></li>

                                <li><a class="navlink" href="<?php echo base_url();?>index.php/Contact">Contact</a></li>
                            </ul>                            
                        </div>

                        <div class="header-right">
                            <div class="search-trigger">                                        
                                <i class="fal fa-search"></i>
                            </div>
        
                            <div class="header-btn">
                                <div class="menu-trigger">
                                    <span class="lines"></span>
                                    <span class="lines"></span>
                                    <span class="lines"></span>
                                </div>
                            </div>
                        </div>

                        <div class="mobile-nav-bar d-block col-sm-1 col-6 d-lg-none">
                            <div class="mobile-nav-wrap">                    
                                <div id="hamburger">
                                    <i class="las la-bars"></i>                                    
                                </div>
                                <!-- mobile menu - responsive menu  -->
                                <div class="mobile-nav">
                                    <button type="button" class="close-nav">
                                        <i class="las la-times-circle"></i>
                                    </button>
                                    <nav class="sidebar-nav">
                                        <ul class="metismenu" id="mobile-menu">
                                            <li><a class="has-arrow" href="#">Homes</a>
                                                <ul class="sub-menu">
                                                    <li><a href="<?php echo base_url();?>">Home - One</a></li>                                                                                                                                                                                         
                                                </ul>
                                            </li>
                                            <li><a class="has-arrow" href="#">Pages</a>
                                                <ul class="sub-menu">
                                                    <li><a href="<?php echo base_url();?>index.php/About_us">About Us</a></li>                                                
                                                    <li><a href="services.html">Our Services</a></li>
                                                    <li><a href="team.html">Our Team</a></li>
                                                                                                  
                                                </ul>
                                            </li>                                            
                                            <li><a class="has-arrow" href="#">project</a>
                                                <ul class="sub-menu">
                                                    <li><a href="project.html">Project</a></li>                                                    
                                                    <li><a href="project-details.html">Project Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a class="has-arrow" href="#">Blog</a>
                                                <ul class="sub-menu">
                                                    <li><a href="blog.html">Blogs</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
                                            
                                        </ul>
                                    </nav>  
                                    <div class="action-bar">
                                        <a href="mailto:info@Saka India.com"><i class="las la-envelope"></i>info@Saka India.com</a>
                                        <a href="tel:123-456-7890"><i class="fal fa-phone"></i>123-456-7890</a>
                                        <a href="contact.html" class="white-btn">Contact Us</a>
                                    </div>      
                                </div>                            
                            </div>
                            <div class="overlay"></div>
                        </div>                        
                    </div>
                </div>
            </div>  
        </div>           
    </div>