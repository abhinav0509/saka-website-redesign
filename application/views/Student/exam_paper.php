<script type="text/javascript" language="javascript">
var res=[];
var mins="";
var secs="";
var timer;

window.onbeforeunload = function(e) {
       callSomeFunction();
       return null;
    };

function callSomeFunction(){

  var d1 = new Date (),
  d2 = new Date (d1);
  d2.setMinutes ( d1.getMinutes() + 90 );
  var expires = "; expires="+d2;		
	
  cname='<?php echo $fdata->user_id; ?>';
  cvalue=mins+":"+secs;
  exdays=90;
  
  //document.cookie = cname+"="+cvalue+expires+"; path=/CCA/index.php"	
  
  document.cookie = cname+"="+cvalue+expires+"; path=/index.php";
}	

</script>

<script>

var j=jQuery.noConflict();
var k=0;
var myCookie="";

j(document).ready(function(){

getAllCount();
getAlldata();
//start();
j("#opt").slimscroll({
   height:'324px',
   wheelStep:1
});


myCookie = readCookie('<?php echo $fdata->user_id; ?>'); 	
if (myCookie!= "empty") {
   if(mins==""){ 					  
	mins=parseInt(myCookie.split(":")[0]);
	secs=parseInt(myCookie.split(":")[1]);
	start_timer();
 }
} 

j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Student/Change_adm_stud_state',
            type: 'POST',
            data:{'sid':sid},
      
            success: function (data) {

                // var obj = j.parseJSON(data);
                
            },
            error: function () {
                
            }
        });


});



function nextid()
{
	j("#next_quiz").addClass('disabled');
	getnextid();
}

function previd(){
	j("#prev_quiz").addClass('disabled');
	getprevid();
}


function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return "empty";
}

function getAllCount()
{
  j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Student/getExameCount',
            type: 'POST',
            data:{'action':"getExame"},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                 var flag=0;
                  var obj1=obj['data1'];
                  var bk=obj['data2'];
                  var sk=obj['data3'];
                  var st=obj['data4'];
                  var mdt=obj['data5'];  				  	
 				  if(mins==""){  
					  mins=parseInt(mdt[0].duration);
					  start_timer();
   				  }
							
				  
                  j('.tques').html(mdt[0].questions);
                  j('.timee').html(mdt[0].duration+"  min");

                  var s=parseInt(obj1.length);
                  var u=parseInt(st.length);
                  var unsolved=parseInt(s-u);
                  j('#solve').html(u);
                  j('#unsolve').html(unsolved);                  
                  j('#firstid').val(bk[0]['quiz_id']); 
                  j('#lastid').val(sk[0]['quiz_id']); 

                 var op ="<div class='panel-heading'><h4 class='panel-title'>Select Question</h4></div>"; 
                 for(i=0;i<obj1.length;i++)
                 { 
                    for(k1=0;k1<st.length;k1++)
                    {
                        if(st[k1].q_id==obj1[i].quiz_id)
                        {
                             flag=1;
                             var ik=i+1;
                        }
            
                    }
					if(ik==(i+1))
					{
					  op +="<div class='col-sm-3 stat' style='margin-top:5px;'><a href='#' data-placement='bottom' data-toggle='tooltip' title='"+obj1[i].question+"' onclick=\"getques("+obj1[i].quiz_id+","+i+")\"><span class='badge1 badge-primary' style='background-color:#E13042;'>"+(i+1)+"</span></a>";
					  op +="</div>"; 

				   }
				   else
				   {
					 op +="<div class='col-sm-3' style='margin-top:5px;'><a href='#' data-placement='bottom' data-toggle='tooltip' title='"+obj1[i].question+"' onclick=\"getques("+obj1[i].quiz_id+","+i+")\"><span class='badge1 badge-primary'>"+(i+1)+"</span></a>";
					 op +="</div>"; 
				   }   


                          
                 }
                  j('#opt').html(op);
                  
            },
            error: function () {
                
            }
        });
}

function start_timer()
{
  start();
}

