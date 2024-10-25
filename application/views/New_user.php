
<script>
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
   j("#nuser").addClass("active open");
   j("#alert").delay(3200).fadeOut(300);
});

function Delete(id)
{
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Admin/Delete_userr',
            type: 'POST',
           data:{'id':id},
      
            success: function (data) {
              var obj=j.parseJSON(data);
			 alert(obj.message);
        if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/create_user'; ?>"
				}
        
            },
            error: function () {
                
            }
        });
}

function Edit(obj1,id)
{
   
    j('#formVideo').attr('action','<?php echo base_url(); ?>index.php/Admin/Update_userr');
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
   $('#fname').val(obj1[0][r].user_name);
	 $('#cont').val(obj1[0][r].contact);
	 $('#eml').val(obj1[0][r].uemail);
   $('#uname').val(obj1[0][r].email);
   $('#pass1').val(obj1[0][r].pass);
   
   

   j('#utype option').each(function () {
       if (j(this).val() == obj1[0][r].user_type) {
            j(this).attr('selected', 'selected');
          }
    }); 
	 
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
 table.table thead .sorting::before {
    content: "";
}
table.table thead .sorting_asc::before, table.table thead .sorting_asc_disabled::before {
    content: "";
}
table.table thead .sorting_desc::before, table.table thead .sorting_desc_disabled::before {
    content: "";
}
</style>
<!-- Data Table css End -->
<style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 8px 6px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}
table thead th{
  text-align: center;

  }
  td:hover{cursor: pointer;}
  td fa{cursor:pointer;}
  table tbody td{
  font-family: calibri;
  font-size: 13px;
  text-align: center;
}
table tbody td a:hover{
  text-decoration: none;
}
table tbody td{

    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.alert {
    padding: 3px;
    margin-bottom: 18px;
    border: 1px solid transparent;
    border-radius: 4px;
}  
</style>
   <div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View User</a></li>
                 <li id="t2"><a href="#tab1-2" data-toggle="tab">Create New User</a></li>
                 <?php if(isset($message)) { ?>
                 <li class="pull-right">
                        
                        <div class="alert alert-success" id="alert">
                                    <strong><?php echo $message; ?></strong> 
                                </div>
                      
                 </li>
                 <?php } ?>
                </ul>
              <div class="tab-content">
			  <div class="tab-pane active" id="tab1-1">
				
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
                          <th width="10%">Name</th>
                          <th width="5%">Contact</th>
                          <th width="10%">Email</th>
                          <th width="5%">User Name</th>
                          <th width="5%">User Type</th>
                          <th width="5%">Password</th>
                          <th width="2%">Edit</th>
                          <th width="2%">Delete</th>
                        </tr>
                      </thead>
					  <script>
					  var jArray=[];
					  jArray.push(<?php echo json_encode($users); ?>);
					  </script>
					   <tbody id="tdata" style="font-size:12px;">
				          <?php if(!empty($users)){foreach($users as $row) { ?>	 
      					  <tr>
      					  <td><?php echo $row['user_name']; ?></td>
      					  <td><?php echo $row['contact']; ?></td>
      					  <td><?php echo $row['uemail']; ?></td>
      					  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['user_type']; ?></td>
      				    <td><?php echo $row['pass']; ?></td>
                  <td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,'<?php echo $row['id']; ?>');" class="fa fa-edit"></i></td>
            			<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete('<?php echo $row['id']; ?>');" class="fa fa-trash-o"></i></td>
            		  </tr>
                  <?php } } ?>
					 
           </tbody>
                    </table>
					<!--<div id="links" style="border:1px solid;text-align:center;background-color:#d7dadc;">
					<?php //echo "Select The Records"; ?>
					<?php //echo $links; ?>
					</div>-->
                  </div>
				
				  
                </div>
							<div class="tab-pane" id="tab1-2">
							<form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/Admin/user_create"; ?>"  enctype="multipart/form-data" method="post" name="frm">
							
							<div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Contact Us</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            <!--<a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>-->
                        </div>
					
					
					</div>
							<div class="panel-body">
							<div class="col-sm-6" style="margin-top:1%;">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Full Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                              <input type="text" id="fname" name="fname" placeholder="Enter Full Name" class="form-control" required/>
                            </div>
                          </div>
                         
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Contact No<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="cont" name="cont" placeholder="Enter Contact No Here"  class="form-control" required pattern="[0-9]{10,10}" title="Enter 10 Digit Mobile Number"/>
                            </div>
                          </div>
						  
						   <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Email_Id
                          </label>
                            <div class="col-sm-8">
                             <input type="email" id="eml" name="eml" class="form-control" placeholder="Enter Correct Email Id" />
                            </div>
                          </div>
						   </div>

               <div class="col-sm-6" style="margin-top:1%;">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">User Type<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                              <select class="form-control" id="utype" name="utype" required title="Select User Type">
                                    <option value="">Select User Type</option>
                                    <option>Admin</option>
                                    <option>Employee</option>
									<option>Exam</option>
                              </select>
                            </div>
                          </div>
                         
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">User Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="email" id="uname" name="uname" class="form-control" placeholder="Enter Email Id here" required/>
                            </div>
                          </div>
              
               <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Password<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="password" id="pass1" name="pass" placeholder="Enter Password Here" class="form-control" required/>
                            </div>
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
						 
                        </form>           
                
                </div>
               
              </div>
           </div>
     </div>
   </div>
  