<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>  
<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
<style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 3px 4px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}
table thead th{
  text-align: center;
  font-family: calibri;
  }
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
</style>
<style>
td .fa:hover {
  cursor: pointer;
}
 .pager
        {
            height: 18px;
            margin: 16px;
        }
        .pager .page
        {
            cursor: pointer;
            border: 1px solid;
            margin: 3px;
            padding: 5px;
            background: #E8EEF4;
        }
        .pager .page:hover
        {
            cursor: pointer;
            border: 1px solid #1a0f49;
            margin: 3px;
            padding: 5px;
            background: #253544;
            color: #fff;
        }
        
        .pager span
        {
            cursor: pointer;
            border: 1px solid #1a0f49;
            margin: 3px;
            padding: 5px;
            background: #253544;
            color: #fff;
        }
.alert {
    padding: 4px;
    margin-bottom: 0px;
    border: 1px solid transparent;
    border-radius: 4px;
    margin-top: 9px;
}
</style>

<script>
var j=jQuery.noConflict();
j(document).ready(function(){
  j("#alert").delay(3200).fadeOut(300);

   var Pageindex = j('#pindex').val();
   var rcount = j('#rcount').val();

   if(Pageindex == "")
    Pageindex = 1;

   if(rcount == "")
    rcount = 0;
  
  j(".Pager").ASPSnippets_Pager({
            ActiveCssClass: "current",
            PagerCssClass: "pager",
            PageIndex: parseInt(Pageindex),
            PageSize: 10,
            RecordCount: parseInt(rcount)

        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');
          
            j('#pindex').val(pageindex);
            j('#hfield').submit();

   });


 }); 
</script>

<script>
function Edit(obj1,id)
{
  j('#formfrch').attr("action", "<?php echo base_url().'index.php/Exam/update_exam1';?>");
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
  
    var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].qid==id)
         {
          r=i;
         }  
      }
   j('#exam').val(obj1[0][r].quiz_cat_name);
   j('#tques').val(obj1[0][r].questions);
   j('#duration').val(obj1[0][r].duration);
   j('#pmarks').val(obj1[0][r].pass_marks);
   j('#bid').val(obj1[0][r].qid);

    j('#course option').each(function () {
       if (j(this).val() == obj1[0][r].course) {
             j(this).attr('selected', 'selected');
          }
           
    });
   
   j('#SaveBtn').hide();
   j('#UpdateBtn').show();
   j('#CancelBtn').show();
  }

function Delete(id)
{
  //alert("gfh");
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Exam/Delete_exam',
            type: 'POST',
           data:{'qid':id},
      
            success: function (data) {
              var obj=j.parseJSON(data);
              alert(obj.message);
              if(data)
              {
                window.location="<?php echo base_url().'index.php/Employee/Exam_Module'; ?>"
              }
        
            },
            error: function () {
                
            }
        });
}
</script>

   <div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Modules</a></li>
                <li class="" id="t2"><a href="#tab1-2" data-toggle="tab">Create Module</a></li>
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
                      <div class="col-sm-12">
                                 <script>
                                   var jArray=[];
                                   jArray.push(<?php echo json_encode($exames); ?>);
                                </script>
                                <div class="table-responsive">
                                      <table class="table table-striped">
                                        <thead>
                                          <tr style="background-color:#d7dadc;">
                                            <th width="10%">Course Name</th>
                                            <th width="10%">Exam Name</th>
                                            <th width="3%">No of Question</th>
                                            <th width="3%">Exam Duration</th>
                                            <th width="3%">Passing Marks</th>
                                            <th width="6%">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody id="tdata">
                                            <?php if(!empty($exames)){ foreach($exames as $ex){ ?>
                                            <tr>
                                               <td><?php echo $ex->course; ?></td>
                                               <td><?php echo $ex->quiz_cat_name; ?></td> 
                                               <td><?php echo $ex->questions; ?></td>
                                               <td><?php echo $ex->duration; ?></td>
                                               <td><?php echo $ex->pass_marks; ?></td> 
                                               <td  style="text-align:center"><i style="color:#275273;font-size:20px;margin-left:10px;" id="EditB" onclick="Edit(jArray,<?php echo $ex->qid; ?>);" class="fa fa-edit" title="Edit Record"></i><i style="color:#275273;font-size:20px; margin-left:10px;" id="DeleteN" onclick="Delete(<?php echo $ex->qid; ?>);" class="fa fa-trash-o" title="Delete Record"></i></td>
                                            </tr>  
                                            <?php  } } ?>
                                        </tbody>
                                      </table>
                                       <?php if(isset($links)) { ?>
                                        <div id="links1" class="pager">
                                            <?php echo $links; ?>
                                        </div>
                                       <?php }?>
                                </div>

                          </div>
                </div>
                <div class="tab-pane" id="tab1-2">
         <form id="hfield" method="post" action="<?php echo base_url(); ?>index.php/Employee/Exam_Module">
              <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
              <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />
         </form>


         <form id="formfrch" class="form-horizontal" action="<?php echo base_url(); ?>index.php/Exam/save_exame1"  enctype="multipart/form-data" method="post" name="frm">
						 <div class="panel panel-default" style="border:1px solid #DDD;">   
                <div class="panel-heading">
                        <h4 class="panel-title">Create New  Exam</h4>
                        <div class="panel-options">
                            <a data-rel="collapse" href="#"><i class="fa fa-fw fa-minus"></i></a>
                            <a data-rel="reload" href="#"><i class="fa fa-fw fa-refresh"></i></a>
                            <a data-rel="close" href="#"><i class="fa fa-fw fa-times"></i></a>
                        </div>
                    </div>
                    <div class="col-sm-6" style="margin-top:1%;">

                           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Course Name<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                              <select name="course" id="course" class="form-control" required title="Please Select Course Name">
                                    <option value="">Select Course</option>
                                    <?php if(!empty($course)){ foreach($course as $c) { ?>
                                    <option><?php echo $c['Course_Name']; ?></option>
                                    <?php } } ?>
                              </select>
                          </div>

                          <input type="hidden" value="" name="bid" id="bid" />

                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3"> Exam Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="exam" name="exam" class="form-control" required title="Please Type Exame Name"/>
                            </div>
                          </div>
						  
						              <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">No of Question<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="tques" name="tques" class="form-control" required title="Please No OF Questions"/>
                            </div>
                          </div>
	                  </div>
	                  <div class="col-sm-6" style="margin-top:1%;">
                           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3"> Exam Duration<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="duration" name="duration" class="form-control" required title="Please Type Exam Duration"/>
                            </div>
                          </div>
              
                         <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Passing Mark<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="pmarks" name="pmarks" class="form-control" required title="Please Type Passing Marks"/>
                            </div>
                          </div>
                        </div>
           
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()"/>
                							<input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>
                        </div>
                    </div>
                  </div>  

                          
						</form>           
                
                </div>
               
              </div>
           </div>
     </div>
   </div>
  