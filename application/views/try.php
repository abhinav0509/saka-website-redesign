
<script>
 var j=jQuery.noConflict(); 
j(document).ready(function(){
   j("#home").addClass("open");
   j("#ThreeDiv1").addClass("active open");
   CKEDITOR.replace('content1');
   
   });
   
</script>
<script>
function Edit(obj1,id)
{
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
      var editor1 = CKEDITOR.instances.content1;
      var editor2 = CKEDITOR.instances.values;
      var editor3 = CKEDITOR.instances.mission;
      var editor4 = CKEDITOR.instances.vission;
      if( editor1.mode == 'wysiwyg' )
      {
       
            editor1.insertHtml(obj1[0][r].About_Content);
      }
     if( editor2.mode == 'wysiwyg' )
     {
       
            editor2.insertHtml(obj1[0][r].values);
     }
     if( editor3.mode == 'wysiwyg' )
     {
       
            editor3.insertHtml(obj1[0][r].mission);
     }
     if( editor4.mode == 'wysiwyg' )
     {
       
            editor4.insertHtml(obj1[0][r].vission);
     }
	 $('#photo').attr('src', '<?php echo base_url().'uploads/About/'?>'+obj1[0][r].image+' ');
	 $('#photo').show();
     
	 
     j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
		
}

