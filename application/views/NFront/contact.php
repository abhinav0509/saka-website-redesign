<script>
    
$(document).ready(function(){
    $(".contctus").addClass("active");

    $("#btnContus").click(function(event){
        event.preventDefault();  // Prevent form submission to keep it on the page
        var flag = true;
        var str = /^([a-zA-Z0-9._%+-]+)@([a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/;  // Corrected email regex

        // Validate name
        if ($("#txtcname").val().match('^[a-z A-Z]{3,16}$')) {
            $('#txtcname').removeClass('invalid').addClass('valid');
        } else {
            $('#txtcname').removeClass('valid').addClass('invalid');
            flag = false;
        }

        // Validate email
        if ($("#txtcemail").val() !== "" && $("#txtcemail").val().match(str)) {
            $('#txtcemail').removeClass('invalid').addClass('valid');
        } else {
            $('#txtcemail').removeClass('valid').addClass('invalid');
            flag = false;
        }

        // Validate mobile
        if ($("#txtcmobile").val().match('^[0-9]{10}$')) {
            $('#txtcmobile').removeClass('invalid').addClass('valid');
        } else {
            $('#txtcmobile').removeClass('valid').addClass('invalid');
            flag = false;
        }

        // Validate message
        if ($("#txtcmessage").val() !== "") {
            $('#txtcmessage').removeClass('invalid').addClass('valid');
        } else {
            $('#txtcmessage').removeClass('valid').addClass('invalid');
            flag = false;
        }

        // If everything is valid, submit the form
        if (flag) {
            concmsinsert();
        }
    });
});

function concmsinsert() {
    $("#btnContus").attr('disabled', true);
    $("#loaderImg").show();

    $.ajax({
        url: "<?= base_url();?>index.php/Insert/insert_enquiry",  // Ensure your PHP handler is correct
        type: "POST",
        data: {
            'name': $("#txtcname").val(),
            'email': $("#txtcemail").val(),
            'mobile': $("#txtcmobile").val(),
            'subject': $("#txtcsubject").val(),
            'message': $("#txtcmessage").val(),
        },
        success: function(data) {
            try {
                var obj = JSON.parse(data);  // Try parsing the response as JSON
                if (obj.msg == "Success") {
                    swal({
                        title: "Success",
                        text: "Enquiry Sent Successfully...!!!",
                        icon: "success"
                    }).then(function() {
                        // Reset form fields
                        $("#txtcname").val("");
                        $("#txtcemail").val("");
                        $("#txtcmobile").val("");
                        $("#txtcsubject").val("");
                        $("#txtcmessage").val("");

                        // Enable button and hide loader
                        $("#btnContus").attr('disabled', false);
                        $("#loaderImg").hide();

                        // Reload the page after successful form submission
                        location.reload();
                    });
                } else {
                    swal({
                        title: "Error",
                        text: "Error!!! Please Try Again",
                        icon: "error"
                    });
                    $("#btnContus").attr('disabled', false);
                    $("#loaderImg").hide();
                }
            } catch (e) {
                // If JSON parsing fails, show an error
                swal({
                    title: "Error",
                    text: "Invalid response from server. Please try again.",
                    icon: "error"
                });
                $("#btnContus").attr('disabled', false);
                $("#loaderImg").hide();
            }
        },
        error: function() {
            swal({
                title: "Error",
                text: "Something went wrong, please try again!",
                icon: "error"
            });
            $("#btnContus").attr('disabled', false);
            $("#loaderImg").hide();
        }
    });
}
</script>

<div id="smooth-content">
    <div class="breadcrumb-area mt-50">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>                          
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="contact-section section-padding pt-0">
        <div class="container">
            <div class="col-xl-12 col-lg-12">
                <div class="section-title mt-20">
                    <h1>Contact Us <span><i class="las la-arrow-right"></i></span></h1>
                </div>
            </div>
            <div class="row justify-content-center mt-60">
                <div class="col-xl-12">
                    <img src="<?php echo base_url();?>assets/img/saka-contactus.png" alt="">
                </div>                              
            </div>
            <div class="row mt-60">
                <div class="col-xl-5 col-lg-5">
                    <div class="contact-text">
                        <p>Have a question about our services or want to get started on your design project? We are here to help! Fill out the contact form below and one of our team members will get back to you within 24 hours. Alternatively, you can reach out to us via phone or email using the contact information provided below. We can't wait to hear from you!</p>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-6 offset-lg-1 col-lg-6">
                    <div class="subimit-form-wrap">
                        <div class="section-title">
                            <h2>Submit Form <span><i class="las la-arrow-right"></i></span></h2>
                        </div>
                        <form action="" method="POST" id="enqForm">
                            <input id="txtcname" name="cname" placeholder="Name" required="" title="Please Enter Characters Only" type="text" pattern="[a-zA-Z ]+">
                            <input id="txtcemail" name="cemail" placeholder="Email address" title="Please Enter Correct EmailID" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}">
                            <input id="txtcmobile" name="cmobile" placeholder="Enter 10 digit Mobile No." title="Enter 10 Digit Mobile No." required="" type="text" pattern="[0789][0-9]{9}">
                            <input id="txtcsubject" name="csubject" placeholder="Subject" required="" type="text">
                            <textarea id="txtcmessage" name="cmessage" placeholder="Write message" required=""></textarea>
                            <input type="submit" value="Submit" id="btnContus">
                        </form>
                    </div>
                </div>
            </div>
            <div class="contact-info-wrap">
                <div class="row mt-60">
                    <div class="col-xl-6">
                        <div class="google-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60489.08514924353!2d73.78252437214617!3d18.638498712859604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b96902924cc3%3A0x4627f0e244db945c!2sTeerth%20Business%20Center%20Bhosari%20MIDC!5e0!3m2!1sen!2sin!4v1732009363155!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-info">
                            <div class="section-title">
                                <h2>Contact Info <span><i class="las la-arrow-right"></i></span></h2>
                            </div>
                            <div class="contact-info-inner">
                                <div class="single-contact-info">
                                    <p>Email</p>
                                    <h4>sales@sakaindia.com</h4>
                                </div>
                                <div class="single-contact-info">
                                    <p>Phone</p>
                                    <h4>
                                   Sales: +91 956 109 4128 <br>                             
                                   Tel: +91-20-27110011<br>
                                   Fax: +91-20- 27110013<br>
                                    </h4>
                                </div>
                                <div class="single-contact-info">
                                    <p>Address</p>
                                    <h4><h5>Headquarter</h5>
                                     TEERTH BUSINESS CENTER,UNIT 11, 5th FLOOR, EL BLOCK, MIDC Bhosari, Pune 411026, Maharashtra, India.</h4>
                                    <h4><h5>Plant-1</h5>
                                     Gat No-65,Plot No.-01,PCS Chowk Dhanore (Alandi) Pune 412105 Maharashtra, India</h4>
                                    <h4><h5>Plant-2</h5>
                                     J58, 'S' Block, MIDC, Bhosari, Pune 411026, Maharashtra, India.</h4>
                                </div>  
                                <div class="social-area">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-skype"></i></a>
                                </div>                          
                            </div>
                        </div>
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
