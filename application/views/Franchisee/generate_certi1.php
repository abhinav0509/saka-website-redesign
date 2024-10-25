<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>  
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
 <script src="<?php echo base_url();?>Style/ckeditor.js"></script>
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
.col-sm-7 h4,p{margin: 10px -17px;}

ul li{list-style: none;}

.alert {
    border: 1px solid transparent;
    border-radius: 4px;
    margin-bottom: 1px;
    padding: 4px;
}  </style>
<script>
var obj1;
var allobj=[];
  var j=jQuery.noConflict();
  j(document).ready(function(){
   j("#pass").addClass("open");
   
   j('[data-rel=datepicker]').datepicker({
        autoclose: true,
        todayHighlight: true
    });

   j('#tdt').datepicker({
        autoclose: true,
        todayHighlight: true
    });
	  

    Search_studd1();
    
    

   j('#cont1').val(j('#fromdt').val());
   j('#pcont1').val(j('#todate').val());
   j('#st').val(j('#cou').val());
   j('#stud').val(j('#s').val());

   var Pageindex = j('#pindex').val();
   var rcount = j('#rcount').val();

   if(Pageindex == "")
    Pageindex = 1;

   if(rcount == "")
    rcount = 0;
  
  j("#links1").ASPSnippets_Pager({
            ActiveCssClass: "current",
            PagerCssClass: "pager",
            PageIndex: parseInt(Pageindex),
            PageSize: 10,
            RecordCount: parseInt(rcount)

        });
        
  j("#links1 .page").click(function () {
            var pageindex = j(this).attr('page');
                    
            j('#pindex').val(pageindex);
            j('#fromdt').val(j('#cont1').val());
            j('#todate').val(j('#pcont1').val());
            j('#cou').val(j('#st').val());
            j('#s').val(j('#stud').val());
            
            j('#hfield').submit();

   });

});
</script>

<script type="text/javascript">

function get_issued_Data(pid)
{
     var fdt=j('#cont').val();
     var tdt=j('#pcont').val();
     var course=j('#stt').val();
     var fname=j('#franch').val();
     var stud=j('#studd').val();
     j("#idata").empty();

     j.ajax({ 
            url: '<?php echo base_url(); ?>index.php/Admin/get_issued_certi_data',
            method: 'POST',
            data:{'pindex':pid,'fdt':fdt,'tdt':tdt,'course':course,'fname':fname,'stud':stud},
        success: function (data) {
        var obj=j.parseJSON(data);
        var obj1=obj['data1'];
        var obj2=obj['data2'];
        var op="";
        allobj=obj1;
        for(i=0; i< obj1.length; i++)
        {
            var id=obj1[i].id;
            var f_id=obj1[i].f_id;
            var stud_id=obj1[i].stud_id;
            var cou=obj1[i].course;
            
            
            op ="<td>"+obj1[i].stud_id+"</td>";
            op +="<td>"+obj1[i].stud_name+"</td>";
            op +="<td>"+obj1[i].fname+"</td>";
            op +="<td>"+obj1[i].exame_date+"</td>";
            op +="<td>"+obj1[i].admission_dt+"</td>";
            op +="<td>"+obj1[i].to_dt+"</td>";
            op +="<td>"+obj1[i].course+"</td>";
            op +="<td>"+obj1[i].status+"</td>";
            op +="<td>"+obj1[i].stud_mark+"</td>";
            op +="<td>"+obj1[i].result+"</td>";
            op +="<td><i id='sign' style='font-size:20px; color:#275273; margin-right:2px;' onclick=\"open_popup1(allobj,"+obj1[i].id+")\" class=\"fa fa-info-circle\"></i>";
op +="<i class='fa fa-certificate' onclick=\"get_certi_pdf(allobj,'"+id+"','"+cou+"','"+f_id+"','"+stud_id+"')\" style=\"margin-left:10px; color:#e13042; font-size:20px;\" title='Download Certificate'></i>";
            op +="</td>";
            

            j("#idata").append("<tr>"+op+"</tr>"); 
            


          }
          
           
         j("#links2").ASPSnippets_Pager({
                    ActiveCssClass: "current",
                    PagerCssClass: "pager",
                    PageIndex: pid,
                    PageSize: 5,
                    RecordCount:parseInt(obj2)
                });
        j("#links2 .page").on('click', function () {
                    get_issued_Data(parseInt(j(this).attr('page')));
                    PageIndexCurrent = parseInt(j(this).attr('page'));
                });


            },
            
           error: function () {
                alert("Error:::::");
            }
        });
}



