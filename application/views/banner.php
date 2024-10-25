 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>Style/dist/js/jquery.validate.js"></script>
  <script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>       
      <script src="<?php echo base_url();?>Style/js/ASPSnippets_Pager.min.js" type="text/javascript"></script>
           <link href="<?php echo base_url();?>Style/css/AutoComplete.css" rel="stylesheet" type="text/css"/>  
  
<script>
var _URL = window.URL || window.webkitURL;
var j = jQuery.noConflict();
j(document).ready(function(){
	j(".bann").addClass('active');
	j("#alert").delay(2000).fadeOut(300);
	j(".about").addClass("active open");
	
	   
	   var Pageindex = j("#pindex").val();
	   var rcount = j("#rcount").val();
	   
	   if(Pageindex=="")
		 Pageindex=1;
	   if(rcount=="")
		  rcount=0; 
	    j(".pager").ASPSnippets_Pager({
            ActiveCssClass: "current",
            PagerCssClass: "pager",
            PageIndex: parseInt(Pageindex),
            PageSize: 5,
            RecordCount: parseInt(rcount)
        });
        
	   j(".page").click(function () {
		  var pageindex = j(this).attr('page');          
		  j('#pindex').val(pageindex);
		  j('#hfield').submit();
	   });
	
	j('#upload').change(function(e){
         var file, img, h, w, tp;
          if ((file = this.files[0])) {
              img = new Image();
              img.onload = function () {
                var ext = file.name.split('.').pop().toLowerCase();
                  w=this.width;
                  h=this.height;
                  tp=file.type;                  
                  //alert("H="+h+"W="+w);
                  if(h < 784 && w >=1623 || h >= 784 && w < 1623 || h > 784 && w > 1623 || h < 784 && w < 1623){
                      alert("Please Upload Image In (1623(Width) * 784(Height)) Dimentions");
                      j("#upload").val("");
                      j("#img1").attr('src','');
                      j("#img1").html("");
                  }
                  else if (h == 784  && w == 1623) {
                     if (j.inArray(ext, ['jpg', 'jpeg','png']) == -1) {
                          alert('Invalid File Type! Please Upload Image With Only jpg or jpeg or png extension');
                          j("#upload").val("");
                          j("#img1").attr('src','');
                          j("#img1").html("");
                      }
                  }
              };
              img.src = _URL.createObjectURL(file);
          }
    });

	   	   
	   j("#Cancelbtn").click(function(){
		   j("#img1").html("");
		   j("#formdetail").attr('action','<?php echo base_url();?>index.php/banner_data/insert_banner');
	   });

});

function show(input){
	var dvPreview = document.getElementById("img1");
	dvPreview.innerHTML = "";
	var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
		for (var i = 0; i < input.files.length; i++) {
		    var file = input.files[i];
		    if (regex.test(file.name.toLowerCase())) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		            var img = document.createElement("IMG");
		            img.height = "115";
		            img.width = "125";
		            img.src = e.target.result;
		            dvPreview.appendChild(img);
		        }
		        reader.readAsDataURL(file);
		    }
		}
}

function Edit(obj,id,$cid)
{
	j("#formdetail").attr('action','<?php echo base_url();?>index.php/banner_data/update_banner');
	j("#t1").removeClass("active");
	j("#t2").addClass("active");
	j("#tab1-1").removeClass("active");	
	j("#tab1-2").addClass("active");
	j("#upload").attr('required',false);
	
	j("#img1").html("");
	var op='';
	var r;    
	for(i=0;i<obj[0].length;i++)
	  {
		 if(obj[0][i].id==id)
		 {
		  r=i;
		 }  
	  }
	j("#bid").val(obj[0][r].id);
	j("#cap1").val(obj[0][r].cap1);
	j("#cap2").val(obj[0][r].cap2);
	j("#cap3").val(obj[0][r].cap3);
	j("#imgTitle").val(obj[0][r].imgtitle);
	if(obj[0][r].image!=""){
	var imgg = obj[0][r].image;
	var l = imgg.split(",");
	for(var k=0; k<l.length; k++)
	{
		var img_url = "<?php echo base_url();?>uploads/Banner/"+l[k];
		if(l[k]=="No image"){  }
		else{
			op+='<img src="'+img_url+'" style="height:115px;width:125px;border:1px solid #D7DADC;margin-right:5px;">';
		}
	}
	j("#img1").append(op);
	}
}

