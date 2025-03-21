<<<<<<< Updated upstream
<div id="smooth-content">
=======

   <style>
    #brochure-btn:hover{
        background-color:#01a0e2 !important;
    }
   </style>
    <div id="smooth-content">
>>>>>>> Stashed changes

    <!-- Breadcrumb Area  -->
    <div class="breadcrumb-area mt-50">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>                          
                        <li class="breadcrumb-item active" aria-current="page">Project</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Hero Area  -->
    <div id="project_page" class="hero-area">
        <div class="container">
            <div class="row hero-area-inner">
                <div class="col-xl-9 col-lg-9">
                    <div class="hero-area-content">
                        <div class="section-title">                            
                            <h1>Discover Our<br></h1>
                            <h1>Range<i>/</i> of <span style="color:#01a0e2;">World Class</span>  <br></h1>
                            <h1 class="pl-200" style="color:#01a0e2;">Solutions</h1>
                        </div>
                    </div>
                </div> 
                <div class="col-xl-3 col-lg-3 text-end mt-20">
                    <div class="brochure-download">
                        <p>Download our product brochure</p>
                        <a href="<?php echo base_url();?>assets/documents/SAKA-INDIA-BROCHURE.pdf" id="brochure-btn" class="theme-btn mt-20">Download Now</a>    
                    </div>
                </div>                 
            </div>                    
        </div>       
    </div>

    <!-- Service Section  -->
    <div class="service-section service-two section-padding pb-50">
        <div class="container">
            <div class="row justify-content-center text-end">                    
                <div class="section-title">
                    <h2>Service Type</h2>
                </div>
            </div>
