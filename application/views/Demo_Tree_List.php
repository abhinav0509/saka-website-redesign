<script type="text/javascript" src="<?php echo base_url(); ?>Style/dist/js/admin_act_fran.js"></script>
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
.alert {
    padding: 3px;
    margin-bottom: 18px;
    border: 1px solid transparent;
    border-radius: 4px;
}
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
<script>
var j=jQuery.noConflict();
var city;
var city2;
var Frarr =[];
j(document).ready(function(){
  

  eachcheck('','loding');
   city2=j('#c').val();
   j("#dfrr").addClass("open");
   
   j("#flist").addClass("active open");
   j("#alert").delay(3200).fadeOut(300);

   j('#cont1').val(j('#fromdt').val());
   j('#pcont').val(j('#todate').val());
   j('#st').val(j('#s').val());
   j('#ctt').val(j('#c').val());
    
  
  

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
            PageSize: 15,
            RecordCount: parseInt(rcount)

        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');
          
            j('#pindex').val(pageindex);
            j('#fromdt').val(j('#cont1').val());
             j('#todate').val(j('#pcont').val());
             j('#s').val(j('#st').val());
             j('#c').val(j('#ctt').val());


            j('#hfield').submit();

   });




j('#cont1').datepicker({
        autoclose: true,
        todayHighlight: true
    });

   j('#pcont').datepicker({
        autoclose: true,
        todayHighlight: true
    });

   j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master',
          type: 'post',
          data: {'action': 'Country'},
          success: function(data) {
           
           var obj = j.parseJSON(data);
           j('#state').append("<option value=''>Select</option>");
           j('#st').append("<option value=''>Select State</option>");
           for(i=0;i<obj.length;i++)
              { 
                j('#state').append("<option value=\""+obj[i].state_id+"\">"+obj[i].name+"</option>");
                j('#st').append("<option value=\""+obj[i].state_id+"\">"+obj[i].name+"</option>");
               }

                j('#st option').each(function () {      
                   if(j(this).val()==j('#s').val()){
                       j(this).attr('selected','selected');
                   }
                });

                j('#st').trigger('change');
           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      }); 
       
       j('#st').change(function(){
         j('#ctt').empty();
         j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/getcity',
          type: 'post',
          data: {'cntid':j(this).val()},
          success: function(data, status) {
           var obj = j.parseJSON(data);
           j('#ctt').append("<option value="+" "+">Select</option>");
          
           for(i=0;i<obj.length;i++)
              { 
                j('#ctt').append("<option value=\""+obj[i].city_id+"\">"+obj[i].name+"</option>");
              }
                 citychange1();         
           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      }); 
});

       j('#state').change(function(){
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

});
</script>

<script>
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

  function get_addr()
{
   var cid=j("#city").val();
   var sid=j("#state").val();
   j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/get_addr',
          type: 'post',
          data: {'cid':cid,'sid':sid},
          success: function(data) {
           var obj = j.parseJSON(data);
           
           j('#st_name').val(obj[0].State_Name);
           j('#ct_name').val(obj[0].City_Name);

           get_lat_long();
          },
          error: function() {
          alert("error");
         }
      }); 
}
function get_lat_long()
{
  var add= j('#add').val()+" "+j('#st_name').val()+" "+j('#ct_name').val();
  alert(add);

       j.ajax({
                type: "GET",
                dataType: "json",
                url: "http://maps.googleapis.com/maps/api/geocode/json",
                data: { 'address': add, 'sensor': false },
                success: function (data) {
                    lat1 = data.results[0].geometry.location.lat;
                    lng1 = data.results[0].geometry.location.lng;
                 alert("Lat"+lat1+"Long"+lng1);
                 j('#lat').val(lat1);
                 j('#lng').val(lng1);
               
                },
                error: function () {
                    alert("Fail..");
                }
            });
}


