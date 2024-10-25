 <script src="<?php echo  base_url();?>Style/dist/js/Fran_Enq.js"></script>
 <script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>Style/dist/js/Jsfordatabindingteemp.js"></script>

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
    .label {
    font-family: calibri;
    font-size: 12px;
    font-weight: 100;
    margin-left: 96px;
    margin-top: -17px;
    padding: 4px 12px;
}

  </style>
  <script src="<?php echo base_url(); ?>Style/dist/js/tables-data-tables.js"></script>
 <script>

var j=jQuery.noConflict(); 
	
	var Frarr =[];
    j(document).ready(function(){
      j("#alert1").delay(3200).fadeOut(300);
      j("#alert").delay(3200).fadeOut(300);
     
     change_noti_stat();
     eachcheck('','loding');
	
     j("#enq").addClass("open");
     j("#fee").addClass("active open"); 
   
   j('#cont').val(j('#fromdt').val());
   j('#pcont').val(j('#todate').val());
  // j('#st').val(j('#s').val());
   j('#ctt').val(j('#c').val());
    
    

    

    j('#ctt option').each(function () {
       if (j(this).val() == j('#c').val()) {
             j(this).attr('selected', 'selected');
          }
           
    });
    
    j('#cont').datepicker({
        autoclose: true,
        todayHighlight: true
    });

   j('#pcont').datepicker({
        autoclose: true,
        todayHighlight: true
    });
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
            PageSize: 10,
            RecordCount: parseInt(rcount)

        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');
          alert(pageindex);
            j('#pindex').val(pageindex);
            j('#fromdt').val(j('#cont').val());
             j('#todate').val(j('#pcont').val());
             j('#s').val(j('#st').val());
             j('#c').val(j('#ctt').val());


            j('#hfield').submit();

   });



    j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master',
          type: 'post',
          data: {'action': 'Country'},
          success: function(data) {
           
           var obj = j.parseJSON(data);
           j('#state').append("<option>Select</option>");
           j('#st').append("<option value=''>Select State</option>");
           for(i=0;i<obj.length;i++)
              { 
                j('#state').append("<option value=\""+obj[i].state_id+"\">"+obj[i].name+"</option>");
                j('#st').append("<option value=\""+obj[i].state_id+"\">"+obj[i].name+"</option>");
               }

               j('#st option').each(function () {
       if (j(this).val() == j('#s').val()) {
             j(this).attr('selected', 'selected');
          }
          });
          j('#st').trigger('change');
          
           
    
           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      }); 
       
       j('#state').change(function(){
         j('#city').empty();
         j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/getcity',
          type: 'post',
          data: {'cntid':j(this).val()},
          success: function(data, status) {
           var obj = j.parseJSON(data);
           j('#city').append("<option>Select</option>");
          
           for(i=0;i<obj.length;i++)
              { 
                j('#city').append("<option value=\""+obj[i].city_id+"\">"+obj[i].name+"</option>");
              }
              citychagnge();
                         
           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      }); 
});

       j('#st').change(function(){
         j('#ctt').empty();
         j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/getcity',
          type: 'post',
          data: {'cntid':j(this).val()},
          success: function(data, status) {
           var obj = j.parseJSON(data);
           j('#city').append("<option>Select</option>");
           j('#ctt').append("<option value=''>Select City</option>");
           for(i=0;i<obj.length;i++)
              { 
                j('#ctt').append("<option value=\""+obj[i].city_id+"\">"+obj[i].name+"</option>");
              }
                         
           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      }); 
});

});




function citychange()
{
     j('#city option').each(function () {
       if (j(this).val() == j('#c').val()) {
             j(this).attr('selected', 'selected');
          }

        });
}




 </script>


  <script>
function change_noti_stat()
{
  j.ajax({
      url: '<?php echo base_url(); ?>index.php/Notifications/set_front_franch_enq_status',
      type: 'POST',
      data:{'status':"read"},
      success: function (data) {
        if(data)
        {
          // window.location="<?php echo base_url().'index.php/Admin/Student_Enquiry'; ?>"
        }
            },
            error: function () {
            }
        });
}

