<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>  
<script src="<?php echo base_url();?>Style/try/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/try/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/> 

<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Style/css/jquery.multiselect.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>Style/js/jquery.multiselect.js"></script>
<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
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
 var j=jQuery.noConflict();
  j(document).ready(function(){
  j("#exm_mg").addClass("active open");
  j("#exm_pass").addClass("active");
  j("#alert").delay(3200).fadeOut(300);
   get_stud();
   
   var Pageindex = j('#pindex').val();
   var rcount = j('#rcount').val();
   var ref=j('#refval').val();
   j("#stdd").val(j("#studd").val());
   
   if(ref=="tab2"){
      j("#t1").removeClass('active');
      j("#tab1-1").removeClass('active');

      j("#t2").addClass('active');
      j("#tab1-2").addClass('active');      

   }

   if(Pageindex == "")
    Pageindex = 1;

   if(rcount == "")
    rcount = 0;
  
  j(".Pager").ASPSnippets_Pager({
            ActiveCssClass: "current",
            PagerCssClass: "pager",
            PageIndex: parseInt(Pageindex),
            PageSize: 15,
            RecordCount: parseInt(rcount)

        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');          
             j('#pindex').val(pageindex);             
             j('#refval').val("tab2");
             j("#studd").val($("#stdd").val());
             j('#hfield').submit();

   }); 
 
   
   j(".sname").change(function(){
    var nm= j("#sname").val();	
	j(this).next('.myreplicaSelect').val(nm);
    if(nm!=""){
		  j.ajax({
			  url: '<?php echo base_url(); ?>index.php/Franchisee/getDetail',
			  type: 'POST',
			  data:{'name':nm},
			  success: function(data)
			  {
				  var obj = j.parseJSON(data);
				   for(i=0;i<obj.length;i++)
			{ 
			var d=new Date();  
					d.setMonth(d.getMonth()+1);
			var new_date=d.getFullYear()+"-"+d.getMonth()+"-"+d.getDate();
			
					j("#sid").val(obj[i].stud_id);
					j("#edt").val(new_date);
					j("#cnm").val(obj[i].course_Name);
					j("#mname").val(obj[i].module_name);
					j("#hd").val(obj[i].module_id);
					
					 }
			  },
			  error: function()
			  {
				  
			  }
		  });
	}else{
			console.log($(this).parents());
			$(this).parents().find('input[type="text"]').val("");
	}
	
   });
   
 Search1();

j('input').keydown(function(e) {
   e.preventDefault();
   return false;
});

 });

function Search1() { 
       var j = jQuery.noConflict(); 
    
       j("#stdd").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",                       
                      url: "<?php echo base_url(); ?>index.php/Franchisee/getCourseauto1",
                      data: { term: j("#stdd").val()},
                      dataType: "json",
                      success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.stud_name,
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
                  j('#stdd').val(ui.item.label);
                  return false;
              }
          });
}

function search_data()
{
             j('#pindex').val(1);             
             j('#refval').val("tab2");
             j("#studd").val(j("#stdd").val());
             j('#hfield').submit();
}
</script>
<script>

/******************************New Row Start **************************/

