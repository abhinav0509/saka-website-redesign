<style>
.examdetails ul li{
	list-style:none;
	padding-left: 10px;
}
li i {
	padding-right: 5px;
}
.panel-group .panel-title {
    font-size: 20px;
}
.panel-title > a > i {	
	background: #ff9933;
	color: #fff;
}
.coursePage  ul li{
	list-style:none;
}

</style>
<script type="text/javascript">
$(document).ready(function(){
    $("#about").removeClass("active");
    $("#home").removeClass("active");
    $("#course").addClass("active");
    $("#placement").removeClass("active");
    $("#studmnu").removeClass("active");
    $("#franmnu").removeClass("active");
    $("#brandmnu").removeClass("active");
    $("#galmnu").removeClass("active");
    $("#cntmnu").removeClass("active");
	$(".coursePage").find('li').prepend('<i class="fa fa-caret-right"></i>');
 });   
</script>
  <div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
    <div class="container">
      <div class="lms_title">Quick Tally</div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Quick Tally</li>
        </ol>
      </div>
    </div>
  </div>
</div>

  <div class="container">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-2">
      <div class="lms_title_center">
        <div class="lms_heading_1">
          <h2 class="lms_heading_title">Quick Tally</h2>
            
        </div>
        
      </div>
		
    
   
  </div>
  
   <div class="col-lg-12 examdetails"> 
  <div class="col-lg-4"> 
  <img src="<?php echo base_url();?>Style/images/courses/Cover_Quick_Tally.jpg" style="height:250px;" width="100%">
  </div>
  <div class="col-lg-4">
    <img style="height:250px;" width="100%" src="<?php echo base_url();?>Style/images/courses/Q_Tally.jpg">
  </div> 
  <div class="col-lg-4"> 
	<p style="margin-top:20px;"> 
	  <ul >
		<li> <b>Duration     : </b>30 Hrs</li>
		<li> <b>Books        : </b>1 Books</li>
		<li> <b>Exam         : </b>1 Exam</li>
		<li> <b>Certificate  : </b>Quick tally certificate  </li>
		<li> <b>Training Mode: </b>Online & Class Room </li>
	  </ul>
    </p>
   <p style="margin-top:20px;"><b>Quick Tally</b> - Includes information on basics of maintaining general accounts in Tally.ERP9 till finalization of accounts. This course also covers shortcut keys and techniques involved in Tally software.</p>
  </div>
   </div>

  <div class="row">
    <div class="col-lg-8">
     <div class="col-lg-12">
      <div class="panel-group" id="multi_collapse_accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"> <a data-toggle="collapse" data-parent="#multi_collapse_accordion" href="#collapseOne1"> Module </a> </h3>
          </div>
          <div id="collapseOne1" class="panel-collapse collapse in">
            <div class="panel-body coursePage">
					<h3 style="color: #7F0000;padding-left: 19px;">Trading Organization</h3>
					<div class="row">
						<div class="col-xs-12 col-md-6 col-lg-6"><h4>1] Purchase & Sales</h4>
							<ul>
								<li>Cash & Credit Purchase & Sales</li>
								<li>Invoicing in Tally.ERP 9</li>
								<li>Inventory Creations</li>
								<li>Inventory Transactions</li>
							</ul>       
						</div>
						  
						<div class="col-xs-12 col-md-6 col-lg-6"><h4>2] Overview of Tally.ERP 9</h4>
							<ul>
								<li>Features of Tally.ERP 9</li>
								<li>Inventory</li>
								<li>Advantages A/C & Inventory Features</li>
								<li>F11 Features</li>
								<li>F12 Configuration</li>  
								<li>Recording Transaction of Sample Data</li>  
							</ul> 
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-12 col-md-6 col-lg-6"><h4>3] Advanced Accounting Features</h4>
							<ul>
								<li>Billwise Details</li>
								<li>Cost Centers</li>
								<li>Cost Categories</li>
								<li>Bank Reconciliations</li>
								<li>Zero Valued Entries</li>
								<li>Backup Restore</li>
								<li>Interest Calculations</li>
							</ul>
						</div>
						<div class="col-xs-12 col-md-6  col-lg-6"><h4>4] Advanced Inventory Features</h4>
							<ul>
								<li>Actual & Billed Quantity</li>
								<li>Separate Discount Columns</li>
								<li>Multiple Price Levels</li>
							</ul>		  
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-12 col-md-6  col-lg-6"><h4>5] Taxation in Tally.ERP 9</h4>
							<ul>
								<li>GST for Trading</li>
								<li>Point of Sales (POS)</li>					
							</ul>  
						</div>
					
						<div class="col-xs-12 col-md-6  col-lg-6"><h4>6] Accounting, Inventory & Statutory Reports</h4>
							<ul>
								<li>Accounting Reports</li>
								<li>Statements of Accounts</li>	
								<li>Inventory Reports</li>
								<li>Statements of Inventory</li>	
								<li>Statutory Reports</li>						
							</ul>  
						</div>
					</div>
				</div>
			
          </div>
        </div>  
      </div>
    </div>
	
	
	
	</div>

    
  
   
  <div  class="col-xs-12 col-md-4 col-lg-4">
	   <?php $this->load->view('front_view/sidebar'); ?>    
  </div>
	 <!--sidebar end--> 
 
</div>
</div>
</div>
  