function Delete(id)
{
    if (confirm("Are you sure, you want to"))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Franchisee_Data/Delete',
            type: 'POST',
           data:{'action':'delfran','id':id},
      
        success: function (data) {
                var obj=j.parseJSON(data);
                alert(obj.message);
                 if(data)
          				{
          				window.location="<?php echo base_url().'index.php/Employee/Fran_Enquiry'; ?>"
          				}
        
            },
            error: function () {
                
            }
        });
}
  
  function Edit(obj1,id)
{
//alert(id);
    j("#t1").removeClass("active");
    j("#t2").addClass("active");
   
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
	
     var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].id==id)
         {
          r=i;
         }	
      }
     
	 j('#fname').val(obj1[0][r].name);
     j('#insname').val(obj1[0][r].Inst_name);
     j('#add').val(obj1[0][r].Badd);
     j('#mail').val(obj1[0][r].Email);
     j('#cont').val(obj1[0][r].Mobile);
     j('#uname').val(obj1[0][r].username);
     j('#pwd').val(obj1[0][r].password);

     j('#state option').each(function () {
       if (j(this).val() == obj1[0][r].state_id) {
             j(this).attr('selected', 'selected');
          }
           
    });

    j('#state').trigger('change');

      j('#city option').each(function () {
       if (j(this).val() == obj1[0][r].city_id) {
            j(this).attr('selected', 'selected');
          }
    });

      j('#status option').each(function () {
       if (j(this).val() == obj1[0][r].Status) {
            j(this).attr('selected', 'selected');
          }
    });
}

function convertt(str)
{
  
   j.ajax({
      url: '<?php echo base_url(); ?>index.php/Admin/convert_fran_enquiry',
      type: 'POST',
      data:{'id':str},
      success: function (data) {
        var obj=j.parseJSON(data);
        alert(obj['message']);
        window.location="<?php echo base_url().'index.php/Employee/Fran_Enquiry'; ?>"
               
            },
            error: function () {
            }
        });
}
function search_data()
{
            j('#fromdt').val(j('#cont').val());

           j('#todate').val(j('#pcont').val());
           j('#s').val(j('#st').val());
           j('#c').val(j('#ctt').val());

           j('#pindex').val(1);
           j('#hfield').submit();

}

function eachcheck(obj,Status){
   var ct =[];
   var results1=
   SDeachcheck({
      tbodyname: "tdata",            
      eachtitle: obj,  
      titlecheck : 'titlechk',
      clickstatus : Status,
      Hiddendata :  j("#storeArrayvalue").val()          
  });
     j("#storeArrayvalue").val(results1);     
     var results = j("#storeArrayvalue").val();     
     if(results != ""){
       ct=results.split(',');   
       var ottp="<i class='fa fa-check-square-o'></i>&nbsp;"+ct.length; 
       j('.label').html(ottp);
     }
     else
     {
       var ottp="<i class='fa fa-check-square-o'></i>&nbsp;"+0; 
       j('.label').html(ottp);
     }

}

function clickAction(obj) {
    var dt =[];
    var t=j('#storeArrayvalue').val();
    dt=t.split(',');
  
    if(t!="")
    {
      j('#hfield').attr("action", "<?php echo base_url(); ?>/index.php/Notifications/covert_fran_to_active1?Action="+obj);
      j('#hfield').submit();
    }
    else if(t=="")
    {
     
       j('.alert1').show();
       var ottp="<strong>Please Select Record to perform operation</strong>";
       j('.alert1').html(ottp);
       j("#alert1").delay(3200).fadeOut(300);

    }
 }
  
  
  </script>
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
.alert {
    padding: 3px;
    margin-bottom: 18px;
    border: 1px solid transparent;
    border-radius: 4px;
}
  </style>
