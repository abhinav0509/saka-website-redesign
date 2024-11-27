<div id="smooth-content">

    <!-- Breadcrumb Area  -->
    <div class="breadcrumb-area mt-50 mb-50">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>                          
                        <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>                          
                        <li class="breadcrumb-item active" aria-current="page">Details</li>
                    </ol>
                    <h4>Design Insight</h4>
                </nav>
            </div>
        </div>
    </div>

    <!-- Blog Details Page  -->
    <div class="blog-details-page">
        <div class="container">
            <div class="row gx-5 justify-content-around">
                <div class="col-xl-4 col-lg-4 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <!-- Search bar -->
                        <div class="search-bar-wrap d-flex">
                            <input type="search" placeholder="search">
                            <i class="fal fa-search"></i>
                        </div>

                        <!-- Latest Post -->
                        <div class="latest-post-wrap">
                            <h5>Latest Post</h5>
                            <div class="single-latest-post">                                 
                                <div class="latest-post-content">
                                    <div class="post-tag">
                                        <p>Space Planning</p>
                                    </div>
                                    <div class="post-title">
                                        <h3><a href="blog-details.html">Maximizing Small Spaces: <br> Creative Design Solutions</a></h3>
                                    </div>
                                    <div class="blog-info">
                                        <div class="blog-author">
                                            <p>by Jane Pullman</p>
                                        </div>
                                        <div class="blog-date">
                                            <p>May 1, 2023</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add more latest posts here... -->
                        </div>

                        <!-- Popular Tags -->
                        <div class="popular-tag-wrap mt-60">
                            <h5>Popular Tags</h5>
                            <a href="#">design trends</a>
                            <a href="#">sustainability</a>
                            <a href="#">interior design</a>
                            <a href="#">architecture</a>
                            <!-- More tags -->
                        </div>                        
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8 order-1 order-lg-2">
                    <div class="section-title">
                        <h2>Creating a <br> Functional Home <br> Office Space <span><i class="las la-arrow-right"></i></span></h2>                        
                    </div>
                    <hr>
                    <div class="blog-meta">
                        <div class="blog-info">
                            <span>Sarah Roberts</span>                          
                        </div>
                        <div class="blog-comments">
                        <span>September 22, 2023</span>
                        </div>
                    </div>

                    <!-- Working in Progress Section -->
                    <div class="working-in-progress-banner">
                        <h3>🚧 This section is currently under construction. Please check back later. 🚧</h3>
                        <p>We are working hard to bring you the best content! Stay tuned!</p>
                    </div>

                    <div class="blog-featured-img mt-30">
                        <img src="<?php echo base_url();?>assets/img/blog/blog-feature.jpg" alt="">
                    </div>

                    <div class="blog-content">
                        <h3>With the rise of remote work and flexible work arrangements.</h3>
                        <p>Whether you're a full-time remote worker or a hybrid, designing a functional home office is crucial for productivity. Here are some tips to consider:</p>

                        <!-- Placeholder for Content under Construction -->
                        <div class="blog-content-inner">
                            <h4><span>1.</span> Starts with basics</h4>
                            <p>We're currently updating this section with the latest tips and advice. Stay tuned!</p>
                            <h4><span>2.</span> Consider your storage needs</h4>
                            <p>Our team is working on some fresh insights about optimizing home office storage.</p>
                            <h4><span>3.</span> Design for productivity</h4>
                            <p>More information coming soon on the best productivity-enhancing designs for your workspace!</p>
                        </div>
                    </div>

                    <!-- Article Tags -->
                    <div class="blog-tag-wrap">
                        <h6>Article Tags</h6>
                        <a href="#">home office</a>
                        <a href="#">productivity</a>
                        <a href="#">ergonomics</a>
                        <a href="#">workspace design</a>
                        <!-- More tags -->
                    </div>
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
                        <h2>Stay Up-to-date <br> with Saka India <span><i class="las la-arrow-right"></i></span> </h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="newsletter-content">
                        <p>Sign up for our newsletter to stay in the know about our latest projects, design insight and industry news. </p>
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

</div>

<!-- Work In Progress Popup -->
<div id="workInProgressPopup" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closePopup()">×</span>
        <h3>🚧 This page is under construction 🚧</h3>
        <p>We're working hard to bring you the best content. Please check back later!</p>
    </div>
</div>

<!-- Add the following CSS for the popup modal -->
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5); /* Black with opacity */
        overflow: auto;
    }
    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        border-radius: 5px;
        width: 80%;
        max-width: 500px;
    }
    .close-btn {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        position: absolute;
        right: 10px;
        top: 5px;
    }
    .close-btn:hover,
    .close-btn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<!-- Add the following JavaScript to show the popup -->
<script>
    window.onload = function() {
        document.getElementById('workInProgressPopup').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('workInProgressPopup').style.display = 'none';
    }
</script>
