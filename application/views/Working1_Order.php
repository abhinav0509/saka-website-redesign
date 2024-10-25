
<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/> 
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Style/css/jquery.multiselect.css" />



<script type="text/javascript" src="<?php echo base_url(); ?>Style/js/jquery.multiselect.js"></script>
<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>

<script type="text/javascript">
var j=jQuery.noConflict();
	j(document).ready(function(){
 // j("#ord").addClass('active');
		
	

});


</script>




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
<script type="text/javascript">
var allobj1;
 var obj1;
 var j=jQuery.noConflict();
  j(document).ready(function(){
  j("#ord").addClass("open");
  j("#alert").delay(3200).fadeOut(300);
     Searchh();

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
   j('#fran').val(j('#fr').val());
   
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
            j('#fr').val(j('#fran').val());

            j('#hfield').submit();
       });

});
</script>

<script>
  function Searchh() { 
    
       j("#fran").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Order_management/GetorderData1",
                       data: { term: j("#fran").val()},
                      dataType: "json",
                       success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.Customer_Name,
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
  
  function getPrice(obj,str,stid)
  {
       
        var op="";
       var tr1 = j(obj).closest('tr').attr('id');
       j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/get_course_price',
            type: 'POST',
            data:{'cname':str,'stid':stid},
      
            success: function (data) {
            
            
            alert(data);     
                 var obj = j.parseJSON(data);
                
                 for (i = 0; i < obj.length; i++) {
                     op = "<option>" +obj[i].book_name+ "</option>";
                     j("#" + tr1).find('input#price').val(obj[i].book_price);
                     var t = "<li class=''><label class='ui-corner-all ui-state-hover' title="+obj[i].Price+" for='ui-multiselect-mod-option-0'><input type='checkbox' title='' value="+obj[i].book_name+" name='multiselect_mod' id='ui-multiselect-mod-option-0'><span>"+obj[i].book_name+"</span></label></li>";
                     j("#" + tr1).find('#mod').append(op);
                     
                     alert(op);
                     
                }
               
            j("#mod").multiselect();
        
            },
            error: function () {
                
            }
        });
  }
  function getTotal(obj,str)
  {
     
     var tr1 = j(obj).closest('tr').attr('id');
     var qty=parseInt(str);
     var pr=parseInt(j("#" + tr1).find('input#price').val());
     var tot=pr*qty;
     j("#" + tr1).find('input#tot').val(tot);
  }
  function deleterow(obj)
  {
    var tr1 = j(obj).closest('tr').attr('id');
    var t="#"+tr1;
    if(t=="#clone0")
    {

    }
    else
    {
       j("#" + tr1).remove();
     }  

  }
  

function Delete(id)
{
    if (confirm("Are you sure, you want to Delete It.."))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Book_Data/Delete',
            type: 'POST',
           data:{'action':'delbook','id':id},
      
            success: function (data) {
                 if(data)
        {
        window.location="<?php echo base_url().'index.php/Admin/Book'; ?>"
        }
        
            },
            error: function () {
                
            }
        });
}

function change_status(dt,fid,str)
{
     j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/change_status',
            type: 'POST',
            data:{'dt':dt,'fid':fid,'status':str},
      
            success: function (data) {
                 var obj=j.parseJSON(data);
                 alert(obj.mes);
                 if(data)
                 {
                    window.location="<?php echo base_url().'index.php/Admin/Order'; ?>"
                 }
        
            },
            error: function () {
                
            }
        });
}