<style>
#popdata{

	font-size: 12px;
	
}
#popdata td{

	height: 25px;
}
 .panel-body {
  padding: 15px;
  border: 1px solid #f5f5f5;
}
.style1 {font-size: 14px}
.unread{
  background-color: #f5f6f7;
}
</style>

   <div class="container-fluid-md">
     <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Enquiry</a></li>
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
            <div class="tab-content">
                <div class="tab-pane active" id="tab1-1">
                  <div class="table-responsive">
                    <div class="col-md-12" style="margin-bottom:36px;margin-top:-24px;">
               <?php 
                $arr1=array();
                $da1=date('Y/m/d');
                $arr1 =explode("/",$da1); 
                $arr1=array_reverse($arr1);
                $str1 =implode($arr1,"/");
              ?>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
            <input type="cont" id="cont" name="cou" class="form-control" data-rel="datepicker" value="<?php echo $str1; ?>" placeholder="Search From Date" required/>                
            </div>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
              <input type="pcont" id="pcont" name="pcont" class="form-control" data-rel="datepicker" placeholder="Search To Date" required/>           
            </div>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
              <select name="st" id="st" class="form-control">
                   
                     
              </select>
           
            </div>
             <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                <select name="ctt" id="ctt" class="form-control">
  
                </select>
            </div>
             <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                    <a class="btn btn-primary" onclick="search_data()">
                        <i class="fa fa-search"></i> Search
                    </a>
            </div>
          </div>
                    <table id="" class="table table-striped" style="float:left;">
                <thead>
                    <tr style="background-color:#d7dadc;">
                    	
                   	  <th width="1%">
                        
