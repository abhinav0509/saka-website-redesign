<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>  
<script src="<?php echo base_url();?>Style/try/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/try/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/> 

<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Style/css/jquery.multiselect.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>Style/js/jquery.multiselect.js"></script>
<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
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
td:hover{cursor: pointer;}
.ui-multiselect{width: 175px;}
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
.unread{
  background-color: #f5f6f7;
}

</style>
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
ul{list-style: none;}
</style>
<script type="text/javascript">
var allobj1;
 var obj1;
 var an = 0;
 var sopt="1";
 var j=jQuery.noConflict();
  j(document).ready(function(){
  
  change_noti_stat();
  pending_ord();

  j("#book").addClass("open");
  j("#alert").delay(3200).fadeOut(300);
     Searchh();
     getStud();
     getCourse();
    
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
   //j('#fran').val(j('#fr').val());
   
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
            //j('#fr').val(j('#fran').val());

            j('#hfield').submit();
       });
 
		<!-------Start--------------->
		j("#ptype").change(function(){
		
			var type=j("#ptype").val();
			if(type=="Bank Payment")
			{
				j("#preceipt").show();
				j("#a1").show();
				 j('form').attr("action", "<?php echo base_url().'index.php/Order_management/Insert_order1';?>"); 
				
			}
			else if(type=="Online Payment")
			{
				j("#preceipt").hide();
				j("#a1").hide();;
				 j('form').attr("action", "<?php echo base_url().'index.php/Order_management/Insert_order';?>"); 
			}
			else
			{
			
			
			}
 
		});
		<!---------------End--------------->
 
 });


</script>

<script>
function change_noti_stat()
{
  j.ajax({
      url: '<?php echo base_url(); ?>index.php/Notifications/fran_order_status',
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
                    op +="<option>"+obj[i].name+"</option>";
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
        j("#" + tr1).find('input#course').val("");
        
        var tt=j("#" + tr1).find('#stude');
        $('#'+tr1).find('#stude option').each(function() {
                
                    if ( $(this).val() == sopt ) {
                        $(this).remove();
                    }
               }); 

        //var id ="<select title='Select Module' style='display:none;' class='form-control' id='mod' multiple='multiple' name='modules' size='5'></select><input type='hidden' id='selectedValues' name='selectedval[]' />";
          
        // /j("#" + tr1 +" td:nth-child(4)").html(id);
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
       j("#"+tr1).remove();
    }  

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
                 
                 var obj = j.parseJSON(data);
                
                 for (i = 0; i < obj.length; i++) {
                     op += "<option selected='selected'>" +obj[i].book_name+ "</option>";
                     pr=parseInt(obj[i].Price)+(pr);
                                                 
                }
             j("#" + tr1).find('#mod').html(op);
             j("#" + tr1).find('input#price').val(pr);
             j("#" + tr1).find('input#tot').val(pr);
            
             j("#" + tr1).find('#mod').css("width", "175px"); 
             j("#" + tr1).find('#mod').multiselect();

                var values = new Array();
                j("#" + tr1).find('#mod').each(function(index, item) {
                    values.push(j(item).val());
                });
                j("#" + tr1).find("input#selectedValues").val(values.join(","));
          
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

function delete_rec(obj,id)
{
    var tr1 = j(obj).closest('tr');
    if (confirm("Are you sure, you want to Delete It.."))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/Delete_order',
            type: 'POST',
           data:{'id':id},
      
        success: function (data) {
         var obj1=j.parseJSON(data);
         alert(obj1['mes']);
         for(i=0; i<obj1.length; i++)
         {
             alert(obj1[i].mes);
         }       
        j(obj).closest('tr').remove();
            },
            error: function () {
                
            }
        });
}


function delete_rec1(obj,id)
{
    var tr1 = j(obj).closest('tr');
    if (confirm("Are you sure, you want to Delete It.."))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/Delete_single_order',
            type: 'POST',
           data:{'id':id},
      
        success: function (data) {
         var obj1=j.parseJSON(data);
         alert(obj1['mes']);
         for(i=0; i<obj1.length; i++)
         {
             alert(obj1[i].mes);
         }       
        j(obj).closest('tr').remove();
            },
            error: function () {
                
            }
        });
}

