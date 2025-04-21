<div id="smooth-content">

<!-- Breadcrumb Area  -->

<div class="breadcrumb-area mt-50">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>                          
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Hero Area  -->
 
<div id="about_page" class="hero-area">
    <div class="container">
        <div class="row hero-area-inner">
            <div class="col-xl-9 col-lg-9">
                <div class="hero-area-content">
                    <div class="section-title">                            
                        <h1>Learn About Our <i>/</i> <br></h1>
                        <h1 class="pl-150 text-black">Vision and Values</h1>
                    </div>
                </div>
            </div> 
            <div class="col-xl-3 col-lg-3 d-none d-lg-block text-lg-end">
                <h4>Our History</h4>
            </div>                   
        </div>        
        <div class="container-fluid mt-4" style="overflow:hidden;">
            <video class="col-md-12" autoplay muted loop id="hero  Video">
                    <source src="<?php echo base_url();?>assets/img/video/Saka-Corporate Video_final.mp4" type="video/mp4">
                    
                    
            </video>

        </div>   
        <div class="row mt-30">                
        <p>Developing technology that serves the true purpose of your business, drives us!
A singular focus, to keep your business goals and needs at the center in developing the technology for your processes,
is the driving force of SAKA's solutions.The commitment to be always aligned to Customer's purpose has earned us a 85% repeat business,
even as the base of customers doubled every year since the inception.</p>
                <p><b> WE BRING WORLD-LEADING PROCESS SOLUTIONS</b> By challenging the conventional norms, <b>SAKA RETHINKS, REINVENTS and REDEFINES </b> the process engineering and technology to unfold new benchmarks for your systems in reliability, efficiency and quality.</p>
                <p> </p>
        </div>          
    </div>                
</div>

<!-- History Section  -->

<div class="history-section section-padding pt-60 pb-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-5">
                <div class="section-title">
                    <h2 class="history-title" data-aos="fade-up">Our Journey Through Time</h2>
                </div>
            </div>
        </div>
        
        <div class="timeline-container" data-aos="fade-up">
            <div class="timeline">
                <div class="timeline-item" data-aos="fade-right" data-aos-delay="100">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2011</div>
                        <h3>Saka India Inception</h3>
                        <p>Started with a small team that can be counted on fingers with an aim to deliver next technology to its customer.</p>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-left" data-aos-delay="200">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2012</div>
                        <h3>Saka Expansion</h3>
                        <p>It was time for SAKA to expand, we went for our own state-of-the-art manufacturing unit at Bhosari, Pune.</p>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-right" data-aos-delay="300">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2014</div>
                        <h3>The Next Level</h3>
                        <p>We added unique capabilities like CFD analysis and 3D designing to take our design department to the next level.</p>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-left" data-aos-delay="400">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2016</div>
                        <h3>Delivering The Granulation</h3>
                        <p>SAKA became only Indian company to deliver fully automatic calcium chloride granulation plant.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.history-section {
    background: #f8f9fa;
    position: relative;
    overflow: hidden;
    padding: 80px 0;
}

.history-title {
    margin-bottom: 3rem;
    position: relative;
    display: inline-block;
}

.history-title:after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 50%;
    height: 3px;
    background: #007bff;
    transform: translateX(50%);
}

.timeline-container {
    padding: 2rem 0;
    position: relative;
}

.timeline {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
}

.timeline::before {
    content: '';
    position: absolute;
    width: 4px;
    background: #007bff;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -2px;
    border-radius: 2px;
    z-index: 1;
}

.timeline-item {
    padding: 15px 30px;
    position: relative;
    width: 50%;
    margin-bottom: 30px;
    z-index: 2;
}

.timeline-item:nth-child(odd) {
    left: 0;
    padding-right: 60px;
}

.timeline-item:nth-child(even) {
    left: 50%;
    padding-left: 60px;
}

.timeline-dot {
    width: 24px;
    height: 24px;
    background: #007bff;
    border: 4px solid #fff;
    border-radius: 50%;
    position: absolute;
    right: -12px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 3;
    box-shadow: 0 0 0 4px rgba(0,123,255,0.2);
}

.timeline-item:nth-child(even) .timeline-dot {
    left: -12px;
    right: auto;
}

.timeline-content {
    padding: 25px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    position: relative;
}

.timeline-content:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.timeline-year {
    display: inline-block;
    padding: 6px 16px;
    background: #007bff;
    color: white;
    border-radius: 20px;
    font-weight: bold;
    margin-bottom: 15px;
}

.timeline-content h3 {
    color: #007bff;
    margin-bottom: 15px;
    font-size: 1.5rem;
}

.timeline-content p {
    margin: 0;
    line-height: 1.6;
    color: #666;
}

@media (max-width: 768px) {
    .timeline::before {
        left: 31px;
    }
    
    .timeline-item {
        width: 100%;
        padding-left: 70px;
        padding-right: 25px;
    }
    
    .timeline-item:nth-child(even) {
        left: 0;
    }
    
    .timeline-dot {
        left: 18px;
        right: auto;
    }
    
    .timeline-item:nth-child(even) .timeline-dot {
        left: 18px;
    }

    .timeline-content {
        padding: 20px;
    }
}

@keyframes pulse {
    0% {
        transform: translateY(-50%) scale(1);
        box-shadow: 0 0 0 0 rgba(0,123,255,0.4);
    }
    50% {
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 0 0 8px rgba(0,123,255,0);
    }
    100% {
        transform: translateY(-50%) scale(1);
        box-shadow: 0 0 0 0 rgba(0,123,255,0);
    }
}

.timeline-dot:hover {
    animation: pulse 1.5s infinite;
    cursor: pointer;
}
</style>

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
