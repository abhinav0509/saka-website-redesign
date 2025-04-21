<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Saka India is a leading manufacturer of process engineering equipment in Pune, India. Specializing in industrial automation, turnkey engineering solutions, and high-performance industrial equipment for diverse industries. Contact us for custom manufacturing solutions!">


    <title>Saka Engineering Systems | Process Engineering Solution</title>

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

    <!-- <link href="<?php echo base_url('assetss/css/app.min.css')?>" rel="stylesheet"> -->
    <!-- jquery -->
    <script src="<?php echo base_url('assets/js/jquery-1.12.4.min.js')?>"></script>
</head>

<body>

    <!-- preloader -->
    <!--<div class="preloader">-->
    <!--    <div class="spinner">-->
    <!--        <div class="double-bounce1"></div>-->
    <!--        <div class="double-bounce2"></div>-->
    <!--    </div>-->
    <!--</div>-->

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
                                   
                        <a href="<?php echo base_url();?>" class="logo"><img src="<?php echo base_url();?>assets/img/about/saka-logo-hd.png" style="height:150x; width:150px;"></a>           

                        <div class="main-menu d-none d-lg-block">
                            <ul>
                                <li class="<?php echo ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'Home') ? 'active' : ''; ?>">
                                    <a class="navlink" href="<?php echo base_url();?>">Home</a>
                                </li>
                                <li class="<?php echo ($this->uri->segment(1) == 'About_us' || $this->uri->segment(1) == 'Team' || $this->uri->segment(1) == 'Gallery' || $this->uri->segment(1) == 'CSR') ? 'active' : ''; ?>">
                                    <a class="navlink" href="<?php echo base_url();?>About_us">About Us</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo base_url();?>About_us">About Us</a></li>
                                        <li><a href="<?php echo base_url();?>Team">Our Team</a></li>
                                        <li><a class="navlink" href="<?php echo base_url();?>Gallery">Our Gallery</a></li>
                                        <li><a href="<?php echo base_url();?>CSR">CSR</a></li>
                                        <li><a href="#">Career</a></li>
                                    </ul>
                                </li>

                                <li class="<?php echo ($this->uri->segment(1) == 'Project' || $this->uri->segment(1) == 'Project_details') ? 'active' : ''; ?>">
                                    <a class="navlink" href="<?php echo base_url();?>index.php/Project">Solutions</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo base_url();?>index.php/Project">Solutions</a></li>
                                        <li><a href="<?php echo base_url();?>index.php/Project_details">Solutions Details</a></li>
                                    </ul>
                                </li>

                                <li class="<?php echo ($this->uri->segment(1) == 'Blog') ? 'active' : ''; ?>">
                                    <a class="navlink" href="<?php echo base_url();?>Blog">Blogs</a>
                                </li>

                                <li class="<?php echo ($this->uri->segment(1) == 'Solution') ? 'active' : ''; ?>">
                                    <a class="navlink" href="<?php echo base_url();?>Solution">Applications</a>
                                </li>

                                <li class="<?php echo ($this->uri->segment(1) == 'ClientList') ? 'active' : ''; ?>">
                                    <a class="navlink" href="<?php echo base_url();?>ClientList">Our Clients</a>
                                </li>

                                <li class="<?php echo ($this->uri->segment(1) == 'Contact') ? 'active' : ''; ?>">
                                    <a class="navlink" href="<?php echo base_url();?>Contact">Contact</a>
                                </li>
                            </ul>
                        </div>

                        <div class="header-right">
                            <!-- <div class="search-trigger">                                        
                                <i class="fal fa-search"></i>
                            </div> -->
        
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
                                            <li class="<?php echo ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'Home') ? 'active' : ''; ?>">
                                                <a href="<?php echo base_url();?>">Home</a>
                                            </li>
                                            <li class="<?php echo ($this->uri->segment(1) == 'About_us') ? 'active' : ''; ?>">
                                                <a href="<?php echo base_url();?>About_us">About Us</a>
                                            </li>
                                            <li class="<?php echo ($this->uri->segment(1) == 'Team') ? 'active' : ''; ?>">
                                                <a href="<?php echo base_url();?>Team">Our Team</a>
                                            </li>
                                            <li class="<?php echo ($this->uri->segment(1) == 'Blog') ? 'active' : ''; ?>">
                                                <a href="<?php echo base_url();?>Blog">Blogs</a>
                                            </li>
                                            <li class="<?php echo ($this->uri->segment(1) == 'Contact') ? 'active' : ''; ?>">
                                                <a href="<?php echo base_url();?>Contact">Contact</a>
                                            </li>
                                        </ul>
                                    </nav>  
                                    <div class="action-bar">
                                        <a href="mailto:info@Saka India.com"><i class="las la-envelope"></i>sales@sakaindia.com</a>
                                        <a href="tel:123-456-7890"><i class="fal fa-phone"></i>+91 956 109 4128</a>
                                        <a href="<?php echo base_url();?>Contact" class="white-btn">Contact Us</a>
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

    <!-- Header Area End -->
     <script>
            document.addEventListener('contextmenu', function(event) {
            if (event.target.nodeName === 'IMG') {
                event.preventDefault();
                return false;
            }
        }, false);

        // You can also add a custom message
        document.addEventListener('contextmenu', function(event) {
            if (event.target.nodeName === 'IMG') {
                event.preventDefault();
                alert("Copyright © Saka India, Image downloading is not permitted.");
                return false;
            }
        }, false);
             
        // Prevent dragging of images
        // This will prevent dragging of images on the entire document
        document.addEventListener('dragstart', function(event) {
            if (event.target.nodeName === 'IMG') {
                event.preventDefault();
                return false;
            }
        }, false);


     </script>

<style>
/* Add these styles to ensure active states are properly visible */
.main-menu ul li.active > a.navlink {
    color: var(--primary-color);
    font-weight: 600;
}

.main-menu ul li.active > a.navlink::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: var(--primary-color);
    transform: scaleX(1);
    transition: transform 0.3s ease;
}

.main-menu ul li > a.navlink::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: var(--primary-color);
    transform: scaleX(0);
    transition: transform 0.3s ease;
}

.main-menu ul li > a.navlink:hover::after {
    transform: scaleX(1);
}

/* Mobile menu active states */
.mobile-nav .metismenu li.active > a {
    color: var(--primary-color);
    font-weight: 600;
    background-color: rgba(0, 123, 255, 0.1);
}

/* Sub-menu active states */
.main-menu ul li.active .sub-menu li a:hover,
.main-menu ul li .sub-menu li.active > a {
    color: var(--primary-color);
    background-color: rgba(0, 123, 255, 0.1);
}
</style>
</body>
</html>