function DeleteDB(id) {
//alert(id);
if (confirm("Are you sure To Delete It:"))
        $.ajax({	
            url: 'include/Webservices.php',
            method: 'POST',
			data:{'action':'DelTestimonial','id':id},
		    success: function (data) {
                alert(data);
				window.location.href = window.location.href;            
            },
            error: function () {
                alert("Error:::::");
            }
        });
   }


 function EditDB(allobj,tid)
 {
    $('#t1').removeClass("active");
	$('#t2').addClass("active");
    $('#tab1-1').removeClass("active");
	$('#tab1-2').addClass("active");
     var row;
	    for(i=0;i<allobj.length;i++)
		 {
		   if(allobj[i].test_id==tid)
		    {
			  row=i;
			}
		 }
        if($('#bid').length >0 )
		{
    		$('#bid').remove();
		}
		$('#photo').after("<input type='hidden' id='bid' value='" + tid + "' name='bid'/>");  
		
  	    
		    $('#photo').attr('src', $('#img'+tid).attr('src'));
        $('#photo').show();
        $('#nm').val(allobj[row].Name);
     	  $('#testo1').val(allobj[row].Testimonial);
		 
		var editor = CKEDITOR.instances.testo;
				
	    if( editor.mode == 'wysiwyg' )
		  {
		     editor.insertHtml( allobj[row].Testimonial );
      }
	
	    $("#UpdateBtn").show();
		  $("#CancelBtn").show();
      $("#SaveBtn").hide();
		
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

<script>

  
function search_data()
{
            j('#fromdt').val(j('#cont1').val());
            j('#todate').val(j('#pcont1').val());
            j('#cou').val(j('#st').val());
            j('#s').val(j('#stud').val());
            j('#pindex').val(1);
            j('#hfield').submit();

}

function Search_studd1() { 
       var j = jQuery.noConflict(); 
    
       j("#stud").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      url: "<?php echo base_url(); ?>index.php/Franchisee/getCertiStude",
                       data: { term: j("#stud").val()},
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
                  j('#stud').val(ui.item.label);
                  return false;
              }
          });
}

 function open_popup(obj1,id)
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
     var stat=obj1[0][r].status;
     if(stat==1)
     {
        stat="Active";
     }
     else if(stat==0)
     {
       stat="Not Active";
     }
     var dts=obj1[0][r].exame_date.split('-');
     var dts1=dts[2]+"/"+dts[1]+"/"+dts[0];

     var dts3=obj1[0][r].admission_dt.split('-');
     var dts4=dts3[2]+"/"+dts3[1]+"/"+dts3[0];
    
     var path="<?php echo base_url(); ?>Style/images/cca-logo.png";
    
     opt  ="<div class='panel-body' style='background-color:#00569d;box-shadow:0px 2px 4px #000'><div class='col-sm-4 text-center'>";
     opt +="<img alt='image' class='img-circle img-profile' style='height:100px;' src='"+path+"'></div>";
     opt +="<div class='col-sm-7 profile-details'><h3><i class=\"fa fa-user\" style='color:#FFF;'></i>" +obj1[0][r].stud_name+"</h3>";
     opt += "<p style='color:#FFF;'><a href='javascript:;' style='color:#FFF;' class='text-gray text-no-decoration'><i class='fa fa-university'></i>";
     opt +=""+obj1[0][r].stud_id+"</a></div></div>";
     
     opt +="<div class='panel-body'>";
     opt +="<div class='col-sm-4'><dl><dt><i class='fa fa-university' style='color:#004884;'></i> Stud Id</dt><dd>"+obj1[0][r].stud_id+"</dd></dl>";
     opt +="<dl class='margin-sm-bottom'><dt><i class='fa fa-university' style='color:#004884;'></i> Admission Date</dt><dd>"+dts4+"</dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-user\" style='color:#004884;'></i> Student Name</dt><dd>"+obj1[0][r].stud_name+"</dd></dl>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-envelope-o\" style='color:#004884;'></i> Exame_date</dt><dd>"+dts1+"</dd></dl></div>";                              
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-mobile\" style='color:#004884; font-size:20px;'></i> Franchise Name</dt><dd>"+obj1[0][r].fname+"</dd></dl>";
     opt +="<dl class='margin-sm-bottom'><dt><i class=\"fa fa-map-marker\" style='color:#004884;'></i> Course</dt><dd>"+obj1[0][r].course+"</dd></dl></div>";
     opt +="</div>";
    
     opt +="<div class='panel-body'>"; 
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-globe\" style='color:#004884;'></i> Student Marks</dt><dd>"+obj1[0][r].stud_mark+"</dd></dl>";
     opt +="<dl class='margin-sm-bottom'><dt></dt><dd></dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt><i class=\"fa fa-globe\" style='color:#004884;'></i> Result</dt><dd>"+obj1[0][r].result+"</dd></dl>";
     opt +="<dl class='margin-sm-bottom'><dt></dt><dd></dd></dl></div>";
     opt +="<div class='col-sm-4'><dl><dt></dt><dd></dd></dl>";
     opt +="<dl class='margin-sm-bottom'><dt></dt><dd></dd></dl></div>";
     opt +="</div>";
     
     j("#fdetails").html(opt); 
     j("#myModal").modal('show');
   
 }


     function get_certi_pdf(obj1,id,course,fid,sid)
     {
       var d=j(obj1).closest('tr').find('td:eq(5)').text();
       if(d=="Not Entered")
       {
          j(obj1).closest('tr').find('td:eq(5)').css({"background-color":"#357ebd","color":"#FFF"});
          alert("Please Fill The Valid Date First");
       }
       else
       {
          window.location="<?php echo base_url(); ?>index.php/Franchisee/GetstudCertiPdf?id="+id+"&"+"course="+course
       }
     }
  
