
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
<script>
 var j=jQuery.noConflict(); 
 var Frarr =[];
j(document).ready(function(){
   j("#frr").addClass("open");
   j("#fe").addClass("active open");
    CKEDITOR.replace('testo1');
   j('[data-rel=datepicker]').datepicker({
        autoclose: true,
        todayHighlight: true
    });

change_noti_stat();
     Search();
     Search1();   

eachcheck('','loding');
   j('#pcont1').val(j('#fromdt').val());
   j('#pcont').val(j('#todate').val());
   j('#state1').val(j('#fname').val());
   j('#state2').val(j('#cname').val());
    
  
  

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
            j('#fromdt').val(j('#pcont1').val());
            j('#todate').val(j('#pcont').val());
            j('#fname').val(j('#state2').val());
            j('#cname').val(j('#state1').val());


            j('#hfield').submit();

   });


j("#state1").keypress(function(event){
          if(event.which == 13) { 
          j('#tdata').empty();
           j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Admin/Active_Fran',
            type: 'POST',
            data:{'stud_name':j(this).val()},
      
            success: function (data) {
            //alert(data);
                 var obj = j.parseJSON(data);
                  //alert(obj);
                 for(i=0;i<obj.length;i++)
                 { 
                       //alert(obj[i].S_id);
                       j('#tdata').append("<tr id='B"+obj[i].id+"'><td>"+obj[i].id+"</td><td>"+obj[i].Franchisee_Name+"</td><td>"+obj[i].stud_name+"</td><td>"+obj[i].contact+"</td><td>"+obj[i].email+"</td><td>"+obj[i].course+"</td><td><a href='javascript:void(0);' title='Download Pdf'><i class=\"fa fa-file-pdf-o\" onclick='Download_pdf("+obj[i].id+")' style='margin-left:10px;font-size:20px; color:#FF3500;'></i></a><a href='javascript:void(0);' title='Download Excel'><i class=\"fa fa-file-excel-o\" onclick=\"Download_Excel("+obj[i].id+",'"+obj[i].stud_name+"')\" style='margin-left:10px;font-size:20px;'></i></a></td><td><a href='javascript:void(0);'><i class=\"fa fa-floppy-o\" onclick='Edit(jArray,"+obj[i].id+")' style='margin-left:10px;font-size:20px;'></i></a></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='DeleteDB(" + obj[i].id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
                 }
        
            },
            error: function () {
                
            }
        });

      }
 
    });//Keypress


j("#state2").keypress(function(event){
       
         if(event.which == 13) { 
          j('#tdata').empty();
           j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Admin/Active_Fran',
            type: 'POST',
            data:{'Franchisee_Name':j(this).val()},
      
            success: function (data) {
            //alert(data);
                 var obj = j.parseJSON(data);
                  //alert(obj);
                 for(i=0;i<obj.length;i++)
                 { 
                      j('#tdata').append("<tr id='B"+obj[i].id+"'><td>"+obj[i].id+"</td><td>"+obj[i].Franchisee_Name+"</td><td>"+obj[i].stud_name+"</td><td>"+obj[i].contact+"</td><td>"+obj[i].email+"</td><td>"+obj[i].course+"</td><td><a href='javascript:void(0);' title='Download Pdf'><i class=\"fa fa-file-pdf-o\" onclick='Download_pdf("+obj[i].id+")' style='margin-left:10px;font-size:20px; color:#FF3500;'></i></a><a href='javascript:void(0);' title='Download Excel'><i class=\"fa fa-file-excel-o\" onclick=\"Download_Excel("+obj[i].id+",'"+obj[i].stud_name+"')\" style='margin-left:10px;font-size:20px;'></i></a></td><td><a href='javascript:void(0);'><i class=\"fa fa-floppy-o\" onclick='Edit(jArray,"+obj[i].id+")' style='margin-left:10px;font-size:20px;'></i></a></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='DeleteDB(" + obj[i].id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
                 }
        
            },
            error: function () {
                
            }
        });

      }
 
    });//Keypress

    j("#pcont").keypress(function(event){
       
         if(event.which == 13) { 
          j('#tdata').empty();
           j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Admin/Active_Fran',
            type: 'POST',
            data:{'todt':j(this).val() ,'fdt':j('#pcont1').val()},
      
            success: function (data) {

            alert(data);
                 var obj = j.parseJSON(data);
                  //alert(obj);
                 for(i=0;i<obj.length;i++)
                 { 
                      j('#tdata').append("<tr id='B"+obj[i].id+"'><td>"+obj[i].id+"</td><td>"+obj[i].Franchisee_Name+"</td><td>"+obj[i].stud_name+"</td><td>"+obj[i].contact+"</td><td>"+obj[i].email+"</td><td>"+obj[i].course+"</td><td><a href='javascript:void(0);' title='Download Pdf'><i class=\"fa fa-file-pdf-o\" onclick='Download_pdf("+obj[i].id+")' style='margin-left:10px;font-size:20px; color:#FF3500;'></i></a><a href='javascript:void(0);' title='Download Excel'><i class=\"fa fa-file-excel-o\" onclick=\"Download_Excel("+obj[i].id+",'"+obj[i].stud_name+"')\" style='margin-left:10px;font-size:20px;'></i></a></td><td><a href='javascript:void(0);'><i class=\"fa fa-floppy-o\" onclick='Edit(jArray,"+obj[i].id+")' style='margin-left:10px;font-size:20px;'></i></a></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='DeleteDB(" + obj[i].id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
                 }
        
            },
            error: function () {
                
            }
        });

      }
 
    });//Keypress


   
   });
   
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
      url: '<?php echo base_url(); ?>index.php/Notifications/set_fran_stud_enq_status',
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


