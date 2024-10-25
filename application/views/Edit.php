
<style>
 i:hover{
 cursor:pointer;
 }
</style>
  
   <div class="container-fluid-md">
     <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active" id="tb1"><a href="#tab1-1" data-toggle="tab">Album</a></li>
                <li id="tb2" style="display:none;"><a href="#tab1-2" data-toggle="tab">Edit Album</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1-1">
                  <form id="formVideo" class="form-horizontal" action="<?php echo base_url()."index.php/gallry/Insert"; ?>"  enctype="multipart/form-data" method="post" name="frm">
                        <div class="col-sm-5">
                          <div class="form-group">
                              <label class="col-sm-4 control-label" for="inputPassword3">
                                  Album Name<span class="asterisk">*</span>
                              </label>
                             <div class="col-sm-8">
                               <input type="text" id="nm" name="nm"  class="form-control" />
                               <span style="color:#FF0000; display:none;" id="err">Plesae Enter Album Name</span>
                             </div>
                           </div>
                        </div>
						<input type="hidden" id="bid" name="bid" value="" />
                        <div class="col-sm-5">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3"> Album Images<span class="asterisk">*</span></label>
                              <div class="col-sm-8">
                              <input type="file" id="upload" name="upload" multiple onchange="show(this)" class="form-control" style="padding-top:0px;" />
                               <span  style="color:#FF0000; display:none;" id="err1">You can select only 10 images at a time....</span>
                            </div>
                          </div>
                         </div>
                        <div class="col-sm-2">
                           <div class="form-group">
                             <div class="col-sm-offset-4 col-sm-8">
                               <input class="btn btn-primary" id="SaveBtn" type="submit" value="Save" name="save" onclick="return val()"/>
                               <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" />
                               <input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>
                             </div>
                           </div>
                           
                         </div>
                  </form>
                  <div class="col-sm-12">
                    <hr />
                    <div class="table-responsive" >
                      <div style="background-color:#f5f5f5;border-color:#ddd;color:#333;padding: 10px 15px;">
                        <h4 class="panel-title">Gallery Details </h4>
                      </div>
                      <table class="table">
                        <thead>
                          <tr>
                            <th width="1%">Id</th>
                            <th width="10%">Album Name</th>
                            <th width="6%">Image</th>
                            <th width="3%">Edit</th>
                            <th width="3%">Delete</th>
                          </tr>
                        </thead>
                        <tbody id="tdata">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab1-2">
                 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" id="moreimg" >
                  <input type="file" name="moreimgs[]" id="moreimgs" style="display:none;" multiple/>
                  <input type="hidden" name="id" id="aid"/>
                  <input type="hidden" name="name" id="aname"/>
                  <input type="submit" name="addmore" value="Add More..." id="sub" style="display:none;"/>
                 </form>
                <div class="col-sm-12" id="edal">
                
                </div>
              </div>
            </div>
                 
            </div>
        </div>
     </div>

     
<?php //include("include/footer.php");?>