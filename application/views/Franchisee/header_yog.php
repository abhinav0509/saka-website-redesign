<html>
<?php
$this->load->helper('url');
if(isset($userdata->email))
{
    
}
else
{
    echo "<script>alert('Login First....!');</script>";
    echo "<script>window.location='http://ccaindia.in/index.php/Franchisee';</script>";
}



?>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Collge Of Computer Accounts </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>Style/favicon-of-msipl.png">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Style/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Style/dist/css/iriy-admin.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Style/demo/css/demo.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Style/dist/assets/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Style/css/demo.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>Style/css/basic.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>Style/css/basic_ie.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Style/dist/assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>Style/dist/css/plugins/rickshaw.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Style/dist/css/plugins/morris.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>Style/dist/css/mystyle.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>Style/css/demo1.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>Style/css/jquery-select2.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>Style/css/jquery-dataTables.min.css" />
<script src="<?php echo base_url(); ?>Style/js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url(); ?>Style/dist/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>Style/ckeditor/ckeditor.js"></script>
		<script type='text/javascript' src='<?php echo base_url(); ?>Style/js/jquery.simplemodal.js'></script>
		<script type='text/javascript' src='<?php echo base_url(); ?>Style/js/basic.js'></script>
        <script src="<?php echo base_url(); ?>Style/dist/js/jquery.validate.js"></script>
        <script src="<?php echo base_url(); ?>Style/dist/js/ASPSnippets_Pager.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>Style/dist/js/jquery.dataTables.js"></script>
         <script src="<?php echo base_url(); ?>Style/dist/js/dataTables.tableTools.js"></script>
         <script src="<?php echo base_url(); ?>Style/dist/js/dataTables.bootstrap.js"></script>
         <script src="<?php echo base_url(); ?>Style/dist/js/select2.min.js"></script>
         <script src="<?php echo base_url(); ?>Style/js/jquery.slimscroll.js"></script>
		 <script src="<?php echo base_url(); ?>Style/js/jquery.slimscroll.min.js"></script>
		 <script src="<?php echo base_url(); ?>Style/js/social_media.js"></script>
	       
         <script>
	     var j=jQuery.noConflict();
         j(document).ready(function(){
		
		   j("#menu li").click(function(){
		    j(this).addClass("active");
		 });
		          getnotification();
		 });

         function getnotification()
         {
             
           var op ="<li class='dropdown-title bg-inverse'>Notifications "+0+"</li>"; 
                 op += "<li>";
                 op +="<a href='<?php echo base_url(); ?>index.php/Franchisee/Admission' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Student Exam Date</strong><br><small class='text-muted'>"+0+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 op += "<li>";
                 op +="<a href='<?php echo base_url(); ?>index.php/Franchisee/Book_Order' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Order Status</strong><br><small class='text-muted'>"+0+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 op += "<li>";
                 op +="<a href='<?php echo base_url(); ?>index.php/Franchisee/Daily_Enquiry' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Enquiry From Admin</strong><br><small class='text-muted'>"+0+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 op += "<li>";
                 op +="<a href='<?php echo base_url(); ?>index.php/Franchisee/Daily_Enquiry' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>Enquiry Remark From Admin</strong><br><small class='text-muted'>"+0+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";
            j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Notifications/getfranchnotifications',
            type: 'POST',
            data:{'action':"getExame"},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                 var obj1=obj['data1'];
                 var obj2=obj['data2'];
                 var obj3=obj['data3'];
                 var obj4=obj['data4'];

                 var tot_noti=(obj1.length)+(obj2.length)+(obj3.length)+(obj4.length);
                 

                 op ="<li class='dropdown-title bg-inverse'>Notifications "+tot_noti+"</li>"; 
                 op += "<li>";
                 op +="<a href='<?php echo base_url(); ?>index.php/Franchisee/Admission' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Student Exam Date</strong><br><small class='text-muted'>"+obj1.length+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 op += "<li>";
                 op +="<a href='<?php echo base_url(); ?>index.php/Franchisee/Book_Order' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Order Status</strong><br><small class='text-muted'>"+obj2.length+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 op += "<li>";
                 op +="<a href='<?php echo base_url(); ?>index.php/Franchisee/Daily_Enquiry' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Enquiry From Admin</strong><br><small class='text-muted'>"+obj3.length+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 op += "<li>";
                 op +="<a href='<?php echo base_url(); ?>index.php/Franchisee/Daily_Enquiry' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>Enquiry Remark From Admin</strong><br><small class='text-muted'>"+obj4.length+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 j(".noticnt").html(tot_noti);
                 j(".noti").html(op);
                 for(i=0;i<obj1.length;i++)
                 {   

                 }
                 
                  
            },
            error: function () {
                
            }
        });
         }

        setInterval(function(){ 
    getnotification();
}, 5000);
	   </script>

       <style>
