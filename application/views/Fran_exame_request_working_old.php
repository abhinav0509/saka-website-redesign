<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>  
<script src="<?php echo base_url();?>Style/try/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/try/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/> 

<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Style/css/jquery.multiselect.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>Style/js/jquery.multiselect.js"></script>
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
.ui-multiselect {
  padding: 5px 0 7px 4px;
  text-align: left;
}
.ui-multiselect-header {
  margin-bottom: 3px;
  padding: 0px 0 0px 4px;
}
.ui-multiselect{width: 175px;}
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
<script type="text/javascript">
var allobj1;
 var obj1;
 var an = 0;
 var sopt="1";
 var Frarr =[];
 var act;
 var j=jQuery.noConflict();
  j(document).ready(function(){
  
  eachcheck('','loding'); 

  j("#exm_mg").addClass("active open");
  j("#exm_pass").addClass("active");
  j("#alert").delay(3200).fadeOut(300);
  j("#alert1").delay(3200).fadeOut(300);
  

 
 });


</script>

<script>
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
       act="Active";
       j('#hfield').attr("action", "<?php echo base_url(); ?>index.php/Exame_req/generate_password?Action="+act);
       ct=results.split(',');   
       var ottp="<i class='fa fa-check-square-o'></i>&nbsp;"+ct.length; 
       j('.label').html(ottp);
     }
     else
     {
       act="Notactive";
       j('#hfield').attr("action", "<?php echo base_url(); ?>index.php/Exame_req/generate_password?Action="+act);
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
      act=obj;
      j('#hfield').attr("action", "<?php echo base_url(); ?>index.php/Exame_req/generate_password?Action="+act);
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
 td p{
  text-align:justify;
  margin-right:12%;
   width:160px; 
   height: 150px;
   overflow-y: auto;
   }  
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 6px 5px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}
.table thead th{
  text-align: center;
}
.table tbody input
{
   text-align: center;
}
#vdata td{
  text-align: center;
}
.alert {
  padding: 6px;
  margin-bottom: -2px;
  border: 1px solid transparent;
  border-radius: 4px;
  margin-top: 6px;
}
</style>

<script>
function get_detail_order(id)
{
    var acc1="getboth";
    act="Notactive"
    var dts=new Array();
    j("#t1").removeClass("active");
    j("#t2").addClass("active");

   
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
    j("#hfield").attr('action','<?php echo base_url(); ?>index.php/Exame_req/generate_password?Action='+act); 

    j("#UpdateBtn").show();
    j("#CancelBtn").show();
    j("#SaveBtn").hide();
    
    j('#ad').html("");
    j('#ad').html("Delete");

    j('#tdata').empty();
    j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Exame_req/get_req_det',
            type: 'POST',
            data:{'fid':id},
      
            success: function (data) {
              
                 var obj1 = j.parseJSON(data);
                 var obj=obj1['data1'];
                 var sk=obj1['data2'];
				for (i = 0; i < obj.length; i++) {
                  var op="";
                
                   for(j1=0;j1<sk.length;j1++){
                
				   }
					j('#tdata').append("<tr class='trr'><td><input type='checkbox' id="+obj[i].ac_id+" onchange='eachcheck(this,'subtitle');'  /></td><td style='text-align:center;'><input type='text' class='form-control' name='sid[]' value='"+obj[i].stud_id+"' readonly=\"true\" /><input type='hidden' name='fid[]' value='"+obj[i].fid+"' /></td><td><input type='text' class='form-control' name='sname[]' value='"+obj[i].stud_name+"' readonly='true' /></td><td><input type='text' class=\"form-control\" name='edate[]' value='"+obj[i].exame_dt+"' readonly='true' /></td><td><input type='text' class='form-control' name='cname[]' value='"+obj[i].course+"' readonly='true'/></td><td style='display:none;'><input type='hidden' name='hd[]' id='hd' value='"+obj[i].module_id+"' /></td><td><input type='text' class='form-control' name='modu[]' value='"+obj[i].module+"' readonly='true' /></td></tr>");
				   
                }
                
                
            },
            error: function () {
                
            }
        });


}