/******Search Start*****************/
function search_data()
{
            j('#fromdt').val(j('#pcont1').val());
           j('#todate').val(j('#pcont').val());
           j('#fname').val(j('#state1').val());
           j('#cname').val(j('#state2').val());
           j('#pindex').val(1);
           j('#hfield').submit();

};

   function Search() { 
       var j = jQuery.noConflict(); 
       j("#state1").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Franchisee/GetFranData",
                       data: { term: j("#state1").val()},
                      dataType: "json",
                       success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.stud_name,
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
                  j('#state1').val(ui.item.label);
                  return false;
              }
          });
}


 function Search1() { 
       var j = jQuery.noConflict(); 
       j("#state2").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Franchisee/GetFranData1",
                        data: { term: j("#state2").val()},
                        dataType: "json",
                       success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.Franchisee_Name,
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
                  j('#state2').val(ui.item.label);
                  return false;
              }
          });
}


   /*********Search End**************/
function Download_Excel(id,name)
 {
    
    window.location="<?php echo base_url(); ?>index.php/Franchisee/get_single_enquiry_excel?id="+id+"&"+"name="+name;
 }
 function Download_pdf(id)
 {
   
    window.location="<?php echo base_url(); ?>index.php/Franchisee/get_single_enquiry_pdf?id="+id;
 }
 function Download_Excel_all()
 {
    var fdate=j("#pcont1").val();
    var todate=j('#pcont').val();
    var fnm=j('#state2').val();
    window.location="<?php echo base_url(); ?>index.php/Franchisee/get_excel_by_cat?fdate="+fdate+"&"+"todate="+todate+"&"+"fnm="+fnm
 }
 function Download_pdf_all()
 {
    var fdate=j("#pcont1").val();
    var todate=j('#pcont').val();
    var fnm=j('#state2').val();

    window.location="<?php echo base_url(); ?>index.php/Franchisee/get_pdf_by_cat?fdate="+fdate+"&"+"todate="+todate+"&"+"fnm="+fnm
 }
 

</script>
<script>
function Edit(obj1,id)
{
	
	j('form').attr("action", "<?php echo base_url().'index.php/Franchisee/Active_Fran_enquiry_Update';?>");
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
      j('#nm').val(obj1[0][r].stud_name);
      j('#email1').val(obj1[0][r].Franchisee_Name);
      j('#pcontt').val(obj1[0][r].enq_date);
      j('#course').val(obj1[0][r].course);
      j('#testo').val(obj1[0][r].sadd);
      j('#cont').val(obj1[0][r].contact);
      j('#testo1').val(obj1[0][r].remark);
     j('#bid').val(id);

      var editor1 = CKEDITOR.instances.testo1;
      if( editor1.mode == 'wysiwyg' )
      {
       
            editor1.insertHtml(obj1[0][r].remark);
      }
     j("#UpdateBtn").hide();
     j("#CancelBtn").show();
     j("#SaveBtn").show();
		
}

