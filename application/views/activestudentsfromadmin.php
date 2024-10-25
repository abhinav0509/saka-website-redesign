<link href="<?php echo base_url(); ?>/jqgridplugins/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>/jqgridplugins/select2.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/jqgridplugins/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/jqgridplugins/ui.jqgrid.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/jqgridplugins/sweetalert.css" rel="stylesheet">
<!--<link href="<?php echo base_url(); ?>/jqgridplugins/style.css" rel="stylesheet">-->

<style>
.page-content > .container-fluid-md:first-child {
  margin-top: 0;
}
body{
  background: #fff;
}
.ui-jqgrid tr.jqgrow td {
  padding: 6px;
  font-size: 12px;
}
.ui-th-ltr, .ui-jqgrid .ui-jqgrid-htable th.ui-th-ltr {
  border-left: 0 none;
  padding: 0px 10px;
  font-size: 14px;
  background: #4672B9;
  color: #fff;
}
.ui-jqgrid .ui-jqgrid-htable th {
  height: 30px;
  padding: 0 2px 0 2px;
}
#gs_studename {
  height: 24px;
  font-size: 14px;
}
.clearsearchclass {
  display: none;
}
.ui-search-oper {
  display: none;
}
.ui-jqgrid .ui-search-table {
  padding: 0;
  border: 0 none;
  height: 100%;
  width: 100%;
}
.ui-jqgrid .ui-pg-table {
  font-size: 13px;
}
</style>
<div class="container-fluid-md" style="padding: 15px;">
     
     <div class="row">
         <div class="col-xs-4"> 
            <select class="form-control" id="_selectFranchiseeFilter" style="width: 100%">
                <option value="">Select Franchisee</option>
                <?php if(isset($franchisees)){ foreach ($franchisees as $value) { ?>
                      <option value="<?php echo $value['id'] ?>"><?php echo $value["name"] ?></option>
                <?php } } ?>
            </select>
          </div>
     </div>
     <div class="row" style="margin: 0px;padding: 10px 0px">
        <div class="jqGrid_wrapper">
            <table class="table table-bordered table-stripped table-hover" id="table_list_2"></table>
            <div id="pager_list_2"></div>
        </div>
     </div>
</div>
<div class="modal fade" tabindex="1000" id="medicoDoctorCategoryMasterOPModal" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"><i class="fa fa-fw fa-credit-card"></i> Send Student Exam Request </h4>
            </div>
            <form class="form-horizontal form-bordered" id="_sendexamrequestForm" role="form" >
            <div class="modal-body" style="background: #e7e7e7;padding: 10px 15px;padding-bottom: 5px;">                
                <div class="row" style="margin: 0px;">                    
                        <div class="row no-margin" style="padding: 5px 0px;padding-top: 0px;">
                            <div class="col-xs-12 " style="padding: 2px 0px;">
                                <b>Student Name</b>
                            </div>
                            <div class="col-xs-12 " style="padding: 0px 0px;">
                                <input type="text" class="form-control" readonly="true" name="requeststudname" placeholder="Student Name" id="_requeststudname">
                            </div>
                        </div>
                        <div class="row no-margin" style="padding: 5px 0px;">
                            <div class="col-xs-12 " style="padding: 2px 0px;">
                                <b>Franchisee Name</b>
                            </div>
                            <div class="col-xs-12 " style="padding: 0px 0px;">
                               <input type="text" class="form-control" readonly="true" name="requestfranchname" placeholder="Franchisee Name" id="_requestfranchname">
                            </div>
                        </div>
                        <div class="row no-margin medicoDoctorCategoryMasterOPCategorySequenceContainer" style="padding: 5px 0px;">
                            <div class="col-xs-12 " style="padding: 2px 0px;">
                                <b>Selected Course</b>
                            </div>
                            <div class="col-xs-12" style="padding: 0px 0px;">
                                <input type="text" class="form-control" readonly="true" name="requestcoursename" placeholder="Course Name" id="_requestcoursename">
                            </div>
                        </div>
                        <div class="row no-margin medicoDoctorCategoryMasterOPCategorySequenceContainer" style="padding: 5px 0px;">
                            <div class="col-xs-12 " style="padding: 2px 0px;">
                                <b>Select Course Module <span style="color: red;font-size: 14px;">*</span></b>
                            </div>
                            <div class="col-xs-12" style="padding: 0px 0px;">                               
                                <select class="form-control" name="requestcoursemodules" id="_requestcoursemodules" required="required">
                                    <option value="">Select Module</option>
                                </select>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="requeststudid" id="requeststudid" />
                <input type="hidden" name="requesfid" id="requesfid" />
                <button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>


