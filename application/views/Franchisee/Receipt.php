 <script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>       
 <script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
 <link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>  
 <script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
 <script src="<?php echo base_url();?>Style/dist/js/Jsfordatabindingteemp.js"></script>

<!-- Data Tables Style sheet -->

<style type="text/css">
.dataTables_paginate.paging_bootstrap {
    display: none;
}
.dataTables_info {
    display: none;
}
.dataTables_length {
    display: none;
}
.dataTables_filter {
    display: none;
}
table.table thead .sorting::before {
    content: "";
}
table.table thead .sorting_asc::before, table.table thead .sorting_asc_disabled::before {
    content: "";
}
table.table thead .sorting_desc::before, table.table thead .sorting_desc_disabled::before {
    content: "";
}
ul li{list-style: none;}
</style>
<!-- Data Table css End -->

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
        .alert {
    border: 1px solid transparent;
    border-radius: 4px;
    margin-bottom: 18px;
    padding: 3px;
}

</style>
<style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 5px 6px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}
table thead th{
  text-align: center;

  }
  td:hover{cursor: pointer;}
  td fa{cursor:pointer;}
  table tbody td{
  font-family: calibri;
  font-size: 13px;
  text-align: center;
}
table tbody td a:hover{
  text-decoration: none;
}
table tbody td{

    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.label {
    font-family: calibri;
    font-size: 12px;
    font-weight: 100;
    margin-top: -17px;
    padding: 4px 12px;
}
.unread{
  background-color: #f5f6f7;
}
.ui-menu-item {
    border-bottom: 1px solid #ccc;
    font-family: calibri;
    font-size: 12px !important;
    font-weight: 100 !important;
}
.modal-lg {
    width: 800px;
}
.alert-successs {
    background-color: #fff;
    border-color: #22ad5c;
    color: #000;
}
.alertt {
    padding: 3px;
    margin-bottom: 18px;
    border: 1px solid transparent;
    border-radius: 0px;
}
h3 {
    color: #fff;
    font-size: 19px;
    font-weight: normal;
    line-height: 20px;
    margin: -17px -16px 9px;
}
.thin {
    color: #fff;
    font-weight: 300;
}
.col-sm-7 h4{margin: 10px -17px;}
ul li{list-style: none;}
</style>

<script>
 var j=jQuery.noConflict(); 
  var city_id1="";
  var Frarr =[];
   j(document).ready(function(){
	  //alert("hhhhhh");
	   searchh(); 
	   search1();
 j("#alert").delay(3200).fadeOut(300);

    eachcheck('','loding');
  
   j("#home").addClass("open");
   j("#Habout").addClass("active open");
 
  

	j('#stu').val(j('#std').val());
  
	
  
  
    j('[data-rel=datepicker]').datepicker({
        autoclose: true,
        todayHighlight: true
    });

	 j('#cont').datepicker({
        autoclose: true,
        todayHighlight: true
    });

   j('#pcont').datepicker({
        autoclose: true,
        todayHighlight: true
    }); 

   j('#cont').val(j('#fromdt').val());
   j('#pcont').val(j('#todate').val());
	
	
    

    var Pageindex = j('#pindex').val();
    var rcount = j('#rcount').val();

   if(Pageindex == "")
    Pageindex = 1;

   if(rcount == "")
    rcount = 0;
  
  j(".Pager").ASPSnippets_Pager({
            ActiveCssClass: "current",
            PagerCssClass: "pager",
            PageIndex: parseInt(Pageindex),
            PageSize: 10,
            RecordCount: parseInt(rcount)

        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');          
            j('#pindex').val(pageindex);
			
			 j('#fromdt').val(j('#cont').val());
            j('#todate').val(j('#pcont').val());
			
            j('#hfield').submit();
   }); 




   
   });
   
</script>
<script>
function eachcheck(obj,Status){
   var ct =[];
   var results1=
   SDeachcheck({
      tbodyname: "tdata",            
      eachtitle: obj,  
      titlecheck : 'titlechk',
      clickstatus : Status,
      Hiddendata :  j("#storeArrayvalue").val()          
  });
     j("#storeArrayvalue").val(results1);     
     var results = j("#storeArrayvalue").val();     
     if(results != ""){
       ct=results.split(',');   
       var ottp="<i class='fa fa-check-square-o'></i>&nbsp;"+ct.length; 
       j('.label').html(ottp);
     }
     else
     {
       var ottp="<i class='fa fa-check-square-o'></i>&nbsp;"+0; 
       j('.label').html(ottp);
     }

}

 function clickAction(obj) {
    var dt =[];
    var t=j('#storeArrayvalue').val();
    dt=t.split(',');
  
    if(t!="")
    {
      j('#hfield').attr("action", "<?php echo base_url(); ?>/index.php/Notifications/del_Franch_enquiry_by_check?Action="+obj);
      j('#hfield').submit();
    }
    else if(t=="")
    {
     
       j('.alert1').show();
       var ottp="<strong>Please Select Record to perform operation</strong>";
       j('.alert1').html(ottp);
       j("#alert").delay(3200).fadeOut(300);

    } 

  }

function search_data()
{
			j("#std").val(j("#stu").val());
			j('#fromdt').val(j('#cont').val());
			j('#todate').val(j('#pcont').val());
			
           j('#pindex').val(1);
           j('#hfield').submit();

}
function searchh()
{
j("#sname").autocomplete({
              source: function (request, response) {
                  
                  j.ajax({
                      type: "POST",
                      //contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Receipt/get_stud_name",
                        data: { term: j("#sname").val()},
                        dataType: "json",

                      success: function (data) {
						  response(j.map(data, function (item) {
                              return {
								                  label: item.name,
                                  label1: item.tfee,// Name must be column name in table which you want to show Ex:- Username
                                  json: item
                              }
                          }))
                      },
                      error: function (result) {
                      }
                  });
              },
              searchh: function () { j(this).addClass('working'); },
              //open: function () { j(this).removeClass('working'); },
              minLength: 0,
              select: function (event, ui) {
                 j('#sname').val(ui.item.label);
                 j('#amt').val(ui.item.label1);                  
                  return false;
              }
          });
}




function search1()
{
j("#stu").autocomplete({
              source: function (request, response) {
                  
                  j.ajax({
                      type: "POST",
                      //contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Receipt/get_stud_name1",
                        data: { term: j("#stu").val()},
                        dataType: "json",

                      success: function (data) {
						  response(j.map(data, function (item) {
                              return {
								label: item.particular,// Name must be column name in table which you want to show Ex:- Username
                                  json: item
                              }
                          }))
                      },
                      error: function (result) {
                      }
                  });
              },
              searchh: function () { j(this).addClass('working'); },
              open: function () { j(this).removeClass('working'); },
              minLength: 0,
              select: function (event, ui) {
                 j('#stu').val(ui.item.label);                  
                 return false;
              }
          });
}


function Edit(obj1,id)	
{


    $('form').attr("action", "<?php echo base_url().'index.php/Receipt/Update_Receipt';?>");
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
	
     var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].id==id)
         {
          r=i;
         }
      }
   var dts=obj1[0][r].adate.split('-');
   var dts1=dts[2]+"/"+dts[1]+"/"+dts[0];
   
   j("#pcontt").val(dts1);
   j("#sname").val(obj1[0][r].particular);
   j("#amt").val(obj1[0][r].total_fee);   
   j("#camt").val(obj1[0][r].current_pay);   
   
     j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
     city_id1=obj1[0][r].city_id;
     j('#install option').each(function () {
           if (j(this).val() == obj1[0][r].installment) {
                j(this).attr('selected', 'selected');
            }
        });
     		
}


