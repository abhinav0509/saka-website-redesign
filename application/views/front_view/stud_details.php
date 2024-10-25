<script type="text/javascript" src="<?php echo base_url();?>Style/New_temp/js/jquery-1.11.1.js"></script> 
<script src="<?php echo base_url();?>Style/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script>  
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
$(document).ready(function(){
    $("#about").removeClass("active");
    $("#home").removeClass("active");
    $("#course").removeClass("active");
    $("#placement").removeClass("active");
    $("#studmnu").addClass("active");
    $("#franmnu").removeClass("active");
    $("#brandmnu").removeClass("active");
    $("#galmnu").removeClass("active");
    $("#cntmnu").removeClass("active");
 });   
</script>
   <style>
   .alert {
      border: 1px solid transparent;
      border-radius: 4px;
      margin-bottom: 20px;
      padding: 4px 18px 5px;
    }
    .alert-success {
    background-color: #d2536b;
    border-color: #d6e9c6;
    color: #fff;
    }
    .ui-menu-item {
    border-bottom: 1px solid #4c88ba;
    clear: left;
    float: left;
    margin: 0;
    padding: 0;
    width: 100%;
}
   </style>
<script>
var j=jQuery.noConflict(); 
    j(document).ready(function(){

    Searchh();
    j("#alert").delay(3200).fadeOut(300);
   


  }); // Document.ready 
       
</script>

<script>
function Searchh() { 
       var j = jQuery.noConflict(); 
    
       j("#cno").autocomplete({

              source: function (request, response) {

                  j.ajax({
                       type: "POST",
                       url: "<?php echo base_url(); ?>index.php/welcome/GetCertiNo",
                       data: { term: j("#cno").val()},
                       dataType: "json",
                       success: function (data) {
    
                response(j.map(data, function (item) {
                              return {
                                  label: item.certi_id,
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
                  j('#cno').val(ui.item.label);
                  return false;
              }
          });
}


function get_details()
{
    id=j("#cno").val();
    j("#tdata").html("");
    j('#ciid').val();
    

   if(id=="")
   {
      j('#alert').fadeIn(100);
      j("#alert").delay(3200).fadeOut(300);
   }
   else
   { 
    j("#lod").show();
    j.ajax({
          url: '<?php echo base_url(); ?>index.php/welcome/Certi_details',
          type: 'post',
          data: {'id': id},
          success: function(data) {
           
           var obj = j.parseJSON(data);
            for(i=0;i<obj.length;i++)
             { 
                if(obj[i].course_Name=="Tally Professional")
                {
                    if(obj[i].Total_mark >= 150)
                    {
                       grade="A";
                    }
                    else if(obj[i].Total_mark < 150)
                    {
                       grade="B";
                    }
                }
			   else if(obj[i].course_Name=="Quick Tally")
                {
                    if(obj[i].Total_mark >= 70)
                    {
                       grade="A";
                    }
                    else if(obj[i].Total_mark < 60)
                    {
                       grade="B";
                    }
                }
                else if(obj[i].course_Name=="Smart Tally")
                {
                    
                    if(obj[i].Total_mark >= 75)
                    {
                       grade="A";
                    }
                    else if(obj[i].Total_mark < 75)
                    {
                       grade="B";
                    }
                }
                else if(obj[i].course_Name=="Master In Excel")
                {
                    
                    if(obj[i].Total_mark >= 110)
                    {
                       grade="A";
                    }
                    else if(obj[i].Total_mark < 110)
                    {
                       grade="B";
                    }
                }

                var dts=obj[i].issued_date.split('-');
                var dts1=dts[2]+"/"+dts[1]+"/"+dts[0];

                j('#tablee').show();
                j('#dbt').show();
                j('#tdata').append("<tr><td>Student Id</td><td>"+obj[i].stud_id+"</td></tr><tr><td>Student Name</td><td>"+obj[i].name+"</td></tr><tr><td>Course</td><td>"+obj[i].course_Name+"</td></tr><tr><td>Center Name</td><td>"+obj[i].fran_name+"</td></tr><tr><td>Certificate Id</td><td>"+obj[i].certi_id+"</td></tr><tr><td>Grade</td><td>"+grade+"</td></tr><tr><td>Issued Date</td><td>"+dts1+"</td></tr>");
                j('#ciid').val(obj[i].certi_id);
             }
             j('#lod').hide();
           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      }); 

  }
}

function get_details_pdf()
{
    var id=j('#ciid').val();
    window.location="<?php echo base_url(); ?>index.php/welcome/get_certi_by_id?id="+id;
}

</script>

<!-- page title Start -->
<div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
    <div class="container">
      <div class="lms_title">Student Details</div>
      <div class="pull-right">
        <ol class="breadcrumb">
          <li><a href="index-2.html">Home</a></li>
          <li class="active">Student Details</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- page title end --> 

<!--main container start-->
<div class="container">
  
  <div class="row">
    <div class="col-lg-12">
      <h2 style="margin-top:20px; text-align:center;">Student Details</h2>
    </div>
    <div class="col-lg-12 col-md-12">
        
          <div class="lms_login_window lms_login_light">
            <h3>Student Details</h3>
            <div class="alert alert-success" id="alert1" style="display:none;">
                <strong>Mail Send...! We Will Contact Yot.</strong> 
            </div>
            <div class="lms_login_body">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                 <span>Please Enter Your Certificate Number To get Your Details....!</span>
              </div>
            </div>  

             <div class="row"> 
            <form role="form" id="enq_form" action="<?php echo base_url(); ?>index.php/welcome/franch_enquiry" method="post">
          
          <div class="col-lg-6 col-md-6">
               <div class="form-group">
                 <input type="text" class="form-control" name="cno" id="cno" placeholder="Certificate No" required title="Please enter your Certificate No">
               </div>
               <div class="alert alert-success" id="alert" style="display:none;">
                    <strong>Please Type Your Certificate No first...!</strong> 
               </div>
          </div>   

        <div class="col-lg-4 col-md-4">     
            <button type="button" onclick="get_details()"  class="btn btn-default">Submit</button><img src="<?php echo base_url(); ?>Style/images/enq_loder.gif" id="lod" style="display:none; height:30px; padding-left:10px;">
        </div>  
  
       </div>
            <br />
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="table-responsive">
                     <table id="tablee" style="display:none;" class="table table-hover table-bordered">
                           <thead style="background-color:#3678B2;color:#FFF;">
                             <tr>
                                <th colspan="2">Student Information</th> 
                             </tr> 
                           </thead>
                           <tbody id="tdata"> 
                            
                          </tbody>
                     </table>
                </div>
              </div>

              <div class="col-lg-4 col-md-4">  
                  <input type="hidden" id="ciid" name="ciid" />            
                  <button type="button" onclick="get_details_pdf()" id="dbt" style="display:none;" class="btn btn-default"><i class="fa fa-arrow-down"></i> Download Details</button><img src="<?php echo base_url(); ?>Style/images/enq_loder.gif" id="lod" style="display:none; height:30px; padding-left:10px;">
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

<!--main container end-->