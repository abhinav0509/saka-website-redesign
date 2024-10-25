<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/> 
<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>


<style type="text/css">
.dataTables_paginate.paging_bootstrap {
    display: none;
}
.dataTables_info {
    display: none;
}
.dataTables_length {
    display: none;
}
.dataTables_filter {
    display: none;
}
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
.alert {
    padding: 3px;
    margin-bottom: 18px;
    border: 1px solid transparent;
    border-radius: 4px;
}
  .modal-lg {
    width: 800px;
}
.alert-successs {
    background-color: #fff;
    border-color: #22ad5c;
    color: #000;
}
.alertt {
    padding: 3px;
    margin-bottom: 18px;
    border: 1px solid transparent;
    border-radius: 0px;
}
h3 {
    color: #fff;
    font-size: 19px;
    font-weight: normal;
    line-height: 20px;
    margin: -17px -16px 9px;
}
.thin {
    color: #fff;
    font-weight: 300;
}
.col-sm-7 h4{margin: 10px -17px;}
</style>

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

</style>
 
 <style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 4px 5px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}

table thead th{text-align: center; font-weight: normal; font-size: 12px; font-family: callibri; font-weight: normal;}

table tbody td{text-align: center;}

table tbody td{

    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
td:hover{cursor: pointer;}
 </style>



<script type="text/javascript">
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
  j("#emp1").addClass("open");
   CKEDITOR.replace( 'Desc');
   j('#cnm').val(j('#cnm1').val());

   var dt= new Date();
   j('#doa').datepicker({
        autoclose: true,
        todayHighlight: true,
       dateFormat: 'dd-mm-yy',
       onSelect: function(dateText){
            getDuration();
       }
    });

   
   
   
   searchh1();
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
             j('#cnm1').val(j('#cnm').val());
             j('#hfield').submit();

   });
  
  
  
  
  
});
</script>
<script>