function Delete(id)
{
    alert(id);
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/About/Delete',
            type: 'POST',
           data:{'action':'delabt','id':id},
      
            success: function (data) {
                 data=data.replace(/"/g, '');
                if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/about'; ?>"
				}
        
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
	//alert("Hello Mukesh");
	var a=$('#course1').val();
	var a1=$('#module').val();
	var a2=$('#NoQue').val();
	var a3=$('#dur').val();
	var a4=$('#Pmark').val();
	//alert(a);
	//alert(a1);
	//alert(a2);
	//alert(a3);
	//alert(a4);
	//if (confirm("Are you sure, you want to"))
            j.ajax({  
            url: '<?php echo base_url()."index.php/Exam/InsertModule"; ?>',
			method: 'POST',
            data:{'Course_Name':a,'Module_Name':a1,'No_Question':a2,'Duration':a3,'Passing_Mark':a4},
			alert("gfg");
			success: function (data) {
                 //data=data.replace(/"/g, '');
				alert(data);
                j("#t1").removeClass("active");
				j("#t2").removeClass("active");
				j("#t3").addClass("active");
				j("#tab1-1").removeClass("active");
				j("#tab1-2").removeClass("active");
				j("#tab1-3").addClass("active");
            },
            error: function () {
                //alert("Bot");
            }
        });
	
	
} 
  

</script>
<style>
 td p{
  text-align:justify;
  margin-right:12%;
   width:160px; 
   height: 150px;
   overflow-y: auto;
   width:12%;
   }  
</style>
<div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Exam</a></li>
                <li class="" id="t2"><a href="#tab1-2" data-toggle="tab"><i id="edit" class="fa fa-edit"></i> Add Exam</a></li>
				<li class="" id="t3"><a href="#tab1-3" data-toggle="tab"><i id="edit" class="fa fa-edit"></i> Add Question</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab1-1">
                  <div class="table-responsive" >
                   <table class="table">
                      <thead>
                        <tr style="background-color:#d7dadc;">
						
                         <th width="10%" class="thdesign">Course Name</th>
                          <th width="7%" class="thdesign"> No Of Question</th>
                          <th width="7%" class="thdesign">Duration</th>
                          <th width="7%" class="thdesign">Passing Mark</th>
                           <th width="1%" class="thdesign">Edit</th>
                          <th width="1%" class="thdesign">Delete</th>
						 
                        </tr>
                          </thead>
                        <script>
                            var jArray=[];
                           jArray.push(<?php //echo json_encode($results ); ?>);
                        </script>
            <tbody id="tdata" style="font-size:12px;">
						
            </tbody>
                    </table>
					
					</div>
                     </div>
              
                <div class="tab-pane" id="tab1-3">
         <form id="formVideo" class="form-horizontal" action="<?php echo base_url()."index.php/About/about"; ?>"  enctype="multipart/form-data" method="post" name="frm">
            
			<div class="col-sm-6">
			<div class="form-group">
			 <label class="col-sm-4 control-label" for="inputPassword5">
               Select Course<span class="asterisk">*</span>
             </label>
			 
			  <div class="col-sm-8">
                             <!--<input type="text" id="course" name="course" class="form-control" />--->
							 <select id="course" name="course" class="form-control" required>
							<option selected disabled>Select Course</option>
							<option>Smart Tally</option>
							  <option>Quick Tally</option>
							   <option>Professional Tally</option>
							 <option>Smart Excell</option>
							  <option>Master In Excell</option>
							   <option>Certified E-Accountant</option>
							   <option>Mid Brain Activation</option>
							  <option>Virtual MBA</option>
							   <option>GFS- Project Training</option>
							 </select>
              </div>
			  </div>
			</div>
			
			<div class="col-sm-6">
			<div class="form-group">
			 <label class="col-sm-4 control-label" for="inputPassword5">
               Select Exam<span class="asterisk">*</span>
             </label>
			 
			  <div class="col-sm-8">
                             <!--<input type="text" id="course" name="course" class="form-control" />--->
							 <select id="course" name="course" class="form-control" required>
							<option selected disabled>Select Exam</option>
							
							 </select>
              </div>
			 
			</div>
			</div>
			
			<div class="col-sm-12"> 
           <div class="form-group">
             <label class="col-sm-2 control-label" for="inputPassword5">
               Enter Question<span class="asterisk">*</span>
             </label>
             <div class="col-sm-10">
               <!--<textarea id="testo" name="testo" rows="1" cols="34" ></textarea>-->
               <textarea id="content1" class="form-control" placeholder="Enter Contents ..." name="content1">
               </textarea>
               <input type="hidden" id="bid" name="bid" value="" />
             </div>
           </div>
          
		  </div>    
		  
		  
		  <div class="col-sm-6">
		  <div class="form-group">
		  <label class="col-sm-4 control-label" for="inputPassword5">
               Option 1<span class="asterisk">*</span>
             </label>
			 <div class="col-sm-8">
			<input type="text" class="form-control" id="opt1" name="opt1">
			 
			 </div>
		  </div>
		  
		  <div class="form-group">
		  <label class="col-sm-4 control-label" for="inputPassword5">
               Option 2<span class="asterisk">*</span>
             </label>
			 <div class="col-sm-8">
			<input type="text" class="form-control" id="opt2" name="opt2">
			 
			 </div>
		  </div>
		  
		  <div class="form-group">
		  <label class="col-sm-4 control-label" for="inputPassword5">
               Option 3<span class="asterisk">*</span>
             </label>
			 <div class="col-sm-8">
			<input type="text" class="form-control" id="opt3" name="opt3">
			 
			 </div>
		  </div>
		  
		  <div class="form-group">
		  <label class="col-sm-4 control-label" for="inputPassword5">
               Option 4<span class="asterisk">*</span>
             </label>
			 <div class="col-sm-8">
			<input type="text" class="form-control" id="opt4" name="opt4">
			 </div>
		  </div>
		  
		  
		  </div>
		  
		  
		  <div class="col-sm-6">
		   <div class="form-group">
              
               <div class="col-sm-9" style="margin-top:1%;">
                 <input type="radio" id="active" name="active">Active
				 	
                </div>
             </div>
		  
		  
		  
		  <div class="form-group">
               
               <div class="col-sm-9" style="margin-top:3%;">
                 <input type="radio" id="active" name="active">Active
				 	
                </div>
             </div>
			 
			 
			 <div class="form-group">
              
               <div class="col-sm-9" style="margin-top:3%;">
                 <input type="radio" id="active" name="active">Active
				 	
                </div>
             </div>
			 
			 <div class="form-group">
              
               <div class="col-sm-9" style="margin-top:3%;">
                 <input type="radio" id="active" name="active">Active
				 	
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
					</form>           
                </div>
				
		<div class="tab-pane" id="tab1-2">
         <form id="formVideo" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>"  enctype="multipart/form-data" method="post" name="frm">
            
			<div class="col-sm-6">
			<div class="form-group">
			 <label class="col-sm-4 control-label" for="inputPassword5">
               Select Course<span class="asterisk">*</span>
             </label>
			 
			  <div class="col-sm-8">
                             <!--<input type="text" id="course" name="course" class="form-control" />--->
							 <select id="course1" name="course1" class="form-control" required>
							<option selected disabled>Select Course</option>
							<option>Smart Tally</option>
							  <option>Quick Tally</option>
							   <option>Professional Tally</option>
							 <option>Smart Excell</option>
							  <option>Master In Excell</option>
							   <option>Certified E-Accountant</option>
							   <option>Mid Brain Activation</option>
							  <option>Virtual MBA</option>
							   <option>GFS- Project Training</option>
							 </select>
              </div>
			  </div>
		
		
		<div class="form-group">
			 <label class="col-sm-4 control-label" for="inputPassword5">
               Select Module<span class="asterisk">*</span>
             </label>
			 
			  <div class="col-sm-8">
                             <!--<input type="text" id="course" name="course" class="form-control" />--->
							 <select id="module" name="module" class="form-control" required>
							<option selected disabled>Select Module</option>
							   <option>Module 1</option>
							   <option>Module 2</option>
							   <option>Module 3</option>
							 </select>
              </div>
			  </div>
		
		
			
		  <div class="form-group">
		  <label class="col-sm-4 control-label" for="inputPassword5">
               No.Of Questions<span class="asterisk">*</span>
             </label>
			 <div class="col-sm-8">
			<input type="text" class="form-control" id="NoQue" name="NoQue">
			 
			 </div>
		  </div>
		  
		  <div class="form-group">
		  <label class="col-sm-4 control-label" for="inputPassword5">
               Duration<span class="asterisk">*</span>
             </label>
			 <div class="col-sm-8">
			<input type="text" class="form-control" id="dur" name="dur">
			 
			 </div>
		  </div>
		  
		  <div class="form-group">
		  <label class="col-sm-4 control-label" for="inputPassword5">
               Pass Marks<span class="asterisk">*</span>
             </label>
			 <div class="col-sm-8">
			<input type="text" class="form-control" id="Pmark" name="Pmark">
			 
			 </div>
		  </div>
		  	</div>
		  <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onClick="abc();"/>
                               </div>
                          </div>
          </form>    


		  
                </div>
				
				</div>
				
				
              </div>
           </div>
     </div>
   </div>