  <script src="<?php echo base_url(); ?>Style/dist/js/tables-data-tables.js"></script>
 
 <script src="<?php echo base_url();?>Style/dist/js/Jsfordatabindingteemp.js"></script>
 
  <script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>  
  <script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>
 <script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
 <style>
  .label {
    font-family: calibri;
    font-size: 12px;
    font-weight: 100;
    margin-left: 96px;
    margin-top: -17px;
    padding: 4px 12px;
}
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
        .label {
    font-family: calibri;
    font-size: 12px;
    font-weight: 100;
    margin-left: 96px;
    margin-top: -17px;
    padding: 4px 12px;
}
ul li{list-style: none;}

</style>
<style>
#popdata{

	font-size: 12px;
	
}
#popdata td{

	height: 25px;
}

.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 8px 6px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}
table thead th{
  text-align: center;

  }
  td:hover{cursor: pointer;}
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
    border: 1px solid transparent;
    border-radius: 4px;
    margin-bottom: 1px;
    padding: 4px;
}
.unread{
  background-color: #f5f6f7;
}
</style>
<script type="text/javascript">
var j=jQuery.noConflict();
var Frarr =[];
j(document).ready(function(){
	j("#alert1").delay(3200).fadeOut(300);
  j("#alert").delay(3200).fadeOut(300);
  change_noti_stat();
	eachcheck('','loding');
	
   j("#enq").addClass("open");
   j("#se").addClass("active open");

Searchh();

j('[data-rel=datepicker]').datepicker({
        autoclose: true,
        todayHighlight: true
    });

   
   j('#pcont').val(j('#fromdt').val());
   j('#pcont1').val(j('#todate').val());
   j('#fran').val(j('#s').val());
    
  
  

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
            PageSize: 5,
            RecordCount: parseInt(rcount)

        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');
          
            j('#pindex').val(pageindex);
            j('#fromdt').val(j('#pcont').val());
            j('#todate').val(j('#pcont1').val());
            j('#s').val(j('#fran').val());


            j('#hfield').submit();

   });

});

