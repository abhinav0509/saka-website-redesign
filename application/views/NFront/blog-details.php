
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Find the Copy Link button
        const copyLinkButton = document.querySelector('.copyCircleBTN');

        // Attach click event listener for the Copy Link button
        copyLinkButton.addEventListener('click', function () {
            // Get the current URL
            const url = window.location.href;

            // Create a temporary input element to copy the URL
            const tempInput = document.createElement('input');
            tempInput.value = url;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);

            // Show SweetAlert popup after copying the link
            Swal.fire({
                icon: 'success',
                title: 'Link copied to clipboard!',
                showConfirmButton: false,
                timer: 1500
            });
        });

        // Add click event for Facebook share
        const fbButton = document.querySelector('.fbCircleBTN');
        fbButton.addEventListener('click', function () {
            const url = window.location.href;
            const fbShareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
            window.open(fbShareUrl, '_blank');
        });

        // Add click event for LinkedIn share
        const linkedinButton = document.querySelector('.linkedinCircleBTN');
        linkedinButton.addEventListener('click', function () {
            const url = window.location.href;
            const linkedinShareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`;
            window.open(linkedinShareUrl, '_blank');
        });
    });
</script>

<style>
    .copyCircleBTN {
        border: 1px solid #555 !important;
        background: #555 !important;
        color: #fff;
        margin-left: 5px;
        width: 30px;
        height: 30px;
        padding: 0;
        line-height: 31px;
        border-radius: 50px;
        vertical-align: middle;
    }
    .linkedinCircleBTN {
        border: 1px solid #007BB6 !important;
        background: #007BB6 !important;
        color: #fff;
        margin-left: 5px;
        width: 30px;
        height: 30px;
        padding: 0;
        line-height: 31px;
        border-radius: 50px;
        vertical-align: middle;
    }
    .twitterCircleBTN {
        border: 1px solid #1DA1F2 !important;
        background: #1DA1F2 !important;
        color: #fff;
        margin-left: 5px;
        width: 30px;
        height: 30px;
        padding: 0;
        line-height: 31px;
        border-radius: 50px;
        vertical-align: middle;
    }
    .fbCircleBTN {
        border: 1px solid #3B5998 !important;
        background: #3B5998 !important;
        color: #fff;
        margin-left: 5px;
        width: 30px;
        height: 30px;
        padding: 0;
        line-height: 31px;
        border-radius: 50px;
        vertical-align: middle;
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>index.php/Blog">Blog</a></li>                          
                        <li class="breadcrumb-item active" aria-current="page">Details</li>
                    </ol>
                    <h4>Saka India Insight</h4>
                </nav>
            </div>
        </div>
    </div>

    <!-- Blog Details Page  -->
    <div class="blog-details-page">
        <div class="container">
            <div class="row gx-5 justify-content-around">
            <?php $this->load->view('NFront/sidebar');?>
                <?php if(!empty($result)){ foreach($result as $row){ ?> 
                <div class="col-xl-8 col-lg-8 order-1 order-lg-2">
                    <div class="section-title">
                        <h3 class="breadcrumb"><?php echo $row['title']; ?></h3>                        
                    </div>
                    <hr>
                    <div class="blog-meta">
                        <div class="blog-info">
                            <span><b><?php echo $row['name']; ?></b></span>
                        </div>
                        <div class="blog-date">
                            <p><b><?php echo date('F j, Y', strtotime($row['insertdate'])); ?></b>
                               
                            </p>
                        </div>
                    </div>
                    <div class="blog-featured-img mt-30">
                        <img src="<?php echo base_url(); ?>uploads/Blog/<?php echo $row['image']; ?>" alt="ceo-letter">
                    </div>
                    <div class="blog-content">
                        <p><?php echo $row['content'];?></p>                          
                    </div><br><br>
                   <div class="row mt-1 blogShareLinkContainer" style="margin-top: -1.75rem !important; margin-left: 180px;">
                    <a href="javascript:;" class="btn btn-warning btn-circle fbCircleBTN" data-toggle="tooltip" data-placement="top" title="Share On Facebook" onclick=""><i class="fab fa-facebook-f"></i></a>
                    <a href="javascript:;" class="btn btn-warning btn-circle twitterCircleBTN" data-toggle="tooltip" data-placement="top" title="Share On Twitter" onclick=""><i class="fab fa-twitter"></i></a>
                    <a href="javascript:;" class="btn btn-warning btn-circle linkedinCircleBTN" data-toggle="tooltip" data-placement="top" title="Share On Linkedin" onclick=""><i class="fab fa-linkedin-in"></i></a>
                    <a href="javascript:;" class="btn btn-warning btn-circle copyCircleBTN" data-toggle="tooltip" data-placement="top" title="Copy Link" data-value=""><i class="fas fa-link"></i></a>
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
   