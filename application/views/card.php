<script src="<?php echo base_url();?>Style/js/Jsfordatabindingteemp.js"></script>
<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>  
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>


<script>
var Frarr =[];
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
  j("#alert").delay(3200).fadeOut(300);
  Search();
  Search1();
  j('#fran').val(j('#franch').val());
  j('#cont1').val(j('#fromdt').val());
  j('#pcont').val(j('#todate').val());
  
  j('#cont1').datepicker({
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
            PageSize: 5,
            RecordCount: parseInt(rcount)

        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');
          
            j('#pindex').val(pageindex);
            j('#fran').val(j('#franch').val());
            j('#fromdt').val(j('#cont1').val());            
            j('#todate').val(j('#pcont').val());
            j('#hfield').submit();

   });   

});

 
</script>
<style>
.alert {
    padding: 3px;
    margin-bottom: 18px;
    border: 1px solid transparent;
    border-radius: 4px;
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
        ul li{list-style: none;}

</style>
<script>
 function search_data()
{
            j('#franch').val(j('#fran').val());
            j('#fromdt').val(j('#cont1').val());            
            j('#todate').val(j('#pcont').val());
          
           j('#pindex').val(1);
           j('#hfield').submit();

}

 
 
 function Delete(id)
 {
  if(confirm("Are You Sure You Want To Delete It.?"))
  j.ajax({
      url: '<?php echo base_url(); ?>index.php/Testimonial_Data/Delete',
            type: 'POST',
      data:{'action':'deltesti','T_id':id},
      success: function(data){
         data=data.replace(/"/g, '');
         
         alert("Record Deleted Successfully.?");
          if(data)
          {
          window.location="<?php echo base_url().'index.php/Admin/Testimonial'; ?>"
          }
        
        },
        error: function () {
                
        }
  
  });
 }
 
 

 function Search() { 
       var j = jQuery.noConflict(); 
      
       j("#nm").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      
                        url: "<?php echo base_url(); ?>index.php/Jobcard/GetStuddata",
                       data: { term: j("#nm").val()},
                      dataType: "json",
                       success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.name,
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
                  j('#nm').val(ui.item.label);
               
                  return false;
              }
          });
}


function Search1() { 
       var j = jQuery.noConflict(); 
      
       j("#fran").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      
                        url: "<?php echo base_url(); ?>index.php/Jobcard/Getjobfrandata",
                       data: { term: j("#fran").val()},
                      dataType: "json",
                       success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.fname,
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


function get_pdf_by_cat()
{
    var fdate=j("#cont1").val();
    var todate=j('#pcont').val();
    var fname=j('#fran').val();
	var sd=j('#storeArrayvalue').val();
	j('#fromdt1').val(fdate);
	j('#todate1').val(todate);
	j('#pname').val(fname);
	j('#storedArrayvalue').val(sd);
	j('#pfield').submit();
	//j('#hfield').attr("action", "<?php echo base_url(); ?>index.php/Jobcard/get_Pdf_of_jobcard?fname="+fname);
    //window.location="<?php echo base_url(); ?>index.php/Jobcard/get_Pdf_of_jobcard?fname="+fname;
}

function get_pdf_by_Excell()
{
   var fdate=j("#cont1").val();
    var todate=j('#pcont').val();
    var fname=j('#fran').val();
	var sd=j('#storeArrayvalue').val();
	j('#fromdt2').val(fdate);
	j('#todate2').val(todate);
	j('#pname2').val(fname);
	j('#storedArrayvalue2').val(sd);
	j('#efield').submit();
    //window.location="<?php echo base_url(); ?>index.php/Jobcard/get_Excell_of_jobcard?fdate="+fdate+"&"+"todate="+todate+"&"+"fname="+fname;
}
 
 function val1()
 { 
    
 }
 function Edit(obj1,id) 
{


    j('#formVideo').attr("action", "<?php echo base_url().'index.php/Jobcard/Update_job_card';?>");
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
     var dts=obj1[0][r].admission_dt.split('-');
     var dts1=dts[2]+"/"+dts[1]+"/"+dts[0];
      j('#nm').val(obj1[0][r].sname);
      j('#bid').val(id);
      j('#code').val(obj1[0][r].scode);
      j('#addate').val(dts1);
      j("#dt").val(obj1[0][r].vupto);
      j('#photo').attr('src', '<?php echo base_url().'uploads/job_card/'?>'+obj1[0][r].img+' ');
      j('#photo').show();
      
      j("#upload").attr('required',false);

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
     }
     else
     {
      
     }

}  
  
</script>


