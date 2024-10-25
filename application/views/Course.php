<script src="<?php echo base_url(); ?>/Style/dist/js/Course.js"></script> 
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
</style>
<script>
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
   j("#cour1").addClass("open");
   CKEDITOR.replace( 'Desc');
   CKEDITOR.replace('Cont');
});
function Delete(id)
{
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Course_Data/Delete',
            type: 'POST',
           data:{'action':'delcourse','id':id},
            success: function (data) {
                 data=data.replace(/"/g, '');
                if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/Course'; ?>"
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
      var editor2 = CKEDITOR.instances.Cont;
      if( editor1.mode == 'wysiwyg' )
      {
                  editor1.insertHtml(obj1[0][r].Description);
      }
	  if( editor2.mode == 'wysiwyg' )
      {
                  editor2.insertHtml(obj1[0][r].Content);
      }
	 $('#photo').attr('src', '<?php echo base_url().'uploads/Courses/'?>'+obj1[0][r].image+' ');
	 $('#photo').show();
     $('#duration').val(obj1[0][r].Duration);
	 $('#charge').val(obj1[0][r].Fair);
	 $('#book').val(obj1[0][r].Book);
	 $('#Exam').val(obj1[0][r].Exam);
	 $('#course').val(obj1[0][r].Course_Name);
	 j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
}
 function val()
{

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
</style>
   <div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Course</a></li>
                 <li id="t2" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Add Course</a></li>
                </ul>
              <div class="tab-content">
			   <div class="tab-pane active" id="tab1-1">
				<div class="panel-footer">
				 <div class="table-responsive">
				  <div class="row">
				 <div class="col-md-12" style="margin-bottom:36px;">
				  <div class="col-sm-3"></div><div class="col-sm-3"></div><div class="col-sm-3" ><p style="float:right;margin-top:5px;margin-bottom:-29px">Enter The Course Name..</p></div>
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="state1" name="state1" class="form-control" placeholder="Search By Course"/>
			      </div>
			      </div>
			    </div>
				 <table class="table">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          
                          <th width="8%">Name</th>
                          <th width="8%">Duration</th>
                          <th width="2%">Fair</th>
            						  <th width="8%">Image</th>
            						  <th width="8%">Description</th>
            						  <th width="2%">Book</th>
                          <th width="2%">Exam</th>
            						  <th width="8%">Content</th>
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
						{ ?>
						<tr>
						<td><?php print $row->Course_Name; ?></td>
						<td><?php print $row->Duration; ?></td>
						<td><?php print $row->Fair; ?></td>
						<td><img src="<?php echo base_url(); ?>uploads/Courses/<?php echo $row->image; ?>" style="height:115px; width:192px;"></img></td>
						<td style="text-align:justify;"><?php echo $row->Description; ?></td>
      					<td><?php print $row->Book; ?></td>
						<td><?php print $row->Exam; ?></td>
						<td style="text-align:justify;"><?php echo $row->Content; ?></td>
      					<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->id; ?>);" class="fa fa-edit"></i></td>
      					<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->id; ?>);" class="fa fa-trash-o"></i></td>
      					<?php  } ?>
                      </tbody>
                    </table>
					<div id="links" style="border:1px solid;text-align:center;background-color:#d7dadc;">
					<?php echo "Select The Records"; ?>
					<?php echo $links; ?>
					</div>
                  </div>
				  </div>
                </div>
                <div class="tab-pane" id="tab1-2">
         <form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/Course_Data/Insert" ?>"  enctype="multipart/form-data" method="post" name="frm">
         
		 <div class="panel panel-default">
							 <div class="panel-heading">
					
					<h4 class="panel-title">Add Course</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            <!--<a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>-->
                        </div>
					
					
					</div>
		 
		 <div class="col-sm-6" style="margin-top:1%">
							<div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3"> Course Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                            <input type="text" id="course" name="course" class="form-control"> 
							</div>
                          </div>
						  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Duration<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="duration" name="duration" class="form-control" required/>
                            </div>
                          </div>
						   <input type="hidden" id="bid" name="bid" value="" />
						  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Fair<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="charge" name="charge" class="form-control" required/>
                            </div>
                          </div>
						   </div>
						<div class="col-sm-6" style="margin-top:1%">
                           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Exam<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="Exam" name="Exam" class="form-control" required/>
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
                       
                          <div class="form-group" style="margin-left:176px;">
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
						Course Description<span class="asterisk">*</span>
						</label>
						<div class="col-sm-9">
						<textarea id="Desc" name="Desc" class="form-control">
           			</textarea>
                  		</div>
						</div>
						</div>
						<div class="col-sm-12">
						  <div class="form-group">
						<label class="col-sm-2 control-label" for="inputPassword3">
						Course Content<span class="asterisk">*</span>
						</label>
						<div class="col-sm-9">
						<textarea id="Cont" name="Cont" class="form-control">
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
  