

<script src="<?php echo base_url();?>Style/dist/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script>
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
  
 
  
  j('#dt').datepicker({
        autoclose: true,
        todayHighlight: true
    });
});
</script>
<script>
 function val()
 { 
   j("#formVideo").validate({
  rules:{ 
      nm:"required",
      upload:"required",
        testo:"required"
      },
  
  message:{
      nm:"Please Fill The Information",
      upload:"Please Fill The Information",
      testo:"Please Fill The Information"
      }
  });
 }
 
 function Delete(id)
 {
  if(confirm("Are You Sure You Want To Delete It.?"))
  j.ajax({
      url: '<?php echo base_url(); ?>index.php/Testimonial_Data/Delete',
            type: 'POST',
      data:{'action':'deltesti','T_id':id},
      success: function(data){
         data=data.replace(/"/g, '');
         
         alert("Record Deleted Successfully.?");
          if(data)
          {
          window.location="<?php echo base_url().'index.php/Admin/Testimonial'; ?>"
          }
        
        },
        error: function () {
                
        }
  
  });
 }
 
 function Edit(obj1,id)
{
  //alert("fsgfg");
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
  var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].T_id==id)
         {
          r=i;
         }  
      }
      var editor1 = CKEDITOR.instances.testo;
      if( editor1.mode == 'wysiwyg' )
      {
                  editor1.insertHtml(obj1[0][r].Content);
      }
   $('#photo').attr('src', '<?php echo base_url().'uploads/Testimonial/'?>'+obj1[0][r].Image+' ');
   $('#photo').show();
     
     $('#nm').val(obj1[0][r].Name);
   j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
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


<div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Testimonial</a></li>
                 <li id="t2"><a href="#tab1-2" data-toggle="tab">Add Testimonial</a></li>
                
               </ul>
              <div class="tab-content">
			 
                <div class="tab-pane active" id="tab1-1">
                  <div class="panel-footer">
				  <div class="table-responsive">
				  
				    <div class="row">
				  <div class="col-md-12" style="margin-bottom:36px;">
			      <div class="col-sm-3"></div><div class="col-sm-3"></div><div class="col-sm-3" ><p style="float:right;margin-top:5px;margin-bottom:-29px">Enter The Testimonial Name..</p></div>
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="state1" name="state1" class="form-control" placeholder="Search By Name" required/>
			      </div>
			      
			      </div>
			    </div>
				  
                    <table class="table">
                       <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="5%">Id</th>
                          <th width="5%">Franchisee Name</th>
                          <th width="5%">Student Name</th>
                          <th width="5%">Course</th>
                          <th width="5%">State</th>
                          <th width="5%">City</th>
                         
                          
                        </tr>
                      </thead>
					  <script>
					var jArray=[];
					jArray.push(<?php echo json_encode($results); ?>);
					</script>
					<tbody id="tdata" style="font-size:12px;">
           <?php if(!empty($results)){ foreach($results as $res) { ?>
						<tr>
  						<td><?php echo  $res->id; ?></td>
  						<td><?php echo  $res->fname; ?></td>
  						<td><?php echo  $res->sname; ?></td>
  						<td><?php echo  $res->course; ?></td>
  						<td><?php echo  $res->state; ?></td>
        			<td><?php echo  $res->city; ?></td>
      			</tr>
            <?php } } ?>
					
						
                      </tbody>
                    </table>
                    <?php if(isset($links)){ ?>
					<div id="links" style="border:1px solid;text-align:center;background-color:#d7dadc;">
					<?php echo "Select The Records"; ?>
					<?php echo $links; ?>
          <?php } ?>
					</div>
                  </div>
				  </div>
                </div>

                <div class="tab-pane" id="tab1-2">
         <form id="formVideo" class="form-horizontal" role="form" action="<?php echo  base_url()."index.php/welcome/save_job"; ?>"  enctype="multipart/form-data" method="post" name="frm">
         <div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Create Job Card</h4>

                      
                          <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            
                          </div>
					         </div>
		 
		           <div class="col-sm-4" style="margin-top:1%;">

                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Franchisee Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                            <select name="frn" id="frn" class="form-control">
                                  <option>Select Franchisee</option>
                                  <?php foreach($fran as $f) { ?>
                                  <option><?php echo $f->institute_name; ?></option>
                                  <?php } ?>
                            </select>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              Student Image<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                              <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" style="padding-top:0px;" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="" id="prelbl">
                            </label>
                            <div class="col-sm-8">
                              <img  src="<?php echo base_url(); ?>/Style/images/placement/d.png" style="height:150px; width:150px;" id="photo"/>                                
                              </div>
                          </div>
                          
                          <input type="hidden" id="bid" name="bid" value="" />
                          
              </div>
              <div class="col-sm-4" style="margin-top:1%;">

                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Student Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="nm" name="nm" class="form-control" required/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Valid Upto<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="dt" name="dt" class="form-control" data-rel="datepicker"/>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              State<span class="asterisk">*</span>
                            </label>
                           <div class="col-sm-8">
                            <select name="state" id="state" class="form-control">
                                  <option value="">Select State</option>
                                  <?php foreach($states as $s) { ?>
                                  <option><?php echo $s->name; ?></option>
                                  <?php } ?>
                            </select>
                            </div>
                          </div>
                          
                       
                          
              </div>
              <div class="col-sm-4" style="margin-top:1%;">

                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Student Code<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="code" name="code" class="form-control" required/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Select Course<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                            <select name="course" id="course" class="form-control">
                                  <option value="">Select Course</option>
                                  <option>Tally Proffessional</option>
                                  <option>Master In Excel</option>
                            </select>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              City<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                            <select name="city" id="city" class="form-control">
                                  <option value="">Select City</option>
                                  <?php foreach($cities as $c) { ?>
                                  <option><?php echo $c->name; ?></option>
                                  <?php } ?>
                            </select>
                            </div>
                          </div>
                          
                          <input type="hidden" id="bid" name="bid" value="" />
                          
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