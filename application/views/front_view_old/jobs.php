<?php $this->load->view('Front_view/contact_from'); ?>
<div class="container coursecontent">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="index.html">Home</a></h6>
                    <h6><span class="page-active">New Jobs</span></h6>
                    <div class="grid-or-list">
                        <ul>
                            <li><a href="events-grid.html"><i class="fa fa-th"></i></a></li>
                            <li><a href="events-list.html"><i class="fa fa-list"></i></a></li>
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
                       
                        <div class="list-event-item">
                            <div class="box-content-inner clearfix">
                              
							<div class="col-md-12">
                               <h4><p><i class="fa fa-folder-open"></i>&nbsp;&nbsp;Current Job Openings</p></h4>
                              
							  
							  
							  
							  <div class="panel-group" id="accordion">
									  
									  <?php 
							
							if(!empty($results)){foreach($results as $row)
								{
								//echo $row->name;
							?>
									  
									  <div class="panel panel-default">
										<div class="panel-heading">
											<a data-toggle="collapse" data-parent="#accordion" href="#<?php  echo $row->id; ?>">
											  <?php echo $row->cname; ?>
											</a>
										</div>
										<div id="<?php  echo $row->id; ?>" class="panel-collapse collapse">
										  <div class="panel-body">
													
										<!--------------------------Start------------------------------------->					
										<div class="table-responsive" >
                             			<table id="ProductDa" class="table table-hover table-bordered" name="table">
                 							<thead style="background-color:#3678B2;color:#FFF;">
							                    <tr align="left">
							                         
							                        <th style="text-align:center;">Logo</th>
							                        <th style="text-align:center;">Company Name</th> 
							                        <th style="text-align:center;">Date</th>      
							                        <th style="text-align:center;">Vacancy</th>
													
							                    </tr>
                							</thead>
                							<tbody>      
                							 <tr align="center">           							       
                							       <td><img src="<?php echo base_url(); ?>uploads/Emp/<?php echo $row->image; ?>" style="height:80px; width:80px;margin-left:-53px;margin-right:-49px;"></img></td>
                							       <td><?php echo $row->cname; ?></td>
                							       <td><?php echo $row->edate; ?></td>
                							       <td><?php echo $row->vacancy; ?></td>  
											</tr>
                							       
                							</tbody>
           		 						</table>
          							</div>
									<p class="small-text">Venue:<?php echo $row->address; ?></p>
									<p class="small-text">
									<?php echo $row->state; ?>,<?php echo $row->city; ?>
									</p>						
										<!--------------------------------------End-------------------------------->					
															
															
										  </div>
										</div>
									  </div>
									 
							<?php  }} ?>	
									  
                                </div>
								
								
								
								
                            </div><!--col-md-12-->
							
							 <div>
								<!--<center><h5 class="event-title"><a href="#">Tally Professional&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Duration 156 Hrs  &nbsp;&nbsp;&nbsp;&nbsp;4 Books&nbsp;&nbsp;&nbsp;&nbsp;4 Exams,Job Cards,Certificate</a></h5></center>
								<!--<h5 class="event-title"><a href="#">2 Books</a></h5>
								<h5 class="event-title"><a href="#">2 Exam Certificate</a></h5>--->
							</div>
						   </div> <!-- /.box-content-inner -->
                        </div> <!-- /.list-event-item -->
                       
						
                    </div> <!-- /.col-md-12 -->

                </div> <!-- /.row -->

              

            </div> <!-- /.col-md-8 -->

            <!-- Here begin Sidebar -->
             <div class="col-md-4">
                <div class="widget-main">
                            <div class="widget-main-title">
                                <h4 class="widget-title">Latest News</h4>
                            </div> <!-- /.widget-main-title -->
                            <div class="widget-inner">
                               <marquee direction="up" scrollamount="2" onMouseOver="this.stop();" onMouseOut="this.start();">
          <div  class="one" style="padding: 5px; margin: 10px; border-bottom: 1px solid;">
            HURRAY!!!! !!!! FREE TRAINING !! Presents 7 Days FREE Training  on  Tally.ERP 9 Day /Date:  1st Oct...
            <br/>
            <a href="#">Read More...</a>
          </div>
          <div  class="one" style="padding: 5px; margin: 10px; border-bottom: 1px solid;">
           Advanced Excel Corporate Training For Company Employee/Professionals/Students. Training On: Advanced Excel 2010 Duration : 15 Days Program, 1...
            <br/>
            <a href="#">Read More...</a>
          </div>
          </marquee>
                            </div> <!-- /.widget-inner -->
                        </div> <!-- /.widget-main -->
						
            </div> <!-- /.col-md-4 -->
    
        </div> <!-- /.row -->
    </div> <!-- /.container -->