function Delete(id)
{
  //alert("gfh");
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/DemoLogin/Delete',
            type: 'POST',
           data:{'action':'delfran','F_id':id},
            
            success: function (data) {
            var obj=j.parseJSON(data);
            alert(obj.message);
            if(data)
            {
            window.location="<?php echo base_url().'index.php/Admin/Demo_Fran_List'; ?>"
            }
        
            },
            error: function () {
                
            }
        });
}
  
function Edit(obj1,id)
{
  //alert(id);
  j('#formfrch').attr("action", "<?php echo base_url().'index.php/DemoLogin/update_fran';?>");
  j("#t1").removeClass("active");
    j("#t2").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
  
    var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].cus_id==id)
         {
          r=i;
         }  
      }
   j('#fname').val(obj1[0][r].fname);
   j('#ins').val(obj1[0][r].institute_name);
   j('#add').val(obj1[0][r].address);
   j('#mail').val(obj1[0][r].femail);
   j('#cont').val(obj1[0][r].cus_mobile);
   j('#uname').val(obj1[0][r].email);
   j('#pwd').val(obj1[0][r].password);
   j('#bid').val(id);
   city=obj1[0][r].city;


   $('#fname').after("<input type='hidden' id='cid' value='" + obj1[0][r].city + "' name='cid'/>"); 
   
    j('#state option').each(function () {
       if (j(this).val() == obj1[0][r].state) {
             j(this).attr('selected', 'selected');
          }
           
    });

    j('#state').trigger('change');

   

     j('#state').trigger('change');

      j('#status option').each(function () {
       if (j(this).val() == obj1[0][r].status) {
            j(this).attr('selected', 'selected');
          }
    }); 
 }  
   
function citychange(){
 if(j('#cid').val()=="")
 {}else{
  j('#city option').each(function(){
     if(j(this).val()==city)
      {
       j(this).attr('selected', 'selected');
       }
   });
   }
}

function citychange1(){

  j('#ctt option').each(function(){
     if(j(this).val()==city2)
      {
         j(this).attr('selected', 'selected');
       }
   });
   
}

function send_crdi(mail,id)
{
  j.ajax({  
            url: '<?php echo base_url()."index.php/Admin_Franch/send_crdintials"; ?>',
            type: 'POST',
           data:{'id':id},
      
            success: function (data) {
         var obj = j.parseJSON(data);
         alert(obj['message']);
          if(data)
          {
             window.location="<?php echo base_url().'index.php/Admin/Demo_Fran_List'; ?>"
          }
        
            },
            error: function () {
                
            }
        });
}
function change_status(status,id)
{
     j.ajax({  
            url: '<?php echo base_url()."index.php/Admin_Franch/change_status"; ?>',
            type: 'POST',
           data:{'status':status,'id':id},
      
            success: function (data) {
         var obj = j.parseJSON(data);
         alert(obj['message']);
        if(data)
        {
           window.location="<?php echo base_url().'index.php/Admin/Franchisee'; ?>"
        }
        
            },
            error: function () {
                
            }
        });
}
function pdf_Data(id)
{
  
  j.ajax({  
            url: '<?php echo base_url()."index.php/Franchisee/Generate_Excell"; ?>',
            type: 'POST',
           data:{'action':'delfran','F_id':id},
      
            success: function (data) {
      alert(data);
                 if(data)
        {
        window.location="<?php echo base_url().'index.php/Admin/Franchisee'; ?>"
        }
        
            },
            error: function () {
                
            }
        });
}  

function clickAction(obj) {
    var base_url = window.location.origin;
    $('#hfield').attr("action", base_url + "/cca/index.php/Admin/Savebatchdata?Action=" + obj);
    $('#hfield').submit();
}

