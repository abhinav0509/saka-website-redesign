<!--<script src="<?php echo base_url(); ?>/Style/dist/js/News.js"></script> -->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
 <script src="<?php echo base_url();?>Style/ckeditor.js"></script>
 
<script>
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
   j("#news").addClass("open");
   CKEDITOR.replace('Desc');
   j('[data-rel=datepicker]').datepicker({
        autoclose: true,
        todayHighlight: true
    });

});



function Delete(id)
{
    //alert(id);
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/News_Data/Delete',
            type: 'POST',
           data:{'action':'delbook','id':id},
      
            success: function (data) {
                 data=data.replace(/"/g, '');
                if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/News'; ?>"
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
         if(obj1[0][i].n_id==id)
         {
          r=i;
         }	
      }
      var editor1 = CKEDITOR.instances.Desc;
     
      if( editor1.mode == 'wysiwyg' )
      {
                  editor1.insertHtml(obj1[0][r].Description);
      }
	 $('#photo').attr('src', '<?php echo base_url().'uploads/News/'?>'+obj1[0][r].image+' ');
	 $('#photo').show();
     $('#course').val(obj1[0][r].Title);
	 $('#publish').val(obj1[0][r].Publish_Date);
	 
	 j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
}


 function val()
 { 
   	j("#formVideo").validate({
	rules:{
		   course:"required",
		   upload:"required",
		   publish:"required"
		  },
	
	message:{
			course:"Please Fill The Information",
			upload:"Please Fill The Information",
			publish:"Please Fill The Information"
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
<style>
 td p{
  text-align:justify;
  margin-right:12%;
   width:160px; 
   height: 150px;
   overflow-y: auto;
   width:106%;
   }  
</style>
   <div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-newspaper-o"></i>View News</a></li>
                 <li id="t2"><a href="#tab1-2" data-toggle="tab">Add News</a></li>
                
               </ul>
              <div class="tab-content">
			  
			  
			
			  
                <div class="tab-pane active" id="tab1-1">
                  <div class="panel-footer">
				  <div class="table-responsive">
				  
				  <div class="row">
				  <div class="col-md-12" style="margin-bottom:36px;">
				  <div class="col-sm-3"></div><div class="col-sm-3"></div><div class="col-sm-3" ><p style="float:right;margin-top:5px;margin-bottom:-29px">Enter The News Title..</p></div>
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="state1" name="state1" class="form-control" placeholder="Search By Title"/>
			      </div>
			      </div>
			    </div>
				  
				  
                      <table class="table">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="1%">Id</th>
                          <th width="10%">Title</th>
                          <th width="8%">Image</th>
                          <th width="10%">Description</th>
						  <th width="10%">Date</th>
                          <th width="5%">Edit</th>
                          <th width="5%">Delete</th>
                        </tr>
						 </thead>
						<script>
                            var jArray=[];
                           jArray.push(<?php echo json_encode($results); ?>);
						 </script>
						 <tbody id="tdata" style="font-size:12px;">
						<?php   
						foreach($results as $row)
						{
						?>
						<tr>
						<td><?php print $row->n_id; ?></td>
						<td><?php print $row->Title; ?></td>
						<td><img src="<?php echo base_url(); ?>uploads/News/<?php echo $row->image; ?>" style="height:115px; width:192px;"></img></td>
						<td><?php print $row->Description; ?></td>
						<td><?php print $row->Publish_Date; ?></td>
						<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->n_id; ?>);" class="fa fa-edit"></i></td>
      					<td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->n_id; ?>);" class="fa fa-trash-o"></i></td>
      					<?php } ?>
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
         <form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/News_Data/Insert"; ?>"  enctype="multipart/form-data" method="post" name="frm">
						
						
						<div class="panel panel-default">
							 <div class="panel-heading">
					
					<h4 class="panel-title">Add News</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                        </div>
					
					
					</div>
						
						<div class="col-sm-6" style="margin-top:1%;">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3"> News Title<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="course" name="course" class="form-control" required/>
                            </div>
                          </div>
						   <input type="hidden" id="bid" name="bid" value="" />
						  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              Image<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                              <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" style="padding-top:0px;" />
                            </div>
                          </div>
						 <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Publish Date<span class="asterisk">*</span>
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
						 <div class="col-sm-12">
						  <div class="form-group">
						<label class="col-sm-2 control-label" for="inputPassword3">
						Description<span class="asterisk">*</span>
						</label>
						<div class="col-sm-9">
						<textarea id="Desc" name="Desc" class="form-control">
                
						</textarea>
                  		</div>
						</div>
						</div>
						 <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="display:none;" id="prelbl">Image Preview
                            </label>
                            <div class="col-sm-8">
                              <img  src="" style="height:142px; width:42%; display:none;" id="photo"/>                                
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
  