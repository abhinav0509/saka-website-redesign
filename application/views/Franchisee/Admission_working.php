
 <script src="<?php echo  base_url();?>Style/dist/js/fran_admission1.js"></script> 
 <script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>       
 <script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
 <link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>  
 <script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
 

 
 <script src="<?php echo base_url();?>Style/dist/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
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
td:hover{cursor: pointer;}
 </style> 
<script>
var obj1;
var city_id11;
  var j=jQuery.noConflict();
  var Frarr =[];
  var opt1="";
  j(document).ready(function(){

  change_noti_stat();  
  eachcheck('','loding');
  j("#alert").delay(3200).fadeOut(300);
  
  j("#book").addClass("open");
 
  var t=j('#storeArrayvalue') .val();
 

   var dt= new Date();

   j('#doa').datepicker({
        autoclose: true,
        todayHighlight: true,
       dateFormat: 'dd-mm-yy',
       onSelect: function(dateText){
            getDuration();
       }
    });

   j('#cont').datepicker({
        autoclose: true,
        todayHighlight: true
    });

   j('#pcont').datepicker({
        autoclose: true,
        todayHighlight: true
    });
   
   j('#inputTimepickerDropdown').timepicker({
        autoclose: true,
        todayHighlight: true
    });
   
    
    j('#cont').val(j('#fromdt').val());
    j('#pcont').val(j('#todate').val());
    j('#cou').val(j('#c').val());
    j('#fran').val(j('#s').val());
    
  
  

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
            PageSize: 5,
            RecordCount: parseInt(rcount)

        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');
          
             j('#pindex').val(pageindex);
             j('#fromdt').val(j('#cont').val());
             j('#todate').val(j('#pcont').val());
             j('#s').val(j('#fran').val());
             j('#c').val(j('#cou').val());


            j('#hfield').submit();

   }); 
   


    Search();
    Search1();
   

    j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master',
          type: 'post',
          data: {'action': 'Country'},
          success: function(data) {
           
           var obj = j.parseJSON(data);
           j('#state').append("<option>Select</option>");
           j('#st').append("<option value=''>Select State</option>");
           for(i=0;i<obj.length;i++)
              { 
                j('#state').append("<option value=\""+obj[i].state_id+"\">"+obj[i].name+"</option>");
                j('#st').append("<option value=\""+obj[i].state_id+"\">"+obj[i].name+"</option>");
               }
           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      }); 
       
       j('#state').change(function(){
         j('#city').empty();
         j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/getcity',
          type: 'post',
          data: {'cntid':j(this).val()},
          success: function(data, status) {
           var obj = j.parseJSON(data);
           j('#city').append("<option>Select</option>");
          
           for(i=0;i<obj.length;i++)
              { 
                j('#city').append("<option value=\""+obj[i].city_id+"\">"+obj[i].name+"</option>");
              }
               city_change();          
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
            url: '<?php echo base_url(); ?>index.php/Franchisee/Admission',
            type: 'POST',
            data:{'fdate':j('#cont').val(),'todate':j('#pcont').val()},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                 alert(data);
                 for(i=0;i<obj.length;i++)
                 { 
                     j('#tdata').append("<tr id='B"+obj[i].id+"'><td>"+obj[i].id+"</td><td>"+obj[i].fran_Name+"</td><td>"+obj[i].name+"</td><td>"+obj[i].contact+"</td><td>"+obj[i].course_Name+"</td><td>"+obj[i].timing+"</td><td><img id='img"+obj[i].id+"' src='<?php echo base_url() ?>uploads/Admission/"+obj[i].image+"' style='height:64px; width:70px;'/></td><td><a href='javascript:void(0);' title='Download Pdf'><i class=\"fa fa-file-pdf-o\" onclick='Download_pdf("+obj[i].id+")' style='margin-left:10px;font-size:20px; color:#FF3500;'></i></a><a href='javascript:void(0);' title='Download Excel'><i class=\"fa fa-file-excel-o\" onclick=\"Download_Excel("+obj[i].id+",'"+obj[i].stud_name+"')\" style='margin-left:10px;font-size:20px;'></i></a></td><td><a href='javascript:void(0);'><i class=\"fa fa-floppy-o\" onclick='Edit(jArray,"+obj[i].id+")' style='margin-left:10px;font-size:20px;'></i></a></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='DeleteDB(" + obj[i].id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
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
            url: '<?php echo base_url(); ?>index.php/Franchisee/Admission',
            type: 'POST',
            data:{'sname':j('#fran').val()},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                 alert(data);
                 for(i=0;i<obj.length;i++)
                 { 
                     j('#tdata').append("<tr id='B"+obj[i].id+"'><td>"+obj[i].id+"</td><td>"+obj[i].fran_Name+"</td><td>"+obj[i].name+"</td><td>"+obj[i].contact+"</td><td>"+obj[i].course_Name+"</td><td>"+obj[i].timing+"</td><td><img id='img"+obj[i].id+"' src='<?php echo base_url() ?>uploads/Admission/"+obj[i].image+"' style='height:64px; width:70px;'/></td><td><a href='javascript:void(0);' title='Download Pdf'><i class=\"fa fa-file-pdf-o\" onclick='Download_pdf("+obj[i].id+")' style='margin-left:10px;font-size:20px; color:#FF3500;'></i></a><a href='javascript:void(0);' title='Download Excel'><i class=\"fa fa-file-excel-o\" onclick=\"Download_Excel("+obj[i].id+",'"+obj[i].stud_name+"')\" style='margin-left:10px;font-size:20px;'></i></a></td><td><a href='javascript:void(0);'><i class=\"fa fa-floppy-o\" onclick='Edit(jArray,"+obj[i].id+")' style='margin-left:10px;font-size:20px;'></i></a></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='DeleteDB(" + obj[i].id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
                 }
        
            },
            error: function () {
                
            }
        });

      }
 
    });//Keypress

