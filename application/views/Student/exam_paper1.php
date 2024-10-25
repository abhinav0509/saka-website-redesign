<script type="text/javascript" url="<?php echo base_url();?>Style/js/jquery.slimscroll.min.js" ></script>

<script>
var j=jQuery.noConflict();
var k=0;
var res=[];
var mins="";
var secs="";
var timer;
//window.onbeforeunload = function () {return false;}
j(document).ready(function(){
getAllCount();
getAlldata();
//disableBackButton();
start();
j("#opt").slimscroll({

  height:'324px',
  wheelStep:1
});


});


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
                  if(mins=="")
                  {
                     mins=parseInt(mdt[0].duration);
                     
                     alert(mins);
                  }   
                  j('.tques').html(mdt[0].questions);
                  j('.timee').html(mdt[0].duration+"  min");

                  var s=parseInt(obj1.length);
                  var u=parseInt(st.length);
                  var unsolved=parseInt(s-u);
                  j('#solve').html(u);
                  j('#unsolve').html(unsolved);
                  //alert(JSON.stringify(obj['data1']));
                  //alert(JSON.stringify(obj['data4']));
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
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='a'>"+obj[i].option_a+" ";
                     op +="</label></div>"
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='b'>"+obj[i].option_b+" ";
                     op +="</label></div>";
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='c'>"+obj[i].option_c+" ";
                     op +="</label></div>";
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='d'>"+obj[i].option_d+" ";
                     op +="</label></div>";
                     op +="<ul class='pager'>";
                     op +="<li><a href='javascript:;' onclick='getprevid()'><i class='fa fa-angle-left'></i> Previous</a></li>";
                     op +="<li class='pull-right'><a href='javascript:;' onclick='getnextid()'>Next <i class='fa fa-angle-right'></i></a></li>";
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
                      }
                      else
                      {
                          j('#sbtn').hide();
                      }  

                 }
        
            },
            error: function () {
                
            }
        });
}

function getprevid()
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
                    
                     op +="<div class='panel-heading'><h4 class='panel-title'>Content Here</h4></div>";
                     op +="<div class='form-group lbl'><label class='col-sm-12 control-label' for='inputPassword3'>";
                     op +=(k+1)+"]"+" "+obj[i].question+"</label></div>";
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='a'>"+obj[i].option_a+" ";
                     op +="</label></div>"
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='b'>"+obj[i].option_b+" ";
                     op +="</label></div>";
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='c'>"+obj[i].option_c+" ";
                     op +="</label></div>";
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='d'>"+obj[i].option_d+" ";
                     op +="</label></div>";
                     op +="<ul class='pager'>";
                     op +="<li><a href='javascript:;' onclick='getprevid()'><i class='fa fa-angle-left'></i> Previous</a></li>";
                     op +="<li class='pull-right'><a href='javascript:;' onclick='getnextid()'>Next <i class='fa fa-angle-right'></i></a></li>";
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
                      }
                      else
                      {
                          j('#sbtn').hide();
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
            data:{'qid':id,'uans':uans,'cans':cans,'fid':fid,'sid':sid},
      
            success: function (data) {

                 var obj = j.parseJSON(data);
                getAllCount();
            },
            error: function () {
                
            }
        });

    }
   /*var flag=0;
   var result="{'q':"+id+",'a':"+cans+"}";
    if(cans!="")
    {
        for(var i=0 ; i<res.length; i++)
        {
            alert(res[i]+"record");
            if(res[i].q==id)
                res.splice(i);
        }
       
        
        res.push(result);
    }
    
    alert(JSON.stringify(res));*/
}
function getnextid()
{
  

  var id=j('#curid').val();
  var lastid=j('#lastid').val();
  var cans=j('#cans').val();

  var selectedVal = "";
  var selected = j("input[type='radio'][name='optionsRadios2']:checked");
    if (selected.length > 0) {
        selectedVal = selected.val();
    }
  if(k<100)
  k=k+1;
  save_array(id,selectedVal,cans);
  var op="";
  j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Student/getExamenext',
            type: 'POST',
            data:{'mid':id,'lastid':lastid},
      
            success: function (data) {

                  var objj = j.parseJSON(data);
                  var obj=objj['data1'];
                  var bk=objj['data2'];
                 for(i=0;i<obj.length;i++)
                 { 
                    
                     op +="<div class='panel-heading'><h4 class='panel-title'>Content Here</h4></div>";
                     op +="<div class='form-group lbl'><label class='col-sm-12 control-label' for='inputPassword3'>";
                     op +=(k+1)+"]"+" "+obj[i].question+"</label></div>";
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='a'>"+obj[i].option_a+" ";
                     op +="</label></div>"
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='b'>"+obj[i].option_b+" ";
                     op +="</label></div>";
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='c'>"+obj[i].option_c+" ";
                     op +="</label></div>";
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='d'>"+obj[i].option_d+" ";
                     op +="</label></div>";
                     op +="<ul class='pager'>";
                     op +="<li><a href='javascript:;' onclick='getprevid()'><i class='fa fa-angle-left'></i> Previous</a></li>";
                     op +="<li class='pull-right'><a href='javascript:;' onclick='getnextid()'>Next <i class='fa fa-angle-right'></i></a></li>";
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
                      }
                      else
                      {
                         j('#sbtn').hide();
                      }  
                 }
                 
                 
                
        
            },
            error: function () {
                
            }
        });


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
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='a'>"+obj[i].option_a+" ";
                     op +="</label></div>"
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='b'>"+obj[i].option_b+" ";
                     op +="</label></div>";
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='c'>"+obj[i].option_c+" ";
                     op +="</label></div>";
                     op +="<div class='radio' style='margin-top:32px; margin-left:16px;'><label>";
                     op +="<input type='radio' name='optionsRadios2' id='optionsRadios2' value='d'>"+obj[i].option_d+" ";
                     op +="</label></div>";
                     op +="<ul class='pager'>";
                     op +="<li><a href='javascript:;' onclick='getprevid()'><i class='fa fa-angle-left'></i> Previous</a></li>";
                     op +="<li class='pull-right'><a href='javascript:;' onclick='getnextid()'>Next <i class='fa fa-angle-right'></i></a></li>";
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

