
 <script type="text/javascript" src="<?php echo base_url(); ?>Style/dist/js/tables-data-tables.js"></script>
 <script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>       
 <script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
 <link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>  
 <script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
 <script src="<?php echo base_url();?>Style/dist/js/Jsfordatabindingteemp.js"></script>
 <script src="<?php echo base_url();?>Style/dist/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>

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
   j("#alert").delay(3200).fadeOut(300);

   change_noti_stat();
    eachcheck('','loding');
  
   j("#home").addClass("open");
   j("#Habout").addClass("active open");
   
   Search(); 

   j('#pcont1').val(j('#fromdt').val());
   j('#pcont').val(j('#todate').val());
   j('#stu').val(j('#s').val());
   j('#cou').val(j('#c').val());
   
    j('[data-rel=datepicker]').datepicker({
        autoclose: true,
        todayHighlight: true
    });

     j('#inputTimepickerDropdown').timepicker({
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
            PageSize: 10,
            RecordCount: parseInt(rcount)

        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');
          
            j('#pindex').val(pageindex);
            j('#fromdt').val(j('#pcont1').val());
             j('#todate').val(j('#pcont').val());
             j('#s').val(j('#stu').val());
             j('#c').val(j('#cou').val());


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
                      j('#tdata').append("<tr id='B"+obj[i].id+"'><td>"+obj[i].id+"</td><td>"+obj[i].Franchisee_Name+"</td><td>"+obj[i].stud_name+"</td><td>"+obj[i].contact+"</td><td>"+obj[i].email+"</td><td>"+obj[i].course+"</td><td><a href='javascript:void(0);' title='Download Pdf'><i class=\"fa fa-file-pdf-o\" onclick='Download_pdf("+obj[i].id+")' style='margin-left:10px;font-size:20px; color:#FF3500;'></i></a><a href='javascript:void(0);' title='Download Excel'><i class=\"fa fa-file-excel-o\" onclick=\"Download_Excel("+obj[i].id+",'"+obj[i].stud_name+"')\" style='margin-left:10px;font-size:20px;'></i></a></td><td><a href='javascript:void(0);'><i class=\"fa fa-floppy-o\" onclick='Edit(jArray,"+obj[i].id+")' style='margin-left:10px;font-size:20px;'></i></a></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='DeleteDB(" + obj[i].id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
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
            j('#s').val(j('#stu').val());
            j('#c').val(j('#cou').val());

           j('#pindex').val(1);
           j('#hfield').submit();

}

function Search() { 
       var j = jQuery.noConflict(); 
       j("#stu").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      url: "<?php echo base_url(); ?>index.php/Franchisee/GetFranData",
                       data: { term: j("#stu").val()},
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


    $('form').attr("action", "<?php echo base_url().'index.php/Franchisee/Update_Active_Enquiry';?>");
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
   j("#nm").val(obj1[0][r].stud_name);
   j("#pcontt").val(obj1[0][r].enq_date);
   j("#testo").val(obj1[0][r].sadd);
   j("#cont").val(obj1[0][r].contact);   
   j("#email1").val(obj1[0][r].email);
   j("#sfees").val(obj1[0][r].sfees);
   j("#sdate").val(obj1[0][r].sdate); 
	 j("#conname").val(obj1[0][r].con_name);
   j("#conmobile").val(obj1[0][r].con_contact);

     j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
     city_id1=obj1[0][r].city_id;
     j('#stat1 option').each(function () {
           if (j(this).val() == obj1[0][r].state_id) {
                j(this).attr('selected', 'selected');
            }
        });
     
     
     j("#stat1").trigger('change');    

     j('#course option').each(function () {
           if (j(this).val() == obj1[0][r].course) {
      
                j(this).attr('selected', 'selected');
              
            }
        });
		
}

function citychange()
{
  if(city_id1!="")
  {
    
     j('#city option').each(function () {
           if (j(this).val() == city_id1) {
      
                j(this).attr('selected', 'selected');
              
            }
        });
  }
}

function Delete(id)
{
    //alert(id);
    if (confirm("Are you sure, you want to delete record?"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Fran_del/enquiry_del',
            type: 'POST',
           data:{'id':id},
      
            success: function (data) {
                //alert(data);
				alert("Record Deleted Successfully..");
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

function open_det_popup(obj1,id)
 {
      
      var opt="";
      var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].id==id)
         {
          r=i;
         }  
      }
     
     var dts=obj1[0][r].enq_date.split('-');
     var dts1=dts[2]+"/"+dts[1]+"/"+dts[0];
    
     var path="<?php echo base_url(); ?>Style/images/cca-logo.png";
    
     opt  ="<div class='panel-body' style='background-color:#00569d;box-shadow:0px 2px 4px #000'><div class='col-sm-4 text-center'>";
     opt +="<img alt='image' class='img-circle img-profile' style='height:100px;' src='"+path+"'></div>";
     opt +="<div class='col-sm-7 profile-details'><h3><i class=\"fa fa-institution\" style='color:#FFF;'></i>" +obj1[0][r].Franchisee_Name+"</h3>";
     opt +="<h4 class='thin'><i class=\"fa fa-clock-o\" style='color:#FFF'></i> "+dts1+"</h4>";
     opt += "</div></div>";
     
     opt +="<div class='panel-body'>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-institution\" style='color:#004884;'></i> Franchise Name</dt><dd>"+obj1[0][r].Franchisee_Name+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-map-marker\" style='color:#004884;'></i> Address</dt><dd>"+obj1[0][r].sadd+"</dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-user\" style='color:#004884;'></i> Student Name</dt><dd>"+obj1[0][r].stud_name+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-envelope-o\" style='color:#004884;'></i> Email Id</dt><dd>"+obj1[0][r].email+"</dd></dl></div>";                              
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-book\" style='color:#004884;'></i> Intersted Course</dt><dd>"+obj1[0][r].course+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-mobile\" style='color:#004884; font-size:20px;'></i> Contact</dt><dd>"+obj1[0][r].contact+"</dd></dl></div>";
     opt +="</div>";

     opt +="<div class='panel-body'>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-clock-o\" style='color:#004884'></i> Enquiry Date</dt><dd>"+dts1+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-user\" style='color:#004884;'></i> Counselor Name</dt><dd>"+obj1[0][r].con_name+"</dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-globe\" style='color:#004884'></i> State</dt><dd>"+obj1[0][r].state+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-mobile\" style='color:#004884; font-size:20px;'></i> Counselor Contact</dt><dd>"+obj1[0][r].con_contact+"</dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-globe\" style='color:#004884'></i> City</dt><dd>"+obj1[0][r].city+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt></dt><dd></dd></dl></div>";
     opt +="</div>";
     
     opt +="<div class='panel-body'>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-inr\" style='color:#004884'></i> Suggested Fees</dt><dd>"+obj1[0][r].sfees+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt></dt><dd></dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-star-o\" style='color:#004884'></i> Admin Remark</dt><dd>"+obj1[0][r].remark+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt></dt><dd></dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt></dt><dd></dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt></dt><dd></dd></dl></div>";
     opt +="</div>";
     
     opt +="</div>";
    
     j("#fdetails").html(opt); 
     j("#myenqModal").modal('show');
   
 } 

</script>


<style>
 
</style>
<div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Enquiry</a></li>
                <li class="" id="t2"><a href="#tab1-2" data-toggle="tab"><i id="edit" class="fa fa-edit"></i> Add Enquiry</a></li>
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
                    <input type="text"  id="pcont1" name="pcont1" class="form-control" value="<?php echo $str1; ?>" title="Pleas Select Publish date" data-rel="datepicker" placeholder="Search From Date" >
                  </div>
                  <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                      <input type="text"  id="pcont" name="pcont" class="form-control" value="" title="Pleas Select Publish date" data-rel="datepicker" placeholder="Search To Date" >
                  </div>
                   <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                      <input type="text"  id="stu" name="stu" class="form-control" value="" title="Pleas Select Publish date" placeholder="Search By Student" >
                  </div>                        
                  <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                        <select name="cou" id="cou" class="form-control">
                              <option value="">select Course</option>
                               <?php foreach($courses as $co) { ?>
                                   <option><?php echo $co->Course_Name; ?></option>
                                <?php } ?> 
                        </select>
                  </div>
                  <div class="col-sm-3 pull-right" style="margin-top:0px;margin-bottom:-29px">
                      <ul>
                          <li class="pull-right"><a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onclick="Download_pdf_all()" style="font-size:28px; height:0px; color:#FF3500;"></i></a></li>
                          <li class="pull-right"><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onclick="Download_Excel_all()" style="font-size:28px; height:0px; color:#357ebd; margin-left:-70px;"></i></a></li>
                      </ul>
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
				  
                   <table id="table-hidden-row-details" class="table">
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
                          <th width="3%" class="thdesign">Enq Date</th>
                          <th width="3%" class="thdesign">Enq Type</th>
                          <th width="5%" class="thdesign">Student</th>
                          <th width="5%" class="thdesign">Course</th>
                          <th width="3%" class="thdesign">Mobile</th>
                          <th width="3%" class="thdesign">Call Time</th>
            						  <th width="5%" class="thdesign">Remark</th>
                          <th width="1%" class="thdesign">Status</th>
                          <th width="7%" class="thdesign">Action</th>
                          <th width="5%" style="display:none;" class="thdesign">Admin Remark</th>
						              <th width="5%" style="display:none;" class="thdesign">Sug Fees</th>
                          <th width="5%" style="display:none;" class="thdesign">Sug Batch Date</th>
                          <th width="5%" style="display:none;" class="thdesign">Counselor Name</th>
                          <th width="5%" style="display:none;" class="thdesign">Counselor Contact</th>
                          <th width="5%" style="display:none;" class="thdesign">State</th>
                          <th width="5%" style="display:none;" class="thdesign">City</th>
                          <th width="5%" style="display:none;" class="thdesign">Address</th>
                        </tr>
                          </thead>
                        <script>
                            var jArray=[];
                           jArray.push(<?php echo json_encode($enquiry); ?>);
                        </script>
            <tbody id="tdata" style="font-size:12px;">
						      <?php if(!empty($enquiry)){foreach($enquiry as $enq) { ?>
                   <?php $st=""; $remstate=$enq->adm_rem_state;
                   $enq_state=$enq->adm_enq_stat;
                   if($remstate=="unread" || $remstate=="unread")
                   {
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
                   } 
                    ?>
                  <tr class="<?php echo $st; ?>">
                   <td><i class="fa fa-plus"></i></td>
                   <td><input type="checkbox" id="<?php echo $enq->id; ?>" onchange="eachcheck(this,'subtitle');"  /></td>
                   <td title="<?php echo $enq->id; ?>"><?php echo $enq->id; ?></td>
                   <td title="<?php echo $enq->enq_date; ?>"><?php echo $enq->enq_date; ?></td>
                   <td title="<?php echo $enq->Status; ?>"><?php echo $enq->Status; ?></td>
                   <td title="<?php echo $enq->stud_name; ?>"><?php echo $enq->stud_name; ?></td>
                   <td title="<?php echo $enq->course; ?>"><?php echo $enq->course; ?></td>
                   <td title="<?php echo $enq->contact; ?>"><?php echo $enq->contact; ?></td>
                   <td>6:20pm</td>
                   <td title="<?php echo $enq->remark; ?>"><?php echo $enq->remark; ?></td>
                   <td style="text-align:center">
                    <select name="stat" id="stat" class="" onchange="add_admission(this.value);">
                       <option value="Inactive">Inactive</option>
                       <option value="<?php echo $enq->id; ?>">Active</option>
                    </select>
                   </td>
                   <td  style="text-align:center"><a href="javascript:void(0);" title=""><i id="sign" style="font-size:20px; margin-right:0px;" onclick="open_det_popup(jArray,<?php echo $enq->id; ?>)" class="fa fa-info-circle"></i><i class="fa fa-file-pdf-o" onclick="Download_pdf('<?php echo $enq->id; ?>')" style="margin-left:10px;font-size:20px; color:#FF3500;"></i></a><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onclick="Download_Excel('<?php echo $enq->id; ?>','<?php echo $enq->stud_name; ?>')" style="margin-left:10px;font-size:20px;"></i></a><i style="color:#275273;font-size:20px;margin-left:8px;" id="EditB" onclick="Edit(jArray,<?php echo $enq->id; ?>);" class="fa fa-edit"></i><i style="color:#275273;font-size:20px; margin-left:8px;" id="DeleteN" onclick="Delete(<?php echo $enq->id; ?>);" class="fa fa-trash-o" style="font-size:20px; margin-left:8px;"></i></td>
                    
                   <td style="display:none"><?php echo $enq->remark; ?></td> 
                   <td style="display:none"><?php echo $enq->sfees; ?></td> 
                   <td style="display:none"><?php echo $enq->sdate; ?></td> 
                   <td style="display:none"><?php echo $enq->con_name; ?></td> 
                   <td style="display:none"><?php echo $enq->con_contact; ?></td>
                   <td style="display:none"><?php echo $enq->state; ?></td> 
                   <td style="display:none"><?php echo $enq->city; ?></td>
                   <td style="display:none"><?php echo $enq->sadd; ?></td>
                 </tr>
                <?php } } else{ ?>
                     
                      <tr>
                   <td colspan="12">
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
                   <td style="display:none;">6:20pm</td>
                   <td style="display:none;"></td>
                   <td style="display:none;"></td>
                   <td style="display:none;"></td>
                    
                   <td style="display:none"></td> 
                   <td style="display:none"></td> 
                   <td style="display:none"></td> 
                   <td style="display:none"></td> 
                   <td style="display:none"></td>
                   <td style="display:none"></td> 
                   <td style="display:none"></td>
                   <td style="display:none"></td>
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
          <form id="hfield" action="<?php echo base_url(); ?>index.php/Franchisee/Daily_Enquiry" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
                    <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />
                    <input type="hidden" name="fromdt" id='fromdt' value="<?php echo $dt['from_date']; ?>" />
                    <input type="hidden" name="todate" id='todate' value="<?php echo $dt['to_date']; ?>" />
                    <input type="hidden" name="s" id='s' value="<?php echo $dt['state']; ?>" />
                    <input type="hidden" name="c" id='c' value="<?php echo $dt['city']; ?>" />
                    <input type="hidden" id="storeArrayvalue" value="<?php if(isset($dt['storeArrayvalue'])){echo $dt['storeArrayvalue']; } ?>" name="storeArrayvalue"/> 
               </form>        

         <form id="formVideo" class="form-horizontal" role="form"  action="<?php echo base_url()."index.php/Franchisee/Daily_Enquiry_Save"; ?>"  enctype="multipart/form-data" method="post" name="frm">
            <div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Add Enquiry</h4>
                     
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                        </div>		
					
					</div>
			
			
			<div class="panel-body">
			<div class="col-sm-6" style="margin-top:1%;">
                    <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Student Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="nm" name="nm" class="form-control" required title="Please Enter Student Full Name"/>
                            </div>
                      </div>
						  
              <input type="hidden" id="bid" name="bid" value="" />

                    <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Address<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <textarea id="testo" name="testo" class="form-control" rows="3" cols="34" required title="Plase Enter Student Address Here" ></textarea>
                            </div>
                      </div>

                     <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">State<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <select id="stat1" name="stat1" class="form-control" requird title="please Select State">
                               
                             </select>                           
                            </div>
                      </div>
       
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">City<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <select id="city" name="city" class="form-control" required title="Please Select City">
                                                
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Email<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="email" id="email1" name="email1" class="form-control" title="Please Enter Studend Email"/>
                            </div>
                          </div>      
       
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Contact No<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="cont" name="cont" class="form-control" value="" required title="Please Enter Student Contact No"/>
                            </div>
                          </div>

                           
                     
           </div>
	       
				   
				 
					
						<div class="col-sm-6" style="margin-top:1%;">
					
					 <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Enquiry Date<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                                <input type="text"  id="pcontt" name="pcontt" value="<?php echo $str1; ?>" class="form-control" required title="Pleas Enquiry date" data-rel="datepicker" >
                            
                            </div>
           </div>


        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Intrestes Courses<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                                <select id="course" name="course" class="form-control">
                                      <option selected disabled>Select</option>
                                      <option>Certified e-Accountants</option>
                                      <option>Master in Excel</option>
                                      <option>Smart Tally</option>
                                      <option>Tally Professional</option>
                                </select>
                            </div>
           </div>
		        
            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Suggested Fees<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="sfees" name="sfees" class="form-control" required title="Please Enter Student Suggested Fees"/>
                            </div>
                           </div> 

                            <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label" for="inputPassword3">Suggested Batch Date<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="sdate" name="sdate" value="<?php echo $str1; ?>" data-rel="datepicker" class="form-control" required title="Please Enter Student Suggested Batch Date"/>
                            </div>
                           </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Counselors Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="conname" name="conname" class="form-control" required title="Please Enter Counselor Name"/>
                            </div>
                           </div>
                                <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Counselors Contact<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="conmobile" name="conmobile" class="form-control" required title="Please Enter Counselor Contact No"/>
                            </div>
                           </div> 
		   
                          <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label" for="inputPassword3">Counseling Time<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" name="ctime" class="form-control" data-rel="timepicker" id="inputTimepickerDropdown" data-template="dropdown" data-show-meridian="true" data-minute-step="10" required title="Please Select Calling Timing" />
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