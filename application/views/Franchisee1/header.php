<html>
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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
		
		 });
	   </script>
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
						<img src="<?php echo base_url(); ?>Style/images/cca-logo.png">
                        <span class="sc-hidden">
                            <span class="semi-bold">CCA INDIA</span>
                        </span>
						
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-nav-expanded pull-right margin-md-right">
                      <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle navbar-user" href="javascript:;">
                            <img class="img-circle" src="<?php echo base_url(); ?>Style/demo/images/profile.jpg">
                            <span class="hidden-xs"> <?php echo $userdata->email;?> </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu pull-right-xs">
                            <li class="arrow"></li>
                            <li class="divider"></li>
                            <li><a href="#">Log Out</a></li>
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
                            <a href="#" title="Association">
                                <i class="fa fa-lg fa-fw fa-file-text"></i>Download
                            </a>
                        </li>
						
						
                        <li class="nav-dropdown" id="order">
                            <a href="#" title="Order">
                                <i class="fa fa-lg fa-fw fa-file-text"></i>Order
                            </a>
                        </li>
						
						 <li class="nav-dropdown" >
                            <a href="#" title="Association">
                                <i class="fa fa-lg fa-fw fa-file-text"></i>Certificate
                            </a>
                        </li>
						
						
						
                     	<li class="nav-dropdown">
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
								
								 <li>
                                    <a href="#" title="Exam Module">
                                        <i class="fa fa-fw fa-caret-right"></i>Exam Password Request
                                    </a>
                                </li>
								
                                
                             </ul>
                        </li>
						</ul>
                    </nav>
            </aside>

<div class="page-content">