<div class="btn-group btn-group-sm btn-group-text-normal ">
	                           <span style="white-space: nowrap; background: #fff none repeat scroll 0 0;
    padding: 2px 9px 1px 10px;" >
                                <input type="checkbox" id="titlechk" onchange="eachcheck(this,'title')"  /> &nbsp;
                                <i class="fa fa-caret-down dropdown-toggle" data-toggle="dropdown" style="cursor:pointer"></i>
                               
                                <ul class="dropdown-menu" role="menu">
                         <!--           <li><a href="javascript:;" onclick="clickpoup('All')">All</a></li>
                                    <li><a href="javascript:;" onclick="clickpoup('None')">None</a></li>-->
                                     <li><a href="javascript:;" onclick="eachcheck(this,'AllNone')">All None</a></li>                                   
                                    <li class="divider"></li>
                                    <li ><a href="javascript:;" onclick="clickAction('Active')">
                                        <i class="fa fa-fw fa-caret-right"></i>Active
                                        <span class="label label-danger pull-right">0</span></a>
                                    </li>
                                    
                                    <li><a href="javascript:;" onclick="clickAction('Delete')">
                                        <i class="fa fa-fw fa-caret-right"></i>Delete
                                        <span class="label label-danger pull-right">0</span></a>  
                                    </li>
                                </ul>
                            </span> 
                             </div></th>
                    	
                    
				     
                        <th width="10%">Name</th>
                        <th width="10%">Franchisee Name</th>
                        <th width="2%"><span class="style1"></span>State</th>
                        <th width="2%">City</th>
                        <th width="6%">Address</th>
						            <th width="3%">Email</th>
                        <th width="3%">Contact</th>
                        <th width="4%">User Id</th>
                        <th width="3%">Password</th>
            						<th width="2%">Status</th>
            						<th width="4%">Action</th>
                    </tr>
                </thead>
				<script>
                            var jArray=[];
                           jArray.push(<?php echo json_encode($enquiry); ?>);
						   
               </script>
                 <tbody id="tdata" style="font-size:12px;">
                        <?php if(!empty($enquiry)){ foreach($enquiry as $row)
						  {
						  ?>
                    <tr class="<?php echo $row->n_status; ?> ">
                    	
                       
                    	<td><input type="checkbox" id="<?php echo $row->id; ?>" onchange="eachcheck(this,'subtitle');"  /></td>
                        
						
                        <td><?php echo $row->Name; ?></td>
                        <td><?php echo $row->Inst_name; ?></td>
                        <td><?php echo $row->State; ?></td>
                        <td><?php echo $row->City; ?></td>
                        <td><?php echo $row->Badd; ?></td>
                        <td><?php echo $row->Email; ?></td>
                        <td><?php echo $row->Mobile; ?></td>
                        <td><?php echo $row->username; ?></td>
                        <td><?php echo $row->password; ?></td>
						            <td style="text-align:center">
                        <select name="stat" id="stat" onchange="convertt(this.value)"> 
                            <option value="0">Not Active</option>
                            <option value="<?php echo $row->id; ?>">Active</option>   
                        </select>

                        </td>
      					        <td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php echo $row->id; ?>);" class="fa fa-edit"></i><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->id; ?>);" class="fa fa-trash-o"></i></td>
      					
						</tr>
                    <?php
                         } }else{
                         ?>
               <tr>
                        <td colspan="14">
                          <div class="alert alert-info">
                                <strong><?php echo "No todays enquiries found.....!";?></strong>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>

 
                </tbody>
            </table>
             <?php if(isset($links)) { ?>
              <div id="links1" class="pager">
         
          <?php echo $links; ?>
          </div>
          <?php }?>
        </div>
                </div>
				<div class="tab-pane" id="tab1-2">
              <form id="hfield" action="<?php echo base_url()."index.php/Employee/Fran_Enquiry"; ?>" method="post">
                    
                    <input type="hidden" name="pindex" id="pindex" value="<?php echo $dt['page_index']; ?>">
                    <input type="hidden" name="rcount" id="rcount" value="<?php echo $rowcount; ?>">

                    <input type="hidden" name="fromdt" id="fromdt" value="<?php echo $dt['from_date']; ?>">
                    <input type="hidden" name="todate" id="todate" value="<?php echo $dt['to_date']; ?>">
                    <input type="hidden" name="s" id="s" value="<?php echo $dt['state']; ?>">
                    <input type="hidden" name="c" id="c" value="<?php echo $dt['city']; ?>">
                    <input type="hidden" id="storeArrayvalue" value="<?php if(isset($dt['storeArrayvalue'])){echo $dt['storeArrayvalue']; } ?>" name="storeArrayvalue"/> 
                    
              </form> 


               <!--<form id="formfrch" class="form-horizontal" role="form"  action="<?php echo base_url()."index.php/Franchisee/Update"; ?>" method="post">
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Add New Franchisee</h4>
                        <div class="panel-options">
                            <a data-rel="collapse" href="#"><i class="fa fa-fw fa-minus"></i></a>
                            
                        </div>
                    </div>
                    <div class="panel-body">
                     <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputEmail3">Name <span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Name" name="fname" id="fname" class="form-control">
                            </div>
                        </div>
                        
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Institute Name</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Institute Name" id="insname" name="insname" class="form-control">
                              
                            </div>
                        </div>
                        <input type="hidden" id="bid" name="bid" value="" />
                        <input type="hidden" id="nm" name="nm" value="" />
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Address</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Address" id="add" name="add" class="form-control">
                                
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">state</label>
                            <div class="col-sm-8">
                                
                                 <select class="form-control" id="state" name="state">
                                                
                               </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">City</label>
                            <div class="col-sm-8">
                              
                                <select class="form-control" id="city" name="Discipline">
                                                
                                 </select>
                            </div>
                        </div>
        
                        </div>
                        
                        <div class="col-sm-6">
                <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputFirstName3">E-Mail</label>
                            <div class="col-sm-8">
                                <input type="email" placeholder="Mail" id="mail" name="mail" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputLastName3">Mobile</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Contact" id="cont" name="cont" class="form-control">
                            </div>
                        </div>
                                            
                         <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputLastName3">User Name<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="User Name" id="uname" autocomplete="false" name="uname" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputLastName3">Password<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" placeholder="User Name" autocomplete="false" id="pwd" name="pwd" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputLastName3">Status<span class="asterisk">*</span></label>
                            <div class="col-sm-8">
                                <select name="status" id="status" class="form-control">
                                     <option value="0">Not Active</option>
                                     <option value="1">Active</option>
                                </select>
                                
                            </div>
                        </div>
                      </div>  
                       
                    </div>
                    <div class="panel-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <input class="btn btn-primary" type="submit" value="Submit" name="save" id="SaveBtn"/>
                               <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update"/>
                               <input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>
                            </div>
                        </div>
                    </div>
                
            </form>-->
            </div>
                </div>
                </div>
        </div>
        </div>
    </div>
   </div>