<<<<<<< Updated upstream
            <div class="row mt-30">
                <?php if(!empty($results)) { 
                    foreach($results as $index => $row) { ?>  
                        <div class="col-xl-12 col-lg-12"> 
                            <div class="cp-custom-accordion">
                                <div class="accordions" id="accordionExample">
                                    <div class="accordion-items">
                                        <h2 class="accordion-header" id="heading-<?php echo $index; ?>">
                                            <button class="accordion-buttons" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $index; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $index; ?>">
                                                <span><i class="las la-arrow-right"></i></span>
                                                <?php echo $row->product_name; ?>
                                            </button>
                                        </h2>
                                        <div id="collapse-<?php echo $index; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $index; ?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <p class="col-7"><?php 
                                                        $content = strip_tags($row->description); 
                                                        // Remove any extra spaces or line breaks within the content
                                                        $content = preg_replace('/\s+/', ' ', $content); // This replaces multiple spaces with a single space
                                                        
                                                        $shortContent = substr($content, 0, 150); 
                                                        if (strlen($content) > 150) { 
                                                            $shortContent .= '...'; 
                                                        } 
                                                        echo $shortContent; 
                                                    ?> <a class="btn btn-outline" style="color:#01a0e2;">Know More</a></p>
=======
            <div class="row">
                <div class="col-xl-12">                                             
                    <div class="cp-custom-accordion">
                        <div class="accordions" id="accordionExample">    
                            <div class="accordion-items">
                                <h2 class="accordion-header" id="headingOne">
                                  <button class="accordion-buttons" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      <span>01</span>
                                        Spray Dryer
                                  </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                     <div class="row">
                                        <p class="col-7">Choose from our wide range of spray drying systems, in just seven years SAKA has established itself as one of the leader in spray drying technology. <a href="https://www.sakadryers.com/" target="_blank" class="btn btn-outline" style="color:#01a0e2;">Know More</a></p>
                                       
                                        <img class="col-4" src="<?php echo base_url();?>assets/img/service/2016/11/counter-current-spray-dryer-300x300.png" alt="counter-current-spray-dryer">
                                        
                                     </div>
                                     
                                    
                                      

                                  </div>
                                </div>
                              </div>

                            <div class="accordion-items">
                              <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span>02</span>
                                    Rotary Dryer                                
                                </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                  <div class="row">
                                        <p class="col-7">Get uniform drying with SAKA’s high efficiency rotary dryers.
                                                        Known for their high thermal efficiency Rotary Dryers are designed to deliver best output, efficiently.

                                                <a class="btn btn-outline" style="color:#01a0e2;">Know More</a></p>
                                       
                                        <img class="col-4" src="<?php echo base_url();?>assets/img/service/2016/10/counter-current-rotary-dryer-2500kg-per-hr-300x300.png" alt="counter-current-rotary-dryer">
                                        
                                     </div>
                                </div>
                              </div>
                            </div>
                            
                            <div class="accordion-items">
                              <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span>03</span>
                                    Fluid Bed Dryer
                                </button>
                              </h2>
                              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                <div class="row">
                                        <p class="col-7">
                                        SAKA’s Fluid Bed dryers are extremely energy efficient and provide controlled drying and moisture removal. <a class="btn btn-outline" style="color:#01a0e2;">Know More</a></p>
                                       
                                        <img class="col-4" src="<?php echo base_url();?>assets/img/service/2016/10/fluid-bed-dryer-saka-india-300x300.png" alt="fluid-bed-dryer">
                                        
                                     </div>
                                </div>
                              </div>
                            </div>
                            <div class="accordion-items">
                              <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <span>04</span>
                                    Flash Dryer
                                </button>
                              </h2>
                              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                <div class="row">
                                        <p class="col-7">Known for their quick drying capacity, Flash dryers from SAKA are one of most economical and efficient drying option

<a class="btn btn-outline" style="color:#01a0e2;">Know More</a></p>
                                       
                                        <img class="col-4" src="<?php echo base_url();?>assets/img/service/2016/10/flash-dryer-saka-india-300x300.png" alt="flash-dryer-saka-india">
                                        
                                     </div>
                                   
                                </div>
                              </div>
                            </div>
                            <div class="accordion-items">
                              <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <span>05</span>
                                    Coolers
                                </button>
                              </h2>
                              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                            <p class="col-7">Get easy to operate and maintain coolers from SAKA. Our coolers are manufactured with latest technology and superior material quality <a class="btn btn-outline" style="color:#01a0e2;">Know More</a></p>
                                        
                                            <img class="col-4" src="<?php echo base_url();?>assets/img/service/2016/10/g-a-prilling-plant-cooler-saka-india-188x300.png" alt="prilling-plant-cooler">
                                            
                                    </div>
                                   
                                </div>
                                   


                                </div>

                              </div>
                            </div>
                            <div class="accordion-items">
                              <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <span>06</span>
                                    Granulation System
                                </button>
                              </h2>
                              <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                                <p class="col-7">Convert your Hydrochloric Acid Bi Product in free flowing granules with SAKA’s advanced granulation system. <a class="btn btn-outline" style="color:#01a0e2;">Know More</a></p>
                                            
                                                <img class="col-4" src="<?php echo base_url();?>assets/img/service/2016/09/granulation-systems-50-ton-per-day-bhuj-gujarat-300x300.png" alt="granulation-systems">
                                                
                                    </div>
                                    

</p>
                                </div>
                              </div>
                            </div>
                            <div class="accordion-items">
                              <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSix">
                                    <span>07</span>
                                    Allied Products
                                </button>
                              </h2>
                              <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                                    <p class="col-7">Choose from SAKA’s comprehensive range of allied products to get unparalleled performance and efficiency<a class="btn btn-outline" style="color:#01a0e2;">Know More</a></p>
                                                
                                                    <img class="col-4" src="<?php echo base_url();?>assets/img/service/2016/10/direct-solid-hag-vapi-gujrat-50-lac-kcal-per-hr.png" alt="direct-solid-hag">
>>>>>>> Stashed changes
                                                    
                                                    <img class="col-4" src="<?php echo base_url();?>uploads/Product/<?php echo $row->image; ?>" alt="counter-current-spray-dryer">                                       
                                                </div>                                  
                                            </div>
                                        </div>
                                    </div>                     
                                </div>
<<<<<<< Updated upstream
                            </div>                                      
                        </div>
                    <?php } 
                } else {?>  
                    <p>No products available</p>
                <?php } ?>
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
=======
                              </div>
                            </div>
                            <div class="accordion-items">
                              <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    <span>08</span>
                                    Air Pollution Control Equipment             
                                </button>
                              </h2>
                              <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                  <div class="row">
                                                <p class="col-7">SAKA’s range of pollution control equipment to ensure clean working environment in your factory <a class="btn btn-outline" style="color:#01a0e2;">Know More</a></p>
                                            
                                                <img class="col-4" src="<?php echo base_url();?>assets/img/service/2016/09/wet-scrubbing-system-saka-india-300x300.png" alt="wet-scrubbing-system">
                                                
                                    </div>
                                   
                                </div>
                              </div>
                            </div>
                            <div class="accordion-items">
                              <h2 class="accordion-header" id="headingNine">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    <span>09</span>
                                    Thermic fluid Heater
                                </button>
                              </h2>
                              <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="collapseNine" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    
                                    <div class="row">
                                                <p class="col-7">Ensure safest heat for all your indirect heating process requirements with SAKA’s Thermic Fluid Heaters <a class="btn btn-outline" style="color:#01a0e2;">Know More</a></p>
                                            
                                                <img class="col-4" src="<?php echo base_url();?>assets/img/service/2016/09/thermic-fluid-bhuj-gujarat-20-lac-kcal-per-hr.png" alt="thermic-fluid-bhuj">
                                                
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="accordion-items">
                              <h2 class="accordion-header" id="headingTen">
                                <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    <span>10</span>
                                    Zero Liquid
                                    Discharge Plant
                                </button>
                              </h2>
                              <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="collapseTen" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                                <p class="col-7">Get complete control on your emission with SAKA’s most trusted,efficient and reliable zero liquid discharge plant <a class="btn btn-outline" style="color:#01a0e2;">Know More</a></p>
                                            
                                                <img class="col-4" src="<?php echo base_url();?>assets/img/service/2017/05/zero-liquid-discharge-saka-india-300x300.png" alt="zero-liquid-discharge-saka-india">
                                                
                                    </div>
                                   

                                            
                                </div>
                              </div>
                            </div>
                          
                          </div>
                    </div>                                        
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </div>
<<<<<<< Updated upstream
</div>
=======
  
  
   

   


    
    
>>>>>>> Stashed changes
