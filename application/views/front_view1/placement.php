<script src="<?php echo base_url(); ?>Style/js/jquery.tabSlideOut.v1.3.js"></script> 
<style> 
.handle{
    top:37px;
}
.slide-out-div {
          padding: 20px;
          width: 250px;
          background: #efefef;
          border: 1px solid #29216d;
          z-index:1000;
          top:240px;
      }   

 .slide-out-div input[type="email"],
.slide-out-div input[type="text"],
.slide-out-div textarea {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  box-shadow: inset 0 0 2px #fff;
  border: 1px solid #cdcdcd;
  height: 33px;
  color: #394041;
  border-radius: 0;
  width:196px;
}
.slide-out-div input[type="email"],
.slide-out-div select,
.slide-out-div input[type="text"],
.slide-out-div textarea :active{
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  box-shadow: inset 0 0 2px #fff;
  border: 1px solid #726D71;
  height: 33px;
  color: #394041;
  border-radius: 0;
  width:196px;

}    
.slide-out-div input[type="submit"]{

   width: 150px;
}
</style>

<script>
var j=jQuery.noConflict();

j('document').ready(function(){
   
    j("#alert").delay(3200).fadeOut(300);


    j(function(){
        j('.slide-out-div').show();
        j('.slide-out-div').tabSlideOut({
            tabHandle: '.handle',                     
            pathToTabImage: '<?php echo base_url(); ?>Style/images/contact5.jpg', 
            imageHeight: '150px',                     
            imageWidth: '67px',                     
            tabLocation: 'left',                      
            speed: 1000,                              
            action: 'click',                          
            topPos: '250px',                          
            leftPos: '20px',   
            fixedPosition: true,
            onLoadSlideOut:false                      
        });
       });
       function show() {
            j('.handle').click();
        }
 

});
</script>
<div class="slide-out-div" style="display:none;">
                    <a class="handle" href="http://link-for-non-js-users.html">Content</a>
            <h4 style="color:#3678B2;">Quick connect us!</h4>
            <form method='post' action='#'>
            <input type='text' placeholder='Enter Name' name='name' required >
            <input type='email' placeholder='Enter Email' name='email' style="margin-top:8px;" required>
            <input type='text' placeholder='Enter Mobile No' name='mobile' style="margin-top:8px;" required>
          <!--  <input type='text' placeholder='Message' name='mobile' style="margin-top:8px;" required>-->
            <select id="interest" name="interest1" style="width:195px; margin-top:8px; height:33px;">
            <option selected=''>Enquiry For</option>
            <option value='lg_himacs'>LG Himacs</option>
            <option value='interior_styling'>Interior Styling</option>
            <option value='Home_decor'>HOme Decor</option>
            <option value='call'></option>
            </select>
            <input type='submit' class='btn btn-warning' value='submit' name='submit' id='submit' style="margin-top:4px; margin-bottom:2px; border:none;margin-left:25px;color:#fff;background-color:#3678B2;">
            </form>
        </div>

