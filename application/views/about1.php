<script>
 var j=jQuery.noConflict(); 
j(document).ready(function(){
   j("#home").addClass("active open");
   j("#Habout").addClass("active");
   j('#tdata').empty();
   CKEDITOR.replace('content');
   CKEDITOR.replace('values');
   CKEDITOR.replace('mission');
   CKEDITOR.replace('vission');
   });
  function val()
  {
	j("#formVideo").validate({
    rules: {
    content: "required", 
    values:"required",
	mission:"required",
	vission:"required",
	upload:"required"
    },
    messages: {
    content: "Please Fill The Information",
    values:"Please Fill The Information",
	mission: "Please Fill The Information",
    vission:"Please Fill The Information",
	upload:"Please Fill The Information"
    }
    });
  }
</script>
 <div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View About Us</a></li>
                <li class="" id="t2"><a href="#tab1-2" data-toggle="tab"><i id="edit" class="fa fa-edit"></i> Add About Us</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab1-1">
                  <div class="table-responsive" >
                 
                    <table class="table">
                      <thead>
                        <tr>
                        
                          <th width="3%" class="thdesign">Id</th>
                          <th width="7%" class="thdesign">Content</th>
                          <th width="7%" class="thdesign">Mission</th>
                          <th width="7%" class="thdesign">Vission</th>
                          <th width="7%" class="thdesign">Values</th>
						              <th width="7%" class="thdesign">Image</th>
                          <th width="1%" class="thdesign">Edit</th>
                          <th width="1%" class="thdesign">Delete</th>
                        </tr>
						<?php
						foreach($about_detail as $row)
						{ ?>
						<tr>
						<td><?php print $row->id; ?></td>
						<td><?php print $row->About_Content; ?></td>
						<td><?php print $row->mission; ?></td>
						<td><?php print $row->vission; ?></td>
						<td><?php print $row->values; ?></td>
						<td></td>
						<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit();" class="fa fa-edit"></i></td>
						<td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete();" class="fa fa-trash-o"></i></td>
						</tr>
						<?php } ?>
                      </thead>
                      <tbody id="tdata">

                      </tbody>
                    </table>
                    <div class="pager">
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab1-2">
         <form id="formVideo" class="form-horizontal" action="<?php echo base_url()."index.php/About/about"; ?>"  enctype="multipart/form-data" method="post" name="frm">
               
            <div class="col-sm-12">
           <div class="form-group">
             <label class="col-sm-2 control-label" for="inputPassword5">
               About_Us Content<span class="asterisk">*</span>
             </label>
             <div class="col-sm-10">
               <!--<textarea id="testo" name="testo" rows="1" cols="34" ></textarea>-->
               <textarea id="content" class="form-control" placeholder="Enter Contents ..." name="content" required>
               
               </textarea>
             </div>
           </div>
           <div class="form-group">
             <label class="col-sm-2 control-label" for="inputPassword5">
              Mission<span class="asterisk">*</span>
             </label>
             <div class="col-sm-10">
               <textarea id="mission" name="mission" rows="1" cols="34"  required></textarea>
              <!-- <input type="text" id="mission" class="form-control" name="mission"  />-->
             </div>
           </div>
		   
		    <div class="form-group">
             <label class="col-sm-2 control-label" for="inputPassword5">
              Vission<span class="asterisk">*</span>
             </label>
             <div class="col-sm-10">
               <textarea id="vission" name="vission" rows="1" cols="34" required></textarea>
               <!--<input type="text" id="vission" class="form-control" name="vission"  />-->
             </div>
           </div>
           
             <div class="form-group">
             <label class="col-sm-2 control-label" for="inputPassword5">
              Values
             </label>
             <div class="col-sm-10">
               <!--<textarea id="testo" name="testo" rows="1" cols="34" ></textarea>-->
               <textarea id="values" class="form-control" placeholder="Enter Contents ..." name="values" required>
               
               </textarea>
             </div>
           </div>
                   <div class="col-sm-6">
                     <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              Image<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                              <input type="file" id="upload" name="upload" onchange="show(this);find(this.value);" class="form-control" required/>
                            </div>
                          </div>
                   </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="display:none;" id="prelbl">About Preview
                            </label>
                            <div class="col-sm-8">
                              <img  src="" style="height:142px; width:100%; display:none;" id="photo"/>                                
                              </div>
                          </div>
                        </div>

       
                    </div>    
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()"/>

              <input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel" />

                            </div>
                          </div>
          </form>           
                        
                </div>
               
              </div>
           </div>
     </div>
   </div>