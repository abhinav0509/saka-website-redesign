<?php $this->load->view('Front_view/contact_from'); ?>
<script>
function More(id)
{
	window.location="<?php echo base_url(); ?>index.php/welcome/more_Gallery?id="+id;
}

</script>

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
                        
                        <div class="course-post" style="margin-top:15px;">
						
						
						<?php if(!empty($results)) { foreach($results as $row) 
							{	
						?>
						<div class="col-md-4" style="margin-top:12px;">
						<?php 
						$x=explode(",",$row->name);
						?>
						 <img src="<?php echo base_url(); ?>uploads/Gallery/<?php echo $x[0]; ?>" alt="" style="width:100%;height:150px;margin-right:9px;border:1px solid #00;">
						  <div style="text-align:center;"><a href="javascript:;" onclick="More(<?php echo $row->id; ?>);"><?php echo $row->album_name; ?></a></div>
						</div>
						<?php }} ?>
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