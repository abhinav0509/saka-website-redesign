<html>
<?php
$this->load->helper('url');
if(isset($userdata->email) && ($userdata->user_type=="Admin" || $userdata->user_type=="Exam"))
{
    
}
else
{
    echo "<script>alert('Login First....!');</script>";
	redirect('Admin');
    echo "<script>window.location='http://localhost/index.php/Admin';</script>";
}

?>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SAKA INDIA | Dashboard </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="<?php echo base_url();?>uploads/Slider/logo.png">
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
		
         <script src="<?php echo base_url(); ?>Style/dist/js/jquery.dataTables.js"></script>
         <script src="<?php echo base_url(); ?>Style/dist/js/dataTables.tableTools.js"></script>
         <script src="<?php echo base_url(); ?>Style/dist/js/dataTables.bootstrap.js"></script>

        <script type='text/javascript' src='<?php echo base_url(); ?>Style/js/jquery.simplemodal.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>Style/js/basic.js'></script>
        <script src="<?php echo base_url(); ?>Style/dist/js/jquery.validate.js"></script>
		 
         <script src="<?php echo base_url(); ?>Style/dist/js/select2.min.js"></script>
         <script src="<?php echo base_url(); ?>Style/js/jquery.slimscroll.js"></script>
         <script src="<?php echo base_url(); ?>Style/js/jquery.slimscroll.min.js"></script>
		 <script src="<?php echo base_url(); ?>Style/js/social_media.js"></script>

<style>
.bg-inverse{

    background-color: #004884;
    color: #FFF;
}
.navbar .navbar-brand {
    font-size: 14px;
    font-weight: 300;
    line-height: 50px;
    text-align: center;
}
.nav-dropdown.active.open
{
   background-color: #004884;
   color: #fff;
   border-radius: 4px;
}
.nav>li>.nav-sub {
  margin-top: 1px;
  background-color: #004884;
}

