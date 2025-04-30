<style>
    
    #heroVideo{
        position: relative;
        top:0;
        left:0;   
        min-width: 100%;
        max-width:100%;
        z-index: -1;

     
    }

   .hero-area-banner{
        position: absolute;
        background-color: #ddd;
        color: #fff;
        width: 100%;
        height: 800px;
        display: table;
        position: relative;
        top:25%;
        left:0;
        z-index: 999;
    } 
    .counter-number {
        font-size: 40px;
        font-weight: ;
        color: #333;
        transition: all 1s ease-in-out;
   }
   .services-text{
        background-color:#e7e7e7;
   }

   /* Featured Products Grid Styles */
   .featured-products-section {
       background: #f8f9fa;
       padding: 60px 0;
   }

   #featuredProductsGrid {
       display: grid;
       grid-template-columns: repeat(3, minmax(0, 1fr));
       gap: 30px;
       padding: 20px 0;
       width: 100%;
       max-width: 1200px;
       margin: 0 auto;
   }

   .featured-product-item {
       position: relative;
       border-radius: 8px;
       overflow: hidden;
       cursor: pointer;
       transition: all 0.3s ease;
       width: 100%;
       padding-bottom: 100%; /* Creates a square aspect ratio */
       background: #f8f9fa;
       box-shadow: 0 2px 8px rgba(0,0,0,0.1);
   }

   .featured-product-item img {
       position: absolute;
       top: 0;
       left: 0;
       width: 100%;
       height: 100%;
       object-fit: contain;
       transition: transform 0.3s ease;
       padding: 20px;
   }

   .featured-product-item:hover {
       transform: translateY(-3px);
       box-shadow: 0 5px 15px rgba(0,0,0,0.1);
   }

   .featured-product-item:hover img {
       transform: scale(1.03);
   }

   .featured-product-overlay {
       position: absolute;
       bottom: 0;
       left: 0;
       right: 0;
       padding: 15px;
       background: rgba(0, 0, 0, 0.7);
       color: white;
       opacity: 0;
       transition: opacity 0.3s ease;
   }

   .featured-product-item:hover .featured-product-overlay {
       opacity: 1;
   }

   .featured-product-title {
       font-size: 1.2rem;
       margin-bottom: 3px;
       font-weight: 600;
       line-height: 1.3;
       color: #fff;
   }

   .featured-product-category {
       font-size: 0.8rem;
       opacity: 0.8;
       color: #fff;
   }

   @media (max-width: 1200px) {
       #featuredProductsGrid {
           grid-template-columns: repeat(3, minmax(0, 1fr));
           gap: 20px;
           padding: 0 15px;
       }
   }

   @media (max-width: 992px) {
       #featuredProductsGrid {
           grid-template-columns: repeat(2, minmax(0, 1fr));
           gap: 20px;
       }
   }

   @media (max-width: 576px) {
       #featuredProductsGrid {
           grid-template-columns: repeat(1, minmax(0, 1fr));
           gap: 15px;
       }
   }

</style>

<div id="smooth-content">

<!-- Hero Area -->
    
