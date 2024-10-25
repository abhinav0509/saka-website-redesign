<script src="<?php echo base_url(); ?>Style/dist/js/Fran_Enquiry.js"></script>
 

<script>
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
  j("#book").addClass("open");
   CKEDITOR.replace( 'Desc');
  
});

function Delete(id)
{
	if (confirm("Are you sure, you want to Delete It.."))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Franchisee/Delete_Enquiry_Data',
            type: 'POST',
           data:{'action':'delbook','id':id},
      
            success: function (data) {
			alert("Record Deleted Successfully...??")
			     if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/Active_Fran_Enquiry'; ?>"
				}
        
            },
            error: function () {
                
            }
        });
}

function Edit(obj1,id)
{

	
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
<script>
 function val()
 { 
  	j("#formVideo").validate({
	rules:{
		   //book:"required",
		  // author:"required",
		  // title:"required",
		  // price:"required",
		  // upload:"required",
		   },
		message:{
			//book:"Please Provide The Book Name",
			//author:"Please Provide The Author Name",
			//title:"Please Provide The Tilte",
			//price:"Please Provide The Price Of Book",
			//upload:"Please Upload The Image"
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
  <div class="container-fluid-md">
     
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">Franchisee Enquiry</a></li>
                 
           </ul>
				<div class="row">
              <div class="tab-content">
			      <div class="tab-pane active" id="tab1-1">
                 
                  </div>
              </div>
              
                <div class="tab-pane" id="tab1-2">
         <form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/Book_Data/Insert"; ?>"  enctype="multipart/form-data" method="post" name="frm">
					<div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Add Book</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                        </div>
					
					
					</div>



					<div class="col-sm-6" style="margin-top:1%;">
					
						   <input type="hidden" id="bid" name="bid" value="" />
						
                        </div>
						
			
                      
           <div class="col-sm-12">
            
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
  