function getques(id1,k1)
{
  
  var id=j('#curid').val();
  var lastid=j('#lastid').val();
  var cans=j('#cans').val();
  
  var selectedVal = "";
  var selected = j("input[type='radio'][name='optionsRadios2']:checked");
    if (selected.length > 0) {
        selectedVal = selected.val();
    }

   save_array(id,selectedVal,cans);

  k=k1;
  var op="";
  j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Student/getsinglequiz',
            type: 'POST',
            data:{'id1':id1},
      
            success: function (data) {

                var objj = j.parseJSON(data);
                  var obj=objj['data1'];
                  var bk=objj['data2'];
                
                 for(i=0;i<obj.length;i++)
                 { 
                     
                     op +="<div class='panel-heading'><h4 class='panel-title'>Content Here</h4></div>";
                     op +="<div class='form-group lbl'><label class='col-sm-12 control-label' for='inputPassword3'>";
                     op +=(k+1)+"]"+" "+obj[i].question+"</label></div>";
                     if(obj[i].option_a!=""){
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='a'>"+obj[i].option_a+" ";
						op +="</label></div>";
					}
					if(obj[i].option_b!=""){
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='b'>"+obj[i].option_b+" ";
						op +="</label></div>";
					}
                    if(obj[i].option_c!=""){
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='c'>"+obj[i].option_c+" ";
						op +="</label></div>";
					}
					if(obj[i].option_d!="")	{
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='d'>"+obj[i].option_d+" ";
						op +="</label></div>";
					}                 
                     op +="<ul class='pager'>";
                     op +="<li><a class='btn' id='prev_quiz'  href='javascript:;' onclick='previd()'><i class='fa fa-angle-left'></i> Previous</a></li>";
                     op +="<li class='pull-right'><a class='btn' href='javascript:;' id='next_quiz' onclick='nextid()'>Next <i class='fa fa-angle-right'></i></a></li>";
                     op +="</ul>";

                     j('.mbox').html(op);
                     j('#curid').val(obj[i].quiz_id);
                     j('#cans').val(obj[i].answer);

                     for(k1=0; k1<bk.length; k1++)
                      {
                         if(obj[i].quiz_id==bk[k1].q_id)
                         {
                          
                           j('input[type=radio]').each(function(){
                                if(bk[k1].u_ans==j(this).val())
                                {
                                  j(this).attr('checked','checked');
                                }     
                           });
                         }  
                     }

                     if(obj[i].quiz_id==lastid)
                      {
                          j('#sbtn').show();
                          j('#next_quiz').hide();
                      }
                      else
                      {
                          j('#sbtn').hide();
                          j('#next_quiz').show();
                      }  

                 }
        
            },
            error: function () {
                
            }
        });
}

function getprevid()
{
	 j(".se-pre-con").show();
	j("#prev_quiz").removeClass('disabled');
  var id=j('#curid').val();
  var lastid=j('#lastid').val();
  var cans=j('#cans').val();
  
  var selectedVal = "";
  var selected = j("input[type='radio'][name='optionsRadios2']:checked");
    if (selected.length > 0) {
        selectedVal = selected.val();
    }

   save_array(id,selectedVal,cans);


   if(k>0)
     k=k-1;
  var first=j('#firstid').val();
  var op="";
  j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Student/getExameprev',
            type: 'POST',
            data:{'mid':id,'firstid':first},
      
            success: function (data) {

                 var objj = j.parseJSON(data);
                  var obj=objj['data1'];
                  var bk=objj['data2'];
                 for(i=0;i<obj.length;i++)
                 { 
                    
                     op +="<div class='panel-heading'><h4 class='panel-title'>Question</h4></div>";
                     op +="<div class='form-group lbl'><label class='col-sm-12 control-label' for='inputPassword3'>";
                     op +=(k+1)+"]"+" "+obj[i].question+"</label></div>";
                     if(obj[i].option_a!=""){
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='a'>"+obj[i].option_a+" ";
						op +="</label></div>";
					}
					if(obj[i].option_b!=""){
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='b'>"+obj[i].option_b+" ";
						op +="</label></div>";
					}
                    if(obj[i].option_c!=""){
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='c'>"+obj[i].option_c+" ";
						op +="</label></div>";
					}
					if(obj[i].option_d!="")	{
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='d'>"+obj[i].option_d+" ";
						op +="</label></div>";
					}                   
					op +="<ul class='pager'>";
                     op +="<li><a class='btn' id='prev_quiz' href='javascript:;' onclick='previd()'><i class='fa fa-angle-left'></i> Previous</a></li>";
                     op +="<li class='pull-right'><a class='btn' href='javascript:;' id='next_quiz' onclick='nextid()'>Next <i class='fa fa-angle-right'></i></a></li>";
                     op +="</ul>";

                     j('.mbox').html(op);
					 j(".se-pre-con").delay(100).fadeOut(1000);
                     j('#curid').val(obj[i].quiz_id);
                     j('#cans').val(obj[i].answer);

                      for(k1=0; k1<bk.length; k1++)
                      {						  
                         if(obj[i].quiz_id==bk[k1].q_id)
                         {                          
                           j('input[type=radio]').each(function(){
                                if(bk[k1].u_ans==j(this).val())
                                {								  
                                  j(this).attr('checked','checked');
                                }     
                           });
                         }  
                     }

                      if(obj[i].quiz_id==lastid)
                      {
                          j('#sbtn').show();
                          j('#next_quiz').hide();
                      }
                      else
                      {
                          j('#sbtn').hide();
                          j('#next_quiz').show();
                      }  
                 }
        
            },
            error: function () {
                
            }
        });
}
function save_array(id,uans,cans)
{
   if(uans!="")
   {
    j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Student/save_ans',
            type: 'POST',
            data:{'qid':id,'uans':uans,'cans':cans,'fid':fid,'sid':sid,'mid':mid},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                 getAllCount();
            },
            error: function () {
                
            }
        });

    }
  
}

