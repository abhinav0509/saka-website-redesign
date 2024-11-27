<!DOCTYPE html>
<html lang="en">
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
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Dashboard </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url();?>assetss/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assetss/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assetss/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>assetss/css/custom.css">
  <!-- <script src="<?php echo base_url(); ?>Style/js/jquery-1.10.2.min.js"></script> -->
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
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url();?>assets/img/sakafavicon.ico'/>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
        <?php if($userdata->user_type=="Admin"){ ?>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <span class="badge headerBadge1">
                6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">John
                      Deo</span>
                    <span class="time messege-text">Please check your mail !!</span>
                    <span class="time">2 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Request for leave
                      application</span>
                    <span class="time">5 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                      Ryan</span> <span class="time messege-text">Your payment invoice is
                      generated.</span> <span class="time">12 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                      Smith</span> <span class="time messege-text">hii John, I have upload
                      doc
                      related to task.</span> <span class="time">30
                      Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                      Joshi</span> <span class="time messege-text">Please do as specify.
                      Let me
                      know if you have any query.</span> <span class="time">1
                      Days Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Client Requirements</span>
                    <span class="time">2 Days Ago</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                  </span> <span class="dropdown-item-desc"> Template update is
                    available now! <span class="time">2 Min
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
												fa-user"></i>
                  </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                      Sugiharto</b> are now friends <span class="time">10 Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i
                      class="fas
												fa-check"></i>
                  </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                    moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                      Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i
                      class="fas fa-exclamation-triangle"></i>
                  </span> <span class="dropdown-item-desc"> Low disk space. Let's
                    clean it! <span class="time">17 Hours Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
												fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Welcome to Otika
                    template! <span class="time">Yesterday</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <?php } ?>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?php echo base_url();?>uploads/Slider/logo.png" style="height:30px; width:80px;" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span>
          </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
            <?php if($userdata->user_type=="Admin"){ ?>
              <div class="dropdown-title">Hello Admin</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="<?php echo base_url(); ?>index.php/Admin/mail_configure"" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <?php } ?>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url(); ?>index.php/Logout/Admin_logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                LogOut
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="<?php echo base_url();?>uploads/Slider/logo.png" class="header-logo" /> <span
                class="logo-name">ADMIN</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="<?php echo base_url();?>index.php/Admin/Dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <?php if($userdata->user_type=="Admin"){ ?>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Home</span></a>
              <ul class="dropdown-menu">
              <li id="Habout">
                  <a class="nav-link" href="<?php echo base_url()."index.php/Admin/about"; ?>" title="About Us">
                     About Us
                  </a>
                </li>
                <li id="gallery">
                  <a class="nav-link" href="<?php echo base_url()."index.php/Admin/Gallery" ?>" title="Gallery">
                    Gallery
                   </a>
                </li>
                <li id="HExp">
                  <a class="nav-link" href="<?php echo base_url()."index.php/Admin/Testimonial" ?>" title="Testimonial">
                   Testimonial
				         </a>
                </li>
                <li id="HTitle">
                  <a href="<?php echo base_url()."index.php/Admin/state1" ?>" title="State Master">
                     State Master
                   </a>
                  </li>
                    <li id="ThreeDiv">
                      <a href="<?php echo base_url()."index.php/Admin/city1" ?>" title="City Master">
                      City Master
                  </a>
                </li>
              </ul>
              <li class="dropdown" id="blog">
                 <a href="<?php echo base_url()."index.php/Admin/Blog" ?>" title="Edit All Function Blog">
                 <i data-feather="plus-square"></i><span>Blog Details</span>
                 </a>
           </li>
             <li class="dropdown" id="nuser">
               <a href="<?php echo base_url()."index.php/Admin/create_user" ?>" title="User">
               <i data-feather="users"></i><span>Create User</span>
                  </a>
             </li>
             <li class="dropdown" id="news">
                <a href="<?php echo base_url()."index.php/Admin/News" ?>" title="News And Events">
                <i data-feather="clipboard"></i><span>News & Events</span>
                </a>
              </li>
              <li class="dropdown" id="img">
                <a href="<?php echo base_url()."index.php/Admin/Edit_Image" ?>" title="Edit All Function Images">
                <i data-feather="edit"></i><span>Edit Images</span>
                </a>
           </li>
            </li>
            <?php } ?>	           
          </ul>
        </aside>
      </div>