function get_stud()
{
	
	 var str="getstudentname";
            var op="";
            j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Franchisee/get_stud_name1',
            type: 'POST',
            data:{'action':str},
      
            success: function (data) {

                
                 var obj = j.parseJSON(data);
                    for (i = 0; i < obj.length; i++) {
                    op +="<option value='"+obj[i].stud_id+"'>"+obj[i].name+"</option>";
                }
                j('#sname').append(op);
				 j('#snamedup').append(op);

                
            },
            error: function () {
                
            }
        });
	
	
	
}

 function addnewrow()
 {
        var ddl = $('#clone' + an);
        var d=ddl.clone().attr('id', 'clone' + (++an)).insertAfter(ddl);
        var tr1 = j(d).closest('tr').attr('id');  
        j("#" + tr1).find('input#sid').val("");
		j("#" + tr1).find('input#mname').val("");
        j("#" + tr1).find('input#edt').val("");
        j("#" + tr1).find('input#cnm').val("");
		j("#" + tr1).find('input#hd').val("");
       var tt=j("#" + tr1).find('#sname');
        $('#'+tr1).find('#sname option').each(function() {
                
                    if ( $(this).val() == sopt ) {
                        $(this).remove();
                    }
               }); 
j('input').keydown(function(e) {
				   e.preventDefault();
				   return false;
				});
       

   j(".sname").change(function(){
    var nm= j("#sname").val();	
	j(this).next('.myreplicaSelect').val(nm);
    if(nm!=""){
		  j.ajax({
			  url: '<?php echo base_url(); ?>index.php/Franchisee/getDetail',
			  type: 'POST',
			  data:{'name':nm},
			  success: function(data)
			  {
				  var obj = j.parseJSON(data);
				   for(i=0;i<obj.length;i++)
			{ 
			var d=new Date();  
					d.setMonth(d.getMonth()+1);
			var new_date=d.getFullYear()+"-"+d.getMonth()+"-"+d.getDate();
			
					j("#sid").val(obj[i].stud_id);
					j("#edt").val(new_date);
					j("#cnm").val(obj[i].course_Name);
					j("#mname").val(obj[i].module_name);
					j("#hd").val(obj[i].module_id);
					
					 }
			  },
			  error: function()
			  {
				  
			  }
		  });
	}else{
			console.log($(this).parents());
			$(this).parents().find('input[type="text"]').val("");
	}
	
   });

  }    

  function deleterow(obj)
  {
    var tr1 = j(obj).closest('tr').attr('id');
    var t="#"+tr1;
    if(t=="#clone0")
    {

    }
    else
    {
       j("#"+tr1).remove();
    }  

  }   

function check_val(obj,str)
 {

if(str!=""){
     sopt=str;
	 var tr1 = j(obj).closest('tr').attr('id');
 j(obj).next('.myreplicaSelect').val(str);     
  var d=new Date();
           
          
         
         
         

      j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Franchisee/get_stud1',
            type: 'POST',
       		data:{'studid':str},
      
        success: function (data) {
         var obj1=j.parseJSON(data);
         var stud_dt=obj1['data1'];
		     
         var d=new Date();
         d.setMonth(d.getMonth()+1);
         var new_date=d.getFullYear()+"-"+d.getMonth()+"-"+d.getDate();

         j("#" + tr1).find('input#sid').val(stud_dt[0].stud_id);
		 j("#" + tr1).find('input#edt').val(new_date);
         j("#" + tr1).find('input#cnm').val(stud_dt[0].course_Name);
		 j("#" + tr1).find('input#mname').val(stud_dt[0].module_name);
		 //alert(stud_dt[0].module_id);
		 //j("#hd").val(stud_dt[0].module_id);
		 j("#" + tr1).find('input#hd').val(stud_dt[0].module_id);
            },
            error: function () {
                
            }
      });
}
 }


