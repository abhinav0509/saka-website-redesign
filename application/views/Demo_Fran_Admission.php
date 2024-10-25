<script src="<?php echo  base_url();?>Style/dist/js/Fran_Admission.js"></script>

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
    margin-bottom: 1px;
    padding: 4px;
}
</style>

<script>
 var j=jQuery.noConflict(); 
 var Frarr =[];
j(document).ready(function(){
    j("#dfrr").addClass("open");
    j("#dadd").addClass("active open"); 
change_noti_stat();
   
   j('#cont1').val(j('#fromdt').val());
   j('#pcont').val(j('#todate').val());
   j('#cou').val(j('#cr').val());
   j('#fran').val(j('#cent').val());

   var Pageindex = j('#pindex').val();
   var rcount = j('#rcount').val();

   if(Pageindex == "")
    Pageindex = 1;

  if(rcount == "")
    rcount = 0;

   
   CKEDITOR.replace('testo1');
   j('[data-rel=datepicker]').datepicker({
        autoclose: true,
        todayHighlight: true
    });
  
   

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
            j('#fromdt').val(j('#cont1').val());
           j('#todate').val(j('#pcont').val());
           j('#cr').val(j('#cou').val());
           j('#cent').val(j('#fran').val());


            j('#hfield').submit();

  });

    Searchh();
   

   /******************************  Date Wise Search ******************************************/
    j("#pcont").keypress(function(event){
       
         if(event.which == 13) { 
         
          j('#tdata').empty();
           j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Admin/Demo_Fran_Admission',
            type: 'POST',
            data:{'fdate':j('#cont1').val(),'todate':j('#pcont').val()},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                 alert(data);
                 for(i=0;i<obj.length;i++)
                 { 
                     j('#tdata').append("<tr id='B"+obj[i].id+"'><td>"+obj[i].id+"</td><td>"+obj[i].fran_Name+"</td><td>"+obj[i].name+"</td><td>"+obj[i].email+"</td><td>"+obj[i].course_Name+"</td><td><img id='img"+obj[i].id+"' src='<?php echo base_url() ?>uploads/Admission/"+obj[i].image+"' style='height:64px; width:70px;'/></td><td><a href='javascript:void(0);'><i class=\"fa fa-floppy-o\" onclick=\"Edit(jArray,"+obj[i].id+")\" style='margin-left:10px;font-size:20px;'></i></a></td><td><a href='javascript:void(0);' title='Download Pdf'><i class=\"fa fa-file-pdf-o\" onclick='Download_pdf("+obj[i].id+")' style='margin-left:10px;font-size:20px; color:#FF3500;'></i></a><a href='javascript:void(0);' title='Download Excel'><i class=\"fa fa-file-excel-o\" onclick=\"Download_Excel("+obj[i].id+",'"+obj[i].stud_name+"')\" style='margin-left:10px;font-size:20px;'></i></a></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='DeleteDB(" + obj[i].id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
                 }
        
            },
            error: function () {
                
            }
        });

      }
 
    });//Keypress

/******************************************************    End ********************************************/

   /******************************  Student Wise Search ******************************************/
    j("#fran").keypress(function(event){
         if(event.which == 13) { 
           j('#tdata').empty();
           j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Admin/Demo_Fran_Admission',
            type: 'POST',
            data:{'sname':j('#fran').val()},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                 alert(data);
                 for(i=0;i<obj.length;i++)
                 { 
                     j('#tdata').append("<tr id='B"+obj[i].id+"'><td>"+obj[i].id+"</td><td>"+obj[i].fran_Name+"</td><td>"+obj[i].name+"</td><td>"+obj[i].email+"</td><td>"+obj[i].course_Name+"</td><td><img id='img"+obj[i].id+"' src='<?php echo base_url() ?>uploads/Admission/"+obj[i].image+"' style='height:64px; width:70px;'/></td><td><a href='javascript:void(0);'><i class=\"fa fa-floppy-o\" onclick=\"Edit(jArray,"+obj[i].id+")\" style='margin-left:10px;font-size:20px;'></i></a></td><td><a href='javascript:void(0);' title='Download Pdf'><i class=\"fa fa-file-pdf-o\" onclick='Download_pdf("+obj[i].id+")' style='margin-left:10px;font-size:20px; color:#FF3500;'></i></a><a href='javascript:void(0);' title='Download Excel'><i class=\"fa fa-file-excel-o\" onclick=\"Download_Excel("+obj[i].id+",'"+obj[i].stud_name+"')\" style='margin-left:10px;font-size:20px;'></i></a></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='DeleteDB(" + obj[i].id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
                 }
        
            },
            error: function () {
                
            }
        });

      }
 
    });



});

