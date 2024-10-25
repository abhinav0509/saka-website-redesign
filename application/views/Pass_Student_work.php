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
  padding: 4px 5px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}

table thead th{text-align: center; font-weight: normal; font-size: 12px; font-family: calibri; font-weight: normal;}

table tbody td{text-align: left;}

table tbody td{

    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
tbody td{font-size: 13px; font-family: calibri;}


  </style>
<script>
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
   j("#pass").addClass("open");
   
   j('[data-rel=datepicker]').datepicker({
        autoclose: true,
        todayHighlight: true
    });
	  
    Searchh();
    Search_studd();
	
   //CKEDITOR.replace( 'Desc');

j('#cont').val(j('#fromdt').val());
j('#st').val(j('#cou').val());
j('#fran').val(j('#frrn').val());
j('#stud').val(j('#sttud').val());
j('#eres').val(j('#sres').val());
    
  
  

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
            j('#fromdt').val(j('#cont').val());
            j('#cour').val(j('#st').val());
            j('#frrn').val(j('#fran').val());
            j('#sttud').val(j('#stud').val());
            j('#sres').val(j('#eres').val());


            j('#hfield').submit();

   });
	
});



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
 function val()
 { 
   var nm=document.frm.nm.value;
   var nm1=document.frm.upload.value;
   var nm2=document.frm.testo.value;
   var ac=document.frm.save.value;
  	j("#formVideo").validate({
	rules:{
			nm:"required",
		   testo:"required"
			
		   },
	
	message:{
			nm:"Please Fill The Information",
			testo:"Please Fill The Information"
			}
	});
 }
 
 function val1()
 { 
    document.frm.submit();
  }

  function Searchh() { 
       var j = jQuery.noConflict(); 
    
       j("#fran").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      //contentType: "application/json; charset=utf-8",
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
function search_data()
{
            j('#fromdt').val(j('#cont').val());
            j('#sttud').val(j('#stud').val());
            j('#frrn').val(j('#fran').val());
            j('#cou').val(j('#st').val());
            j('#sres').val(j('#eres').val());
            j('#pindex').val(1);
            j('#hfield').submit();

}
function Search_studd() { 
       var j = jQuery.noConflict(); 
    
       j("#stud").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      //contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Admin/getExmStude",
                       data: { term: j("#stud").val()},
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
                  j('#stud').val(ui.item.label);
                  return false;
              }
          });
} 
</script>

   <div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">Pass Student</a></li>
                 <!--<li id="t2"><a href="#tab1-2" data-toggle="tab">Add Pass Student</a></li>-->
                
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
            <input type="cont" id="cont" name="cou" class="form-control" data-rel="datepicker" value="" placeholder="Search From Date" required/>                
            </div>
           
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
              <select name="st" id="st" class="form-control">                
                     <option>Select Course</option>
                     <?php if(!empty($course)){ foreach($course as $co){ ?>
                     <option><?php echo $co->Course_Name; ?></option>
                     <?php } } ?>
              </select>           
            </div>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
              <select name="eres" id="eres" class="form-control">                
                  <option value="">Select Result</option>
                  <option value="pass">Pass</option>
                  <option value="fail">Fail</option>
              </select>           
            </div>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
              <input type="text" id="fran" name="fran" class="form-control" placeholder="Search by franchise..." />
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
                          <th width="10%">Franchisee Name</th>
						              <th width="10%">Student Name</th>
                          <th width="3%">Student Id</th>
                          <th width="3%">Exame Date</th>
                          <th width="2%">Course</th>
            						  <th width="7%">Module</th>
            						  <th width="2%">Pass Marks</th>
            						  <th width="2%">Stud Marks</th>
            						  <th width="2%">Result</th>
                        </tr>
                      </thead>
                      <tbody id="tdata">
                          <?php if(!empty($result)){ foreach($result as $res){ ?>
                          <tr>
                             <td><?php echo $res['fran_name']; ?></td>
                             <td><?php echo $res['name']; ?></td>
                             <td><?php echo $res['stud_id']; ?></td>
                             <td><?php echo $res['exm_date']; ?></td>
                             <td><?php echo $res['course']; ?></td>
                             <td title="<?php echo $res['module']; ?>"><?php echo $res['module']; ?></td>
                             <td><?php echo $res['p_mark']; ?></td>
                             <td><?php echo $res['marks']; ?></td>
                             <td><?php echo $res['status']; ?></td>
                            
                          </tr>
                          <?php } } else { ?>

                          <tr>
                            <td colspan="9">
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
                <div class="tab-pane" id="tab1-2">
               <form id="hfield" action="<?php echo base_url(); ?>index.php/Admin/Pass_Student" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
                    <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />

                    <input type="hidden" name="fromdt" id='fromdt' value="<?php echo $dt['from_date']; ?>" />
                    <input type="hidden" name="cou" id='cou' value="<?php echo $dt['cour']; ?>" />
                    <input type="hidden" name="frrn" id='frrn' value="<?php echo $dt['frrn']; ?>" />
                    <input type="hidden" name="sttud" id='sttud' value="<?php echo $dt['sttud']; ?>" />
                    <input type="hidden" name="sres" id='sres' value="<?php echo $dt['result']; ?>" />

               </form>      
  
         <form id="formVideo" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>"  enctype="multipart/form-data" method="post" name="frm">
						<div class="col-sm-6">

						<div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3"> Student Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="course" name="course" class="form-control" />
                            </div>
                          </div>
						  
						
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3"> Exam Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="course" name="course" class="form-control" />
                            </div>
                          </div>
						  
						   <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Passing Mark<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="course" name="course" class="form-control" />
                            </div>
                          </div>
						  
						   <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Student Mark<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="course" name="course" class="form-control" />
                            </div>
                          </div>
						  
						   <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Exam Center<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="course" name="course" class="form-control" />
                            </div>
                          </div>
						  
						   <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Date<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                           <input type="text"  id="pcont" name="pcont" onchange="show(this)" class="form-control" title="Pleas Select Publish date" data-rel="datepicker" >
                            
                            </div>
                          </div>
						  
                        </div>
						
						 
						
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="display:none;" id="prelbl">Book Preview
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
  