function Exell_Data()
{
  alert("Excell Data");
}
function search_data()
{
            j('#fromdt').val(j('#cont1').val());

           j('#todate').val(j('#pcont').val());
           j('#s').val(j('#st').val());
           j('#c').val(j('#ctt').val());

           j('#pindex').val(0);
           j('#hfield').submit();

}
function getsinglepdf(str)
{
    window.location="<?php echo base_url(); ?>index.php/DemoLogin/getsinglepdf?id="+str;
}
function getsingleExcel(id,name)
{
   
    window.location="<?php echo base_url(); ?>index.php/DemoLogin/getsingleexcell?id="+id+"&"+"name1="+name;
}

 function Download_Excel_all()
 {
     j("#from1").val(j("#cont1").val());
     j("#to1").val(j('#pcont').val());
     j("#stt1").val(j('#st').val());
     j("#ct1").val(j('#ctt').val());
	 j("#storedArrayvalue1").val(j("#storeArrayvalue").val());
	 j("#efield").submit();
    //window.location="<?php echo base_url(); ?>index.php/DemoLogin/get_enquiry_excel?fdate="+fdate+"&"+"todate="+todate+"&"+"state="+state+"&"+"city="+city
 }
 function Download_pdf_all()
 {
     j("#from").val(j("#cont1").val());
     j("#to").val(j('#pcont').val());
     j("#stt").val(j('#st').val());
     j("#ct").val(j('#ctt').val());
	 j("#storedArrayvalue").val(j("#storeArrayvalue").val());
	 j("#pfield").submit();
     //window.location="<?php echo base_url(); ?>index.php/DemoLogin/get_enquiry_pdf?fdate="+fdate+"&"+"todate="+todate+"&"+"state="+state+"&"+"city="+city
 }
  </script>

 

 <div class="container-fluid-md">
     <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">Tree</a></li>
                <li class="" id="t2"><a href="#tab1-2" data-toggle="tab">Add Tree</a></li>
                 <?php if(isset($message)) { ?>
                 <li class="pull-right">
                        
                        <div class="alert alert-success" id="alert">
                                    <strong><?php echo $message; ?></strong> 
                                </div>
                      
                 </li>
                 <?php } ?>
        
      </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1-1">
                  <div class="table-responsive">
                     <div class="col-md-12" style="margin-bottom:36px; margin-top:-8px;">
                     <?php 
                        $arr1=array();
                        $da1=date('Y/m/d');
                        $arr1 =explode("/",$da1); 
                        $arr1=array_reverse($arr1);
                        $str1 =implode($arr1,"/");
                    ?>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                  <input type="text" id="cont1" name="cont1" class="form-control" data-rel="datepicker" value="<?php echo $str1; ?>" placeholder="Search From Date" required/>                
            </div>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                   <input type="text" id="pcont" name="pcont" class="form-control" data-rel="datepicker" placeholder="Search To Date" required/>           
            </div>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
              <select name="st" id="st" class="form-control">
                   
                     
              </select>
           
            </div>
             <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                <select name="ctt" id="ctt" class="form-control">
  
                </select>
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

                     <table id="table-hidden-row-details" class="table table-striped" style="float:left;">
                        <thead>
                         <tr style="background-color:#d7dadc;">
                           <th width="1%"></th>
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
                           <th width="1%">Id</th>
                           <th width="10%">Tree Name</th>
                           <th width="10%">English Name</th>
                           <th width="4%">Hindi Name</th>
                           <th width="4%">Scientific Name</th>                          
                           <th width="3%">Family Name</th>
                           <th width="3%">Class Name</th>
                           <th width="3%">Uses</th>  
                           <th width="3%">Status</th>                           
                           <th width="10%">Action</th>
                           <th style="display:none">Phytochemicals</th>
                           <th style="display:none">Insert Date</th>
                           <th style="display:none">Update Date</th>
                         </tr>
                       </thead>
              <script>
            var jArray=[];
             jArray.push(<?php echo json_encode($enquiry); ?>);
            </script>
			
                      <tbody id="tdata">
					  
                       <?php if(!empty($enquiry)) {
            foreach($enquiry as $row)
            {
             ?>
            <tr>
                 <td><i class="fa fa-plus"></i></td>
                 <td><input type="checkbox" id="<?php echo $row->cus_id; ?>" onchange="eachcheck(this,'subtitle');"  /></td>
                 <td title="<?php echo $row->fran_id; ?>"><?php echo $row->fran_id; ?></td>
                 <td title="<?php echo $row->fname; ?>"><?php echo $row->fname; ?></td>
                 <td title="<?php echo $row->institute_name; ?>"><?php echo $row->institute_name; ?></td>
                 <td><?php echo $row->cus_mobile; ?></td>
                 <td><?php echo $row->femail; ?></td>
                 <td><?php echo $row->State; ?></td>
                 <td><?php echo $row->City; ?></td>
                 <td>
                     <select name="stat" id="stat" onchange="change_status(this.value,'<?php echo $row->cus_id; ?>')">
                          <option value="0" <?php if(($row->status)=="0"){?>selected="selected"<?php } ?>> <font color="Red">Not Active</font></option>
                          <option value="1" <?php if(($row->status)=="1"){?>selected="selected"<?php } ?>>Active</option>
                      </select>
                 </td>
                 <td  style="text-align:center"><i style="color:#275273;font-size:20px;margin-right:10px;" id="EditB2" onclick="send_crdi('<?php echo $row->femail; ?>','<?php echo $row->cus_id; ?>');" class="fa fa-envelope-o" title="Send Credintials"></i><a href="javascript:void(0);" onclick="getsinglepdf('<?php echo $id=$row->cus_id; ?>')" title="Download Pdf"><i style="color:#FF3500;font-size:20px;" id="pdf"  class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="getsingleExcel('<?php echo $id=$row->cus_id; ?>','<?php echo $id=$row->institute_name; ?>')" Title="Download Excel"><i style="color:#275273;font-size:20px;" onclick="" class="fa fa-file-excel-o"></i></a><i style="color:#275273;font-size:20px;margin-left:10px;" id="EditB" onclick="Edit(jArray,<?php echo $row->cus_id; ?>);" class="fa fa-edit" title="Edit Record"></i><i style="color:#275273;font-size:20px; margin-left:10px;" id="DeleteN" onclick="Delete(<?php echo $row->cus_id; ?>);" class="fa fa-trash-o" title="Delete Record"></i></td>
                 <td style="display:none"><?php echo $row->address; ?></td>
                 <td style="display:none"><?php echo $row->pincode; ?></td>
                 <td style="display:none"><?php echo $row->district; ?></td>
            </tr>
             <?php } } else { ?>					
                <tr>
                    <td colspan="11">
                        <div class="alert alert-info">
                                <strong><?php echo "No Data Available.....!";?></strong>
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
               <form id="hfield" action="<?php echo base_url(); ?>index.php/Admin/Demo_Fran_List" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php //echo $dt['page_index']; ?>" />
                    <input type="hidden" name="rcount" id='rcount' value="<?php //echo $rowcount; ?>" />

                    <input type="hidden" name="fromdt" id='fromdt' value="<?php echo $dt['from_date']; ?>" />
                    <input type="hidden" name="todate" id='todate' value="<?php echo $dt['to_date']; ?>" />
                    <input type="hidden" name="s" id='s' value="<?php echo $dt['state']; ?>" />
                    <input type="hidden" name="c" id='c' value="<?php echo $dt['city']; ?>" />
                    <input type="hidden" id="storeArrayvalue" value="<?php if(isset($dt['storeArrayvalue'])){echo $dt['storeArrayvalue']; } ?>" name="storeArrayvalue"/> 
               </form>
			   
			   <form id="pfield" action="<?php echo base_url(); ?>index.php/DemoLogin/get_enquiry_pdf" method="post">
                    <input type="hidden" name="from" id='from' value="" />
                    <input type="hidden" name="to" id='to' value="" />
                    <input type="hidden" name="stt" id='stt' value="" />
                    <input type="hidden" name="ct" id='ct' value="" />
                    <input type="hidden" id="storedArrayvalue" value="" name="storedArrayvalue"/> 
               </form>
			   
			   <form id="efield" action="<?php echo base_url(); ?>index.php/DemoLogin/get_enquiry_excel" method="post">
                    <input type="hidden" name="from1" id='from1' value="" />
                    <input type="hidden" name="to1" id='to1' value="" />
                    <input type="hidden" name="stt1" id='stt1' value="" />
                    <input type="hidden" name="ct1" id='ct1' value="" />
                    <input type="hidden" id="storedArrayvalue1" value="" name="storedArrayvalue1"/> 
               </form>


               <form id="formfrch" class="form-horizontal" action="<?php echo base_url()."index.php/DemoLogin/Insert_new_Fran"; ?>" method="post">
                
                <input type="hidden" name="st_name" id="st_name" />
                <input type="hidden" name="ct_name" id="ct_name" />
                <input type="hidden" name="lat" id="lat" />           
                <input type="hidden" name="lng" id="lng" />
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Add New Tree</h4>
                        <div class="panel-options">
                            <a data-rel="collapse" href="#"><i class="fa fa-fw fa-minus"></i></a>
                            <a data-rel="reload" href="#"><i class="fa fa-fw fa-refresh"></i></a>
                            <a data-rel="close" href="#"><i class="fa fa-fw fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                     <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputEmail3">Name <span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Name" name="fname" id="fname" class="form-control" required title="Please Type Your Name">
                            </div>
                        </div>
            
              <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Institute Name</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Institute Name" id="ins" name="ins" class="form-control" required title="Please Type Institute Name">
                              
                            </div>
                        </div>
            <input type="hidden" id="bid" name="bid" value="" />
            <input type="hidden" id="nm" name="nm" value="" />
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Address</label>
                            <div class="col-sm-8">
                               <textarea name="add" class="form-control" id="add" placeholder="Type Your Address" required title="Please Type Your Address"></textarea>
                           </div>
                        </div>
            
            
             <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">state</label>
                            <div class="col-sm-8">
                                
                                 <select class="form-control" id="state" name="state" required title="Please Select State">
                                                
                               </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">City</label>
                            <div class="col-sm-8">
                              
                                <select class="form-control" onchange="get_addr()" id="city" name="city" required title="Please Select City">
                                                
                                 </select>
                            </div>
                        </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputFirstName3">E-Mail</label>
                            <div class="col-sm-8">
                                <input type="email" placeholder="Mail" id="mail" name="mail" class="form-control" required title="Please Type Your Email">
                            </div>
                        </div>
             <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputLastName3">Mobile</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Contact" id="cont" name="cont" required title="Please Type Your Mobile No" class="form-control">
                            </div>
                        </div>
                                  
             <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputLastName3">User Name<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="User Name" id="uname" name="uname" required title="Please Type Your Username" autocomplete="off" class="form-control">
                            </div>
                        </div>
            
            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputLastName3">Password<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" placeholder="User Name" id="pwd" name="pwd" autocomplete="off" required title="Please Type Your Password" class="form-control">
                            </div>
                        </div>
            
            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputLastName3">Status<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <select name="status" id="status" class="form-control">
                                     <option value="0">Not Active</option>
                                     <option value="1">Active</option>
                                </select>
                                
                            </div>
                        </div>
                      </div>  
                       
                    </div>
                    <div class="panel-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <input class="btn btn-primary" type="submit" value="Submit" name="save" id="SaveBtn"/>
                               <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update"/>
                               <input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
      
                </div>
        
        <div class="tab-pane" id="tab1-4">
        
        </div>
        
             </div>
        </div>
        </div>
    </div>
   </div>
