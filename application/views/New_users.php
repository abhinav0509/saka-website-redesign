
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

   <!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav">
                                <li class="active btn btn-success" id="t1"><a href="#tab1-1" data-toggle="tab" style="color: #ffffff;">View User <i data-feather="eye"></i></a></li>
                                <li id="t2" class="btn btn-primary" style="margin-left: 10px;"><a href="#tab1-2" data-toggle="tab" style="color: #ffffff;">Add User <i data-feather="plus"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- View Blog Details Tab -->
                                <div class="tab-pane active" id="tab1-1">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    
                                                    <th class="text-center" width="3%">Name</th>
                                                    <th width="3%">Contact</th>
                                                    <th width="3%">Email</th>
                                                    <th width="3%">User Name</th>
                                                    <th width="3%">User Type</th>
                                                    <th width="3%">Password</th>
                                                    <th class="text-center" width="6%">Actions</th>
                                                </tr>
                                            </thead>
                                            <script>
                                                var jArray=[];
                                                jArray.push(<?php echo json_encode($users); ?>);
                                            </script>
                                            <tbody id="tdata">
                                                <?php if (!empty($users)) { foreach($users as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row['user_name']; ?></td>
                                                    <td><?php echo $row['contact']; ?></td>
                                                    <td><?php echo $row['uemail']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['user_type']; ?></td>
                                                    <td><?php echo $row['pass']; ?></td>
                                                    <!-- <td><img src="<?php echo base_url(); ?>uploads/Blog/<?php echo $row->Image; ?>" style="height:115px; width:192px;"></td> -->
                                                    <!-- <td style="text-align: justify;">
                                                        <?php 
                                                            $content = strip_tags($row->Content); 
                                                            $shortContent = substr($content, 0, 100); 
                                                            if (strlen($content) > 100) { 
                                                                $shortContent .= '...'; 
                                                            } 
                                                            echo $shortContent; 
                                                        ?>
                                                    </td> -->
                                                    <!-- <td><?php echo $row->insertdate; ?></td> -->
                                                    <!-- <td class="text-center">
                                                        <button class="btn btn-primary btn-sm" id="EditB" onclick="Edit(jArray,'<?php echo $row['id']; ?>');">
                                                            <i class="far fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-sm" id="DeleteN" onclick="Delete('<?php echo $row['id']; ?>');">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </td> -->
                                                    <td class="text-center">
                                                        <button class="btn btn-primary btn-action mr-1" data-toggle="tooltip"  onclick="Edit(jArray,'<?php echo $row['id']; ?>');">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-action" data-toggle="tooltip" onclick="Delete('<?php echo $row['id']; ?>');">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php } } else { ?>
                                                <tr> 
                                                    <td colspan="8">
                                                        <div class="alert alert-info">
                                                            <strong>No Data Available.....!</strong>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                  
                                <!-- Add Blog Tab -->
                                <div class="tab-pane" id="tab1-2">
                                    <h4>Create New User</h4>
                                    <form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/Admin/user_create"; ?>"  enctype="multipart/form-data" method="post" name="frm">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Full Name <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" id="fname" name="fname" placeholder="Enter Full Name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact No <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                            <input type="text" id="cont" name="cont" placeholder="Enter Contact No Here" class="form-control" required pattern="[0-9]{10,10}" title="Enter 10 Digit Mobile Number"></div>
                                        </div>                                       
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email_Id <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                            <input type="email" id="eml" name="eml" class="form-control" placeholder="Enter Correct Email Id" required>
                                            </div>
                                        </div>               
                                      <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User Type</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control" id="utype" name="utype" required title="Select User Type">
                                            <option value="">Select User Type</option>
                                            <option>Admin</option>
                                            <option>Employee</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User Name <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="email" id="uname" name="uname" class="form-control" placeholder="Enter Email Id here" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                            <input type="password" id="pass1" name="pass" placeholder="Enter Password Here" class="form-control" required/>
                                            </div>
                                        </div>
                                        <input type="hidden" id="bid" name="bid" value=""/> 
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                             <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                                            <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()"/>
							                <input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
