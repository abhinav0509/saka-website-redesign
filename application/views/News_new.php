<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>Style/ckeditor.js"></script>

<style>
 .pager {
    height: 18px;
    margin: 16px;
}
.pager .page {
    cursor: pointer;
    border: 1px solid;
    margin: 3px;
    padding: 5px;
    background: #E8EEF4;
}
.pager .page:hover {
    cursor: pointer;
    border: 1px solid #1a0f49;
    margin: 3px;
    padding: 5px;
    background: #253544;
    color: #fff;
}
.pager span {
    cursor: pointer;
    border: 1px solid #1a0f49;
    margin: 3px;
    padding: 5px;
    background: #253544;
    color: #fff;
}
</style>

<script>
var j = jQuery.noConflict();
j(document).ready(function () {
    j("#news").addClass("open");

    // Initialize CKEditor for the description field
    CKEDITOR.replace('Desc');
    
    // Initialize date picker
    j('[data-rel=datepicker]').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    var Pageindex = j('#pindex').val() || 1;
    var rcount = j('#rcount').val() || 0;

    j(".Pager").ASPSnippets_Pager({
        ActiveCssClass: "current",
        PagerCssClass: "pager",
        PageIndex: parseInt(Pageindex),
        PageSize: 4,
        RecordCount: parseInt(rcount)
    });

    j(".page").click(function () {
        var pageindex = j(this).attr('page');
        j('#pindex').val(pageindex);
        j('#hfield').submit();
    });
});

function Delete(id) {
    if (confirm("Are you sure, you want to delete this news item?")) {
        j.ajax({
            url: '<?php echo base_url(); ?>index.php/News_Data/Delete',
            type: 'POST',
            data: {action: 'delbook', id: id},
            success: function (data) {
                data = data.replace(/"/g, '');
                if (data) {
                    window.location = "<?php echo base_url().'index.php/Admin/News'; ?>";
                }
            },
            error: function () {
                alert("Error deleting the news item.");
            }
        });
    }
}

function Edit(obj1, id) {
    j("#t1").removeClass("active");
    j("#t2").addClass("active");

    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");

    var r = obj1[0].findIndex(item => item.n_id === id);
    var editor1 = CKEDITOR.instances.Desc;

    if (editor1.mode === 'wysiwyg') {
        editor1.setData(obj1[0][r].Description);
    }

    j('#photo').attr('src', '<?php echo base_url().'uploads/News/'?>' + obj1[0][r].image).show();
    j('#course').val(obj1[0][r].Title);
    j('#publish').val(obj1[0][r].Publish_Date);
    j('#bid').val(id);

    j("#UpdateBtn").show();
    j("#CancelBtn").show();
    j("#SaveBtn").hide();
}

function val() {
    j("#formVideo").validate({
        rules: {
            course: "required",
            upload: "required",
            publish: "required"
        },
        messages: {
            course: "Please fill in the title.",
            upload: "Please upload an image.",
            publish: "Please select a publish date."
        }
    });
}

function show(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            j('#photo').attr('src', e.target.result).show();
        };
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
                                <li class="active btn btn-success" id="t1"><a href="#tab1-1" data-toggle="tab" style="color: #ffffff;">View News <i data-feather="eye"></i></a></li>
                                <li id="t2" class="btn btn-primary" style="margin-left: 10px;"><a href="#tab1-2" data-toggle="tab" style="color: #ffffff;">Add News <i data-feather="plus"></i></a></li>
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
                                                    <th width="4%">Title</th>
                                                    <th width="5%">Image</th>
                                                    <th width="9%">Content</th>
                                                    <th width="5%">Date</th>
                                                    <th class="text-center" width="3%">Actions</th>
                                                </tr>
                                            </thead>
                                            <script>
                                                var jArray = [];
                                                jArray.push(<?php echo json_encode($results); ?>);
                                            </script>
                                            <tbody id="tdata">
                                                <?php if (!empty($results)) { foreach ($results as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $row->Title; ?></td>
                                                        <td style="padding: 9px;"><img src="<?php echo base_url(); ?>uploads/News/<?php echo $row->image; ?>" style="height:115px; width:192px;border-radius: 5px;"></td>
                                                        <td style="text-align: justify; line-height: 1.2; margin: 0; padding: 0;">
                                                            <?php 
                                                                $description = strip_tags($row->Description); 
                                                                $shortContent = substr($description, 0, 100); 
                                                                if (strlen($description) > 100) { 
                                                                    $shortContent .= '...'; 
                                                                } 
                                                                echo $shortContent; 
                                                            ?>
                                                        </td>
                                                        <td><?php echo $row->Publish_Date; ?></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-primary btn-sm" id="EditB" onclick="Edit(jArray,<?php echo $row->n_id; ?>);">
                                                                <i class="far fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-sm" id="DeleteN" onclick="Delete(<?php echo $row->n_id; ?>);">
                                                                <i class="far fa-trash-alt"></i>
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
                                    <h4>Write News and Event Post</h4>
                                    <form id="formVideo1" class="form-horizontal" action="<?php echo base_url()."index.php/News_Data/Insert"; ?>" enctype="multipart/form-data" method="post">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" id="course" name="course" class="form-control" required>
                                            </div>
                                        </div>
                                        <input type="hidden" id="bid" name="bid" value="" />
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" style="padding-top:0px;" required />
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publish Date <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" id="pcont" name="pcont" class="form-control" data-rel="datepicker" required />
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contents <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea id="Desc" name="Desc" class="form-control" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()" />
                                                <input class="btn btn-primary" type="submit" id="UpdateBtn" style="display:none;" value="Update" name="update" onclick="return val()" />
                                                <input class="btn btn-primary" type="button" id="CancelBtn" style="display:none;" value="Cancel" onclick="window.location='<?php echo base_url().'index.php/Admin/News'; ?>'" />
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
