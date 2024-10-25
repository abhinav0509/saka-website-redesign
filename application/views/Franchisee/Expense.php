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
  padding: 6px 8px;
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

   change_noti_stat();
    eachcheck('','loding');
  
   j("#home").addClass("open");
   j("#Habout").addClass("active open");
 
  
	j('#pcont1').val(j('#fromdt').val());
    j('#pcont').val(j('#todate').val());
   
    j('[data-rel=datepicker]').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    

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
            PageSize: 2,
            RecordCount: parseInt(rcount)

        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');
          
            j('#pindex').val(pageindex);
            //j('#fromdt').val(j('#pcont1').val());
             //j('#todate').val(j('#pcont').val());
             //j('#s').val(j('#stu').val());
             //j('#c').val(j('#cou').val());


            j('#hfield').submit();

   }); 

   j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master',
          type: 'post',
          data: {'action': 'Country'},
          success: function(data) {
           
           var obj = j.parseJSON(data);
           j('#stat1').append("<option value=''>Select</option>");
         
           for(i=0;i<obj.length;i++)
              { 
                j('#stat1').append("<option value=\""+obj[i].state_id+"\">"+obj[i].name+"</option>");
                
               }
               
           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      }); 
       
       j('#stat1').change(function(){
         j('#city').empty();
         j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/getcity',
          type: 'post',
          data: {'cntid':j(this).val()},
          success: function(data, status) {
           var obj = j.parseJSON(data);
           j('#city').append("<option value=''>Select</option>");
          
           for(i=0;i<obj.length;i++)
              { 
                j('#city').append("<option value=\""+obj[i].city_id+"\">"+obj[i].name+"</option>");
              }
              citychange();           
           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      }); 
});

/******************************  Date Wise Search ******************************************/
    j("#pcont").keypress(function(event){
       
         if(event.which == 13) { 
         
          j('#tdata').empty();
           j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Franchisee/Daily_Enquiry',
            type: 'POST',
            data:{'todt':j(this).val() ,'fdt':j('#pcont1').val()},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                  //alert(obj);
                 for(i=0;i<obj.length;i++)
                 { 
                      //j('#tdata').append("<tr id='B"+obj[i].id+"'><td>"+obj[i].id+"</td><td>"+obj[i].Franchisee_Name+"</td><td>"+obj[i].stud_name+"</td><td>"+obj[i].contact+"</td><td>"+obj[i].email+"</td><td>"+obj[i].course+"</td><td><a href='javascript:void(0);' title='Download Pdf'><i class=\"fa fa-file-pdf-o\" onclick='Download_pdf("+obj[i].id+")' style='margin-left:10px;font-size:20px; color:#FF3500;'></i></a><a href='javascript:void(0);' title='Download Excel'><i class=\"fa fa-file-excel-o\" onclick=\"Download_Excel("+obj[i].id+",'"+obj[i].stud_name+"')\" style='margin-left:10px;font-size:20px;'></i></a></td><td><a href='javascript:void(0);'><i class=\"fa fa-floppy-o\" onclick='Edit(jArray,"+obj[i].id+")' style='margin-left:10px;font-size:20px;'></i></a></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='DeleteDB(" + obj[i].id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
                 }
        
            },
            error: function () {
                
            }
        });

      }
 
    });//Keypress

/******************************************************    End ********************************************/

