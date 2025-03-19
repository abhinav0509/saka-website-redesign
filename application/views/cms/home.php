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
    j("#blog").addClass("open");
    j("#blog").addClass("active open");
    CKEDITOR.replace( 'testo');
    j('#cnm').val(j('#cnm1').val());

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

function Delete(id)
 {
	if(confirm("Are You Sure You Want To Delete It.?"))
	j.ajax({
			url: '<?php echo base_url(); ?>index.php/Blog_Data/Delete',
            type: 'POST',
			data:{'action':'delblog','B_id':id},
			success: function(data){
				 data=data.replace(/"/g, '');
				 
				 alert("Record Deleted Successfully.?");
					if(data)
					{
					window.location="<?php echo base_url().'index.php/Admin/Blog'; ?>"
					}
        
				},
				error: function () {
                
				}
	
	});
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
        if (obj1[0][i].B_id == id) {  // Ensure we're matching the right ID
            r = i;
            break;
        }
    }

    // If the blog with the given ID was found
    if (r !== undefined) {
        var editor1 = CKEDITOR.instances.testo;

        // Insert content into CKEditor if it's in 'wysiwyg' mode
        if (editor1 && editor1.mode == 'wysiwyg') {
            editor1.setData(obj1[0][r].Content);
        }

        // Set the form fields with the values from the selected blog
        j('#tit').val(obj1[0][r].Title);
        j('#nm').val(obj1[0][r].Name);
        j('#doa').val(obj1[0][r].insertdate); // Assuming 'insertdate' is the publish date
        j('#bid').val(id);

        // Set the image preview
        var imageSrc = '<?php echo base_url(); ?>uploads/Blog/' + obj1[0][r].Image;
        $('#upload').attr('src', imageSrc);
        $('#upload').show();

        // Show Update button, hide Save button
        j("#UpdateBtn").show();
        j("#CancelBtn").show();
        j("#SaveBtn").hide();
    } else {
        alert('Blog not found.');
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
.copyCircleBTN {
  border: 1px solid #555 !important;
  background: #555 !important;
  color: #fff;
  margin-left: 5px;
  width: 30px;
  height: 30px;
  padding: 0;
  line-height: 31px;
  border-radius: 50px;
  vertical-align: middle;
}
.linkedinCircleBTN {
  border: 1px solid #007BB6 !important;
  background: #007BB6 !important;
  color: #fff;
  margin-left: 5px;
  width: 30px;
  height: 30px;
  padding: 0;
  line-height: 31px;
  border-radius: 50px;
  vertical-align: middle;
}
.twitterCircleBTN {
  border: 1px solid #1DA1F2 !important;
  background: #1DA1F2 !important;
  color: #fff;
  margin-left: 5px;
  width: 30px;
  height: 30px;
  padding: 0;
  line-height: 31px;
  border-radius: 50px;
  vertical-align: middle;
}
.fbCircleBTN {
  border: 1px solid #3B5998 !important;
  background: #3B5998 !important;
  color: #fff;
  margin-left: 5px;
  width: 30px;
  height: 30px;
  padding: 0;
  line-height: 31px;
  border-radius: 50px;
  vertical-align: middle;
}
    </style>
    
 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
            <div class="row ">
              <!--<div class="col-xl-3 col-lg-6">-->
              <!--  <div class="card l-bg-green">-->
              <!--    <div class="card-statistic-3">-->
              <!--      <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>-->
              <!--      <div class="card-content">-->
              <!--        <h4 class="card-title"></h4>-->
              <!--        <span></span>-->
              <!--        <div class="progress mt-1 mb-1" data-height="8">-->
              <!--          <div class="progress-bar l-bg-purple" role="progressbar" data-width="25%" aria-valuenow="25"-->
              <!--            aria-valuemin="0" aria-valuemax="100"></div>-->
              <!--        </div>-->
              <!--        <p class="mb-0 text-sm">-->
              <!--          <span class="mr-2"><i class="fa fa-arrow-up"></i> </span>-->
              <!--          <span class="text-nowrap"></span>-->
              <!--        </p>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->
              <!--<div class="col-xl-3 col-lg-6">-->
              <!--  <div class="card l-bg-cyan">-->
              <!--    <div class="card-statistic-3">-->
              <!--      <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>-->
              <!--      <div class="card-content">-->
              <!--        <h4 class="card-title"></h4>-->
              <!--        <span></span>-->
              <!--        <div class="progress mt-1 mb-1" data-height="8">-->
              <!--          <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25"-->
              <!--            aria-valuemin="0" aria-valuemax="100"></div>-->
              <!--        </div>-->
              <!--        <p class="mb-0 text-sm">-->
              <!--          <span class="mr-2"><i class="fa fa-arrow-up"></i> </span>-->
              <!--          <span class="text-nowrap"></span>-->
              <!--        </p>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->
              <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-purple">
                  <div class="card-statistic-3">
                    <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                    <div class="card-content">
                      <h4 class="card-title">Enquiry</h4>
                      <span>10,225</span>
                      <div class="progress mt-1 mb-1" data-height="8">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mb-0 text-sm">
                        <span class="mr-2"><i class="fa fa-arrow-up"></i> </span>
                        <span class="text-nowrap"></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <!--<div class="col-xl-3 col-lg-6">-->
              <!--  <div class="card l-bg-orange">-->
              <!--    <div class="card-statistic-3">-->
              <!--      <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>-->
              <!--      <div class="card-content">-->
              <!--        <h4 class="card-title"></h4>-->
              <!--        <span></span>-->
              <!--        <div class="progress mt-1 mb-1" data-height="8">-->
              <!--          <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25"-->
              <!--            aria-valuemin="0" aria-valuemax="100"></div>-->
              <!--        </div>-->
              <!--        <p class="mb-0 text-sm">-->
              <!--          <span class="mr-2"><i class="fa fa-arrow-up"></i> </span>-->
              <!--          <span class="text-nowrap"></span>-->
              <!--        </p>-->
              <!--      </div>-->
              <!--    </div>-->
              <!--  </div>-->
              <!--</div>-->
            </div>
            <h2 class="section-title"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="width:150px;font-size:16px;">Add Blog <i data-feather="plus"></i></button> </h2>
            <div class="row">
            <?php if(!empty($blog)){ foreach($blog as $row){ ?>  
              <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                  <div class="article-header">
                    <div class="article-image" data-background="<?php echo base_url(); ?>uploads/Blog/<?php echo $row->Image; ?>" style="border-radius: 5px;">
                    </div>
                  </div>
                  <div class="article-details">
                    <div class="article-category"><a href="#">Blog</a>
                      <div class="bullet"></div> <a href="#"><?php echo date('F j, Y', strtotime($row->insertdate)); ?></a>
                    </div>
                    <div class="article-title">
                      <h2><a href="#"><?php echo $row->Title; ?></a></h2>
                    </div>
                    <p><?php echo $row->Content; ?></p>
                    <div class="article-user">
                      <!-- <img alt="image" src="<?php echo base_url();?>assetss/img/users/user-1.png"> -->
                      <div class="article-user-details">
                        <div class="user-detail-name">
                          <a href="#"><?php echo $row->Name; ?></a>
                        </div>
                        <div class="row mt-1 blogShareLinkContainer" style="margin-top: -1.75rem !important; margin-left: 160px;">
                          <a href="javascript:;" class="btn btn-warning btn-circle fbCircleBTN" data-toggle="tooltip" data-placement="top" title="Share On Facebook" onclick=""><i class="fab fa-facebook-f"></i></a>
                          <a href="javascript:;" class="btn btn-warning btn-circle twitterCircleBTN" data-toggle="tooltip" data-placement="top" title="Share On Twitter" onclick=""><i class="fab fa-twitter"></i></a>
                          <a href="javascript:;" class="btn btn-warning btn-circle linkedinCircleBTN" data-toggle="tooltip" data-placement="top" title="Share On Linkedin" onclick=""><i class="fab fa-linkedin-in"></i></a>
                          <a href="javascript:;" class="btn btn-warning btn-circle copyCircleBTN" data-toggle="tooltip" data-placement="top" title="Copy Link" data-value=""><i class="fa fa-fw fa-link"></i></a>
                        </div>                                                 
                      </div>                                    
                    </div>
                  </div>
                </article>
              </div>
              <?php } } else {?>  
                <?php } ?>
            </div>
             <!-- Large modal -->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-lg" style="top: 65px;position: relative;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Add Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form id="formVideo" class="form-horizontal" role="form" action="<?php echo  base_url()."index.php/Blog_Data/Insert"; ?>"  enctype="multipart/form-data" method="post" name="frm">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" id="tit" name="tit" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author Name <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                            <input type="text" id="nm" name="nm" class="form-control" required>                   </div>
                                        </div>                                       
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publish Date <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                            <input type="date"  id="doa" name="doa" onchange="show(this)" class="form-control" title="Pleas Select Publish date">
                                            </div>
                                        </div>               

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Image<span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-7">
                                            <input type="file" id="upload" name="upload" onchange="show(this)" class="form-control" style="padding-top:0px;"/>
                                            </div>
                                        </div>

                                        <input type="hidden" id="bid" name="bid" value=""/> 

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Blog Contents <span class="asterisk">*</span></label>
                                            <div class="col-sm-12 col-md-9">
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
        </section>
      </div>