/******************************************************    End ********************************************/

/******************************  Course Wise Search ******************************************/
    j("#cou").keypress(function(event){
       
         if(event.which == 13) { 
         
          j('#tdata').empty();
           j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Franchisee/Admission',
            type: 'POST',
            data:{'cname':j('#cou').val()},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                // alert(data);
                 for(i=0;i<obj.length;i++)
                 { 
                     j('#tdata').append("<tr id='B"+obj[i].id+"'><td>"+obj[i].id+"</td><td>"+obj[i].fran_Name+"</td><td>"+obj[i].name+"</td><td>"+obj[i].contact+"</td><td>"+obj[i].course_Name+"</td><td>"+obj[i].timing+"</td><td><img id='img"+obj[i].id+"' src='<?php echo base_url() ?>uploads/Admission/"+obj[i].image+"' style='height:64px; width:70px;'/></td><td><a href='javascript:void(0);' title='Download Pdf'><i class=\"fa fa-file-pdf-o\" onclick='Download_pdf("+obj[i].id+")' style='margin-left:10px;font-size:20px; color:#FF3500;'></i></a><a href='javascript:void(0);' title='Download Excel'><i class=\"fa fa-file-excel-o\" onclick=\"Download_Excel("+obj[i].id+",'"+obj[i].stud_name+"')\" style='margin-left:10px;font-size:20px;'></i></a></td><td><a href='javascript:void(0);'><i class=\"fa fa-floppy-o\" onclick='Edit(jArray,"+obj[i].id+")' style='margin-left:10px;font-size:20px;'></i></a></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='DeleteDB(" + obj[i].id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
                 }
        
            },
            error: function () {
                
            }
        });

      }
 
    });//Keypress

/******************************************************    End ********************************************/


j("#course").change(function()
{
	var mname=j("#course").val();
	//alert(mname);
	j.ajax({
			url: '<?php echo  base_url(); ?>index.php/Franchisee/GetModule',
			type :'POST',
			data: {'mname1':mname},
			success: function (data)
			{
				 var obj = j.parseJSON(data);
				
				j("#hid2").val(obj);
				
			},
			error: function()
			{
				
			}
		
	});
	
});





});

