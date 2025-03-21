<style>
    .bento-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-auto-rows: minmax(200px, auto);
      gap: 1rem;
      padding: 1rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .bento-item {
      position: relative;
      border-radius: 24px;
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .bento-item:hover {
      transform: translateY(-5px);
    }

    .bento-item::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(2px);
    }

    .bento-content {
      position: relative;
      z-index: 1;
      padding: 2rem;
      height: 100%;
      color: white;
    }

    .item-1 {
      grid-column: span 2;
      grid-row: span 2;
    }

    .item-2 {
      grid-column: 3;
      grid-row: span 1;
    }

    .item-3 {
      grid-column: 3;
      grid-row: span 1;
    }

    .item-4 {
      grid-column: span 1;
      grid-row: span 1;
    }

    .item-5 {
      grid-column: span 1;
      grid-row: span 1;
    }

    @media (max-width: 768px) {
      .bento-grid {
        grid-template-columns: 1fr;
      }
      
      .bento-item {
        grid-column: span 1 !important;
        grid-row: span 1 !important;
      }
    }
  </style>
      <div id="smooth-content">

<!-- Breadcrumb Area  -->

<div class="breadcrumb-area mt-50 mb-50">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>                          
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>index.php/">Solutions</a></li>                          
                        <li class="breadcrumb-item active" aria-current="page">Details</li>
                    </ol>
                    <h4>Saka India Insight</h4>
                </nav>
            </div>
        </div>
    </div>

<!-- Project Details  -->
<div class="project-details-wrap section-padding pt-0">
        <div class="container">
            <div class="row gx-5 justify-content-around align-items-end mt-30">
                <div class="col-xl-6 col-lg-6">
                    <div class="project-details-inner">
                        <div class="section-title">
                            <h1>Lakefront <i>/</i> <br> Retreat </h1>
                            <h6 class="text-end">Architecture <br>Design</h6>
                        </div>
                        <div class="project-details-info">
                            <div class="single-info">
                                <p>Client</p>
                                <h4>Forest Lodge</h4>
                            </div>
                            <div class="single-info">
                                <p>Location</p>
                                <h4>California, USA</h4>
                            </div>                            
                            <div class="single-info">
                                <p>Year</p>
                                <h4>2023</h4>
                            </div>                            
                        </div>
                        <div class="project-desc">
                            <p>A contemporary vacation home designed to blend seamlessly into its natural surroundings, featuring expansive views of the lake and surrounding green nature hill mountains.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="project-bg">
                        <img src="<?php echo base_url();?>assets/img/project/project-details.jpg" alt="">
                        <div class="project-brief-wrap">
                            <div class="single-brief">
                                <h6>Total Area</h6>
                                <p>276.50 m2</p>
                            </div>
                            <div class="single-brief">
                                <h6>Living Space</h6>
                                <p>95.30 m2</p>
                            </div>
                            <div class="single-brief">
                                <h6>Material Space</h6>
                                <p>Prefabricated Concrete</p>
                            </div>
                            
                            <div class="single-brief total-cost">
                                <h6>Total Cost</h6>
                                <p>$7,590</p>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="gallery-section mt-120">
                <h4>Gallery</h4>
                <hr>
                <div class="row gx-3 gy-3 mt-20">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="row gx-3 gy-3">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="project-details-img">
                                    <img src="assets/img/project/gallery-1.jpg" alt="">
                                    <figure>
                                        <figcaption>Drawing Room</figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="project-details-img">
                                    <img src="assets/img/project/gallery-2.jpg" alt="">
                                    <figure>
                                        <figcaption>Dinning Room</figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="project-details-img">
                                    <img src="assets/img/project/gallery-3.jpg" alt="">
                                    <figure>
                                        <figcaption>Kitchen Room</figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="project-details-img">
                                    <img src="assets/img/project/gallery-4.jpg" alt="">
                                    <figure>
                                        <figcaption>Common Room</figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="project-details-img big-img">
                            <img src="assets/img/project/gallery-5.jpg" alt="">
                            <figure>
                                <figcaption>Bed Room</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="challenge-section section-padding pt-100">
                <div class="row">
                    <div class="col-xl-12 text-end">
                        <h4>Challenge</h4>                    
                    </div>
                    <div class="col-xl-12 col-lg-10">
                        <div class="section-title">
                            <h2>How to blend a <span>contemporary design seamlessly</span> in a natural environment.</h2>
                        </div>
                    </div>
                </div>
                <div class="row gx-5 align-items-end">
                    <div class="col-xl-3 col-lg-3">
                        <p>The Lakefront Retreat project presented a unique challenge for our team, as the client wanted a contemporary vacation home that seamlessly blended into its natural surrounding. This meant that we had to carefully consider how to incorporate modern design elements and materials.  </p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="challenge-img-one">
                            <img src="assets/img/project/challenge-img.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="challenge-img-two">
                            <img src="assets/img/project/challenge-img-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="solutions-section section-padding pt-100 pb-0">
                <div class="row">
                    <div class="col-xl-5 col-lg-5">
                        <h4>Solutions</h4>
                        <p>Our team worked closely with the client to design a vacation home that was modern and sleek, yet also integrated seamlessly into its natural surroundings.</p>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-4">
                        <div class="solutions-img">
                            <img src="assets/img/project/solutions-img.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="solutions-content">
                            <h3>We incorporate natural materials such as <span>wood and stone</span>, and used large windows and <span>expansive outdoor living spaces</span></h3>
                            <p>to maximize the stunning views of the lake and surrounding mountains. The end result was a contemporary vacation home that felt both luxurious and grounded in nature, providing a serene and peaceful retreat for the client and their guest.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    