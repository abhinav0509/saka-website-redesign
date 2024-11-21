<script>
var obj1;
var j = jQuery.noConflict();
j(document).ready(function(){
    j("#home").addClass("open");
    j("#gallery").addClass("active open");

    /******************************* Image Restriction Code **************************************/
    /*
    function readImage(file) {
        var reader = new FileReader();
        var image = new Image();
        reader.readAsDataURL(file);
        reader.onload = function(_file) {
            image.src = _file.target.result;
            image.onload = function() {
                var w = this.width,
                    h = this.height,
                    t = file.type,
                    n = file.name,
                    s = ~~(file.size / 1024) + 'KB';
                if ((h < 480 && w < 920) || (h < 480) || (w < 920)) {
                    alert(n + "    File Not Supported. Please Upload Images Within 480px Height and 920px Width.");
                    j('#userfile').val("");
                }
            };
            image.onerror = function() {
                alert('Invalid file type: ' + file.type);
            };
        };
    }
    */

    j("#userfile").change(function(e) {
        if (this.disabled) return alert('File upload not supported!');
        var F = this.files;
        if (F && F[0]) {
            for (var i = 0; i < F.length; i++) {
                readImage(F[i]);
            }
        }
    });

    /****************************** End *********************************************************/
});    

// Edit gallery
function Edit(obj1, id) {
    var j = jQuery.noConflict();
    j("#t1").removeClass("active");
    j("#t2").removeClass("active");
    j("#t3").addClass("active");
    j("#tab1-1").removeClass("active");
    j("#tab1-2").removeClass("active");
    j("#tab1-3").addClass("active");
    j("#aid").val(id);
    var r;
    for (i = 0; i < obj1[0].length; i++) {
        if (obj1[0][i].id == id) {
            r = i;
            var str = obj1[0][i].name.split(',');

            for (j = 0; j < str.length; j++) {
                j('#tab1-3').append("<div class='col-md-3' style='margin-top:1%;'><img src='<?php echo base_url(); ?>uploads/Gallery/" + str[j] + "' width='240px' height='140px' style='border:1px solid #000;'/><br/><span class=\"col-sm-offset-5\" style=\"font-size:20px;padding:5px;\"><i class=\"fa fa-trash-o\" onclick=\"deleteimg('" + str[j] + "','" + obj1[0][i].id + "');\"></i></span></div>");
            }
            j('#tab1-3').append("<div class=\"col-sm-6 col-lg-3\"><i class=\"fa fa-plus\" style=\"font-size: 50px; margin: 50px 85px 35px; 35px;\" id=\"more\"></i></div>");
        }
    }

    // Trigger the file input when "Add more" is clicked
    j('#more').click(function() {
        j('#moreimgs').trigger('click');
    });

    j('#moreimgs').change(function() {
        j('#sub').trigger('click');
    });
}

// Delete Image
function deleteimg(name1, id) {
    if (confirm("Are you sure, you want to delete this image?")) {
        j.ajax({
            url: '<?php echo base_url(); ?>index.php/gallry/Deleteimg',
            type: 'POST',
            data: { 'action': 'delimg', 'nm': name1, 'id1': id },
            success: function(data) {
                alert("Image Deleted successfully..");
                if (data) {
                    window.location = "<?php echo base_url().'index.php/Admin/Gallery/'; ?>";
                }
            },
            error: function() {
                alert("Error deleting image.");
            }
        });
    }
}

// Change status (Active/Inactive)
function change_status(id, str) {
    j.ajax({
        url: '<?php echo base_url(); ?>index.php/gallry/change_status',
        type: 'POST',
        data: { 'str': str, 'id': id },
        success: function(data) {
            var obj = j.parseJSON(data);
            alert(obj.message);
        },
        error: function() {
            alert("Error changing status.");
        }
    });
}

// Delete record
function Delete(id) {
    if (confirm("Are you sure, you want to delete this record?")) {
        j.ajax({
            url: '<?php echo base_url(); ?>index.php/gallry/Delete',
            type: 'POST',
            data: { 'action': 'delabt', 'id': id },
            success: function(data) {
                alert("Record Deleted Successfully..");
                if (data) {
                    window.location = "<?php echo base_url().'index.php/Admin/Gallery'; ?>";
                }
            },
            error: function() {
                alert("Error deleting record.");
            }
        });
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
                                <li class="active btn btn-success" id="t1"><a href="#tab1-1" data-toggle="tab" style="color: #ffffff;">View Gallery <i data-feather="eye"></i></a></li>                          
                                <li id="t2" class="btn btn-primary" style="margin-left: 10px;"><a href="#tab1-2" data-toggle="tab" style="color: #ffffff;">Add Gallery <i data-feather="plus"></i></a></li>
                                <li id="t3" class="btn btn-warning" style="margin-left: 10px;"><a href="#tab1-3" data-toggle="tab" style="color: #ffffff;">Edit Gallery <i data-feather="edit"></i></a></li>
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
                                                    <th width="10%">Album Name</th>
                                                    <th width="10%">Image</th>
                                                    <th width="4%">Status</th>
                                                    <th class="text-center" width="4%">Actions</th>
                                                </tr>
                                            </thead>
                                            <script>
                                                var jArray = [];
                                                jArray.push(<?php echo json_encode($enquiry); ?>);
                                            </script>
                                            <tbody id="tdata">
                                                <?php if (!empty($enquiry)) { foreach($enquiry as $row) { ?>
                                                <tr>
                                                    <td id="t"><?php print $row->id; ?></td>
                                                    <?php 
                                                    $x = explode(",", $row->name);
                                                    ?>
                                                    <td><?php echo $row->album_name; ?></td>
                                                    <td><?php echo $row->Name; ?></td>
                                                    <td style="padding: 9px;">
                                                        <img src="<?php echo base_url(); ?>uploads/Gallery/<?php echo $x[0]; ?>" style="height:115px; width:192px;border-radius: 5px;"></img>
                                                    </td>
                                                    <td align="center">
                                                        <select class="" style="width:50%; height:30px; border:1px solid #ccc;" onchange="change_status('<?php echo $row->id; ?>', this.value)" name="galstate" id="galstate">
                                                            <option <?php if($row->status=="Active") { echo "selected=selected"; } ?> >Active</option>
                                                            <option <?php if($row->status=="InActive") { echo "selected=selected"; } ?> >InActive</option>
                                                        </select>   
                                                    </td>        
                                                    <td class="text-center">
                                                        <button class="btn btn-primary btn-sm" id="EditB" onclick="Edit(jArray,<?php echo $row->id; ?>);">
                                                            <i class="far fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-sm" id="DeleteN" onclick="Delete(<?php echo $row->id; ?>);">
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
                                    <h4>Add Gallery</h4>
                                    <form id="formVideo" class="form-horizontal" role="form" action="<?php echo base_url()."index.php/gallry/doupload"; ?>"  enctype="multipart/form-data" method="post" name="frm">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Album Name <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="aname" id="aname" class="form-control" required>
                                            </div>
                                        </div>                                       
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Image<span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-4">
                                                <input name="userfile[]" id="userfile" type="file" multiple="" class="form-control" style="padding-top:0px;"/>
                                            </div>
                                        </div>
                                        <input type="hidden" id="bid" name="bid" value=""/> 
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="radio" id="active" name="active" value="Active">Active
                                                <input type="radio" id="inactive" name="active" value="InActive">InActive
                                            </div>
                                        </div>                                                    

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn"/>
                                                <input class="btn btn-primary " id="UpdateBtn" type="submit" style="display:none;" value="Update" name="update"/>
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
