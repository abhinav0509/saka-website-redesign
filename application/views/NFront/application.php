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

<div class="breadcrumb-area mt-50">
    <div class="container">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="project.html">Project</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<!-- Project Details  -->
<div class="container-fluid">
    <div class="bento-grid">
      <!-- Food Industry -->
      <!-- <div class="bento-item item-1" style="background: url('/api/placeholder/800/600') center/cover;"> -->
      <div class="bento-item item-1" style="background-image: url(<?php echo base_url(); ?>assets/img/application/foodindustry.jpg); background-repeat: no-repeat; background-size:cover;">
        <div class="bento-content">
          <h2 class="display-4 mb-3 text-white">Food Industry</h2>
          <p class="lead text-white">Revolutionizing food processing with advanced manufacturing solutions. From automated production lines to quality control systems, we ensure maximum efficiency and safety in food production.</p>
          <p class="text-white">• Temperature-controlled processing<br>• Automated packaging solutions<br>• Quality assurance systems</p>
        </div>
      </div>

      <!-- Chemical Industry -->
      <div class="bento-item item-2" style="background-image: url(<?php echo base_url(); ?>assets/img/application/ChemicalIndustry.jpg); background-repeat: no-repeat; background-size:cover;">
        <div class="bento-content">
          <h3 class="h2 mb-3 text-white">Chemical Industry</h3>
          <p class="text-white">Enabling precise chemical processing with state-of-the-art manufacturing technology and safety protocols.</p>
        </div>
      </div>

      <!-- Pharmaceuticals -->
      <div class="bento-item item-3" style="background-image: url(<?php echo base_url(); ?>assets/img/application/pharmaindustry.webp); background-repeat: no-repeat; background-size:cover;">
        <div class="bento-content">
          <h3 class="h2 mb-3 text-white">Pharmaceuticals</h3>
          <p class="text-white">Supporting pharmaceutical manufacturing with precision equipment and contamination-free environments.</p>
        </div>
      </div>

      <!-- Minerals -->
      <div class="bento-item item-4" style="background-image: url(<?php echo base_url(); ?>assets/img/application/mineral-industry.jpg); background-repeat: no-repeat; background-size:cover;">
        <div class="bento-content">
          <h3 class="h2 mb-3 text-white">Minerals</h3>
          <p class="text-white">Advanced mineral processing solutions for efficient extraction and refinement.</p>
        </div>
      </div>

      <!-- Agriculture -->
      <div class="bento-item item-5" style="background-image: url(<?php echo base_url(); ?>assets/img/application/agriculture-industry.jpg); background-repeat: no-repeat; background-size:cover;">
        <div class="bento-content">
          <h3 class="h2 mb-3 text-white">Agriculture</h3>
          <p class="text-white">Innovative agricultural processing equipment for maximum yield and quality.</p>
        </div>
      </div>
    </div>
  </div>
<!-- Newsletter Section  -->

<div class="newsletter-section">
    <div class="container">
        <div class="row newsletter-inner gray-bg align-items-center">
            <div class="col-xl-7 col-lg-7">
                <div class="section-title">
                    <h2>Stay Up-to-date <br> with Saka <span><i class="las la-arrow-right"></i></span> </h2>
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

    