/******************************************************  Student Wise Search ******************************/
      j("#state1").keypress(function(event){
          if(event.which == 13) { 
          j('#tdata').empty();
           j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Franchisee/Daily_Enquiry',
            type: 'POST',
            data:{'stud_name':j(this).val()},
      
            success: function (data) {
            
                 var obj = j.parseJSON(data);                
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

/***************************************************************  End  *****************************************************/
   
   });
   
</script>
<script>
function change_noti_stat()
{
  j.ajax({
      url: '<?php echo base_url(); ?>index.php/Notifications/fran_stud_enq_status',
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
			j('#fromdt').val(j('#pcont1').val());
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
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Receipt/get_stud_name",
                        data: { term: j("#sname").val()},
                        dataType: "json",

                      success: function (data) {
						  response(j.map(data, function (item) {
                              return {
								label: item.sname,// Name must be column name in table which you want to show Ex:- Username
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
                 j('#sname').val(ui.item.label);                  
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
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Receipt/get_stud_name1",
                        data: { term: j("#stu").val()},
                        dataType: "json",

                      success: function (data) {
						  response(j.map(data, function (item) {
                              return {
								label: item.sname,// Name must be column name in table which you want to show Ex:- Username
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
    var course=j('#cou').val();
    var stud=j('#stu').val();
    window.location="<?php echo base_url(); ?>index.php/Franch_enquiery_excel/get_enquiry_Excell?fdate="+fdate+"&"+"todate="+todate+"&"+"course="+course+"&"+"stud="+stud
 }
 function Download_pdf_all()
 {
    var fdate=j("#pcont1").val();
    var todate=j('#pcont').val();
    var course=j('#cou').val();
    var stud=j('#stu').val();
    window.location="<?php echo base_url(); ?>index.php/Franch_enquiery_excel/get_enquiry_pdf?fdate="+fdate+"&"+"todate="+todate+"&"+"course="+course+"&"+"stud="+stud
 }

function Edit(obj1,id)	
{


    $('form').attr("action", "<?php echo base_url().'index.php/Expense/Update_Expense';?>");
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
   j("#parti").val(obj1[0][r].particular);
   j("#pcontt").val(obj1[0][r].adate);
   j("#naration").val(obj1[0][r].narration);
   j("#amout").val(obj1[0][r].current_pay);   
 
	   j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
     
		
}


function Delete(id)
{
    //alert(id);
    if (confirm("Are you sure, you want to delete record?"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Expense/Expense_Delete',
            type: 'POST',
           data:{'id':id},
      
            success: function (data) {
                //alert(data);
				alert("Record Deleted Successfully..");
				window.location="<?php echo base_url().'index.php/Franchisee/Expense'; ?>"
                if(data)
				{
				//window.location="<?php //echo base_url().'index.php/Admin/about'; ?>"
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

function add_admission(str)
{
    if(str!=="Inactive")
    {
        if (confirm("Are you sure, you want to Convert it in Admission?"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Franchisee/conver_to_admission',
            type: 'POST',
           data:{'id':str},
      
            success: function (data) {
                //alert(data);
        alert("Converted To Admission Successfully..");
        window.location="<?php echo base_url().'index.php/Franchisee/Daily_Enquiry'; ?>"
                if(data)
        {
        //window.location="<?php //echo base_url().'index.php/Admin/about'; ?>"
        }
        
            },
            error: function () {
                
            }
        });

    }
}

</script>


<style>
 
</style>
<div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Expense</a></li>
                <li class="" id="t2"><a href="#tab1-2" data-toggle="tab"><i id="edit" class="fa fa-edit"></i> Add Expense</a></li>
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
                 
                   <!---<div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                      <input type="text"  id="stu" name="stu" class="form-control" value="" title="Pleas Select Publish date" placeholder="Search By Student" >
                  </div>-->  
					<div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                    <input type="text"  id="pcont1" name="pcont1" class="form-control" value="<?php echo $str1; ?>" title="Please Select from date" data-rel="datepicker" placeholder="Search From Date" >
                  </div>				  
					<div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                      <input type="text"  id="pcont" name="pcont" class="form-control" value="" title="Pleas Select to date" data-rel="datepicker" placeholder="Search To Date" >
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
                          <th width="1%" class="thdesign">S.No</th>
                          <th width="3%" class="thdesign">Particular</th>
                          <th width="3%" class="thdesign">Naration</th>
                          <th width="5%" class="thdesign">Amount</th>
                          <th width="5%" class="thdesign">Date</th>
                           <th width="5%" class="thdesign">Edit</th>
                          <th width="5%" class="thdesign">Delete</th>
                        </tr>
                          </thead>
                        <script>
                            var jArray=[];
                           jArray.push(<?php echo json_encode($results); ?>);
                        </script>
            <tbody id="tdata" style="font-size:12px;">
						      <?php //if(!empty($enquiry)){foreach($enquiry as $enq) { ?>
                   <?php //$st=""; $remstate=$enq->adm_rem_state;
                   //$enq_state=$enq->adm_enq_stat;
                  //if($remstate=="unread" || $remstate=="unread")
                   /*{
                     $st='unread';
                   }
                   else if($remstate=="unread" && $enq_state=="unread")
                   {
                      $st='unread';
                   }
                   else if($remstate=="" && $enq_state=="")
                   {
                      $st='';
                   }
                   else if($remstate=="read" && $enq_state=="read")
                   {
                      $st='';
                   } */
                    ?>
					<?php 
					if(!empty($results)) { foreach($results as $row)
						{
					?>
                  <tr>
                 
                   <td><input type="checkbox" id="<?php echo $row->id; ?>" onchange="eachcheck(this,'subtitle');"  /></td>
                   <td><?php echo $row->id; ?></td>
                   <td><?php echo $row->adate ?></td>
                   <td><?php echo $row->particular; ?></td>
                   <td><?php echo $row->narration; ?></td>
                   <td><?php echo $row->current_pay ?></td>					
					<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->id; ?>);" class="fa fa-edit"></i></td>
					<td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->id; ?>);" class="fa fa-trash-o"></i></td>
      		      </tr>
					
                <?php } } else{ ?>
                     
                      <tr>
                   <td colspan="12">
                      <div class="alert alert-info">
                                <strong><?php echo "No todays records found.....!";?></strong>
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
          <form id="hfield" action="<?php echo base_url(); ?>index.php/Franchisee/Expense" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
						<input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />
					<input type="hidden" name="fromdt" id='fromdt' value="<?php echo $dt['from_date']; ?>" />
                    <input type="hidden" name="todate" id='todate' value="<?php echo $dt['to_date']; ?>" />
					
                    <input type="hidden" id="storeArrayvalue" value="<?php if(isset($dt['storeArrayvalue'])){echo $dt['storeArrayvalue']; } ?>" name="storeArrayvalue"/> 
               </form>        

         <form id="formVideo" class="form-horizontal" role="form"  action="<?php echo base_url()."index.php/Expense/Save_Data"; ?>"  enctype="multipart/form-data" method="post" name="frm">
            <div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Add Expense</h4>
                     
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                        </div>		
					
					</div>
			
			
			<div class="panel-body">
			<div class="col-sm-6" style="margin-top:1%;">
                    <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Particular<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="parti" name="parti" class="form-control" required />
                            </div>
                      </div>
						  
              <input type="hidden" id="bid" name="bid" value="" />

                    <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Amount<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                           <input type="text" id="amout" name="amout" class="form-control" required />
						   <!---<input type="text" id="searchid" name="searchid" class="form-control" placeholder="Search By Book Name" required/>---->
							<div id="result"></div>
						   </div>
                      </div>

                    

                        
                           
                     
           </div>
	       
				   
				 
					
						<div class="col-sm-6" style="margin-top:1%;">
					
					 <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Narration<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="naration" name="naration" class="form-control" required/>
                            </div>
                           </div>
					
					 <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3"> Date<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                                <input type="text"  id="pcontt" name="pcontt" value="<?php echo $str1; ?>" class="form-control" required data-rel="datepicker" >
                            
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
             <div  class="modal-dialog modal-lg">
                 
                 <div class="modal-content login-social" style="">
                    
                          
    <div class="panel panel-default panel-profile-details" >
     
                
    <div class="panel-body" style="padding:0;height:150px;">

            <div class="col-md-12 col-lg-12" style="padding:0;">
                 <ul style="margin:0px;">
                   <li class="pull-right">
                        
                        <div class="alertt alert-successs" id="alert3">
                                    <strong>Student Enquiry Information</strong> 
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