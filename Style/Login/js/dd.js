$(document).ready(function(){
	call();
});

function call(){
	 $.ajax({
        type: "post",
        crossDomain: true,
        url: "http://www.medicohelpline.com/WebService.asmx/SiteCheck?callback=?",
        data: {'sitename':'http://safarikidusa.com'},
        contentType: "application/json; charset=utf-8",
        dataType: "jsonp",
        success: function (data, textStatus, xhr) {
            if (data.d == "Stop") {               
                window.location = "Sorry.html";
            }
            console.log(data);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
};