function Delete1(id,dt,obj)
{
    var tr1 = j(obj).closest('tr');
    if (confirm("Are you sure, you want to Delete It.."))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/Delete_pending_order',
            type: 'POST',
           data:{'id':id,'dt':dt},
      
        success: function (data) {
         var obj1=j.parseJSON(data);
        
             alert(obj1.message);
             j(obj).closest('tr').remove();
            },
            error: function () {
                
            }
        });
}

function get_detail_order(dt,id)
{
    var acc1="getboth";
    var dts=new Array();
    var tot_qty=0;
    var tot_price=0;
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
   
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
    j("#formVideo").attr('action','<?php echo base_url(); ?>index.php/Order_management/update_order'); 

    //j("#UpdateBtn").show();
   // j("#CancelBtn").show();
    j("#SaveBtn").hide();
    
    j('#ad').html("");
    j('#ad').html("Delete");

    j('#tdata').empty();
    j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/get_order_det',
            type: 'POST',
            data:{'odate':dt,'fid':id},
      
            success: function (data) {
               
            
                 var obj1 = j.parseJSON(data);
                 var obj=obj1['data1'];
                 var bk=obj1['data3'];
                 var sk=obj1['data2'];
                
                 for (i = 0; i < obj.length; i++) {
                  var op="";
                  var st="";
                  var opt="";
                    for(j1=0;j1<bk.length;j1++){
                      if(obj[i].course_name==bk[j1].Course_Name)
                      {op+="<option selected=\"selected\">"+bk[j1].Course_Name+"<option>";} else{ op+="<option>"+bk[j1].Course_Name+"<option>";}
                   }

               
                      st=obj[i].stud_name;
					alert("asdsa");
                  
                    
                    
                    dts = dts.concat(dt);
                   
                     for(k1=0;k1<dts.length;k1++)
                     {
                        opt +="<option selected='selected'>"+dts[k1]+"</option>";
                     }
                      dts.length = 0;
                     j('#tdata').append("<tr class='trr' id='clone"+i+"'><td style='text-align:center;'><i class=\"fa fa-trash-o\" style='padding-top:10px; font-size20px;' onclick=\"delete_rec(this,"+obj[i].O_Id+")\"></i></td><td><input type='text' class='form-control' id='stude' name='stud[]' value='"+st+"' required title='Student Name' readonly='readonly'></td><td><input type='text' class='form-control' id='course' name='course[]' required title='Select Course Name' value='"+obj[i].course_name+"'></td><td><input type='text' class='form-control' id='price' name='price[]' value="+obj[i].price+" readonly='true' /></td><td><input type='text' class='form-control' id='qty' readonly='true' name='qty[]' value="+obj[i].Quanitity+" onchange=\"getTotal(this,this.value)\" required='Please Enter Quantity required'/></td><td><input type='text' class='form-control' id='tot' name='tot[]' value="+obj[i].total+" readonly='true' /><input type='text' class='form-control' id='oid' style='display:none;' name='oid[]' value="+obj[i].O_Id+" readonly='true' /></td></tr>");
                                    //}  
                      tot_qty=tot_qty+parseInt(obj[i].Quanitity);
                      tot_price=tot_price+parseInt(obj[i].price);

                     
                }
                j('#tdata').append("<tr><td colspan='4'>Total</td><td>"+tot_qty+"</td><td>"+tot_price+"</td></tr>");
                
            },
            error: function () {
                
            }
        });


}


