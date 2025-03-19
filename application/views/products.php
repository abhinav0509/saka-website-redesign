<script src="<?php echo base_url(); ?>Style/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>Style/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>Style/ckeditor/ckeditor.js"></script> <!-- Ensure CKEditor is loaded -->

<script type="text/javascript">
  var j = jQuery.noConflict();
  j(document).ready(function() {
    j("#products").addClass("open");
    j("#products").addClass("active open");
    CKEDITOR.replace('testo');
    j('#cnm').val(j('#cnm1').val());
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

    j(".page").click(function() {
      var pageindex = j(this).attr('page');
      j('#pindex').val(pageindex);
      j('#cnm1').val(j('#cnm').val());
      j('#hfield').submit();
    });

    // Bind delete product function to delete buttons
    j(".delete-product").click(function() {
      var id = j(this).data('id');
      Delete(id);
    });
  });

  // Search Functionality
  function searchh1() {
    j("#cnm").autocomplete({
      source: function(request, response) {
        j.ajax({
          type: "POST",
          contentType: "application/json; charset=utf-8",
          url: "<?php echo base_url(); ?>index.php/Employee1/get_company_name",
          data: { term: j("#nm").val() },
          dataType: "json",
          success: function(data) {
            response(j.map(data, function(item) {
              return {
                label: item.cname,
                json: item
              };
            }));
          },
          error: function(result) {}
        });
      },
      search: function() { j(this).addClass('working'); },
      open: function() { j(this).removeClass('working'); },
      minLength: 0,
      select: function(event, ui) {
        j('#cnm').val(ui.item.label);
        return false;
      }
    });
  }

  // Delete Product
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

  // Edit Product
  function Edit(obj1, id) {
    // Show the "Add Product" tab and hide the "View Product" tab
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");

    var r = -1;
    // Assuming obj1 is the array of products
    for (var i = 0; i < obj1.length; i++) {
      if (obj1[i].id == id) {
        r = i;
        break;
      }
    }

    if (r !== -1) {
      // Set CKEditor content
      var editor1 = CKEDITOR.instances.testo;
      if (editor1 && editor1.mode == 'wysiwyg') {
        editor1.setData(obj1[r].description);
      }

      // Set form fields with the values
      j('#tit').val(obj1[r].product_name);
      j('#nm').val(obj1[r].capacity);
      j('#doa').val(obj1[r].insertdate);
      j('#bid').val(id);

      // Set image preview
      var imageSrc = '<?php echo base_url(); ?>uploads/Product/' + obj1[r].image;
      $('#upload').attr('src', imageSrc);
      $('#upload').show();

      // Show Update and Cancel buttons
      j("#UpdateBtn").show();
      j("#CancelBtn").show();
      j("#SaveBtn").hide();
    } else {
      alert('Product not found.');
    }
  }

  // Update Product (Form Submit)
  function val1() {
    document.frm.submit();
  }
  
  // Show Image Preview on File Input Change
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
                                <li class="active btn btn-success" id="t1"><a href="#tab1-1" data-toggle="tab" style="color: #ffffff;">View Products <i data-feather="eye"></i></a></li>
                                <li id="t2" class="btn btn-primary" style="margin-left: 10px;"><a href="#tab1-2" data-toggle="modal" data-target="#addProductModal" style="color: #ffffff;">Add Products <i data-feather="plus"></i></a></li>
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
                                                        <button class="btn btn-primary btn-action mr-1" data-toggle="tooltip" onclick="Edit(jArray, <?php echo $row->id; ?>);">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-action delete-product" data-id="<?php echo $row->id; ?>" data-toggle="tooltip">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Add Product Modal -->
<div class="modal fade bd-example-modal-lg" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="margin-top: 96px;">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formVideo" class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="<?php echo  base_url()."index.php/Product/Insert"; ?>">
                    <!-- Product Title -->
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Title <span class="asterisk">*</span></label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" id="tit" name="tit" class="form-control" required>
                        </div>
                    </div>
                    <!-- Capacity -->
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Capacity <span class="asterisk">*</span></label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" id="nm" name="nm" class="form-control" required>                   
                        </div>
                    </div>
                    <!-- Publish Date -->
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publish Date <span class="asterisk">*</span></label>
                        <div class="col-sm-12 col-md-7">
                            <input type="date" id="doa" name="doa" class="form-control" title="Please Select Publish date">
                        </div>
                    </div>
                    <!-- Image -->
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Image<span class="asterisk">*</span></label>
                        <div class="col-sm-12 col-md-7">
                            <input type="file" id="upload" name="upload" class="form-control"/>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description <span class="asterisk">*</span></label>
                        <div class="col-sm-12 col-md-9">
                            <textarea id="testo" name="testo" class="form-control" required></textarea>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group row mb-4">
                        <div class="col-sm-12 col-md-7">
                            <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
