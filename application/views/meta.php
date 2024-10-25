<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>
<script>
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
   j("#nuser").addClass("active open");
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

function Delete(obj1,id)
{ 
    
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Admin/Delete_meta',
            type: 'POST',
            data:{'id':id},      
            success: function (data) {
              var obj=j.parseJSON(data);
			  alert(obj.message);
			  $(obj1).closest('tr').remove();  
            },
            error: function () {
                
            }
        });
}

function Edit(obj1,id)
{
   
    j('#formVideo').attr('action','<?php echo base_url(); ?>index.php/Admin/Update_meta');
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
   $('#metakey').val(obj1[0][r].meta_data);  
  
	   j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").hide();
     j("#SaveBtn").hide();
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
.alert {
    padding: 3px;
    margin-bottom: 18px;
    border: 1px solid transparent;
    border-radius: 4px;
}  
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

   <div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Details</a></li>
                 <li id="t2"><a href="#tab1-2" data-toggle="tab">Create MetaData</a></li>
                 <?php if(isset($message)) { ?>
                 <li class="pull-right">
                        
                        <div class="alert alert-success" id="alert">
                                    <strong><?php echo $message; ?></strong> 
                                </div>
                      
                 </li>
                 <?php } ?>
                </ul>
				 <form id="hfield" action="<?php echo base_url(); ?>index.php/Admin/Meta" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
                    <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />
               </form>
              <div class="tab-content">
			  <div class="tab-pane active" id="tab1-1">
				
				 <div class="table-responsive">			  
                   <table class="table">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="10%">Meta Keywords</th>                         
                          <th width="2%">Edit</th>
                          <th width="2%">Delete</th>
                        </tr>
                      </thead>
					  <script>
					  var jArray=[];
					  jArray.push(<?php echo json_encode($result); ?>);
					  </script>
					   <tbody id="tdata" style="font-size:12px;">
				          <?php if(!empty($result)){foreach($result as $row) { ?>	 
      					  <tr>
      					  <td><?php echo $row['meta_data']; ?></td>      					 
						  <td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,'<?php echo $row['id']; ?>');" class="fa fa-edit"></i></td>
						  <td style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(this,'<?php echo $row['id']; ?>');" class="fa fa-trash-o"></i></td>
            		     </tr>
                  <?php } } ?>
					 
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
							<form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/Admin/meta_create"; ?>"  enctype="multipart/form-data" method="post" name="frm">
							
							<div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Contact Us</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            <!--<a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>-->
                        </div>
					
					
					</div>
							<div class="panel-body">
							<div class="col-sm-6" style="margin-top:1%;">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Meta Keywords<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="metakey" id="metakey" required></textarea>
                            </div>
                          </div>               
						<input type="hidden" name="bid" id="bid" />
               
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
						
						 
                        </form>           
                
                </div>
               
              </div>
           </div>
     </div>
   </div>
  