function get_detail_order1(id,dt)
{
    var acc1="getboth";
    var dts=new Array();
    var tot_qty=0;
    var tot_price=0;
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
   
    j("#tab1-1").removeClass("active");
    j("#tab1-3").removeClass("active");
    j("#tab1-2").addClass("active");
    j("#formVideo").attr('action','<?php echo base_url(); ?>index.php/Order_management/update_order'); 

    //j("#UpdateBtn").show();
   // j("#CancelBtn").show();
    j("#SaveBtn").hide();
    
    j('#ad').html("");
    j('#ad').html("Delete");

    j('#tdata').empty();
    j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/get_order_pend_det',
            type: 'POST',
            data:{'odate':dt,'fid':id},
      
            success: function (data) {
               
            
                 var obj1 = j.parseJSON(data);
                 var obj=obj1['data1'];
                 var bk=obj1['data3'];
                 var sk=obj1['data2'];
                
                 for (i = 0; i < obj.length; i++) {
                  var op="";
                  var st="";
                  var opt="";
                    for(j1=0;j1<bk.length;j1++){
                      if(obj[i].course_name==bk[j1].Course_Name)
                      {op+="<option selected=\"selected\">"+bk[j1].Course_Name+"<option>";} else{ op+="<option>"+bk[j1].Course_Name+"<option>";}
                   }

               
                      st=obj[i].stud_name;
                  
                    
                    
                    dts = dts.concat(dt);
                   
                     for(k1=0;k1<dts.length;k1++)
                     {
                        opt +="<option selected='selected'>"+dts[k1]+"</option>";
                     }
                      dts.length = 0;
                     j('#tdata').append("<tr class='trr' id='clone"+i+"'><td style='text-align:center;'><i class=\"fa fa-trash-o\" style='padding-top:10px; font-size20px;' onclick=\"delete_rec1(this,"+obj[i].O_Id+")\"></i></td><td><input type='text' class='form-control' id='stude' name='stud[]' value='"+st+"' required title='Student Name' readonly='readonly'></td><td><input type='text' class='form-control' id='course' name='course[]' required title='Select Course Name' value='"+obj[i].course_name+"'></td><td><input type='text' class='form-control' id='price' name='price[]' value="+obj[i].price+" readonly='true' /></td><td><input type='text' class='form-control' id='qty' readonly='true' name='qty[]' value="+obj[i].Quanitity+" onchange=\"getTotal(this,this.value)\" required='Please Enter Quantity required'/></td><td><input type='text' class='form-control' id='tot' name='tot[]' value="+obj[i].total+" readonly='true' /><input type='text' class='form-control' id='oid' style='display:none;' name='oid[]' value="+obj[i].O_Id+" readonly='true' /></td></tr>");
                                    //}  
                      tot_qty=tot_qty+parseInt(obj[i].Quanitity);
                      tot_price=tot_price+parseInt(obj[i].price);

                     
                }
                j('#tdata').append("<tr><td colspan='4'>Total</td><td>"+tot_qty+"</td><td>"+tot_price+"</td></tr>");
                
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
	 //j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
}
</script>

<script>

function pending_ord()
{
    j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/get_Pending_orders',
            type: 'POST',
            data:{'fid':1},
      
        success: function (data) {
         var obj=j.parseJSON(data);
         var obj1=obj['data1'];
         if(obj1.length>0)
         {
           for(i=0; i<obj1.length; i++)
           {
              j("#pedata").append("<tr><td>"+obj1[i].o_date+"</td><td>"+obj1[i].Total_quantity+"</td><td>"+obj1[i].Total_Price+"</td><td><a href=\"javascript:void(0);\" onclick=\"get_detail_order1("+obj1[i].f_id+",'"+obj1[i].o_date+"')\" title='View Detail Order'><i class=\"fa fa-credit-card\" style=\"font-size:20px;\"></i></a><a href='javascript:void(0);' onclick=\"Delete1("+obj1[i].f_id+",'"+obj1[i].o_date+"',this);\" title='Delete Order'><i style='color:#275273;font-size:20px;margin-left:10px;' id=\"DeleteN\" class=\"fa fa-trash-o\"></i></a></td><td><a class=\"btn btn-primary\" style='padding: 4px 7px;' onclick=\"order_pay("+obj1[i].f_id+",'"+obj1[i].o_date+"')\"><i class=\"fa fa-inr\"></i> Place Order</a></td></tr>");
           }
         }
         else
         {
              j("#pedata").append("<tr><td colspan='10'><div class=\"alert alert-info\"><strong>No Data Available</strong></div></td></tr>");
         }  
            
            },
            error: function () {
                
            }
      });
}

