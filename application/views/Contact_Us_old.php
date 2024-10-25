<script>
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
  j("#home").addClass("open");
   j("#contact").addClass("active open");
});

function Delete(id)
{
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Contact/Delete',
            type: 'POST',
           data:{'action':'delbook123','id':id},
      
            success: function (data) {
				alert("Record Deleted Successfully");
                 if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/Contact'; ?>"
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
     $('#add').val(obj1[0][r].Add);
	 $('#cont').val(obj1[0][r].Contact);
	 $('#eml').val(obj1[0][r].email);
	 
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
</style>
   <div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Contact_Us</a></li>
                 <li id="t2"><a href="#tab1-2" data-toggle="tab">Add Contact_Us</a></li>
                </ul>
              <div class="tab-content">
			  <div class="tab-pane active" id="tab1-1">
				<div class="panel-footer">
				 <div class="table-responsive">
				  
				  <div class="row">
				  <div class="col-md-12" style="margin-bottom:36px;">
				   <div class="col-sm-3"></div>
				  <div class="col-sm-3"></div>
				  <div class="col-sm-3"><p style="float:right;margin-top:5px;margin-bottom:-29px">Enter Address..</p></div>
			      
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="fran" name="fran" class="form-control" placeholder="Search By Address:" required/>
			      </div>
			      </div>
			    </div>
				  
                   <table class="table">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="1%">Id</th>
                          <th width="10%">Address</th>
                          <th width="15%">Contact</th>
                          <th width="10%">Email</th>
                          <th width="5%">Edit</th>
                          <th width="5%">Delete</th>
                        </tr>
                      </thead>
					  <script>
					  var jArray=[];
					  jArray.push(<?php echo json_encode($enquiry); ?>);
					  </script>
					   <tbody id="tdata" style="font-size:12px;">
					    <?php 
					foreach($enquiry as $row)
					  {
					  ?>
					  <tr>
					  <td><?php print $row->id; ?></td>
					  <td><?php print $row->Add; ?></td>
					  <td><?php print $row->Contact; ?></td>
					  <td><?php print $row->email; ?></td>
				
					  <td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->id; ?>);" class="fa fa-edit"></i></td>
      				  <td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->id; ?>);" class="fa fa-trash-o"></i></td>
      				  </tr>
					  <?php } ?>
                      </tbody>
                    </table>
					<!--<div id="links" style="border:1px solid;text-align:center;background-color:#d7dadc;">
					<?php //echo "Select The Records"; ?>
					<?php //echo $links; ?>
					</div>-->
                  </div>
				  </div>
				  
                </div>
							<div class="tab-pane" id="tab1-2">
							<form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/Contact/Insert"; ?>"  enctype="multipart/form-data" method="post" name="frm">
							
							<div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Contact Us</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            <!--<a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>--->
                        </div>
					
					
					</div>
							
							<div class="col-sm-6" style="margin-top:1%;">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Address<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="add" name="add" class="form-control" required/>
                            </div>
                          </div>
                         
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Contact No<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="cont" name="cont" class="form-control" required/>
                            </div>
                          </div>
						  
						   <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Email_Id<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="eml" name="eml" class="form-control" required/>
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
						 
						 
						 
						 
						
                         <input type="hidden" id="bid" name="bid" value="" />
						 </div>
                        </form>           
                
                </div>
               
              </div>
           </div>
     </div>
   </div>
  