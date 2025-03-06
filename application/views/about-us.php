<script src="<?php echo base_url(); ?>Style/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>Style/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>Style/ckeditor/ckeditor.js"></script> <!-- Ensure CKEditor is loaded -->

<script>
 var j = jQuery.noConflict(); 
 j(document).ready(function() {
    j("#Habout").addClass("active open");
    j("#Habout").addClass("active");
    CKEDITOR.replace('content');
    CKEDITOR.replace('values');
    CKEDITOR.replace('mission');
    CKEDITOR.replace('vission');
});

function val() {
    j("#formVideo").validate({
        rules: {
            content: "required", 
            values: "required",
            mission: "required",
            vission: "required",
            upload: "required"
        },
        messages: {
            content: "Please Fill The Information",
            values: "Please Fill The Information",
            mission: "Please Fill The Information",
            vission: "Please Fill The Information",
            upload: "Please Fill The Information"
        }
    });
}

function Edit(obj1, id) {
    $('#state1').hide();
    $('#city1').hide();
    $('#fran').hide();

    j("#t1").removeClass("active");
    j("#t2").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");

    var r;
    for (i = 0; i < obj1[0].length; i++) {
        if (obj1[0][i].id == id) {
            r = i;
        }
    }
    var editor1 = CKEDITOR.instances.content1;
    var editor2 = CKEDITOR.instances.values;
    var editor3 = CKEDITOR.instances.mission;
    var editor4 = CKEDITOR.instances.vission;
    if (editor1.mode == 'wysiwyg') {
        editor1.insertHtml(obj1[0][r].About_Content);
    }
    if (editor2.mode == 'wysiwyg') {
        editor2.insertHtml(obj1[0][r].values);
    }
    if (editor3.mode == 'wysiwyg') {
        editor3.insertHtml(obj1[0][r].mission);
    }
    if (editor4.mode == 'wysiwyg') {
        editor4.insertHtml(obj1[0][r].vission);
    }
    $('#photo').attr('src', '<?php echo base_url().'uploads/About/'?>' + obj1[0][r].image);
    $('#photo').show();

    j('#bid').val(id);
    j("#UpdateBtn").show();
    j("#CancelBtn").show();
    j("#SaveBtn").hide();
}

function Delete(id) {
    if (confirm("Are you sure, you want to delete?")) {
        j.ajax({
            url: '<?php echo base_url(); ?>index.php/About/Delete',
            type: 'POST',
            data: {'action': 'delabt', 'id': id},
            success: function(data) {
                data = data.replace(/"/g, '');
                if (data) {
                    window.location = "<?php echo base_url().'index.php/Admin/about'; ?>";
                }
            },
            error: function() {
                alert('Error while deleting.');
            }
        });
    }
}

function show(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#photo').attr('src', e.target.result);
            $('#photo').show();
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<style>
    td p {
        text-align: justify;
        margin-right: 12%;
        width: 160px;
        height: 150px;
        overflow-y: auto;
        width: 12%;
    }
    #DeleteN:hover {
        cursor: pointer;
    }
    #EditB {
        cursor: pointer;
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
                                <li class="active btn btn-success" id="t1"><a href="#tab1-1" data-toggle="tab" style="color: #ffffff;">View About Details <i data-feather="eye"></i></a></li>
                                <li id="t2" class="btn btn-primary" style="margin-left: 10px;"><a href="#tab1-2" data-toggle="tab" style="color: #ffffff;">Add About <i data-feather="plus"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- View About Details Tab -->
                                <div class="tab-pane active" id="tab1-1">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="1%">Id</th>
                                                    <th width="10%" class="thdesign">Content</th>
                                                    <th width="10%" class="thdesign">Mission</th>
                                                    <th width="10%" class="thdesign">Vission</th>
                                                    <th width="10%" class="thdesign">Values</th>
                                                    <th width="5%" class="thdesign">Image</th>
                                                    <th class="text-center" width="4%">Actions</th>
                                                </tr>
                                            </thead>
                                            <script>
                                                var jArray = [];
                                                jArray.push(<?php echo json_encode($results); ?>);
                                            </script>
                                            <tbody id="tdata">
                                                <?php if (!empty($results)) { foreach ($results as $row) { ?>
                                                    <tr>
                                                        <td><?php print $row->id; ?></td>
                                                        <td><?php print $row->About_Content; ?></td>
                                                        <td><?php print $row->mission; ?></td>
                                                        <td><?php print $row->vission; ?></td>
                                                        <td><?php print $row->values; ?></td>
                                                        <!-- <td></td> -->
                                                        <td style="padding: 9px;"><img src="<?php echo base_url(); ?>uploads/About/<?php echo $row->image; ?>" style="height:115px; width:192px;border-radius: 5px;"></td>
                                                        <!-- <td style="text-align: justify; line-height: 1.2; margin: 0; padding: 0; white-space: normal;">
                                                            <?php 
                                                                $content = strip_tags($row->Content); 
                                                                $content = preg_replace('/\s+/', ' ', $content); // Replace multiple spaces with a single space
                                                                $shortContent = substr($content, 0, 90); 
                                                                if (strlen($content) > 90) { 
                                                                    $shortContent .= '...'; 
                                                                } 
                                                                echo $shortContent; 
                                                            ?>
                                                        </td> -->
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

                                <!-- Add About Tab -->
                                <div class="tab-pane" id="tab1-2">
                                    <h4>Write Your Post</h4>
                                    <form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/About/about"; ?>" enctype="multipart/form-data" method="post" name="frm">
                                    <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-4">
                                                <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" style="padding-top:0px;"/>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About Us Content <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea id="content" class="form-control" placeholder="Enter Contents ..." name="content" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mission <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea id="mission" name="mission" rows="1" cols="34" required></textarea>                   
                                            </div>
                                        </div>                                       
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Vission <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea id="vission" name="vission" rows="1" cols="34" required></textarea>
                                            </div>
                                        </div>

                                        <input type="hidden" id="bid" name="bid" value=""/> 

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Values <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <textarea id="values" class="form-control" placeholder="Enter Contents ..." name="values" required></textarea>
                                            </div>
                                        </div> 

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                                                <input class="btn btn-primary " id="UpdateBtn" type="submit" style="display:none;" value="Update" name="update" onclick="return val()"/>
                                                <input class="btn btn-primary " id="CancelBtn" type="submit" style="display:none;" value="Cancel" name="cancel"/>
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
