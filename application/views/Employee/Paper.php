<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>  
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>
<style>
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
     .modal-open .modal {
		    height: 380px;
		    overflow-x: hidden;
		    overflow-y: auto;
		    width: 500px;
		}
		.panel > .table > tbody > tr > td, .panel > .table > tbody > tr > th, .panel > .table > tfoot > tr > td, .panel > .table > tfoot > tr > th, .panel > .table > thead > tr > td, .panel > .table > thead > tr > th {
    padding: 4px;
}
</style>
<script>
 var j=jQuery.noConflict(); 
 var obj1;
 var c="";
j(document).ready(function(){

   j("#alert").delay(3200).fadeOut(300);	
   j("#exm").addClass("active open");
   j("#pset").addClass("active");
   Searchh();
   
   j('#signe').click(function(){

			 bind_data();
			 j("#myModal").modal('show');
	});


    j("#content1").keypress(function(event){
       
         if(event.which == 13) { 
         
          
           j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Set_paper/get_q_det',
            type: 'POST',
            data:{'qid':j('#qid').val()},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                 
                 for(i=0;i<obj.length;i++)
                 { 
                     j('#opt1').val(obj[i].option_a);
					 j('#opt2').val(obj[i].option_b);
					 j('#opt3').val(obj[i].option_c);
					 j('#opt4').val(obj[i].option_d);
						
						j('input[type=radio]').each(function () {
						       if (j(this).val() == obj[i].answer) {
						            j(this).attr('checked', 'checked');
						          }
						      }); 
                 }
        
            },
            error: function () {
                
            }
        });

      }
 
    });//Keypress
   
 });


   
</script>
<script>
function Edit(allobj,id)
{
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
	
	j('#formVideo').attr('action','<?php echo base_url(); ?>index.php/Set_paper/update_paper1');
     var r;
      for(i=0;i<allobj.length;i++)
      {
         if(allobj[i].quiz_id==id)
         {
          r=i;
         }
      }
     j('#content1').val(allobj[r].question);
     j('#opt1').val(allobj[r].option_a);
	 j('#opt2').val(allobj[r].option_b);
	 j('#opt3').val(allobj[r].option_c);
	 j('#opt4').val(allobj[r].option_d);
	 
	 c=allobj[r].quiz_cat_id;

      j('#course option').each(function () {
       if (j(this).val() == allobj[r].course) {
            j(this).attr('selected', 'selected');
          }
      }); 

      j('input[type=radio]').each(function () {
       if (j(this).val() == allobj[r].answer) {
            j(this).attr('checked', 'checked');
          }
      }); 
	   
	  j('#course').trigger('change'); 
	 j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
		
}

function course_change()
{
	if(c!="")
	{
		 j('#exame option').each(function () {
       if (j(this).val() == c) {
            j(this).attr('selected', 'selected');
          }
      });
	}
}
function Searchh() { 
    

       j("#content1").autocomplete({
          	source: function (request, response) {
          		var m=j('#exame').val();

                  j.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Set_paper/get_ques?id="+m,
                       data: { term: j("#content1").val()},
                      dataType: "json",
                       success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.question,
                                  label1: item.quiz_id,
                                  json: item

                              }
                          }))
                      },
                      error: function (result) {
                      }
                  });
              },
              search: function () { j(this).addClass('working'); },
              open: function () { j(this).removeClass('working'); },
              minLength: 0,
              select: function (event, ui) {
                  j('#content1').val(ui.item.label);
                  j('#qid').val(ui.item.label1);
                  return false;
              }
          });
}
function bind_data()
{
     var mod=j('#exame').val(); 
     var op="";
	 j('#jdata').empty();
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Set_paper/get_Exame_det1',
            type: 'POST',
            data:{'id':mod},
      
            success: function (data) {
              var pdata=j.parseJSON(data);
             
              for(i=0;i<pdata.length;i++)
              {
                 
                 j("#jdata").append("<tr><td><input type='checkbox' name='ids[]' value='"+pdata[i].quiz_id+"'></td><td title='"+pdata[i].question+"'>"+pdata[i].question+"</td></tr>");
                 
              }
            
            },
            error: function () {
                
            }
        });
}
function Delete(id)
{
   //	 alert(id);
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Exam/Delete',
            type: 'POST',
           data:{'action':'delabt','id':id},
      
            success: function (data) {
                var obj=j.parseJSON(data);
				 alert(obj.message);
                if(data)
				{
				window.location="<?php echo base_url().'index.php/Employee/Paper'; ?>"
				}
        
            },
            error: function () {
                
            }
        });
}