function increaseQval()
{
  var id=j('#curid').val();
  var lastid=j('#lastid').val();
  if(id!=lastid)
  {
   
  }
}

function getnextid()
{
  j(".se-pre-con").show();
 j("#next_quiz").removeClass('disabled');
  var id=j('#curid').val();
  var lastid=j('#lastid').val();
  var cans=j('#cans').val();
  var selectedVal = "";
  var selected = j("input[type='radio'][name='optionsRadios2']:checked");
    if (selected.length > 0) {
        selectedVal = selected.val();
    }
  
  save_array(id,selectedVal,cans);
  var op="";
  
  
if(id!=lastid)
{
  
  j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Student/getExamenext',
            type: 'POST',
            data:{'mid':id,'lastid':lastid},
			
			success: function (data) {
				  var objj = j.parseJSON(data);
                  var obj=objj['data1'];
                  var bk=objj['data2'];
                  if(k<100)
                  k=k+1; 
                 for(i=0;i<obj.length;i++)
                 { 
                     j('#curid').val(obj[i].quiz_id);
                     
                     op +="<div class='panel-heading'><h4 class='panel-title'>Content Here</h4></div>";
                     op +="<div class='form-group lbl'><label class='col-sm-12 control-label' for='inputPassword3'>";
                     op +=(k+1)+"]"+" "+obj[i].question+"</label></div>";
                     if(obj[i].option_a!=""){
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='a'>"+obj[i].option_a+" ";
						op +="</label></div>";
					}
					if(obj[i].option_b!=""){
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='b'>"+obj[i].option_b+" ";
						op +="</label></div>";
					}
                    if(obj[i].option_c!=""){
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='c'>"+obj[i].option_c+" ";
						op +="</label></div>";
					}
					if(obj[i].option_d!="")	{
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='d'>"+obj[i].option_d+" ";
						op +="</label></div>";
					}
                     op +="<ul class='pager'>";
                     op +="<li><a class='btn' id='prev_quiz' href='javascript:;' onclick='previd()'><i class='fa fa-angle-left'></i> Previous</a></li>";
                     op +="<li class='pull-right'><a class='btn' href='javascript:;' id='next_quiz' onclick='nextid()'>Next <i class='fa fa-angle-right'></i></a></li>";
                     op +="</ul>";
					 
                     j('.mbox').html(op);
                     j(".se-pre-con").delay(100).fadeOut(1000);
                     j('#cans').val(obj[i].answer);

                      for(k1=0; k1<bk.length; k1++)
                      {
                         if(obj[i].quiz_id==bk[k1].q_id)
                         {
                          
                           j('input[type=radio]').each(function(){
                                if(bk[k1].u_ans==j(this).val())
                                {
                                  j(this).attr('checked','checked');
                                }     
                           });
                         }  
                     } 
                     
                      if(obj[i].quiz_id==lastid)
                      {
                         j('#sbtn').show();
                          j('#next_quiz').hide();
                      }
                      else
                      {
                         j('#sbtn').hide();
                          j('#next_quiz').show();
                      }  
                 }
                 
                 increaseQval();
                
        
            },
            error: function () {
                
            }
        });
    }

}