function search_data()
{
    j('#pindex').val(1);
            j('#fromdt').val(j('#cont1').val());
           j('#todate').val(j('#pcont').val());
           j('#cr').val(j('#cou').val());
           j('#cent').val(j('#fran').val());
             j('#hfield').submit();
}

function eachcheck(obj,Status){
   $("#storeArrayvalue").val(
   SDeachcheck({
      tbodyname: "tdata",            
            eachtitle: obj,  
      titlecheck : 'titlechk',
      clickstatus : Status,
      Hiddendata :  $("#storeArrayvalue").val()          
  }));   
}


function change_noti_stat()
{
  j.ajax({
      url: '<?php echo base_url(); ?>index.php/Notifications/set_fran_stud_add_status',
      type: 'POST',
      data:{'status':"read"},
      success: function (data) {
        if(data)
        {
          // window.location="<?php echo base_url().'index.php/Admin/Student_Enquiry'; ?>"
        }
            },
            error: function () {
            }
        });
}

function Searchh() { 
       var j = jQuery.noConflict(); 
    
       j("#fran").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/DemoLogin/GetAdmissionData1",
                       data: { term: j("#fran").val()},
                      dataType: "json",
                       success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.fran_Name,
                                  json: item
                              }
                          }))
                      },
                      error: function (result) {
                      }
                  });
              },
              search: function () { j(this).addClass('working'); },
              open: function () { j(this).removeClass('working'); },
              minLength: 0,
              select: function (event, ui) {
                  j('#fran').val(ui.item.label);
                  return false;
              }
          });
}

function getcourse(str)
{

     j('#tdata').empty();
           j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Admin/Fran_Admission',
            type: 'POST',
            data:{'cname':str},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                // alert(data);
                 for(i=0;i<obj.length;i++)
                 { 
                     j('#tdata').append("<tr id='B"+obj[i].id+"'><td>"+obj[i].id+"</td><td>"+obj[i].fran_Name+"</td><td>"+obj[i].name+"</td><td>"+obj[i].email+"</td><td>"+obj[i].course_Name+"</td><td><img id='img"+obj[i].id+"' src='<?php echo base_url() ?>uploads/Admission/"+obj[i].image+"' style='height:64px; width:70px;'/></td><td><a href='javascript:void(0);'><i class=\"fa fa-floppy-o\" onclick=\"Edit(jArray,"+obj[i].id+")\" style='margin-left:10px;font-size:20px;'></i></a></td><td><a href='javascript:void(0);' title='Download Pdf'><i class=\"fa fa-file-pdf-o\" onclick='Download_pdf("+obj[i].id+")' style='margin-left:10px;font-size:20px; color:#FF3500;'></i></a><a href='javascript:void(0);' title='Download Excel'><i class=\"fa fa-file-excel-o\" onclick=\"Download_Excel("+obj[i].id+",'"+obj[i].stud_name+"')\" style='margin-left:10px;font-size:20px;'></i></a></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='DeleteDB(" + obj[i].id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
                 }
        
            },
            error: function () {
                
            }
        });
}

function search_data()
{
            
            j('#fromdt').val(j('#cont1').val());
            j('#todate').val(j('#pcont').val());
            j('#cr').val(j('#cou').val());
            j('#cent').val(j('#fran').val());

            j('#pindex').val(1);
            j('#formVideo').submit();


}
function Download_Excel(id,name)
 {
    
    window.location="<?php echo base_url(); ?>index.php/Admission/getadmissionsingleExcel?id="+id+"&"+"name="+name;
 }
 function Download_pdf(id)
 {
   
    window.location="<?php echo base_url(); ?>index.php/Admission/getadmissionsinglepdf?id="+id;
 }

 function get_pdf_by_Excell()
 {
    j("#from1").val(j("#cont1").val());
    j("#to1").val(j('#pcont').val());
    j("#crr1").val(j('#cou').val());
    j("#centt1").val(j('#fran').val());
	j("#storedArrayvalue1").val(j("#storeArrayvalue").val());
	j("#efield").submit();
   // window.location="<?php echo base_url(); ?>index.php/Admin/get_Excell_by_cat?fdate="+fdate+"&"+"todate="+todate+"&"+"cname="+cname+"&"+"sname="+sname;
 }
 function get_pdf_by_cat()
 {
   j("#from").val(j("#cont1").val());
    j("#to").val(j('#pcont').val());
    j("#crr").val(j('#cou').val());
    j("#centt").val(j('#fran').val());
	j("#storedArrayvalue").val(j("#storeArrayvalue").val());
	j("#pfield").submit();

    //window.location="<?php echo base_url(); ?>index.php/Admin/get_pdf_by_cat?fdate="+fdate+"&"+"todate="+todate+"&"+"cname="+cname+"&"+"sname="+sname;

 }