function get_order_det_admin(pid,dt,id)
{
    var acc1="getboth";
    var op=""; 
    var tot_qty=0;
    var tot_price=0;
    
    j('#search_dt').val(dt);
    j('#search_id').val(id);

   

    j("#t1").removeClass("active");
    j("#t2").addClass("active");
   
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");

    j("#UpdateBtn").show();
    j("#CancelBtn").show();
    j("#SaveBtn").hide();
    
    j('#ad').html("");
    j('#ad').html("Delete");

   j('#tdata').empty();
   j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/get_order_det_admin',
            type: 'POST',
            data:{'pindex':pid,'odate':dt,'fid':id},
      
            success: function (data) {
               var obj = j.parseJSON(data);
               var obj1=obj['data1'];
               var obj2=obj['data2'];
               
               for (i = 0; i < obj1.length; i++) {
                            
                j('#tdata').append("<tr class='trr'><td title='"+obj1[i].Customer_Name+"'>"+obj1[i].Customer_Name+"</td><td title='"+obj1[i].stud_name+"'>"+obj1[i].stud_name+"</td><td title='"+obj1[i].course_name+"'>"+obj1[i].course_name+"</td><td title='"+obj1[i].Book_Name+"'>"+obj1[i].Book_Name+"</td><td title='"+obj1[i].Status+"'>"+obj1[i].Status+"</td><td title="+obj1[i].price+">"+obj1[i].price+"</td><td title="+obj1[i].Quanitity+">"+obj1[i].Quanitity+"</td><td title="+obj1[i].total+">"+obj1[i].total+"</td></tr>");
                //}
                

        
                }

                j("#Pager1").ASPSnippets_Pager({
                    ActiveCssClass: "current",
                    PagerCssClass: "pager",
                    PageIndex: pid,
                    PageSize: 10,
                    RecordCount:parseInt(obj2)
                });
                
                j("#Pager1 .page").on('click', function () {
                    get_order_det_admin(parseInt(j(this).attr('page')),j('#search_dt').val(),j('#search_id').val());
                    PageIndexCurrent = parseInt(j(this).attr('page'));
                });            
                
            },
            error: function () {
                
            }
        });
        
}

function abc(date1,id1)
{
  j('#hd1').val(date1);
  j('#hd2').val(id1);

  j("#myModal").modal('show');

       j("#rem_send").click(function(){
        
       var remark=j("#rem").val();
       var dt=j("#hd1").val();
       var id=j("#hd2").val();

       j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/add_ord_remark',
            type: 'POST',
            data:{'remark':remark,'id':id,'dt':dt},
      
            success: function (data) {
               var obj=j.parseJSON(data);
               j("#myModal").modal('hide');
               j("#rem").val("");
               j("#hd1").val("");
               j("#hd2").val("");
               
               var msg1="<strong>"+obj.message+"</strong>"; 
                j('#alert1').show();
                j('#alert1').html(msg1);
                j("#alert1").delay(3200).fadeOut(300);
                
               
            },

            error: function () {
                
            }
        });
      

     });//click close

}




