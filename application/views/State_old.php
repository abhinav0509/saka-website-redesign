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
  var j=jQuery.noConflict();
  j(document).ready(function(){
  
  
  
   var Pageindex = j('#pindex').val();
   var rcount = j('#rcount').val();
	j('#cou').val(j('#st').val());
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
			j('#st').val(j('#cou').val());
            j('#hfield').submit();

   });

  
  
  
  j("#book").addClass("open");
   CKEDITOR.replace( 'Desc');

   j('#searchid').val(j('#bnm').val());
   
   
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
                        url: "<?php echo base_url(); ?>index.php/AddState/get_state_name",
                        data: { term: j("#searchid").val()},
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
                 j('#searchid').val(ui.item.label);                  
                  return false;
              }
          });
}

function searchh1()
{
j("#fran").autocomplete({
           
              source: function (request, response) {
                  
                  j.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Book_Data/get_auth_name",
                        data: { term: j("#fran").val()},
                        dataType: "json",

                      success: function (data) {
                          response(j.map(data, function (item) {
                              return {
                                  label: item.author_name,// Name must be column name in table which you want to show Ex:- Username
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
                 j('#fran').val(ui.item.label);                  
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
            url: '<?php echo base_url(); ?>index.php/AddState/Delete',
            type: 'POST',
           data:{'action':'delbook','id':id},
      
            success: function (data) {
                 if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/state1'; ?>"
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
         if(obj1[0][i].state_id==id)
         {
          r=i;
         }	
      }
	  //alert(obj1[0][r].name);
	 j('#stat').val(obj1[0][r].name);
           
    
	 j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
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
		   price:"required",
		   upload:"required",
		   },
		message:{
			book:"Please Provide The Book Name",
			author:"Please Provide The Author Name",
			title:"Please Provide The Tilte",
			price:"Please Provide The Price Of Book",
			upload:"Please Upload The Image"
			}
	});
 }
 function search_data()
{
           
			j('#st').val(j('#cou').val());
          

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
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View State</a></li>
                <li id="t2" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Add State</a></li>
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
			    <select name="cou" id="cou" class="form-control">
                              <option value="">select State</option>
                               <?php foreach($states as $co) { ?>
                                   <option><?php echo $co->name; ?></option>
                                <?php } ?> 
                        </select>
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
                          <th width="5%">State Id</th>
                          <th width="5%">State Name</th>
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
						<td><?php print $row->state_id; ?></td>
						<td><?php print $row->name; ?></td>
           
						<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->state_id; ?>);" class="fa fa-edit"></i></td>
      			<td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->state_id; ?>);" class="fa fa-trash-o"></i></td>
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
					 <?php if(isset($links)) { ?>
              <div id="links1" class="pager">
                 
                  <?php echo $links; ?>
              </div>
             <?php }?>
             
             
                  </div>
                </div>
                <div class="tab-pane" id="tab1-2">
           <form id="hfield" action="<?php echo base_url(); ?>index.php/Admin/state1" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
                    <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />
                    <input type="hidden" name="st" id='st' value="<?php echo $dt['st_name']; ?>" />
                 

               </form>          


         <form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/AddState/Insert"; ?>"  enctype="multipart/form-data" method="post" name="frm">
					<div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Add New State</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                           <!-- <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>-->
                        </div>
					
					
					</div>

      
         <div class="panel panel-body" style="border:1px solid #CCC;">
					<div class="col-sm-6" style="margin-top:1%;">
					
                          
						   <input type="hidden" id="bid" name="bid" value="" />
						 
		      <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Add State<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="stat" name="stat" class="form-control" placeholder="State Name..." required/>
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
  