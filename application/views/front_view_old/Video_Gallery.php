<?php $this->load->view('Front_view/contact_from'); ?>
<script>
function More(id)
{
	//alert(id);
	window.location="<?php echo base_url(); ?>index.php/welcome/more_Gallery?id="+id;
}



</script>



<!-------------------Start------------------------------------->

		

<!--------------------------------End----------------------------->




 <div class="container coursecontent">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
				<h6><a href="index.html">Home</a></h6>
                    <h6><a href="About.html">Gallery</a></h6>
                  
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
                        
                        <div class="course-post">
						
						
						
						<div class="col-md-4" style="margin-bottom:12px;">
						<iframe style="width:100%;height:143px;margin-right:9px;margin-top:12px;" src="https://www.youtube.com/embed/iCUV3iv9xOs?list=PL442FA2C127377F07" frameborder="0" allowfullscreen></iframe>
						</div>
						<div class="col-md-4" style="margin-bottom:12px;">
						<iframe style="width:100%;height:143px;margin-right:9px;margin-top:12px;" src="https://www.youtube.com/embed/iCUV3iv9xOs?list=PL442FA2C127377F07" frameborder="0" allowfullscreen></iframe>
						</div>
						
						<div class="col-md-4" style="margin-bottom:12px;">
						<iframe style="width:100%;height:143px;margin-right:9px;margin-top:12px;" src="https://www.youtube.com/embed/iCUV3iv9xOs?list=PL442FA2C127377F07" frameborder="0" allowfullscreen></iframe>
						</div>
						
						<div class="col-md-4" style="margin-bottom:12px;">
						 <iframe style="width:100%;height:143px;margin-right:9px;margin-top:12px;" src="https://www.youtube.com/embed/iCUV3iv9xOs?list=PL442FA2C127377F07" frameborder="0" allowfullscreen></iframe>
						</div>
						
						<div class="col-md-4" style="margin-bottom:12px;">
						<iframe style="width:100%;height:143px;margin-right:9px;margin-top:12px;" src="https://www.youtube.com/embed/iCUV3iv9xOs?list=PL442FA2C127377F07" frameborder="0" allowfullscreen></iframe>
						</div>
						
						<div class="col-md-4" style="margin-bottom:12px;">
						<iframe style="width:100%;height:143px;margin-right:9px;margin-top:12px;" src="https://www.youtube.com/embed/iCUV3iv9xOs?list=PL442FA2C127377F07" frameborder="0" allowfullscreen></iframe>
						</div>
						
						
						
						
						
                            <div class="course-details clearfix">
                            </div> <!-- /.course-details -->
                        </div> <!-- /.course-post -->

                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->


				
            </div> <!-- /.col-md-8 -->


            <!-- Here begin Sidebar -->
            <div class="col-md-4">

               <?php $this->load->view('Front_view/sidebar'); ?>
            </div> <!-- /.col-md-4 -->
    
        </div> <!-- /.row -->
    </div> <!-- /.container -->