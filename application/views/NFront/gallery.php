

    <!-- Gallery Specific CSS -->
    <style>
        /* Gallery Hero Section */
        .gallery-hero {
            position: relative;
            height: 60vh;
            min-height: 500px;
            overflow: hidden;
            background: #000;
        }

        .gallery-hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('assets/img/slider/slide-1.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.7;
            filter: blur(3px);
            transform: scale(1.1);
        }

        .gallery-hero-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
            padding: 0 20px;
        }

        .gallery-hero-content h1 {
            font-size: 72px;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .gallery-hero-content p {
            font-size: 20px;
            max-width: 700px;
            margin: 0 auto 30px;
        }

        /* Filter Navigation */
        .gallery-filter {
            position: relative;
            margin: -50px auto 50px;
            z-index: 10;
            max-width: 800px;
            background: #fff;
            border-radius: 50px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 15px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .gallery-filter button {
            background: transparent;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            font-weight: 500;
            color: #333;
            border-radius: 30px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .gallery-filter button:hover {
            color: #01A0E2;
        }

        .gallery-filter button.active {
            background: #01A0E2;
            color: #fff;
        }

        /* Gallery Grid */
        .gallery-container {
            padding: 30px 0 80px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-gap: 20px;
            margin-top: 30px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.5s ease;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.5s forwards;
            height: 300px;
        }

        .gallery-item.video-item::before {
            content: '\f144';
            font-family: 'Line Awesome Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 50px;
            color: #fff;
            z-index: 2;
            opacity: 0.9;
            transition: all 0.3s ease;
        }

        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-item-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            padding: 20px;
            color: #fff;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .gallery-item:hover .gallery-item-overlay {
            opacity: 1;
            transform: translateY(0);
        }

        .gallery-item-overlay h4 {
            margin: 0 0 5px;
            font-size: 18px;
        }

        .gallery-item-overlay p {
            margin: 0;
            font-size: 14px;
            opacity: 0.8;
        }

        /* Animation for gallery items */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .gallery-item:nth-child(1) { animation-delay: 0.1s; }
        .gallery-item:nth-child(2) { animation-delay: 0.2s; }
        .gallery-item:nth-child(3) { animation-delay: 0.3s; }
        .gallery-item:nth-child(4) { animation-delay: 0.4s; }
        .gallery-item:nth-child(5) { animation-delay: 0.5s; }
        .gallery-item:nth-child(6) { animation-delay: 0.6s; }
        .gallery-item:nth-child(7) { animation-delay: 0.7s; }
        .gallery-item:nth-child(8) { animation-delay: 0.8s; }
        .gallery-item:nth-child(9) { animation-delay: 0.9s; }
        .gallery-item:nth-child(10) { animation-delay: 1s; }
        .gallery-item:nth-child(11) { animation-delay: 1.1s; }
        .gallery-item:nth-child(12) { animation-delay: 1.2s; }

        /* Empty state */
        .gallery-empty {
            text-align: center;
            padding: 100px 20px;
            display: none;
        }

        .gallery-empty h3 {
            font-size: 24px;
            color: #666;
            margin-bottom: 20px;
        }

        .gallery-empty p {
            font-size: 16px;
            color: #999;
            max-width: 500px;
            margin: 0 auto;
        }

        /* Masonry layout for different sized images */
        .gallery-item.wide {
            grid-column: span 2;
        }

        .gallery-item.tall {
            grid-row: span 2;
            height: 620px;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .gallery-hero-content h1 {
                font-size: 56px;
            }
            
            .gallery-item.wide {
                grid-column: auto;
            }
            
            .gallery-item.tall {
                grid-row: auto;
                height: 300px;
            }
        }

        @media (max-width: 767px) {
            .gallery-hero {
                height: 50vh;
                min-height: 400px;
            }
            
            .gallery-hero-content h1 {
                font-size: 42px;
            }
            
            .gallery-hero-content p {
                font-size: 16px;
            }
            
            .gallery-filter {
                margin-top: -30px;
                border-radius: 20px;
                padding: 10px;
            }
            
            .gallery-filter button {
                padding: 8px 15px;
                font-size: 14px;
                margin: 3px;
            }
        }

        /* Video Reel Styles */
        .video-wrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
            border-radius: 10px;
            background: #000;
        }

        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        .gallery-item.video-reel {
            height: auto;
            background: #000;
            border-radius: 10px;
            overflow: hidden;
        }

        .gallery-item.video-reel .gallery-item-overlay {
            opacity: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.9), rgba(0,0,0,0.4));
            padding: 20px;
            transition: all 0.3s ease;
        }

        .gallery-item.video-reel:hover .gallery-item-overlay {
            opacity: 1;
        }

        /* Update gallery grid for better video display */
        .gallery-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .gallery-item.wide {
            grid-column: 1 / -1;
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 767px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }
            
            .gallery-item.video-reel {
                margin-bottom: 20px;
            }
        }
    </style>

    <!-- jquery -->
    <script src="assets/js/jquery-1.12.4.min.js"></script>

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

    <div id="smooth-content">
    
    <!-- Gallery Hero Section -->
    <div class="gallery-hero">
        <div class="gallery-hero-bg"></div>
        <div class="gallery-hero-content">
            <h1 class="text-white">Our Gallery</h1>
            <p class="text-white">Explore the visual journey of Saka India through our collection of images and videos showcasing our work, team, and events.</p>
        </div>
    </div>

    <!-- Gallery Filter -->
    <div class="container">
        <div class="gallery-filter">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="videos">Videos</button>
            <!--<button class="filter-btn" data-filter="corporate">Corporate</button>-->
            <!--<button class="filter-btn" data-filter="office-parties">Office Parties</button>-->
            <button class="filter-btn" data-filter="plant-factories">Plant & Factories</button>
            <button class="filter-btn" data-filter="team">Team</button>
            <button class="filter-btn" data-filter="office">Office</button>
            <button class="filter-btn" data-filter="fest-seminars">Fest & Seminars</button>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="gallery-container">
        <div class="container">
            <div class="gallery-grid">
                <!-- Video Reels Section - First 3 placeholders -->
                <div class="gallery-item video-reel" data-category="videos">
                    <div class="video-wrapper">
                        <iframe 
                            src="https://www.youtube.com/embed/3AdVwxgv6Yc?autoplay=0&controls=1&rel=0" 
                            title="ChemTECH world expo 2024" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    <div class="gallery-item-overlay">
                            <h4>ChemTECH World Expo 2024</h4>
                            <p>Saka Engineering at ChemTECH World Expo</p>
            </div>
        </div>
    </div>

                <div class="gallery-item video-reel" data-category="videos">
                    <div class="video-wrapper">
                        <iframe 
                            src="https://www.youtube.com/embed/VIDEO_ID_2?autoplay=0&controls=1&rel=0" 
                            title="Process Showcase" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                        <div class="gallery-item-overlay">
                            <h4>Granulation Process</h4>
                            <p>Watch our advanced granulation process in action</p>
            </div>
        </div>
    </div>
    
                <div class="gallery-item video-reel" data-category="videos">
                    <div class="video-wrapper">
                        <iframe 
                            src="https://www.youtube.com/embed/VIDEO_ID_3?autoplay=0&controls=1&rel=0" 
                            title="Factory Tour" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                        <div class="gallery-item-overlay">
                            <h4>Factory Tour</h4>
                            <p>Take a virtual tour of our manufacturing facility</p>
            </div>
        </div>
    </div>

                <!-- Corporate Video - Full Width -->
                <div class="gallery-item video-reel wide" data-category="corporate">
                    <div class="video-wrapper">
                        <iframe 
                            src="https://www.youtube.com/embed/CORPORATE_VIDEO_ID?autoplay=0&controls=1&rel=0" 
                            title="Saka Engineering Corporate Video" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                        <div class="gallery-item-overlay">
                            <h4>Saka Engineering Corporate Overview</h4>
                            <p>Discover our journey, values, and commitment to excellence</p>
    </div>
                    </div>
                </div>

                <!-- Plant & Factories -->
                <a href="assets/img/project/3-1.jpg" data-lightbox="gallery" data-title="Factory Floor" class="gallery-item" data-category="plant-factories">
                    <img src="assets/img/project/3-1.jpg" alt="Factory Floor">
                    <div class="gallery-item-overlay">
                        <h4>Factory Floor</h4>
                        <p>Our state-of-the-art production facility</p>
                    </div>
                </a>
                
                <a href="assets/img/project/3-2.jpg" data-lightbox="gallery" data-title="Granulation Equipment" class="gallery-item wide" data-category="plant-factories">
                    <img src="assets/img/project/3-2.jpg" alt="Granulation Equipment">
                    <div class="gallery-item-overlay">
                        <h4>Granulation Equipment</h4>
                        <p>Advanced machinery for precise granulation</p>
                    </div>
                </a>
                
                <!-- Office -->
                <a href="assets/img/project/3-3.jpg" data-lightbox="gallery" data-title="Main Office" class="gallery-item" data-category="office">
                    <img src="assets/img/project/3-3.jpg" alt="Main Office">
                    <div class="gallery-item-overlay">
                        <h4>Main Office</h4>
                        <p>Our headquarters in Mumbai</p>
                    </div>
                </a>
                
                <!-- Team -->
                <a href="assets/img/project/3-4.jpg" data-lightbox="gallery" data-title="Engineering Team" class="gallery-item tall" data-category="team">
                    <img src="assets/img/project/3-4.jpg" alt="Engineering Team">
                    <div class="gallery-item-overlay">
                        <h4>Engineering Team</h4>
                        <p>Our talented engineers working on innovative solutions</p>
                    </div>
                </a>
                
                <!-- Office Parties -->
                <a href="assets/img/project/3-5.jpg" data-lightbox="gallery" data-title="Annual Celebration" class="gallery-item" data-category="office-parties">
                    <img src="assets/img/project/3-5.jpg" alt="Annual Celebration">
                    <div class="gallery-item-overlay">
                        <h4>Annual Celebration</h4>
                        <p>Celebrating our achievements together</p>
                    </div>
                </a>
                
                <!-- Plant & Factories -->
                <a href="assets/img/project/3-6.jpg" data-lightbox="gallery" data-title="Production Line" class="gallery-item" data-category="plant-factories">
                    <img src="assets/img/project/3-6.jpg" alt="Production Line">
                    <div class="gallery-item-overlay">
                        <h4>Production Line</h4>
                        <p>Efficient manufacturing process</p>
                    </div>
                </a>
                
                <!-- Fest & Seminars -->
                <a href="assets/img/project/3-7.jpg" data-lightbox="gallery" data-title="Industry Conference" class="gallery-item" data-category="fest-seminars">
                    <img src="assets/img/project/3-7.jpg" alt="Industry Conference">
                    <div class="gallery-item-overlay">
                        <h4>Industry Conference</h4>
                        <p>Sharing knowledge at international events</p>
                    </div>
                </a>
                
                <!-- Video item - Office Parties -->
                <a href="https://www.youtube.com/watch?v=3AdVwxgv6Yc" data-lightbox="video" data-title="Company Anniversary" class="gallery-item video-item" data-category="office-parties">
                    <img src="assets/img/project/3-8.jpg" alt="Company Anniversary">
                    <div class="gallery-item-overlay">
                        <h4>Presenting at ChemTECH world expo 2024</h4>
                        <p>Saka Engineering Systems Pvt Ltd Presenting at ChemTECH world expo 2024</p>
                    </div>
                </a>
                
                <!-- Team -->
                <a href="assets/img/project/3-9.jpg" data-lightbox="gallery" data-title="Management Team" class="gallery-item" data-category="team">
                    <img src="assets/img/project/3-9.jpg" alt="Management Team">
                    <div class="gallery-item-overlay">
                        <h4>Management Team</h4>
                        <p>Leadership driving our vision forward</p>
                    </div>
                </a>
                
                <!-- Office -->
                <a href="assets/img/project/3-10.jpg" data-lightbox="gallery" data-title="Design Studio" class="gallery-item" data-category="office">
                    <img src="assets/img/project/3-10.jpg" alt="Design Studio">
                    <div class="gallery-item-overlay">
                        <h4>Design Studio</h4>
                        <p>Where innovation begins</p>
                    </div>
                </a>
                
                <!-- Fest & Seminars -->
                <a href="assets/img/project/3-11.jpg" data-lightbox="gallery" data-title="Technical Workshop" class="gallery-item wide" data-category="fest-seminars">
                    <img src="assets/img/project/3-11.jpg" alt="Technical Workshop">
                    <div class="gallery-item-overlay">
                        <h4>Technical Workshop</h4>
                        <p>Training session for industry professionals</p>
                    </div>
                </a>
                
                <!-- Video item - Plant & Factories -->
                <a href="https://www.youtube.com/watch?v=your-video-id" data-lightbox="video" data-title="Manufacturing Process" class="gallery-item video-item" data-category="plant-factories">
                    <img src="assets/img/project/3-12.jpg" alt="Manufacturing Process">
                    <div class="gallery-item-overlay">
                        <h4>Manufacturing Process</h4>
                        <p>See our granulation technology in action</p>
                    </div>
                </a>
            </div>
            
            <!-- Empty state message -->
            <div class="gallery-empty">
                <h3>No items found</h3>
                <p>There are no gallery items in this category. Please try selecting a different category.</p>
            </div>
        </div>
    </div>
    
   