function change_noti_stat()
{
  j.ajax({
      url: '<?php echo base_url(); ?>index.php/Notifications/fran_stud_admission_status',
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
function search_data()
{
             j('#pindex').val(1);
             j('#fromdt').val(j('#cont').val());
             j('#todate').val(j('#pcont').val());
             j('#s').val(j('#fran').val());
             j('#c').val(j('#cou').val());
             j('#hfield').submit();
}

function getcourse(str)
{

     j('#tdata').empty();
           j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Franchisee/Admission',
            type: 'POST',
            data:{'cname':str},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                // alert(data);
                 for(i=0;i<obj.length;i++)
                 { 
                     j('#tdata').append("<tr id='B"+obj[i].id+"'><td>"+obj[i].id+"</td><td>"+obj[i].fran_Name+"</td><td>"+obj[i].name+"</td><td>"+obj[i].contact+"</td><td>"+obj[i].course_Name+"</td><td>"+obj[i].timing+"</td><td><img id='img"+obj[i].id+"' src='<?php echo base_url() ?>uploads/Admission/"+obj[i].image+"' style='height:64px; width:70px;'/></td><td><a href='javascript:void(0);' title='Download Pdf'><i class=\"fa fa-file-pdf-o\" onclick='Download_pdf("+obj[i].id+")' style='margin-left:10px;font-size:20px; color:#FF3500;'></i></a><a href='javascript:void(0);' title='Download Excel'><i class=\"fa fa-file-excel-o\" onclick=\"Download_Excel("+obj[i].id+",'"+obj[i].stud_name+"')\" style='margin-left:10px;font-size:20px;'></i></a></td><td><a href='javascript:void(0);'><i class=\"fa fa-floppy-o\" onclick='Edit(jArray,"+obj[i].id+")' style='margin-left:10px;font-size:20px;'></i></a></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='DeleteDB(" + obj[i].id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
                 }
        
            },
            error: function () {
                
            }
        });
}
function Download_Excel(id,name)
 {
    
    window.location="<?php echo base_url(); ?>index.php/Admission/getadmissionsingleExcel?id="+id+"&"+"name="+name;
 }
 function Download_pdf(id)
 {
   
    window.location="<?php echo base_url(); ?>index.php/Admission/getadmissionsinglepdf?id="+id;
 }

 function Download_Excel_all()
 {
    var fdate=j("#cont").val();
    var todate=j('#pcont').val();
    var course=j('#cou').val();
    var stud=j('#fran').val();
    window.location="<?php echo base_url(); ?>index.php/Franch_enquiery_excel/getfranadmissionexcel?fdate="+fdate+"&"+"todate="+todate+"&"+"course="+course+"&"+"stud="+stud
 }
 function Download_pdf_all()
 {
    var fdate=j("#cont").val();
    var todate=j('#pcont').val();
    var course=j('#cou').val();
    var stud=j('#fran').val();
    window.location="<?php echo base_url(); ?>index.php/Franch_enquiery_excel/getAdmissioncatpdf?fdate="+fdate+"&"+"todate="+todate+"&"+"course="+course+"&"+"course="+course+"&"+"stud="+stud

 }


function Search() { 
       var j = jQuery.noConflict(); 
    
       j("#fran").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Franchisee/GetAdmissionData",
                       data: { term: j("#fran").val()},
                      dataType: "json",
                       success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.name,
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

function Search1() { 
       var j = jQuery.noConflict(); 
    
       j("#cou").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Franchisee/getCourseauto",
                       data: { term: j("#cou").val()},
                      dataType: "json",
                       success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.Course_Name,
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
                  j('#cou').val(ui.item.label);
                  return false;
              }
          });
}


