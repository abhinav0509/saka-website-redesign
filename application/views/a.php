 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>Style/dist/js/jquery.validate.js"></script>
  
<script>
 var j=jQuery.noConflict(); 
j(document).ready(function(){
 
});


function Delete(id)
{
    //alert(id);
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Slider_Data/Delete',
            type: 'POST',
           data:{'action':'delsli','id':id},
      
            success: function (data) {
                 data=data.replace(/"/g, '');
                if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/Slider'; ?>"
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
         if(obj1[0][i].S_id==id)
         {
          r=i;
         }	
      }
       
	 $('#cap').val(obj1[0][r].Caption);
	 j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
}
   
   function val()
 { 
   j("#formSlider").validate({
  rules: {
   //upload: "required", 
  cap:"required"
  },
  messages: {
  //upload: "Please Upload Slider to Save",
  cap:"Please enter caption for image"
  }
  });
 }
 
 function val1()
 { 
    //document.frm.submit();
  }
  
</script>

   <div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1-1" data-toggle="tab">Gallery</a></li>
              <li class=""><a href="#tab1-2" data-toggle="tab">About Us</a></li>
			  <li class=""><a href="#tab1-3" data-toggle="tab">Slider</a></li>
			  <li class=""><a href="#tab1-4" data-toggle="tab">Testimonial</a></li>
			  <li class=""><a href="#tab1-5" data-toggle="tab">News</a></li>
			   <li class=""><a href="#tab1-6" data-toggle="tab">Course</a></li>
			    <li class=""><a href="#tab1-7" data-toggle="tab">Book</a></li>
				 <li class=""><a href="#tab1-8" data-toggle="tab">Download</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab1-1">
         
                
                    <div class="table-responsive" style="padding-top:5%;">
                         <div style="background-color:#f5f5f5;border-color:#ddd;color:#333;padding: 10px 15px;">
                          <h4 class="panel-title">Slider Details (Please add with serial number eg. id 1 is first slide) </h4>
                          </div>
                     <table class="table">
                        <thead>
                         <tr style="background-color:#d7dadc;">
                           <th width="1%">Id</th>
                           <th width="1%">Image</th>
                           <th width="10%">Caption</th>
                           <th width="10%">Status</th>
                           <th width="5%">Edit</th>
                           <th width="5%">Delete</th>
                         </tr>
						  </thead>
						 
						<tbody id="tdata" style="font-size:12px;">
						
                      
                       
                  </tbody>
            </table>
			
        </div>
                </div>
				
				<div class="tab-pane" id="tab1-2">
				
				<form id="formSlider" class="form-horizontal" action="#"  enctype="multipart/form-data" method="post">
					<div class="col-sm-6">

                          <div class="form-group">
						 
                            <label class="col-sm-4 control-label" for="inputPassword3"> Slider Image<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                              <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" style="padding-top:0px;"   />
                              <span style="color:#FF0000;" id="msg">Please select image with(1350 width - 450 height)</span>
                            </div>
                          </div>
						  <input type="hidden" id="bid" name="bid" value="" />
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              Caption<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                              <input type="text" id="cap" name="cap" class="form-control" required />
                            </div>
                          </div>
                          
                          
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="display:none;" id="prelbl">Image Preview</label>
                            <div class="col-sm-8">
                              
                                <img  src="" style="height:130px; width:100%; display:none;" id="photo"/>
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                            <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                            <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()" >
                            </div>
                          </div>
						</form>           
                
                
                
				
               </div>
              </div>
           </div>
     </div>
   </div>
     