<script src="<?php echo base_url(); ?>jqgridplugins/jquery-2.1.1.js"></script>
<script src="<?php echo base_url(); ?>jqgridplugins/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>jqgridplugins/grid.locale-en.js"></script>
<script src="<?php echo base_url(); ?>jqgridplugins/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>jqgridplugins/jquery.jqGrid.min.js"></script>
<script src="<?php echo base_url(); ?>jqgridplugins/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>jqgridplugins/sweetalert.min.js"></script>
<script>

  $(document).ready(function(){      
      $("#_selectFranchiseeFilter").select2();
      $("#table_list_2").jqGrid({
        url: "<?php echo base_url(); ?>index.php/Admin/studentdataforrequest?franchiseeid="+$("#_selectFranchiseeFilter").val(),
            jsonReader: { root: "gridData",repeatitems: false,repeatitems: false,id: "id",
            total: function (obj) {
                var totalPage =  Math.ceil(obj.totaldata/obj.rows);                
                return totalPage;
            },
            page: function (obj) { return obj.page; },
            records: function (obj) { return obj.totaldata; }
        },
        height:385,
        autowidth: true,
        datatype: "json",
        mtype: "POST",
        rownumbers: true,
        multiselect: false,
        shrinkToFit: false,
        footerrow: false,
        userDataOnFooter: true,
        loadonce: false,
        rownumWidth: 35,
        ignoreCase:true,
        colNames:['ID','Action','Student Name', 'Student ID', 'Course Selected', 'Franchisee'],
        colModel:[
            {name:'id',index:'id', editable: true, width:60, sorttype:"int",search:false},
            {name:'act',index:'act', editable: true, width:60, sorttype:"int",align:"center",search:false},
            {name:'studename',index:'studename', editable: true, width:330,search:true},
            {name:'studid',index:'studid', editable: true, width:150,search:false},
            {name:'coursename',index:'coursename', editable: true, width:230, align:"left",search:false},
            {name:'franchisee',index:'franchisee', editable: true, width:265, align:"left",search:false},
        ],
        gridComplete:  function() {
            var ids = $("#table_list_2").jqGrid('getDataIDs');
            for(var i=0;i < ids.length;i++){
                var cl = ids[i];
                var be = "<i title='Edit' data-toggle='tooltip' data-placement='right'  style='cursor: pointer; width: 20px; padding: 3px 4px 2px;' class='btn btn-outline btn-success  dim fa fa-fw fa-edit' type='button' value='E' onclick=\"editStudRow('" + cl + "')\" />";
                jQuery("#table_list_2").jqGrid('setRowData',ids[i],{act:be}); 
            }
            if(ids.length<=0){                
                if($("#_selectFranchiseeFilter").val()==""){
                  $("#table_list_2").find("tbody").append("<tr style='background: #fff;text-align: center;border: 1px solid #e0e0e0;'><td colspan='"+$("#table_list_2").find("tbody").find(".jqgfirstrow").find("td").length+"'><code style='font-size: 12px;'> Please select franchisee to load data...!</code></td></tr>");
                }else{
                  $("#table_list_2").find("tbody").append("<tr style='background: #fff;text-align: center;border: 1px solid #e0e0e0;'><td colspan='"+$("#table_list_2").find("tbody").find(".jqgfirstrow").find("td").length+"'><code style='font-size: 12px;'> Sorry !! No Data Available.</code></td></tr>");
                }
              }
        },
        editurl:"accounttransactiondelete",
        rowNum: 20,
        rowList: [10, 20, 30, 50],
        pager: "#pager_list_2",
        viewrecords: true,
        //caption: jsonResponse.datatype,
        add: false,
        edit: false,
        addtext: 'Add',
        edittext: 'Edit',
        hidegrid: false
    });

    $("#table_list_2").jqGrid('filterToolbar',{defaultSearch: 'cn', ignoreCase: true,searchOperators : true, stringResult: true, searchOnEnter: true, autosearch: true ,enableClear: false});
    $("#table_list_2").hideCol("id");
    // Setup buttons
    $("#table_list_2").jqGrid('navGrid', '#pager_list_2',
          {edit: false, add: false, del: false, search: false},
          {height: 200, reloadAfterSubmit: true}
    );

    // Add responsive to jqGrid
    $(window).bind('resize', function () {
        var width = $('.jqGrid_wrapper').width();
        $('#table_list_2').setGridWidth(width);
    });

  });
  
  $("#_selectFranchiseeFilter").change(function(){
        $("#table_list_2").jqGrid('setGridParam',{
            url: "<?php echo base_url(); ?>index.php/Admin/studentdataforrequest?franchiseeid="+$("#_selectFranchiseeFilter").val(),
            datatype: "json",
        }).trigger("reloadGrid");
  });

  function editStudRow(sid){
      swal({
          text: "",
          imageSize: "200x100",
          title: "",
          showConfirmButton: false,
          imageUrl: "<?php echo base_url(); ?>jqgridplugins/loader.gif"
      });
      $("#requeststudid").val("");
      $("#requesfid").val("");
      $("#_requeststudname").val("");
      $("#_requestfranchname").val("");
      $("#_requestcoursename").val("");

      $("#_requestcoursemodules").html("");
      $("#_requestcoursemodules").html("<option value=''>Select Module</option>");

      var rowData = $("#table_list_2").jqGrid('getRowData', sid);
      var studid=rowData['studid'];
      var fid=$("#_selectFranchiseeFilter").val();

      var formdata = {};
      formdata.studid = studid;
      formdata.fid = fid;

      $.ajax({
          url: '<?php echo base_url(); ?>index.php/Admin/singleStudentDetails',
          dataType:'json',
          type:'POST',
          data: formdata,
          success: function (responseText) {
              if(responseText.message=="Success"){
                  $("#requeststudid").val(responseText.studid);
                  $("#requesfid").val(responseText.fid);
                  $("#_requeststudname").val(responseText.studname);
                  $("#_requestfranchname").val(responseText.franchisee);
                  $("#_requestcoursename").val(responseText.coursename);

                  $("#_requestcoursemodules").html("");
                  $("#_requestcoursemodules").html("<option value=''>Select Module</option>");
                  $.each(responseText.cources, function(key, value){
                       $("#_requestcoursemodules").append("<option value="+value["qid"]+">"+value["quiz_cat_name"]+"</option>"); 
                  });
                  swal.close();
                  $("#medicoDoctorCategoryMasterOPModal").modal("show");

              }else{
                  swal({
                      title: "Error...!",
                      html:true,
                      text: "Error occured try gain...!",
                      type: "error"                                   
                  });
              }
          },
          error: function(error){
              swal({
                  title: "Error...!",
                  html:true,
                  text: "Error occured try gain...! Please check your internet connection is working",
                  type: "error"                                   
              });
          }
      });
  }

  $("#_sendexamrequestForm").submit(function(event){
      event.preventDefault();
      swal({
          text: "",
          imageSize: "200x100",
          title: "",
          showConfirmButton: false,
          imageUrl: "<?php echo base_url(); ?>jqgridplugins/loader.gif"
      });
      var formData = new FormData($(this)[0]);
      formData.append("selectedcourse",$('#_requestcoursemodules').find('option:selected').text());
      $.ajax({
          url: '<?php echo base_url(); ?>index.php/Admin/sendstudentrequest',
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          enctype: 'multipart/form-data',
          dataType : "json",
          success: function(jsonResponse) {
              window.onkeydown = window.onfocus = null;
              if(jsonResponse.message=="Success"){
                  swal({
                      title: "SUCCESS...!",
                      html:true,
                      text: "Password request suucessfully send.!!! Please activate it from <b>Admin Dashboard</b>",
                      type: "success"                                   
                  },function(){
                      $("#medicoDoctorCategoryMasterOPModal").modal("hide");
                  });
              }else{
                  swal({
                      title: "Error...!",
                      html:true,
                      text: "Error occured try gain...!",
                      type: "error"                                   
                  });
              }
          },
          error: function(error){
              swal({
                  title: "Error...!",
                  html:true,
                  text: "Error occured try gain...! Please check your internet connection is working",
                  type: "error"                                   
              });
          }
      });
  });

  $("#_requestcoursemodules").change(function(){
        swal({
          text: "",
          imageSize: "200x100",
          title: "",
          showConfirmButton: false,
          imageUrl: "<?php echo base_url(); ?>jqgridplugins/loader.gif"
      });
      var formdata = {};
      formdata.studid = $("#requeststudid").val();
      formdata.coursemmodule = $('#_requestcoursemodules').find('option:selected').text(),
      formdata.course = $("#_requestcoursename").val();
      $.ajax({
          url: '<?php echo base_url(); ?>index.php/Admin/checkexamstudentstatus',
          type: 'POST',
          data: formdata,
          dataType : "json",
          success: function(jsonResponse) {
              if(jsonResponse.message=="Success"){
                swal.close();
              }else if(jsonResponse.message=="Exists"){
                  swal({
                      title: "Waning...!",
                      html:true,
                      text: "Student already given selected module exam do you want to activate it for same module again. Its current marks data will lost.",
                      type: "warning"                                   
                  });
              }else{
                  swal({
                      title: "Error...!",
                      html:true,
                      text: "Error occured try gain...!",
                      type: "error"                                   
                  });
              }
          },
          error: function(error){
              swal({
                  title: "Error...!",
                  html:true,
                  text: "Error occured try gain...! Please check your internet connection is working",
                  type: "error"                                   
              });
          }
      });

  }); 
</script>