</script>
<script>
function Edit(obj1,id)
{
		
	$('form').attr("action", "<?php echo base_url().'index.php/Franchisee/Active_Fran_Update';?>");
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
    j('#sname').val(obj1[0][r].name);
    j('#eml').val(obj1[0][r].email);
    j('#add').val(obj1[0][r].add);
    j('#sname').val(obj1[0][r].name);
    j('#cont').val(obj1[0][r].contact);
    j('#state').val(obj1[0][r].state);
    j('#scity').val(obj1[0][r].city);
    j('#quali').val(obj1[0][r].qualification);
    j('#course').val(obj1[0][r].course_Name);
    j('#cname').val(obj1[0][r].fran_Name);
    j('#jdate').val(obj1[0][r].course_date);
    j('#btime').val(obj1[0][r].timing);

 
     j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
		
}

function Delete(id)
{
    //alert(id);
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/DemoLogin/Delete_Admission',
            type: 'POST',
           data:{'action':'delabt','id':id},
      
            success: function (data) {
                 data=data.replace(/"/g, '');
                if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/Demo_Fran_Admission'; ?>"
				}
        
            },
            error: function () {
                
            }
        });
}

 
function show(input) {
  if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function (e) {
  $('#photo').attr('src', e.target.result);
  $('#photo').show();
  }
  reader.readAsDataURL(input.files[0]);
  }
  }

 

