
<script src="<?php echo base_url();?>Style/try/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>Style/try/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/try/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/> 
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Style/css/jquery.multiselect.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>Style/js/jquery.multiselect.js"></script>

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
   var an = 0;
 var j=jQuery.noConflict();
  j(document).ready(function(){
  j("#book").addClass("open");
  j("#alert").delay(3200).fadeOut(300);
     getStud();
     getCourse();
 
 });
</script>

<script>
 function xyz()
 {
  

}
  function getStud()
  {
            var str="getstudent";
            var op="";
            j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/get_stud_name',
            type: 'POST',
            data:{'action':str},
      
            success: function (data) {

                
                 var obj = j.parseJSON(data);
                 
                 for (i = 0; i < obj.length; i++) {
                    op += "<option>" + obj[i].name + "</option>";
                }
                j('#stude').append(op);
        
            },
            error: function () {
                
            }
        });
  }


 function addnewrow()
 {
        var ddl = $('#clone' + an);
        var d=ddl.clone().attr('id', 'clone' + (++an)).insertAfter(ddl);
        var tr1 = j(d).closest('tr').attr('id');  
        j("#" + tr1).find('input#price').val("");
        j("#" + tr1).find('input#qty').val("1");
        j("#" + tr1).find('input#tot').val("");
        var id= "<select title='Select Module' style='display:none;' class='form-control' id='mod' multiple='multiple' name='modules' size='5'></select>";
                      
                 
        j("#" + tr1 +" td:nth-child(4)").html(id);
 }

  function getPrice(obj,str,stid)
  {
       
        var op="";
        var pr=0;

       var tr1 = j(obj).closest('tr').attr('id');
       j("#" + tr1).find('#mod').html("");
       j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/get_course_price',
            type: 'POST',
            data:{'cname':str,'stid':stid},
      
            success: function (data) {
            
            
                 alert(data);     
                 var obj = j.parseJSON(data);
                
                 for (i = 0; i < obj.length; i++) {
                     op += "<option selected='selected'>" +obj[i].book_name+ "</option>";
                     pr=parseInt(obj[i].Price)+(pr);
                                                 
                }
             j("#" + tr1).find('#mod').html(op);
             j("#" + tr1).find('input#price').val(pr);
             j("#" + tr1).find('input#tot').val(pr);
             j("#" + tr1).find('#mod').show();
             j("#" + tr1).find('#mod').css("width", "175px"); 
             j("#" + tr1).find('#mod').multiselect();
           
            },
            error: function () {
                
            }
        });
  }
  function bind()
  {
   

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
  function getCourse()
  {
            var str="getCourses";
            var op="";
            j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/get_course_name',
            type: 'POST',
            data:{'action':str},
      
            success: function (data) {

            
                 var obj = j.parseJSON(data);
                 
                 for (i = 0; i < obj.length; i++) {
                    op += "<option>" + obj[i].Course_Name + "</option>";
                }
                j('#course').append(op);
        
            },
            error: function () {
                
            }
        });
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

function get_detail_order(dt,id)
{
    var acc1="getboth";

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
            url: '<?php echo base_url(); ?>index.php/Order_management/get_order_det',
            type: 'POST',
            data:{'odate':dt,'fid':id},
      
            success: function (data) {
               
               /* j.ajax({  
                  url: '<?php echo base_url(); ?>index.php/Order_management/get_both_det',
                  type: 'POST',
                  data:{'action':acc1},
      
                      success: function (dataa) {

                           allobj1 = j.parseJSON(dataa.data1);
                           
                           alert(allobj);
                                          
                      },
                      error: function () {
                          
                      }
                  });  */          
                 



                 var obj1 = j.parseJSON(data);
                 var obj=obj1['data1'];
                 var bk=obj1['data3'];
                 var sk=obj1['data2'];
                 //alert(JSON.stringify(obj['data1']));
                 alert(JSON.stringify(obj1['data2']));
               //  alert(JSON.stringify(obj['data3']));
                 

                 for (i = 0; i < obj.length; i++) {
                  var op="";
                  var st="";
                    for(j1=0;j1<bk.length;j1++){
                      if(obj[i].Book_Name==bk[j1].Course_Name)
                      {op+="<option selected=\"selected\">"+bk[j1].Course_Name+"<option>";} else{ op+="<option>"+bk[j1].Course_Name+"<option>";}
                   }

                   for(k=0;k<sk.length;k++){
                      if(obj[i].stud_name==sk[k].name)
                      {st+="<option selected=\"selected\">"+sk[k].name+"<option>";} else{ st+="<option>"+sk[k].name+"<option>";}
                   }
                
                     j('#tdata').append("<tr class='trr' id='clone"+i+"'><td style='text-align:center;'><i class=\"fa fa-trash-o\" style='padding-top:10px; font-size20px;' onclick=\"delete_rec(this,"+obj[i].O_Id+")\"></i></td><td><select class='form-control' id='stude' name='stud[]' required title='Select Student Name'><option selected='selected'>"+st+"</option></select></td><td><select class='form-control' id='course' name='course[]' onchange=\"getPrice(this,this.value)\" required title='Select Course Name'>"+op+"</select></td><td></td><td><input type='text' class='form-control' id='price' name='price[]' value="+obj[i].price+" readonly='true' /></td><td><input type='text' class='form-control' id='qty' name='qty[]' value="+obj[i].Quanitity+" onchange=\"getTotal(this,this.value)\" required='Please Enter Quantity required'/></td><td><input type='text' class='form-control' id='tot' name='tot[]' value="+obj[i].total+" readonly='true' /><input type='text' class='form-control' id='oid' style='display:none;' name='oid[]' value="+obj[i].O_Id+" readonly='true' /></td></tr>");
                //}
                }
                
        
            },
            error: function () {
                
            }
        });
}