function getExam(str)
{
       var op="";
        
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Set_paper/get_Exame',
            type: 'POST',
           data:{'cname':str},
      
            success: function (data) {
              var obj=j.parseJSON(data);
              j('#exame').html("");
              op +="<option value=''>Select Exame</option>"; 
              for(i=0;i<obj.length;i++)
              {
                  op +="<option value="+obj[i].qid+">"+obj[i].quiz_cat_name+"</option>"
              }
				 j('#exame').append(op); 

				 course_change();    
            },
            error: function () {
                
            }
        });
}

function search_data(pi)
{
       var course=j("#cou").val();
       var exm=j("#exm1").val();
       var cnt="";
       var pdata="";
     
        j('#tdata').empty();
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Set_paper/get_Exame_det',
            type: 'POST',
            data:{'cname':course,'module':exm,'pindex':pi},
      
            success: function (data) {
            
              var obj=j.parseJSON(data);
              cnt = j.parseJSON(data);
              cnt=obj['count'];
              pdata=obj['res']; 
              obj1=pdata;
              for(i=0;i<pdata.length;i++)
              {
                 j("#tdata").append("<tr><td title='"+pdata[i].question+"'>"+pdata[i].question+"</td><td title='"+pdata[i].option_a+"'>"+pdata[i].option_a+"</td><td title='"+pdata[i].option_b+"'>"+pdata[i].option_b+"</td><td title='"+pdata[i].option_c+"'>"+pdata[i].option_c+"</td><td title='"+pdata[i].option_d+"'>"+pdata[i].option_d+"</td><td>"+pdata[i].answer+"</td><td><i style='color:#275273;font-size:20px;' id='EditB' onclick=\"Edit(obj1,"+pdata[i].quiz_id+");\" class=\"fa fa-edit\"></i><i style='color:#275273;font-size:20px;margin-left:10px;' id=\"DeleteN\" onclick=\"Delete("+pdata[i].quiz_id+");\" class=\"fa fa-trash-o\"></i></td></tr>");
                 
              }
             
              j(".pager").ASPSnippets_Pager({
                    ActiveCssClass: "current",
                    PagerCssClass: "pager",
                    PageIndex: pi,
                    PageSize: 10,
                    RecordCount:obj.count
                });
				j(".pager .page").on('click', function () {
                    search_data(parseInt(j(this).attr('page')));
                    PageIndexCurrent = parseInt(j(this).attr('page'));
                });
				     
            },
            error: function () {
                
            }
        });
}