<div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Jobcard</a></li>
                 <!--<li id="t2"><a href="#tab1-2" data-toggle="tab">Add Job Card</a></li>-->
                 <?php if(isset($message)) { ?>
                 <li class="pull-right">
                        
                        <div class="alert alert-success" id="alert">
                                    <strong><?php echo $message; ?></strong> 
                                </div>
                      
                 </li>
                 <?php } ?>
               </ul>
              <div class="tab-content">
			 
                <div class="tab-pane active" id="tab1-1">
                 
				  <div class="table-responsive">
				  
				    <div class="row">
              <div class="col-md-12" style="margin-bottom:0px;margin-top:-8px;">
              <div class="col-md-12" style="margin-bottom:36px;">
               <?php 
              $arr1=array();
              $da1=date('Y/m/d');
              $arr1 =explode("/",$da1); 
              $arr1=array_reverse($arr1);
              $str1 =implode($arr1,"/");
              

             
          ?>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                 <input type="cont" id="cont1" name="cont1" class="form-control" data-rel="datepicker" value="" placeholder="Search From Date" required/>                
            </div>
            <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                 <input type="pcont" id="pcont" name="pcont" class="form-control" data-rel="datepicker" placeholder="Search To Date" required/>           
            </div>
              <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                  <input type="text" id="fran" name="fran" class="form-control" placeholder="Search By Center" required/>                
              </div>         
             <div class="col-sm-2 pull-right" style="margin-top:0px;margin-bottom:-29px">
                <ul class="pull-right">
                   <li class="pull-right"><a href="javascript:void(0);" title="Download Pdf"><i class="fa fa-file-pdf-o" onclick="get_pdf_by_cat()" style="font-size:28px; margin-left:10px; color:#FF3500;"></i></a></li>
                   <li class="pull-right"><a href="javascript:void(0);" title="Download Excel"><i class="fa fa-file-excel-o" onclick="get_pdf_by_Excell()" style="font-size:28px; height:0px; color:#357ebd; margin-left:10px;"></i></a></li> 
                </ul>
             </div>
             <div class="col-sm-2" style="margin-top:0px;margin-bottom:-29px">
                    <a class="btn btn-primary" onclick="search_data()">
                        <i class="fa fa-search"></i> Search
                    </a>
            </div>
            </div>
            </div>
           </div>
				  
                    <table class="table">
                       <thead>
                        <tr style="background-color:#d7dadc;">
						  <th width="1%">                   
									<div class="btn-group btn-group-sm btn-group-text-normal ">
									    <span style="white-space: nowrap; background: #fff none repeat scroll 0 0;padding: 2px 9px 1px 10px;" >
												<input type="checkbox" id="titlechk" onchange="eachcheck(this,'title')"  /> &nbsp;
										</span> 
									</div>
						  </th>
                          <th width="5%">Card Id</th>
                          <th width="5%">Franchisee Name</th>
                          <th width="5%">Student Name</th>
                          <th width="5%">Valid Upto</th>
                          <th width="5%">State</th>
                          <th width="5%">City</th>
                          <th width="5%">Entry Date</th>
                          <th width="5%">Action</th>
                        </tr>
                      </thead>
					<script>
					var jArray=[];
					jArray.push(<?php echo json_encode($results); ?>);
					</script>
					<tbody id="tdata" style="font-size:12px;">
           <?php if(!empty($results)){ foreach($results as $res) { ?>
					<tr>
						<td><input type="checkbox" id="<?php echo $res->id; ?>" onchange="eachcheck(this,'subtitle');"  /></td>
  						<td><?php echo  $res->job_id; ?></td>
  						<td title="<?php echo  $res->fname; ?>"><?php echo  $res->fname; ?></td>
  						<td title="<?php echo  $res->sname; ?>"><?php echo  $res->sname; ?></td>
  						<td title="<?php echo  $res->vupto; ?>"><?php echo  $res->vupto; ?></td>
  						<td title="<?php echo  $res->state; ?>"><?php echo  $res->state; ?></td>
						<td title="<?php echo  $res->city; ?>"><?php echo  $res->city; ?></td>
						<td title="<?php echo $res->entry_dt; ?>"><?php echo $res->entry_dt; ?></td>
						<td><img src='<?php echo base_url(); ?>uploads/job_card/<?php echo $res->img; ?>' style="height:77px; width:75px;" /></td>
					</tr>
            <?php } } ?>
					
						
                    </tbody>
                    </table>
                    <?php if(isset($links)){ ?>
					<div id="links1" class="pager">
							<?php echo $links; ?>
          <?php } ?>
					</div>
                  </div>
				  
                </div>

                <div class="tab-pane" id="tab1-2">
          <form id="hfield" action="<?php echo base_url(); ?>index.php/Admin/job_card" method="post">
               <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
               <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />
               <input type="hidden" name="fromdt" id='fromdt' value="<?php echo $dt['fromdate']; ?>" />
               <input type="hidden" name="todate" id='todate' value="<?php echo $dt['todate']; ?>" />
               <input type="hidden" name="franch" id='franch' value="<?php echo $dt['fran']; ?>" />
               <input type="hidden" id="storeArrayvalue" value="<?php if(isset($dt['storeArrayvalue'])){echo $dt['storeArrayvalue']; } ?>" name="storeArrayvalue"/> 			   
          </form> 
		  
          <form id="pfield" action="<?php echo base_url(); ?>index.php/Jobcard/get_Pdf_of_jobcard" method="post">
               <input type="hidden" name="fromdt1" id='fromdt1' value="" />
               <input type="hidden" name="todate1" id='todate1' value="" />
               <input type="hidden" name="pname" id='pname' value="" />
               <input type="hidden" id="storedArrayvalue" value="" name="storedArrayvalue"/> 			   
          </form>

		  <form id="efield" action="<?php echo base_url(); ?>index.php/Jobcard/get_Excell_of_jobcard" method="post">
               <input type="hidden" name="fromdt2" id='fromdt2' value="" />
               <input type="hidden" name="todate2" id='todate2' value="" />
               <input type="hidden" name="pname2" id='pname2' value="" />
               <input type="hidden" id="storedArrayvalue2" value="" name="storedArrayvalue2"/> 			   
          </form>		  
                   
                </div>
               
              </div>
           </div>
     </div>
   </div>