function searchh1()
{
j("#cnm").autocomplete({
    source: function (request, response) {
		j.ajax({
			type: "POST",
			contentType: "application/json; charset=utf-8",
			url: "<?php echo base_url(); ?>index.php/Employee1/get_company_name",
			data: { term: j("#nm").val()},
			dataType: "json",

			success: function (data) {
				  response(j.map(data, function (item) {
					  return {
						  label: item.cname,// Name must be column name in table which you want to show Ex:- Username
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
		 j('#cnm').val(ui.item.label);                  
		  return false;
	  }
	});
}
</script>
<script>

function change1(id)
{
	
	var a=j("#status").val();
	j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Employee1/Change',
            type: 'POST',
           data:{'id':id,'name':a},
      
            success: function (data) {
				//alert(data);
                 if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/EmployeeEnq'; ?>"
				}
        
            },
            error: function () {
                
            }
        });
		
}


function Delete(id)
{
    if (confirm("Are you sure, you want to Delete It.."))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Employee1/Delete',
            type: 'POST',
           data:{'id':id},
      
            success: function (data) {
                 if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/EmployeeEnq'; ?>"
				}
        
            },
            error: function () {
                
            }
        });
}

/*function Edit(obj1,id)
{
//j('#formfrch').attr("action", "<?php echo base_url().'index.php/Admin_Franch/update_fran';?>");
	j('#state1').hide();
	j('#city1').hide();
	j('#fran').hide();
	j("#t1").removeClass("active");
  j("#t2").addClass("active");
   
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
	
	j('form').attr("action", "<?php echo base_url().'index.php/Employee1/Admin_Update';?>"); 
	
     var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].id==id)
         {
          r=i;
         }	
      }
      var editor1 = CKEDITOR.instances.Desc;
      if( editor1.mode == 'wysiwyg' )
      {
                  editor1.insertHtml(obj1[0][r].description);
      }
	  j('#photo').attr('src', '<?php echo base_url().'uploads/Emp/'?>'+obj1[0][r].image+' ');
	  j('#photo').show();
     
	  
     j('#cname').val(obj1[0][r].cname);
	 j('#add').val(obj1[0][r].address);
	 j('#name').val(obj1[0][r].name);
	 j('#mail').val(obj1[0][r].email);
	 j('#cont').val(obj1[0][r].contact);
	 j('#stat').val(obj1[0][r].state);
	 j('#description').val(obj1[0][r].description);
	 j('#vacancy').val(obj1[0][r].vacancy);
	 j('#doa').val(obj1[0][r].edate);
	 j('#city').val(obj1[0][r].city);
	 j('#status').val(obj1[0][r].status);
	 
	 

	 j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
}*/
function Edit(obj1,id)
	{
		j("#formVideo").attr('action','<?php echo base_url();?>index.php/Employee1/Admin_Update');
		j("#t1").removeClass("active");
		j("#t2").addClass("active");
		j("#tab1-1").removeClass("active");	
		j("#tab1-2").addClass("active");
		
		$("#img1").html("");
		var op='';
		var r;    
		for(i=0;i<obj1[0].length;i++)
		{
			if(obj1[0][i].id==id)
			{
			  r=i;
			}  
		}
		$("#bid").val(obj1[0][r].id);
		j('#cname').val(obj1[0][r].cname);
		j('#add').val(obj1[0][r].address);
		j('#name').val(obj1[0][r].name);
		j('#mail').val(obj1[0][r].email);
		j('#cont').val(obj1[0][r].contact);
		j('#stat').val(obj1[0][r].state);
		j('#description').val(obj1[0][r].description);
		j('#vacancy').val(obj1[0][r].vacancy);
		j('#doa').val(obj1[0][r].edate);
		j('#city').val(obj1[0][r].city);
		j('#status').val(obj1[0][r].status);
		
		if(obj1[0][r].image!=""){
		var imgg = obj1[0][r].image;
		var l = imgg.split(",");
		for(var k=0; k<l.length; k++)
		{
			var img_url = "<?php echo base_url();?>data/uploads/about/"+l[k];
				if(l[k]=="No image"){  }
				else{
					op+='<img src="'+img_url+'" style="height:115px;width:125px;border:1px solid #D7DADC;margin-right:5px;">';
				}
		}
		$("#img1").append(op);
		}
		
	}
</script>

<script>
 function val()
 { 
  	j("#formVideo").validate({
	rules:{
		   book:"required",
		   author:"required",
		   title:"required",
		   price:"required"
		   },
		message:{
			book:"Please Provide The Book Name",
			author:"Please Provide The Author Name",
			title:"Please Provide The Tilte",
			price:"Please Provide The Price Of Book",
			}
	});
 }
 function search_data()
{
            //j('#nm1').val(j('#nm').val());
            j('#cnm1').val(j('#cnm').val());
            //j('#auth').val(j('#fran').val()); 
            j('#pindex').val(1);
            j('#hfield').submit();

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
					<li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Employee</a></li>
					<li id="t2" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Add Employee</a></li>
					<!--<li id="t3" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Set Price</a></li>
					<li id="t2" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Change Price</a></li>-->
				</ul>
				<div class="">
				   <div class="tab-content">
						<div class="tab-pane active" id="tab1-1">
							<div class="table-responsive">
								<div class="row">
									<div class="col-md-12" style="margin-bottom:36px;margin-top:-8px;">
										<div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
											<label class="col-sm-3 control-label" for="inputPassword3"></label> 
										</div>
										<div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
											<input type="text" id="cnm" name="cnm" class="form-control" placeholder="Search By Company" required/>
										</div>
										<div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
											<a class="btn btn-primary" onclick="search_data()">
												<i class="fa fa-search"></i> Search
											</a>
										</div>
									</div>
								</div>
								<!--<table id="table-hidden-row-details" class="table table-striped">-->
							<table id="" class="table table-striped">
								<thead>
									<tr style="background-color:#d7dadc;">
										  <th width="2%">Id</th>
										  <th width="5%">Name</th>
										  <th width="5%">Company Name</th>
										  <th width="5%">Job Description</th>
										  <th width="2%">Email</th>
										  <th width="2%">contact</th>
										  <th width="5%">City</th>
										  <th width="2%">Vacancy</th>
										  <th width="3%">Date</th>
										  <th width="5%">Image</th>
										  <th width="2%">Status</th>
										  <th width="3%">Edit</th>
										  <th width="3%">Delete</th>
									</tr>
								</thead>
								<script>
									var jArray=[];
								   jArray.push(<?php echo json_encode($results); ?>);
								</script>
								<tbody id="tdata" style="font-size:12px;">
									<?php		
									if(!empty($results)) { foreach($results as $row)
									{ ?>
									<tr>
										<td><?php print $row->id; ?></td>
										<td><?php print $row->name; ?></td>
										<td><?php print $row->cname; ?></td>
										<td><?php print $row->description; ?></td>
										<td><?php print $row->email; ?></td>
										<td><?php print $row->contact; ?></td>
										<td><?php print $row->city; ?></td>
										<td><?php print $row->vacancy; ?></td>
										<td><?php print $row->edate; ?></td>
										
										<td>
											<?php if($row->image!=""){ ?>
											<img src="<?php echo base_url(); ?>uploads/Emp/<?php echo $row->image; ?>" style="height:80px; width:80px;"></img></td>
											<?php }else{ echo "No Image"; } ?>
										<td>
										<select name="status" id="status" onchange="change1(<?php echo $row->id;?>)">
										<option <?php if($row->status=="Hide"){echo 'selected';} ?> >Hide</option>
										<option <?php if($row->status=="Show"){echo 'selected';} ?> >Show</option>
										</select>
										</td>
										<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->id; ?>);" class="fa fa-edit"></i></td>
										<td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->id; ?>);" class="fa fa-trash-o"></i></td>
										</tr>	
										<?php } } else{ ?>
									<tr>
										<td colspan="9">
										   <div class="alert alert-info">
												<strong><?php echo "No Data Available.....!";?></strong>
										   </div>
										</td>
									</tr>     
								<?php } ?>
								</tbody>
							</table>
						<div id="links" class="Pager">
								<?php echo $links; ?>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="tab1-2">
					<form id="hfield" action="<?php echo base_url(); ?>index.php/Admin/EmployeeEnq" method="post">
						<input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
						<input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />
						<input type="hidden" name="cnm1" id='cnm1' value="<?php echo $dt['cname'];?>" />
					</form>          


					<form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/Employee1/Save_Admin_Data"; ?>"  enctype="multipart/form-data" method="post" name="frm">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">Add Employee</h4>
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
									<a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
								</div>
							</div>
							<div class="panel panel-body" style="border:1px solid #CCC;">
								<div class="col-sm-6" style="margin-top:1%;">
									<input type="hidden" id="bid" name="bid" value="" />
									<div class="form-group">
										<label class="col-sm-4 control-label" for="inputPassword3">Company Name<span class="asterisk">*</span></label>
										<div class="col-sm-8">
											<input type="text" id="cname" name="cname" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="inputPassword3">Email-Id<span class="asterisk">*</span></label>
										<div class="col-sm-8">
											<input type="email" id="mail" name="mail" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="inputPassword3">State<span class="asterisk">*</span></label>
										<div class="col-sm-8">
											<input type="text" id="stat" name="stat" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="inputPassword3">Date<span class="asterisk">*</span></label>
										<div class="col-sm-8">
											<input type="text" id="doa" name="doa" onchange="" class="form-control" data-rel="datepicker" value="<?php echo date('d/m/Y'); ?>" required title="Please Select Admission Date" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="inputPassword3">Job Description<span class="asterisk">*</span></label>
										<div class="col-sm-8">
											<input type="text" id="description" name="description" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="inputPassword3">
										  Image
										</label>
										<div class="col-sm-8">
										  <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" style="padding-top:0px;" />
										</div>
									</div>

								</div>
								<div class="col-sm-6" style="margin-top:1%;">
									<div class="form-group">
										<label class="col-sm-4 control-label" for="inputPassword3">Name<span class="asterisk">*</span></label>
										<div class="col-sm-8">
										   <input type="text" id="name" name="name" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="inputPassword3">Contact No<span class="asterisk">*</span></label>
										<div class="col-sm-8">
											<input type="text" id="cont" name="cont" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="inputPassword3">City<span class="asterisk">*</span></label>
										<div class="col-sm-8">
											<input type="text" id="city" name="city" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="inputPassword3">Address<span class="asterisk">*</span></label>
										<div class="col-sm-8">
											<input type="text" id="add" name="add" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="inputPassword3">Vacancy<span class="asterisk">*</span></label>
										<div class="col-sm-8">
											<input type="text" id="vacancy" name="vacancy" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="inputPassword3" style="display:none;" id="prelbl">Image Preview</label>
										<div class="col-sm-8">
											<img  src="" style="height:142px; width:100%; margin-left:176px; display:none;" id="photo"/>                                
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-sm-2 control-label" for="inputPassword3"></label>
										<div class="col-sm-9" style="display:none;">
											<textarea id="Desc" name="Desc" class="form-control"></textarea>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
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
							</div> 	 
						</div>
					</form>           
				</div>
			</div>
		</div>
		   
		 
    </div>
</div>
  