/****************************New Row End*********************************/


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

  <div class="container-fluid-md">
     
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">Send Request</a></li>
                 <li id="t2" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Active List</a></li>
                   <?php if(isset($message)) { ?>
                 <li class="pull-right">
                        
                        <div class="alert alert-success" id="alert">
                            <strong><?php echo $message; ?></strong> 
                        </div>
                      
                 </li>
                 <?php } ?>
           </ul>
				<div class="">
              <div class="tab-content">
			  
			  
			  
                <div class="tab-pane active" id="tab1-1">
                 
				  <!--<div class="row">
               <?php 
                        $arr1=array();
                        $da1=date('Y/m/d');
                        $arr1 =explode("/",$da1); 
                        $arr1=array_reverse($arr1);
                        $str1 =implode($arr1,"/");
                    ?>
    				  
			    </div>-->
           <form id="formVideo" class="form-horizontal" action="<?php echo base_url()."index.php/Exame_req/Insert_request"; ?>"  enctype="multipart/form-data" method="post" name="frm">
           <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr style="background-color:#d7dadc;">
						
						  <th width="4%" id="ad"><a href="javascript:void(0);" onclick="addnewrow()"><i class="fa fa-plus"></i> Add New</a></th>
						
                          <th width="5%">Student Name</th>
                          <th width="5%">Student Id</th>
                          <th width="5%">Exame Date</th>
                          <th width="5%">Course</th>
                          <th width="5%">Exam Module</th>                          
                        </tr>
                      </thead>
          
                      <tbody id="vdata" style="font-size:12px;">
                          <?php //if(!empty($exame)) { foreach($exame as $exm){ ?>
                            <tr id="clone0">
						  
						   <td style="text-align:center;">
								<i class="fa fa-times" style="padding-top:10px;" onclick="deleterow(this)"></i>
							</td>
						  
							<td>
							 <!--- <select class="form-control" id="sname" name="sname[]" onchange="check_val(this,this.value,'<?php echo $fdata->cus_id; ?>')" required title="Select Student Name">---->
							  <select class="form-control sname" id="sname" name="sname[]" onchange="check_val(this,this.value)" required title="Select Student Name">
								<option value="">Select Student</option>
							  </select>
							  <select class="form-control myreplicaSelect" id="snamedup" name="sname1[]"  required title="Select Student Name" style="display: none;">
								<option value="">Select Student</option>
							  </select>	
							 </td>
						  
						  
                          <td>
                             <input type="text" class="form-control" name="sid[]" value="" required  id="sid" />
                          </td>
						
                          <td>
                             <input type="text" class="form-control" name="edate[]" value="" required  id="edt" /></td>
                          <td>
                            
                             <input type="text" class="form-control" name="cname[]" value="" required  id="cnm"/></td> 
                           
                          </td>  
                          <td>
                           
                        
								<input type="text" class="form-control" name="modu[]" id="mname" value="" required >
							   <input type="hidden" name="hd[]" id="hd">
                          </td>

                          </tr> 
                         
                          <?php //} }else{ ?>        
                          <tr>
                         <!-- <td colspan="10">
                          <div class="alert alert-info">
                                <strong><?php echo "No student record found.....!";?></strong>
                          </div>
                        </td>-->
                      </tr> 
                      <?php //} ?>       
                      </tbody>
                    </table>
					
                  </div>

                          <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()"/>
                              <input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>
                             </div>
                          </div>
                </form>
            </div>
            
            

                <div class="tab-pane" id="tab1-2">
                
                 <div class="row">
                   <div class="col-md-12" style="margin-bottom:40px;margin-top:-8px;">
                        <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
                           <input type="cont" id="stdd" name="stdd" class="form-control" placeholder="Search By Student.." required/>                
                        </div>

                        <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                          <a class="btn btn-primary" onclick="search_data()">
                            <i class="fa fa-search"></i> Search
                          </a>
                        </div>
                   </div>
                   </div> 
                
         
               <input type="hidden" name="fid" value="" />
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
                          <tr id="clone0">
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
                      <?php if(isset($links)) { ?>
                         <div id="links1" class="pager">                           
                            <?php echo $links; ?>
                         </div>
                      <?php }?>  
                  </div>
          
						 
               <form id="hfield" action="<?php echo base_url(); ?>index.php/Franchisee/exame_request" method="post">
                    <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
                    <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />
                    <input type="hidden" id="refval" value="<?php echo $dt['refval']; ?>" name="refval"/> 
                    <input type="hidden" id="studd" name="studd" value="<?php echo $dt['std'] ?>" />
               </form>
						
						  <div class="col-sm-6">
						  
						  
						  
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="display:none;" id="prelbl">Image Preview
                            </label>
                            <div class="col-sm-8">
                              <img  src="" style="height:142px; width:100%; display:none;" id="photo"/>                                
                              </div>
                          </div>
                        </div>
						
						
						
                       
                        <!--<div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()"/>

							<input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>

                            </div>
                          </div>-->
               
                
                
                
                
                    
                </div>
               
              </div>
           </div>
		   
		 
     </div>
   </div>
  