function Delete(id,obj){
	if(confirm("Are you sure, you want to delete It.."))
	j.ajax({
		url:"<?php echo base_url();?>index.php/banner_data/delete_banner",
		type:"post",
		data:{'id':id},
		success:function(data){
		   var obj1=j.parseJSON(data);
		   j("#alert1").text(obj1.message);
		   j("#alert1").fadeIn('slow');
		   j("#alert1").delay(2000).fadeOut(300);
		   j(obj).closest('tr').remove();
		},
		error: function () {
			
		}
		
	});
}

function change_status(old,id,neww){
     
    if (confirm("Are you sure, you want to Change Status.."))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/banner_data/banner_status',
            type: 'POST',
            data:{'id':id,'oldseq':old,'newseq':neww},      
            success: function (data) {
               var obj=j.parseJSON(data);
               if(obj.message=="success"){
                  j(".alert").html("<strong>Sequence Changed Successfully</strong>");
                  j("#alert1").fadeIn('slow');
                  j("#alert1").delay(2000).fadeOut(300);
                 window.location="<?php echo base_url(); ?>index.php/Admin/banner";
                }
               else if(obj.message=="Error"){
                  j(".alert1").html("<strong>Error Occured! Please Try Again</strong>");
                  j("#alert1").fadeIn('slow');
                  j("#alert1").delay(2000).fadeOut(300);
                 window.location="<?php echo base_url(); ?>index.php/Admin/banner";
               }
            },
            error: function () {
                
            }
        });
}
 
</script>


<style>
.profile {
  background-color: #428bca;
  bottom: 0;
  height: 19px;
  left: 0;
  margin-left: auto;
  margin-right: auto;
  margin-top: -24px;
  opacity: 0;
  overflow: visible;
  right: 0;
  text-align: center;
  transition: all 0.2s cubic-bezier(0.17, 0.67, 0.84, 0.57) 0s;
  width: 90px;
  z-index: 1000;
}

