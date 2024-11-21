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
  
 <!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav">
                                <li class="active btn btn-success" id="t1"><a href="#tab1-1" data-toggle="tab" style="color: #ffffff;">View State <i data-feather="eye"></i></a></li>
                                <li id="t2" class="btn btn-primary" style="margin-left: 10px;"><a href="#tab1-2" data-toggle="tab" style="color: #ffffff;">Add State <i data-feather="plus"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- View Blog Details Tab -->
                                <div class="tab-pane active" id="tab1-1">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                <th width="5%">State Id</th>
                                                <th width="5%">State Name</th>                                                
                                                <th class="text-center" width="5%">Actions</th>
                                                </tr>
                                            </thead>
                                            <script>
                                                var jArray=[];
                                                jArray.push(<?php echo json_encode($enquiry); ?>);
                                            </script>
                                            <tbody id="tdata">
                                                <?php if (!empty($enquiry)) { foreach($enquiry as $row) { ?>
                                                <tr>
                                                <td><?php print $row->state_id; ?></td>
                                                <td><?php print $row->name; ?></td>            
                                                   
                                                    <td class="text-center">
                                                        <button class="btn btn-primary btn-action mr-1" data-toggle="tooltip"  onclick="Edit(jArray,<?php echo $row->state_id; ?>);">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-action" data-toggle="tooltip" onclick="Delete(<?php echo $row->state_id; ?>);">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php } } else { ?>
                                                <tr> 
                                                    <td colspan="8">
                                                        <div class="alert alert-info">
                                                            <strong>No Data Available.....!</strong>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>                                   
                                    </div>                                 
                                </div>
                                  
                                <!-- Add Blog Tab -->
                                <div class="tab-pane" id="tab1-2">
                                    <h4>Add New State</h4>
                                    <form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/AddState/Insert"; ?>"  enctype="multipart/form-data" method="post" name="frm">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add State <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-4">
                                            <input type="text" id="stat" name="stat" class="form-control" placeholder="State Name..." required></div>
                                        </div>                                                                            
                                        <input type="hidden" id="bid" name="bid" value=""/>                                 
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                            <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                                            <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()"/>
          					                <input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
