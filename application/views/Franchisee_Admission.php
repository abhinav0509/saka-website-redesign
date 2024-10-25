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
.modal-close {
   background: #313a49 none repeat scroll 0 0;
    box-shadow: 0 0 100px rgba(0, 0, 0, 0.4);
    color: #aebbc4;
    cursor: pointer;
    font-size: 16px;
    height: 32px;
    left: 70%;
    line-height: 30px;
    position: absolute;
    text-align: center;
    top: 0;
    transition: color 0.2s ease-in 0s;
    width: 35px;
    z-index: 1000;

}
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
.unread{
  background-color: #f5f6f7;
}
#given{background-color: #F7F7F7;}
</style>

<script>
 var j=jQuery.noConflict(); 
 var Frarr =[];
j(document).ready(function(){
    j("#frr").addClass("open");
    j("#fad").addClass("active open"); 
    j("#alert").delay(3200).fadeOut(300);
    j("#alert1").delay(3200).fadeOut(300);
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
            url: '<?php echo base_url(); ?>index.php/Admin/Fran_Admission',
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
            url: '<?php echo base_url(); ?>index.php/Admin/Fran_Admission',
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
      j('#hfield').attr("action", "<?php echo base_url(); ?>/index.php/Notifications/del_admission_from_admin?Action="+obj);
      j('#hfield').submit();
    }
    else if(t=="")
    {
     
       j('.alert1').show();
       var ottp="<strong>Please Select Record to perform operation</strong>";
       j('.alert1').html(ottp);
       j("#alert1").delay(3200).fadeOut(300);

    }
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
                       url: "<?php echo base_url(); ?>index.php/Admin/GetAdmissionData1",
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
            j('#hfield').submit();


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
    //window.location="<?php echo base_url(); ?>index.php/Admin/get_Excell_by_cat?fdate="+fdate+"&"+"todate="+todate+"&"+"cname="+cname+"&"+"sname="+sname;
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
            url: '<?php echo base_url(); ?>index.php/Admission/Delete_Admission',
            type: 'POST',
           data:{'action':'delabt','id':id},
      
            success: function (data) {
                 data=data.replace(/"/g, '');
                if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/Fran_Admission'; ?>"
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

  function set_mult_date()
  {
     j("#hd1").val(j("#storeArrayvalue").val());
  }
  
  function open_popup()
  {
    var t=j('#storeArrayvalue').val();
    if(t!="")
    {
         j("#myModal").modal('show');
         var ottp="<i class='fa fa-check-square-o'></i>&nbsp;"+ct.length; 
         j('.label').html(ottp);
    }
    else if(t=="")
    {
       j('.alert1').show();
       var ottp="<strong>Please Select Record to perform operation</strong>";
       j('.alert1').html(ottp);
       j("#alert1").delay(3200).fadeOut(300);

       var ottp="<i class='fa fa-check-square-o'></i>&nbsp;"+0; 
       j('.label').html(ottp);
    }
  }

  function set_exm_dt(dt,id)
  {
     if (confirm("Are you sure, you want to set Exam Date"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Admission/save_single_stud_exame_date',
            type: 'POST',
           data:{'sid':id,'date':dt},
      
            success: function (data) {
            var obj=j.parseJSON(data);
           j('.alert').show();
           j('#alert1').hide();
           var ottp="<strong>Please Select Record to perform operation</strong>";
           j('.alert').html(obj.message);
           j("#alert").delay(3200).fadeOut(300);
          if(data)
          {
             //window.location="<?php echo base_url().'index.php/Admin/Fran_Admission'; ?>"
          }
        
        },
            error: function () {
                
            }
        });

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
  padding: 7px 4px;
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
  .label {
    font-family: calibri;
    font-size: 12px;
    font-weight: 100;
    margin-left: 96px;
    margin-top: -17px;
    padding: 4px 12px;
}
  ul li{list-style: none;}
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
</style>
<script type="text/javascript">
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

     var o_stat=obj1[0][r].O_Status;
     var ostate="";
     if(o_stat==0)
     {
        ostate="NotGiven";
     }
     else if(o_stat==1)
     {
       ostate="Given";
     }

     
     var dts=obj1[0][r].course_date.split('-');
     var dts1=dts[2]+"/"+dts[1]+"/"+dts[0];
     var dts2="";
     var dts3="";
     if(obj1[0][r].exame_date)
         dts2=obj1[0][r].exame_date.split('-');

     if(dts2!="")  
         dts3=dts2[2]+"/"+dts2[1]+"/"+dts2[0];

     var path="";
     if(obj1[0][r].image=="")
     {
        path="<?php echo base_url(); ?>Style/images/cca-logo.png";
     }
     else if(obj1[0][r].image!="")
     {
        path="<?php echo base_url(); ?>uploads/Admission/"+obj1[0][r].image+" "; 
     }
     opt  ="<div class='panel-body' style='background-color:#00569d;box-shadow:0px 2px 4px #000'><div class='col-sm-4 text-center'>";
     opt +="<img alt='image' class='img-circle img-profile' style='height:100px;' src='"+path+"'></div>";
     opt +="<div class='col-sm-7 profile-details'><h3><i class=\"fa fa-user\" style='color:#FFF;'></i> "+obj1[0][r].name+"</h3>";
     opt +="<h4 class='thin'><i class=\"fa fa-calendar\"></i> "+dts1+"</h4>";
     opt += "</div></div>";
     
     opt +="<div class='panel-body'>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-institution\" style='color:#004884;'></i> Franchise Name</dt><dd>"+obj1[0][r].fran_Name+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-map-marker\" style='color:#004884;'></i> Address</dt><dd>"+obj1[0][r].add+"</dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-graduation-cap\" style='color:#004884'></i> Student ID</dt><dd>"+obj1[0][r].stud_id+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-envelope-o\" style='color:#004884;'></i> Email Id</dt><dd>"+obj1[0][r].email+"</dd></dl></div>";                              
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-user\" style='color:#004884;'></i> Student Name</dt><dd>"+obj1[0][r].name+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-mobile\" style='color:#004884; font-size:20px;'></i> Contact</dt><dd>"+obj1[0][r].contact+"</dd></dl></div>";
     
     opt +="<div class='col-sm-4'><dl><dt> </dt><dd></dd></dl><br>";
     if(obj1[0][r].padd)
        opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-map-marker\" style='color:#004884;'></i>Permanent Address</dt><dd>"+obj1[0][r].padd+"</dd></dl></div>";
     else
        opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-map-marker\" style='color:#004884;'></i>Permanent Address</dt><dd>-</dd></dl></div>"; 
     opt +="<div class='col-sm-4'><dl><dt> </dt><dd></dd></dl><br>";
     if(obj1[0][r].gender) 
        opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-envelope-o\" style='color:#004884;'></i> Gender</dt><dd>"+obj1[0][r].gender+"</dd></dl></div>";                              
     else
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-envelope-o\" style='color:#004884;'></i> Gender</dt><dd>-</dd></dl></div>";                               
     opt +="<div class='col-sm-4'><dl><dt></dt><dd></dd></dl><br>";
     if(obj1[0][r].studrel)
        opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-mobile\" style='color:#004884; font-size:20px;'></i> S/o,W/o,D/o</dt><dd>"+obj1[0][r].studrel+"</dd></dl></div>";
     else
        opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-mobile\" style='color:#004884; font-size:20px;'></i> S/o,W/o,D/o</dt><dd>-</dd></dl></div>";
     opt +="</div>";
     opt +="</div>";

     opt +="<div class='panel-body'>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-book\" style='color:#004884;'></i> Selected Course</dt><dd>"+obj1[0][r].course_Name+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-calendar\" style='color:#004884;'></i> Admission Date</dt><dd>"+dts1+"</dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-tags\" style='color:#004884'></i> Qualification</dt><dd>"+obj1[0][r].qualification+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-calendar\" style='color:#004884;'></i> Exame Date</dt><dd>"+dts3+"</dd></dl></div>";
     if(obj1[0][r].dob)
        opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-clock-o\" style='color:#004884'></i> D.O.B</dt><dd>"+obj1[0][r].dob+"</dd></dl><br>";
     else
        opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-clock-o\" style='color:#004884'></i> D.O.B</dt><dd>-</dd></dl><br>";   
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-shopping-cart\" style='color:#004884;'></i> Order Status</dt><dd>"+ostate+"</dd></dl></div>";
     opt +="</div>";
     
     opt +="</div>";
    
     j("#fdetails").html(opt); 
     
   
 }
</script>
<div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab" onclick="abc1();">View Admission</a></li>
                <li class="" id="t2"><a href="#tab1-2" data-toggle="tab">Add Remark</a></li>
                
                <?php if(isset($message)) { ?>
                 <li class="pull-right">
                        
                        <div class="alert alert-success" id="alert">
                                    <strong><?php echo $message; ?></strong> 
                                </div>
                      
                 </li>
                 <?php } ?>
                 <li class="pull-right">
                        
                        <div class="alert1 alert alert-danger" id="alert1" style="display:none;">
                                    
                        </div>                      
                 </li>
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
             <div class="col-sm-2 pull-right" style="margin-top:0px;margin-bottom:-29px">
                <ul class="pull-right">
                   <li class="pull-right"><a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onclick="get_pdf_by_cat()" style="font-size:28px; margin-left:10px; height:0px; color:#FF3500;"></i></a></li>
                   <li class="pull-right"><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onclick="get_pdf_by_Excell()" style="font-size:28px; height:0px; color:#357ebd; margin-left:10px;"></i></a></li> 
                </ul>
             </div>
             <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                    <a class="btn btn-primary" onclick="search_data()">
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
                                <input type="checkbox" id="titlechk" onchange="eachcheck(this,'title')"  /> &nbsp;
                                <i class="fa fa-caret-down dropdown-toggle" data-toggle="dropdown" style="cursor:pointer"></i>
                               
                                <ul class="dropdown-menu" role="menu">
                         <!--           <li><a href="javascript:;" onclick="clickpoup('All')">All</a></li>
                                    <li><a href="javascript:;" onclick="clickpoup('None')">None</a></li>-->
                                     <li><a href="javascript:;" onclick="eachcheck(this,'AllNone')">All None</a></li>                                   
                                    <li class="divider"></li>
                                    <li ><a href="javascript:;" onclick="open_popup()" id="signe" data-toggle="modal">
                                            <i class="fa fa-fw fa-caret-right"></i>Exame Date
                                            <span class="label label-danger pull-right">0</span>
                                    </a></li>
                                    <li><a href="javascript:;" onclick="clickAction('Delete')">
                                      <i class="fa fa-fw fa-caret-right"></i>Delete
                                      <span class="label label-danger pull-right">0</span></a></li>
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
                          
                         <th width="5%" class="thdesign">Exame Date</th>
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
                  { 
                         $O_Status=$row->O_Status;
                         if($O_Status==1)
                         {
                            $ord_state="given";
                         }
                         else
                         {
                            $ord_state="";
                         }
                    ?>
                  <tr class="<?php echo $row->n_status; ?>" id="<?php echo $ord_state; ?>">
                  <td><i class="fa fa-plus"></i></td>
                  <td><input type="checkbox" id="<?php echo $row->id; ?>" onchange="eachcheck(this,'subtitle');"  /></td>
                  <td title="<?php echo $row->stud_id; ?>"><?php echo $row->stud_id; ?></td>
                  <td title="<?php echo $row->fran_Name; ?>"><?php echo $row->fran_Name; ?></td>
                  <td title="<?php echo $row->name; ?>"><?php echo $row->name; ?></td>
                  <td title="<?php echo $row->contact; ?>"><?php echo $row->contact; ?></td>
                  <td title="<?php echo $row->email; ?>"><?php echo $row->email; ?></td>
                  <td title="<?php echo $row->course_Name; ?>"><?php echo $row->course_Name; ?></td>
                  <td title="<?php echo $row->timing; ?>"><?php echo $row->timing; ?></td>
                  <td>
				  <?php if(!empty($row->image)){?>
				  <img src="<?php echo base_url(); ?>uploads/Admission/<?php echo $row->image; ?>" style="height:64px; width:70px;"></img>
				  <?php }else{?>
				  <img src="<?php echo base_url(); ?>uploads/Admission/d.png" style="height:64px; width:70px;"></img>
				  <?php }?>
				  </td>
                 <td style="display:none;"><?php echo $row->add; ?></td>
                 <td style="display:none;"><?php echo $row->state; ?></td>
                 <td style="display:none;">
                  <?php $c_dt=$row->course_date; 
                              $cfarr=array();
                              $cfarr =explode("-",$c_dt); 
                              $cfarr=array_reverse($cfarr);
                              echo $ctrr2 =implode($cfarr,"-");
                  ?>
                </td>
                 <td style="display:none;"><?php echo $row->qualification; ?></td>
                 <td style="display:none;">
                   <?php $ex_dt=$row->exame_date;
                              $sfarr=array();
                              $sfarr =explode("-",$ex_dt); 
                              $sfarr=array_reverse($sfarr);
                              echo $strr2 =implode($sfarr,"-");
                              
                   ?>
                 </td>
                 <td style="display:none;"><?php echo $row->course_date; ?></td>
                 <td>
                    <?php $set_dt=$row->exame_date; 
                        if(isset($set_dt))
                        {
                              $farr=array();
                              $farr =explode("-",$set_dt); 
                              $farr=array_reverse($farr);
                              $str2 =implode($farr,"-");
                              $str3=str_replace("-","/",$str2);
                              $colo="color:#004884";  
                        }
                        else if($set_dt=="0000-00-00")
                        {
                              $farr=array();
                              $dtt=date('Y-m-d');
                              $farr =explode("-",$dtt); 
                              $farr=array_reverse($farr);
                              $str2 =implode($farr,"-");
                              echo $str3=str_replace("-","/",$str2);
                              $colo="color:#000000";
                        }

                    ?>  
                    
                    <input type="text" data-rel="datepicker" name="e_dt" id="e_dt" style="width:100px;<?php echo $colo.";"; ?>" value="<?php echo $str3; ?>" onchange="set_exm_dt(this.value,'<?php echo $row->id; ?>')" />  
                     
                 </td>
                 <td><i id="sign" style="font-size:20px; margin-right:0px;" onclick="open_det_popup(jArray,<?php echo $row->id; ?>)" class="fa fa-info-circle"></i><a href="javascript:void(0);"><i class="fa fa-floppy-o" onclick="Edit(jArray,'<?php echo $row->id; ?>')" style="margin-left:10px;font-size:20px;"></i></a><a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onclick="Download_pdf('<?php echo $row->id; ?>')" style="margin-left:10px;font-size:20px; color:#FF3500;"></i></a><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onclick="Download_Excel('<?php echo $row->id; ?>','<?php echo $row->name; ?>')" style="margin-left:10px;font-size:20px;"></i></a></td>
                  <td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->id; ?>);" class="fa fa-trash-o"></i></td>
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
         <form id="hfield" name="hfield" method="post" action="<?php echo base_url(); ?>index.php/Admin/Fran_Admission">
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


         <form id="formVideo" class="form-horizontal" role="form"  action="<?php echo base_url()."index.php/Admin/Fran_Admission"; ?>"  enctype="multipart/form-data" method="post" name="frm">
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

   <div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade in" > 
             <div  class="modal-dialog modal-lg">
                 <div  class="modal-close" type="button" data-dismiss="modal">
                    <i class="fa fa-times"></i>
                 </div>
                 <div class="modal-content login-social" style="width:378px;margin-left: 285px;">
                    
                         <div class="row">            
                             
                             <div class="col-lg-6" style="background-color:#FFF; margin-left:80px;">               
                               
                                  
                                         <div class="panel-heading login" id="login">
                                             <h4 class="panel-title">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#LogIn" >
                                                     <font size="2" color="#0C84E1">
                                                   Set Exame Date...</font>
                                                 </a>
                                             </h4>
                                         </div>
                                         <div id="LogIn"  class="panel-collapse collapse in" style="border-top: 0px;">
                                           
                                           
                                                     <form method="post" id="loginSubmitbtn" action="<?php echo base_url(); ?>index.php/Admission/save_exame_date">
                                                       
                                                     <div class="row">
                                                         <div class="col-lg-12">     
                                                             <div class="form-group">
                                                              <div class="input-group date">
                                                                <input type="text" data-rel="datepicker" class="form-control" onchange="set_mult_date()" value="<?php echo $str1; ?>" name="exm_dt" id="exm_dt" /><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                              </div>
                                                             </div>
                                                         </div>    
                                                     </div>    
                                                        <input type="hidden" id="hd1" name="hd1" value="">
                                                         <input type="hidden" id="hd2" name="hd2" value=""> 
                                                     <div class="row">
                                                         <div class="col-lg-12 form-group">                                    
                                                             <button class="btn btn-primary btn-block login-social" type="submit">Save Date</button>                                    
                                                         </div>
                                                     </div>
                                                     </form>
                                                    

                                                 
                                             </div>
                                        
                                
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