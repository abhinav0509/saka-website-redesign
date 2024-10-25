<?php $this->load->view('Front_view/contact_from'); ?>


<div class="container coursecontent">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="index.html">Home</a></h6>
                    <h6><span class="page-active">Courses</span></h6>
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
                                <div class="list-event-thumb">
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>style/images/qt.jpg" alt="Tally Professional">
                                    </a>
                                </div>
                                <div class="list-event-header">
								<h5 class="event-title"><a href="event.html">Quick Tally</a></h5>
								<li style="list-style:none;">
                                    <span class="event-place small-text"><i class="fa fa-calendar-o"></i><a>&nbsp;&nbsp;Duration&nbsp;&nbsp;&nbsp;30 Hrs</a></span>
                                  </li>
									<li style="list-style:none;">
								   <span class="event-date small-text"><i class="fa fa-book"></i><a>&nbsp;&nbsp;Books&nbsp;&nbsp;&nbsp;&nbsp;1 Books</a></span>
									</li>
									<li style="list-style:none;">
									<span class="event-date small-text"><i class="fa fa-file-text-o"></i><a>&nbsp;&nbsp;Exam &nbsp;&nbsp;&nbsp;&nbsp;1 Exam</a></span>
                                    </li>
									<li style="list-style:none;">
									<span class="event-date small-text"><i class="fa fa-certificate"></i><a>&nbsp;&nbsp;Certification</a></span>
                                    </li>
								</div>
                                
								<div style="text-align:justify;margin-top:3%;">
                                <p>Quick Tally- Includes information on basics of maintaining general accounts in Tally.ERP9 till finalization of accounts. This course also covers shortcut keys and techniques involved in Tally software.</p>
								<h3><p>Course Contents: </p></h3>
								<p><b>Trading Organization:</b> Includes introduction to Balance sheets, Stock groups, Essential Accounting steps such as Purchase & Sales, Inventory, F11 &F12 Features, Advanced accounting Features, Advanced Inventory Features, Price list, Adjustment entries, VAT, CST,VAT for Composite Dealer, POS, Inventory & Statutory Reports</p>
								</div>
								<div>
								<!--<center><h5 class="event-title"><a href="#">Quick Tally&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Duration 40 Hrs  &nbsp;&nbsp;&nbsp;&nbsp;1 Books&nbsp;&nbsp;&nbsp;&nbsp;1 Exam, Certificate</a></h5></center>
								<!--<h5 class="event-title"><a href="#">2 Books</a></h5>
								<h5 class="event-title"><a href="#">2 Exam Certificate</a></h5>--->
								</div>
							</div> <!-- /.box-content-inner -->
                        </div> <!-- /.list-event-item -->
                       
						
                    </div> <!-- /.col-md-12 -->

                </div> <!-- /.row -->

               <!--- <div class="row">
                    <div class="col-md-12">
                        <div class="load-more-btn">
                            <a href="#">Click here to load more events</a>
                        </div>
                    </div> <!-- /.col-md-12 -->
                <!--</div><!-- /.row -->

            </div> <!-- /.col-md-8 -->

            <!-- Here begin Sidebar -->
             <div class="col-md-4">
                <?php $this->load->view('Front_view/sidebar1'); ?>
				
            </div> <!-- /.col-md-4 -->
    
        </div> <!-- /.row -->
    </div> <!-- /.container -->