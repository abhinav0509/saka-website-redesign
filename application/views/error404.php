<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>404 - Page Not Found | Saka India</title>

    <!--Favicon-->
    <link rel="icon" href="assets/img/favicon.png" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Line Awesome CSS -->
    <link href="assets/css/line-awesome.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="assets/css/fontAwesomePro.css" rel="stylesheet">    
    <!-- Animate CSS-->
    <link href="assets/css/animate.css" rel="stylesheet">        
    <!-- Style CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        /* 404 Page Specific Styles */
        .error-404-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
            overflow: hidden;
        }

        .error-content {
            text-align: center;
            position: relative;
            z-index: 2;
            padding: 50px 20px;
        }

        .error-number {
            font-size: 180px;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 30px;
            background: linear-gradient(45deg, #01A0E2, #0056b3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            display: inline-block;
            animation: float 6s ease-in-out infinite;
        }

        .error-text {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards 0.3s;
        }

        .error-description {
            font-size: 18px;
            color: #666;
            max-width: 500px;
            margin: 0 auto 40px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards 0.6s;
        }

        .home-button {
            display: inline-block;
            padding: 15px 40px;
            background: #01A0E2;
            color: #fff;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards 0.9s;
            position: relative;
            overflow: hidden;
        }

        .home-button:hover {
            background: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .home-button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .home-button:hover::after {
            width: 200px;
            height: 200px;
        }

        /* Animated Background Elements */
        .animated-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .bg-shape {
            position: absolute;
            background: #01A0E2;
            border-radius: 50%;
            opacity: 0.1;
        }

        .shape-1 {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 10%;
            animation: floatShape 8s infinite;
        }

        .shape-2 {
            width: 150px;
            height: 150px;
            bottom: 20%;
            right: 15%;
            animation: floatShape 10s infinite;
        }

        .shape-3 {
            width: 60px;
            height: 60px;
            top: 30%;
            right: 25%;
            animation: floatShape 6s infinite;
        }

        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @keyframes floatShape {
            0%, 100% { transform: translate(0, 0); }
            25% { transform: translate(10px, -10px); }
            50% { transform: translate(0, -20px); }
            75% { transform: translate(-10px, -10px); }
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Adjustments */
        @media (max-width: 767px) {
            .error-number {
                font-size: 120px;
            }

            .error-text {
                font-size: 24px;
            }

            .error-description {
                font-size: 16px;
                padding: 0 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Include your existing header here -->
    <!-- Copy the header from clients.html -->

    <!-- 404 Error Section -->
    <div class="error-404-section">
        <!-- Animated Background -->
        <div class="animated-bg">
            <div class="bg-shape shape-1"></div>
            <div class="bg-shape shape-2"></div>
            <div class="bg-shape shape-3"></div>
        </div>

        <div class="error-content">
            <h1 class="error-number">404</h1>
            <h2 class="error-text">Page Not Found | Saka India</h2>
            <p class="error-description">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
            <a href="<?php echo base_url()?>" class="home-button">
                Back to Home
                <i class="las la-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Include your existing footer here -->
    <!-- Copy the footer from clients.html -->

    <!-- jQuery -->
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <script>
        // Add interactive particle effect
        document.addEventListener('mousemove', function(e) {
            const shapes = document.querySelectorAll('.bg-shape');
            const mouseX = e.clientX;
            const mouseY = e.clientY;

            shapes.forEach((shape, index) => {
                const speed = (index + 1) * 0.03;
                const x = (window.innerWidth / 2 - mouseX) * speed;
                const y = (window.innerHeight / 2 - mouseY) * speed;
                
                shape.style.transform = `translate(${x}px, ${y}px)`;
            });
        });
    </script>
</body>
</html> 