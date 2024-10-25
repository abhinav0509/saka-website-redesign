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
   <link rel="shortcut icon" href="<?php echo base_url(); ?>Style/images/FAVICON.png">
		<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
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
		 
		 //createCookie(name,"",-1);
		 
		 j('#logout').click(function(){			 			 
			 //document.cookie = 'Yogeah' + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
			 eraseCookie();
			 //window.location="<?php echo base_url(); ?>index.php/Logout/Student_logout";
		 });
		 
		  var d1 = new Date (),
		  d2 = new Date (d1);
		  d2.setMinutes ( d1.getMinutes() + 90 );
		  var expires = "; expires="+d2;
		  //alert(expires+" New"+d2.toLocaleString());
		
		 });
		 
		 function eraseCookie() {
				createCookie();
		 }	

function createCookie(name,value,days) {
	
  var d1 = new Date ();
  d2 = new Date (d1);
  d2.setMinutes ( d1.getMinutes() + 90 );
  var expires = "; expires="+d2;		
	
  cname="<?php echo $userdata->user_id; ?>";
  cvalue="";
  exdays=-1;
  
  //document.cookie = cname+"="+cvalue+expires+"; path=/CCA/index.php"	
  
  document.cookie = cname+"="+cvalue+expires+"; path=/index.php";
	window.location="<?php echo base_url(); ?>index.php/Logout/Student_logout";
}		 

	   </script>
	   <script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
    </head>
    <body class="" id="MyBody" onkeydown="" onunload=""> 
        <header>
            <nav class="navbar navbar-default navbar-static-top no-margin" role="navigation">
                <div class="navbar-brand-group">
                   <!-- <a class="navbar-sidebar-toggle navbar-link" data-sidebar-toggle>
                        <i class="fa fa-lg fa-fw fa-bars"></i>
                    </a>-->
                    <a class="navbar-brand hidden-xxs" href="#">
                        <span class="sc-visible">
                            I
                        </span>
						
                        <span class="sc-hidden">
                            <span class="semi-bold">CCA INDIA</span>
                        </span>
						
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-nav-expanded pull-right margin-md-right">
                      <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle navbar-user" href="javascript:;">
                            <img class="img-circle" src="<?php echo base_url(); ?>Style/demo/images/profile.jpg">
                            <span class="hidden-xs"> <?php echo "Wellcome:-".$userdata->stud_name;?> </span>
                            <b class="caret"></b>
                        </a>

						<ul class="dropdown-menu pull-right-xs">
                            <li class="arrow"></li>
                            <li class="divider"></li>
                            <li><a id="logout" href="javascript:;">Log Out</a></li>                            
                        </ul>
                       
                    </li>
					
                </ul>
               
            </nav>
        </header>
        <div class="page-wrapper">
            

<div class="page-content">
