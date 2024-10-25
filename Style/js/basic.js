jQuery(function ($) {
	$('.basic').click(function(e){
	   $('#basic-modal-content').modal();
	});
	
});

function show_detail(obj,id)
{
  $('#popdata').html("");
  
  var id1="ID";
  var name="NAME";
  var iname="INSTITUTE NAME";
  var badd="BUISSINESS ADDRESS";
  var st="STATE"; 
  var ct="CITY";
  var em="EMAIL";
  var cont="CONTACT";
  var mob="MOBILE";
  var aply="APPLY FOR PLACE";
  var dist="DISTRICT";
  var call="CALL DATE";
  var ctime="CALL TIME";
  var ncomp="NO OF COMPUTER'S";
  var nemp="NO OF EMPLOYEE";
  var ntrain="NO OF TRAINER'S";
  var ncoun="NO OF COUNSELOR'S";
  var syear="FROM YEAR";
  var tyear="TO YEAR";
  var spass="NO OF STUD PASS";
  var nyear="NO OF YEAR IN BUISSINESS";
  var branch="BRANCH";
  var loc="LOCATION";
 
 var r=0;
  alert(id)
  for(i=0;i<obj[0].length;i++)
  {
     if(obj[0][i].id==id)
	 {
	   r=i;
	 }
  }     
  var Name='Name';
        alert(obj[0][r].id);
	    alert(obj[0][r].Name);
		//$('#basic-modal-content').html(obj[0][r].id+ " "+obj[0][r].Name);
		$('#popdata').append("<tr class='trr' ><td>"+id1+"</td><td>"+ obj[0][r].id +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+name+"</td><td>"+ obj[0][r].Name +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+iname+"</td><td>"+ obj[0][r].Inst_name +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+badd+"</td><td>"+ obj[0][r].Badd +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+st+"</td><td>"+ obj[0][r].State +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+ct+"</td><td>"+ obj[0][r].City +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+cont+"</td><td>"+ obj[0][r].Contact +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+mob+"</td><td>"+ obj[0][r].Mobile +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+aply+"</td><td>"+ obj[0][r].Applyt_place +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+dist+"</td><td>"+ obj[0][r].District +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+call+"</td><td>"+ obj[0][r].Call_on +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+ctime+"</td><td>"+ obj[0][r].Call_Time +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+ncomp+"</td><td>"+ obj[0][r].No_computer +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+nemp+"</td><td>"+ obj[0][r].No_emp +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+ntrain+"</td><td>"+ obj[0][r].No_trainer +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+ncoun+"</td><td>"+ obj[0][r].No_counselor +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+syear+"</td><td>"+ obj[0][r].Since_year +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+Name+"</td><td>"+ obj[0][r].To_year +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+spass+"</td><td>"+ obj[0][r].Stud_pass_prev +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+nyear+"</td><td>"+ obj[0][r].No_year_buis +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+branch+"</td><td>"+ obj[0][r].Branch +"</td></tr>");
		$('#popdata').append("<tr class='trr' ><td>"+loc+"</td><td>"+ obj[0][r].Location +"</td></tr>");
		
};