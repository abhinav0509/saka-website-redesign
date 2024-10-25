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
                  <div class="table-responsive">
				 
				  
				<!--  <div class="row">
				  <div class="col-md-12" style="margin-bottom:36px;">
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="searchid" name="searchid" class="form-control" placeholder="Search By Book" required/>
			      <div id="result"></div>
				  </div>
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="city1" name="city1" class="form-control" placeholder="Search By Aurthor" required/>
			      </div>
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="fran" name="fran" class="form-control" placeholder="Search By Book Title" required/>
			      </div>
			      </div>
			    </div>
                    <!--<table id="table-hidden-row-details" class="table table-striped">-->
					<table id="table-hidden-row-details" class="table table-striped">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="1%">Id</th>
                          <th width="5%">Franchisee</th>
						  <th style="display:none;"></th>
						  <th style="display:none;"></th>
						  
                          <th width="8%">Student Name</th>
						  <th style="display:none;"></th>
						  <th style="display:none;"></th>
						  <th style="display:none;"></th>
                          <th width="5%">Student Email</th>
						  <th width="5%">Student Contact</th>
                          <th width="5%">Intrested Course</th>
						  <th style="display:none;"></th>
                          <th width="2%">Edit</th>
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
      						{ ?>
      						<tr>
      						<td><?php print $row->id; ?></td>
      						<td><?php echo $row->Franchisee_Name; ?></td>
							
							<td class="center" style="display:none;"><?php echo $row->f_State; ?></td>
							<td class="center" style="display:none;"><?php print $row->f_City;?></td>
							
							<td><?php print $row->stud_name;?></td>
							<td class="center" style="display:none;"><?php print $row->add;?></td>
							<td class="center" style="display:none;"><?php print $row->state;?></td>
							<td class="center" style="display:none;"><?php print $row->city;?></td>
							
							<td><?php print $row->email; ?></td>
							<td><?php print $row->contact;?></td>
							<td><?php print $row->course; ?></td>
							<td class="center" style="display:none;"><?php print $row->enq_date;?></td>
      						<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->id; ?>);" class="fa fa-edit"></i></td>
      						<td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->id; ?>);" class="fa fa-trash-o"></i></td>
      						</tr>
						<?php } ?>
						</tbody>
                    </table>
					<div id="links" style="border:1px solid;text-align:center;background-color:#d7dadc;">
					<?php echo "Select The Records"; ?>
					<?php //echo $links; ?>
					</div>
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
                           <!-- <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>--->
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
  