function getAlldata()
{
  
  var op="";
  j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Student/getExame',
            type: 'POST',
            data:{'action':"getExame"},
      
            success: function (data) {

                  var objj = j.parseJSON(data);
                  var obj=objj['data1'];
                  var bk=objj['data2'];
                
				
                 for(i=0;i<obj.length;i++)
                 { 
								
				
                     op +="<div class='panel-heading'><h4 class='panel-title'>Content Here</h4></div>";
                     op +="<div class='form-group lbl'><label class='col-sm-12 control-label' for='inputPassword3'>";
                     op +=(k+1)+"]"+" "+obj[i].question+"</label></div>";
                    if(obj[i].option_a!=""){
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='a'>"+obj[i].option_a+" ";
						op +="</label></div>";
					}
					if(obj[i].option_b!=""){
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='b'>"+obj[i].option_b+" ";
						op +="</label></div>";
					}
                    if(obj[i].option_c!=""){
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='c'>"+obj[i].option_c+" ";
						op +="</label></div>";
					}
					if(obj[i].option_d!="")	{
						op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
						op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='d'>"+obj[i].option_d+" ";
						op +="</label></div>";
					}
                     op +="<ul class='pager'>";
                     op +="<li><a class='btn' id='prev_quiz' href='javascript:;' onclick='previd()'><i class='fa fa-angle-left'></i> Previous</a></li>";
                     op +="<li class='pull-right'><a class='btn' href='javascript:;' id='next_quiz' onclick='nextid()'>Next <i class='fa fa-angle-right'></i></a></li>";
                     op +="</ul>";
	
                     j('.mbox').html(op);
                     j('#curid').val(obj[i].quiz_id);
                     j('#cans').val(obj[i].answer);

                     for(k1=0; k1<bk.length; k1++)
                      {
                         if(obj[i].quiz_id==bk[k1].q_id)
                         {
                          
                           j('input[type=radio]').each(function(){
                                if(bk[k1].u_ans==j(this).val())
                                {
                                  j(this).attr('checked','checked');
                                }     
                           });
                         }  
                     }  
                 }
        
            },
            error: function () {
                
            }
        });
}

function save_status()
{
  j("#sbtn").attr("disabled",true);
  var id=j('#curid').val();
  var lastid=j('#lastid').val();
  var cans=j('#cans').val();
  var selectedVal = "";
  var selected = j("input[type='radio'][name='optionsRadios2']:checked");
    if (selected.length > 0) {
        selectedVal = selected.val();
    }
  save_array(id,selectedVal,cans);
  
  var status="Completed";
  j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Student/end_exame',
            type: 'POST',
            data:{'sid':sid,'status':status},
      
            success: function (data) {
                 var obj=j.parseJSON(data);
				 
                 if(obj.msg=="success")
                 {
                      window.location="<?php echo base_url(); ?>index.php/Student/exame_result";
                 }
                 else if(obj.msg=="failed")
                 {
                      alert('Error...');
                 }
                                    
            },
            error: function () {
                
            }
        });


}
</script>

<script type = "text/javascript" >

    //history.pushState(null, null, 'pagename');
    window.addEventListener('popstate', function(event) {
    //history.pushState(null, null, 'pagename');
	//alert("Sorry You Refresh The Page You are logout From Exam Please Contact Admin To Reactive Your Exam");
	//window.location="<?php echo base_url(); ?>index.php/welcome";
    });

    
    </script>

  <script type="text/javascript">

    function start(){
      timer = setInterval('update()', 1000);
    }

    function update(){
      var timeField = document.getElementById('time');

      if(secs == 0){
        if(mins == 0){
          clearInterval(timer);
                      alert('Times up');
                      save_status();
          return;
        }
        mins--;
        secs = 59;
      } else {
        secs--;
      }
      if(secs<10){
        timeField.innerHTML = 'Time left: ' + mins + ':0' + secs;
      } else {
        timeField.innerHTML = 'Time left: ' + mins + ':' + secs;
      } 
    }
    




  </script>
