<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/> 
<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
<style type="text/css">
.dataTables_paginate.paging_bootstrap {
    display: none;
}
.dataTables_info {
    display: none;
}
.dataTables_length {
    display: none;
}
.dataTables_filter {
    display: none;
}
table.table thead .sorting::before {
    content: "";
}
table.table thead .sorting_asc::before, table.table thead .sorting_asc_disabled::before {
    content: "";
}
table.table thead .sorting_desc::before, table.table thead .sorting_desc_disabled::before {
    content: "";
}
</style>
<!-- Data Table css End -->

 <style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 8px 6px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}
table thead th{
  text-align: left;

  }
  td fa{cursor:pointer;}
table tbody td{
  font-family: calibri;
  font-size: 13px;
  text-align: center;
}
table tbody td a:hover{
  text-decoration: none;
}
table tbody td{

    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.alert {
    padding: 3px;
    margin-bottom: 18px;
    border: 1px solid transparent;
    border-radius: 4px;
}
  .modal-lg {
    width: 800px;
}
.alert-successs {
    background-color: #fff;
    border-color: #22ad5c;
    color: #000;
}
.alertt {
    padding: 3px;
    margin-bottom: 18px;
    border: 1px solid transparent;
    border-radius: 0px;
}
h3 {
    color: #fff;
    font-size: 19px;
    font-weight: normal;
    line-height: 20px;
    margin: -17px -16px 9px;
}
.thin {
    color: #fff;
    font-weight: 300;
}
.col-sm-7 h4{margin: 10px -17px;}
</style>

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
 
 <style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 4px 5px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}

table thead th{text-align: center; font-weight: normal; font-size: 12px; font-family: callibri; font-weight: normal;}

table tbody td{text-align: center;}

table tbody td{

    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
td:hover{cursor: pointer;}
 </style>

<script>
$(document).ready(function(){
   $("#alert").delay(500).fadeOut(3200);

   var Pageindex = $('#pindex').val();
   var rcount = $('#rcount').val();
   $("#sub_mnu1").val($("#page").val());
   

   if(Pageindex == "")
    Pageindex = 1;

   if(rcount == "")
    rcount = 0;
  
  $(".pager").ASPSnippets_Pager({
            ActiveCssClass: "current",
            PagerCssClass: "pager",
            PageIndex: parseInt(Pageindex),
            PageSize: 6,
            RecordCount: parseInt(rcount)

        });
        
  $(".page").click(function () {
      var pageindex = $(this).attr('page');          
      $('#pindex').val(pageindex);
      $("#page").val($("#sub_mnu1").val());
      $('#hfield').submit();
   });
   
   $("#CancelBtn").click(function(){
	  $("#frm").attr("action","<?php echo base_url() ?>index.php/Mailconfig/mail_insert");
   });
});

function Edit(obj1,id)
{   

    $('#frm').attr("action", "<?php echo base_url().'index.php/Mailconfig/mail_update';?>");
    var r;    
    for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].id==id)
         {
          r=i;
         }  
      }
    $("#bid").val(obj1[0][r].id);      
    $('#email').val(obj1[0][r].email);  
	$("#passw").val(obj1[0][r].paswrd);
    }

function Delete(id,status,obj1){
      if(status=="Active"){
        $("#alert1").html("<strong>You Can't Delete Active Mail</strong>");
        $("#alert1").fadeIn('slow');
        $("#alert1").delay(2000).fadeOut(300);
      }
      else{
         if (confirm("Are you sure, you want to Delete It.."))
            $.ajax({  
                url: '<?php echo base_url(); ?>index.php/Mailconfig/delete_mailconfig',
                type: 'POST',
                data:{'id':id},      
                success: function (data) {
                   var obj=$.parseJSON(data);
                   $("#alert").text(obj.message);
				   $("#alert").show();
                   $("#alert").fadeIn('slow');
                   $("#alert").delay(2000).fadeOut(300);
                   $(obj1).closest('tr').remove();
                },
                error: function () {
                    
                }
            });
      }    
}
  
