  jQuery(document).ready(function($) {


        $("#switcher-handle > #handle").toggle
  (
    function()
    {
      $('#switcher-handle').animate({left:'0px'}, {queue:false,duration:200});
      $('#switcher-handle > #handle').addClass('out');
    }
    ,function()
    {
      $('#switcher-handle').animate({left:'-341px'}, {queue:false,duration:200});
      $('#switcher-handle > #handle').removeClass('out');
    }
  );
    
    $('#style-switcher a.color-box').each(function (i) {
        var a = $(this);
        a.css({
            backgroundColor: '#' + a.attr('data-rel')
        })
    })  
 

$('select#layout').change(function () { 
  var b = $(this).children(":selected").val();
  if (b == 'boxed_normal') {
    $("#container").attr('style', 'width:1040px;');
     $("#main-navigation.sticky").addClass("sticky");
    $("#main-navigation").removeClass("sticky-fullwidth");

  } 
  else if (b == 'wide_normal') {
    $("#container").attr('style', 'width:100%; ');
    $("#main-navigation.sticky").removeClass("sticky");
    $("#main-navigation").addClass("sticky-fullwidth");
   
  }

   else if (b == 'wide_big') {
    $(".container").attr('style', 'width:1170px; ');
    $("#main-navigation.sticky").removeClass("sticky");
    $("#main-navigation").addClass("sticky-fullwidth");
   
  }

  else if (b == 'wide_huge') {
    $(".container").attr('style', 'width:1280px; ');
    $("#main-navigation.sticky").removeClass("sticky");
    $("#main-navigation").addClass("sticky-fullwidth");
   
  }

    else if (b == 'wide_huge_2') {
    $(".container").attr('style', 'width:1440px; ');
    $("#main-navigation.sticky").removeClass("sticky");
    $("#main-navigation").addClass("sticky-fullwidth");
   
  }

  else if (b == 'boxed_big') {
    $("#container").attr('style', 'width:1270px;');
    $(".container").attr('style', 'width:1170px;');
     $("#main-navigation.sticky").addClass("sticky");
    $("#main-navigation").removeClass("sticky-fullwidth");
   
  }

   else if (b == 'boxed_huge') {
    $("#container").attr('style', 'width:1380px;');
    $(".container").attr('style', 'width:1280px;');
     $("#main-navigation.sticky").addClass("sticky");
    $("#main-navigation").removeClass("sticky-fullwidth");
   
  }

   else if (b == 'boxed_huge_2') {
    $("#container").attr('style', 'width:1540px;');
    $(".container").attr('style', 'width:1440px;');
     $("#main-navigation.sticky").addClass("sticky");
    $("#main-navigation").removeClass("sticky-fullwidth");
   
  }


});


$('select#footer-style').change(function () { 
  var b = $(this).children(":selected").val();
  if (b == 's2') {
    $("#footer,#copyrights").addClass("s2");
    

  } 
  else if (b == 's3') {
     
    
    $("#footer,#copyrights").addClass("s3");
   
  }
  else if (b == 's1') {
     
    
    $("#footer,#copyrights").removeClass("s3");
    $("#footer,#copyrights").removeClass("s2");
   
  }
});

/*$('select#footer-style').change(function () { 
  var b = $(this).children(":selected").val();
  if (b == 'dark') {
    $("#footer").removeClass("light");

  } 
  else if (b == 'light') {
    $("#footer").addClass("light");
     
   
  }
});*/
 
 

 
        $('#colorpicker').ColorPicker({
      onShow: function (colpkr) {
        $(colpkr).fadeIn("fast");
        return false;
      },
      onHide: function (colpkr) {
        $(colpkr).fadeOut("fast");
        return false;
      },
      onChange: function (hsb, hex, rgb) {
        var color = hex;
        var defaultPattern = "url(../images/bg1.jpg)";
        $('body').css({
            backgroundColor: '#' + color,
            backgroundImage : defaultPattern
        });     
        $.cookie("portable_cookie_color", color);   
        $.cookie("portable_cookie_pattern", null);   
        $.cookie("portable_cookie_defaultBg", defaultPattern);   
      },
    
    });    
    
    $('#style-switcher a.color-box').each(function (i) {
        var a = $(this);
        a.css({
            backgroundColor: '#' + a.attr('data-rel')
        })
       
    })    
    

   var switcher_skins = $('#style-switcher a.color-box');
   var switcher_link = $('#style-color');
   switcher_skins.each(function(i) {
    var color = $(this).attr('data-rel');
    var defaultPattern = "url(images/background-patterns/body-bg-1.jpg)";
     
      
   });  
   
     /*STYLESHEETS LOAD STARTS*/ 

   switcher_skins.click(function(e) {
    var color = $(this).attr('data-rel');
  

    var skins;
    var defaultPattern = "url(images/background-patterns/body-bg-1.jpg)";

 


      if (color == "169fe6") {
      switcher_link.attr('href',"css/colors/blue-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
    }

 

      if (color == "ed5564") {
      switcher_link.attr('href',"css/colors/soft-red-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
    }


      if (color == "fb6e52") {
      switcher_link.attr('href',"css/colors/soft-orange-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
    }

  if (color == "ffce55") {
      switcher_link.attr('href',"css/colors/light-yellow-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
    }

    if (color == "a0d468") {
      switcher_link.attr('href',"css/colors/light-green-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
    }

    if (color == "48cfae") {
      switcher_link.attr('href',"css/colors/light-cyan-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
    }

      if (color == "50c1e9") {
      switcher_link.attr('href',"css/colors/light-blue-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
    }



      if (color == "5d9cec") {
      switcher_link.attr('href',"css/colors/soft-blue-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
    }


      if (color == "ac92ed") {
      switcher_link.attr('href',"css/colors/soft-violet-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
    }

 if (color == "ec87c1") {
      switcher_link.attr('href',"css/colors/soft-pink-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
    }
if(color=="ff7534"){
  switcher_link.attr('href',"css/colors/light-orange-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="656d78"){
  switcher_link.attr('href',"css/colors/dark-grey-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}


if(color=="363a88"){
  switcher_link.attr('href',"css/colors/dark-purple-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="00ba84"){
  switcher_link.attr('href',"css/colors/strong-cyan-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="e33000"){
  switcher_link.attr('href',"css/colors/strong-orange-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="bf0101"){
  switcher_link.attr('href',"css/colors/strong-red-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}


if(color=="c69c6d"){
  switcher_link.attr('href',"css/colors/light-brown-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}
if(color=="0054a6"){
  switcher_link.attr('href',"css/colors/dark-blue-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}


if(color=="fcaf17"){
  switcher_link.attr('href',"css/colors/strong-yellow-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}


if(color=="be3b19"){
  switcher_link.attr('href',"css/colors/strong-brown-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="7ecdf1"){
  switcher_link.attr('href',"css/colors/soft-blue-color-2.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="92c924"){
  switcher_link.attr('href',"css/colors/strong-green-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="fe5b42"){
  switcher_link.attr('href',"css/colors/bright-red-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}



if(color=="f20505"){
  switcher_link.attr('href',"css/colors/vivid-red-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}


if(color=="ef013f"){
  switcher_link.attr('href',"css/colors/vivid-pink-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="1bddf2"){
  switcher_link.attr('href',"css/colors/vivid-cyan-color.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}
if(color=="c7d93d"){
  switcher_link.attr('href',"css/colors/bright-green.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}
if(color=="fe6b34"){
  switcher_link.attr('href',"css/colors/bright-orange.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="9adada"){
  switcher_link.attr('href',"css/colors/soft-cyan.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="21262a"){
  switcher_link.attr('href',"css/colors/very-dark-blue.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="555e7b"){
  switcher_link.attr('href',"css/colors/desaturated-fark-blue.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="e25527"){
  switcher_link.attr('href',"css/colors/bright-brown.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="fa381c"){
  switcher_link.attr('href',"css/colors/vivid-orange.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}


if(color=="72ac34"){
  switcher_link.attr('href',"css/colors/moderate-green.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}


if(color=="ff7c8e"){
  switcher_link.attr('href',"css/colors/bright-pink.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}


if(color=="1c7b7f"){
  switcher_link.attr('href',"css/colors/dark-cyan.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="ac50cc"){
  switcher_link.attr('href',"css/colors/moderate-violet.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="00ced6"){
  switcher_link.attr('href',"css/colors/strong-cyan.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="f28b66"){
  switcher_link.attr('href',"css/colors/pale-orange.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}

if(color=="fd665c"){
  switcher_link.attr('href',"css/colors/pale-red.css");
      var atrrHref = switcher_link.attr('href');
      $('body').css({
         backgroundColor: '#' + color,
          
      });   
}


















  /*STYLESHEETS LOAD ENDS*/
  
  
  
  
     
    $.cookie("portable_cookie_pattern", null);   
    $.cookie("portable_cookie_bgimage",null);

    $.cookie("portable_cookie_color", color);  
    $.cookie("portable_cookie_skins", atrrHref);
    $.cookie("portable_cookie_defaultBg", defaultPattern);    
    return false;
  
   });  
   
  var color = $.cookie("portable_cookie_color");
  var portable_skins = $.cookie("portable_cookie_skins");
  var defaultPattern = $.cookie("portable_cookie_defaultBg");
  var pattern = $.cookie("portable_cookie_pattern");
  
  if (portable_skins) {
    $("#style-color").attr("href",portable_skins);
    $('body').css({
        backgroundColor: '#' + color,
        
    });
  }

  $('#style-switcher a.bg-box').click(function (e) {
      e.preventDefault();
      var patternUrl = 'url(images/background-patterns/' + $(this).attr('data-rel') + '.jpg)';
      $('body').css({
          backgroundImage: patternUrl,
          backgroundRepeat: "repeat"
      });
      $.cookie("portable_cookie_bgimage",null);
      $.cookie("portable_cookie_pattern", patternUrl)
  });
  
  var defaultPattern = $.cookie("portable_cookie_defaultBg");
  var color = $.cookie("portable_cookie_color");
  var background = $.cookie("portable_cookie_bgimage");
  if (color) {
      $('body').css({
          backgroundColor: '#' + color,
          backgroundImage : defaultPattern
      });
  }
  var pattern = $.cookie("portable_cookie_pattern");
  if (pattern) {
      $('body').css({
          backgroundImage: pattern,
          backgroundRepeat: "repeat"
      });
  } else {
    if (background) {
        $('body').css({
          backgroundImage: background,
          backgroundRepeat: "repeat",
          backgroundPosition: "top center",
        
        });
    }    
  }  

  $('#style-switcher a.bg-box').each(function (i) {
    var backgroundUrl = 'url(images/background-patterns/' + $(this).attr('data-rel') + '.jpg)';
    var a = $(this);
      a.css({
          backgroundImage: backgroundUrl
      })
  })





  $('#style-switcher a.bg-box').click(function (e) {
      e.preventDefault();
      var backgroundUrl = 'url(images/background-patterns/' + $(this).attr('data-rel') + '.jpg)';
      $('body').css({
          backgroundImage: backgroundUrl,
          backgroundRepeat: "repeat",
        
        
      });
    $.cookie("portable_cookie_bgimage",backgroundUrl)
  });

  var background = $.cookie("portable_cookie_bgimage");
  if (background) {
      $('body').css({
        backgroundImage: background,
        backgroundRepeat: "repeat",
      
      
      });
  }
         
});   
 jQuery.noConflict()(function($){
$(document).ready(function() { 
  var originalFontSize = $('body').css('font-size');
 $(".resetFont").click(function(){
 $('body').css('font-size', originalFontSize);
 });
 // Increase Font Size
 $(".increaseFont").click(function(){
  var currentFontSize = $('body').css('font-size');
 var currentFontSizeNum = parseFloat(currentFontSize, 12);
   var newFontSize = currentFontSizeNum+1;
 $('body').css('font-size', newFontSize);
 return false;
 });
 // Decrease Font Size
 $(".decreaseFont").click(function(){
  var currentFontSize = $('body').css('font-size');
 var currentFontSizeNum = parseFloat(currentFontSize, 12);
   var newFontSize = currentFontSizeNum-1;
 $('body').css('font-size', newFontSize);
 return false;
 });
})
});

jQuery.noConflict()(function($){
$(document).ready(function() { 
    var originalFontSize = $(':header').css('font-size');
   $(".resetFontHeader").click(function(){
   $(':header').css('font-size', originalFontSize);
   });
 // Increase Font Size
 $(".increaseFontHeade").click(function(){
    var currentFontSize = $(':header').css('font-size');
   var currentFontSizeNum = parseFloat(currentFontSize, 12);
     var newFontSize = currentFontSizeNum+1;
   $(':header').css('font-size', newFontSize);
   return false;
 });
 // Decrease Font Size
 $(".decreaseFontHeader").click(function(){
    var currentFontSize = $(':header').css('font-size');
   var currentFontSizeNum = parseFloat(currentFontSize, 12);
     var newFontSize = currentFontSizeNum-1;
   $(':header').css('font-size', newFontSize);
   return false;
 });
})
});
;