<div class="container coursecontent">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="index.html">Home</a></h6>
                    <h6><span class="page-active">Placement</span></h6>
                    <div class="grid-or-list">
                        <ul>
                            <li><a href="#"><i class="fa fa-th"></i></a></li>
                            <li><a href="#"><i class="fa fa-list"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	 <div class="container">
        <div class="row">

            <!-- Here begin Main Content -->
            <div class="col-md-8">

                
				
				
				 <div class="row">
                    <div class="col-md-12">
                        <div id="blog-author" class="clearfix">
						<div style="text-align:justify;">
                           <p>CCA is among the nation's most placed consultancy. CCA has a long history of established programs in Accounts education, research and service. We focus on the needs of the Accounts companies. We bridge the gap between the need of the industry for knowledgeable and skilled professionals and the education required to produce highly qualified candidates. There is an entire range of Accounts and other career related programs available under CCA. We reflect in the way we offer Quality education and Quality Job.</p>
                            <p>Now with our 7 successful years of coaching and training of almost 25,000 students all over in Maharashtra.For this we are keen to serve our youth with an opportunity to fetch a job.A job offering value based quality education with an aim of overall development of students’ personality,thru a "job fair" as we CCA promise Quality Job.</p>
							<p>We and our team always putting forth our efforts to invite in leading IT companies like WNS,Wipro,IBMDaksh,ZensarTechn,Finolex,Venky's,ologiesLtd,EXLService,Syntel,Convergys,L&T Infotech,and many other CA and other agency firms.</p>
							</div>
                        </div> <!-- /.blog-author -->
                    </div> <!-- /.col-md-12 -->

				
				
				
				
				
                <div class="row">
                    <div class="col-md-12">
                        <div id="blog-author" class="clearfix">
                            <a href="#" class="blog-author-img">
                                <img src="<?php echo base_url(); ?>style/images/placement/ccaimg.jpg" alt="">
                            </a>
                            <div class="blog-author-info">
                                <h4 class="author-name"><a href="#"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Shubhangi shivaji pawar</a></h4>
                                <p><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;&nbsp;Ganganagar, Trimurti chawk Salunke Clinic</p>
                                <p><i class="fa fa-globe"></i>&nbsp;&nbsp;&nbsp;Assistant</p>
                                <p><i class="fa fa-inr"></i>&nbsp;&nbsp;&nbsp;3000/-[Part Time]</p>
                            </div>
                        </div> <!-- /.blog-author -->
                    </div> <!-- /.col-md-12 -->

                    <div class="col-md-12">
                        <div id="blog-author" class="clearfix">
                            <a href="#" class="blog-author-img">
                                <img src="<?php echo base_url(); ?>style/images/placement/ccaimg2.jpg" alt="">
                            </a>
                            <div class="blog-author-info">
                                <h4 class="author-name"><a href="#"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Shweta Ravindra Bhosale</a></h4>
                                <p><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;&nbsp;P.N. Gadgil Camp, The Bombay Store </p>
                                <p><i class="fa fa-globe"></i>&nbsp;&nbsp;&nbsp;Marketing</p>
                                <p><i class="fa fa-inr"></i>&nbsp;&nbsp;&nbsp;7500/-[Full Time]</p>
                            </div>
                        </div> <!-- /.blog-author -->
                    </div> <!-- /.col-md-12 -->

                    <div class="col-md-12">
                        <div id="blog-author" class="clearfix">
                            <a href="#" class="blog-author-img">
                                <img src="<?php echo base_url(); ?>style/images/placement/ccaimg3.jpg" alt="">
                            </a>
                            <div class="blog-author-info">
                                <h4 class="author-name"><a href="#"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;John Micheal D'souza</a></h4>
                                <p><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;&nbsp;Sidheswar hotel D.P. Road Hadpsar Near, Kumar Picasso </p>
                                <p><i class="fa fa-globe"></i>&nbsp;&nbsp;&nbsp;Cashier</p>
                                <p><i class="fa fa-inr"></i>&nbsp;&nbsp;&nbsp;10000/-[Full Time]</p>
                            </div>
                        </div> <!-- /.blog-author -->
                    </div> <!-- /.col-md-12 -->

                    <div class="col-md-12">
                        <div id="blog-author" class="clearfix">
                            <a href="#" class="blog-author-img">
                                <img src="<?php echo base_url(); ?>style/images/placement/ccaimg4.jpg" alt="">
                            </a>
                            <div class="blog-author-info">
                                <h4 class="author-name"><a href="#"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Nandakumar Nagnath Londhe</a></h4>
                                <p><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;&nbsp;Cizen Mall Magarpatta</p>
                                <p><i class="fa fa-globe"></i>&nbsp;&nbsp;&nbsp;Cashier/Computer Operator</p>
                                <p><i class="fa fa-inr"></i>&nbsp;&nbsp;&nbsp;8000/-[Full Time]</p>
                            </div>
                        </div> <!-- /.blog-author -->
                    </div> <!-- /.col-md-12 -->

                    <div class="col-md-12">
                        <div id="blog-author" class="clearfix">
                            <a href="#" class="blog-author-img">
                                <img src="<?php echo base_url(); ?>style/images/placement/ccaimg6.jpg" alt="">
                            </a>
                            <div class="blog-author-info">
                                <h4 class="author-name"><a href="#"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Sujit Sampat Patil</a></h4>
                                <p><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;&nbsp;Satavwadi V.B. Dhaygude & Co.</p>
                                <p><i class="fa fa-globe"></i>&nbsp;&nbsp;&nbsp;Computer Operator</p>
                                <p><i class="fa fa-inr"></i>&nbsp;&nbsp;&nbsp;1500/-[Part Time]</p>
                            </div>
                        </div> <!-- /.blog-author -->
                    </div> <!-- /.col-md-12 -->


                </div> <!-- /.row -->
               
            </div> <!-- /.col-md-8 -->
          </div>  

            <!-- Here begin Sidebar -->
            <div class="col-md-4">
                
                <?php $this->load->view('Front_view/sidebar'); ?>

            </div> <!-- /.col-md-4 -->
    
        </div> <!-- /.row -->
    </div> <!-- /.container -->