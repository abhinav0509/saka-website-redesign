<script type="text/javascript" url="<?php echo base_url();?>Style/js/jquery.slimscroll.min.js" ></script>

<link href="<?php echo base_url(); ?>Style/js/jquery-sakura.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>Style/js/jquery-sakura.min.js"></script>

<script>
var j=jQuery.noConflict();
j(document).ready(function(){
var estate=j("#estate").val();
var course=j("#cou").val();
var mod=j("#modd").val();
 /*j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Student/save_result_status',
            type: 'POST',
            data:{'estate':estate,'stud_id':'<?php echo $fdata->user_id; ?>','fid':'<?php echo $fdata->f_id; ?>','marks':'<?php echo $correct; ?>','pass_mark':'<?php echo $passmark[0]['pass_marks']; ?>','course':course,'module':mod,'moduleid':'<?php echo $fdata->module; ?>'},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                
            },
            error: function () {
                
            }
        });*/


j(".table-responsive").slimscroll({
  height:'336px',
  wheelStep:1
});


if(estate=="pass")
{
    j(window).load(function () {
        j('body').sakura();
    });
   blink('.alert-info1');
}

});

function blink(selector){
j(selector).fadeOut('500', function(){
    j(this).fadeIn('50', function(){
        blink(this);
    });
});
}
 </script> 
  <style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 4px 5px;
  line-height: 1.428571429;
  vertical-align: top;
  border-top: 1px solid #e0e2e4;
}

table thead th{text-align: center; font-weight: normal; font-size: 12px; font-family: callibri; font-weight: normal;}

table tbody td{text-align: center; font-size: 12px; font-family: callibri;}

table tbody td{

    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.table-responsive{
  height: 336px;
  overflow: visible;
  overflow-x: hidden;
}
.alert-info {
    background-color: #FFFFFF;
    /*border-color: #23B1C8;*/
    color: #000;
}
.alert-info1 {
    background-color: #34A8DB;
    border-color: #23B1C8;
    color: red;
    font-family: calibri;
    font-size: 14px;
    padding: 6px;
    margin-bottom: 8px;
    border: 1px solid transparent;
    border-radius: 4px;
}
.alert-danger{
   font-family: calibri;
    font-size: 14px;
    padding: 6px;
    margin-bottom: 8px;
    border: 1px solid transparent;
    border-radius: 4px;
}

  </style>
<script>
  function download_marksheet(){
  
    
    window.location="<?php echo base_url(); ?>index.php/Student/Mark_Sheet?mod="+module+"&pmark="+passmark+"&correct="+cor;

  }

</script>
<div class="col-sm-12">
     <div class="row">
          <div class="col-sm-12">
               <div class="panel panel-default" style="border:1px solid #CCC;">
        <div class="panel-heading">
            <h4 class="panel-title">Exame Status:-  <?php echo $fdata->stud_name; ?></h4>

        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                  <div class="row">
                   <div class="table-responsive" >
                        <table class="table table-striped">
                        <thead>
                            <tr>                              
                                <th width="6%">Question Id</th>
                                <th>Correct Answer</th>
                                <th>Your Answer</th>
                            </tr>
                        </thead>
                        <tbody>

                          <?php $i=1; if(!empty($result)){ foreach($result as $res) { ?>
                          <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $res['answer']; ?></td>
                                <td><?php echo $res['u_ans']; ?></td>
                          </tr>
                          <?php } } ?>
                        </tbody>
                    </table>
                      
                   </div><!--reponsive-->
                 </div>
                 <div class="row" style="margin-top:40px;">
                   <div class="col-sm-12">
						<div class="col-sm-4">

                        </div>
                        <div class="col-sm-4">
                             <a href="javascript:;" onclick="download_marksheet()" class="btn btn-primary btn-block">Download Marksheet</a>
                        </div>
                        <div class="col-sm-4">

                        </div>
                        <!--<div class="col-sm-6">
                             <a href="<?php echo base_url(); ?>index.php/Student/get_pdf" class="btn btn-primary btn-block">Download Marksheet</a>
                        </div>-->
                        <!--<div class="col-sm-6">
                             <a class="btn btn-primary btn-block">Download Certificate</a>
                        </div>-->
                    </div>   
                    </div>   
                </div>
                <div class="col-md-6">
                    <div class="alert alert-block alert-info panel-default">
                        <h4 class='panel-title'>Exame Result!</h4>
                        <div class="panel-body">
                          <?php if(!empty($stud_info)){ foreach($stud_info as $stud){ ?>
                    <div class="col-sm-5 text-center">
                        <img alt="image" class="img-circle img-profile" height="120" src="<?php echo base_url(); ?>uploads/Admission/<?php echo $stud['image']; ?>">
                    </div>
                    <div class="col-sm-7 profile-details">
                        <h3><?php echo $stud['name']; ?></h3>
                        <h4 class="thin">Student</h4>
                        <p>
                            <a href="javascript:;" class="text-gray text-no-decoration">
                               <?php echo "ID :-".$stud['stud_id']; ?>
                            </a>
                        </p>
                    
                    </div>
                    <?php } } ?>
                </div>  

                        <div class="panel-body">
                               <?php foreach($exame_det as $exm){ $course=$exm['course']; $mod=$exm['quiz_cat_name']; } ?>                   
                              <div class="col-sm-5">
                                  <dl>
                                      <dt>Course</dt>
                                      <dd><?php echo $course; ?></dd>
                                      <input type="hidden" name="cou" id="cou" value="<?php echo $course; ?>" />
                                  </dl>
                                  <dl class="margin-sm-bottom">
                                      <dt>Total Correct</dt>
                                      <dd><?php echo $correct; ?></dd>

                                  </dl>
                                  <dl>
                                      <dt>Passing Score</dt>
                                      <dd><?php echo $passmark[0]['pass_marks']; ?></dd>

                                  </dl>
                                 
                              </div>
                              <div class="col-sm-7">
                                  <dl>
                                      <dt>Exame Module</dt>
                                      <dd><?php echo $mod; ?></dd>
                                      <input type="hidden" name="modd" id="modd" value="<?php echo $mod; ?>" />
                                  </dl>
                                  <dl class="margin-sm-bottom">
                                      <dt>Total Incorrect</dt>
                                      <dd><?php echo $incorrect; ?></dd>
                                  </dl>
                                  <dl>
                                      <dt>Your Score</dt>
                                      <dd><?php echo $correct; ?></dd>
                                  </dl>
                                  <script>
                                      var module='<?php echo $mod; ?>';
                                      var passmark='<?php echo $passmark[0]["pass_marks"]; ?>';                                      
                                      var cor='<?php echo $correct; ?>';
                                  </script>
                              </div>
                        </div>
                         <div class="row">
                              <?php if($correct >= $passmark[0]['pass_marks']){ ?>                              
                              <div class="alert alert-info1 col-sm-6 text-center" style="margin-left:140px;">
                                  <strong>Congratulation!</strong> You Pass The Exame.
                              </div>
                              <?php $estatus="pass"; }else { ?>
                              <div class="alert alert-danger col-sm-6" style="margin-left:140px;">
                                  <strong>Sorry!</strong> You Fail The Exam Apply Next Time.
                              </div>
                              <?php $estatus="fail"; } ?>
                              <input type='hidden' name="estate" id="estate" value="<?php echo $estatus; ?>" />
                          </div>

                    </div>
                    

                </div>

            </div>
        </div>
    </div>
          </div>
     </div>

</div><!--12-->