function getExam1(str)
{
       var op="";
        j('#exm1').html("");
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Set_paper/get_Exame',
            type: 'POST',
           data:{'cname':str},
      
            success: function (data) {
              var obj=j.parseJSON(data);
              j('#exm1').html("");
              op +="<option value=''>Select Exame</option>"; 
              for(i=0;i<obj.length;i++)
              {
                  op +="<option value="+obj[i].qid+">"+obj[i].quiz_cat_name+"</option>"
              }
				 j('#exm1').append(op);     
            },
            error: function () {
                
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

 function abc()
{
	/*j("#t1").removeClass("active");
    j("#t2").removeClass("active");
	j("#t3").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").removeClass("active");
	j("#tab1-3").addClass("active");*/
} 
  

</script>
<style>
 .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 3px 4px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}
table thead th{
  text-align: left;
  font-family: calibri;
  font-size: 12px;
  }
table tbody td{
  font-family: calibri;
  font-size: 13px;
  text-align: left;
}
table tbody td a:hover{
  text-decoration: none;
}
table tr:hover{cursor: pointer;}
table tbody td{

    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
td .fa:hover{cursor: pointer;}
.alert {
  padding: 6px;
  margin-bottom: -2px;
  border: 1px solid transparent;
  border-radius: 4px;
  margin-top: 6px;
}
.panel-primary > .panel-heading, .panel-primary > form > .panel-heading {
    background-color: #357ebd;
    border-color: #357ebd;
    color: #fff;
    margin-bottom: 27px;
    margin-top: -40px;
    position: fixed;
    width: 35.2%;
}
</style>
<div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Exam</a></li>
                <li class="" id="t2"><a href="#tab1-2" data-toggle="tab"><i id="edit" class="fa fa-edit"></i> Add Question</a></li>
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
                 <div class="row">
				 <div class="col-md-12" style="margin-bottom:36px;">
                   <!--  <div class="col-sm-6">
                 			<label class="col-sm-4 control-label" for="inputPassword5">
				               Search Exame By :
				            </label>
                     </div>-->
			            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
			                 <select name="cou" id="cou" class="form-control" onchange="getExam1(this.value)">
			                       <option value="">Select Course</option>
									     <?php if(!empty($course)) { foreach($course as $c) { ?>
									        <option><?php echo $c['Course_Name']; ?></option>
									     <?php } } ?>
			                 </select>
			            </div>
			            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
			                 <select name="exm1" id="exm1" class="form-control">
			                      
			                 </select>
			            </div>
          
			            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
			                    <a class="btn btn-primary" onclick="search_data(1)">
			                        <i class="fa fa-search"></i> Search
			                    </a>
			            </div>
           			  </div>
			</div>
				  <div class="table-responsive" >
			
				  
				  
                  <table class="table table-bordered table-striped table-hover with-check"
                                cellpadding="0" cellspacing="0">
                        <thead>
                         <tr style="background-color:#d7dadc;">
						
                         <th width="10%" class="thdesign">Question</th>
						 <th width="5%" class="thdesign">Option A</th>
                          <th width="5%" class="thdesign">Option B</th>
                          <th width="5%" class="thdesign">Option C</th>
                          <th width="5%" class="thdesign">Option D</th>
                           <th width="3%" class="thdesign">Correct ption</th>
                          <th width="5%" class="thdesign">Action</th>
						 
                        </tr>
                          </thead>
                      
            <tbody id="tdata" style="font-size:12px;">
						
					
            </tbody>
                    </table>
					 <div class="pager">
                    </div>
					</div>
					
                     </div>
              
                <div class="tab-pane" id="tab1-2">
         <form id="hfield" method="post" action="<?php echo base_url(); ?>index.php/Employee/Paper">
         			<input type="hidden" name="pindex" id='pindex' value="" />
                    <input type="hidden" name="rcount" id='rcount' value="" />

                    <input type="hidden" name="c" id='c' value="" />
                    <input type="hidden" name="m" id='m' value="" />
         </form>	

         <form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/Set_paper/save_paper1"; ?>"  enctype="multipart/form-data" method="post" name="frm">
            
			 <div class="panel panel-default" style="border: 1px solid #DDD;">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Add Question</h4>
                     
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                        </div>
					
					
					</div>
			
			
			
			<div class="col-sm-6" style="margin-top:1%;">
				<div class="form-group">
					 <label class="col-sm-4 control-label" for="inputPassword5">
		               Select Course<span class="asterisk">*</span>
		             </label>				 
					  <div class="col-sm-8">
		                              <!--<input type="text" id="course" name="course" class="form-control" />-->
						<select id="course" name="course" class="form-control" onchange="getExam(this.value)" required title="Please Select Course">
						     <option value="">Select Course</option>
						     <?php if(!empty($course)) { foreach($course as $c) { ?>
						        <option><?php echo $c['Course_Name']; ?></option>
						     <?php } } ?>   
						</select>
		              </div>
				</div>

				<div class="form-group">
						 <label class="col-sm-4 control-label" for="inputPassword5">
			                 Select Exam<span class="asterisk">*</span>
			             </label>
					 
						 <div class="col-sm-8">
			                <select id="exame" name="exame" class="form-control" required>
							    
							</select>
							<!--<a id="signe" data-toggle="modal" class="btn btn-success"><span class="semi-bold">View All</span></a>-->
			             </div>
					</div>

				<div class="form-group">
			             <label class="col-sm-4 control-label" for="inputPassword5">
			               Enter Question<span class="asterisk">*</span>
			             </label>
			             <div class="col-sm-8">
			               <input type="text" name="content1" id="content1" class="form-control" required title="Please Type question"> 
			             </div>
		           </div>
		           <input type="hidden" name="bid" id="bid" />
		           <input type="hidden" name="qid" id="qid" />
		        <div class="form-group">
                    <label class="control-label col-sm-4">Select Correct Option</label>

                    <div class="controls col-sm-8">
                        <label class="radio-inline">
                           <input type="radio"  name="active1" value="a">A
                        </label>
                        <label class="radio-inline">
                           <input type="radio"  name="active1" value="b">B
                        </label>
                        <label class="radio-inline">
                           <input type="radio"  name="active1" value="c">C
                        </label>
                        <label class="radio-inline">
                           <input type="radio"  name="active1" value="d">D
                        </label>
                    </div>
                </div>
		  
				  
			</div>
			
			<div class="col-sm-6" style="margin-top:1%;">
					
 					 <div class="form-group">
				     <label class="col-sm-4 control-label" for="inputPassword5">
		               Option A<span class="asterisk">*</span>
		             </label>
					 <div class="col-sm-8">
					   <input type="text" class="form-control" id="opt1" name="opt1" required title="Please Fill The Option Value">					 
					 </div>
			  </div>
		  
				  <div class="form-group">
					     <label class="col-sm-4 control-label" for="inputPassword5">
			               Option B<span class="asterisk">*</span>
			             </label>
						 <div class="col-sm-8">
						     <input type="text" class="form-control" id="opt2" name="opt2" required title="Please Fill The Option Value">						 
						 </div>
				  </div>
 					<div class="form-group">
				  		 <label class="col-sm-4 control-label" for="inputPassword5">
			                 Option C<span class="asterisk">*</span>
			             </label>
						 <div class="col-sm-8">
						    <input type="text" class="form-control" id="opt3" name="opt3" required title="Please Fill The Option Value">						 
						 </div>
				  </div>
		  
			  <div class="form-group">
					    <label class="col-sm-4 control-label" for="inputPassword5">
			               Option D<span class="asterisk">*</span>
			             </label>
						 <div class="col-sm-8">
						   <input type="text" class="form-control" id="opt4" name="opt4" required title="Please Fill The Option Value">
						 </div>
			  </div>  
					

					
			</div>
		
						
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn"  />
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" />
							  <input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel" />
                            </div>
                          </div>
						 
						  
						  </div>
					</form>    
		
        
					
                </div>
		     </div>
           </div>
     </div>
   </div>

   <div style="display:none; margin-left:auto; margin-right:auto; margin-top:10px;" aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade in">
         
           <div class="modal-content login-social"> 
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Panel with table
          
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                        <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                        <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                    </div>
                </div>
             
                <table class="table" style="margin-top:40px;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                    </tr>
                    </thead>
                    <tbody id="jdata">
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>