function Delete(id)
{
    
    if (confirm("Are you sure, you want to delete record?"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Receipt/Receipt_Delete',
            type: 'POST',
           data:{'id':id},
      
            success: function (data) {
            var obj=j.parseJSON(data);

          if(data)
				{
					window.location="<?php echo  base_url().'index.php/Franchisee/Receipt';?>"
				}
                    
            },
            error: function () {
                
            }
        });
}


 function open_det_popup(obj1,id)
 {
      j("#myenqModal").modal('show'); 
     
      var opt="";
      var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].id==id)
         {
          r=i;
         }  
      }
  
	var path="<?php echo base_url(); ?>Style/images/cca-logo.png";
  
   var dts=obj1[0][r].adate.split('-');
   var dts1=dts[2]+"/"+dts[1]+"/"+dts[0];

     
     opt +="<div class='panel-body' style='background-color:#00569d;box-shadow:0px 2px 4px #000'><div class='col-sm-4 text-center'>";
     opt +="<img alt='image' class='img-circle img-profile' style='height:100px;' src='"+path+"'></div>";
     opt +="<div class='col-sm-7 profile-details'><h3>College Of Computer Accountant</h3>";
     opt +="<h4 class='thin'></h4>";
     opt += "</div></div>";
     opt +="<div id='divToPrint' class='divToPrint' >";
     opt +="<div class='table-responsive' style='margin-bottom:50px;'>";
     opt +="<table border='1' style='width:500px;margin-left:auto;margin-right:auto;margin-top:50px;'>";
     opt +="<tr style='border:none;'>";
     opt +="<td colspan='3' style='text-align:center; border:1px solid;'>";
     opt +=" <b>Receipt<br>"+fname+"</b></td>";
     opt +="</tr>";

     opt +="<tr style='border:none;'>";
     opt +="<td style='text-align:center; border:1px solid;'>";
     opt +="Receipt Id</td>";
     opt +="<td style='text-align:center; border:1px solid;'>"+obj1[0][r].r_id+"</td>";
     opt +="</tr>";
     
     opt +="<tr style='border:none;'>";
     opt +="<td style='text-align:center; border:1px solid;'>";
     opt +="Date</td>";
     opt +="<td style='text-align:center; border:1px solid;'>"+dts1+"</td>";
     opt +="</tr>";

     opt +="<tr style='border:none;'>";
     opt +="<td style='text-align:center; border:1px solid;'>";
     opt +="Received From</td>";
     opt +="<td style='text-align:center; border:1px solid;'>"+obj1[0][r].particular+"</td>";
     opt +="</tr>";

     opt +="<tr style='border:none;'>";
     opt +="<td style='text-align:center; border:1px solid;'>";
     opt +="Amount</td>";
     opt +="<td style='text-align:center; border:1px solid;'>"+obj1[0][r].current_pay+"</td>";
     opt +="</tr>";

     opt +="<tr style='border:none;'>";
     opt +="<td style='text-align:center; border:1px solid;'>";
     opt +="Received By</td>";
     opt +="<td style='text-align:center; border:1px solid;'></td>";
     opt +="</tr>";

     opt +="</table><br>";
     
     opt +="</div></div></div>";
     opt +="<a class='btn btn-primary' style='margin-left:335px; margin-bottom:20px;' onclick='PrintDiv()'>";
     opt +="Print</a>";
                


     j("#fdetails").html(opt); 
   
   
 }

 function getval()
 {
    j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Receipt/Receipt_Delete',
            type: 'POST',
           data:{'id':id},
      
            success: function (data) {
                       
            }, 
            error: function () {
                
            }
        });
 }


