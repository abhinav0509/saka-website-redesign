
<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/> 
<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>

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
  j("#home").addClass("open");
   j("#HExp").addClass("active open");
//    CKEDITOR.replace( 'Desc');
   CKEDITOR.replace('testo');
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
	if(confirm("Are You Sure You Want To Delete It.?"))
	j.ajax({
			url: '<?php echo base_url(); ?>index.php/Testimonial_Data/Delete',
            type: 'POST',
			data:{'action':'deltesti','T_id':id},
			success: function(data){
				 data=data.replace(/"/g, '');
				 
				 alert("Record Deleted Successfully.?");
					if(data)
					{
					window.location="<?php echo base_url().'index.php/Admin/Testimonial'; ?>"
					}
        
				},
				error: function () {
                
				}
	
	});
 }
 
 function Edit(obj1,id)
{
	//alert("fsgfg");
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
	var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].T_id==id)
         {
          r=i;
         }	
      }
      var editor1 = CKEDITOR.instances.testo;
      if( editor1.mode == 'wysiwyg' )
      {
                  editor1.insertHtml(obj1[0][r].Content);
      }
	 $('#photo').attr('src', '<?php echo base_url().'uploads/Testimonial/'?>'+obj1[0][r].Image+' ');
	 $('#photo').show();
     
     $('#nm').val(obj1[0][r].Name);
	 j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
}


 function val1()
 { 
    document.frm.submit();
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
 
 function search_data()
{
            //j('#nm1').val(j('#nm').val());
            j('#cnm1').val(j('#cnm').val());
            //j('#auth').val(j('#fran').val()); 
            j('#pindex').val(1);
            j('#hfield').submit();

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
                                <li class="active btn btn-success" id="t1"><a href="#tab1-1" data-toggle="tab" style="color: #ffffff;">View Testiominal <i data-feather="eye"></i></a></li>
                                <li id="t2" class="btn btn-primary" style="margin-left: 10px;"><a href="#tab1-2" data-toggle="tab" style="color: #ffffff;">Add Testiominal <i data-feather="plus"></i></a></li>
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
                                                    <th class="text-center" width="1%">Id</th>                                             
                                                    <th width="5%">Name</th>
                                                    <th width="5%">Image</th>
                                                    <th width="5%">Contents</th>                                                 
                                                    <th class="text-center" width="5%">Actions</th>
                                                </tr>
                                            </thead>
                                            <script>
                                                var jArray=[];
                                                jArray.push(<?php echo json_encode($results); ?>);
                                            </script>
                                            <tbody id="tdata">
                                                <?php if (!empty($results)) { foreach($results as $row) { ?>
                                                <tr>
                                                    <td><?php print $row->T_id; ?></td>
                                                    <td><?php print $row->Name; ?></td>             
                                                    <td style="padding: 9px;"><img src="<?php echo base_url(); ?>uploads/Testimonial/<?php echo $row->Image; ?>" style="height:115px; width:192px;border-radius: 5px;"></td>
                                                    <td style="text-align: justify; line-height: 1.2; margin: 0; padding: 0; white-space: normal;">
                                                        <?php 
                                                            $content = strip_tags($row->Content); 
                                                            // Remove any extra spaces or line breaks within the content
                                                            $content = preg_replace('/\s+/', ' ', $content); // This replaces multiple spaces with a single space
                                                            
                                                            $shortContent = substr($content, 0, 90); 
                                                            if (strlen($content) > 90) { 
                                                                $shortContent .= '...'; 
                                                            } 
                                                            echo $shortContent; 
                                                        ?>
                                                    </td>   
                                                    <td class="text-center">
                                                        <button class="btn btn-primary btn-action mr-1" data-toggle="tooltip"  onclick="Edit(jArray,<?php echo $row->T_id; ?>);">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-action" data-toggle="tooltip" onclick="Delete(<?php echo $row->T_id; ?>);">
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
                                    <h4>Write Your Post</h4>
                                    <form id="formVideo" class="form-horizontal" role="form" action="<?php echo  base_url()."index.php/Testimonial_Data/Insert"; ?>"  enctype="multipart/form-data" method="post" name="frm">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-4">
                                            <input type="text" id="nm" name="nm" class="form-control" required></div>
                                        </div>                                       
                                        
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Image<span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-4">
                                            <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" style="padding-top:0px;"/>
                                            </div>
                                        </div>

                                        <input type="hidden" id="bid" name="bid" value=""/> 

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Testimonial Contents <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea id="testo" name="testo" class="form-control" required></textarea>
                                            </div>
                                        </div> 
                                                                                             
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


 