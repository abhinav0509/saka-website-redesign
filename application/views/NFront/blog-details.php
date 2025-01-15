
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
                        <div class="search-bar-wrap d-flex">
                            <input type="search" placeholder="search">
                            <i class="fal fa-search"></i>
                        </div>
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
                            <div class="single-latest-post">                                
                                <div class="latest-post-content">
                                    <div class="post-tag">
                                        <p>Historic Preservation</p>
                                    </div>
                                    <div class="post-title">
                                        <h3><a href="blog-details.html">Preserving the Past: <br>Importance of Historic Restoration</a></h3>
                                    </div>
                                    <div class="blog-info">
                                        <div class="blog-author">
                                            <p>by Haily Johnson</p>
                                        </div>
                                        <div class="blog-date">
                                            <p>April 17, 2023</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-latest-post">                                
                                <div class="latest-post-content">
                                    <div class="post-tag">
                                        <p>Space Planning</p>
                                    </div>
                                    <div class="post-title">
                                        <h3><a href="blog-details.html">Designing for Accessibility: <br> Creating Inclusive Spaces</a></h3>
                                    </div>
                                    <div class="blog-info">
                                        <div class="blog-author">
                                            <p>by Jane Pullman</p>
                                        </div>
                                        <div class="blog-date">
                                            <p>April 10, 2023</p>
                                        </div>
                                    </div>
                                </div>
                            </div>                           
                        </div>                      
                    </div>
                </div>
                <?php if(!empty($result)){ foreach($result as $row){ ?> 
                <div class="col-xl-8 col-lg-8 order-1 order-lg-2">
                    <div class="section-title">
                        <h2><?php echo $row['title']; ?><span><i class="las la-arrow-right"></i></span></h2>                        
                    </div>
                    <hr>
                    <div class="blog-meta">
                        <div class="blog-info">
                            <span><?php echo $row['name']; ?></span>
                        </div>
                        <div class="blog-date">
                            <p>
                                <?php 
                                    // Check if 'insertdate' exists and is valid
                                    if (isset($row['insertdate']) && !empty($row['insertdate'])) {
                                        echo date('F j, Y', strtotime($row['insertdate']));
                                    } else {
                                        echo "Date not available";
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="blog-featured-img mt-30">
                        <img src="<?php echo base_url(); ?>uploads/Blog/<?php echo $row['image']; ?>" alt="ceo-letter">
                    </div>
                    <div class="blog-content">
                        <p>Whether you'r a full time remote Suspendisse potenti. Aenean sodales euismod mi, sit amet dictum quam sodales id. Donec euismod velit nisi, in bibendum tortor efficitur in. Vivamus vulputate leo non pulvinar bibendum. Nam pharetra nulla a vestibulum molestie. Aenean pharetra.</p>
                        <p>Here are some tips for creating a functional home office space:</p>
                        <p>By following these tips and investing in a well-designed and functional home office space, you can ensure that you'r able to stay productive and focused in your work, no matter where you are.</p>
                    </div>
                </div>
                <?php } }?>
                
            </div>
        </div>
    </div>


    <!-- Newsletter Section  -->

    <div class="newsletter-section">
        <div class="container">
            <div class="row newsletter-inner gray-bg align-items-center">
                <div class="col-xl-7 col-lg-7">
                    <div class="section-title">
                        <h2>Stay Up-to-date <br> with Archipix <span><i class="las la-arrow-right"></i></span> </h2>
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
   