</style>
	       
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
                 op +="<a href='javascript:;' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Franchisee Registration</strong><br><small class='text-muted'>"+0+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 op += "<li>";
                 op +="<a href='javascript:;' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Student Enquiry</strong><br><small class='text-muted'>"+0+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>"; 

                 op += "<li>";
                 op +="<a href='javascript:;' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>Active Franchisee Student Enquiry</strong><br><small class='text-muted'>"+0+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 op += "<li>";
                 op +="<a href='javascript:;' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Student Admission</strong><br><small class='text-muted'>"+0+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 op += "<li>";
                 op +="<a href='javascript:;' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Order</strong><br><small class='text-muted'>"+0+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

            j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Notifications/getnotifications',
            type: 'POST',
            data:{'action':"getExame"},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                 var obj1=obj['data1'];
                 var obj2=obj['data2'];
                 var obj3=obj['data3'];
                 var obj4=obj['data4'];
                 var obj5=obj['data5'];

                 var tot_noti=(obj1.length)+(obj2.length)+(obj3.length)+(obj4.length)+(obj5.length);
                  //var bk=obj['data2'];
                  //var sk=obj['data3'];
                 // var st=obj['data4'];
                 // var mdt=obj['data5'];
                
                  //j('#firstid').val(bk[0]['quiz_id']); 
                 // j('#lastid').val(sk[0]['quiz_id']); 

                 op ="<li class='dropdown-title bg-inverse'>Notifications "+tot_noti+"</li>"; 
                 op += "<li>";
                 op +="<a href='<?php echo base_url(); ?>index.php/Admin/Fran_Enquiry' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Franchisee Registration</strong><br><small class='text-muted'>"+obj1.length+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 op += "<li>";
                 op +="<a href='<?php echo base_url(); ?>index.php/Admin/Student_Enquiry' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Student Enquiry</strong><br><small class='text-muted'>"+obj2.length+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 op += "<li>";
                 op +="<a href='<?php echo base_url(); ?>index.php/Admin/Active_Fran' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>Active Franchisee Student Enquiry</strong><br><small class='text-muted'>"+obj3.length+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 op += "<li>";
                 op +="<a href='<?php echo base_url(); ?>index.php/Admin/Fran_Admission' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Student Admission</strong><br><small class='text-muted'>"+obj4.length+" new</small>";
                 op +="</div>";
                 op +="</a>";
                 op +="</li>";

                 op += "<li>";
                 op +="<a href='<?php echo base_url(); ?>index.php/Admin/order' class='notification'>";
                 op +="<div class='notification-thumb pull-left'><i class='fa fa-clock-o fa-2x text-info'></i>";
                 op +="</div>";
                 op +="<div class='notification-body'><strong>New Order</strong><br><small class='text-muted'>"+obj5.length+" new</small>";
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
    </head>
	<?php 
		   $sdata=$this->globaldata['userdata'];
		   
		   $unm=base64_encode($sdata->user_name);
		   $cnt=base64_encode($sdata->contact);
		   $email=base64_encode($sdata->uemail);
		   $pass=base64_encode($sdata->pass);
		   $website=base64_encode("http://localhost/cca/index.php/Admin/Smouser");	
	?>
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
						<img src="<?php echo base_url();?>uploads/Slider/logo.png" style="height:40px; width:80px;">
                        <span class="sc-hidden">
                            <span class="semi-bold">Admin Dashboard</span>
                        </span>
						
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-nav-expanded pull-right margin-md-right">
                <li class="hidden-xs">
                        <form class="navbar-form">
                            <div class="navbar-search">
                                <input type="text" placeholder="Search &hellip;" class="form-control">
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li>
                <?php if($userdata->user_type=="Admin"){ ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                            <i class="glyphicon glyphicon-globe"></i>
                            <span class="badge badge-up badge-danger badge-small noticnt">7</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages pull-right">
                            <li class="dropdown-title bg-inverse">New Messages</li>
                            <li class="unread">
                                <a href="javascript:;" class="message">
                                    <img class="message-image img-circle" src="demo/images/avatars/1.jpg">

                                    <div class="message-body">
                                        <strong>Ernest Kerry</strong><br>
                                        Hello, You there?<br>
                                        <small class="text-muted">8 minutes ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="javascript:;" class="message">
                                    <img class="message-image img-circle" src="demo/images/avatars/3.jpg">

                                    <div class="message-body">
                                        <strong>Don Mark</strong><br>
                                        I really appreciate your &hellip;<br>
                                        <small class="text-muted">21 hours</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="message">
                                    <img class="message-image img-circle" src="demo/images/avatars/8.jpg">

                                    <div class="message-body">
                                        <strong>Jess Ronny</strong><br>
                                        Let me know when you free<br>
                                        <small class="text-muted">5 days ago</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="message">
                                    <img class="message-image img-circle" src="demo/images/avatars/7.jpg">

                                    <div class="message-body">
                                        <strong>Wilton Zeph</strong><br>
                                        If there is anything else &hellip;<br>
                                        <small class="text-muted">06/10/2014 5:31 pm</small>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer">
                                <a href="javascript:;"><i class="fa fa-share"></i> See all messages</a>
                            </li>
                        </ul>
                    </li>     
					<?php } ?>

                   <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle navbar-user" href="javascript:;">
                        <img src="<?php echo base_url();?>uploads/Slider/logo.png" style="height:40px; width:80px;">
                            <span class="hidden-xs"> <?php echo $userdata->email;?> </span>
                            <b class="caret"></b>
                        </a>                        
                        <ul class="dropdown-menu pull-right-xs">
                            <li class="arrow"></li>                           
                            <li class="divider"></li>
							<?php if($userdata->user_type=="Admin"){ ?>
								<li><a href="<?php echo base_url(); ?>index.php/Admin/mail_configure">Mail Configuration</a></li>
							<?php } ?>
                            <li><a href="<?php echo base_url(); ?>index.php/Logout/Admin_logout">Log Out</a></li>
                            <!-- <li><a href="http://localhost/SocialMedia_RUN?unm=<?php  echo $unm; ?>&cont=<?php echo $cnt; ?>&email=<?php echo $email; ?>&pass=<?php echo rtrim($pass); ?>&web=<?php echo $website; ?>">SMO</a></li> -->
                        </ul>

                    </li>

                </ul>
            </nav>
        </header>
        <div class="page-wrapper">
            <aside class="sidebar sidebar-default">
                    <nav>
             <ul class="nav nav-pills nav-stacked" id="Menu">
              <li class="nav-dropdown" id="dash">
							<a href="<?php echo base_url();?>index.php/Admin/Dashboard" title="Dashboard">
                                <i class="fa fa-lg fa-fw fa-dashboard"></i> Dashboard
                            </a>
              </li>
			 <?php if($userdata->user_type=="Admin"){ ?>
                     <li class="nav-dropdown" id="home">
							<a href="#" title="Home">
                                <i class="fa fa-lg fa-fw fa-home"></i> Home
                            </a>           
              <ul class="nav-sub"  id="ulmenuDashboard">
               <li id="Habout" class="nav-dropdown">
                  <a href="<?php echo base_url()."index.php/Admin/about"; ?>" title="About Us">
                     <i class="fa fa-fw fa-caret-right"></i> About Us
                  </a>
                </li>
				<li id="HBanner">
                   <a href="<?php echo base_url()."index.php/Admin/Banner"; ?>" title="Banner">
                                        <i class="fa fa-fw fa-caret-right"></i> Banner
                   </a>
                </li>
                 <li id="contact">
                  <a href="<?php echo base_url()."index.php/Admin/Contact"; ?>" title="Contact Us">
                                        <i class="fa fa-fw fa-caret-right"></i> Contact Us
                  </a>
                </li>
                <li id="HExp">
                  <a href="<?php echo base_url()."index.php/Admin/Testimonial" ?>" title="Testimonial">
                                <i class="fa fa-fw fa-caret-right"></i> Testimonial
				</a>
                </li>
				<li id="gallery">
                            <a href="<?php echo base_url()."index.php/Admin/Gallery" ?>" title="Gallery">
                                 <i class="fa fa-fw fa-caret-right"></i> Gallery
                            </a>
                </li>	
                <li id="HTesto">
                 <a href="#" title="Setting">
                                <i class="fa fa-fw fa-caret-right"></i> Account Setting
				</a>
                </li>
                
                  <li id="HTitle">
                  <a href="<?php echo base_url()."index.php/Admin/state1" ?>" title="State Master">
                                <i class="fa fa-fw fa-caret-right"></i> State Master
				  </a>
                </li>
                <li id="ThreeDiv">
                  <a href="<?php echo base_url()."index.php/Admin/city1" ?>" title="City Master">
                                <i class="fa fa-fw fa-caret-right"></i> City Master
				  </a>
                </li>
				<li id="ThreeDiv">
                  <a href="#" title="Admin User">
                    <i class="fa fa-fw fa-caret-right"></i> Admin User
				  </a>
                </li>				
			    <li id="ThreeDiv">
                  <a href="<?php echo base_url()."index.php/Admin/Meta" ?>" title="Admin User">
                    <i class="fa fa-fw fa-caret-right"></i> Meta Keywords
				  </a>
                </li>				
              </ul>				
            </li>
			
			<li class="nav-dropdown">
                            <a href="<?php echo base_url()."index.php/Admin/Edit_Image" ?>" title="Edit All Function Images">
                                <i class="fa fa-lg fa-fw fa-user"></i> Edit Images
                            </a>
           </li>
           <li class="nav-dropdown" id="blog">
                            <a href="<?php echo base_url()."index.php/Admin/Blog" ?>" title="Edit All Function Blog">
                                <i class="fa fa-lg fa-fw fa-edit"></i> Blog Details
                            </a>
           </li>
			            <li class="nav-dropdown" id="nuser">
                            <a href="<?php echo base_url()."index.php/Admin/create_user" ?>" title="User">
                                <i class="fa fa-lg fa-fw fa-user"></i> Create User
                            </a>
                        </li>
						<li class="nav-dropdown" id="news">
                            <a href="<?php echo base_url()."index.php/Admin/News" ?>" title="News And Events">
                                <i class="fa fa-lg fa-fw fa-envelope"></i> News & Events
                            </a>
                        </li>                   
                        <!-- <li class="nav-dropdown" id="dfrr">
                          
                            <a href="#" title="Tree">
                                <i class="fa fa-lg fa-fw fa-edit"></i>Demo Tree
                            </a>
                             <ul class="nav-sub">
                            <li class="nav-dropdown" id="flist">
                            <a href="<?php echo  base_url()."index.php/Admin/Demo_Fran_List"?>" title="Tree">
                                <i class="fa fa-fw fa-caret-right"></i>Tree List
                            </a>
                        </li>
                            <li class="nav-dropdown" id="dstud">
                             <a href="<?php echo  base_url()."index.php/Admin/Demo_Active_Fran" ?>" title="Active Tree">
                                <i class="fa fa-fw fa-caret-right"></i>Student Enquiry
                            </a>
                        </li>
                        <li class="nav-dropdown" id="dadd">
                             <a href="<?php echo base_url()."index.php/Admin/Demo_Fran_Admission" ?>" title="Active Tree">
                                <i class="fa fa-fw fa-caret-right"></i>Admission
                            </a>
                        </li>
                        
                        
                        <li class="nav-dropdown" id="dord">
                             <a href="<?php echo base_url()."index.php/Admin/Demo_Order" ?>" title="Active Tree">
                                <i class="fa fa-fw fa-caret-right"></i>Order
                            </a>
                        </li>
                    </ul>
                    </li> -->
			 <?php } ?>					
                    </ul>                  
                </nav>
            </aside>
<div class="page-content">
