<style>
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
</style>

<script>
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
  j("#home").addClass("open");
  j("#gallery").addClass("active open");
 
 
  /*******************************Image Restriction Code**************************************/

  
 /* function readImage(file) {
    var reader = new FileReader();
    var image  = new Image();
  reader.readAsDataURL(file);  
    reader.onload = function(_file) {
        image.src    = _file.target.result;              // url.createObjectURL(file);
        image.onload = function() {
            var w = this.width,
                h = this.height,
                t = file.type,                           // ext only: // file.type.split('/')[1],
                n = file.name,
                s = ~~(file.size/1024) +'KB';
        if((h<480 && w<920) || (h<480) || (w<920))
        {
          alert(n +"    "+"File Not Supported Please Upload Within 480 And 920");
             j('#userfile').val("");
        }
        else
        {
                
        }
      };
        image.onerror= function() {
            alert('Invalid file type: '+ file.type);
        };      
    };

}*/
$("#userfile").change(function (e) {
    if(this.disabled) return alert('File upload not supported!');
    var F = this.files;
    if(F && F[0])
    { 
      for(var i=0; i<F.length; i++)
      {
        readImage( F[i] );
      }
   }
});


  /******************************End*********************************************************/
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  
  });	
</script>
<script>
function Edit(obj1,id)
{
	var j=jQuery.noConflict();
	  j("#t1").removeClass("active");
    j("#t2").removeClass("active");
	  j("#t3").addClass("active");
    j("#tab1-1").removeClass("active");
	  j("#tab1-2").removeClass("active");
    j("#tab1-3").addClass("active");
    j("#aid").val(id);
	var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].id==id)
         {
          r=i;
		  //alert(obj1[0][i].name);
		 var str=obj1[0][i].name.split(',');
		 
		 var j;
		 for(j=0;j<str.length;j++)
		 {
			$('#tab1-3').append("<div class='col-md-3' style='margin-top:1%;'><img src='<?php echo base_url(); ?>uploads/Gallery/"+str[j]+"' width='240px' height='140px' style='border:1px solid #000;'/><br/><span class=\"col-sm-offset-5\" style=\"font-size:20px;padding:5px;\"><i class=\"fa fa-trash-o\" onclick=\"deleteimg('"+str[j]+"','"+obj1[0][i].id+"');\"></i></span></div>");
		 }
     $('#tab1-3').append("<div class=\"col-sm-6 col-lg-3\"><i class=\"fa fa-plus\" style=\"font-size: 50px; margin: 50px 85px 35px; 35px;\" id=\"more\"></i></div>");
		 }
		 //alert(j('#bid').val(obj1[0][i].id));
      }

       $('#more').click(function(){
          $('#moreimgs').trigger('click');
       });
       
       $('#moreimgs').change(function(){
         $('#sub').trigger('click');
       });
	  
}

function deleteimg(name1,id)
{
	
	if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/gallry/Deleteimg',
            type: 'POST',
           data:{'action':'delimg','nm':name1,'id1':id},
      
            success: function (data) {
                 //data=data.replace(/"/g, '');
				 alert("Image Deleted successfully..");
				 //alert(data);
				if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/Gallery/'; ?>"
				}
        
            },
            error: function () {
                
            }
        });
}

function change_status(id,str)
{

    j.ajax({  
            url: '<?php echo base_url(); ?>index.php/gallry/change_status',
            type: 'POST',
           data:{'str':str,'id':id},
      
            success: function (data) {
              var obj=j.parseJSON(data);
              alert(obj.message);

            },
            error: function () {
                
            }
        });

}

