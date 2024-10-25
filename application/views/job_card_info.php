

<script src="<?php echo base_url();?>Style/dist/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>       
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>  
<script>
var obj1=[];
  var j=jQuery.noConflict();
  j(document).ready(function(){
  
 
  
  j('#dt').datepicker({
        autoclose: true,
        todayHighlight: true
    });
 
  j("#fr").keypress(function(event){
       
         if(event.which == 13) { 
          j('#tdata').empty();
           j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Admin/job_card_det',
            type: 'POST',
            data:{'caption':j(this).val()},
      
            success: function (data) {
    
                 var obj = j.parseJSON(data);
                 
                obj1=obj;
                 for(i=0;i<obj.length;i++)
                 { 
                      
                       j('#tdata').append("<tr id='B"+obj[i].id+"'><td>"+obj[i].id+"</td><td>"+obj[i].fname+"</td><td>"+obj[i].sname+"</td><td>"+obj[i].course+"</td><td>"+obj[i].state+"</td><td>"+obj[i].city+"</td><td><a href='javascript:void(0);' title='Download Pdf'><i class=\"fa fa-file-pdf-o\" onclick='Download_pdf(" + obj[i].id + ")' style='margin-left:10px;font-size:20px; color:#FF3500;'></i></a><a href='javascript:void(0);' title='Download Excel'><i class=\"fa fa-file-excel-o\" onclick=\"Download_Excel("+obj[i].id+",'"+obj[i].fname+"')\" style='margin-left:10px;font-size:20px;'></i></a></td><td><i style='color:#275273;font-size:25px;' id='EditB' onclick='Edit1( obj1,"+ obj[i].id +")' class=\"fa fa-edit\"></i></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='Delete(" + obj[i].id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
                 }
        
            },
            error: function () {
                
            }
        });

      }
 
    });//Keypress



 Search();

});
</script>
<script>
function Search() { 
       var j = jQuery.noConflict(); 
       var f=j('#down').val();
       j("#fr").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Admin/Getfrnenquiry",
                       data: { term: j("#fr").val()},
                      dataType: "json",
                       success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.fname,
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
                  //var val1=ui.item.label.replace(/&/, "&amp;");
                  j('#fr').val(ui.item.label);
                  return false;
              }
          });
}
function all_data(str)
{
    var fnm=j('#fr').val();
    if(str=="Download Excel" && fnm!="")
    {
        window.location="<?php echo base_url();?>index.php/Admin/all_jobcard_excel?fname="+fnm
    }
    else if(str=="Download Excel" && fnm=="")
    {
        window.location="<?php echo base_url();?>index.php/Admin/all_jobcard_excel"
    }
    else if(str=="Download Pdf" && fnm!="")
    {
       window.location="<?php echo base_url();?>index.php/Admin/all_jobcard_pdf?fname="+fnm
    }
    else if(str=="Download Pdf" && fnm!="")
    {
       window.location="<?php echo base_url();?>index.php/Admin/all_jobcard_pdf"
    }
}
 function val()
 { 
   j("#formVideo").validate({
  rules:{ 
      nm:"required",
      upload:"required",
        testo:"required"
      },
  
  message:{
      nm:"Please Fill The Information",
      upload:"Please Fill The Information",
      testo:"Please Fill The Information"
      }
  });
 }
 
 function Delete(id)
 {
  if(confirm("Are You Sure You Want To Delete It.?"))
  j.ajax({
      url: '<?php echo base_url(); ?>index.php/Testimonial_Data/Delete',
            type: 'POST',
      data:{'action':'deltesti','T_id':id},
      success: function(data){
         data=data.replace(/"/g, '');
         
         alert("Record Deleted Successfully.?");
          if(data)
          {
          window.location="<?php echo base_url().'index.php/Admin/Testimonial'; ?>"
          }
        
        },
        error: function () {
                
        }
  
     });
 }
 function Edit1(allobj,id)
 {
    
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
    $('form').attr("action", "<?php echo base_url().'index.php/Admin/Update_jobcard';?>");
    var r;
      for(i=0;i<allobj.length;i++)
      {
         if(allobj[i].id==id)
         {
          r=i;
         }  
      }
     j('#frn option').each(function () {
          if (j(this).val() == allobj[r].fname) {
                j(this).attr('selected', 'selected');
            }
        });

     j('#course option').each(function () {
          if (j(this).val() == allobj[r].course) {
                j(this).attr('selected', 'selected');
            }
        });

     j('#state option').each(function () {
          if (j(this).val() == allobj[r].state) {
                j(this).attr('selected', 'selected');
            }
        });
     j('#city option').each(function () {
          if (j(this).val() == allobj[r].city) {
                j(this).attr('selected', 'selected');
            }
        });
     
   j('#photo').attr('src', '<?php echo base_url().'uploads/job_card/'?>'+allobj[r].img+' ');
   j('#photo').show();
     
     j('#nm').val(allobj[r].sname);
     j('#code').val(allobj[r].scode);
     j('#dt').val(allobj[r].vupto);
     j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
}
 function Edit(obj1,id)
 {
    
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
    $('form').attr("action", "<?php echo base_url().'index.php/Admin/Update_jobcard';?>");
    var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].id==id)
         {
          r=i;
         }  
      }
     j('#frn option').each(function () {
          if (j(this).val() == obj1[0][r].fname) {
                j(this).attr('selected', 'selected');
            }
        });

     j('#course option').each(function () {
          if (j(this).val() == obj1[0][r].course) {
                j(this).attr('selected', 'selected');
            }
        });

     j('#state option').each(function () {
          if (j(this).val() == obj1[0][r].state) {
                j(this).attr('selected', 'selected');
            }
        });
     j('#city option').each(function () {
          if (j(this).val() == obj1[0][r].city) {
                j(this).attr('selected', 'selected');
            }
        });
     
   j('#photo').attr('src', '<?php echo base_url().'uploads/job_card/'?>'+obj1[0][r].img+' ');
   j('#photo').show();
     
     j('#nm').val(obj1[0][r].sname);
     j('#code').val(obj1[0][r].scode);
     j('#dt').val(obj1[0][r].vupto);
     j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
}

 
 function Download_Excel(id,name)
 {
    
    window.location="<?php echo base_url(); ?>index.php/Admin/single_jobcard_excel?id="+id+"&"+"name="+name;
 }
 function Download_pdf(id)
 {
   
    window.location="<?php echo base_url(); ?>index.php/Admin/get_single_enquiry_pdf?id="+id;
 }


 function val1()
 { 
    document.frm.submit();
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
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Jobcard details</a></li>
                 <li id="t2"><a href="#tab1-2" data-toggle="tab">Add Testimonial</a></li>
                
               </ul>
              <div class="tab-content">
			 
                <div class="tab-pane active" id="tab1-1">
                  <div class="panel-footer">
				  <div class="table-responsive">
				  
				    <div class="row">
        				  <div class="col-md-12" style="margin-bottom:36px;">
          			      <div class="col-sm-3">Search Details</div>
                      <div class="col-sm-3">
                         
                      </div>
                      <div class="col-sm-3" >
                          <input type="text" id="fr" name="fr" class="form-control" placeholder="Search By Franchisee" required/> 
                      </div>
                      <div class="col-sm-3" >
                          <select name="down" id="down" onchange="all_data(this.value)" class="form-control">
                               <option>Select</option>
                               <option>Download Excel</option>
                               <option>Download Pdf</option>
                          </select>
                      </div>
          			     
        			      
        			     </div>
			      </div>
				  
                    <table class="table">
                       <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="1%">Id</th>
                          <th width="7%">Franchisee Name</th>
                          <th width="7%">Student Name</th>
                          <th width="7%">Course</th>
                          <th width="2%">State</th>
                          <th width="2%">City</th>
                          <th width="2%">Download</th>
                          <th width="2%">Edit</th>
                          <th width="2%">Delete</th>
                         
                          
                        </tr>
                      </thead>
					  <script>
					var jArray=[];
					jArray.push(<?php echo json_encode($results); ?>);
					</script>
					<tbody id="tdata" style="font-size:12px;">
           <?php if(!empty($results)){ foreach($results as $res) { ?>
						<tr>
  						<td><?php echo  $res->id; ?></td>
  						<td><?php echo  $res->fname; ?></td>
  						<td><?php echo  $res->sname; ?></td>
  						<td><?php echo  $res->course; ?></td>
  						<td><?php echo  $res->state; ?></td>
        			<td><?php echo  $res->city; ?></td>
              <td><a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onclick="Download_pdf('<?php echo $res->id; ?>')" style="margin-left:10px;font-size:20px; color:#FF3500;"></i></a><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onclick="Download_Excel('<?php echo $res->id; ?>','<?php echo $res->fname; ?>')" style="margin-left:10px;font-size:20px;"></i></a></td>
              <td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $res->id; ?>);" class="fa fa-edit"></i></td>
              <td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $res->id; ?>);" class="fa fa-trash-o"></i></td>
      			</tr>
            <?php } } ?>
					
						
                </tbody>
                    </table>
                    <?php if(isset($links)>0){ ?>
					<div id="links" style="border:1px solid;text-align:center;background-color:#d7dadc;">
					<?php echo "Select The Records"; ?>
					<?php echo $links; ?>
          
					</div>
          <?php } ?>
                  </div>
				  </div>
                </div>

                <div class="tab-pane" id="tab1-2">
         <form id="formVideo" class="form-horizontal" role="form" action="<?php echo  base_url()."index.php/welcome/save_job"; ?>"  enctype="multipart/form-data" method="post" name="frm">
         <div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Create Job Card</h4>

                      
                          <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            
                          </div>
					         </div>
		 
		           <div class="col-sm-4" style="margin-top:1%;">

                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Franchisee Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                            <select name="frn" id="frn" class="form-control">
                                  <option>Select Franchisee</option>
                                  <?php foreach($fran as $f) { ?>
                                  <option><?php echo $f->institute_name; ?></option>
                                  <?php } ?>
                            </select>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              Student Image<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                              <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" style="padding-top:0px;" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="" id="prelbl">
                            </label>
                            <div class="col-sm-8">
                              <img  src="<?php echo base_url(); ?>/Style/images/placement/d.png" style="height:150px; width:150px;" id="photo"/>                                
                              </div>
                          </div>
                          
                          <input type="hidden" id="bid" name="bid" value="" />
                          
              </div>
              <div class="col-sm-4" style="margin-top:1%;">

                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Student Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="nm" name="nm" class="form-control" required/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Valid Upto<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="dt" name="dt" class="form-control" data-rel="datepicker"/>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              State<span class="asterisk">*</span>
                            </label>
                           <div class="col-sm-8">
                            <select name="state" id="state" class="form-control">
                                  <option value="">Select State</option>
                                  <?php foreach($states as $s) { ?>
                                  <option><?php echo $s->name; ?></option>
                                  <?php } ?>
                            </select>
                            </div>
                          </div>
                          
                       
                          
              </div>
              <div class="col-sm-4" style="margin-top:1%;">

                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Student Code<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="code" name="code" class="form-control" required/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Select Course<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                            <select name="course" id="course" class="form-control">
                                  <option value="">Select Course</option>
                                  <option>Tally Proffessional</option>
                                  <option>Master In Excel</option>
                            </select>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              City<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                            <select name="city" id="city" class="form-control">
                                  <option value="">Select City</option>
                                  <?php foreach($cities as $c) { ?>
                                  <option><?php echo $c->name; ?></option>
                                  <?php } ?>
                            </select>
                            </div>
                          </div>
                          
                       
                          
                  </div>
                        
          
						<div class="panel-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()"/>

							<input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>

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