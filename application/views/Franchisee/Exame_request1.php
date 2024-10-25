<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>  
<script src="<?php echo base_url();?>Style/try/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/try/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/> 

<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Style/css/jquery.multiselect.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>Style/js/jquery.multiselect.js"></script>
<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
<style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 4px 5px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}

table thead th{text-align: center; font-weight: normal; font-size: 12px; font-family: callibri; font-weight: normal;}

table tbody td{text-align: center;}

table tbody td{

    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.ui-multiselect {
  padding: 5px 0 7px 4px;
  text-align: left;
}
.ui-multiselect-header {
  margin-bottom: 3px;
  padding: 0px 0 0px 4px;
}
.ui-multiselect{width: 175px;}
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
var allobj1;
 var obj1;
 var an = 0;
 var sopt="1";
 var j=jQuery.noConflict();
  j(document).ready(function(){
  j("#exm_mg").addClass("active open");
  j("#exm_pass").addClass("active");
  j("#alert").delay(3200).fadeOut(300);
   
 
 });


</script>


<style>
 td p{
  text-align:justify;
  margin-right:12%;
   width:160px; 
   height: 150px;
   overflow-y: auto;
   }  
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 6px 5px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}
.table thead th{
  text-align: center;
}
.table tbody input
{
   text-align: center;
}
#vdata td{
  text-align: center;
}
.alert {
  padding: 6px;
  margin-bottom: -2px;
  border: 1px solid transparent;
  border-radius: 4px;
  margin-top: 6px;
}
</style>

  <div class="container-fluid-md">
     
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">Send Request</a></li>
                 <li id="t2" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Active List</a></li>
                   <?php if(isset($message)) { ?>
                 <li class="pull-right">
                        
                        <div class="alert alert-success" id="alert">
                            <strong><?php echo $message; ?></strong> 
                        </div>
                      
                 </li>
                 <?php } ?>
           </ul>
				<div class="">
              <div class="tab-content">
			  
			  
			  
                <div class="tab-pane active" id="tab1-1">
                 
				  <!--<div class="row">
               <?php 
                        $arr1=array();
                        $da1=date('Y/m/d');
                        $arr1 =explode("/",$da1); 
                        $arr1=array_reverse($arr1);
                        $str1 =implode($arr1,"/");
                    ?>
    				  <div class="col-md-12" style="margin-bottom:36px;">
        			      <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
        			             <input type="text" id="cont" name="searchid" class="form-control" data-rel="datepicker" value="<?php echo $str1; ?>" placeholder="Search From Date" required/>
        			             <div id="result"></div>
        				    </div>
        			      <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
        			           <input type="text" id="pcont" name="city1" class="form-control" data-rel="datepicker" placeholder="Search To Date" required/>
        			      </div>
        			      <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
        			          <input type="text" id="fran" name="fran" class="form-control" placeholder="Search By Franchisee" required/>
        			      </div>
        			      
                     <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                            <a class="btn btn-primary" onclick="search_data()">
                                <i class="fa fa-search"></i> Search
                            </a>
                    </div>
                    <div class="col-sm-3 pull-right" style="margin-top:0px;margin-bottom:-29px">
                      <ul>
                          <li class="pull-right"><a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onclick="Download_pdf_all()" style="font-size:28px; height:0px; color:#FF3500;"></i></a></li>
                          <li class="pull-right"><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onclick="Download_Excel_all()" style="font-size:28px; height:0px; color:#357ebd; margin-left:-70px;"></i></a></li>
                      </ul>
                  </div>
              </div>  
			    </div>-->
           <form id="formVideo" class="form-horizontal" action="<?php echo base_url()."index.php/Exame_req/Insert_request"; ?>"  enctype="multipart/form-data" method="post" name="frm">
           <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="5%">Student_id</th>
                          <th width="5%">Student Name</th>
                          <th width="5%">Exame Date</th>
                          <th width="5%">Course</th>
                          <th width="5%">Exam Module</th>                          
                        </tr>
                      </thead>
          
                      <tbody id="vdata" style="font-size:12px;">
                          <?php if(!empty($exame)) { foreach($exame as $exm){ ?>
                          <tr>
                          <td>
                             <input type="text" class="form-control" name="sid[]" value="<?php echo $exm['stud_id']; ?>" readonly="true" />
                          </td>
                          <td>
                             <input type="text" class="form-control" name="sname[]" value="<?php echo $exm['name']; ?>" readonly="true" /></td>
                          <td>
                             <input type="text" class="form-control" name="edate[]" value="<?php echo $exm['exame_date']; ?>" readonly="true" /></td>
                          <td>
                            
                             <input type="text" class="form-control" name="cname[]" value="<?php echo $exm['course_Name']; ?>" readonly="true"/></td> 
                           
                          </td>  
                          <td>
                           
                               <select name="modu[]" class="form-control" required title="Please Select Exame Module">
                                   <option value="">Select Modules</option>
                                     <?php foreach($modules as $m) {?>
                                     <option value="<?php echo $m['qid']; ?>"><?php echo $m['quiz_cat_name']; ?></option>
                                     <?php } ?>
                               </select>  
                          </td>

                          </tr> 
                         
                          <?php } }else{ ?>        
                          <tr>
                          <td colspan="10">
                          <div class="alert alert-info">
                                <strong><?php echo "No student record found.....!";?></strong>
                          </div>
                        </td>
                      </tr> 
                      <?php } ?>       
                      </tbody>
                    </table>
					
                  </div>

                          <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()"/>
                              <input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>
                             </div>
                          </div>
                </form>
            </div>
            
            

                <div class="tab-pane" id="tab1-2">
        <form id="hfield" action="<?php echo base_url(); ?>index.php/Franchisee/Book_Order" method="post">
                 
        </form>

         
               <input type="hidden" name="fid" value="" />
               <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="5%">Franchisee_Name</th>
                          <th width="5%">Student_Name</th>
                          <th width="5%">User Id</th>
                          <th width="5%">Password</th>
                          <th width="5%">Created Date</th>
                          <th width="5%">Valid Upto</th>                          
                        </tr>
                      </thead>
          
                      <tbody id="tdata" style="font-size:12px;">
                          <?php if(!empty($exame1)) {foreach($exame1 as $ex){ ?>
                          <tr>
                            <td><?php echo $ex['institute_name']; ?></td>
                            <td><?php echo $ex['stud_name']; ?></td>
                            <td><?php echo $ex['user_id']; ?></td>
                            <td><?php echo $ex['password']; ?></td>
                            <td><?php echo $ex['cr_dt']; ?></td>
                            <td><?php echo $ex['valid_upto'];?></td>
                          </tr>              
                          <?php } } ?>       
                      </tbody>
                    </table>
          
                  </div>
          <div id="links">
        </div>
						
						
						  <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="display:none;" id="prelbl">Image Preview
                            </label>
                            <div class="col-sm-8">
                              <img  src="" style="height:142px; width:100%; display:none;" id="photo"/>                                
                              </div>
                          </div>
                        </div>
						
						
						
                       
                        <!--<div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()"/>

							<input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>

                            </div>
                          </div>-->
               
                
                
                
                
                    
                </div>
               
              </div>
           </div>
		   
		 
     </div>
   </div>
  