</script>
<style>
 td p{
  text-align:justify;
  margin-right:12%;
   width:160px; 
   height: 60px;
   overflow-y: auto;
   width:12%;
   }  
   #DeleteN:hover{
    cursor: pointer;
   }
   #EditB{
    cursor: pointer;
   }
  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 8px 6px;
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
</style>
<div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab" onClick="abc1();">View Admission</a></li>
                <li class="" id="t2"><a href="#tab1-2" data-toggle="tab">Add Remark</a></li>
                <li class="pull-right"><a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onClick="get_pdf_by_cat()" style="font-size:28px; margin-left:10px; height:0px; color:#FF3500;"></i></a></li>
                <li class="pull-right"><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onClick="get_pdf_by_Excell()" style="font-size:28px; height:0px; color:#357ebd; margin-left:10px;"></i></a></li>
               </ul>
              <div class="tab-content">
			  
			  
			  
                <div class="tab-pane active" id="tab1-1">
                 
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
                 <input type="cont" id="cont1" name="cont1" class="form-control" data-rel="datepicker" value="<?php echo $str1; ?>" placeholder="Search From Date" required/>                
            </div>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                 <input type="pcont" id="pcont" name="pcont" class="form-control" data-rel="datepicker" placeholder="Search To Date" required/>           
            </div>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
              <select name="cou" id="cou" class="form-control">
                    <option value="">select Course</option>
                     <?php foreach($courses as $co) { ?>
                         
                         <option value="<?php echo $co->Course_Name; ?>"><?php echo $co->Course_Name; ?></option>
                      <?php } ?> 
              </select>
            </div>
              <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                  <input type="text" id="fran" name="fran" class="form-control" placeholder="Search By Center" required/>                
              </div>         
             <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                    <a class="btn btn-primary" onClick="search_data()">
                        <i class="fa fa-search"></i> Search
                    </a>
            </div>
            </div>
          </div>
				  <div class="table-responsive" >
				  
         		  
                  <table id="table-hidden-row-details"  class="table table-striped">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="1%;"></th>
                  <th width="1%">
                            <div class="btn-group btn-group-sm btn-group-text-normal ">
                             <span style="white-space: nowrap; background: #fff none repeat scroll 0 0;
    padding: 2px 9px 1px 10px;" >
                                <input type="checkbox" id="titlechk" onChange="eachcheck(this,'title')"  /> &nbsp;
                                <i class="fa fa-caret-down dropdown-toggle" data-toggle="dropdown" style="cursor:pointer"></i>
                               
                                <ul class="dropdown-menu" role="menu">
                         <!--           <li><a href="javascript:;" onclick="clickpoup('All')">All</a></li>
                                    <li><a href="javascript:;" onclick="clickpoup('None')">None</a></li>-->
                                     <li><a href="javascript:;" onClick="eachcheck(this,'AllNone')">All None</a></li>                                   
                                    <li class="divider"></li>
                                    <li ><a href="javascript:;" onClick="clickAction('1')">Active</a></li>
                                    <li><a href="javascript:;" onClick="clickAction('0')">Note Active</a></li>
                                    <li><a href="javascript:;" onClick="clickAction('Delete')">Delete</a></li>
                                </ul>
                            </span> 
                             </div></th>
                          <th width="1%">Stud Id</th>
                          <th width="10%" class="thdesign">Center Name</th>
                          <th width="10%" class="thdesign">Student Name</th>
                          <th width="5%">Stud Contact</th>
                          <th width="10%" class="thdesign">Stud Email-Id</th>
                          <th width="5%" class="thdesign">Course</th>
                          <th width="3%" class="thdesign">Batch Time</th>
                          <th width="5%" class="thdesign">Image</th>
                          <th style="display:none;"></th>
                          <th style="display:none;"></th>
                          <th style="display:none;"></th>
                          <th style="display:none;"></th>
                          <th style="display:none;"></th>
                          <th style="display:none;"></th>
                          
                         <th width="5%" class="thdesign">Remark</th>
                         <th width="10%" class="thdesign">Download</th>
                         <th width="1%" class="thdesign">Delete</th>

                        </tr>
                          </thead>
                       <script>
                            var jArray=[];
                           jArray.push(<?php echo json_encode($enquiry ); ?>);
                        </script>
            <tbody id="tdata" style="font-size:12px;">
            <?php
                  if(!empty($enquiry)) {foreach($enquiry as $row)
                  { ?>
                  <tr>
                  <td><i class="fa fa-plus"></i></td>
                  <td><input type="checkbox" id="<?php echo $row->id; ?>" onChange="eachcheck(this,'subtitle');"  /></td>
                  <td><?php echo $row->stud_id; ?></td>
                  <td><?php echo $row->fran_Name; ?></td>
                  <td><?php echo $row->name; ?></td>
                  <td><?php echo $row->contact; ?></td>
                  <td><?php echo $row->email; ?></td>
                  <td><?php echo $row->course_Name; ?></td>
                  <td><?php echo $row->timing; ?></td>
                  <td><img src="<?php echo base_url(); ?>uploads/Demo_Admission/<?php echo $row->image; ?>" style="height:64px; width:70px;"></img></td>
                 <td style="display:none;"><?php echo $row->add; ?></td>
                 <td style="display:none;"><?php echo $row->state; ?></td>
                 <td style="display:none;"><?php echo $row->city; ?></td>
                 <td style="display:none;"><?php echo $row->qualification; ?></td>
                 <td style="display:none;"><?php echo $row->exm_status; ?></td>
                 <td style="display:none;"><?php echo $row->course_date; ?></td>
                 <td><a href="javascript:void(0);"><i class="fa fa-floppy-o" onClick="Edit(jArray,'<?php echo $row->id; ?>')" style="margin-left:10px;font-size:20px;"></i></a></td>
                 <td><a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onClick="Download_pdf('<?php echo $row->id; ?>')" style="margin-left:10px;font-size:20px; color:#FF3500;"></i></a><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onClick="Download_Excel('<?php echo $row->id; ?>','<?php echo $row->name; ?>')" style="margin-left:10px;font-size:20px;"></i></a></td>
                  <td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onClick="Delete(<?php echo $row->id; ?>);" class="fa fa-trash-o"></i></td>
                 </tr>
            <?php } } else{  ?>
            <tr>
                  <td colspan="13">
                          <div class="alert alert-info">
                                <strong><?php echo "No todays enquiry found.....!";?></strong>
                          </div>
                        </td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                 <td style="display:none;"></td>
                 <td style="display:none;"></td>
                 <td style="display:none;"></td>
                 <td style="display:none;"></td>
                 <td style="display:none;"></td>
                 <td style="display:none;"></td>
                 <td style="display:none;"></td>
                 <td style="display:none;"></td>
                <td style="display:none;"></td>
                
                 </tr>
                      <?php } ?>
            </tbody>
                    </table>
                 
                 <?php if(isset($links)) { ?>
                  <div id="links1" class="pager">
                       <?php echo $links; ?>
                  </div>
                <?php }?>

                  
                  </div>
				
                </div>
                <div class="tab-pane" id="tab1-2">
         <form id="hfield" name="hfield" action="<?php echo base_url(); ?>index.php/Admin/Demo_Fran_Admission">
                  
            
            <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
            <input type="hidden" name="fromdt" id='fromdt' value="<?php echo $dt['from_date']; ?>" />
            <input type="hidden" name="todate" id='todate' value="<?php echo $dt['to_date']; ?>" />
            <input type="hidden" name="cr" id='cr' value="<?php echo $dt['course']; ?>" />
            <input type="hidden" name="cent" id='cent' value="<?php echo $dt['center']; ?>" />
             <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />
             <input type="hidden" id="storeArrayvalue" value="<?php if(isset($dt['storeArrayvalue'])){echo $dt['storeArrayvalue']; } ?>" name="storeArrayvalue"/> 
         </form>
		 <form id="pfield" name="hfield" method="post" action="<?php echo base_url(); ?>index.php/Admin/get_pdf_by_cat">
            <input type="hidden" name="from" id='from' value="" />
            <input type="hidden" name="to" id='to' value="" />
            <input type="hidden" name="crr" id='crr' value="" />
            <input type="hidden" name="centt" id='centt' value="" />
             <input type="hidden" id="storedArrayvalue" value="" name="storedArrayvalue"/> 
         </form>
		 
		 <form id="efield" name="hfield" method="post" action="<?php echo base_url(); ?>index.php/Admin/get_Excell_by_cat">
            <input type="hidden" name="from1" id='from1' value="" />
            <input type="hidden" name="to1" id='to1' value="" />
            <input type="hidden" name="crr1" id='crr1' value="" />
            <input type="hidden" name="centt1" id='centt1' value="" />
             <input type="hidden" id="storedArrayvalue1" value="" name="storedArrayvalue1"/> 
         </form>


         <form id="formVideo" class="form-horizontal" role="form"  action="<?php echo base_url()."index.php/Admin/Demo_Fran_Admission"; ?>"  enctype="multipart/form-data" method="post" name="frm">
            <div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Add Student Remark</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            
                        </div>
					
					
					</div>
			
			
			
			<div class="col-sm-6" style="margin-top:1%;"> 

			
			
           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="sname" name="sname" class="form-control" required/>
                            </div>
           </div>

            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Email<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="eml" name="eml" class="form-control" required/>
                            </div>
           </div>

           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Address<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="add" name="add" class="form-control" required/>
                            </div>
           </div>

           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Contact<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="cont" name="cont" class="form-control" required/>
                            </div>
           </div>

            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">State<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="state" name="state" class="form-control" required/>
                            </div>
           </div>

            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">City<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="scity" name="scity" class="form-control" required/>
                            </div>
           </div>


             <input type="hidden" id="bid" name="bid" value="" />
          
		 
           
                 
						
        </div>

        <div class="col-sm-6" style="margin-top:1%;"> 


          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Qualification<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="quali" name="quali" class="form-control" required/>
                            </div>
           </div>

           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Course<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="course" name="course" class="form-control" required/>
                            </div>
           </div>

            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Center Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="cname" name="cname" class="form-control" required/>
                            </div>
           </div>

           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Joining Date<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="jdate" name="jdate" class="form-control" required/>
                            </div>
           </div>

            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Batch Timing<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="btime" name="btime" class="form-control" required/>
                            </div>
           </div>



        </div>  

         <div class="col-sm-12">
             <div class="form-group">
               <label class="col-sm-2 control-label" for="inputPassword3">
                 Remark<span class="asterisk">*</span>
               </label>
               <div class="col-sm-9">
                 <textarea id="testo1" name="testo1" class="form-control" required>
                
                 </textarea>
                  
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