function Edit(obj1,id)
{

  
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
      var editor1 = CKEDITOR.instances.Desc;
      if( editor1.mode == 'wysiwyg' )
      {
                  editor1.insertHtml(obj1[0][r].description);
      }
    $('#photo').attr('src', '<?php echo base_url().'uploads/Book/'?>'+obj1[0][r].image+' ');
    $('#photo').show();
     
    
   $('#author').val(obj1[0][r].author_name);
   $('#book').val(obj1[0][r].book_name);
   $('#title').val(obj1[0][r].book_title);
   $('#price').val(obj1[0][r].book_price);
   j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
}
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
.fa-floppy-o:hover{cursor: pointer;}
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
body {
    color: #333;
}
body {
    color: #46484a;
    font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 13px;
    line-height:
  
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
.col-sm-7 h4,p{margin: 10px -17px;}
ul li{list-style: none;}
td:hover{cursor: pointer;}
</style>
<script>
 var an = 0;
 function addnewrow()
 {
        var ddl = $('#clone' + an);
        var d=ddl.clone().attr('id', 'clone' + (++an)).insertAfter(ddl);
        var tr1 = j(d).closest('tr').attr('id');  
        j("#" + tr1).find('input#price').val("");
        j("#" + tr1).find('input#qty').val("");
        j("#" + tr1).find('input#tot').val("");
 }

 function search_data()
{
     j('#fromdt').val(j('#cont').val());
     j('#todate').val(j('#pcont').val());
     j('#fr').val(j('#fran').val());
     j('#pindex').val(1);
     j('#hfield').submit();
}
 function Download_Excel_all()
 {
    var fdate=j("#cont").val();
    var todate=j('#pcont').val();
    var fnm=j('#fran').val();

    window.location="<?php echo base_url(); ?>index.php/Order_management/get_excel_by_cat?fdate="+fdate+"&"+"todate="+todate+"&"+"fnm="+fnm
 }
 function Download_pdf_all()
 {
    var fdate=j("#cont").val();
    var todate=j('#pcont').val();
    var fnm=j('#fran').val();

    window.location="<?php echo base_url(); ?>index.php/Order_management/get_pdf_by_cat?fdate="+fdate+"&"+"todate="+todate+"&"+"fnm="+fnm
 }

 function val()
 { 
    j("#formVideo").validate({
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
  });
 }
 
 function Download_Excel(id,odate)
 {
    
    window.location="<?php echo base_url(); ?>index.php/Order_management/getSingleExcel?id="+id+"&"+"odate="+odate;
 }
 function Download_pdf(id,odate)
 {
   
    window.location="<?php echo base_url(); ?>index.php/Order_management/getsinglepdf?id="+id+"&"+"odate="+odate;
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

 function open_popup(obj1,id)
 {
      var opt="";
      var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].O_Id==id)
         {
           r=i;
         }  
      }
     var stat=obj1[0][r].Admin_Remark;
     if(stat=="")
     {
        stat="No Remark";
     }
    
     var dts=obj1[0][r].o_date.split('-');
     var dts1=dts[2]+"/"+dts[1]+"/"+dts[0];
    
     var path="<?php echo base_url(); ?>Style/images/d.png";
    
     opt  ="<div class='panel-body' style='background-color:#00569d;box-shadow:0px 2px 4px #000'><div class='col-sm-4 text-center'>";
     opt +="<img alt='image' class='img-circle img-profile' style='height:100px;' src='"+path+"'></div>";
     opt +="<div class='col-sm-7 profile-details'><h3><i class=\"fa fa-institution\" style='color:#FFF;'></i> "+obj1[0][r].Customer_Name+"</h3>";
     opt +="<h4 class='thin'><i class=\"fa fa-calendar\" style='color:#FFF;'></i> " +dts1+"</h4>";
     opt += "</div></div>";
     
     opt +="<div class='panel-body'>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-calendar\" style='color:#004884;'></i> Order Date</dt><dd>"+dts1+"</dd></dl>";
     opt +="<dl class='margin-sm-bottom'><dt><i class='fa fa-university' style='color:#004884;'></i> Course</dt><dd>"+obj1[0][r].course_name+"</dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-institution\" style='color:#004884;'></i> Franchisee Name</dt><dd>"+obj1[0][r].Customer_Name+"</dd></dl>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-envelope-o\" style='color:#004884;'></i> Quantity</dt><dd>"+obj1[0][r].Quanitity+"</dd></dl></div>";                              
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-user\" style='color:#004884;'></i>Student Name</dt><dd>"+obj1[0][r].stud_name+"</dd></dl>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-map-marker\" style='color:#004884;'></i> Price</dt><dd>"+obj1[0][r].price+"</dd></dl></div>";
     opt +="</div>";
    
     opt +="<div class='panel-body'>"; 
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-globe\" style='color:#004884;'></i> Admin Remark</dt><dd>"+obj1[0][r].Admin_Remark+"</dd></dl>";
     opt +="<dl class='margin-sm-bottom'><dt></dt><dd></dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-globe\" style='color:#004884;'></i> Deleivery Status</dt><dd>"+obj1[0][r].Status+"</dd></dl>";
     opt +="<dl class='margin-sm-bottom'><dt></dt><dd></dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt></dt><dd></dd></dl>";
     opt +="<dl class='margin-sm-bottom'><dt></dt><dd></dd></dl></div>";
     opt +="</div>";
     
     j("#fdetails").html(opt); 
     j("#mydetModal").modal('show');
   
 }


