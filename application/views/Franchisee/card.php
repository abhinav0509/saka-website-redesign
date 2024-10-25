
<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>  
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url();?>Style/dist/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script>
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
  j("#alert").delay(3200).fadeOut(300);
  Search();
  Search1();
  j('#studd').val(j('#stu').val());

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
            PageSize: 7,
            RecordCount: parseInt(rcount)

        });
        
  j(".page").click(function () {
            var pageindex = j(this).attr('page');
          
            j('#pindex').val(pageindex);
            j('#stu').val(j('#studd').val());            
            j('#hfield').submit();

   }); 

  /* $("#upload").change(function (e) {
    if(this.disabled) return alert('File upload not supported!');
    var F = this.files;
    if(F && F[0])
    { 
      for(var i=0; i<F.length; i++)
      {
        //alert(F[i]);
        readImage( F[i] );
      }
   }
});*/
  

});
function readImage(file) {
    var reader = new FileReader();
    var image  = new Image();
  reader.readAsDataURL(file);  
    reader.onload = function(_file) {
        image.src    = _file.target.result;              // url.createObjectURL(file);
        image.onload = function() {
            var w = this.width,
                h = this.height,
                t = file.type,                           // ext only: // file.type.split('/')[1],
                n = file.name,
                s = ~~(file.size/1024) +'KB';
        if((h>150 && w>150) || (h<150 && w<150) )
        {
          alert(n +":-  "+"File Not Supported Please Upload Image Within 150(height) And 150(width)");
          var path = "<?php echo base_url(); ?>uploads/job_card/d.png";
            $('#photo').attr('src', path);
            j('#upload').val("");
        }
        else
        {
                
        }
      };
        image.onerror= function() {
            alert('Invalid file type: '+ file.type);
        };      
    };

}
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
            j('#stu').val(j('#studd').val());
          
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
          window.location="<?php echo base_url().'index.php/Franchisee/Job_card'; ?>"
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
                                  vall: item.stud_id,
                                  cdate: item.course_date,
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
                  j('#code').val(ui.item.vall);
                  j('#edt').val(new_date);
                  

                  var dts=ui.item.cdate.split('-');
                  var dts1=dts[2]+"/"+dts[1]+"/"+dts[0];
                  j('#addate').val(dts1);
                  var data=dts1.split('/');

                  var d=new Date();
                  var d1=new Date();
                  d.setFullYear(parseInt(data[2]));
                  d.setMonth(parseInt(data[1]));
                  d.setDate(parseInt(data[0]));
                  d.setMonth(d.getMonth()+4);
                  var new_date=d.getDate()+"/"+d.getMonth()+"/"+d.getFullYear();
                  
                  var data=new_date.split('/');
                  d1.setFullYear(parseInt(data[2]));
                  d1.setMonth(parseInt(data[1]));
                  d1.setDate(parseInt(data[0]));
                  d1.setDate(d1.getDate()+365);
                  var new_date1=d1.getDate()+"/"+d1.getMonth()+"/"+d1.getFullYear();

                  j("#dt").val(j.datepicker.formatDate("MM yy",d1));

                  return false;
              }
          });
}


