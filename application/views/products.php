<script src="<?php echo base_url(); ?>Style/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>Style/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>Style/ckeditor/ckeditor.js"></script> <!-- Ensure CKEditor is loaded -->

<script type="text/javascript">
  var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
    j("#products").addClass("open");
    j("#products").addClass("active open");
    CKEDITOR.replace( 'testo');
    j('#cnm').val(j('#cnm1').val());
    // j(".td_text").slimscroll({
    // height: '70px',
    // wheelStep: 1
    // });
    // Datepicker initialization
    // var dt = new Date();
    // j('#doa').datepicker({
    //     autoclose: true,
    //     todayHighlight: true,
    //     dateFormat: 'dd-mm-yy',
    //     todayBtn: "linked", // Optional: Adds a "Today" button
    //     clearBtn: true, // Optional: Adds a "Clear" button
    //     orientation: "bottom left", // Optional: Aligns the datepicker
    //     onSelect: function(dateText) {
    //         getDuration(); // Your custom function on date selection
    //     }
    // });

    // Your pagination and autocomplete code
    searchh1();
    var Pageindex = j('#pindex').val();
    var rcount = j('#rcount').val();

    if (Pageindex == "") Pageindex = 1;
    if (rcount == "") rcount = 0;

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

function Delete(id) {
    if (confirm("Are You Sure You Want To Delete It.?")) {
      j.ajax({
        url: '<?php echo base_url(); ?>index.php/Product/Delete',
        type: 'POST',
        data: { 'action': 'delblog', 'id': id },
        success: function(data) {
          data = data.replace(/"/g, '');
          alert("Record Deleted Successfully.");
          if (data) {
            window.location = "<?php echo base_url() . 'index.php/Admin/Products'; ?>";
          }
        },
        error: function() {
          alert("Error deleting record.");
        }
      });
    }
  }
 
//  function Edit(obj1,id)
// {
// 	//alert("fsgfg");
//     j("#t1").removeClass("active");
//     j("#t2").addClass("active");
//     j("#tab1-1").removeClass("active");
//     j("#tab1-2").addClass("active");
// 	var r;
//       for(i=0;i<obj1[0].length;i++)
//       {
//          if(obj1[0][i].T_id==id)
//          {
//           r=i;
//          }	
//       }
//       var editor1 = CKEDITOR.instances.testo;
//       if( editor1.mode == 'wysiwyg' )
//       {
//                   editor1.insertHtml(obj1[0][r].Content);
//       }
// 	 $('#photo').attr('src', '<?php echo base_url().'uploads/Blog/'?>'+obj1[0][r].Image+' ');
// 	 $('#photo').show();
//    $('#tit').val(obj1[0][r].Title);
//    $('#nm').val(obj1[0][r].Name);
// 	 j('#bid').val(id);
//      j("#UpdateBtn").show();
//      j("#CancelBtn").show();
//      j("#SaveBtn").hide();
// }

function Edit(obj1, id) {
    // Show the "Add Blog" tab and hide the "View Blog" tab
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");

    // Search for the specific blog by its id
    var r;
    for (var i = 0; i < obj1[0].length; i++) {
        if (obj1[0][i].id == id) {  // Ensure we're matching the right ID
            r = i;
            break;
        }
    }

    // If the blog with the given ID was found
    if (r !== undefined) {
        var editor1 = CKEDITOR.instances.testo;

        // Insert content into CKEditor if it's in 'wysiwyg' mode
        if (editor1 && editor1.mode == 'wysiwyg') {
            editor1.setData(obj1[0][r].description);
        }

        // Set the form fields with the values from the selected blog
        j('#tit').val(obj1[0][r].product_name);
        j('#nm').val(obj1[0][r].capacity);
        j('#doa').val(obj1[0][r].insertdate); // Assuming 'insertdate' is the publish date
        j('#bid').val(id);

        // Set the image preview
        var imageSrc = '<?php echo base_url(); ?>uploads/Product/' + obj1[0][r].image;
        $('#upload').attr('src', imageSrc);
        $('#upload').show();

        // Show Update button, hide Save button
        j("#UpdateBtn").show();
        j("#CancelBtn").show();
        j("#SaveBtn").hide();
    } else {
        alert('Product not found.');
    }
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
<style>
    .datepicker {
    z-index: 9999 !important;
}
    </style>
    
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav">
                                <li class="active btn btn-success" id="t1"><a href="#tab1-1" data-toggle="tab" style="color: #ffffff;">View Products Details <i data-feather="eye"></i></a></li>
                                <li id="t2" class="btn btn-primary" style="margin-left: 10px;"><a href="#tab1-2" data-toggle="tab" style="color: #ffffff;">Add Products <i data-feather="plus"></i></a></li>
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
                                                    <th width="20%">Product Title</th>
                                                    <th width="10%">Capacity</th>
                                                    <th width="20%">Image</th>
                                                    <th width="20%">Description</th>
                                                    <!-- <th width="4%">Status</th> -->
                                                    <th class="text-center" width="25%">Actions</th>
                                                </tr>
                                            </thead>
                                            <script>
                                                var jArray=[];
                                                jArray.push(<?php echo json_encode($results); ?>);
                                            </script>
                                            <tbody id="tdata">
                                                <?php if (!empty($results)) { foreach($results as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row->id; ?></td>
                                                    <td><?php echo $row->product_name; ?></td>
                                                    <td><?php echo $row->capacity; ?></td>
                                                    <td style="padding: 9px;"><img src="<?php echo base_url(); ?>uploads/Product/<?php echo $row->image; ?>" style="height:115px; width:192px;border-radius: 5px;"></td>
                                                    <td style="text-align: justify; line-height: 1.2; margin: 0; padding: 0; white-space: normal;">
                                                        <?php 
                                                            $content = strip_tags($row->description); 
                                                            // Remove any extra spaces or line breaks within the content
                                                            $content = preg_replace('/\s+/', ' ', $content); // This replaces multiple spaces with a single space
                                                            
                                                            $shortContent = substr($content, 0, 90); 
                                                            if (strlen($content) > 90) { 
                                                                $shortContent .= '...'; 
                                                            } 
                                                            echo $shortContent; 
                                                        ?>
                                                    </td>

                                                    <!-- <td><?php echo $row->insertdate; ?></td> -->
                                                    <td class="text-center">
                                                        <button class="btn btn-primary btn-action mr-1" data-toggle="tooltip"  onclick="Edit(jArray,<?php echo $row->id; ?>);">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-action" data-toggle="tooltip" onclick="Delete(<?php echo $row->id; ?>);">
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
                                    <form id="formVideo" class="form-horizontal" role="form" action="<?php echo  base_url()."index.php/Blog_Data/Insert"; ?>"  enctype="multipart/form-data" method="post" name="frm">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Name <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" id="tit" name="tit" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Capacity <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-4">
                                            <input type="text" id="nm" name="nm" class="form-control" required>                   </div>
                                        </div>                                       
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publish Date <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-4">
                                            <input type="date"  id="doa" name="doa" onchange="show(this)" class="form-control" title="Pleas Select Publish date">
                                            </div>
                                        </div>               

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Image<span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-4">
                                            <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" style="padding-top:0px;"/>
                                            </div>
                                        </div>

                                        <input type="hidden" id="bid" name="bid" value=""/> 

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description <span class="asterisk">*</span></label>
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