</script>

  <div class="container-fluid-md">
     
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Request</a></li>
                 <li id="t2" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Generate Password</a></li>
                 <li id="t3" class=""><a href="#tab1-3" data-toggle="tab"><i class="fa fa-book"></i>Active List</a></li>
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
                 
				
           <form id="formVideo" class="form-horizontal" action="<?php echo base_url()."index.php/Exame_req/Insert_request"; ?>"  enctype="multipart/form-data" method="post" name="frm">
           <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="5%">Franchisee Id</th>
                          <th width="5%">Franchisee Name</th>
                          <th width="5%">Total Student</th>
                          <th width="5%">View</th>                          
                        </tr>
                      </thead>
          
                      <tbody id="vdata" style="font-size:12px;">
                          <?php if(!empty($exame)) { foreach($exame as $exm){ ?>
                          <tr>
                             <td><?php echo $exm['fid']; ?></td>
                             <td><?php echo $exm['institute_name']; ?></td>
                             <td><?php echo $exm['Total_stud']; ?></td>
                             <td><a href="javascript:void(0);" onclick="get_detail_order('<?php echo $exm['fid']; ?>')"><i class="fa fa-credit-card" style="font-size:20px;"></i></a></td>  
                          
                          </tr> 
                         
                          <?php } }else{ ?>        
                          <tr>
                          <td colspan="10">
                          <div class="alert alert-info">
                                <strong><?php echo "No student record found.....!";?></strong>
                          </div>
                        </td>
                      </tr> 
                      <?php } ?>       
                      </tbody>
                    </table>
					
                  </div>

                         
                </form>
            </div>
            
            

                <div class="tab-pane" id="tab1-2">
        <form id="hfield" action="<?php echo base_url(); ?>index.php/Franchisee/Book_Order" method="post">
                 
       
               <input type="hidden" id="storeArrayvalue" value="" name="storeArrayvalue"/>  
         
               <input type="hidden" id="fid" name="fid" value="" />
               <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="1%">
                                 <div class="btn-group btn-group-sm btn-group-text-normal ">
                             <span style="white-space: nowrap; background: #fff none repeat scroll 0 0; padding: 2px 9px 1px 10px;" >
                                <input type="checkbox" id="titlechk" onchange="eachcheck(this,'title')"  /> &nbsp;
                                <i class="fa fa-caret-down dropdown-toggle" data-toggle="dropdown" style="cursor:pointer"></i>
                                <ul class="dropdown-menu" role="menu">
                         <!--           <li><a href="javascript:;" onclick="clickpoup('All')">All</a></li>
                                    <li><a href="javascript:;" onclick="clickpoup('None')">None</a></li>-->
                                    <li><a href="javascript:;" onclick="eachcheck(this,'AllNone')">All None</a></li>                                   
                                    <li class="divider"></li>
                                    <li ><a href="javascript:;" onclick="clickAction('Active')">
                                        <i class="fa fa-fw fa-caret-right"></i>Activate
                                        <span class="label label-danger pull-right">0</span></a>
                                    </li>
                                 </ul>
                            </span> 
                             </div>
                          </th>
                          <th width="5%">Student_id</th>
                          <th width="5%">Student Name</th>
                          <th width="5%">Exame Date</th>
                          <th width="5%">Course</th>
                          <th width="5%">Exam Module</th>                          
                        </tr>
                      </thead>
          
                      <tbody id="tdata" style="font-size:12px;">
                        
                      </tbody>
                    </table>
          
                  </div>
          <div id="links">
        </div>
						
						
						  <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="display:none;" id="prelbl">Image Preview
                            </label>
                            <div class="col-sm-8">
                              <img  src="" style="height:142px; width:100%; display:none;" id="photo"/>                                
                              </div>
                          </div>
                        </div>
						
						
						
                       
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Generate Password" name="update" onclick="return val1()"/>

							<input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>
              </form>
                            </div>
                          </div>
               
                
                
                
                
                    
                </div>

                <div class="tab-pane" id="tab1-3">
      
               <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="5%">Franchisee_Name</th>
                          <th width="5%">Student_Name</th>
                          <th width="5%">User Id</th>
                          <th width="5%">Password</th>
                          <th width="5%">Created Date</th>
                          <th width="5%">Valid Upto</th>                          
                        </tr>
                      </thead>
          
                      <tbody id="tdata" style="font-size:12px;">
                          <?php if(!empty($exame1)) {foreach($exame1 as $ex){ ?>
                          <tr>
                            <td><?php echo $ex['institute_name']; ?></td>
                            <td><?php echo $ex['stud_name']; ?></td>
                            <td><?php echo $ex['user_id']; ?></td>
                            <td><?php echo $ex['password']; ?></td>
                            <td><?php echo $ex['cr_dt']; ?></td>
                            <td><?php echo $ex['valid_upto'];?></td>
                          </tr>              
                          <?php } } ?>       
                      </tbody>
                    </table>
          
                  </div>
          <div id="links">
        </div>
            
          
               
                
                
                
                
                    
                </div>
               
              </div>
           </div>
		   
		 
     </div>
   </div>
  