<div id="home-1" class="hero-area" style="background-color:#FBFBFB;">
    <div class="container">
            <div class="row align-items-center justify-content-center hero-area-inner">
                <div class="col-xl-10 col-lg-10 col-md-10 text-center wow fadeInUp animated" data-wow-delay="200ms">
                    <div class="hero-area-content">
                        <div class="section-title mb-0">                                                        
                             <h1>Pioneers <span><img src="<?php echo base_url();?>assets/img/1558587673885.jpg" alt=""></span>  In Process <br> Engineering Solutions</h1>                                                                                            
                            <div class="p-animation">
                                <p>Our team of expert engineers and designers works closely with clients to create robust, functional and state of art solutions<br> that are tailored to their specific process engineering needs.</p>
                            </div>  
                               <a href="<?php echo base_url();?>index.php/Contact" class="theme-btn mt-20">Start a Project</a>                                  
                        </div>
                    </div>                                                      
                </div>                
            </div>
        </div>
                                                                     
     <!-- Video Section Commented Out
     <div class="container-fluid mt-4" style="overflow:hidden;">
        <video class="col-md-12" autoplay muted loop id="hero  Video">
                <source src="<?php echo base_url();?>assets/img/video/Saka-Corporate Video_final.mp4" type="video/mp4">
        </video>
     </div>
     -->

     <!-- Featured Products Grid -->
     <div class="featured-products-section section-padding pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2>Our Featured Products</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-12">
                    <div id="featuredProductsGrid">
                        <!-- Products will be loaded here via JavaScript -->
                    </div>
                </div>
            </div>
            <div class="row mt-40">
                <div class="col-12 text-center">
                    <a href="<?php echo base_url();?>index.php/Project" class="theme-btn">See More Products</a>
                </div>
            </div>
        </div>
     </div>



 <!-- Client Section  -->

    <div class="client-area section-padding pt-100 pb-0 mb-100">
     <div class="section-title text-center">
            <h3>Exporting in 15+ Countries Globally</h3>
            </div>
        <div class="container">
         <div class="row align-items-center">
           
            <div class="col-12">
                <div class="client-wrap owl-carousel">
                    <div class="single-client d-flex flex-column">
                        <img src="<?php echo base_url();?>assets/img/client/USA-flag.png" alt="USA-flag"> 
                        <h5>USA</h5>
                        
                    </div>
                    <div class="single-client d-flex flex-column">
                        <img src="<?php echo base_url();?>assets/img/client/UAE-flag.png" alt="UAE-flag">
                        <h5>UAE</h5>
                     
                    </div>
                    <div class="single-client d-flex flex-column">
                        <img src="<?php echo base_url();?>assets/img/client/croatia-flag.png" alt="Croatia">
                        <h5>Croatia</h5>
                    </div>
                    <div class="single-client d-flex flex-column">
                        <img src="<?php echo base_url();?>assets/img/client/Portugal-flag.png" alt="Portugal-flag">
                        <h5>Portugal</h5>
                    </div>
                    <div class="single-client d-flex flex-column">
                         <img src="<?php echo base_url();?>assets/img/client/poland-flag.png" alt="Poland-flag">
                        <h5>Poland</h5>
                    </div>
                    <div class="single-client d-flex flex-column">
                        <img src="<?php echo base_url();?>assets/img/client/thailand-flag.png" alt="Thailand-flag">
                        <h5>Thailand</h5>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>

     
    <!-- About Section  -->
     <div class="about-section section-padding pt-0">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="section-title">
                        <h2>About <br> Saka India <span class="d-none d-md-block"><i class="las la-arrow-down ml-40"></i></span></h2>                            
                    </div>
                    <div class="about-desc mt-60 pl-150">
                        <p>Saka India is a team of experienced engineers and designers Who are passionate about developing technology that serves the true purpose of your business.The commitment to be always aligned to Customer's purpose has earned us a 85% repeat business,
                        even as the base of customers doubled every year since the inception.</p>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-4 offset-lg-1 col-lg-4 col-md-6 text-end">
                    <div class="about-img">
                        <img src="assets/img/about/saka-about-image.jpg" alt="">
                    </div>
                </div>
            </div>            
        </div>
    </div>

    
<!-- Counter Section -->
 
