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
        font-weight: bold;
        color: #333;
        transition: all 1s ease-in-out;
   }
   .services-text{
        background-color:#e7e7e7;
   }


</style>

<script>
    // Wait for the document to be ready
document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll('.counter-number');
    
    const animateCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        let count = 0;
        const increment = Math.ceil(target / 100); // Set the increment step for smooth counting
        
        const interval = setInterval(() => {
            count += increment;
            if (count >= target) {
                count = target;
                clearInterval(interval);
            }
            counter.textContent = count;  // Update the counter number
        }, 10);  // Update every 10ms
    };

    // Trigger counter animation when the element is in view
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target); // Stop observing after the animation is done
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => {
        observer.observe(counter);  // Start observing the counter
    });
});

</script>


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
                               <a href="about.html" class="theme-btn mt-20">Start a Project</a>                                  
                        </div>
                    </div>                                                      
                </div>                
            </div>
        </div>
                                                                     
     <div class="container-fluid mt-4">
        <video class="col-md-12" autoplay muted loop id="hero  Video">
                <source src="<?php echo base_url();?>assets/img/video/saka-video3.mp4" type="video/mp4">
                
                
        </video>

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
                        <img src="<?php echo base_url();?>assets/img/client/uae-flag.png" alt="UAE-flag">
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
                        <p>Saka India is a team of experienced engineers and designers Who are passionate about developing technology that serves the true purpose of your business.The commitment to be always aligned to Customer’s purpose has earned us a 85% repeat business,
                        even as the base of customers doubled every year since the inception.</p>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-4 offset-lg-1 col-lg-4 col-md-6 text-end">
                    <div class="about-img">
                        <img src="assets/img/about/about-3.jpg" alt="">
                    </div>
                </div>
            </div>            
        </div>
    </div>

    
<!-- Counter Section -->
 
<div class="counter-section section-padding pt-0 pb-50">
    <div class="container">
        <div class="row gx-5">                
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-counter-box">
                    <p class="counter-number" data-target="65">0</p>
                    <h6>Year of Experience</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-counter-box">
                    <p class="counter-number" data-target="250">0</p>
                    <h6>Installations</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">    
                <div class="single-counter-box">
                    <p class="counter-number" data-target="300">0</p>
                    <h6>Locations Across World</h6>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-counter-box">
                    <p class="counter-number" data-target="98">0</p>
                    <h6>Clients Satisfaction</h6>
                </div>
            </div>                             
        </div>            
    </div>