function Delete(id)
{
    //alert(id);
    if (confirm("Are you sure, you want to Delete It.."))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Admission/Delete_Data',
            type: 'POST',
           data:{'action':'delbook','id':id},
      
            success: function (data) {
              alert("Recird Deleted Successfully..");
                 if(data)
        {
        window.location="<?php echo base_url().'index.php/Franchisee/Admission'; ?>"
        }
        
            },
            error: function () {
                
            }
        });
}

function Edit(obj1,id)
{
    
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
   
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
    j('form').attr("action", "<?php echo base_url().'index.php/Admission/addmissin_update';?>"); 
     var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].id==id)
         {
            r=i;
         
         }  
      }
   

    j('#photo').attr('src', '<?php echo base_url().'uploads/Admission/'?>'+obj1[0][r].image+' ');

 
    j('#photo').show();
     
     var dts=obj1[0][r].course_date.split('-');
     var dts1=dts[2]+"/"+dts[1]+"/"+dts[0];

     var edts=obj1[0][r].exame_date.split('-');
     var edt1=edts[2]+"/"+edts[1]+"/"+edts[0];
    
   j('#sname').val(obj1[0][r].name);
   j('#add').val(obj1[0][r].add);
   j('#eml').val(obj1[0][r].email);
   j('#cnt').val(obj1[0][r].contact);
   j('#quali').val(obj1[0][r].qualification);
   j('#tfee').val(obj1[0][r].tfee);
   j('#edt').val(edt1);

    

   j('#doa').val(dts1);
   city_id11=obj1[0][r].city;
   j('#inputTimepickerDropdown').val(obj1[0][r].timing);
   
    j('#state option').each(function () {
       if (j(this).val() == obj1[0][r].state) {
             j(this).attr('selected', 'selected');
          }
    });

    j('#state').trigger('change');
  
    j('#course option').each(function () {
       if (j(this).val() == obj1[0][r].course_Name) {
             j(this).attr('selected', 'selected');
          }
    });

     j('#bid').val(id);
     j("#SaveBtn").hide();
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
    
}

