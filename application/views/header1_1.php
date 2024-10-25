<html>
<?php
$this->load->helper('url');
if(isset($userdata->email) && $userdata->user_type=="Admin")
{
    
}
else
{
    echo "<script>alert('Login First....!');</script>";
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

                 var tot_noti=(obj1.length)+(obj2.length)+(obj3.length)+(obj4.length);
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

 