function change_status(id,str){
    if (confirm("Are you sure, you want to Change Status.."))
        $.ajax({  
            url: '<?php echo base_url(); ?>index.php/Mailconfig/mail_status',
            type: 'POST',
            data:{'id':id,'str':str},      
            success: function (data) {
               var obj=$.parseJSON(data);
               alert(obj.message);
			   window.location = "<?php echo base_url();?>index.php/Admin/mail_configure";
            },
            error: function () {
                
            }
        });
}
</script>

  <div class="container-fluid-md" style="margin-top: -2px;">
     <div class="row">
        <div class="col-md-12" style="padding:16px;padding-top:1px;">
            <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">Configure Mail</a></li>                
                
                 <li class="pull-right">                        
                     <?php if(isset($message)){ ?>
                        <div class="alert alert-success" id="alert"> 
                             <strong><?php echo $message; ?></strong> 
                        </div>                    
                     <?php } ?>     
                 </li>
                
                 <li class="pull-right">
                        
                        <div class="alert1 alert alert-danger" id="alert1" style="display:none;">
                                    
                        </div>                      
                 </li>
        
      </ul>
            <div class="tab-content">
                
                <div class="tab-pane active" id="tab1-1">
                      <form id="hfield" action="<?php echo base_url(); ?>index.php/Admin/mail_configure" method="post">
                        <input type="hidden" name="pindex" id='pindex' value="<?php if(isset($dt['page_index'])){ echo $dt['page_index']; } ?>" />
                        <input type="hidden" name="rcount" id='rcount' value="<?php if(isset($rowcount)){echo $rowcount; } ?>" />
                        <input type="hidden" name="page" id='page' value="<?php if(isset($dt['page'])){echo $dt['page']; } ?>" />
                      </form>

                      <div class="panel panel-default" style="border:1px solid #f6f6f6;">
                        <form role="form" id="frm" action="<?php echo base_url() ?>index.php/Mailconfig/mail_insert" enctype="multipart/form-data" method="post" class="form-horizontal">
                            <div class="panel-heading">
                                <h4 class="panel-title">Configure MailBox</h4>
                                <div class="panel-options">
                                   
                                </div>
                            </div>

                            <div class="panel-body">
                                 <div class="col-sm-6">
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label" for="inputEmail5">Email Id<span class="astericks" style="color:red; padding-left:5px;">*</span></label>
                                              <div class="col-sm-8">
                                                  <input type="text" name="email" id="email" class="form-control" required />
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <label class="col-sm-4 control-label" for="inputEmail5">Password<span class="astericks" style="color:red; padding-left:5px;">*</span></label>
                                              <div class="col-sm-8">
                                                  <input type="text" name="passw" id="passw" class="form-control" required />
                                              </div>
                                          </div>                                                                            
                                              
                                 </div>                                                                                   
                            </div>

                            <div class="panel-footer">
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <input class="btn btn-primary" type="submit" onclick="" value="Save" name="save" id="SaveBtn"/>
                                       <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update"/>
                                       <input class="btn btn-primary " id="CancelBtn" type="reset" value="Cancel" name="cancel"/>
                                    </div>
                                </div>
                            </div>                           
                            <input type="hidden" name="bid" id="bid" /> 
                        </form>

                        <div class="panel-body">
                               <div class="table-responsive">                                  
                        <table id="" class="table table-bordered" style="float:left;">
                            <thead style="background: #0094DE; color: #FFF;">                                  
                                  <th width="10%">Mail Id</th>
                                  <th width="10%">Password</th>
                                  <th width="5%">Status</th>
                                  <th width="8%">Edit</th>
                                  <th width="5%">Delete</th>                                                                   
                            </thead>
                            <script>
                             var jArray=[];
                             jArray.push(<?php echo json_encode($result); ?>);
                            </script>
                            <tbody id="tdata">
                              <?php if(!empty($result)){  foreach($result as $res){ ?>
                              <tr>
                               <td style="text-align:center;"><?php echo $res['email']; ?></td>
                               <td style="text-align:center;"><?php for($i=0; $i<strlen($res['paswrd']); $i++)
							   {
								   echo "*";
							   }								   ?></td>
                               <td style="text-align:center">
								<select name="status" id="status" class="form-control" onchange="change_status('<?php echo $res['id']; ?>',this.value)">
                                        <option <?php if($res['status']=="Active"){ ?>selected="selected"<?php } ?>>Active</option>
                                        <option <?php if($res['status']=="NotActive"){ ?>selected="selected"<?php } ?>>NotActive</option>
                                   </select> 
								</td>
                               <td style="text-align:center;"><i style="color:#275273;font-size:20px;margin-left:10px;" id="EditB" onclick="Edit(jArray,'<?php echo $res['id']; ?>');" class="fa fa-edit" title="Edit Record"></i></td>
                               <td style="text-align:center;"><i style="color:#275273;font-size:20px; margin-left:10px;" id="DeleteN" onclick="Delete('<?php echo $res['id']; ?>','<?php echo $res['status']; ?>',this);" class="fa fa-trash-o" title="Delete Record"></i></td>                               
                              </tr> 
                              <?php } } ?>
                            </tbody>
                        </table>
                        <?php if(isset($links)) { ?>
                          <div class="pager">                             
                              <?php echo $links; ?>
                          </div>
                        <?php }?>
                    </div>
                        </div>

                    </div><!-- Panel-default-->
            </div> 
        </div><!--Col 12-->    

    </div><!--row-->
</div><!-- Container-->        



</div><!--page Containt-->