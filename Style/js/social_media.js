

 var j=jQuery.noConflict();
 j(document).ready(function() { 

 j('.tweetsreply').click(function() {                  
    var ids="#"+j(this).prop("name")+"reply";
    j(ids).show();
    });

  j('.tweetsreply').click(function() {                  
    var ids="#"+j(this).prop("name")+"reply";
    j(ids).show();
    });
 j('.reply').keypress(function(event) { 
                 
                if(event.which == 13) { 
                 alert(j(this).val());
                 var ids=j(this).prop("name"); 
                 var snm=j(this).prop("placeholder"); 
                 alert(ids);
                 var mes=j(this).val();
                 alert(snm);
               
                 j.ajax({
         	
              		url: "dashboard/check",
             		 type:'POST',
              		
             		 data: {'msg':mes,'status_id':ids,'sname':snm},

              	success: function(data) {
                  	alert(data);                   
                  	j(this).after("<input type='hidden' id='bid' value='" + bid + "' name='bid'/>");
                   
                   } 
             	});
             return false;
                        
             }                 
             });


j('.retweet').click(function(event) { 
                 
                alert("Hello");
                 //alert(j(this).val());
                 var ids=j(this).prop("name");
                 var ids1=j(this).prop("name")+"t"; 
                  var ids2="#"+j(this).prop("name")+"reply1";
                 //alert(ids);
                 alert(ids1);
                   
  
                 j.ajax({          
                  url: "dashboard/check_retweet",
                  type:'POST',
                  data: {'status_id':ids},
                  success: function(data) {
                    alert(data);
                    var d=j.parseJSON(data);
                    j('.retweet').after("<input type='hidden' class='" + ids1 + "' value='" + d + "' name=bid />");
                    alert(ids1);            
                   } 
              });
				      j(ids2).show();
              j(this).hide();
				 
             return false;
                        
                         
             });

j('.undoretweet').click(function(event) { 
                 
                alert("Hello");
                
                 var ids=j(this).prop("name");
                 var ids1="."+j(this).prop("name")+"t";
                 var ids2="#"+j(this).prop("name")+"ret"; 
                 alert(ids2);
                
                 var value=j(ids1).val();

                 alert(value);
                   
  
                 j.ajax({          
                  url: "dashboard/delete_retweet",
                  type:'POST',
                  data: {'status_id':value},
                  success: function(data) {
                    alert(data);
                              
                   } 
              });
              j(ids2).show();
              j(this).hide();
         
             return false;
                        
                         
             });


j('.favorite').click(function(event) { 
                 
                alert("Hello");
                 //alert(j(this).val());
                 var ids=j(this).prop("name"); 
                 alert(ids);
                   
                 
                 j.ajax({
          
                  url: "dashboard/make_favorite",
                 type:'POST',
                  
                 data: {'status_id':ids},

                success: function(data) {
                    alert(data);                   

              } 
          });
             return false;
                        
                         
             });


j("#tdata td").find("p").slimscroll({
    
	height:'150px',
	wheelStep:1
});



 });;