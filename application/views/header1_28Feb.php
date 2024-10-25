<html>
<?php
$this->load->helper('url');
if(isset($userdata->email) && $userdata->user_type=="Admin")
{
    
}
else
{
    echo "<script>alert('Login First....!');</script>";
	redirect('Admin');
    echo "<script>window.location='http://ccaindia.in/index.php/Admin';</script>";
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
						<img src="<?php echo base_url(); ?>Style/images/cca-logo.png" style="height:40px; width:40px;">
                        <span class="sc-hidden">
                            <span class="semi-bold">Admin Dashboard</span>
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
                            <span class="hidden-xs"> <?php echo $userdata->email;?> </span>
                            <b class="caret"></b>
                        </a>
                        <?php 
                               $sdata=$this->globaldata['userdata'];
                               
                               $unm=base64_encode($sdata->user_name);
                               $cnt=base64_encode($sdata->contact);
                               $email=base64_encode($sdata->uemail);
                               $pass=base64_encode($sdata->pass);
                               $website=base64_encode("http://localhost/cca/index.php/Admin/Smouser");
                               

                               

                        ?>
                        <ul class="dropdown-menu pull-right-xs">
                            <li class="arrow"></li>
                            <li class="divider"></li>
							<li><a href="<?php echo base_url(); ?>index.php/Admin/mail_configure">Mail Configuration</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/Logout/Admin_logout">Log Out</a></li>
                            <!--<li><a href="http://localhost/SocialMedia_RUN?unm=<?php  echo $unm; ?>&cont=<?php echo $cnt; ?>&email=<?php echo $email; ?>&pass=<?php echo rtrim($pass); ?>&web=<?php echo $website; ?>">SMO</a></li>-->
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
				<!--<li id="ThreeDiv">
                  <a href="#" title="Admin User">
                    <i class="fa fa-fw fa-caret-right"></i> Admin User
				  </a>
                </li>-->
				
			    <li id="ThreeDiv">
                  <a href="<?php echo base_url()."index.php/Admin/Meta" ?>" title="Admin User">
                    <i class="fa fa-fw fa-caret-right"></i> Meta Keywords
				  </a>
                </li>
				
              </ul>
				
            </li>
			
			<!--<li class="nav-dropdown">
                            <a href="<?php //echo base_url()."index.php/Admin/Edit_Image" ?>" title="Edit All Function Images">
                                <i class="fa fa-lg fa-fw fa-user"></i> Edit Images
                            </a>
           </li>-->
			            <li class="nav-dropdown" id="nuser">
                            <a href="<?php echo base_url()."index.php/Admin/create_user" ?>" title="News And Events">
                                <i class="fa fa-user"></i> Create User
                            </a>
                        </li>


						<li class="nav-dropdown" id="news">
                            <a href="<?php echo base_url()."index.php/Admin/News" ?>" title="News And Events">
                                <i class="fa fa-lg fa-fw fa-envelope"></i> News & Events
                            </a>
                        </li>
                        <li class="nav-dropdown" id="cour1">
                            <a href="<?php  echo base_url()."index.php/Admin/Course" ?>" title="CCA Courses">
                                <i class="fa fa-lg fa-fw fa-th-list"></i> Courses
                            </a>
                            
                         </li>
                       
						 <li class="nav-dropdown" id="book">
						 <a href="<?php echo base_url()."index.php/Admin/Book" ?>" title="Book">
							<i class="fa fa-lg fa-fw fa-file-image-o"></i>Book
						</a>	
						 </li>
                       
                       <li class="nav-dropdown" id="frr">
                            <a href="#" title="Franchisee">
                                <i class="fa fa-lg fa-fw fa-edit"></i>Active Franchisee
                            </a>
                             <ul class="nav-sub">
                            <li class="nav-dropdown" id="fli">
                            <a href="<?php echo base_url()."index.php/Admin/Franchisee"; ?>" title="Franchisee">
                                <i class="fa fa-fw fa-caret-right"></i> Franchisee List
                            </a>
                        </li>
                            <li class="nav-dropdown" id="fe">
                             <a href="<?php echo  base_url()."index.php/Admin/Active_Fran";?>" title="Active Franchisee">
                                <i class="fa fa-fw fa-caret-right"></i>Student Enquiry
                            </a>
                        </li>
                        <li class="nav-dropdown" id="fad">
                             <a href="<?php echo  base_url()."index.php/Admin/Fran_Admission"?>" title="Active Franchisee">
                                <i class="fa fa-fw fa-caret-right"></i>Admission
                            </a>
                        </li>




                    </ul>

                        </li>
						
							<li class="nav-dropdown"  id="enq">
                            <a href="#" title="Fron Enquiries">
                                <i class="fa fa-lg fa-fw fa-th-list"></i>Front Enquiry's
                            </a>
							 <ul class="nav-sub">
							<li class="nav-dropdown" id="se">
                            <a href="<?php echo base_url()."index.php/Admin/Student_Enquiry"; ?>" title="Student Enquiry">
                                <i class="fa fa-lg fa-fw fa-file-text"></i>Student Enquiry
                            </a>
                        </li>
						
						<li class="nav-dropdown" id="fee">
                            <a href="<?php echo base_url()."index.php/Admin/Fran_Enquiry";  ?>" title="Franchisee  Enquiry">
                                <i class="fa fa-lg fa-fw fa-file-text"></i>Franchisee Registration
                            </a>
                        </li>
						
						
						
						</ul>
						</li>
						
						
						<li class="nav-dropdown" id="dfrr">
                          
                            <a href="#" title="Franchisee">
                                <i class="fa fa-lg fa-fw fa-edit"></i>Demo Franchisee
                            </a>
                             <ul class="nav-sub">
                            <li class="nav-dropdown" id="flist">
                            <a href="<?php echo  base_url()."index.php/Admin/Demo_Fran_List"?>" title="Franchisee">
                                <i class="fa fa-fw fa-caret-right"></i> Franchisee List
                            </a>
                        </li>
                            <li class="nav-dropdown" id="dstud">
                             <a href="<?php echo  base_url()."index.php/Admin/Demo_Active_Fran" ?>" title="Active Franchisee">
                                <i class="fa fa-fw fa-caret-right"></i>Student Enquiry
                            </a>
                        </li>
                        <li class="nav-dropdown" id="dadd">
                             <a href="<?php echo base_url()."index.php/Admin/Demo_Fran_Admission" ?>" title="Active Franchisee">
                                <i class="fa fa-fw fa-caret-right"></i>Admission
                            </a>
                        </li>
                        
                        
                        <li class="nav-dropdown" id="dord">
                             <a href="<?php echo base_url()."index.php/Admin/Demo_Order" ?>" title="Active Franchisee">
                                <i class="fa fa-fw fa-caret-right"></i>Order
                            </a>
                        </li>
                    </ul>
                    </li>



					<li class="nav-dropdown" id="dfrr1">
					<a href="#" title="Order">
						 <i class="fa fa-lg fa-fw fa-edit"></i>Order
					</a>
					
					 <ul class="nav-sub">
						
						<li class="nav-dropdown" id="ord">
						<a href="<?php echo base_url()."index.php/Admin/Order";?>" title="Franchisee Order">
						<i class="fa fa-lg fa-fw fa-edit"></i>Franchisee Order
						</a>
						</li>

						<li class="nav-dropdown" id="ord1">
							<a href="<?php echo base_url()."index.php/Admin/Payment_History";?>" title="Payment History">
							<i class="fa fa-lg fa-fw fa-edit"></i>Payment History
							</a>
						</li>

		
					</ul>
					</li>
                        

                       

                        <li class="nav-dropdown" id="ord">
                             <a href="<?php echo base_url()."index.php/Admin/Adm_acc_history" ?>" title="Active Franchisee">
                                <i class="fa fa-lg fa-fw fa-edit"></i>Account History
                            </a>
                        </li>			
						
						<li class="nav-dropdown" id="emp1">
							<a href="<?php echo  base_url()."index.php/Admin/EmployeeEnq" ?>" title="Employee Enquiry">
								<i class="fa fa-lg fa-fw fa-edit"></i>Employee Enquiry
							</a>
						</li>
						
						
                           
						 <li class="nav-dropdown" id="jcard" >
                            <a href="<?php echo base_url(); ?>index.php/Admin/job_card" title="Association">
                                <i class="fa fa-lg fa-fw fa-file-text"></i> Job Card
                            </a>
                        </li>
						
						 
                        <li class="nav-dropdown" >
                            <a href="#" title="Association">
                                <i class="fa fa-lg fa-fw fa-file-text"></i> Association
                            </a>
                        </li>

                        <li class="nav-dropdown" id="downld">
                            <a href="<?php echo base_url(); ?>index.php/Admin/Adm_Download" title="Download">
                                <i class="fa fa-download"></i> Download
                            </a>
                        </li>
                        
						<!--<li class="nav-dropdown" id="order">
                            <a href="<?php echo base_url()."index.php/Admin/Order" ?>" title="Order">
                                <i class="fa fa-lg fa-fw fa-file-text"></i>Order
                            </a>
                        </li>-->
                     
						<li class="nav-dropdown" id="exm">
                            <a href="#" title="Exam Management">
                                <i class="fa fa-lg fa-fw fa-th-list"></i> Exam Management
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="<?php echo base_url()."index.php/Admin/Exam_Module" ?>" title="Exam Module">
                                        <i class="fa fa-fw fa-caret-right"></i> Exam Module
                                    </a>
                                </li>
                                <li id="pset">
                                       <a href="<?php echo  base_url()."index.php/Admin/Paper" ?>" title="Admin User">
                                        <i class="fa fa-fw fa-caret-right"></i> Set Paper
                                       </a>
                                </li>
                                <li id="pass">
                                    <a href="<?php echo base_url()."index.php/Admin/Pass_Student" ?>" title="Pass Student Result">
                                        <i class="fa fa-fw fa-caret-right"></i>Student Result
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Admin/create_cert" title="Failed Student Result">
                                        <i class="fa fa-fw fa-caret-right"></i>Generate Certificate
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/Admin/admin_exm_request" title=" Exam Password Request">
                                        <i class="fa fa-fw fa-caret-right"></i> Exam Password Request
                                    </a>
                                </li>

								 <li id="ActiveStud" class="nav-dropdown">
                                    <a href="<?php echo base_url(); ?>index.php/Admin/ActiveStud" title=" Exam Password Request">
                                        <i class="fa fa-fw fa-caret-right"></i> Active Student
                                    </a>
                                </li>

								
								
								
                                <li>
                                    <a href="http://cms.mavericksoftware.in/?id="1" title=" Exam Password Request">
                                        <i class="fa fa-fw fa-caret-right"></i> SMO
                                    </a>
                                </li>
                                  
                             </ul>
                        </li>
						
					 
                    </ul>
                   
                </nav>
            </aside>

<div class="page-content">