function Search1() { 
       var j = jQuery.noConflict(); 
      
       j("#studd").autocomplete({
              source: function (request, response) {
                  j.ajax({
                      type: "POST",
                      
                        url: "<?php echo base_url(); ?>index.php/Jobcard/Getjobstuddata",
                       data: { term: j("#studd").val()},
                      dataType: "json",
                       success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.sname,
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
                  j('#studd').val(ui.item.label);
                  
                  return false;
              }
          });
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
  
</script>


<div class="container-fluid-md">
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Jobcard</a></li>
                 <li id="t2"><a href="#tab1-2" data-toggle="tab">Add Job Card</a></li>
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
              <div class="col-md-12" style="margin-bottom:34px;margin-top:-8px;">
              <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
                  <input type="text" id="studd" name="studd" class="form-control" placeholder="Search By Student" required/>                
              </div>         
            
             <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
                    <a class="btn btn-primary" onclick="search_data()">
                        <i class="fa fa-search"></i> Search
                    </a>
            </div>
            </div>
           </div>
				  
                    <table class="table">
                       <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="5%">Card Id</th>
                          <th width="5%">Franchisee Name</th>
                          <th width="5%">Student Name</th>
                          <th width="5%">Valid Upto</th>
                          <th width="5%">State</th>
                          <th width="5%">City</th>
                          <th width="5%">Image</th>
                          <!--<th width="5%">Action</th>-->
                        </tr>
                      </thead>
					  <script>
					var jArray=[];
					jArray.push(<?php echo json_encode($results); ?>);
					</script>
					<tbody id="tdata" style="font-size:12px;">
           <?php if(!empty($results)){ foreach($results as $res) { ?>
						<tr>
  						<td><?php echo  $res->job_id; ?></td>
  						<td title="<?php echo  $res->fname; ?>"><?php echo  $res->fname; ?></td>
  						<td title="<?php echo  $res->sname; ?>"><?php echo  $res->sname; ?></td>
  						<td title="<?php echo  $res->vupto; ?>"><?php echo  $res->vupto; ?></td>
  						<td title="<?php echo  $res->state; ?>"><?php echo  $res->state; ?></td>
        			<td title="<?php echo  $res->city; ?>"><?php echo  $res->city; ?></td>
              <!--<td><a href="javascript:void(0);"><i class="fa fa-floppy-o" onclick="Edit(jArray,'<?php echo $res->id; ?>')" style="margin-left:10px;font-size:20px;"></i></a></td>-->
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
          <form id="hfield" action="<?php echo base_url(); ?>index.php/Franchisee/Job_card" method="post">
               <input type="hidden" name="pindex" id='pindex' value="<?php echo $dt['page_index']; ?>" />
               <input type="hidden" name="rcount" id='rcount' value="<?php echo $rowcount; ?>" />
               <input type="hidden" name="stu" id='stu' value="<?php echo $dt['stud']; ?>" />         
          </form>            


         <form id="formVideo" class="form-horizontal" role="form" action="<?php echo  base_url()."index.php/Jobcard/save_job"; ?>"  enctype="multipart/form-data" method="post" name="frm">
         <div class="panel panel-default">
                    <div class="panel-heading">
					
					<h4 class="panel-title">Create Job Card</h4>

                      
                          <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                            <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                            
                          </div>
					         </div>
		 
		           <div class="col-sm-4" style="margin-top:1%;">

                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Franchisee Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="fran" name="fran" class="form-control" readonly="true" value="<?php echo $fdetails->institute_name; ?>">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">
                              Student Image<span class="asterisk">*</span>
                            </label>
                            <div class="col-sm-8">
                              <input type="file" id="upload" name="upload" required onchange="show(this)" class="form-control" style="padding-top:0px;" />
                              <!--<span class="asterisk">Please Upload image within 150(height)*150(width)</span>-->
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="" id="prelbl">
                            </label>
                            <div class="col-sm-8">
                              <img  src="<?php echo base_url(); ?>/Style/images/placement/d.png" style="height:150px; width:150px;" id="photo"/>                                
                              </div>
                          </div>
                          
                          <input type="hidden" id="bid" name="bid" value="" />
                          
              </div>
              <div class="col-sm-4" style="margin-top:1%;">

                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Student Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="nm" onkeypress="" name="nm" class="form-control" required/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Admission Date<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                              <input type="text" id="addate" name="addate" class="form-control" readonly="true" data-rel="datepicker"/>
                            </div>
                          </div>
                         
                           
                          
                       
                          
              </div>
              <div class="col-sm-4" style="margin-top:1%;">

                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Student Code<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="code" name="code" class="form-control" readonly="true" required/>
                            </div>
                          </div>
                         
                            <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Valid Upto<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="dt" name="dt" readonly="true" class="form-control" />
                            
                            </div>
                          </div>
                          
                          
                          
                  </div>
                        
          
						<div class="panel-footer">
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()"/>

							<input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>

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