function Edit(obj1,id)
{

	$('#state1').hide();
	$('#city1').hide();
	$('#fran').hide();
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
				<div class="row">
              <div class="tab-content">
			  
			  
			  
                <div class="tab-pane active" id="tab1-1">
                 
				  <div class="row">
				  <div class="col-md-12" style="margin-bottom:36px;">
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="searchid" name="searchid" class="form-control" placeholder="Search By Book" required/>
			      <div id="result"></div>
				  </div>
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="city1" name="city1" class="form-control" placeholder="Search By Aurthor" required/>
			      </div>
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="fran" name="fran" class="form-control" placeholder="Search By Book Title" required/>
			      </div>
			      </div>
			    </div>
           <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="5%">Order Date</th>
                          <th width="5%">Total Quantity</th>
                          <th width="5%">Total Price</th>
                          <th width="5%">Order Status</th>
                          <th width="5%">View Order</th>
                        </tr>
                      </thead>
          
                      <tbody id="vdata" style="font-size:12px;">
                          <?php if(!empty($Order1)) { foreach($Order1 as $ord){ ?>
                          <tr>
                          <td><?php echo $ord->o_date; ?></td>
                          <td><?php echo $ord->Total_quantity; ?></td>
                          <td><?php echo $ord->Total_Price; ?></td>
                          <td><?php echo $ord->Status; ?></td> 
                          <td><a href="javascript:void(0);" onclick="get_detail_order('<?php echo $ord->o_date; ?>','<?php echo $ord->f_id; ?>')"><i class="fa fa-credit-card" style="font-size:20px;"></i></a></td>  
                          </tr> 
                          <?php } } ?>        
                      </tbody>
                    </table>
					
                  </div>
            </div>
             <?php echo $fdata->state; ?>
                <div class="tab-pane" id="tab1-2">
         <form id="formVideo" class="form-horizontal" action="<?php echo base_url()."index.php/Order_management/Insert_order"; ?>"  enctype="multipart/form-data" method="post" name="frm">
               <table class="table">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="4%" id="ad"><a href="javascript:void(0);" onclick="addnewrow()"><i class="fa fa-plus"></i> Add New</a></th>
                          <th width="8%">Student Name</th>
                          <th width="8%">Course</th>
                          <th width="8%">Select Module</th>
                          <th width="3%">Price</th>
                          <th width="3%">Quantity</th>
                          <th width="3%">Total</th>
                        </tr>
                      </thead>
          
          <tbody id="tdata" style="font-size:12px;">
            <tr id="clone0">
            <td style="text-align:center;">
                <i class="fa fa-times" style="padding-top:10px;" onclick="deleterow(this)"></i>
            </td>
            <td>
              <select class="form-control" id="stude" name="stud[]" required title="Select Student Name">
                  <option value="">Select Student</option>
              </select>
            </td>
            <td>
              <select class="form-control" id="course" name="course[]" onchange="getPrice(this,this.value,'<?php echo $fdata->state; ?>')" required title="Select Course Name">
                  <option value="">Select Course</option>
              </select>
            </td>
            <td>
                <select title="Select Module" style="display:none;" class="form-control" id="mod" multiple="multiple" name="modules" size="5">
                      
                 </select>
            </td>
            <td>
                <input type="text" class="form-control" id="price" name="price[]" readonly="true" />
            </td>
            <td>
                <input type="text" class="form-control" id="qty" name="qty[]" onchange="getTotal(this,this.value)" readonly="true" value="<?php echo $qty=1; ?>" required="Please Enter Quantity required"/>
            </td>
            <td>
                <input type="text" class="form-control" id="tot" name="tot[]" readonly="true" />
            </td>

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
  