</script>



  <script type="text/javascript">     
        function PrintDiv() {    
           var divToPrint = j('.divToPrint');
           var popupWin = window.open('', '_blank', 'width=300,height=300');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + j('.divToPrint').html() + '</html>');
            popupWin.document.close();
                }
     </script>

<div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Receipt</a></li>
                <li class="" id="t2"><a href="#tab1-2" data-toggle="tab"><i id="edit" class="fa fa-edit"></i> Add Receipt</a></li>
                <!--<li class="pull-right"><a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onclick="Download_pdf_all()" style="font-size:28px; height:0px; color:#FF3500;"></i></a></li>
                <li class="pull-right"><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onclick="Download_Excel_all()" style="font-size:28px; height:0px; color:#357ebd;"></i></a></li>-->
                <?php if(isset($message)) { ?>
                 <li class="pull-right">
                        
                        <div class="alert alert-success" id="alert">
                                    <strong><?php echo $message; ?></strong> 
                                </div>
                      
                 </li>
                 <?php } ?>
                 <li class="pull-right">
                        
                        <div class="alert1 alert alert-danger" id="alert" style="display:none;">
                                    
                        </div>                      
                 </li>
              </ul>
              <div class="tab-content">
			  
			  
			  
                <div class="tab-pane active" id="tab1-1">
                  
				  <div class="table-responsive" >
				  


     <div class="row">
             <div class="col-md-12" style="margin-bottom:36px;">
                  <?php 
                      $arr1=array();
                      $da1=date('Y/m/d');
                      $arr1 =explode("/",$da1); 
                      $arr1=array_reverse($arr1);
                      $str1 =implode($arr1,"/");
                  ?>
					<div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
        			             <input type="text" id="cont" name="searchid" class="form-control" data-rel="datepicker" value="<?php echo $str1; ?>" placeholder="Search From Date" required/>
        			             <div id="result"></div>
        				    </div>
        			      <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
        			           <input type="text" id="pcont" name="city1" class="form-control" data-rel="datepicker" placeholder="Search To Date" required/>
        			      </div>
				 
                   <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                      <input type="text"  id="stu" name="stu" class="form-control" value="" title="Pleas Select Publish date" placeholder="Search By Student" >
                  </div>                        
              
                  <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                    <a class="btn btn-primary" onclick="search_data()">
                        <i class="fa fa-search"></i> Search
                    </a>
                  </div>
                
            </div>
      </div>



				  <div class="row">
				   </div>
				  
                   <table id="table1" class="table">
                      <thead>
                          <tr style="background-color:#d7dadc;">
                          
                          <th width="1%">
                            <div class="btn-group btn-group-sm btn-group-text-normal ">
                             <span style="white-space: nowrap; background: #fff none repeat scroll 0 0; padding: 2px 9px 1px 10px;" >
                                <input type="checkbox" id="titlechk" onchange="eachcheck(this,'title')"  /> &nbsp;
                                <i class="fa fa-caret-down dropdown-toggle" data-toggle="dropdown" style="cursor:pointer"></i>
                                <ul class="dropdown-menu" role="menu">
                         <!--           <li><a href="javascript:;" onclick="clickpoup('All')">All</a></li>
                                    <li><a href="javascript:;" onclick="clickpoup('None')">None</a></li>-->
                                    <li><a href="javascript:;" onclick="eachcheck(this,'AllNone')">All None</a></li>                                   
                                    <li class="divider"></li>
                                    
                                    <li>
                                      <a title="" href="javascript:;" onclick="clickAction('Active')">
                                            <i class="fa fa-fw fa-caret-right"></i> Active
                                            <span class="label label-danger pull-right">New</span>
                                          </a>
                                  </li>
                                    <li>
                                        <a title="Analytics Overview" href="javascript:;" onclick="clickAction('Delete')">
                                            <i class="fa fa-fw fa-caret-right"></i> Delete
                                            <span class="label label-danger pull-right">New</span>
                                          </a>
                                     </li>
                                </ul>
                            </span> 
                             </div>
                           </th>
                          <th width="5%" class="thdesign">Date</th>
                          <th width="1%" class="thdesign">Receipt Id</th>
                          <th width="3%" class="thdesign">Student Name</th>
                          <th width="5%" class="thdesign">Installment</th>
                          <th width="5%" class="thdesign">Total Fee</th>
                          <th width="5%" class="thdesign">Current paid</th>
                          <th width="5%" class="thdesign">Action</th>
                          <!--<th width="5%" class="thdesign">Delete</th>-->
                        </tr>
                          </thead>
                        <script>
                            
                            var fname='<?php echo $userdata->institute_name?>';
                            var jArray=[];
                           jArray.push(<?php echo json_encode($results); ?>);
                        </script>
            <tbody id="tdata" style="font-size:12px;">
						      
					<?php 
					if(!empty($results)) { foreach($results as $row)
						{
					?>
                  <tr>
                 
                   <td><input type="checkbox" id="<?php echo $row->id; ?>" onchange="eachcheck(this,'subtitle');"  /></td>
                   <td><?php echo $row->adate ?></td>
                   <td><?php echo $row->r_id; ?></td>
                   <td><?php echo $row->particular; ?></td>
                   <td><?php echo $row->installment; ?></td>
                   <td><?php echo $row->total_fee; ?></td>
                   <td><?php echo $row->current_pay; ?></td>
					
					<td style="text-align:center"></a><i id="sign" style="font-size:20px; margin-right:0px;" onclick="open_det_popup(jArray,<?php echo $row->id; ?>)" class="fa fa-info-circle"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->id; ?>);" class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->id; ?>)" class="fa fa-trash-o"></i></td>
					<!--<td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php //echo $row->id; ?>);" class="fa fa-trash-o"></i></td>-->
      		      </tr>
					
                <?php } } else{ ?>
                     
                      <tr>
                   <td colspan="12">
                      <div class="alert alert-info">
                                <strong><?php echo "No todays enquiry found.....!";?></strong>
                      </div>
                  </td>
                 
                 </tr>

                      
                    <?php } ?>
                    </tbody>
                    </table>
                    <?php if(isset($links)) { ?>
                     <div id="links1" class="pager">
                      <?php echo $links; ?>
                    </div>
                    <?php } ?>
                    
                  </div>
				  
                </div>
                <div class="tab-pane" id="tab1-2">
          <form id="hfield" action="<?php echo base_url(); ?>index.php/Franchisee/Receipt" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
					<input type="hidden" name="std" id='std' value="<?php echo $dt['std']; ?>" />
					
					 <input type="hidden" name="fromdt" id='fromdt' value="<?php echo $dt['from_date']; ?>" />
                    <input type="hidden" name="todate" id='todate' value="<?php echo $dt['to_date']; ?>" />
					
						<input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />
                    <input type="hidden" id="storeArrayvalue" value="<?php if(isset($dt['storeArrayvalue'])){echo $dt['storeArrayvalue']; } ?>" name="storeArrayvalue"/> 
               </form>        

         <form id="formVideo" class="form-horizontal" role="form"  action="<?php echo base_url()."index.php/Receipt/Save_Data"; ?>"  enctype="multipart/form-data" method="post" name="frm">
            <div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Add Receipt</h4>
                     
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                        </div>		
					
					</div>
			
			
			<div class="panel-body">
			<div class="col-sm-6" style="margin-top:1%;">
          <input type="hidden" id="bid" name="bid" value="" />
          <input type="hidden" id="mid" name="mid" value="<?php echo $max_id; ?>"  />
                  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3"> Date<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                                <input type="text"  id="pcontt" name="pcontt" value="<?php echo $str1; ?>" class="form-control" required data-rel="datepicker" required title="Please Fill The Data">
                            
                            </div>
                  </div>

                  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3"> Select Installment<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                                <select name="install" id="install" class="form-control" required title="Please Select Item From List">
                                      <option value="">Select Installment</option>
                                      <option>First</option>
                                      <option>Second</option>
                                      <option>Third</option>
                                      <option>Fourth</option>  
                                </select>
                            </div>
                  </div>

                  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Current Paid<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                             <input type="text" id="camt" name="camt" class="form-control" required title="Please Fill The Current Paid Amount"/>
                            </div>
                  </div>

                                     
                           
                     
           </div>
	       
				   
				 
					
						<div class="col-sm-6" style="margin-top:1%;">
					
					
                  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Student Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                            <input type="text" id="sname" name="sname" class="form-control" required title="Please Select Student Name"/>
                            <div id="result"></div>
                            </div>
                  </div>                          
                  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Total Fees<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                             <input type="text" id="amt" name="amt" class="form-control" required/>
                            </div>
                  </div>
                             

		   
					
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
            
            </div>
                   
						<div class="panel-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" />
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" />
							                <input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel" />
                            </div>
                          </div>
						  </div>
						  
						  </div>
          </form>           
                </div>
              </div>
           </div>
     </div>
   </div>

        <div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myenqModal" class="modal fade in" > 
             <div  class="modal-dialog modal-lg" style="margin-top:154px;">
                 
                 <div class="modal-content login-social" style="">
                    
                          
    <div class="panel panel-default panel-profile-details" >
     
                
    <div class="panel-body" style="padding:0;height:150px;">

            <div class="col-md-12 col-lg-12" style="padding:0;">
                 <ul style="margin:0px;">
                   <li class="pull-right">
                        
                        <div class="alertt alert-successs" id="alert3">
                                    <strong>Student Receipt</strong> 
                                    <a data-dismiss="modal" href="#"><i class="fa fa-fw fa-times"></i></a>
                                </div>
                      
                 </li>
               </ul>
			    <div class="panel panel-default panel-profile-details" id="fdetails">
                    
                        
                </div>


            </div>   
     </div>
    </div>
  </div>         
 </div>
</div>