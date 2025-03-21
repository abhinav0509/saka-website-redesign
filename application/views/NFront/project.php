<div id="smooth-content">

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
                            <h1>Range<i>/</i> of <span style="color:#01a0e2;">World Class<span>  <br></h1>
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
                                                    
                                                    <img class="col-4" src="<?php echo base_url();?>uploads/Product/<?php echo $row->image; ?>" alt="counter-current-spray-dryer">                                       
                                                </div>                                  
                                            </div>
                                        </div>
                                    </div>                     
                                </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