</div>


  <!-- Service Section  -->

  <div class="service-section section-padding pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <div class="services-tab-wrapper">
                        <div class="section-title">
                            <div class="heading-animation">
                                <h2>Our Products</h2>                                
                            </div>                            
                        </div>                        
                        <div class="services-tabs mt-100"> 
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation">
                                    <a href="#services-item-1" class="active" data-bs-toggle="tab" role="tab" aria-controls="services-item-1" aria-selected="true">Granulation System<span class="number">01</span></a>
                                </li>
                                <li role="presentation">
                                    <a href="#services-item-2" data-bs-toggle="tab" role="tab" aria-controls="services-item-2" aria-selected="false">Spray Dryer<span class="number">02</span></a>
                                </li>
                                <li role="presentation">
                                    <a href="#services-item-3" data-bs-toggle="tab" role="tab" aria-controls="services-item-3" aria-selected="false">Rotary Dryer<span class="number">03</span></a>
                                </li>
                                <li role="presentation">
                                    <a href="#services-item-4" data-bs-toggle="tab" role="tab" aria-controls="services-item-4" aria-selected="false">Fluid Bed Dryer <span class="number">04</span></a>
                                </li>
                                <li role="presentation">
                                    <a href="#services-item-5" data-bs-toggle="tab" role="tab" aria-controls="services-item-5" aria-selected="false">Flash Dryer<span class="number">05</span></a>
                                </li>
                                <li role="presentation">
                                    <a href="#services-item-6" data-bs-toggle="tab" role="tab" aria-controls="services-item-6" aria-selected="false">Hot Air Generator<span class="number">06</span></a>
                                </li>
                                                        
                            </ul>                                
                        </div> 
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="tab-content services-content">
                                    
                        <!-- Tab Content -->
                        <div class="tab-pane services-content-item fade active show" id="services-item-1" role="tabpanel">                            
                            <div class="services-text">
                                <div class="services-text-container">
                                    <h4 class="services-title">Granulation System</h4>
                                    <p class="text-gray mb-0">
                                        SAKA offers complete turn key solution for granulation systems right from drying till packing of granules. Our systems are widely used for granule formation for chemicals like Calcium Chloride, Magnesium Chloride, Calcium Nitrate etc. SAKA’s Granulation systems are custom built to provide desired size of granules. 
                                    </p>
                                </div>
                            </div>                            
                            <img src="<?php echo base_url();?>assets/img/service/granulation-systems-saka-india-450x450.png" alt="granulation-system">                           
                        </div>                        
                        
                        <!-- Tab Content -->
                        <div class="tab-pane services-content-item fade" id="services-item-2" role="tabpanel">                            
                            <div class="services-text">
                                <div class="services-text-container">
                                    <h4 class="services-title">Spray Dryer</h4>
                                    <p class="text-gray mb-0">
                                      SAKA’s Spray Dryers are designed to serve your specific process needs to deliver best output efficiency, with optimum operational costs and no product wastage
                                    </p>
                                </div>
                            </div>                            
                            <img src="<?php echo base_url();?>assets/img/service/spray-dryer.png" alt="spray-dryer">                    
                        </div>                         
                        
                        <!-- Tab Content -->
                        <div class="tab-pane services-content-item fade" id="services-item-3" role="tabpanel">                            
                            <div class="services-text">
                                <div class="services-text-container">
                                    <h4 class="services-title">Rotary Dryer</h4>
                                    <p class="text-gray mb-0">
                                    Rotary Dryers are known for their robust construction. Rotary dryers are able achieve to very high temperature. SAKA offers wide range of Rotary Dryers that are designed to deliver best output, efficiently.
                                    </p>
                                </div>
                            </div>                            
                            <img src="<?php echo base_url();?>assets/img/service/rotary-dryer.jpg" alt="rotary dryer">                   
                        </div>
                        
                        
                        <!-- Tab Content -->
                        <div class="tab-pane services-content-item fade" id="services-item-4" role="tabpanel">
                            
                            <div class="services-text">
                                <div class="services-text-container">
                                    <h4 class="services-title"> Fluid Bed Dryer</h4>
                                    <p class="text-gray mb-0">
                                        The core identity reflects consistent  associations with the brand whereas the extended identity involves the intricate details of the brand that help generate a constant motif.
                                    </p>
                                </div>
                            </div>                            
                            <img src="<?php echo base_url();?>assets/img/service/FLUID-BED-DRYER.png" alt="Fluid Bed Dryer">                                                   
                        </div>                        
                        
                        <!-- Tab Content -->
                        <div class="tab-pane services-content-item fade" id="services-item-5" role="tabpanel">                            
                            <div class="services-text">
                                <div class="services-text-container">
                                    <h4 class="services-title">Flash Dryer</h4>
                                    <p class="text-gray mb-0">
                                        The core identity reflects consistent  associations with the brand whereas the extended identity involves the intricate details of the brand that help generate a constant motif.
                                    </p>
                                </div>
                            </div>                            
                            <img class="services-image" src="assets/img/service/services-5.jpg" alt="Image Description">                                                    
                        </div>
                                                
                        <!-- Tab Content -->
                        <div class="tab-pane services-content-item fade" id="services-item-6" role="tabpanel">                            
                            <div class="services-text">
                                <div class="services-text-container">
                                    <h4 class="services-title">Rotary Dryer</h4>
                                    <p class="text-gray mb-0">
                                      SAKA make Fluid Bed Dryers are ideal for agglomeration, granulation or dry powder formation. Fully customized to meet your specific requirement and trusted by many companies in India and abroad.
                                    </p>
                                </div>
                            </div>
                            
                            <img class="services-image" src="assets/img/service/services-6.jpg" alt="Image Description">                                                
                        </div>
                                                
                    </div>
                </div>
            </div>
        </div>
    </div>



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
                                <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/granulation-systems-20-ton-per-day-nagpur.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                             <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/granulation-systems-5000kg-per-hr-jagadiya-gujarat.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                   
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                              <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/granulation-systems-50-ton-per-day-bhuj-gujarat.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                               <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/co-current-2500kg-per-hr-1.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                  
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                               <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/co-current-2000kg-per-hr.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                   
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                             <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/two-fluid-nozzle-spray-dryer-1.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                                <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/rotary-dryer-2000kg-per-hr-1.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                   
                                        <div class="featured-work-inner">
                                            <div class="fetured-work-bg">                                              
                                            </div>
                                            <a href="project-details.html" class="details-link">
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
                                    <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/conduction-rotary-dryer.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                   

                                        <div class="featured-work-inner">
                                            <div class="fetured-work-bg">                                              
                                            </div>
                                            <a href="project-details.html" class="details-link">
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
                                    <div class="featured-work-wrapper" data-background="<?php echo base_url();?>assets/img/project/counter-current-rotary-dryer-2500kg-per-hr.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                   

                                        <div class="featured-work-inner">
                                            <div class="fetured-work-bg">                                              
                                            </div>
                                            <a href="project-details.html" class="details-link">
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
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-10.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-11.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-12.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-13.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-14.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-15.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-16.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-17.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                                <div class="featured-work-wrapper" data-background="assets/img/project/3-18.jpg" style="cursor: pointer;" onclick="window.location='project-details.html';">                                    
                                    <div class="featured-work-inner">
                                        <div class="fetured-work-bg">                                              
                                        </div>
                                        <a href="project-details.html" class="details-link">
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
                        <a href="#"><img src="assets/img/client/1.png" alt=""></a>
                    </div>
                    <div class="single-client">
                        <a href="#"><img src="assets/img/client/2.png" alt=""></a>
                    </div>
                    <div class="single-client">
                        <a href="#"><img src="assets/img/client/3.png" alt=""></a>
                    </div>
                    <div class="single-client">
                        <a href="#"><img src="assets/img/client/4.png" alt=""></a>
                    </div>
                    <div class="single-client">
                        <a href="#"><img src="assets/img/client/5.png" alt=""></a>
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
                                <p>I hired Saka India to design and build my dream home, and I could be happier with the result. From the intial consultation to the final walk-through, the Saka India team was professional.</p>
                            </div>
                            <div class="testimonial-author">
                                <img src="assets/img/testimonial/1.png" alt="">
                                <h6 class="text-black">Lisa Ray <span>New York, USA</span></h6>
                            </div>

                        </div>
                        <div class="single-testimonial-item">
                            <div class="quote-icon">
                                <img src="assets/img/straight-quotes.png" alt="">
                            </div>
                            <div class="testimonial-content">
                                <p>I hired Saka India to design and build my dream home, and I could be happier with the result. From the intial consultation to the final walk-through, the Saka India team was professional.</p>
                            </div>
                            <div class="testimonial-author">
                                <img src="assets/img/testimonial/2.png" alt="">
                                <h6 class="text-black">Paul Scholes <span>Manchester, UK</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="testimonial-bg-wrapper d-none d-md-block">
                        <img src="assets/img/testimonial-bg.jpg" alt="">
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
                        <div class="choose-img">
                            <img src="assets/img/choose/1.jpg" alt="">
                        </div>                      
                    </div>
                    <div class="single-choose-item">
                        <div class="single-choose-inner">
                            <h5><span>02</span>Advanced CFD Anlaysis</h5>
                            <p>Using next generation Computational Fluid Dynamics(CFD) techniques SAKA is able to simulate and analyse the material behavior and properties in the process.</p>                                                                
                        </div>    
                        <div class="choose-img">
                            <img src="assets/img/choose/2.jpg" alt="">
                        </div>                                          
                    </div>
                    <div class="single-choose-item">
                        <div class="single-choose-inner">
                            <h5><span>03</span>Intelligent Automation</h5> 
                            <p>SAKA's focus in automation is to leverage advanced PLC/SCADA technology to build intelligent drying processes that ensure highest efficiency in operations and best quality output.</p>                                                           
                        </div> 
                        <div class="choose-img">
                            <img src="assets/img/choose/3.jpg" alt="">
                        </div>                                             
                    </div>
                    <div class="single-choose-item">
                        <div class="single-choose-inner">
                            <h5><span>04</span>World Class Quality</h5> 
                            <p>Being world-class is core to our strategy.We have established an extensive system of checks to ensure only the highest quality in our sourcing,manufacturing and site work.</p>                                                           
                        </div>  
                        <div class="choose-img">
                            <img src="assets/img/choose/4.jpg" alt="">
                        </div>                                            
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
                    <p>Managing Director</p>
                    </div>                    
                </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="400ms">
                <div class="single-team-item">
                    <div class="team-img">
                    <img src="assets/img/team/2.jpg" alt="">
                    </div>
                    <div class="team-info">
                    <h5>Natasha Kareem</h5>
                    <hr>
                    <p>[Project Manager]</p>
                    </div>
                    
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="600ms">
            <div class="single-team-item">
                <div class="team-img">
                <img src="assets/img/team/3.jpg" alt="">
                </div>
                <div class="team-info">
                <h5>Decan Rice</h5>
                <hr>
                <p>[Architect]</p>
                </div>
            
            </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="200ms">
            <div class="single-team-item">
                <div class="team-img">
                <img src="assets/img/team/4.jpg" alt="" >
                </div>
                <div class="team-info">
                <h5>Patric Evra</h5>
                <hr>
                <p>[Architect]</p>
                </div>
                
            </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="400ms">
            <div class="single-team-item">
                <div class="team-img">
                <img src="assets/img/team/5.jpg" alt="" >
                </div>
                <div class="team-info">
                <h5>Sophie White</h5>
                <hr>
                <p>[Civil Engineer]</p>
                </div>
                
            </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay="600ms">
            <div class="single-team-item">
                <div class="team-img">
                <img src="assets/img/team/6.jpg" alt="" >
                </div>
                <div class="team-info">
                <h5>Phil Jhones</h5>
                <hr>
                <p>[Architect]</p>
                </div>
            
            </div>
            </div>
        </div>
        </div>
    </div>


    <!-- CTA Area  -->
    <div class="cta-area-two gray-bg" data-background="assets/img/cta-sketch.png">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-7 col-lg-7">
                    <div class="section-title">
                        <h2>Interested in seeing <br> more of our <br> work? <span><i class="las la-arrow-right"></i></span> </h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="cta-content">
                        <p>Explore our <a href="project.html">portfolio</a> to see examples of our projects and get inspired for your own space.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <img src="<?php echo base_url(); ?>uploads/Blog/<?php echo $row->Image; ?>" alt="ceo-letter">
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
                        <a href="<?php echo base_url();?>index.php/SingleBlog/<?php echo $row->Title;?>" class="read-more-btn">Read More</a>
                    </div>                                           
                </div>
                <?php } } else {?>  
                    <?php } ?>                                    
            </div>            
        </div>
    </div>

    <!-- Newsletter Section  -->

    <div class="newsletter-section" style="z-index:200 !important;">
        <div class="container">
            <div class="row newsletter-inner gray-bg align-items-center">
                <div class="col-xl-7 col-lg-7">
                    <div class="section-title">
                        <h2>Stay Up-to-date <br> with Saka India <span><i class="las la-arrow-right"></i></span> </h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="newsletter-content">
                        <p>Sign up for our newsletter to stay in the know about our latest projects, design insight and industry news. </p>
                        <!-- <h3>We will deliver our best content straight to your inbox.</h3> -->
                        <div class="subscribed-form">
                            <form>
                                <input type="text" placeholder="Type your Email">
                                <input class="bordered-btn" type="submit" value="Sign Up">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   