function change_noti_stat()
{
  j.ajax({
      url: '<?php echo base_url(); ?>index.php/Notifications/set_front_new_stud_enq_status',
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

function clickAction(obj) {
    var dt =[];
    var t=j('#storeArrayvalue').val();
    dt=t.split(',');
  
    if(t!="")
    {
      j('#hfield').attr("action", "<?php echo base_url(); ?>/index.php/Notifications/saveFronstudenq1?Action="+obj);
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


</script>


<script>
function Searchh() { 
       var j = jQuery.noConflict(); 
    
       j("#fran").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "<?php echo base_url(); ?>index.php/Admin_search/Getfranname",
                       data: { term: j("#fran").val()},
                      dataType: "json",
                       success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.fran_name,
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
                  j('#fran').val(ui.item.label);
                  return false;
              }
          });
}
function Delete(id)
{
	if(confirm("Are You Sure You Want To Delete It.?"))
	j.ajax({
			url: '<?php echo base_url(); ?>index.php/Student_Data/Delete',
			type: 'POST',
			data:{'action':'DelStud','s_id':id},
			success: function (data) {
				if(data)
				{
				window.location="<?php echo base_url().'index.php/Employee/Student_Enquiry'; ?>"
				}
            },
            error: function () {
            }
        });
}
function convertt(str)
{
  
   j.ajax({
			url: '<?php echo base_url(); ?>index.php/Admin_search/convert_enquiry',
			type: 'POST',
			data:{'id':str},
			success: function (data) {
				var obj=j.parseJSON(data);
				alert(obj['message']);
				window.location="<?php echo base_url().'index.php/Employee/Student_Enquiry'; ?>"
               
            },
            error: function () {
            }
        });
}
function search_data()
{
            j('#pindex').val(1);
            j('#fromdt').val(j('#pcont').val());
            j('#todate').val(j('#pcont1').val());
            j('#s').val(j('#fran').val());
}
</script>
   <div class="container-fluid-md">
     <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">Student Enquiry</a></li>
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
				  <div class="row">
				  <div class="col-md-12" style="margin-bottom:36px;">
				  	 <?php 
                      $arr1=array();
                      $da1=date('Y/m/d');
                      $arr1 =explode("/",$da1); 
                      $arr1=array_reverse($arr1);
                      $str1 =implode($arr1,"/");
                  ?>
			      <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
			      		<input type="text" id="pcont" name="pcont" class="form-control" value="" data-rel="datepicker" placeholder="Search From Date" required/>
			           
			      </div>
			      <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
			      		<input type="text" id="pcont1" name="pcont1" class="form-control" placeholder="Search to Date" data-rel="datepicker" required/>
			      </div>
			      <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
			     		 <input type="text" id="fran" name="fran" class="form-control" placeholder="Search By Center" required/>
			      </div>
			      <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                    <a class="btn btn-primary" onclick="search_data()">
                        <i class="fa fa-search"></i> Search
                    </a>
            </div>
			      </div>
			    </div>
			   
				  <table class="table table-striped">
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
                         
                         
                         
                           
                           <th width="5%">Enq Date</th>
                           <th width="5%">Name</th>
                           <th width="5%">Email</th>
                           <th width="3%">Contact</th>
						               <th width="5%">Subject</th>
                           <th width="5%">Message</th>
                           <th width="5%">Int Franchisee</th>
                           <th width="3%">Status</th>
                           <th width="5%">Delete</th>
                         </tr>
						 </thead>
						 <tbody id="tdata" style="font-size:12px;">
						 <?php 
						 if(!empty($enquiry)){foreach($enquiry as $row)
						  {
						  ?>
						  <tr class="<?php echo $row->n_status; ?>">
              <td><input type="checkbox" id="<?php echo $row->s_id; ?>" onchange="eachcheck(this,'subtitle');"  /></td>
							
						  <td title="<?php print $row->enq_dt; ?>"><?php print $row->enq_dt; ?></td>
							<td title="<?php print $row->name; ?>"><?php print $row->name; ?></td>
							<td title="<?php print $row->email; ?>"><?php print $row->email; ?></td>
							<td title="<?php print $row->contact; ?>"><?php print $row->contact; ?></td>
							<td title="<?php print $row->subject; ?>"><?php print $row->subject; ?></td>
							<td title="<?php print $row->message; ?>"><?php print $row->message; ?></td>
							<td title="<?php print $row->fran_name; ?>"><?php print $row->fran_name; ?></td>
							<td>
								<select name="stat" onchange="convertt(this.value)">
									<option value="Not">Not Active</option>
									<option value="<?php echo $row->s_id; ?>">Active</option>
								</select>
							</td>							
							<td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php echo $row->s_id; ?>);" class="fa fa-trash-o"></i></td>
						</tr>
      					<?php } }else{ ?>
      						<tr>
                        <td colspan="10">
                          <div class="alert alert-info">
                                <strong><?php echo "No todays enquiry found.....!";?></strong>
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
		</div>
        </div>
        </div>
    </div>
   </div>

   <form id="hfield" method="post" action="<?php echo base_url(); ?>index.php/Employee/Student_Enquiry">
      <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
      <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />

      <input type="hidden" id="fromdt" name="fromdt" value="<?php echo $dt['from_date']; ?>" />
      <input type="hidden" id="todate" name="todate" value="<?php echo $dt['to_date']; ?>" />
      <input type="hidden" id="s" name="s" value="<?php echo $dt['center']; ?>" />
      <input type="hidden" id="storeArrayvalue" value="<?php if(isset($dt['storeArrayvalue'])){echo $dt['storeArrayvalue']; } ?>" name="storeArrayvalue"/>
   </form>   