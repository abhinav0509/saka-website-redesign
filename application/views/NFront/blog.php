

    <div id="smooth-content">

    <!-- Breadcrumb Area  -->

    <div class="breadcrumb-area mt-50">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>                          
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Hero Area  -->
     
    <div id="blog_page" class="hero-area">
        <div class="container">
            <div class="row hero-area-inner">
                <div class="col-xl-9 col-lg-9">
                    <div class="hero-area-content">
                        <div class="section-title">                            
                            <h1>Saka India Insight</h1>                            
                        </div>
                    </div>
                </div>                                    
            </div>        
            <div class="row mt-40">
            <?php if(!empty($results)){ foreach($results as $row){ ?>  
                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                    <hr>
                    <div class="single-blog-item mt-30">
                        <div class="blog-bg">
                        <img src="<?php echo base_url(); ?>uploads/Blog/<?php echo $row->Image; ?>" alt="ceo-letter">
                        </div>
                        <div class="blog-content">                        
                            <!-- <div class="blog-meta">
                                <p>Architecture</p>
                            </div> -->
                            <h3><a href="<?php echo base_url();?>SingleBlog/<?php echo $row->Title;?>"><?php echo $row->Title; ?></a></h3>
                            <p> <?php 
                                                            $content = strip_tags($row->Content); 
                                                            // Remove any extra spaces or line breaks within the content
                                                            $content = preg_replace('/\s+/', ' ', $content); // This replaces multiple spaces with a single space
                                                            
                                                            $shortContent = substr($content, 0, 150); 
                                                            if (strlen($content) > 150) { 
                                                                $shortContent .= '...'; 
                                                            } 
                                                            echo $shortContent; 
                                                        ?></p> 
                            <div class="blog-info">
                                <div class="blog-author">
                                <p><b><?php echo $row->Name; ?></b></p>
                                </div>
                                <div class="blog-date">
                                <p><b><?php echo date('F j, Y', strtotime($row->insertdate)); ?></b></p>
                                </div>
                            </div> 
                            <a href="<?php echo base_url();?>SingleBlog/<?php echo $row->Title;?>" class="read-more-btn" style="font-size: 18px;">Read More <i class="las la-arrow-right"></i></a>                           
                        </div>                        
                    </div>
                </div>
                <?php } } else {?>  
                    <?php } ?> 
              
                <ul class="pagination">                                        
                    <li class="page-item"><a class="page-link" href="#"><i class="las la-arrow-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item" aria-current="page"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>                                        
                    <li class="page-item"><a class="page-link" href="#"><i class="las la-arrow-right"></i></a></li>                                        
                </ul>     
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

    