</script>

   <div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">Provisional Certificates</a></li>
                <!--<li class="" id="t2"><a href="#tab1-2" data-toggle="tab">Issued Certificate</a></li>-->
                 <!--<li id="t2"><a href="#tab1-2" data-toggle="tab">Add Pass Student</a></li>-->
                <li class="pull-right">
                        
                        <div class="alert2 alert alert-success" id="alert2" style="display:none;">
                                    
                        </div>                      
                 </li>
               </ul>
              <div class="tab-content">		  
			  
                <div class="tab-pane active" id="tab1-1">
                  <div class="table-responsive">
				  
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
              <input type="text" id="cont1" data-rel="date-picker" name="cont1" class="form-control" placeholder="From Date" />
            </div>

            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
              <input type="text" id="pcont1" data-rel="date-picker" name="pcont1" class="form-control" placeholder="From Date" />
            </div>   
                     
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
              <select name="st" id="st" class="form-control">                
                     <option value="">Select Course</option>
                     <?php if(!empty($courses)){ foreach($courses as $co1){ ?>
                     <option><?php echo $co1->Course_Name; ?></option>
                     <?php } } ?>
              </select>           
            </div>
            
             <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
               <input type="text" id="stud" name="stud" class="form-control" placeholder="Search by Student..." />
            </div>
             <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                    <a class="btn btn-primary" onclick="search_data()">
                        <i class="fa fa-search"></i> Search
                    </a>
            </div>
          </div>
			    </div>
				  
                    <!--<div style="background-color:#f5f5f5;border-color:#ddd;color:#333;padding: 10px 15px;">
                      <h4 class="panel-title">Testimonial Details </h4>
                    </div>-->
                     <table id="" class="table table-striped" style="float:left;">
                        <thead>
                          <tr style="background-color:#d7dadc;">
                          <th width="3%">Certificate Id</th>
                          <th width="3%">Stud id</th>
						              <th width="5%">Stud Name</th>
                          <th width="5%">Franch Name</th>
                          <th width="3%">Admission Date</th>
                          <th width="3%">Valid Date</th>
                          <th width="5%">Course</th>
            						  <th width="5%">Status</th>
            						  <th width="3%">Stud Mark</th>
            						  <th width="3%">Result</th>
            						  <th width="6%">Action</th>
                        </tr>
                      </thead>
                       <script>
                          var jArray=[];
                          jArray.push(<?php echo json_encode($result); ?>);
                       </script>
                      <tbody id="tdata">
                          <?php if(!empty($result)){ foreach($result as $res){ ?>
                          <tr>
                             <td><?php echo $res['certi_id']; ?></td>
                             <td><?php echo $res['stud_id']; ?></td>
                             <td><?php echo $res['stud_name']; ?></td>
                             <td><?php echo $res['fname']; ?></td>
                             <td><?php echo $res['admission_dt']; ?></td>
                             <td><?php
                              $t_dt=$res['to_dt'];
                              if($t_dt=="")
                              {
                                 echo $dt1="Not Entered";
                              }
                              else if($t_dt!="")
                              {
                                    $farr1=array();
                                    $farr1 =explode("-",$t_dt); 
                                    $farr1=array_reverse($farr1);
                                    $str2 =implode($farr1,"-");
                                    echo $str2=str_replace("-", "/", $str2);
                              }

                               ?></td>
                             <td><?php echo $res['course']; ?></td>
                             <td><?php echo $res['status']; ?></td>
                             <td><?php echo $res['stud_mark']; ?></td>
                             <td><?php echo $res['result']; ?></td>
                             <td><i id="sign" style="font-size:20px; color:#275273; margin-right:2px;" title="View Full Information" onclick="open_popup(jArray,<?php echo $res['id']; ?>)" class="fa fa-info-circle"></i><i class="fa fa-certificate" title="Download Certificate" onclick="get_certi_pdf(this,'<?php echo $res['id']; ?>','<?php echo $res['course']; ?>','<?php echo $res['f_id']; ?>','<?php echo $res['stud_id']; ?>')" style="margin-left:10px; color:e13042; font-size:20px;"></i>
</td>
                          </tr>
                          <?php } } else { ?>

                          <tr>
                            <td colspan="11">
                                  <div class="alert alert-info">
                                <strong><?php echo "No Record Available.....!";?></strong>
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

               <form id="hfield" action="<?php echo base_url(); ?>index.php/Franchisee/create_cert1" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
                    <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />

                    <input type="hidden" name="fromdt" id='fromdt' value="<?php echo $dt['from_date']; ?>" />
                    <input type="hidden" name="todate" id='todate' value="<?php echo $dt['to_date']; ?>" />
                    <input type="hidden" name="s" id='s' value="<?php echo $dt['stud']; ?>" />
                    <input type="hidden" name="cou" id='cou' value="<?php echo $dt['cou']; ?>" />
                    
               </form>


<!--************************************************Tab 2***********************************-->



                <div class="tab-pane" id="tab1-2">

                
                </div>
               
              </div>
           </div>
     </div>
   </div>

        <div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade in" > 
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


   <div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="mydtModal" class="modal fade in" > 
             <div  class="modal-dialog modal-lg" style="width:650px;">
                 
                 <div class="modal-content login-social" style="">
                    
                         <div class="col-md-6" style="margin-left:195px;">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Admin Remark</h4>

                    <div class="panel-options">
                       <a href="#" onclick="clear_all()" data-dismiss="modal"><i class="fa fa-fw fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                     <div class="col-sm-12">
                       <div class="row">
                          <input type="text" class="form-control" name="tdt" data-rel="date-picker" id="tdt" />
                       </div>
                       <br />

                       <div class="row">
                          <div class="middle">
                             <button class="btn btn-primary btn-block login-social" id="rmd" type="button">Save Remark</button>                                    
                          </div>
                      </div> 
                     </div>
                </div>
            </div>
        </div>
            

                </div>
             </div>
 </div>
  