function Delete(id)
{
    //alert(id);
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Franchisee/Delete_Enquiry_Data',
            type: 'POST',
           data:{'action':'delabt','id':id},
      
            success: function (data) {
                 data=data.replace(/"/g, '');
                if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/Active_Fran'; ?>"
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
<style>
 td p{
  text-align:justify;
  margin-right:12%;
   width:160px; 
   height: 150px;
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
</style>
<div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Enquiry</a></li>
                <li class="" id="t2"><a href="#tab1-2" data-toggle="tab">Add Remark</a></li>
              </ul>
              <div class="tab-content">
			  
			  
			  
                <div class="tab-pane active" id="tab1-1">
                 
				  <div class="table-responsive" >
				  
             <div class="row">
          <div class="col-md-12" style="margin-bottom:36px;margin-top:-8px;">
          <?php 
              $arr1=array();
              $da1=date('Y/m/d');
              $arr1 =explode("/",$da1); 
              $arr1=array_reverse($arr1);
              $str1 =implode($arr1,"/");
          ?>
          <span class="col-sm-2" style="width:3.667%;">From</span>
        <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
            <input type="text"  id="pcont1" name="pcont1" class="form-control" value="<?php echo $str1; ?>" title="Pleas Select Publish date" data-rel="datepicker" placeholder="Search From Date" >
            </div>
            <span class="col-sm-2" style="width:0.667%;">To</span>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
            <input type="text"  id="pcont" name="pcont" class="form-control" title="Pleas Select Publish date" data-rel="datepicker" placeholder="Search To Date">
            </div>


         
          <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
            <input type="text" id="state2" name="state2" class="form-control" placeholder="Search By Franchisee Name"/>
            </div>

            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
            <input type="text" id="state1" name="state1" class="form-control" placeholder="Search By Student Name"/>
            </div>

            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                    <a class="btn btn-primary" onclick="search_data()">
                        <i class="fa fa-search"></i> Search
                    </a>
            </div>
            <div class="col-sm-2 pull-right" style="margin-top:0px;margin-bottom:-29px">
                      <ul style="list-style:none;">
                          <li class="pull-right"><a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onclick="Download_pdf_all()" style="font-size:28px; height:0px; color:#FF3500;"></i></a></li>
                          <li class="pull-right"><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onclick="Download_Excel_all()" style="font-size:28px; height:0px; color:#357ebd; margin-left:-70px;"></i></a></li>
                      </ul>
                  </div>
            </div>
          </div>



				  <div class="row">
				   </div>
				  
                   <table id="table-hidden-row-details" class="table table-striped">
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
                                    <li ><a href="javascript:;" onclick="clickAction('1')">Active</a></li>
                                    <li><a href="javascript:;" onclick="clickAction('0')">Note Active</a></li>
                                    <li><a href="javascript:;" onclick="clickAction('Delete')">Delete</a></li>
                                </ul>
                            </span> 
                             </div>
                          </th>                          
                          <th width="1%" class="thdesign">Id</th>
                          <th width="7%" class="thdesign">Franchisee Name</th>
                          <th width="7%" class="thdesign">Student Name</th>
                          <th width="3%" class="thdesign">Stud Contact</th>
                          <th width="4%" class="thdesign">Student Email-Id</th>
            						  <th width="4%" class="thdesign">Intrested Course</th>
                          <th width="2%" class="thdesign">Download</th>
                          <th width="2%" class="thdesign">Remark</th>
            						  <th style="display:none">State</th>
            						  <th style="display:none">City</th>
            						  <th style="display:none">Admin Remark</th>
            						  <th style="display:none">Sug. Fees</th>
            						  <th style="display:none">Sug. Batch Date </th>
            						  <th style="display:none">Counselor Name</th>
                          <th style="display:none">Counselor Contact</th>
						            
                          <th width="1%" class="thdesign">Delete</th>
						  
                        </tr>
                          </thead>
                        <script>
                            var jArray=[];
                           jArray.push(<?php echo json_encode($enquiry ); ?>);
                        </script>
            <tbody id="tdata" style="font-size:12px;">
						<?php
      					if(!empty($enquiry)){	foreach($enquiry as $row)
      						{ ?>
      						<tr>
                  <td><input type="checkbox" id="<?php echo $row->id; ?>" onchange="eachcheck(this,'subtitle');"  /></td> 
      						<td><?php print $row->id; ?></td>
      						<td><?php echo $row->Franchisee_Name; ?></td>
      						<td><?php echo $row->stud_name; ?></td>
      						<td><?php echo $row->contact; ?></td>
      						<td><?php echo $row->email; ?></td>
							    <td><?php echo  $row->course;?></td>
                  <td><a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onclick="Download_pdf('<?php echo $row->id; ?>')" style="margin-left:10px;font-size:20px; color:#FF3500;"></i></a><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onclick="Download_Excel('<?php echo $row->id; ?>','<?php echo $row->stud_name; ?>')" style="margin-left:10px;font-size:20px;"></i></a></td>
                  <td><a href="javascript:void(0);"><i class="fa fa-floppy-o" onclick="Edit(jArray,'<?php echo $row->id; ?>')" style="margin-left:10px;font-size:20px;"></i></a></td>
							    <td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->id; ?>);" class="fa fa-trash-o"></i></td> 
                  <td style="display:none;"><?php echo  $row->state;?></td>
    							<td style="display:none;"><?php echo  $row->city;?></td>
    							<td style="display:none;"><?php echo  $row->remark;?></td>
    							<td style="display:none;"><?php echo  $row->sfees;?></td>
    							<td style="display:none;"><?php echo  $row->sdate;?></td>
    							<td style="display:none;"><?php echo  $row->con_name;?></td>
                  <td style="display:none;"><?php echo  $row->con_contact;?></td>

      						<!--<td><img src="<?php //echo base_url(); ?>uploads/About/<?php //echo $row->image; ?>" style="height:150px; width:157px;"></img></td>-->
									
      						
							</tr>
						<?php } }else{ ?>
                 
                  <tr>
                   <td colspan="9">
                          <div class="alert alert-info">
                                <strong><?php echo "No todays enquiry found.....!";?></strong>
                          </div>
                        </td>
                  <td style="display:none"></td>
                  <td style="display:none"></td>
                  <td style="display:none"></td>
                  <td style="display:none"></td>
                  <td style="display:none"></td>
                  <td style="display:none"></td>
                  <td style="display:none"></td>
                  <td style="display:none"></td>
                  <td style="display:none"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>

                  <!--<td><img src="<?php //echo base_url(); ?>uploads/About/<?php //echo $row->image; ?>" style="height:150px; width:157px;"></img></td>-->
                  
                  
              </tr>

                  
                    <?php }  ?>
                    </tbody>
                    </table>
                     <?php if(isset($links)) { ?>
                     <div id="links" class="pager">
                     
                      <?php echo $links; ?>
                    </div>
                    <?php } ?>
                   
                  </div>
				
                </div>
                 <div class="tab-pane" id="tab1-2">
        <form id="hfield" action="<?php echo base_url(); ?>index.php/Admin/Active_Fran" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
                    <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />

                    <input type="hidden" name="fromdt" id='fromdt' value="<?php echo $dt['from_date']; ?>" />
                    <input type="hidden" name="todate" id='todate' value="<?php echo $dt['to_date']; ?>" />
                    <input type="hidden" name="fname" id='fname' value="<?php echo $dt['frname']; ?>" />
                    <input type="hidden" name="cname" id='cname' value="<?php echo $dt['stname']; ?>" />
                    <input type="hidden" id="storeArrayvalue" value="<?php if(isset($dt['storeArrayvalue'])){echo $dt['storeArrayvalue']; } ?>" name="storeArrayvalue"/> 
        </form>


         <form id="formVideo" class="form-horizontal" role="form"  action="<?php echo base_url()."index.php/Franchisee/Daily_Enquiry_Save"; ?>"  enctype="multipart/form-data" method="post" name="frm">
            <div class="panel panel-default">
                    <div class="panel-heading">
          
          <h4 class="panel-title">Add Enquiry</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            <!--<a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>-->
                        </div>
          
          
          </div>
      
      
      
      <div class="col-sm-6" style="margin-top:1%;">
           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Student Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="nm" name="nm" class="form-control" required/>
                            </div>
           </div>
              
              <input type="hidden" id="bid" name="bid" value="" />
              
         <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Enquiry Date<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                            <input type="text"  id="pcontt" name="pcontt" class="form-control" title="Pleas Select Publish date" data-rel="datepicker" >
                            
                            </div>
           </div>
       
       
       
       <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Address<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <textarea id="testo" name="testo" rows="3" cols="34" ></textarea>
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
          
            <div class="col-sm-6" style="margin-top:1%;">
          
          
       
       <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Franchisee<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="email1" name="email1" class="form-control" required/>
                            </div>
           </div>
       
            
        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Intrestes Courses<span class="asterisk">*</span>
                          </label>
                        <div class="col-sm-8">
                          <input type="text" id="course" name="course" class="form-control" required/>
                           
                      </div>
           </div>
            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Contact No<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="cont" name="cont" class="form-control" value="<?php echo date('Y-m-d'); ?>" required/>
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