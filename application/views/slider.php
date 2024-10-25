 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>Style/dist/js/jquery.validate.js"></script>
  <script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>       
      <script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
           <link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>  
  
<script>
 var j=jQuery.noConflict(); 
j(document).ready(function(){
 j("#home").addClass("open");
   j("#HSlide").addClass("active open");

    Search();

    j("#state1").keypress(function(event){
       
         if(event.which == 13) { 
          j('#tdata').empty();
           j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Admin/Slider',
            type: 'POST',
            data:{'caption':j(this).val()},
      
            success: function (data) {
				//alert(data);
                 var obj = j.parseJSON(data);
				 alert(obj);
                 for(i=0;i<obj.length;i++)
                 { 
                       //alert(obj[i].S_id);
                       j('#tdata').append("<tr id='B"+obj[i].S_id+"'><td>"+obj[i].S_id+"</td><td><img id='img"+obj[i].S_id+"' src='<?php echo base_url();?>uploads/slider/"+obj[i].Image+"' style='height:140px; width:100%;'/></td><td>"+obj[i].Caption+"</td><td>"+obj[i].Status+"</td><td><i style='color:#275273;font-size:25px;' id='EditB' onclick='EditDB(" + obj[i].S_id + ")' class=\"fa fa-edit\"></i></td><td><i style='color:#275273;font-size:25px;' id='DeleteN' onclick='DeleteDB(" + obj[i].S_id + ")' class=\"fa fa-trash-o\"></i></td></tr>");
                 }
        
            },
            error: function () {
                
            }
        });

      }
 
    });//Keypress

});
function Search() { 
       var j = jQuery.noConflict(); 
       j("#state1").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Slider_Data/GetSlider",
                       data: { term: j("#state1").val()},
                      dataType: "json",
                       success: function (data) {
		
							  response(j.map(data, function (item) {
                              return {
                                  label: item.Caption,
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
                  j('#state1').val(ui.item.label);
                  return false;
              }
          });
}

function Delete(id)
{
    //alert(id);
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Slider_Data/Delete',
            type: 'POST',
           data:{'action':'delsli','id':id},
      
            success: function (data) {
                 data=data.replace(/"/g, '');
                if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/Slider'; ?>"
				}
        
            },
            error: function () {
                
            }
        });
}
function Edit(obj1,id)
{
	
	//j("#t1").removeClass("active");
    //j("#t2").addClass("active");
    //j("#tab1-1").removeClass("active");
    //j("#tab1-2").addClass("active");
	j("#t1").removeClass("active");
    j("#t2").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
   var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].S_id==id)
         {
          r=i;
         }	
      }
	  var x=obj1[0][r].Image;
	  if(x=="")
	  {
	  	 $('#photo').attr('src', '<?php echo base_url().'uploads/d.png';?>');
	  }
	  else
	  {
         $('#photo').attr('src', '<?php echo base_url().'uploads/Slider/'?>'+obj1[0][r].Image+' ');
	  }
	 $('#photo').show();
      
	 $('#cap').val(obj1[0][r].Caption);
	 $('#status1').val(obj1[0][r].Status);
	 j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
}
   
   function val()
 { 
   j("#formSlider").validate({
  rules: {
   //upload: "required", 
  cap:"required"
  },
  messages: {
  //upload: "Please Upload Slider to Save",
  cap:"Please enter caption for image"
  }
  });
 }
 
 function val1()
 { 
    //document.frm.submit();
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

<script>
function abc(id)
{
	var t=$("#D1").val();
	if(confirm("Are You Sure That You Wnat To change The Status...??"))
	 j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Slider_Data/Show_Hide',
            type: 'POST',
           data:{'action':'delsli1','id':id,'status':t},
      
            success: function (data) {
                 data=data.replace(/"/g, '');
			if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/Slider'; ?>"
				}
        
            },
            error: function () {
                
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
   }  
   .fa-edit:hover{
    cursor:pointer;
   }
   .fa-trash-o:hover{
    cursor: pointer;
   }
</style>
   <div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab"> View Slider</a></li>
              <li class="" id="t2"><a href="#tab1-2" data-toggle="tab">Add Slider</a></li>
              </ul>
              <div class="tab-content">
			 
                <div class="tab-pane active" id="tab1-1">
				<div class="panel-footer">
                
                    <div class="table-responsive" style="padding-top:0%;">
					
					  <div class="row">
				  <div class="col-md-12" style="margin-bottom:36px;">
				  <div class="col-sm-3"></div>
				  <div class="col-sm-3"></div>
				  <div class="col-sm-3"><p style="float:right;margin-top:5px;margin-bottom:-29px">Enter Caption..</p></div>
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="state1" name="state1" class="form-control" placeholder="Search By Caption"/>
			      </div>
			      
			      </div>
			    </div>
                        <table class="table">
                        <thead>
                         <tr style="background-color:#d7dadc;">
                           <th width="1%">Id</th>
                           <th width="50%">Image</th>
                           <th width="10%">Caption</th>
						   <th style="display:none"></th>
                           <th width="5%">Status</th>
						   <th width="5%">Edit</th>
                           <th width="5%">Delete</th>
						  
                         </tr>
						  </thead>
						 <script>
                            var jArray=[];
                           jArray.push(<?php echo json_encode($results); ?>);
						   console.log(jArray);
                        </script>
						<tbody id="tdata" style="font-size:12px;">
						 <?php
						foreach($results as $row)
						{ ?>
							<tr>
							<td><?php print $row->S_id; ?>
						
							<?php 
							if($row->Image==null)
							{
							?>
							<td><img src="<?php echo base_url(); ?>uploads/d.png" style="height:140px; width:100%;"></img></td>
							<?php }
							else 
							{ 
							?>
							<td><img src="<?php echo base_url(); ?>uploads/Slider/<?php echo $row->Image; ?>" style="height:140px; width:100%;"></img></td>
							<?php } ?>
							<td><?php print $row->Caption; ?></td>
							<td style="display:none;"><?php print $row->Status; ?></td>
							<td><select onchange="abc(<?php print $row->S_id; ?>);" id="D1" name="D1">
							<?php 
							
							{
							?>
							<option <?php if($row->Status=="Show"){?> selected="selected"<?php }?>>Show</option>
							<option <?php if($row->Status=="Hide"){?> selected="selected"<?php }?>>Hide</option>
							<?php } ?>
							</select></td>
							<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->S_id; ?>);" class="fa fa-edit"></i></td>
      					    <td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->S_id; ?>);" class="fa fa-trash-o"></i></td>
      					<?php } ?>
                      
                      
                       
                  </tbody>
            </table>
			<div id="links" style="border:1px solid;text-align:center;background-color:#d7dadc;">
					<?php echo "Select The Records"; ?>
					<?php echo $links; ?>
			</div>
        </div>
		</div>
		
                </div>
				
				<div class="tab-pane" id="tab1-2">
				
				<form id="formSlider" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/Slider_Data/Insert" ?>"  enctype="multipart/form-data" method="post">
					
					<div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Add Slider</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            <!--<a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>--->
                        </div>
					
					
					</div>
					
					<div class="col-sm-6">

                          <div class="form-group">
						 
                            <label class="col-sm-4 control-label" for="inputPassword3"> Slider Image<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                              <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" style="padding-top:0px;"   />
                              <span style="color:#FF0000;" id="msg">Please select image with(1350 width - 450 height)</span>
                            </div>
                          </div>
						  <input type="hidden" id="bid" name="bid" value="" />
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              Caption<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                              <input type="text" id="cap" name="cap" class="form-control" required />
                            </div>
                          </div>
                          
						  <div class="form-group">
							<label class="col-sm-4 control-label" for="inputPassword5">
							Select Status<span class="asterisk">*</span>
							</label>
			 
							<div class="col-sm-8">
								<!--<input type="text" id="course" name="course" class="form-control" />--->
							 <select id="status1" name="status1" class="form-control" required>
							<option selected disabled>Select</option>
							<option>Show</option>
							  <option>Hide</option>
							  
							 </select>
							</div>
						</div>
						  
                          
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="display:none;" id="prelbl">Image Preview</label>
                            <div class="col-sm-8">
                              
                                <img  src="" style="height:130px; width:100%; display:none;" id="photo"/>
                              </div>
                          </div>
                        </div>
                        <div class="panel-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                            <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                            <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()" >
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
     
