<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
 <script src="<?php echo base_url(); ?>style/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>style/js/jquery.validate.min.js"></script>
<style>
.astra{
    margin-left: 13px;
    font-size: 15px;
    color: red;
}
</style>

<script type="text/javascript">
var j=jQuery.noConflict();
$(document).ready(function(){
j("#alert").delay(3200).fadeOut(300);
});
function val()
{
    
    j("#enqui_form").validate({

            rules:{
                    name:"required",
                    email:"required",
                    cont:"required"
                },
            message:{
                    name:"Please Enter Your Full Name",
                    email:"Please Enter Your Email Id",
                    cont:"Please Enter Your Contact No"
            }
        });
}
</script>
<div class="container slidecontent">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="index.html">Home</a></h6>
                    <h6><span class="page-active">Contact</span></h6>
                </div>
            </div>
        </div>
    </div>


<div class="container">
        <div class="row">

           
            
            <div class="col-md-8">
                <div class="contact-page-content">
                    <div class="contact-heading">
                        <h3>Contact us</h3>
                        <p>
                            <?php if(isset($message)){ ?>
                            <div id="alert" class="alert alert-success">
                                    <strong>Thank You!</strong>  Mail sent successfully...
                            </div>
                            <?php } ?>
                        </p>
                    </div>
                <form name="f1" id="enqui_form" method="post" action="<?php echo base_url(); ?>index.php/Welcome/Contact_mail">    
                    <div class="contact-form clearfix">
                        <p class="full-row">
                            <span class="contact-label">
                                <label for="name-id">Name:<span class="astra">*</span></label>
                                <span class="small-text">Put your name here:</span>
                            </span>
                            <input type="text" id="name" name="name">
                        </p>
                        <!--<p class="full-row"> 
                            <span class="contact-label">
                                <label for="surname-id">Last Name:</label>
                                <span class="small-text">Put your surname here:</span>
                            </span>
                            <input type="text" id="surname-id" name="surname-id">
                        </p>-->
                        <p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">E-mail:<span class="astra">*</span></label>
                                <span class="small-text">Type email address:</span>
                            </span>
                            <input type="email" id="email" name="email">
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Contact:<span class="astra">*</span></label>
                                <span class="small-text">Type Contact No:</span>
                            </span>
                            <input type="text" id="cont" name="cont">
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Company:</label>
                                <span class="small-text">Type Company Name:</span>
                            </span>
                            <input type="text" id="cmp" name="cmp">
                        </p>
                        <p class="full-row">
                            <span class="contact-label">
                                <label for="message">Message:</label>
                                <span class="small-text">Type your message</span>
                            </span>
                            <textarea name="message" id="message" rows="6"></textarea>
                        </p>
                        <p class="full-row">
                            <input class="mainBtn" type="submit" name="contact_submit" onclick="return val()" value="Send Message">
                        </p>
                    </div>
                </form>
                    <div class="contact-map">
                        <div class="google-map-canvas" id="map-canvas" style="height: 300px;">
                    </div>
                </div>
                </div>
            </div> <!-- /.col-md-7 -->
            
			
			 <div class="col-md-4">
                <div class="widget-main">
                    <div class="widget-main-title">
                       <h4 class="widget-title">Head office</h4>
                    </div> <!-- /.widget-main-title -->
                    <div class="widget-inner">
                      
                    <div class="prof-list-item clearfix">
                           
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Betty Hunt</h5>-->
                                <p class="small-text">
                                   <span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;College Of Computer Accountants
                                    311, 3rd Floor,
                                    Mahalaxmi Market, Near Desai Bandhu,
                                    Shanipar Chowk, Mandai Road, Shukrawar Peth
                                    Pune -411002
                                    
                                </p>
                                <p class="small-text">
                                    <i class="fa fa-phone"></i>&nbsp;&nbsp;020-32392121 / 09373703928
                                </p>
                                                              
                           </div> <!-- /.prof-details -->
                   </div> <!-- /.prof-list-item -->
                   
          
                </div> <!-- /.widget-inner -->
               </div> <!-- /.widget-main -->

               <div class="widget-main">
                    <div class="widget-main-title">
                        <h4 class="widget-title">Other branches</h4>
                    </div>
                    <div class="widget-inner">
                        <div class="prof-list-item clearfix">
                           <h5 class="prof-name-list"><span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;Pimpri- Branch</h5>
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Betty Hunt</h5>-->
                                <p class="small-text">
                                        Office No 1,Jamthani Corner,
                                        Jaihind Highschool Chowk,
                                        Opp. Ganesh Hotel,
                                        Pimpri, Pune-411017
                                       
                                </p>
                                <p class="small-text">
                                        <i class="fa fa-phone"></i>&nbsp;&nbsp;09373703928 / 09145706205
                                </p>
                                                              
                           </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                          
                            <div class="prof-details">
                                <h5 class="prof-name-list"><span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;Corporate Office Dhule</h5>
                                <p class="small-text">
                                        23, Muncipal Colony,
                                        Neharu Nagar, Behind Deopur Church,
                                        W.B. Road,
                                        Deopur, Dhule - 424001
                                </p>
                                <p class="small-text">
                                     <i class="fa fa-phone"></i>&nbsp;&nbsp;09326059560 / 09373381119
                                </p>
                                
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                           
                            <div class="prof-details">
                                <h5 class="prof-name-list"><span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;Akurdi - Branch</h5>
                                <p class="small-text">
                                    Office No 4,
                                    ABC Complex, 
                                    opp. Akurdi Railway Station,
                                    Akurdi, Pune-411035
                                </p>
                                <p class="small-text">
                                    <i class="fa fa-phone"></i>&nbsp;&nbsp;9372499988 / 09326427400
                                </p>
                                
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                           
                            <div class="prof-details">
                                <h5 class="prof-name-list"><span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;Hadapsar- Branch</h5>
                                <p class="small-text">
                                    Off.No 10, 3nd Floor,
                                    Dashmesh Aprt. Opp Nilkamal Mangal Karyalaya
                                    Pune- Solapur Road, Gadital
                                    Hadapsar, Pune.
                                </p>
                                <p class="small-text">
                                    <i class="fa fa-phone"></i>&nbsp;&nbsp;09326427400
                                </p>
                                
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->

                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->
            </div> <!-- /.col-md-5 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->

    <script type="text/javascript">
           /*var locations = [
                ['Mahalaxmi Market, Near Desai Bandhu,hanipar Chowk, Mandai Road, Shukrawar PethPune', -33.890542, 151.274856],
                ['Jaihind Highschool Chowk,Opp. Ganesh Hotel,Pimpri, Pune', -33.923036, 151.259052],
                ['Cronulla Beach', -34.028249, 151.157507],
                ['Manly Beach', -33.80010128657071, 151.28747820854187],
                ['Maroubra Beach', -33.950198, 151.259302]
            ];*/
      
            var locations = [
                ['College Of Computer Accountants 311, 3rd Floor,Mahalaxmi Market, Near Desai Bandhu,Shanipar Chowk, Mandai Road, Shukrawar Peth,Pune -411002', 18.513430, 73.855628],
                ['Office No 1,Jamthani Corner,Jaihind Highschool Chowk,Opp. Ganesh Hotel,Pimpri, Pune-411017', 18.629781, 73.799709],
                ['23, Muncipal Colony,Neharu Nagar, Behind Deopur Church,W.B. Road,Deopur, Dhule - 424001', 20.917256, 74.781752],
                ['Office No 4,ABC Complex,opp. Akurdi Railway Station,Akurdi, Pune-411035', 18.648821, 73.765363],
                ['Off.No 10, 3nd Floor,Dashmesh Aprt. Opp Nilkamal Mangal Karyalaya,Pune- Solapur Road, Gadital,Hadapsar, Pune.', 18.500390, 73.942404]
               
            ];

            var map = new google.maps.Map(document.getElementById('map-canvas'), {
                zoom: 7,
                center: new google.maps.LatLng(19.751480, 75.713888),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }

        
        </script>