.mini-chart .chart-value {
    color: inherit;
    font-family: calibri;
    font-size: 13px;
}
.navbar .navbar-brand {
    font-size: 14px;
    font-weight: 300;
    line-height: 50px;
    text-align: center;
}
       </style>
    </head>
    <body class="">
        <header>
            <nav class="navbar navbar-default navbar-static-top no-margin" role="navigation">
                <div class="navbar-brand-group">
                    <a class="navbar-sidebar-toggle navbar-link" data-sidebar-toggle>
                        <i class="fa fa-lg fa-fw fa-bars"></i>
                    </a>
                    <a class="navbar-brand hidden-xxs" href="#">
                        <span class="sc-visible">
                            I
                        </span>
						<img src="<?php echo base_url(); ?>Style/images/cca-logo.png" style="height:40px;width:40px;">
                        <span class="sc-hidden">
                            <span class="semi-bold">Franchise Dashboard</span>
                        </span>
						
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-nav-expanded pull-right margin-md-right">
                      
                      <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i class="glyphicon glyphicon-globe"></i>
                            <span class="badge badge-up badge-danger badge-small noticnt"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-notifications pull-right noti">
                        </ul>
                    </li>

                      <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle navbar-user" href="javascript:;">
                            <img class="img-circle" src="<?php echo base_url(); ?>Style/demo/images/profile.jpg">
                            <span class="hidden-xs"> <?php echo $userdata->institute_name;?> </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu pull-right-xs">
                            <li class="arrow"></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url(); ?>index.php/Logout/Franch_logout">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
               
            </nav>
        </header>
        <div class="page-wrapper">
            <aside class="sidebar sidebar-default">
                    <nav>
             <ul class="nav nav-pills nav-stacked" id="Menu">
                     <li class="nav-dropdown" id="home">
							<a href="#" title="Home">
                                <i class="fa fa-lg fa-fw fa-home"></i> Home
                            </a>
                        </li>
						
						 <li class="nav-dropdown" >
                            <a href="<?php echo base_url()."index.php/Franchisee/Daily_Enquiry" ?>" title="Daily Enquiry...">
                                <i class="fa fa-lg fa-fw fa-file-text"></i>Daily Enquiry
                            </a>
                        </li>
						
						
						
			          <li class="nav-dropdown" >
                            <a href="<?php echo base_url()."index.php/Franchisee/Admission" ?>" title="Association">
                                <i class="fa fa-lg fa-fw fa-file-text"></i> Admission
                            </a>
                        </li>
						
						
						 <li class="nav-dropdown" >
                            <a href="<?php echo base_url()."index.php/Franchisee/Download" ?>" title="Association">
                                <i class="fa fa-lg fa-fw fa-file-text"></i>Download
                            </a>
                        </li>
						
						
                        <li class="nav-dropdown" id="order">
                            <a href="<?php echo base_url()."index.php/Franchisee/Book_Order" ?>" title="Order">
                                <i class="fa fa-lg fa-fw fa-file-text"></i>Order
                            </a>
                        </li>
                        
                         <li class="nav-dropdown" id="order">
                            <a href="<?php echo base_url()."index.php/Franchisee/placement" ?>" title="Order">
                                <i class="fa fa-lg fa-fw fa-file-text"></i>Placement
                            </a>
                        </li>
                        
                        
						
						 <li class="nav-dropdown" >
                            <a href="<?php echo base_url(); ?>index.php/Franchisee/create_cert1" title="Association">
                                <i class="fa fa-lg fa-fw fa-file-text"></i>Certificate
                            </a>
                        </li>

                        <li class="nav-dropdown" id="jcard">
                            <a href="<?php echo base_url(); ?>index.php/Franchisee/Job_card" title="Association">
                                <i class="fa fa-lg fa-fw fa-file-text"></i>Job Card
                            </a>
                        </li>
						
						
                     	<li class="nav-dropdown" id="exm_mg">
                            <a href="#" title="Exam Management">
                                <i class="fa fa-lg fa-fw fa-th-list"></i> Exam Management
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="#" title="Exam Module">
                                        <i class="fa fa-fw fa-caret-right"></i>Arrange Exam
                                    </a>
                                </li>
								 <li>
                                    <a href="#" title="Exam Module">
                                        <i class="fa fa-fw fa-caret-right"></i>student Result
                                    </a>
                                </li>
								
								 <li>
                                    <a href="#" title="Exam Module">
                                        <i class="fa fa-fw fa-caret-right"></i>Failed Student
                                    </a>
                                </li>
								
								 <li title="Exam Password Request" id="exm_pass">
                                    <a href="<?php echo base_url();?>index.php/Franchisee/exame_request" title="Exam Module">
                                        <i class="fa fa-fw fa-caret-right"></i>Exam Password Request
                                    </a>
                                </li>
								
                               
                                
                             </ul>
                        </li>
						</ul>

                        <ul class="sidebar-summary">
                        <li>
                            <div class="mini-chart mini-chart-block">
                                <div class="chart-details">
                                    <div class="chart-name"><h4 style="color:F39A00;">Payment Details</h4></div>
                                    <div class="chart-value">HDFC Bank</div>
                                    <div class="chart-value">CCA Educations Private Limited</div>
                                    <div class="chart-value">A/c No. 06372000004498</div>
                                    <div class="chart-value">NEFT : IFSC : HDFC 0000637</div>
                                    <div class="chart-value">Branch Code : 0637</div>
                                </div>
                                <div id="mini-chart-sidebar-1" class="chart pull-right"></div>
                            </div>
                        </li>
                        
                    </ul>
                    </nav>
            </aside>

<div class="page-content">