</script>
  <div class="container-fluid-md">
     
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Orde</a></li>
                 <li id="t2" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Add New Order</a></li>
                   <?php if(isset($message)) { ?>
                 <li class="pull-right">
                        
                        <div class="alert alert-success" id="alert">
                                    <strong><?php echo $message; ?></strong> 
                                </div>
                      
                 </li>
                 <?php } ?>

                  <li class="pull-right">
                        
                        <div class="alert alert-success" id="alert1" style="display:none;">
                                    <strong></strong> 
                                </div>
                      
                 </li>
           </ul>
        <div class="">
              <div class="tab-content">
        
             <input type="hidden" id="search_dt" />
             <input type="hidden" id="search_id" />
        
                <div class="tab-pane active" id="tab1-1">
                 
          <div class="row">
            <?php 
                        $arr1=array();
                        $da1=date('Y/m/d');
                        $arr1 =explode("/",$da1); 
                        $arr1=array_reverse($arr1);
                        $str1 =implode($arr1,"/");
                    ?>
          <div class="col-md-12" style="margin-bottom:36px;">
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
               <input type="text" id="cont" name="cont" class="form-control" data-rel="datepicker" value="<?php echo $str1; ?>" placeholder="Search From Date" required/>
            </div>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                <input type="text" id="pcont" name="pcont" class="form-control" data-rel="datepicker" placeholder="Search To Date" required/>
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
          
          </div>
           <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="5%">Order Date</th>
                          <th width="5%">Franchisee Name</th>
                          <th width="1%">Quantity</th>
                          <th width="1%">Price</th>
                          <th width="5%">Status</th>
                          <th width="5%">Action</th>
                        </tr>
                      </thead>
                        <script>
                           var jArray=[];
                           jArray.push(<?php echo json_encode($Order1); ?>);
                        </script>
                      <tbody id="vdata" style="font-size:12px;">
                          <?php if(!empty($Order1)) { foreach($Order1 as $ord){ ?>
                          <tr>
                          <td>
                            <?php
                                $dat=$ord->o_date;
                                $farr1=array();
                                $farr1 =explode("-",$dat); 
                                $farr1=array_reverse($farr1);
                                $str2 =implode($farr1,"-");
                                echo $str2=str_replace("-", "/", $str2);
                             ?>
                          </td>
                          <td title="<?php echo $ord->Customer_Name; ?>"><?php echo $ord->Customer_Name; ?></td>
                          <td title="<?php echo $ord->Total_quantity; ?>"><?php echo $ord->Total_quantity; ?></td>
                          <td title="<?php echo $ord->Total_Price; ?>"><?php echo $ord->Total_Price; ?></td>
                          <td>
                             <select name="stat" id="stat" onchange="change_status('<?php echo $ord->o_date; ?>','<?php echo $ord->f_id; ?>',this.value)">
                                  <option value="Pending" <?php if($ord->Status=="Pending"){ ?>selected='selected'<?php } ?>>Pending</option>
                                  <option value="Dispatch" <?php if($ord->Status=="Dispatch"){ ?>selected='selected'<?php } ?>>Dispatch</option>
                             </select>
                          </td> 
                          
                          <td>                  
                           <i class="fa fa-floppy-o" id="signe" data-toggle="modal" onClick="abc('<?php echo $ord->o_date; ?>','<?php echo $ord->f_id; ?>')" style="margin-left:10px;font-size:20px;color:#357ebd;margin-right:10px;" title="Add Remark"></i>
                           <i id="signe" style="font-size:20px; margin-right:0px;" onclick="get_order_det_admin(1,'<?php echo $ord->o_date; ?>','<?php echo $ord->f_id; ?>')" class="fa fa-info-circle"></i><!--<a href="javascript:void(0);" onclick="get_order_det_admin('<?php echo $ord->o_date; ?>','<?php echo $ord->f_id; ?>')" title="View Detailed Order"><i class="fa fa-credit-card" style="font-size:20px;"></i></a>-->
                            <a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onclick="Download_pdf('<?php echo $ord->f_id; ?>','<?php echo $ord->o_date; ?>')" style="margin-left:10px;font-size:20px; color:#FF3500;"></i></a><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onclick="Download_Excel('<?php echo $ord->f_id; ?>','<?php echo $ord->o_date; ?>')" style="margin-left:10px;font-size:20px;"></i></a>
                          </td>  
                          </tr> 
                          <?php } }else{ ?>        
                          <td colspan="10">
                          <div class="alert alert-info">
                                <strong><?php echo "No order data found.....!";?></strong>
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
          <?php }?>
                  </div>
            </div>
             
                <div class="tab-pane" id="tab1-2">
         <form id="hfield" action="<?php echo base_url(); ?>index.php/Admin/Order" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
                    <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />

                    <input type="hidden" name="fromdt" id='fromdt' value="<?php echo $dt['from_date']; ?>" />
                    <input type="hidden" name="todate" id='todate' value="<?php echo $dt['to_date']; ?>" />
                    <input type="hidden" name="fr" id='fr' value="<?php echo $dt['franch']; ?>" />
         </form>

         <form id="formVideo" class="form-horizontal" action="<?php echo base_url()."index.php/Order_management/Insert_order"; ?>"  enctype="multipart/form-data" method="post" name="frm">
               <table class="table">
                      <thead>
                        <tr style="background-color:#d7dadc;">                          
                          <th width="8%">Franchisee Name</th>
                          <th width="8%">Student Name</th>
                          <th width="8%">Course</th>
                          <th width="8%">Modules</th>
                          <th width="3%">Status</th>
                          <th width="3%">Price</th>
                          <th width="3%">Quantity</th>
                          <th width="3%">Total</th>
                        </tr>
                      </thead>
          
          <tbody id="tdata" style="font-size:12px;">
           

          </tbody>
        </table>
        <div id="Pager1" class="pager">
          
          
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
                             
                             <div class="col-lg-6" style="background-color:#FFF;">               
                               
                                  
                                         <div class="panel-heading login" id="login">
                                             <h4 class="panel-title">
                                                 <a data-toggle="collapse" data-parent="#accordion" href="#LogIn" >
                                                     <font size="2" color="#0C84E1">
                                                   Admin Remark...</font>
                                                 </a>
                                             </h4>
                                         </div>
                                         <div id="LogIn"  class="panel-collapse collapse in" style="border-top: 0px;">
                                           
                                           
                                                     <form method="post" id="loginSubmitbtn" action="<?php echo base_url(); ?>index.php/Order_management/Add_Remark">
                                                       
                                                     <div class="row">
                                                         <div class="col-lg-12">     
                                                             <div class="form-group">
                                                                <textarea class="text requiredField"  rows="4" cols="40"  class="form-control"  id="rem" name="rem"></textarea>
                                                               
                                                             </div>
                                                         </div>    
                                                     </div>    
                                                        <input type="hidden" id="hd1" name="hd1" value="">
                                                         <input type="hidden" id="hd2" name="hd2" value=""> 
                                                     <div class="row">
                                                         <div class="col-lg-12 form-group">                                    
                                                             <button class="btn btn-primary btn-block login-social" id="rem_send" type="button">Save Remark</button>                                    
                                                         </div>
                                                     </div>
                                                     </form>
                                                    

                                                 
                                             </div>
                                        
                                
                             </div>
                         </div>

</div>
</div>
</div>
  <!--Pop Up End-->

  <div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="mydetModal" class="modal fade in" > 
             <div  class="modal-dialog modal-lg">
                 
                 <div class="modal-content login-social" style="">
                    
                          
    <div class="panel panel-default panel-profile-details" >
     
                
    <div class="panel-body" style="padding:0;height:150px;">

            <div class="col-md-12 col-lg-12" style="padding:0;">
                 <ul style="margin:0px;">
                   <li class="pull-right">
                        
                        <div class="alertt alert-successs" id="alert3">
                                    <strong>Franchise Information</strong> 
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