<style>
.pager {
    list-style: outside none none;
    margin: 18px 20px;
    padding-left: 0;
    text-align: left;
}
.panel {
    margin-bottom: 18px;
    background-color: #FFF;
   
}
.panel {
    margin-bottom: 18px;
    background-color: #FFF;
    border: 0px solid transparent;
    border-radius: 4px;
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.05);
}
.footer{
    position: relative;
min-height: 50px;
margin-bottom: 0px;
border: 1px solid transparent;
margin-top: 230px;
}
.footer p{
    padding-top: 5px;
    color: #fff;
}
.mbox {
    border: 1px solid #ccc;
    height: auto;
   
    width: auto;
}
.checkbox + .checkbox, .radio + .radio {
    margin-top: 9px;
    margin-left: 16px;
}
.lbl{


    margin-bottom: 47px;
    margin-top: 17px;

}
.badge1 {
    padding: 7px 10px;
}
.badge1 {
    display: inline-block;
    min-width: 10px;
    padding: 4px 10px;
    font-size: 12px;
    font-weight: 400;
    color: #FFF;
    line-height: 1;
    vertical-align: baseline;
    white-space: nowrap;
    text-align: center;
    background-color: #999;
    border-radius: 16px;
}
.badge-primary {
    background-color: #357EBD;
    color: #FFF;
}
#opt{
  border:1px solid #CCC;
}
#opt {
    height: 324px;
    overflow-x: hidden;
    overflow-y: visible;
}
.page-subheading ul {
    list-style: outside none none;
    width: 715px;
    display: inline-block;
    margin-left: 325px;
    margin-top: -23px;
}
.page-subheading ul li{
    width: 90px;
display: inline-block;
}

.se-pre-con {
    background-color: #f5f5f5;
    display: none;
    height: 48%;
    left: 11%;
    opacity: 0.6;
    position: absolute;
    top: 10%;
    width: 79%;
    z-index: 9999;
}

.se-pre-con > img {
    margin-left: 36%;
    margin-top: 12%;
}
</style>

<div class="se-pre-con" style="">
   <img id="Loderimg1" style="" src="<?php echo base_url();?>/images/279.gif"  />
</div>
<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Total Question</a></li>
        <li><a href="javascript:;" class='tques'>50</a></li>
        <li><a href="javascript:;">Time</a></li>
        <li><a href="javascript:;" class="timee"></a></li>       
    </ol>

    <ul class="center middle">
       <li>solved</li>
       <li><a href="javascript:;"><span class="badge badge-danger" id="solve"></span></a></li>
       <li>Unsolved</li>
       <li><a href="javascript:;"><span class="badge1 badge-primary" id='unsolve'></span></a></li>
       <li class="pull-right">
          <div id="time" >
               
          </div>
       </li>
    </ul>
</div>

<div class="row">
  <div class="container">
        <div class="col-md-12">
           <!--<div class="mbox">	-->
            <div class="panel panel-default">
              
                <div class="col-sm-12" style="">

                 	<div class="panel-body" id="edata">
                 	   
                        <script>
                            var fid='<?php echo $fdata->f_id; ?>';
                            var sid='<?php echo $fdata->user_id; ?>';
							var mid='<?php echo $fdata->module; ?>'
                        </script>
		                   
                    	 <div class="controls col-sm-8">
                         <input type="hidden" name="first" id="firstid" />
                         <input type="hidden" name="last" id="lastid" />
                         <input type="hidden" name="curid" id="curid" />
                         <input type="hidden" name="cans" id="cans" />
                         <div class="mbox panel panel-default">
						 </div>
                  </div>
                 
                 
                        <div class="col-sm-4 panel panel-default" style="padding-left:0; padding-right:0;"  id="opt">
                              
                                 
                        </div>  
                       

                                
                
                </div>
                  <div class="col-sm-12">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-3">
                      <a class="btn btn-primary center" id='sbtn' onclick="save_status()" style="display:none;">Submit Quiz</a>
                    </div>
                    <div class="col-sm-3">

                    </div>
                     
                  </div>

            <!--</div>-->
        </div>
        </div>
    </div>
  </div>
</div>


<div class="footer" style="background-color:#00569d">
   
            <div>
            	<h4><p style="text-align:center">Powerd by Maverick software (I) Prt. Ltd </p></h4>
           </div>
               
</div>