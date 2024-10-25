
 <script src="<?php echo  base_url();?>Style/dist/js/fran_admission1.js"></script> 
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
  text-align: center;

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
        .panel-body-primary {
    background-color: #FFF;
    border-color: #FFF;
    color: inherit;
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

  var j=jQuery.noConflict();
 
  j(document).ready(function(){

  j("#alert").delay(3200).fadeOut(300);
  
  j("#book").addClass("open");
 
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
            PageSize: 8,
            RecordCount: parseInt(rcount)

        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');
          
             j('#pindex').val(pageindex);
             j('#hfield').submit();

   }); 


   

});

function Delete(id,img)
{
    //alert(id);
    if (confirm("Are you sure, you want to Delete It.."))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Download/Delete_Data',
            type: 'POST',
           data:{'image':img,'id':id},
      
            success: function (data) {
        alert("Record Deleted Successfully..");
       
        window.location="<?php echo base_url().'index.php/Franchisee/Download'; ?>"
     
        
            },
            error: function () {
                
            }
        });
}

function download_data(img)
{
    window.location="<?php echo base_url(); ?>index.php/Download/img_download?img="+img 
}


</script>
<style>
 td p{
  text-align:justify;
  margin-right:12%;
   width:160px; 
   height: 30px;
   overflow-y: auto;
   }  
   .col-sm-3 ul{
     width:auto;
   }
   .col-sm-3 ul li{
     width:auto;
     display: inline-block;
   }
   .panel-body {
  padding: 15px;
  border: 1px solid #f5f5f5;
}
.alert {
    padding: 3px;
    margin-bottom: 18px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.label {
    font-family: calibri;
    font-size: 12px;
    font-weight: 100;
    margin-top: -17px;
    padding: 4px 12px;
}
.unread{
  background-color: #f5f6f7;
}
.panel-metric-sm .metric-content {
    min-height: 152px;
    width:165px;
}
.fa-trash-o:hover{cursor: pointer;}
</style>

 
 <script>
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
  <div class="container-fluid-md">
     
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Download</a></li>
                 <li id="t2" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Add Download</a></li>
                 <?php if(isset($message)) { ?>
                 <li class="pull-right">
                        
                        <div class="alert alert-success" id="alert">
                                    <strong><?php echo $message; ?></strong> 
                                </div>
                      
                 </li>
                 <?php } ?>
                 <li class="pull-right">
                        
                        <div class="alert1 alert alert-danger" id="alert1" style="display:none;">
                                    
                        </div>                      
                 </li> 
            </ul>
        <div class="">
              <div class="tab-content">
        <div class="tab-pane active" id="tab1-1">
                <div class="table-responsive">
                      <div class="row">
                          <?php if(!empty($result)){ foreach($result as $res){ ?>
                           <?php
                                $ext=substr($res['Image'],strrpos($res['Image'],'.')+1);
                                if($ext=="jpg")
                                {
                                $img=base_url()."uploads/Download/$res[Image]";
                                }
                                else if($ext=="jpeg")   
                                {
                                $img=base_url()."uploads/Download/$res[Image]";
                                }
                                else if($ext=="png")    
                                {
                                $img=base_url()."uploads/Download/$res[Image]";
                                }
                                else if($ext=="pdf")
                                {
                                $img=base_url()."uploads/pdf.jpg";
                                }
                                else if($ext=="docx")
                                {
                                $img=base_url()."uploads/docs.jpg";
                                }
                                else if($ext=="txt")
                                {
                                 $img=base_url()."uploads/text.jpg";
                                }  
                           ?>
                            <div class="col-sm-6 col-lg-3">
                                <div class="panel panel-metric panel-metric-sm">
                                    <div class="panel-body panel-body-primary" style="width:165px;">
                                        <div class="metric-content metric-icon">
                                      <a href="javascript:;" onclick="download_data('<?php echo $res['Image']; ?>')">
                                         <img src="<?php echo $img ; ?>" style="height:152px; width:165px;"/>  
                                      </a>     
                                      </div>

                                    </div>
                                    <p style="text-align:left;"><?php echo $res['Download_Name']; ?><?php if($fdata->cus_id==$res['cus_id']){ ?><i style="color:#275273;font-size:16px; margin-left:10px;" id="DeleteN" onclick="Delete('<?php echo $res['D_id']; ?>','<?php echo $res['Image']; ?>');" class="fa fa-trash-o" title="Delete Record"></i><?php  } ?></p> 
                                </div>
                            </div>  

                            <?php } } ?>                  

                    </div>
                     <?php if(isset($links)) { ?>
                        <div id="links1" class="pager">
                             <?php echo $links; ?>
                        </div>
                    <?php }?>
        </div> 
      </div>         
            <div class="tab-pane" id="tab1-2">
                 <form id="hfield" action="<?php echo base_url(); ?>index.php/Franchisee/Download" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
                    <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />
                </form>
                
         <form id="formVideo" class="form-horizontal" role="form"  action="<?php echo base_url()."index.php/Download/save_download_data1"; ?>"  enctype="multipart/form-data" method="post" name="frm">
            <div class="panel panel-default">
                    <div class="panel-heading">
          
          <h4 class="panel-title">Download Form</h4>

                      
                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                          
                        </div>
          
          
            </div>
      
      
      <div class="panel-body">
      <div class="col-sm-6" style="margin-top:1%;">
          
       <?php 
         /* $fdata->institute_name;
          $str1=substr($fdata->fran_id,0,-1);
          $frr=substr($fdata->institute_name,0,3);
          $id=$fdata->fran_id."/".$max_id;*/
        ?>          
    
       <input type="hidden" name='max_id' value="<?php //echo $max_id; ?>" />
        

            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Download Caption<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="dname" name="dname" class="form-control" required title="Please Enter Student Name" />
                            </div>
                          </div>
             
               <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">File<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                            <input type="file" id="upload" name="upload[]" multiple onchange="show(this)" class="form-control" style="padding-top:0px;"/>
                            <span class="asterisk">Allowed File Types:- word,pdf,jpg,jpeg,png,txt,gif</span>
                            </div>
                          </div>

            <div class="col-sm-6" style="margin-top:1%;">
            
            
                          <input type="hidden" name="edt" id="edt" />

                          <input type="hidden" id="bid" name="bid" value="" />
             
                           
               <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="" id="prelbl">
                            </label>
                            <div class="col-sm-8">
                              <img  src="<?php echo base_url(); ?>/Style/images/placement/d.png" style="height:150px; width:150px;" id="photo"/>                                
                              </div>
                          </div>
            
            </div>
 </div>
</div>
           
           <div class="panel-footer">
                        <div class="form-group">
                           
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" />
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" />
                              <input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel" />
                            </div>
                              </div>
                          </div>
            
              
              </div>
          </form>           
                
                
                    
                </div>
               
              </div>
           </div>
       
     
     </div>
   </div>
  </div>