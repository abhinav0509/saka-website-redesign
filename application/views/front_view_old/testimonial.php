<?php $this->load->view('Front_view/contact_from'); ?>

<script>
function More(id)
{
	//alert(id);
	window.location="<?php echo base_url(); ?>index.php/welcome/more_testimonal?id="+id;
}



</script>


<div class="container coursecontent">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="index.html">Home</a></h6>
                    <h6><span class="page-active">Student Testimonial</span></h6>
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
                        
                       <?php if(!empty($results)){ foreach($results as $row)
						   {
						   ?>
                       <div class="list-event-item">
                            <div class="box-content-inner clearfix">
                                <div class="list-event-thumb">
                                    <a href="">
                                        <img src="<?php echo  base_url(); ?>uploads/Testimonial/<?php echo $row->Image; ?>" alt="">
                                    </a>
                                </div>
                                <div class="list-event-header">
                                   
                                    <div class="view-details"><a href="javascript:;" class="lightBtn" id="tp" onclick="More(<?php echo $row->T_id; ?>);">Read More...</a></div>
                                </div>
                                <h5 class="event-title"><a href="#"><?php echo $row->Name; ?></a></h5>
								<?php echo substr("$row->Content",0,300)."......."; ?>
							
                            </div> <!-- /.box-content-inner -->
                        </div> <!-- /.list-event-item -->
					   <?php } } ?>							
                    </div> <!-- /.col-md-12 -->

                </div> <!-- /.row -->

                

            </div> <!-- /.col-md-8 -->

            <!-- Here begin Sidebar -->
                       <div class="col-md-4">
               <?php $this->load->view('Front_view/sidebar'); ?>
            </div> <!-- /.col-md-4 -->
			
			
			
					
					
	
	
	
	
	
        </div> <!-- /.row -->
    </div> <!-- /.container -->