
<script src="<?php echo base_url();?>Style/try/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>Style/try/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/try/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/> 
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Style/css/jquery.multiselect.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>Style/js/jquery.multiselect.js"></script>
<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
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
  j("#book").addClass("open");
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

function get_order_det_admin(dt,id)
{
    var acc1="getboth";
    var op=""; 
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
            data:{'odate':dt,'fid':id},
      
            success: function (data) {
               var obj = j.parseJSON(data);
               for (i = 0; i < obj.length; i++) {
                            
                j('#tdata').append("<tr class='trr'><td>"+obj[i].Customer_Name+"</td><td>"+obj[i].stud_name+"</td><td>"+obj[i].course_name+"</td><td>"+obj[i].Book_Name+"</td><td>"+obj[i].Status+"</td><td>"+obj[i].price+"</td><td>"+obj[i].Quanitity+"</td><td>"+obj[i].total+"</td></tr>");
                //}

        
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
     j('#pindex').val(0);
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
           </ul>
        <div class="">
              <div class="tab-content">
        
        
        
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
                <input type="text" id="fran" name="fran" class="form-control" placeholder="Search By Book Title" required/>
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
                          <th width="5%">Total Quantity</th>
                          <th width="5%">Total Price</th>
                          <th width="5%">Order Status</th>
                          <th width="5%">Action</th>
                        </tr>
                      </thead>
          
                      <tbody id="vdata" style="font-size:12px;">
                          <?php if(!empty($Order1)) { foreach($Order1 as $ord){ ?>
                          <tr>
                          <td><?php echo $ord->o_date; ?></td>
                          <td><?php echo $ord->Customer_Name; ?></td>
                          <td><?php echo $ord->Total_quantity; ?></td>
                          <td><?php echo $ord->Total_Price; ?></td>
                          <td>
                             <select name="stat" id="stat" onchange="change_status('<?php echo $ord->o_date; ?>','<?php echo $ord->f_id; ?>',this.value)">
                                  <option value="Pending" <?php if($ord->Status=="Pending"){ ?>selected='selected'<?php } ?>>Pending</option>
                                  <option value="Dispatch" <?php if($ord->Status=="Dispatch"){ ?>selected='selected'<?php } ?>>Dispatch</option>
                             </select>
                          </td> 
                          <td><!--<i class="fa fa-floppy-o" onclick="" style="margin-left:10px;font-size:20px;"></i>--><a href="javascript:void(0);" onclick="get_order_det_admin('<?php echo $ord->o_date; ?>','<?php echo $ord->f_id; ?>')" title="View Detailed Order"><i class="fa fa-credit-card" style="font-size:20px;"></i></a>
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
          <?php echo "Select The Records"; ?>
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
            
            
            
                       
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()"/>

              <input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>

                            </div>
                          </div>
          </form>           
                
                
                
                
                    
                </div>
               
              </div>
           </div>
       
     
     </div>
   </div>
  