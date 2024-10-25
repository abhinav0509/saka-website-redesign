/* JavaScript Document Develope Shambhuraje Desai Sr.Deveroper*/
	/*-------------- Required Parameter ---------------*/
		// 1. get one hidden fild for store arrray data. this control id is #storeArrayvalue
		// 2. get one main check in table title . this control id is #titlechk
		// 3. tbody name id is #tdata 
		
function loding(main,obj) {
   
    if (obj.Hiddendata != "") {				
        var oldvalue = obj.Hiddendata;
        Frarr = oldvalue.split(',');
        var truecount = 0;
         $('#'+ obj.tbodyname +" "+':checkbox').each(function() {															 
            var Franchiseeid = $(this).attr('id');
            var index = Frarr.indexOf(Franchiseeid);
            if (index !== -1) {
                $(this).prop('checked', true);
                truecount++;
            }
        });
		var originealcount1 =$('#'+ obj.tbodyname +" "+":checkbox").length;
       
        if (truecount == originealcount1)
            $('#'+obj.titlecheck).prop('checked', true);
    }
return obj.Hiddendata;
}

function titlechkclick1(main,obj) {
	var returnvalu ="";
    var check = document.getElementById(obj.titlecheck).checked;
    if (check == true) {
        $('#'+ obj.tbodyname +" "+":checkbox").prop('checked', true);
        $('#'+ obj.tbodyname +" "+':checkbox').each(function() {
            var Franchiseeid = $(this).attr('id');
            var index = Frarr.indexOf(Franchiseeid);
            if (index !== -1) {
                Frarr[index] = Franchiseeid;
            } else {
                Frarr.push(Franchiseeid);
            }
        });
        var NewDate1 = Frarr;
        returnvalu = NewDate1;
    } else {
        $('#'+ obj.tbodyname +" "+":checkbox").prop('checked', false);
        $('#'+ obj.tbodyname +" "+':checkbox').each(function() {
            var Franchiseeid = $(this).attr('id');
            var index = Frarr.indexOf(Franchiseeid);	
            if (index !== -1) {
                Frarr.splice(index, 1);
            }
        });
        var NewDate1 = Frarr;
		returnvalu = NewDate1;
    }
	return returnvalu;
}

function eachcheck1(main,obj) {	
	var returnvalu ="";
    var check = $(obj.eachtitle).prop('checked');	
    if (check == true) {
        var Franchiseeid = $(obj.eachtitle).attr('id');
        var index = Frarr.indexOf(Franchiseeid);
        if (index !== -1) {
            Frarr[index] = Franchiseeid;
        } else {
            Frarr.push(Franchiseeid);
        }
        var NewDate1 = Frarr;
		returnvalu = NewDate1;       		
		 var originealcount =$('#'+ obj.tbodyname +" "+":checkbox").length;		
		 var newcount =$('#'+ obj.tbodyname +" "+"[type='checkbox']:checked").length;			
		 if(originealcount == newcount)
		 $('#'+ obj.titlecheck).prop('checked', true);
		 
    } else {
        var Franchiseeid = $(obj.eachtitle).attr('id');
        var index = Frarr.indexOf(Franchiseeid);
        if (index !== -1) {
            Frarr.splice(index, 1);
        }
        var NewDate1 = Frarr;      
		returnvalu = NewDate1;
		  $('#'+ obj.titlecheck ).prop('checked', false);
    }
		return returnvalu;
}

function clickpoup(main,obj) {
    if (obj.Status == "All") {

        $("#titlechk").prop('checked', true);
        titlechkclick();
    } else if (obj.Status == "AllNone") {
        $("#titlechk").prop('checked', false);
        titlechkclick();
        Frarr = [];
        $("#storeArrayvalue").val("");
    } else {
        $('#'+ obj.titlecheck).prop('checked', false);
        titlechkclick1(main,obj);
    }



}



function SDeachcheck (str)
{	
	var c = {};
    var str = $.extend(c, str);
	if(str.clickstatus == 'subtitle')
		return eachcheck1($(this),str);
	else if(str.clickstatus == 'loding')
		return loding($(this),str);
	else if(str.clickstatus == 'title')	
		return titlechkclick1($(this),str);
	else if(str.clickstatus == 'AllNone')	
		return clickpoup($(this),str);
		
};