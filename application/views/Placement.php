<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>Style/dist/js/jquery.validate.js"></script>
  
<script>
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
   j("#place").addClass("open");
       CKEDITOR.replace( 'Desc');
  });

function Delete(id)
{
    //alert(id);
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Placement_Data/Delete',
            type: 'POST',
           data:{'action':'delcourse','Pl_id':id},
      
            success: function (data) {
                 data=data.replace(/"/g, '');
				 alert("Record Deleted Successfully.?");
                if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/Placement'; ?>"
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
         if(obj1[0][i].Pl_id==id)
         {
          r=i;
         }	
      }
      var editor1 = CKEDITOR.instances.Desc;
      if( editor1.mode == 'wysiwyg' )
      {
                  editor1.insertHtml(obj1[0][r].Job_Description);
      }
	 $('#photo').attr('src', '<?php echo base_url().'uploads/Placement/'?>'+obj1[0][r].Image+' ');
	 $('#photo').show();
     $('#Name').val(obj1[0][r].Stud_Name);
	 $('#Cont1').val(obj1[0][r].Stud_Cont);
	 $('#Course').val(obj1[0][r].Course_Name);
	 $('#comp').val(obj1[0][r].Company_Name);
	 $('#Desi').val(obj1[0][r].Designation);
	 $('#sall').val(obj1[0][r].Sallary);
	 
	 j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
}




 function val()
 { 
   
  	j("#formVideo").validate({
	rules:{
			Name:"required",
		    Cont1:"required",
		    Course:"required",
			comp:"required",
			Desi:"required",
			sall:"required",
			Desc:"required"
			
		   },
	
	message:{
			Name:"Please Fill The Information",
			Cont1:"Please Fill The Information",
			Course:"Please Fill The Information",
			comp:"Please Fill The Information",
			Desi:"Please Fill The Information",
			sall:"Please Fill The Information",
			Desc:"Please Fill The Information"
			}
	});
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
<style>
 td p{
  text-align:justify;
  margin-right:12%;
   width:160px; 
   height: 150px;
   overflow-y: auto;
 
   }  
</style>   <div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Placement</a></li>
                 <li id="t2" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Add Placement</a></li>
                
               </ul>
              <div class="tab-content">
			   <div class="tab-pane active" id="tab1-1">
					<div class="panel-footer">
				 <div class="table-responsive">
				  
				    <div class="row">
				  <div class="col-md-12" style="margin-bottom:36px;">
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="state1" name="state1" class="form-control" placeholder="Search By Student Name.." required/>
			      </div>
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="city1" name="city1" class="form-control" placeholder="Search By Course Name.." required/>
			      </div>
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="fran" name="fran" class="form-control" placeholder="Search By Company Name.." required/>
			      </div>
			      </div>
			    </div>
				  
				  
                    <table class="table">
                      <thead>
                        <tr>
                          <th width="1%">Id</th>
                          <th width="5%">Name</th>
                          <th width="5%">Contact</th>
                          <th width="8%">Image</th>
						  <th width="5%">Course</th>
						  <th width="8%">Company</th>
						  <th width="5%">Designation</th>
						  <th width="2%">Sallary</th>
						  <th width="15%">Description</th>
                          <th width="1%">Edit</th>
                          <th width="1%">Delete</th>
                        </tr>
						 </thead>
						<script>
						var jArray=[];
						 jArray.push(<?php echo json_encode($results); ?>);
						</script>
						<tbody id="tdata" style="font-size:12px;">
						<?php
						foreach($results as $row )
						{
						?>
						<tr>
						<td><?php print $row->Pl_id; ?></td>
						<td><?php print $row->Stud_Name; ?></td>
						<td><?php print $row->Stud_Cont; ?></td>
						<td><img src="<?php echo  base_url();	 ?>uploads/Placement/<?php echo $row->Image; ?>" style="height:115px; width:192px;"></td>
						<td><?php print $row->Course_Name; ?></td>
						<td><?php print $row->Company_Name; ?></td>
						<td><?php print $row->Designation; ?></td>
						<td><?php print $row->Sallary; ?></td>
						<td><?php print $row->Job_Description; ?></td>
						<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->Pl_id; ?>);" class="fa fa-edit"></i></td>
      					<td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->Pl_id; ?>);" class="fa fa-trash-o"></i></td>
      					</tr>
						<?php } ?>
                      </tbody>
                    </table>
					<div id="links" style="border:1px solid;text-align:center;">
					<?php echo "Select The Records"; ?>
					<?php echo $links; ?>
					</div>
                  </div>
				  </div>
				  
                </div>
                <div class="tab-pane" id="tab1-2">
         <form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/Placement_Data/Insert" ?>"  enctype="multipart/form-data" method="post" name="frm">
         
		 <div class="panel panel-default">
							 <div class="panel-heading">
					
					<h4 class="panel-title">Add Placement</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            <!--<a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>-->
                        </div>
					
					
					</div>
		 
		 
		 <div class="col-sm-6" style="margin-top:1%;">

                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3"> Student Name<span class="asterisk">*</span>
                          </label>
                            
                             <!--<input type="text" id="course" name="course" class="form-control" />--->
							 <div class="col-sm-8">
                             <input type="text" id="Name" name="Name" class="form-control" required/>
                            </div>
                            </div>
                          
						  
						  
						  
						  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Contact<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="Cont1" name="Cont1" class="form-control" required/>
                            </div>
                          </div>
						   <input type="hidden" id="bid" name="bid" value="" />
						  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Course<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="Course" name="Course" class="form-control" required/>
                            </div>
                          </div>
						  
						   
						  
                           
                          
                        </div>
						
						<div class="col-sm-6" style="margin-top:1%;">
						<div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Company Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="comp" name="comp" class="form-control" required/>
                            </div>
                          </div>
						  
						   <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Designation<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="Desi" name="Desi" class="form-control" required/>
                            </div>
                          </div>
						  
						  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Sallary<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="sall" name="sall" class="form-control" required/>
                            </div>
                          </div>
						  
						  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              Image<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                              <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" style="padding-top:0px;" />
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
						
						 <div class="col-sm-12">
						  <div class="form-group">
						<label class="col-sm-2 control-label" for="inputPassword3">
						Job Description<span class="asterisk">*</span>
						</label>
						<div class="col-sm-9">
						<textarea id="Desc" name="Desc" class="form-control">
                
						</textarea>
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
  