function order_pay(fid,dt)
{
   window.location="<?php echo base_url(); ?>index.php/Order_management/pending_ord_paid?id="+fid+"&dt="+dt;
}



 function check_val(obj,str,fid)
 {
      sopt=str;
      var tr1 = j(obj).closest('tr').attr('id');
      
 
      j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Order_management/get_stud_course_det',
            type: 'POST',
            data:{'studid':str,'fid':fid},
      
        success: function (data) {
         var obj1=j.parseJSON(data);
         var stud_dt=obj1['data1'];
         var bdt=obj1['data2'];
         
         j("#" + tr1).find('input#course').val(stud_dt[0].course_Name);
         j("#" + tr1).find('input#price').val(bdt[0].Price);
         j("#" + tr1).find('input#tot').val(bdt[0].Price);     
            },
            error: function () {
                
            }
      });
 }

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
 function search_data()
{
     j('#fromdt').val(j('#cont').val());
     j('#todate').val(j('#pcont').val());
     //j('#fr').val(j('#fran').val());
     j('#pindex').val(0);
     j('#hfield').submit();
}

function Download_Excel_all()
 {
    var fdate=j("#cont").val();
    var todate=j('#pcont').val();
    //var fnm=j('#fran').val();
    window.location="<?php echo base_url(); ?>index.php/Franchisee/Excell_by_cat?fdate="+fdate+"&"+"todate="+todate
 }
 function Download_pdf_all()
 {
    var fdate=j("#cont").val();
    var todate=j('#pcont').val();
    //var fnm=j('#fran').val();
    window.location="<?php echo base_url(); ?>index.php/Franchisee/Pdf_By_Cat?fdate="+fdate+"&"+"todate="+todate
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
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Order</a></li>
                <li class="" id="t3"><a href="#tab1-3" data-toggle="tab">Pending Orders</a></li>
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
        			             <input type="text" id="cont" name="searchid" class="form-control" data-rel="datepicker" value="<?php echo $str1; ?>" placeholder="Search From Date" required/>
        			             <div id="result"></div>
        				    </div>
        			      <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
        			           <input type="text" id="pcont" name="city1" class="form-control" data-rel="datepicker" placeholder="Search To Date" required/>
        			      </div>
        			      <!--<div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
        			          <input type="text" id="fran" name="fran" class="form-control" placeholder="Search By Franchisee" required/>
        			      </div>-->
        			      
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
                          <th width="5%">Total Quantity</th>
                          <th width="5%">Total Price</th>
                          <th width="5%">Order Status</th>
                          <th width="5%">Admin Remark</th>
                          <th width="5%">View Order</th>
                        </tr>
                      </thead>
          
                      <tbody id="vdata" style="font-size:12px;">
                          <?php if(!empty($Order1)) { foreach($Order1 as $ord){ ?>
                          <tr class="<?php echo $ord->adm_ord_state; ?>">
                          <td title="<?php echo $ord->o_date; ?>"><?php echo $ord->o_date; ?></td>
                          <td title="<?php echo $ord->Total_quantity; ?>"><?php echo $ord->Total_quantity; ?></td>
                          <td title="<?php echo $ord->Total_Price; ?>"><?php echo $ord->Total_Price; ?></td>
                          <td title="<?php echo $ord->Status; ?>"><?php echo $ord->Status; ?></td>
                          <td title="<?php echo $ord->Admin_Remark; ?>"><?php echo $ord->Admin_Remark; ?></td> 
                          <td><a href="javascript:void(0);" onclick="get_detail_order('<?php echo $ord->o_date; ?>','<?php echo $ord->f_id; ?>')"><i class="fa fa-credit-card" style="font-size:20px;"></i></a></td>  
                          </tr> 
                         
                          <?php } }else{ ?>        
                          <tr>
                          <td colspan="10">
                          <div class="alert alert-info">
                                <strong><?php echo "No order data found.....!";?></strong>
                          </div>
                        </td>
                      </tr> 
                      <?php } ?>       
                      </tbody>
                    </table>
					
                  </div>
            </div>



    <div class="tab-pane" id="tab1-3">
         <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="5%">Order Date</th>
                          <th width="5%">Total Quantity</th>
                          <th width="5%">Total Price</th>
                          <th width="5%">Action</th>
                          <th width="5%">Place Order</th>
                        </tr>
                      </thead>
          
                      <tbody id="pedata" style="font-size:12px;">
                      
                      </tbody>
                    </table>
					
                  </div>
                  
            </div>


             
             <script>
              var sid='<?php echo $fdata->state; ?>';

             </script>

                <div class="tab-pane" id="tab1-2">
        <form id="hfield" action="<?php echo base_url(); ?>index.php/Franchisee/Book_Order" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
                    <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />

                    <input type="hidden" name="fromdt" id='fromdt' value="<?php echo $dt['from_date']; ?>" />
                    <input type="hidden" name="todate" id='todate' value="<?php echo $dt['to_date']; ?>" />
                    
         </form>

         <form id="formVideo" class="form-horizontal" action="<?php echo base_url()."index.php/Order_management/Insert_order"; ?>"  enctype="multipart/form-data" method="post" name="frm">
               <input type="hidden" name="fid" value="<?php echo $fdata->cus_id; ?>" />
               <table class="table">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="4%" id="ad"><a href="javascript:void(0);" onclick="addnewrow()"><i class="fa fa-plus"></i> Add New</a></th>
                          <th width="10%">Student Name</th>
                          <th width="10%">Course</th>
                          <!--<th width="8%">Select Module</th>-->
                          <th width="5%">Price</th>
                          <th width="5%">Quantity</th>
                          <th width="5%">Total</th>
                        </tr>
                      </thead>
          
          <tbody id="tdata" style="font-size:12px;">
            <tr id="clone0">
            <td style="text-align:center;">
                <i class="fa fa-times" style="padding-top:10px;" onclick="deleterow(this)"></i>
            </td>
            <td>
              <select class="form-control" id="stude" name="stud[]" onchange="check_val(this,this.value,'<?php echo $fdata->cus_id; ?>')" required title="Select Student Name">
                  <option value="">Select Student</option>
              </select>
            </td>
            <td>
              <!--<select class="form-control" id="course" name="course[]" onchange="getPrice(this,this.value,'<?php echo $fdata->state; ?>')" required title="Select Course Name">
                  <option value="">Select Course</option>
              </select>-->
              <input type="text" name="course[]" id="course" class="form-control" readonly="true">
            </td>
            <!--<td>
                <select title="Select Module" style="display:none;" class="form-control" id="mod" multiple="multiple" name="modules" size="5">
                      
                </select>

                 <input type="hidden" id="selectedValues" name="selectedval[]" />
            </td>-->
            <td>
                <input type="text" class="form-control" id="price" name="price[]" readonly="true" />
            </td>
            <td>
                <input type="text" class="form-control" id="qty" name="qty[]" onchange="getTotal(this,this.value);" readonly="true" value="<?php echo $qty=1; ?>" required="Please Enter Quantity required"/>
            </td>
            <td>
                <input type="text" class="form-control" id="tot" name="tot[]" readonly="true" />
            </td>

          </tbody>
                    </table>
					
					<!-------Start------>
		  
					 <div class="row">
					  <div class="col-md-4">
					
						  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Payment Type<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <select class="form-control" name="ptype" id="ptype" required>
							 <option value="">Select</option>
							 <option>Bank Payment</option>
							 <option>Online Payment</option>
							 </select>
                            </div>
                          </div>
					
					
					 </div>
					 
					 <div class="col-md-4">
					 
					 
					 <div class="form-group">
                          
                            <div class="col-sm-9">
                            
							<input type="file" name="preceipt" id="preceipt" class="form-control" style="margin-left:21px;width:260px;display:none;">
							<code id="a1" style="display:none;margin-left:20px;">Upload Bank Receipt UpTo 2MB</code>
                            </div>
                          </div>
					 
					 
					 </div>
					 
					 <div class="col-md-4">
					
					<input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
					
					 </div>
					 
					 </div>
		  
		  
					<!---------End---------->
					
					
					
					
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
                              <!--<input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>--->
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
  