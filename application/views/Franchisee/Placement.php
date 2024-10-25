
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

</style>
<style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 4px 8px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}
td:hover{cursor: pointer;}
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
</style>
<script type="text/javascript">
var obj1;
var _URL = window.URL || window.webkitURL;

  var j=jQuery.noConflict();
  j(document).ready(function(){
  
  /*******************************Image Restriction Code**************************************/

  
  function readImage(file) {
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
        if((h>150 && w>150) || (h<150 && w<150) )
        {
          alert(n +"    "+"File Not Supported Please Upload Within 150 And 150");
          var path = "<?php echo base_url(); ?>/Style/images/placement/d.png";
            $('#photo').attr('src', path);
            j('#upload').val("");
        }
        else
        {
                
        }
      };
        image.onerror= function() {
            alert('Invalid file type: '+ file.type);
        };      
    };

}
$("#upload").change(function (e) {
    if(this.disabled) return alert('File upload not supported!');
    var F = this.files;
    if(F && F[0])
    { 
      for(var i=0; i<F.length; i++)
      {
        //alert(F[i]);
        readImage( F[i] );
      }
   }
});


  /******************************End*********************************************************/
  
  
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
            PageSize: 5,
            RecordCount: parseInt(rcount)

        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');
          
            j('#pindex').val(pageindex);
            j('#hfield').submit();

   });

  
  
  
  j("#book").addClass("open");
  

   j('#searchid').val(j('#bnm').val());
   j('#cou').val(j('#cor').val());
   j('#fran').val(j('#auth').val());  
   
   searchh();
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
            PageSize: 5,
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
function searchh()
{
j("#searchid").autocomplete({
           
              source: function (request, response) {
                  
                  j.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Franchisee/get_stud_for_placement",
                        data: { term: j("#searchid").val()},
                        dataType: "json",

                      success: function (data) {
                          response(j.map(data, function (item) {
                              return {
                                  label: item.sname,// Name must be column name in table which you want to show Ex:- Username
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
                 j('#searchid').val(ui.item.label);                  
                  return false;
              }
          });
}

function searchh1()
{
j("#name1").autocomplete({
           
              source: function (request, response) {
                  
                  j.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Franchisee/get_stud_for_placement1",
                        data: { term: j("#name1").val()},
                        dataType: "json",

                      success: function (data) {
                          response(j.map(data, function (item) {
                              return {
                                  label: item.name,// Name must be column name in table which you want to show Ex:- Username
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
                 j('#name1').val(ui.item.label);                  
                  return false;
              }
          });
}


</script>
<script>
function Delete(id)
{
//alert(id);
    if (confirm("Are you sure, you want to Delete It.."))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Franchisee/Delete1',
            type: 'POST',
           data:{'action':'delbook','id':id},
      
            success: function (data) {
			//alert(data);
                 if(data)
				{
				window.location="<?php echo base_url().'index.php/Franchisee/placement'; ?>"
				}
        
            },
            error: function () {
                
            }
        });
}

function Edit(obj1,id)
{
	//alert(obj1);
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
	 j('#photo').attr('src', '<?php echo base_url().'uploads/FranPlacement/'?>'+obj1[0][r].image+' ');
   j('#photo').show();

	 j('#upload').attr('required',false);
   j('#name1').val(obj1[0][r].sname);
	 j('#cname1').val(obj1[0][r].cname);
	 j('#desi').val(obj1[0][r].designation);
	 j('#slr').val(obj1[0][r].salary);
           
    
	 j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
}
</script>

<script>

 function search_data()
{
            j('#bnm').val(j('#searchid').val());
            j('#cor').val(j('#cou').val());
            j('#auth').val(j('#fran').val()); 
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
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Placement</a></li>
                <li id="t2" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Add Placement</a></li>
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
			      <input type="text" id="searchid" name="searchid" class="form-control" placeholder="Search By Book Name" required/>
			      <div id="result"></div>
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
                          <th width="5%">Student Name</th>
                          <th width="5%">Company Name</th>
                          <th width="5%">Designation</th>
                          <th width="5%">Salary</th>
                          <th width="5%">Image</th>
                          <th width="3%">Edit</th>
                          <th width="3%">Delete</th>
                    </tr>
						</thead>
						<script>
                            var jArray=[];
                           jArray.push(<?php echo json_encode($enquiry); ?>);
						</script>
						 <tbody id="tdata" style="font-size:12px;">
						<?php		
						if(!empty($enquiry)) { foreach($enquiry as $row)
						{ ?>
						<tr>
            <td><?php print $row->sname; ?></td>
						<td><?php print $row->cname; ?></td>
           	<td><?php print $row->designation; ?></td>
						<td><?php print $row->salary; ?></td>
           	<td><img src="<?php echo base_url(); ?>uploads/FranPlacement/<?php echo $row->image; ?>" style="height:80px; width:80px;"></img></td>
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
					 <?php //if(isset($links)) { ?>
              <div id="links1" class="pager">
                 
              <?php //echo $links; ?>
              </div>
             <?php //}?>
             
             
                  </div>
                </div>
                <div class="tab-pane" id="tab1-2">
               


         <form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/Franchisee/placement_data"; ?>"  enctype="multipart/form-data" method="post" name="frm">
					<div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Add New Placement</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                           <!-- <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>-->
                        </div>
					
					
					</div>

      
         <div class="panel panel-body">
					<div class="col-sm-6" style="margin-top:1%;">
					
                          
						   <input type="hidden" id="bid" name="bid" value="" />
						 
		      			<div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Staudent Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="name1" name="name1" class="form-control" placeholder="Enter Student Name..." required title="Please Enter Stdent Name"/>
                            </div>
                          </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Company Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="cname1" name="cname1" class="form-control" placeholder="Enter Company Name..." required title="Please Enter Company Name"/>
                            </div>
                          </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Designation<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="desi" name="desi" class="form-control" placeholder="Enter Designation..." required title="Please Enter Student Designation"/>
                            </div>
                          </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Salary<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="slr" name="slr" class="form-control" placeholder="Enter Student Sallary..." required title="Please Enter Student Sallary"/>
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        <div class="col-sm-6" style="margin-top:1%;">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Image<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" required title="Please Upload Student Image">
                             <span class="asterisk">Please Upload image 150*150</span>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="" id="prelbl">
                            </label>
                            <div class="col-sm-8">
                              <img  src="<?php echo base_url(); ?>/Style/images/placement/d.png" style="height:150px; width:150px;" id="photo"/>                                
                              </div>
                          </div>
                          
                          
                          
                          
                        </div>
	
    
    					
						
						 
						
						<div class="col-sm-12">
               <div class="panel-footer"> 
          <div class="form-group">
             
               <div class="col-sm-offset-4 col-sm-8">
                  
                     <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn"/>
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
  