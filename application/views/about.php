<script src="<?php echo base_url(); ?>Style/dist/js/About.js"></script>
<script>
 var j=jQuery.noConflict(); 
j(document).ready(function(){
   j("#home").addClass("open");
   j("#Habout").addClass("active open");
   
   
   CKEDITOR.replace('content1');
   CKEDITOR.replace('values');
   CKEDITOR.replace('mission');
   CKEDITOR.replace('vission');
   });
   
</script>
<script>
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
      var editor1 = CKEDITOR.instances.content1;
      var editor2 = CKEDITOR.instances.values;
      var editor3 = CKEDITOR.instances.mission;
      var editor4 = CKEDITOR.instances.vission;
      if( editor1.mode == 'wysiwyg' )
      {
       
            editor1.insertHtml(obj1[0][r].About_Content);
      }
     if( editor2.mode == 'wysiwyg' )
     {
       
            editor2.insertHtml(obj1[0][r].values);
     }
     if( editor3.mode == 'wysiwyg' )
     {
       
            editor3.insertHtml(obj1[0][r].mission);
     }
     if( editor4.mode == 'wysiwyg' )
     {
       
            editor4.insertHtml(obj1[0][r].vission);
     }
	 $('#photo').attr('src', '<?php echo base_url().'uploads/About/'?>'+obj1[0][r].image+' ');
	 $('#photo').show();
     
	 
     j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
		
}

function Delete(id)
{
    alert(id);
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/About/Delete',
            type: 'POST',
           data:{'action':'delabt','id':id},
      
            success: function (data) {
                 data=data.replace(/"/g, '');
                if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/about'; ?>"
				}
        
            },
            error: function () {
                
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
   width:12%;
   }  
   #DeleteN:hover{
    cursor: pointer;
   }
   #EditB{
    cursor: pointer;
   }
</style>
<div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab" onclick="abc1();">View About Us</a></li>
                <li class="" id="t2"><a href="#tab1-2" data-toggle="tab" onclick="abc();"><i id="edit" class="fa fa-edit"></i> Add About Us</a></li>
              </ul>
              <div class="tab-content">
			  
			  
			  
                <div class="tab-pane active" id="tab1-1">
                  <div class="panel-footer">
				  <div class="table-responsive" >
				  
				  <div class="row">
				   </div>
				  
                   <table class="table">
                      <thead>
                        <tr style="background-color:#d7dadc;">
						
                         <th width="3%" class="thdesign">Id</th>
                          <th width="7%" class="thdesign">Content</th>
                          <th width="7%" class="thdesign">Mission</th>
                          <th width="7%" class="thdesign">Vission</th>
                          <th width="7%" class="thdesign">Values</th>
            						  <th width="7%" class="thdesign">Image</th>
            						  <th width="1%" class="thdesign">Edit</th>
                          <th width="1%" class="thdesign">Delete</th>
						 
                        </tr>
                          </thead>
                        <script>
                            var jArray=[];
                           jArray.push(<?php echo json_encode($results ); ?>);
                        </script>
            <tbody id="tdata" style="font-size:12px;">
						<?php
      						foreach($results as $row)
      						{ ?>
      						<tr>
      						<td><?php print $row->id; ?></td>
      						<td><?php echo $row->About_Content; ?></td>
      						<td><?php echo $row->mission; ?></td>
      						<td><?php echo $row->vission; ?></td>
      						<td><?php echo $row->values; ?></td>
      						<td><img src="<?php echo base_url(); ?>uploads/About/<?php echo $row->image; ?>" style="height:150px; width:157px;"></img></td>
							<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->id; ?>);" class="fa fa-edit"></i></td>
      						<td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->id; ?>);" class="fa fa-trash-o"></i></td>
      						</tr>
						<?php } ?>
            </tbody>
                    </table>
                    <?php if($links)
                    { ?>
					<div id="links" style="border:1px solid;text-align:center;background-color:#d7dadc;">
					<?php echo "Select The Records"; ?>
					<?php echo $links; ?>
					</div>
          <?php } ?>
                    <div class="pager">
                    </div>
                  </div>
				  </div>
                </div>
                <div class="tab-pane" id="tab1-2">
         <form id="formVideo" class="form-horizontal" role="form"  action="<?php echo base_url()."index.php/About/about"; ?>"  enctype="multipart/form-data" method="post" name="frm">
            <div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Add About Us</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            <!--<a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>--->
                        </div>
					
					
					</div>
			
			
			
			<div class="col-sm-12"> 
           <div class="form-group">
             <label class="col-sm-2 control-label" for="inputPassword5">
               About_Us Content<span class="asterisk">*</span>
             </label>
             <div class="col-sm-10" style="margin-top:1%;">
               <!--<textarea id="testo" name="testo" rows="1" cols="34" ></textarea>-->
               <textarea id="content1" class="form-control" placeholder="Enter Contents ..." name="content1">
               </textarea>
               <input type="hidden" id="bid" name="bid" value="" />
             </div>
           </div>
           <div class="form-group">
             <label class="col-sm-2 control-label" for="inputPassword5">
              Mission<span class="asterisk">*</span>
             </label>
             <div class="col-sm-10">
               <textarea id="mission" name="mission" rows="1" cols="34" ></textarea>
              <!-- <input type="text" id="mission" class="form-control" name="mission"  />-->
             </div>
           </div>
		    <div class="form-group">
             <label class="col-sm-2 control-label" for="inputPassword5">
              Vission<span class="asterisk">*</span>
             </label>
             <div class="col-sm-10">
               <textarea id="vission" name="vission" rows="1" cols="34" ></textarea>
              </div>
           </div>
             <div class="form-group">
             <label class="col-sm-2 control-label" for="inputPassword5">
              Values
             </label>
             <div class="col-sm-10">
               <textarea id="values" name="values" class="form-control" placeholder="Enter Contents ..." name="values">
               </textarea>
             </div>
           </div>
                   <div class="col-sm-6">
                     <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              Image<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                              <input type="file" id="upload" accept="image/x-png, image/gif, image/jpeg, image/tif, image/bmp" name="upload" onchange="show(this);find(this.value);" class="form-control" required/>
                            </div>
                          </div>
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
						
						
                    </div>  
						<div class="panel-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" />
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" />
							  <input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel" />
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