.imge:hover .profile {
    opacity: 0.9;
    bottom: 0;
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
  .alert {
  border: 1px solid transparent;
  border-radius: 4px;
  margin-bottom: 0;
  padding: 5px;
}
.fa
{
	cursor:pointer;
}
table tbody td{

    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
td {
    font-size: 14px;
}
</style>
   <div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab"> View Banner</a></li>
              <li class="" id="t2"><a href="#tab1-2" data-toggle="tab">Add Banner</a></li>
			  <li class="pull-right">
								<?php if(isset($message)){?>
									<div class="alert alert-success" id="alert"> 
										 <strong><?php echo $message; ?></strong> 
									</div>
								<?php }?>
							</li>
							<li class="pull-right">
									<div class="alert alert-success" id="alert1" style="display:none;"> 
									</div>
							</li>
              </ul>
              <div class="tab-content" style="margin:16px;">
			 <div id="tab1-1" class="tab-pane active">
				 <div class="table-responsive"> 
					<table id="" class="table table-bordered" style="float:left;">
						<thead style="background: #f5f5f5; color: #FFF;">
							  <th width="20%" style="text-align:center;">Image</th>
							  <th width="20%" style="text-align:center;">Caption</th>
							  <th width="20%" style="text-align:center;">Image Titles</th>
							  <th width="10%" style="text-align:center;">Sequence</th>
							  <th width="10%" style="text-align:center;">Action</th>                                                                    
						</thead>
						<script>							
						  var jArray=[];
						  jArray.push(<?php echo json_encode($results);?>);
						</script>
						<tbody id="tdata">
						  <?php 
						  if(!empty($results)){
						  foreach($results as $row)
						  {
						  ?>
						  <tr>
							  <td style="text-align:center;"><img src="<?php echo base_url();?>uploads/Banner/<?php echo $row['image'];?>" style="width:100%;height:100px;border:1px solid #f5f5f5;"></td>
							  <td style="text-align:center;"><?php echo $row['cap1'];?> <br> <?php echo $row['cap2'];?> <br> <?php echo $row['cap3'];?></td>
							  <td style="text-align:center;" title="<?php echo $row['imgtitle'];?>"><?php echo $row['imgtitle'];?></td>
							  <td>
								   <select name="stat" id="stat" class="form-control" onchange="change_status('<?php echo $row['seq']; ?>','<?php echo $row['id']; ?>',this.value )">
										<option>Select Sequence</option>
										<?php for($i=1; $i<=$rowcount; $i++){  ?>
										  <option <?php if($row['seq']==$i){ ?> selected="selected" <?php } ?>><?php echo $i; ?></option>
										<?php } ?>
								   </select>
							   </td>
							   <td style="text-align:center;"><i style="color:#275273;font-size:20px;margin-left:10px;" id="EditB" class="fa fa-edit" title="Edit Record" onclick="Edit(jArray,'<?php echo $row['id'];?>')" ></i><i style="color:#275273;font-size:20px; margin-left:10px;" id="DeleteN" class="fa fa-trash-o" title="Delete Record" onclick="Delete('<?php echo $row['id'];?>',this)"></i></td>                               
						  </tr>
						  <?php }} else{?>
							  <tr>
								<td colspan="4" style="color:#2599D6;text-align:center;">No Data Available !</td>
							  </tr>
						  <?php }?>
						</tbody>
					</table> 
					<?php if(isset($links)){?>
						<div class="pager">
							<?php echo $links;?>
						</div>
					<?php }?>
				</div>
			</div>
				<form id="hfield" name="hfield" method="post" action="<?php echo base_url();?>index.php/Admin/banner">
					<input type="hidden" id="pindex" name="pindex" value="<?php if(isset($dt['pindex'])){ echo $dt['pindex']; }?>">
					<input type="hidden" id="page" name="page" value="<?php if(isset($dt['page'])){ echo $dt['page']; }?>">
					<input type="hidden" id="rcount" name="rcount" value="<?php echo $rowcount;?>">
				</form>
			<div id="tab1-2" class="tab-pane">
				<form id="formdetail" name="formdetail" class="form-horizontal" method="post" action="<?php echo base_url();?>index.php/banner_data/insert_banner" enctype="multipart/form-data">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">Add Banner</h4>
						</div>
						<div class="panel-body">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="inputPassword3">Image <span class="asterisk">*</span></label>
								<div class="col-sm-8">
									<input type="file" id="upload" name="upload" required onchange="show(this);" class="form-control" style="padding:0px" >
									<span class="asterisk">Upload Images in (1623(Width) X 784(height)) Dimention and allowed file Types are (jpg ,jpeg ,png)</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="inputEmail3">Caption 1 </label>
								<div class="col-sm-8">
									<input type="text" placeholder="Caption 1" id="cap1" name="cap1" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="inputEmail3">Caption 2 </label>
								<div class="col-sm-8">
									<input type="text" placeholder="Caption 2" id="cap2" name="cap2" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="inputEmail3">Caption 3 </label>
								<div class="col-sm-8">
									<input type="text" placeholder="Caption 3" id="cap3" name="cap3" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="inputEmail3">Image Title </label>
								<div class="col-sm-8">
									<textarea name="imgTitle" class="form-control" id="imgTitle"></textarea>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							 <div class="form-group" id="img1">                                              
								  <div class="col-sm-4">
									 <!--<img id="img1" src="http://localhost/budhrani/uploads/d.png" style="width:75%; height:102px; display:; " />-->
								  </div>
							 </div>
						</div>
						
						<input type="hidden" id="bid" name="bid">
						</div>
						<div class="panel-footer">
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button class="btn btn-primary" type="submit" id="Subtn" name="Subtn">Submit</button>
									<button class="btn btn-primary" type="reset" id="Cancelbtn" name="Cancelbtn">Cancel</button>
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
     