function city_change()
{
  if(city_id11!="")
  {
     j('#city option').each(function () {
       if (j(this).val() == city_id11) {
             j(this).attr('selected', 'selected');
          }
    });

  }
}
function Edit1(obj1,id)
{
    
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
   
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
    j('form').attr("action", "<?php echo base_url().'index.php/Admission/addmissin_update';?>"); 
     var r;
      for(i=0;i<obj1.length;i++)
      {
         if(obj1[i].id==id)
         {
            r=i;
         
         }  
      }
   

    $('#photo').attr('src', '<?php echo base_url().'uploads/Admission/'?>'+obj1[r].image+' ');

 
    $('#photo').show();
     
    
   $('#sname').val(obj1[r].name);
   $('#add').val(obj1[r].add);
   $('#eml').val(obj1[r].email);
   $('#cnt').val(obj1[r].contact);
   $('#quali').val(obj1[r].qualification);

    var dts=obj1[r].course_date.split('-');
    var dts1=dts[2]+"/"+dts[1]+"/"+dts[0];

   $('#doa').val(dts1);
   $('#inputTimepickerDropdown').val(obj1[r].timing);
   
    j('#state option').each(function () {
       if (j(this).val() == obj1[r].state) {
             j(this).attr('selected', 'selected');
          }
    });
    j('#city option').each(function () {
       if (j(this).val() == obj1[r].city) {
             j(this).attr('selected', 'selected');
          }
    });
    j('#course option').each(function () {
       if (j(this).val() == obj1[r].course_Name) {
             j(this).attr('selected', 'selected');
          }
    });

     j('#bid').val(id);
     j("#SaveBtn").hide();
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
    
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

</script>
<style>
 td p{
  text-align:justify;
  margin-right:12%;
   width:160px; 
   height: 30px;
   overflow-y: auto;
   }  
   .col-sm-3 ul{
     width:auto;
   }
   .col-sm-3 ul li{
     width:auto;
     display: inline-block;
   }
   .panel-body {
  padding: 15px;
  border: 1px solid #f5f5f5;
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
    margin-top: -17px;
    padding: 4px 12px;
}
.unread{
  background-color: #f5f6f7;
}
ul li{list-style: none;}
</style>
<script>
 function val()
 { 
    /*j("#formVideo").validate({
  rules:{
       book:"required",
       author:"required",
       title:"required",
       price:"required",
       upload:"required",
       },
    message:{
      book:"Please Provide The Book Name",
      author:"Please Provide The Author Name",
      title:"Please Provide The Tilte",
      price:"Please Provide The Price Of Book",
      upload:"Please Upload The Image"
      }
  })*/;
 }
 function getDuration()
 {
    str=j('#course').val();
     j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Admission/get_duration',
            type: 'POST',
           data:{'course':str},
      
            success: function (data) {
             
                 var obj = j.parseJSON(data);
                 var du="";
                
                 for(i=0; i < obj.length; i++)
                 {
                     du=parseInt(obj[i].Duration);
                    
                 }     
                 var dt=j('#doa').val();
                 var data=dt.split('/');

                var d=new Date();
                d.setFullYear(parseInt(data[2]));
                d.setMonth(parseInt(data[1]));
                d.setDate(parseInt(data[0]));
                d.setHours(d.getHours()+du);
                var new_date=d.getDate()+"/"+d.getMonth()+"/"+d.getFullYear();
                j('#edt').val(new_date);
        
            },
            error: function () {
                
            }
        });
 }

 function clickAction(obj) {
    var dt =[];
    var t=j('#storeArrayvalue').val();
    dt=t.split(',');
  
    if(t!="")
    {
      j('#hfield').attr("action", "<?php echo base_url(); ?>/index.php/Notifications/del_Franch_admission_by_check?Action="+obj);
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

     var dts2=obj1[0][r].exame_date.split('-');
     var dts3=dts2[2]+"/"+dts2[1]+"/"+dts2[0];
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
     opt +="</div>";

     opt +="<div class='panel-body'>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-book\" style='color:#004884;'></i> Selected Course</dt><dd>"+obj1[0][r].course_Name+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-calendar\" style='color:#004884;'></i> Admission Date</dt><dd>"+dts1+"</dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-tags\" style='color:#004884'></i> Qualification</dt><dd>"+obj1[0][r].qualification+"</dd></dl><br>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-calendar\" style='color:#004884;'></i> Exame Date</dt><dd>"+dts3+"</dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-clock-o\" style='color:#004884'></i> Batch Time</dt><dd>"+obj1[0][r].timing+"</dd></dl><br>";
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
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Admission</a></li>
                 <li id="t2" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Add Admission</a></li>
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
        <div class="">
              <div class="tab-content">
        <div class="tab-pane active" id="tab1-1">
        
        <div class="table-responsive">
              <div class="row">
                  <div class="col-md-12" style="margin-bottom:15px;margin-top:-8px;">
                         <?php 
                            $arr1=array();
                            $da1=date('Y/m/d');
                            $arr1 =explode("/",$da1); 
                            $arr1=array_reverse($arr1);
                            $str1 =implode($arr1,"/");
                         ?>
                      <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                      <input type="cont" id="cont" name="cou" class="form-control" data-rel="datepicker" value="<?php echo $str1; ?>" placeholder="Search From Date" required/>                
                      </div>
                      <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                      <input type="pcont" id="pcont" name="pcont" class="form-control" data-rel="datepicker" placeholder="Search To Date" required/>           
                      </div>
                      <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                      <select name="cou" id="cou" class="form-control">
                      <option value="">select Course</option>
                       <?php foreach($courses as $co) { ?>
                         <option><?php echo $co->Course_Name; ?></option>
                        <?php } ?> 
                    </select>
                   
                      </div>
                   <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                     <input type="text" id="fran" name="fran" class="form-control" placeholder="Search By Student" required/>
                  </div>
                  <div class="col-sm-2 pull-right">
                     <ul style="list-style:none;">
                        <li class="pull-right"><a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onclick="Download_pdf_all()" style="font-size:28px; margin-left:10px; height:0px; color:#FF3500;"></i></a></li>
                        <li class="pull-right"><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onclick="Download_Excel_all()" style="font-size:28px; height:0px; color:#357ebd; margin-left:10px;"></i></a></li>
                     </ul>
                  </div>
                   <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                      <a class="btn btn-primary" onclick="search_data()">
                        <i class="fa fa-search"></i> Search
                      </a>
                      </div>
                   </div>
              </div>
         
                    <!--<table id="table-hidden-row-details" class="table table-striped">-->
              <table id="table-hidden-row-details" class="table table-striped">
              <thead>
                <tr style="background-color:#d7dadc;">
                                    
									

                                        <th width="1%"></th>
                                    <th width="1%">
                            <div class="btn-group btn-group-sm btn-group-text-normal ">
                             <span style="white-space: nowrap; background: #fff none repeat scroll 0 0;padding: 2px 9px 1px 10px;" >
                                <input type="checkbox" id="titlechk" onchange="eachcheck(this,'title')"  /> &nbsp;
                                <i class="fa fa-caret-down dropdown-toggle" data-toggle="dropdown" style="cursor:pointer"></i>
                               
                                <ul class="dropdown-menu" role="menu">
                         <!--           <li><a href="javascript:;" onclick="clickpoup('All')">All</a></li>
                                    <li><a href="javascript:;" onclick="clickpoup('None')">None</a></li>-->
                                     <li><a href="javascript:;" onclick="eachcheck(this,'AllNone')">All None</a></li>                                   
                                     <li class="divider"></li>
                                     <li>
                                         <a title="Analytics Overview" href="javascript:;" onclick="clickAction('Delete')">
                                            <i class="fa fa-fw fa-caret-right"></i> Delete
                                            <span class="label label-danger pull-right">New</span>
                                          </a>     
                                     </li>
                                </ul>
                            </span> 
                             </div></th>
                                
                    <th width="2%">Stud Id</th>
                    <th width="10%">Student Name</th>
                    <th width="10%">Email</th>
                    <th width="5%">Contact</th>
                    <th width="5%">Course</th>
                    <th width="7%">Admission Date</th>
                    <th width="3%">Timing</th>
                    <th width="5%">Image</th>
                    <th width="5%">Download</th>
                    <th width="3%">Edit</th>
                    <th width="3%">Delete</th>
                    <th width="8%" style="display:none;">Franchisee Name</th>
                    <th width="5%" style="display:none;">Address</th>
                    <th width="5%" style="display:none;">State</th>
                    <th width="5%" style="display:none;">City</th>
                    <th width="10%" style="display:none;">Qualification</th>
                    <th width="5%" style="display:none;">Center</th>
                    <th width="5%" style="display:none;">Exam Status</th>
                    <th width="5%" style="display:none;">Admin Remark</th>
                    <th width="5%" style="display:none;">Admin Remark</th>
                  </tr>
                  </thead>
                  <script>
                    var jArray=[];
                     jArray.push(<?php echo json_encode($Order1); ?>);
                  </script>
                   <tbody id="tdata" style="font-size:12px;">
                  <?php   
                  if(!empty($Order1)) { foreach($Order1 as $row)
                  { 
                  ?>
                  <tr class="<?php echo $row->exm_dt_stat; ?>">
                  <td> <i class="fa fa-plus"></i></td>
                  <td><input type="checkbox" id="<?php echo $row->id; ?>" onchange="eachcheck(this,'subtitle');"  /></td>
                  <td><?php echo $row->stud_id; ?></td>
                  <td><?php echo $row->name; ?></td>
                  <td><?php echo $row->email; ?></td>
                  <td><?php echo $row->contact; ?></td>
                  <td><?php echo $row->course_Name; ?></td>
                  <td>
                    <?php $jdt=$row->course_date;
                        $sarr1=array();
                            
                            $sarr1 =explode("-",$jdt); 
                            $sarr1=array_reverse($sarr1);
                            echo $sarr1 =implode($sarr1,"-");
                            //echo $fstr2 =str_replace("/","-",$fstr2);
                         ?>

                  </td>
                  <td><?php echo $row->timing; ?></td>
                  <td><img src="<?php echo base_url(); ?>uploads/Admission/<?php echo $row->image; ?>" style="height:64px; width:70px;"></img></td>
                  <td><i id="sign" style="font-size:20px; margin-right:0px;" onclick="open_det_popup(jArray,<?php echo $row->id; ?>)" class="fa fa-info-circle"></i><a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onclick="Download_pdf('<?php echo $row->id; ?>')" style="margin-left:10px;font-size:20px; color:#FF3500;"></i></a><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onclick="Download_Excel('<?php echo $row->id; ?>','<?php echo $row->name; ?>')" style="margin-left:10px;font-size:20px;"></i></a></td>
                  <td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->id; ?>);" class="fa fa-edit"></i></td>
                  <td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->id; ?>);" class="fa fa-trash-o"></i></td>
                  
                  <td style="display:none;"><?php echo $row->fran_Name; ?></td>
                  <td style="display:none;"><?php echo $row->add; ?></td>
                  <td style="display:none;"><?php echo $row->state; ?></td>
                  <td style="display:none;"><?php echo $row->city; ?></td>
                  <td style="display:none;"><?php echo $row->qualification; ?></td>
                  <td style="display:none;"><?php echo $row->center_name; ?></td>
                  <td style="display:none;">
                    <?php $edtt=$row->exame_date; 

                            $farr1=array();                            
                            $farr1 =explode("-",$edtt); 
                            $farr1=array_reverse($farr1);
                            $fstr1 =implode($farr1,"-");
                            echo $fstr1 =str_replace("/","-",$fstr1);
                         
                    ?>
                  </td>
                  <td style="display:none;"><?php echo $row->course_date; ?></td>
                  <td style="display:none;"><?php echo $row->exame_date; ?></td>
                                    
                  </tr>                  
                  <?php } } else { ?>

    
                  <tr>
                  <td colspan="13">
                    <div class="alert alert-info">
                      <strong><?php echo "No todays Admission found.....!";?></strong>
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
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                  <td style="display:none;"></td>
                                    
                 
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
                 <form id="hfield" action="<?php echo base_url(); ?>index.php/Franchisee/Admission" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
                    <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />

                    <input type="hidden" name="fromdt" id='fromdt' value="<?php echo $dt['from_date']; ?>" />
                    <input type="hidden" name="todate" id='todate' value="<?php echo $dt['to_date']; ?>" />
                    <input type="hidden" name="s" id='s' value="<?php echo $dt['sname']; ?>" />
                    <input type="hidden" name="c" id='c' value="<?php echo $dt['cname']; ?>" />
                    <input type="hidden" id="storeArrayvalue" value="<?php if(isset($dt['storeArrayvalue'])){echo $dt['storeArrayvalue']; } ?>" name="storeArrayvalue"/> 
               </form>
                
         <form id="formVideo" class="form-horizontal" role="form"  action="<?php echo base_url()."index.php/Admission/Fran_Admission"; ?>"  enctype="multipart/form-data" method="post" name="frm">
            <div class="panel panel-default">
                    <div class="panel-heading">
          
          <h4 class="panel-title">Admission Form</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                          
                        </div>
          
          
          </div>
      
      
      <div class="panel-body">
      <div class="col-sm-6" style="margin-top:1%;">
          
       <?php 
          $fdata->institute_name;
          $str1=substr($fdata->fran_id,0,-1);
          $frr=substr($fdata->institute_name,0,3);
          $id=$fdata->fran_id."/".$max_id;
        ?>          
    
       <input type="hidden" name='max_id' value="<?php echo $max_id; ?>" />
        <div class="form-group">
              <label class="col-sm-4 control-label" for="inputPassword3">Student Reg Id<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                             <input type="text" id="sid" name="sid" class="form-control" value="<?php echo $id; ?>" readonly="true" required title="Please Enter Student Name" />
                            </div>
        </div>

       <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Student Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="sname" name="sname" class="form-control" required title="Please Enter Student Name" />
                            </div>
                          </div>
             
              <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Address<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="add" name="add" class="form-control" required title="Enter Student Address"/>
                            </div>
                          </div>
              
              <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Email-Id<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="email" id="eml" name="eml" class="form-control" title="Plase Enter Valid Email Id"/>
                            </div>
                          </div>
              
              <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Contact<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="cnt" name="cnt" class="form-control" pattern="([0-9]{10,10})" title="Please Enter Valid Contact No 10 digits required" required/>
                            </div>
                          </div>
              
               <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">State<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                                <select name="state" id="state" class="form-control" required title="Please Select State">
                                      <option value="">Select State</option>
                                      <?php foreach($states as $st) { ?>
                                      <option><?php echo $st->name; ?></option>
                                      <?php } ?>  
                                </select>  
                            </div>
                          </div>
                           
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">City<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                                <select name="city" id="city" class="form-control" required title="Please Select City">
                                      <option value="">Select City</option>
                                      <?php foreach($cities as $cit) { ?>
                                      <option><?php echo $cit->name; ?></option>
                                      <?php } ?> 
                                </select>  
                            </div>
                          </div>

									
      
       </div>
            
            
            <div class="col-sm-6" style="margin-top:1%;">
            
            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Qualification<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="quali" name="quali" class="form-control" required title="Enter Student Qualification" />
                            </div>
                          </div>
              
              <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Course<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                                <select name="course" id="course" class="form-control" onchange="getDuration()" required title="Please Select Course">
                                      <option value="">Select Course</option>
                                       <?php foreach($courses as $co) { ?>
                                      <option><?php echo $co->Course_Name; ?></option>
                                      <?php } ?> 
                                </select>  
                            </div>
                          </div>
						  
						  
						<input type="hidden" id="hid2" name="hid2">
						  
						  
						  
						  
              
              <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Center<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="cent" name="cent" readonly="true" value="<?php echo $fdata->institute_name; ?>" class="form-control" required/>
                            </div>
                          </div>
              
              <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Date Of Admission<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="doa" name="doa" onchange="getDuration()" class="form-control" data-rel="datepicker" value="<?php echo date('d/m/Y'); ?>" required title="Please Select Admission Date" />
                            </div>
                          </div>

                           <div class="form-group"  style="display:none;">
                            <label class="col-sm-4 control-label" for="inputPassword3">Exame Date<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <!--<input type="text" id="edt" name="edt" class="form-control" readonly="true" value="" required title="Please Select Admission Date" />-->
                             
                             <span style="color:red;"> <span class="asterisk">*</span>student will be appear for exam after above date</span>
                            </div>
                          </div>
                          <input type="hidden" name="edt" id="edt" />

                          <input type="hidden" id="bid" name="bid" value="" />
              
               <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Batch Timing<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" name="btime" class="form-control" data-rel="timepicker" id="inputTimepickerDropdown" data-template="dropdown" data-show-meridian="true" data-minute-step="10" required title="Please Select Batch Timing" />
                            </div>
                          </div>
               
               <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Total Fee<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                            <input type="text" id="tfee" name="tfee" class="form-control" required title="Pleases Type Fees Here" style="padding-top:0px;"/>
                            </div>
                          </div>            
               
               <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Image<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                            <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" style="padding-top:0px;"/>
                            </div>
                          </div>
               <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="" id="prelbl">
                            </label>
                            <div class="col-sm-8">
                              <img  src="<?php echo base_url(); ?>/Style/images/placement/d.png" style="height:150px; width:150px;" id="photo"/>                                
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
                                    <strong>Student Information</strong> 
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