<div class="counter-section section-padding pt-50 pb-50">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-counter-box">
                        <p class="counter-number"><span>400 </span>+</p>
                        <h6>Plant Installations</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-counter-box">
                        <p class="counter-number"><span>300</span>+</p>
                        <h6>Processes Analyzed</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-counter-box">
                        <p class="counter-number"><span>99</span>%</p>
                        <h6>Client Satisfaction</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-counter-box">
                        <p class="counter-number"><span>20</span>+</p>
                        <h6>Year of Experience</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <!-- Service Section  -->




    <!-- Project Section  -->

    <div id="project-3" class="project-section section-padding pt-100 pb-100">
        <div class="container"> 
            <div class="row">
                <div class="section-title">
                    <h2>Our Featured Work</h2>
                </div>
            </div>
            <div class="row">
                <nav>
                    <div class="nav project-list" role="tablist">                        
                        <button class="nav-link active" id="architecture-design-tab" data-bs-toggle="tab" data-bs-target="#architecture-design" type="button" role="tab" aria-controls="architecture-design" aria-selected="false">Granulation System</button>
                        <button class="nav-link" id="interior-design-tab" data-bs-toggle="tab" data-bs-target="#interior-design" type="button" role="tab" aria-controls="interior-design" aria-selected="false">Spray Dryer</button>
                        <button class="nav-link" id="project-management-tab" data-bs-toggle="tab" data-bs-target="#project-management" type="button" role="tab" aria-controls="project-management" aria-selected="false">Rotary Dryer</button>
                        <button class="nav-link" id="historic-preservation-tab" data-bs-toggle="tab" data-bs-target="#historic-preservation" type="button" role="tab" aria-controls="historic-preservation" aria-selected="false">Drying Systems</button>
                        <button class="nav-link" id="landscape-design-tab" data-bs-toggle="tab" data-bs-target="#landscape-design" type="button" role="tab" aria-controls="landscape-design" aria-selected="false">Air Heating Systems</button>                          
                        <button class="nav-link" id="furniture-remodel-tab" data-bs-toggle="tab" data-bs-target="#furniture-remodel" type="button" role="tab" aria-controls="furniture-remodel" aria-selected="false">Fluid Bed Dryer</button>
                                               
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">                   
                    <div class="tab-pane fade show active" id="architecture-design" role="tabpanel" aria-labelledby="architecture-design-tab" tabindex="0">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">                                
                                <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/granulation-systems-20-ton-per-day-nagpur.jpg" style="cursor: pointer;" onclick="">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>01</h2>
                                            <h4>Nagpur</h4>
                                            <h5 class="text-white">Capacity: 20 ton/day</h5>
                                        </div>
                                    </div>                                                                        
                                </div>                                
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                             <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/granulation-systems-5000kg-per-hr-jagadiya-gujarat.jpg" style="cursor: pointer;" onclick="">                                   
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                        <h2>02</h2>    
                                        <h4>Jagadiya, Gujarat</h4>
                                        <h5 class="text-white">Capacity: 5000 kg/hr</h5>
                                        </div>
                                    </div>                                                                        
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                              <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/granulation-systems-50-ton-per-day-bhuj-gujarat.jpg" style="cursor: pointer;" onclick="">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>03</h2>
                                            <h4>Bhuj, Gujarat</h4>
                                            <h5 class="text-white">Capacity: 50 ton/day</h5>
                                        </div>
                                    </div>                                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="interior-design" role="tabpanel" aria-labelledby="interior-design-tab" tabindex="0">
                        <div class="row">                            
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">                                
                               <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/co-current-2500kg-per-hr-1.jpg" style="cursor: pointer;" onclick="">                                  
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>01</h2>
                                            <h4>Baroda</h4>
                                            <h5 class="text-white">Capacity:9000 kg/hr</h5>
                                        </div>
                                    </div>                                                                        
                                </div>                                
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                               <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/co-current-2000kg-per-hr.jpg" style="cursor: pointer;" onclick="">                                   
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>02</h2>
                                            <h4>Gujarat</h4>
                                            <h5 class="text-white">Capacity:2000 kg/hr</h5>
                                            
                                        </div>
                                    </div>                                                                        
                                </div>
                            </div>
                            
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                             <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/two-fluid-nozzle-spray-dryer-1.jpg" style="cursor: pointer;" onclick="">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>03</h2>
                                            <h4>Gujarat</h4>
                                            <h5 class="text-white">Capacity:300 kg/hr</h5>
                                            
                                        </div>
                                    </div>                                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="project-management" role="tabpanel" aria-labelledby="project-management-tab" tabindex="0">
                        <div class="row">                                
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-12">                                
                                <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/rotary-dryer-2000kg-per-hr-1.jpg" style="cursor: pointer;" onclick="">                                   
                                        <div class="featured-work-inner">
                                            <div class="fetured-work-bg">                                              
                                            </div>
                                            <a href="#" class="details-link">
                                                <i class="las la-arrow-right"></i>
                                            </a>
                                            <div class="featured-work-info">
                                                <h2>01</h2>
                                                <h4> Bhuj, Gujarat</h4>
                                                <h5 class="text-white">Capacity:2000 kg/hr</h5>
                                            </div>
                                        </div>                                                                        
                                    </div>                                
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                    <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/conduction-rotary-dryer.jpg" style="cursor: pointer;" onclick="">                                   

                                        <div class="featured-work-inner">
                                            <div class="fetured-work-bg">                                              
                                            </div>
                                            <a href="#" class="details-link">
                                                <i class="las la-arrow-right"></i>
                                            </a>
                                            <div class="featured-work-info">
                                                <h2>02</h2>
                                                <h4>Maharashtra</h4>
                                                <h5 class="text-white">Capacity:5000 kg/hr</h5>
                                            </div>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                    <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/counter-current-rotary-dryer-2500kg-per-hr.jpg" style="cursor: pointer;" onclick="">                                   

                                        <div class="featured-work-inner">
                                            <div class="fetured-work-bg">                                              
                                            </div>
                                            <a href="#" class="details-link">
                                                <i class="las la-arrow-right"></i>
                                            </a>
                                            <div class="featured-work-info">
                                                <h2>03</h2>
                                                <h4>Sarigam, Gujarat</h4>
                                                <h5 class="text-white">Capacity: 2500 kg/hr</h5>
                                            </div>
                                        </div>                                                                        
                                    </div>
                                </div>
                            </div>                          
                        </div>
                    </div>
                    <div class="tab-pane fade" id="historic-preservation" role="tabpanel" aria-labelledby="historic-preservation-tab" tabindex="0">
                        <div class="row">                                
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">                                
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-10.jpg" style="cursor: pointer;" onclick="">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>01</h2>
                                            <h4>Sears Tower</h4>
                                        </div>
                                    </div>                                                                        
                                </div>                                
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-11.jpg" style="cursor: pointer;" onclick="">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>02</h2>
                                            <h4>Willis Mall</h4>
                                        </div>
                                    </div>                                                                        
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-12.jpg" style="cursor: pointer;" onclick="">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>03</h2>
                                            <h4>Pixel IT Park</h4>
                                        </div>
                                    </div>                                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="landscape-design" role="tabpanel" aria-labelledby="landscape-design-tab" tabindex="0">
                        <div class="row">                                
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">                                
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-13.jpg" style="cursor: pointer;" onclick="">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>01</h2>
                                            <h4>Dinning Spaces</h4>
                                        </div>
                                    </div>                                                                        
                                </div>                                
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-14.jpg" style="cursor: pointer;" onclick="">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>02</h2>
                                            <h4>Common Area</h4>
                                        </div>
                                    </div>                                                                        
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-15.jpg" style="cursor: pointer;" onclick="">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>03</h2>
                                            <h4>House Yard Design</h4>
                                        </div>
                                    </div>                                                                        
                                </div>
                            </div>
                        </div>
                    </div>                        
                    <div class="tab-pane fade" id="furniture-remodel" role="tabpanel" aria-labelledby="furniture-remodel-tab" tabindex="0">
                        <div class="row">                                
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">                                
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-16.jpg" style="cursor: pointer;" onclick="">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>01</h2>
                                            <h4>Floor Design</h4>
                                        </div>
                                    </div>                                                                        
                                </div>                                
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-17.jpg" style="cursor: pointer;" onclick="">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>02</h2>
                                            <h4>Green Planting</h4>
                                        </div>
                                    </div>                                                                        
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-18.jpg" style="cursor: pointer;" onclick="">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="#" class="details-link">
                                            <i class="las la-arrow-right"></i>
                                        </a>
                                        <div class="featured-work-info">
                                            <h2>03</h2>
                                            <h4>Furniture Design</h4>
                                        </div>
                                    </div>                                                                        
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </div>

    <!-- Client Section  -->

  <div class="client-area section-padding pt-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="client-wrap owl-carousel">
                    <div class="single-client">
                        <img src="<?php echo base_url();?>assets/img/client/asian-paints.jpg" alt="asian-paints-logo">
                    </div>
                    <div class="single-client">
                        <img src="<?php echo base_url();?>assets/img/client/godrej.jpg" alt="godrej-logo">
                    </div>
                     <div class="single-client">
                        <img src="<?php echo base_url();?>assets/img/client/johnson.jpg" alt="johnson-logo">
                    </div>
                    <div class="single-client">
                        <img src="<?php echo base_url();?>assets/img/client/BARC.jpg" alt="BARC-logo">
                    </div>
                    <div class="single-client">
                        <img src="<?php echo base_url();?>assets/img/client/adityabirla-chemicals.jpg" alt="aditya-birla-chemicals-logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   

    <!-- Testimonial Section  -->

    <div class="testimonial-section section-padding pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-title mb-0 text-md-end">
                        <h3><i class="las la-arrow-down d-none d-md-block"></i> What Our Clients Are Saying</h3>
                    </div>                    
                </div>
            </div>
            <hr>
            <div class="row mt-50">
                <div class="col-xl-7 col-lg-7">
                    <div class="testimonial-wrapper owl-carousel">
                    
                        <div class="single-testimonial-item">
                            <div class="quote-icon">
                                <img src="assets/img/straight-quotes.png" alt="">
                            </div>
                            <div class="testimonial-content">
                                <p>We've been working with Saka India for over three years now, and their commitment to quality and precision is unmatched. Their team has consistently delivered high-grade materials that meet our stringent standards.</p>
                            </div>
                            <div class="testimonial-author">
                                <!--<img src="assets/img/testimonial/1.png" alt="">-->
                                <h6 class="text-black">Madhav Patel <span>Ahemedabad, Gujrat</span></h6>
                            </div>

                        </div>
                        <div class="single-testimonial-item">
                            <div class="quote-icon">
                                <img src="assets/img/straight-quotes.png" alt="">
                            </div>
                            <div class="testimonial-content">
                                <p>Saka India has been instrumental in helping us streamline our manufacturing process. Their expertise in chemical processing and timely delivery has significantly reduced our downtime and improved efficiency</p>
                            </div>
                            <div class="testimonial-author">
                                <!--<img src="assets/img/testimonial/2.png" alt="">-->
                                <h6 class="text-black">Paul Scholes <span>Manchester, UK</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="testimonial-bg-wrapper d-none d-md-block">
                        <img src="assets/img/saka-testimonial-global.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section  -->
    <div class="why-choose-us-section section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="section-title">
                        <h2>Why Choose Saka India?</h2>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-8 offset-lg-1 col-lg-8">
                    <div class="single-choose-item">
                        <div class="single-choose-inner">
                            <h5><span>01</span>Process Expertise</h5> 
                            <p>The deep process expertise means our products are embedded with an inherent
                                vision for scaling up or adapting to future needs of your business,
                                thus ensuring an enduring technology for the processes.</p>                                                           
                        </div>  
                        <!--<div class="choose-img">-->
                        <!--    <img src="assets/img/choose/1.jpg" alt="">-->
                        <!--</div>                      -->
                    </div>
                    <div class="single-choose-item">
                        <div class="single-choose-inner">
                            <h5><span>02</span>Advanced CFD Anlaysis</h5>
                            <p>Using next generation Computational Fluid Dynamics(CFD) techniques SAKA is able to simulate and analyse the material behavior and properties in the process.</p>                                                                
                        </div>    
                        <!--<div class="choose-img">-->
                        <!--    <img src="assets/img/choose/2.jpg" alt="">-->
                        <!--</div>                                          -->
                    </div>
                    <div class="single-choose-item">
                        <div class="single-choose-inner">
                            <h5><span>03</span>Intelligent Automation</h5> 
                            <p>SAKA's focus in automation is to leverage advanced PLC/SCADA technology to build intelligent drying processes that ensure highest efficiency in operations and best quality output.</p>                                                           
                        </div> 
                        <!--<div class="choose-img">-->
                        <!--    <img src="assets/img/choose/3.jpg" alt="">-->
                        <!--</div>                                             -->
                    </div>
                    <div class="single-choose-item">
                        <div class="single-choose-inner">
                            <h5><span>04</span>World Class Quality</h5> 
                            <p>Being world-class is core to our strategy.We have established an extensive system of checks to ensure only the highest quality in our sourcing,manufacturing and site work.</p>                                                           
                        </div>  
                        <!--<div class="choose-img">-->
                        <!--    <img src="assets/img/choose/4.jpg" alt="">-->
                        <!--</div>                                            -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Section  -->

    <div class="team-section gray-bg section-padding pb-100">
        <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
            <div class="section-title">            
                <div class="heading-animation">
                    <h2>Our Team</h2>
                </div>
                <span class="d-none d-md-block"><i class="las la-arrow-down mt-30"></i></span>
            </div>                      
            </div>
            <div class="col-xl-6 col-lg-6">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="200ms">
                <div class="single-team-item">
                    <div class="team-img">
                   
                    <img src=" <?php echo base_url();?>assets/img/team/anand-sir.jpg" alt="anand sir-Image">
                    </div>
                    <div class="team-info">
                    <h5>Anand Thigale</h5>
                    <hr>
                    <p>[Managing Director]</p>
                    </div>                    
                </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="400ms">
                <div class="single-team-item">
                    <div class="team-img">
                    <img src=" <?php echo base_url();?>assets/img/team/sunil.jpg" alt="Sunil-Kumar-Yadav-Image">
                    </div>
                    <div class="team-info">
                    <h5>Mr. Sunil Kumar Yadav</h5>
                    <hr>
                    <p>[Sr. GM Project]</p>
                    </div>
                    
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
             <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="400ms">
            <div class="single-team-item">
                <div class="team-img">
                <img src="<?php echo base_url();?>assets/img/team/Sanjay-Shah (1).png" alt="Sanjay-Shah" >
                </div>
                <div class="team-info">
                <h5>Sanjay Shah</h5>
                <hr>
                <p>[Director]</p>
                </div>
                
            </div>
            </div>
             <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="200ms">
            <div class="single-team-item">
                <div class="team-img">
                <img src="<?php echo base_url();?>assets/img/team/Saurabh-Thigale.jpg" alt="Saurabh-Thigale" >
                </div>
                <div class="team-info">
                <h5>Saurabh Thigale</h5>
                <hr>
                <p>[Manager - Design]</p>
                </div>
                
            </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="600ms">
            <div class="single-team-item">
                <div class="team-img">
                <img src=" <?php echo base_url();?>assets/img/team/Rekha-Malvadkar.png" alt="Rekha-Malvadkar-Image">
                </div>
                <div class="team-info">
                <h5>Mrs. Rekha-Malvadkar</h5>
                <hr>
                <p>[Director Finance & Accounts]</p>
                </div>
            
            </div>
            </div>
           
            <!--<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="600ms">-->
            <!--<div class="single-team-item">-->
            <!--    <div class="team-img">-->
            <!--    <img src="assets/img/team/6.jpg" alt="" >-->
            <!--    </div>-->
            <!--    <div class="team-info">-->
            <!--    <h5>Phil Jhones</h5>-->
            <!--    <hr>-->
            <!--    <p>[Enginner]</p>-->
            <!--    </div>-->
            
            <!--</div>-->
            <!--</div>-->
        </div>
        </div>
    </div>


    <!-- CTA Area  -->
    <!-- <div class="cta-area-two gray-bg" data-background="assets/img/cta-sketch.png">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-7 col-lg-7">
                    <div class="section-title">
                        <h2>Interested in seeing <br> more of our <br> work? <span><i class="las la-arrow-right"></i></span> </h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="cta-content">
                        <p>Explore our <a href="#">portfolio</a> to see examples of our projects and get inspired for your own space.</p>
                    </div>
                </div>
            </div>
        </div> -->

    <!-- Blog Section  -->
    <div id="blog-3" class="blog-section section-padding pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="section-title">                    
                        <h2>Saka Insights</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-40"> 
              <?php if(!empty($results)){ foreach($results as $row){
						   ?>                              
                <div class="single-blog-item pt-40 pb-40"> 
                    <div class="blog-bg">
                        <img src="<?php echo base_url(); ?>uploads/Blog/<?php echo $row->Image; ?>" alt="ceo-letter" style="border-radius: 5px;">
                    </div>                       
                    <div class="blog-content">                        
                        <!-- <div class="blog-meta">
                            <p>Architecture</p>
                        </div> -->
                        <div class="blog-info">
                            <div class="blog-author">
                                <p><?php echo $row->Name; ?></p>
                            </div>
                            <div class="blog-date">
                            <p><?php echo date('F j, Y', strtotime($row->insertdate)); ?></p>

                            </div>
                        </div> 
                        <h3><a href="<?php echo base_url();?>index.php/SingleBlog/<?php echo $row->Title;?>"><?php echo $row->Title; ?></a></h3>
                        <p> <?php 
                                                            $content = strip_tags($row->Content); 
                                                            // Remove any extra spaces or line breaks within the content
                                                            $content = preg_replace('/\s+/', ' ', $content); // This replaces multiple spaces with a single space
                                                            
                                                            $shortContent = substr($content, 0, 300); 
                                                            if (strlen($content) > 300) { 
                                                                $shortContent .= '...'; 
                                                            } 
                                                            echo $shortContent; 
                                                        ?></p>                                                       
                        <a href="<?php echo base_url();?>index.php/SingleBlog/<?php echo $row->Title;?>" class="read-more-btn" style="font-size: 18px;">Read More <i class="las la-arrow-right"></i></a>
                    </div>                                           
                </div>
                <?php } } else {?>  
                    <?php } ?>                                    
            </div>            
        </div>
    </div>

    <!-- Newsletter Section  -->

    <!--<div class="newsletter-section" style="z-index:200 !important;">-->
    <!--    <div class="container">-->
    <!--        <div class="row newsletter-inner gray-bg align-items-center">-->
    <!--            <div class="col-xl-7 col-lg-7">-->
    <!--                <div class="section-title">-->
    <!--                    <h2>Stay Up-to-date <br> with Saka India <span><i class="las la-arrow-right"></i></span> </h2>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-xl-5 col-lg-5">-->
    <!--                <div class="newsletter-content">-->
    <!--                    <p>Sign up for our newsletter to stay in the know about our latest projects, design insight and industry news. </p>-->
                        <!-- <h3>We will deliver our best content straight to your inbox.</h3> -->
    <!--                    <div class="subscribed-form">-->
    <!--                        <form>-->
    <!--                            <input type="text" placeholder="Type your Email">-->
    <!--                            <input class="bordered-btn" type="submit" value="Sign Up">-->
    <!--                        </form>-->

    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->



    <style>
    
    /* Product Catalog Styles */
    
    .search-filter-section {
        background: #f8f9fa;
        padding: 20px 0;
        position: sticky;
        top: 0;
        z-index: 1000;
    }
    
    .search-wrapper {
        position: relative;
        margin-bottom: 10px;
        margin-top: 20px;
    }
    
    .search-input-group {
        position: relative;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .search-input-group i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
    }
    
    .search-input-group input {
        padding-left: 45px;
        height: 65px;
        border-radius: 8px;
        border: 1px solid #ddd;
        width: 100%;
        font-size: 15px;
        transition: all 0.3s ease;
    }
    
    .search-input-group input:focus {
        border-color: #01a0e2;
        box-shadow: 0 0 0 2px rgba(1, 160, 226, 0.1);
        outline: none;
    }
    
    /* Search Suggestions Styles */
    .search-suggestions {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        max-height: 300px;
        overflow-y: auto;
        z-index: 1001;
        display: none;
    }
    
    .search-suggestions.show {
        display: block;
    }
    
    .suggestion-item {
        padding: 12px 15px;
        cursor: pointer;
        transition: background-color 0.2s;
        border-bottom: 1px solid #eee;
    }
    
    .suggestion-item:last-child {
        border-bottom: none;
    }
    
    .suggestion-item:hover {
        background-color: #f5f5f5;
    }
    
    .suggestion-item .product-name {
        font-weight: 500;
        color: #333;
    }
    
    .suggestion-item .product-category {
        font-size: 0.8em;
        color: #666;
        margin-top: 4px;
    }
    
    .product-grid-section {
        min-height: 100vh;
        position: relative;
    }
    
    #productGrid {
        display: grid;
        grid-template-columns: repeat(3, 382px);
        gap: 20px;
        padding: 20px 0;
        justify-content: center;
    }
    
    .product-item {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 382px;
        height: 382px;
        background: #f8f9fa;
    }
    
    .product-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .product-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .product-item:hover img {
        transform: scale(1.03);
    }
    
    .product-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 15px;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .product-item:hover .product-overlay {
        opacity: 1;
    }
    
    .product-title {
        font-size: 1.2rem;
        margin-bottom: 3px;
        font-weight: 600;
        line-height: 1.3;
    }
    
    .product-category {
        font-size: 0.8rem;
        opacity: 0.8;
    }
    
    /* Bento Grid Layout */
    .product-item:nth-child(3n+1) {
        grid-column: span 1;
        grid-row: span 1;
    }
    
    .product-item:nth-child(3n+2) {
        grid-column: span 1;
        grid-row: span 1;
    }
    
    .product-item:nth-child(3n+3) {
        grid-column: span 1;
        grid-row: span 1;
    }
    
    /* Featured Product Highlight */
    .product-item:nth-child(5n+1) {
        grid-column: span 2;
        grid-row: span 1;
    }
    
    @media (max-width: 1200px) {
        #productGrid {
            grid-template-columns: repeat(2, 382px);
        }
    }
    
    @media (max-width: 800px) {
        #productGrid {
            grid-template-columns: 382px;
        }
    }
    
    /* Loading Animation */
    
    .loading {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.8);
    }
    
    .loading-spinner {
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid #01a0e2;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    /* No Results Message */
    .no-results {
        grid-column: 1 / -1;
        text-align: center;
        padding: 30px;
        color: #666;
        font-size: 1.1rem;
        background: #f8f9fa;
        border-radius: 8px;
    }
    .product-item img{
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    </style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const products = [
        {
            id: 1,
            name: "Granulation Calcium Chloride",
            image: "assets/img/products/granulation/CaCl2-Granulation-Plant.JPG",
            category: "Granulation",
            tags: ["granulation", "chemical"]
        },
        {
            id: 2,
            name: "Granulation Sodium Benzoate",
            image: "assets/img/products/granulation/Sodium-Benzoate-Granulation-System.JPG",
            category: "Granulation",
            tags: ["granulation", "chemical"]
        },
        {
            id: 3,
            name: "Granulation Calcium Nitrate",
            image: "assets/img/products/granulation/calcium-nitrate.jpg",
            category: "Granulation",
            tags: ["granulation", "chemical"]
        },
        { 
            id: 4,
            name: "Nozzle Type Spray Dryer",
            image: "assets/img/products/spray-dryers/NOZZLE-TYPE-SPRAY-DRYER.JPG",
            category: "Spray Dryers",
            tags: ["dryer", "industrial"]
        },
        {
            id: 5,
            name: "Atomiser Type Spray Dryer",
            image: "assets/img/products/spray-dryers/Atomiser-Type-Spray-Dryer.JPG",
            category: "Spray Dryers",
            tags: ["dryer", "industrial"]
        },
        {
            id: 6,
            name: "Three Stage Spray Dryer",
            image: "assets/img/products/spray-dryers/Three-Stage-Spray-Dryer.JPG",
            category: "Spray Dryers",
            tags: ["dryer", "industrial"]
        }
    ];

    const featuredProductsGrid = document.getElementById('featuredProductsGrid');
    featuredProductsGrid.innerHTML = '';
    
    // Only show first 6 products
    products.slice(0, 6).forEach(product => {
        const productCard = document.createElement('div');
        productCard.className = 'featured-product-item';
        
        const baseUrl = "<?php echo base_url(); ?>";
        productCard.innerHTML = `
            <img src="${baseUrl}${product.image}" alt="${product.name}">
            <div class="featured-product-overlay">
                <h3 class="featured-product-title">${product.name}</h3>
                <p class="featured-product-category">${product.category}</p>
            </div>
        `;
        
        featuredProductsGrid.appendChild(productCard);
    });
});
</script>
   