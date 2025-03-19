<style>
    /* Styling the select dropdown */
    .custom-select {
        width: 120px;
        height: 40px;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 5px 10px;
        background-color: #f9f9f9;
        font-size: 14px;
    }

    /* Styling for 'Active' option */
    .active-option {
        color: green;
        background-color: #d4f7d4; /* light green background */
    }

    /* Styling for 'InActive' option */
    .inactive-option {
        color: red;
        background-color: #f7d4d4; /* light red background */
    }

    /* Hover effect for the select dropdown */
    .custom-select:hover {
        border-color: #888;
    }

    /* Hover effect for the options */
    .custom-select option:hover {
        background-color: #e9e9e9;
    }
</style>

<script>
    var j = jQuery.noConflict();
    j(document).ready(function() {
        j("#home").addClass("open");
        j("#gallery").addClass("active open");

        // Image upload restriction code
        j("#userfile").change(function(e) {
            if (this.disabled) return alert('File upload not supported!');
            var F = this.files;
            if (F && F[0]) {
                for (var i = 0; i < F.length; i++) {
                    var file = F[i];
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
                            if ((h < 350 && w < 350) || (h < 350) || (w < 350)) {
                                alert(n + " File Not Supported. Please Upload Images Within 350px Height and 350px Width.");
                                j('#userfile').val("");
                            }
                        };
                        image.onerror = function() {
                            alert('Invalid file type: ' + file.type);
                        };
                    };
                }
            }
        });

        // Edit gallery functionality
        window.Edit = function(obj1, id) {
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

            // Trigger file input when "Add more" is clicked
            j('#more').click(function() {
                j('#moreimgs').trigger('click');
            });

            j('#moreimgs').change(function() {
                j('#sub').trigger('click');
            });
        };

        // Delete image
        window.deleteimg = function(name1, id) {
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
        };

        // Change status (Active/Inactive)
        window.change_status = function(id, str) {
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
        };

        // Delete record
        window.Delete = function(id) {
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
        };
    });
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
                                <!-- <li id="t3" class="btn btn-warning" style="margin-left: 10px;"><a href="#tab1-3" data-toggle="tab" style="color: #ffffff;">Edit Gallery <i data-feather="edit"></i></a></li> -->
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- View Gallery Tab -->
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
                                            <tbody id="tdata">
                                                <?php if (!empty($enquiry)) { foreach($enquiry as $row) { ?>
                                                <tr>
                                                    <td><?php print $row->id; ?></td>
                                                    <?php $x = explode(",", $row->name); ?>
                                                    <td><?php echo $row->album_name; ?></td>                    
                                                    <td>
                                                        <img src="<?php echo base_url(); ?>uploads/Gallery/<?php echo $x[0]; ?>" style="height:115px; width:192px;border-radius: 5px;">
                                                    </td>
                                                    <td>
                                                        <select onchange="change_status('<?php echo $row->id; ?>', this.value)" class="custom-select">
                                                            <option value="Active" <?php if($row->status == "Active") { echo "selected"; } ?> class="active-option">Active</option>
                                                            <option value="InActive" <?php if($row->status == "InActive") { echo "selected"; } ?> class="inactive-option">InActive</option>
                                                        </select>
                                                    </td>
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

                                <!-- Add Gallery Tab -->
                                <div class="tab-pane" id="tab1-2">
                                    <h4>Add Gallery</h4>
                                    <form id="formVideo" action="<?php echo base_url()."index.php/gallry/doupload"; ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-md-3">Album Name <span class="asterisk">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" name="aname" id="aname" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Image <span class="asterisk">*</span></label>
                                            <div class="col-md-4">
                                                <input name="userfile[]" id="userfile" type="file" multiple class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Status <span class="asterisk">*</span></label>
                                            <div class="col-md-7">
                                                <input type="radio" name="active" value="Active" required> Active
                                                <input type="radio" name="active" value="InActive" required> InActive
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-7">
                                                <input type="submit" class="btn btn-primary" value="Save" name="save"/>
                                                <input type="submit" class="btn btn-primary" id="UpdateBtn" style="display:none;" value="Update" name="update"/>
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