<!-- Right Click disabled code
<script type="text/javascript"> 
function disableselect(e){  
return false  
}  

function reEnable(){  
return true  
}  

//if IE4+  
document.onselectstart=new Function ("return false")  
document.oncontextmenu=new Function ("return false")  
//if NS6  
if (window.sidebar){  
document.onmousedown=disableselect  
document.onclick=reEnable  
}
</script>-->

<script type="text/javascript">
/*    j(function () {
        j(document).keydown(function (e) {
            return (e.which || e.keyCode) != 116;
        });
    });

function disableBackButton()
{
window.history.forward();
}

function showKeyCode(e) {
   // debugger;
    var keycode;
    if (window.event)
        keycode = window.event.keyCode;
    else if (e)
        keycode = e.which;

    // Mozilla firefox
    if ($.browser.mozilla) {
        if (keycode == 116 || (e.ctrlKey && keycode == 82)) {
            if (e.preventDefault) {
                e.preventDefault();
                e.stopPropagation();
            }
        }
    }
    // IE
    else if ($.browser.msie) {
        if (keycode == 116 || (window.event.ctrlKey && keycode == 82)) {
            window.event.returnValue = false;
            window.event.keyCode = 0;
            window.status = "Refresh is disabled";
        }
    }
    else {
        switch (e.keyCode) {

            case 116: // 'F5'
                event.returnValue = false;
                event.keyCode = 0;
                window.status = "Refresh is disabled";
                break;

        }
    }
}
*/

</script>
<script type = "text/javascript" >
    history.pushState(null, null, 'pagename');
    window.addEventListener('popstate', function(event) {
    history.pushState(null, null, 'pagename');
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
</style>


<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li><a href="javascript:;">Total Question</a></li>
        <li><a href="javascript:;" class='tques'>50</a></li>
        <li><a href="javascript:;">Time</a></li>
        <li><a href="javascript:;" class="timee">45min</a></li>       
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
                        </script>
		                   
                    	 <div class="controls col-sm-8">
                         <input type="hidden" name="first" id="firstid" />
                         <input type="hidden" name="last" id="lastid" />
                         <input type="hidden" name="curid" id="curid" />
                         <input type="hidden" name="cans" id="cans" />
                         <div class="mbox panel panel-default">
                             <!--<div class="panel-heading">
                                  <h4 class="panel-title">Content Here</h4>
                              </div>
                   <div class="form-group lbl">
                         <label class="col-sm-12 control-label" for="inputPassword3">
                             1] Transfer of Profit to Capital A/c, which A/c should be debited ? 
                         </label>
                       </div> 
		                        <div class="radio" style="margin-top:32px; margin-left:16px;">
		                            <label>
		                                <input type="radio" name="optionsRadios2" id="optionsRadios2" value="a">
		                                For Profit Screening
		                            </label>
		                        </div>
		                        
                      <ul class="pager">
                          <li><a href="javascript:;"><i class="fa fa-angle-left"></i> Previous</a></li>
                          <li class="pull-right"><a href="javascript:;">Next <i class="fa fa-angle-right"></i></a></li>
                      </ul>-->
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