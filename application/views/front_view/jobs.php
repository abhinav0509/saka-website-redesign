
<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/> 
<script type="text/javascript">
$(document).ready(function(){
    $("#about").removeClass("active");
    $("#home").removeClass("active");
    $("#course").removeClass("active");
    $("#placement").addClass("active");
    $("#studmnu").removeClass("active");
    $("#franmnu").removeClass("active");
    $("#brandmnu").removeClass("active");
    $("#galmnu").removeClass("active");
    $("#cntmnu").removeClass("active");
 });   
</script>
<style>
#accordion{ border: 0px solid #CCCCCC;}
.accord{border:1px solid #CCC;}
.table-responsive {
    padding-left: 2px;
    padding-right: 10px;
}
.panel-body{padding-left:10px;}
</style>

<style>
 .pager
        {
            height: 18px;
            margin: 16px;
        }
        .pager .page
        {
            cursor: pointer;
            border: 1px solid;
            margin: 3px;
            padding: 5px;
            background: #E8EEF4;
        }
        .pager .page:hover
        {
            cursor: pointer;
            border: 1px solid #1a0f49;
            margin: 3px;
            padding: 5px;
            background: #253544;
            color: #fff;
        }
        
        .pager span
        {
            cursor: pointer;
            border: 1px solid #1a0f49;
            margin: 3px;
            padding: 5px;
            background: #253544;
            color: #fff;
        }

</style>
<script type="text/javascript">
var j=jQuery.noConflict();
  j(document).ready(function(){
var Pageindex = j('#pindex').val();
   var rcount = j('#rcount').val();

   if(Pageindex == "")
    Pageindex = 1;

  
  j(".Pager").ASPSnippets_Pager({
            ActiveCssClass: "current",
            PagerCssClass: "pager",
            PageIndex: parseInt(Pageindex),
            PageSize: 5,
            RecordCount: parseInt(rcount)
        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');
			 j('#pindex').val(pageindex);
             j('#hfield').submit();

   });
  });
</script>




<!-- page title Start -->
<div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
    <div class="container">
      <div class="lms_title">Current Job Openings</div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">New Jobs</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- page title end --> 

<!--main container start-->
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-2">
      <div class="lms_title_center">
        <div class="lms_heading_1">
          <h2 class="lms_heading_title">Current Job Openings</h2>
        </div>
        
      </div>
    </div>
  </div>
  
  
  <div class="row">
    <div class="col-lg-8">
      <div class="panel-group" id="accordion">
	  <form action="<?php echo base_url();?>index.php/welcome/jobs" id="hfield" method="post">
	  
	    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
        <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />
	 </form> 
	  <!---------------Start------------------>
		<?php 
		if(!empty($results)){foreach($results as $row)
		{
		?>
        <div class="panel panel-default"">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?php echo $row->cname; ?></a> </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
            <div id="33" class="panel-collapse in" style="height: auto;">
                <div class="panel-body">
                    <!--Start-->         
                    <div class="table-responsive">
                        <table id="ProductDa" class="table table-hover table-bordered" name="table">
                            <thead style="background-color:#3678B2;color:#FFF;">
                                <tr align="left">
									<th style="text-align:center;">Logo</th>
									<th style="text-align:center;">Company Name</th> 
									<th style="text-align:center;">Job Description</th> 
									<th style="text-align:center;">Date</th>      
									<th style="text-align:center;">Vacancy</th>
								</tr>
                            </thead>
                            <tbody>      
                            <tr align="center">                               
								<td>
									<?php if($row->image!=""){ ?>
									<img src="<?php echo base_url(); ?>uploads/Emp/<?php echo $row->image; ?>" style="height:60px; width:60px;margin-left:-49px;margin-right:-49px;"></img>
									<?php }else{ echo ""; } ?>
								</td>
								<td><?php echo $row->cname; ?></td>
								<td><?php echo $row->description; ?></td>
								<td><?php $st=$row->edate; 
									$arr =explode("-",$st); 
									$arr=array_reverse($arr);
									$str =implode($arr,"-");
									$str1=str_replace("-","/",$str);
									echo $str1;
								?></td>
								<td><?php echo $row->vacancy; ?></td> 
                            </tr>
                                     
                              </tbody>
                          </table>
                        </div>
                           
                    <!--End-->          
                              
                              
                      </div>
                    </div>
          </div>
        </div>
		<?php  }} else { ?>

				 <div class="alert alert-success" id="alert1">
                <strong>No Data Available.</strong> 
				</div>
		<?php } ?>
		
		
					<div id="links" class="Pager">
							<?php echo "Select Record"; ?>
							<?php echo $links; ?>
					</div>
<!----------------------End----------------------->
		
					
		
		
		
		
		
        
      </div>
    </div>
  
  
  
  <div  class="col-lg-4 ">
         <div  style="border:#CCCCCC 1px solid;"class="lms_sidebar_item">
            
                <div class="panel panel-default">
                 <div class="panel-heading">
                    <h4 class="panel-title"> <a href="#"> Recent News </a> </h4>
                  </div>
                 <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                     <div class="lms_sidebar_rp"> 
                      <marquee direction="up" scrollamount="3" onMouseOver="this.stop();" onMouseOut="this.start();"  height="250px" >
                        <ul>
                       
                         <li> <!--<a href="#"> <img src="images/sidebar/recent_post1.jpg" alt=""/>-->
                           <p style="padding-left:10px; text-align:justify;padding-right:10px; font-family:calibri;">HURRAY!!!! FREE TRAINING !! Presents 7 Days FREE Training on Tally.ERP 9 <br/>Day /Date: 1st Oct...<br/><div class="read"><a href="#">Read More → </a></div></p>
                            </li>
                         <li> <!--<a href="#"> <img src="images/sidebar/recent_post2.jpg" alt=""/>-->
                           <p style="padding-left:10px; padding-right:10px; font-family:calibri;">Advanced Excel Corporate Training For Company Employee/Professionals/Students. Training On: Advanced Excel 2010<br/> Duration : 15 Days Program, 1... <br/><div class="read"><a href="#">Read More → </a></div>
 </p>
                            </li>
                         <li> <!--<a href="#"> <img src="images/sidebar/recent_post3.jpg" alt=""/>-->
                           <p style="padding-left:10px; text-align:justify;padding-right:10px;font-family:calibri;">HURRAY!!!!  FREE TRAINING !! Presents 7 Days FREE Training on Tally.ERP 9 <br/>Day /Date: 1st Oct... <br/><div class="read"><a href="#">Read More → </a></div></p>
                           </li>
                           
                       </ul>
                       </marquee>
                      </div>
                   </div>
                  </div>
               </div>
               </div>
			   
			   
			   
			   
               </div>
       </div>
</div>

<!--main container end-->