<script type="text/javascript" src="<?php echo base_url(); ?>Style/dist/js/admin_act_fran.js"></script>
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>  
<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>Style/dist/js/Jsfordatabindingteemp.js"></script>

<script>
$(document).ready(function(){
j("#alert").delay(3200).fadeOut(300);
});

function Get_det(str)
{
     $.ajax({
          url: '<?php echo base_url(); ?>index.php/Admin/Get_other_deet',
          type: 'post',
          data: {'sid': str},
          success: function(data) {
           
           var obj = j.parseJSON(data);
           var obj1=obj['data1'];
           var obj2=obj['data2'];
           
           for(i=0;i<obj1.length;i++)
           { 
               $("#stud").val(obj1[i].stud_name);
               $("#cou").val(obj1[i].course);
               $("#modu").val(obj1[i].module);
           }

           $("#res").val(obj2[0].status);
        },
         error: function(xhr, desc, err) {
          alert("error");
         }
      }); 
}
</script>
 

 <div class="container-fluid-md">
     <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">Demo</a></li>
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
                     <form id="formfrch" class="form-horizontal" action="<?php echo base_url()."index.php/Admin/update_new_admission"; ?>" method="post">
               
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Add New Franchisee</h4>
                        <div class="panel-options">
                            <a data-rel="collapse" href="#"><i class="fa fa-fw fa-minus"></i></a>
                            <a data-rel="reload" href="#"><i class="fa fa-fw fa-refresh"></i></a>
                            <a data-rel="close" href="#"><i class="fa fa-fw fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                     <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputEmail3">Name <span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <select name="sid" id="sid" class="form-control" onchange="Get_det(this.value)">
                                    <option>Select</option>
                                    <?php foreach($stud as $st){ ?>
                                    <option><?php echo $st['user_id'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
            
              <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Student Name</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="stud Name" id="stud" name="stud" class="form-control" required title="Please Type Institute Name">
                              
                            </div>
                        </div>
            <input type="hidden" id="bid" name="bid" value="" />
            <input type="hidden" id="nm" name="nm" value="" />
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">course</label>
                            <div class="col-sm-8">
                             <input type="text" placeholder="course Name" id="cou" name="cou" class="form-control">
                           </div>
                        </div>
            
            
             <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Module</label>
                            <div class="col-sm-8">
                                
                                <input type="text" placeholder="Module" id="modu" name="modu" class="form-control">
                                                
                               </select>
                            </div>
                        </div>

              <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Result</label>
                            <div class="col-sm-8">
                                
                                <input type="text" placeholder="Module" id="res" name="res" class="form-control">
                                                
                               </select>
                            </div>
                        </div>           


                        
                        
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputFirstName3">Current_Module</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Curent Module" id="cmod" name="cmod" class="form-control">
                            </div>
                        </div>
             <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputLastName3">Module Name</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Mod Name" id="modnm" name="modnm"  class="form-control">
                            </div>
                        </div>
                                  
             <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputLastName3">Module id<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Module Id" id="modid" name="modid" autocomplete="off" class="form-control">
                            </div>
                        </div>
            
            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputLastName3">E Status<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="User Name" id="estate" name="estate" autocomplete="off" class="form-control">
                            </div>
                        </div>
            
            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputLastName3">Total Module<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                               <input type="text" placeholder="Total Module" id="totmod" name="totmod" autocomplete="off" class="form-control">
                                
                            </div>
            </div>
           
                      </div>  
                       
                    </div>
                    <div class="panel-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <input class="btn btn-primary" type="submit" value="Submit" name="save" id="SaveBtn"/>
                               <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update"/>
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
   </div>
   
     <div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade in" > 
             <div  class="modal-dialog modal-lg">
                 
                 <div class="modal-content login-social" style="">
                    
                          
    <div class="panel panel-default panel-profile-details" >
     
                
    <div class="panel-body" style="padding:0;height:150px;">

            <div class="col-md-12 col-lg-12" style="padding:0;">
                 <ul style="margin:0px;">
                   <li class="pull-right">
                        
                        <div class="alertt alert-successs" id="alert3">
                                    <strong>Franchise Information</strong> 
                                    <a data-dismiss="modal" href="#"><i class="fa fa-fw fa-times"></i></a>
                                </div>
                      
                 </li>
               </ul>
                <div class="panel panel-default panel-profile-details" id="fdetails">
                    
                        
                </div>
            </div>   
     </div>
    </div>
  </div>         
 </div>
</div>
           