function Delete(id)
{
    //alert(id);
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/gallry/Delete',
            type: 'POST',
           data:{'action':'delabt','id':id},
      
            success: function (data) {
                 data=data.replace(/"/g, '');
				 alert("Record Deleted Successfully..");
                if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/Gallery'; ?>"
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
              <ul class="nav nav-tabs" style="margin-top:2%;">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Gallery</a></li>
                 <li id="t2"><a href="#tab1-2" data-toggle="tab">Add Gallery</a></li>
                <li id="t3"><a href="#tab1-3" data-toggle="tab">Edit Gallery</a></li>
                
               </ul>
              <div class="tab-content">
			    <div class="tab-pane active" id="tab1-1">
                  
				  <div class="table-responsive">
				  
				  <div class="row">
				  <div class="col-md-12" style="margin-bottom:36px;">
				  <div class="col-sm-3"></div><div class="col-sm-3"></div><div class="col-sm-3" ><p style="float:right;margin-top:5px;margin-bottom:-29px">Enter The Status..</p></div>
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="state1" name="state1" class="form-control" placeholder="Search By Status"/>
			      </div>
			      
			      </div>
			    </div>
				  
                   <table class="table">
                      <thead>
                        <tr>
                          <th width="1%">Id</th>
						  <th width="10%">Album Name</th>
                          <th width="5%">Image</th>
                          <th width="10%">Staus</th>
                          <th width="5%">Edit</th>
                          <th width="5%">Delete</th>
                        </tr>
                      </thead>
					   <script>
                            var jArray=[];
                           jArray.push(<?php echo json_encode($enquiry); ?>);
                        </script>
                      <tbody id="tdata">
						<?php 
						
						foreach($enquiry as $row)
						{
						?>
						<tr>
						<td id="t"><?php print $row->id; ?></td>
						<?php 
						$x=explode(",",$row->name);
						?>
						<td><?php echo $row->album_name; ?></td>
						<td><img src="<?php echo base_url(); ?>uploads/Gallery/<?php echo $x[0]; ?>" style="height:100px; width:150px;"></img></td>
						<td align="center">
               <select class="" style="width:50%; height:30px; border:1px solid #ccc;" onchange="change_status('<?php echo $row->id; ?>',this.value)" name="galstate" id="galstate" >
                    <option <?php if($row->status=="Active"){ echo "selected=selected"; } ?> >Active</option>
                    <option <?php if($row->status=="InActive"){ echo "selected=selected"; } ?> >InActive</option>
               </select>   
            </td>
						<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->id; ?>);" class="fa fa-edit"></i></td>
      			<td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->id; ?>);" class="fa fa-trash-o"></i></td>
      						
						</tr>	
						<?php } ?>
						
						</tbody>
                    </table>
                  </div>
				  
                </div>


							<div class="tab-pane" id="tab1-2">
							<form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/gallry/doupload"; ?>"  enctype="multipart/form-data" method="post" name="frm">
							
							<div class="panel panel-default">
							 <div class="panel-heading">
					
					<h4 class="panel-title">Gallery</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            <!--<a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>-->
                        </div>
					
					
					</div>
							
							<div class="col-sm-6" style="margin-top:12px;">
							
							
							  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              Album Name<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                             
							<input type="text" class="form-control" name="aname" id="aname" required/>
							
							</div>
                          </div>
							
							
							
							
							
                            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              Image<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                   
							<input name="userfile[]" id="userfile" type="file" multiple="" class="form-control" style="padding-top:0px;"/>
							
							</div>
                          </div>
                          
                          <input type="hidden" id="bid" name="bid" value="" />
                          
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="display:none;" id="prelbl">Testomonial Preview
                            </label>
                            <div class="col-sm-8">
                              <img  src="" style="height:142px; width:100%; display:none;" id="photo"/>                                
                              </div>
                          </div>
                        </div>
						<div class="col-sm-12">
						<div class="form-group">
						<label class="col-sm-2 control-label" for="inputPassword3">
						Status<span class="asterisk">*</span>
						</label>
						<div class="col-sm-9" style="margin-top:1%;">
  						<input type="radio" id="active" name="active" value="Active">Active
  						<input type="radio" id="inactive" name="active" value="InActive">InActive		
                 
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
						  </div>
						  
						  
          </form>           
               </div>
				
				<div class="tab-pane" id="tab1-3">
				
				
				<div class="panel panel-default">
				 <div class="panel-heading">
					
					 <form action="<?php echo base_url();?>index.php/gallry/More_upload" method="post" enctype="multipart/form-data" id="moreimg" >
                  <input type="file" name="moreimgs[]" id="moreimgs" style="display:none;" multiple/>
                  <input type="hidden" name="aid" id="aid"/>
                  <input type="hidden" name="name" id="aname"/>
                  <input type="submit" name="addmore" value="Add More..." id="sub" style="display:none;"/>
                 </form>
					
					</div>
				
				
				</div>
               </div>
              </div>



           </div>
     </div>
   </div>
  