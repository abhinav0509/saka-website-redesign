<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#about").removeClass("active");
    $("#home").removeClass("active");
    $("#course").removeClass("active");
    $("#placement").addClass("active");
    $("#studmnu").removeClass("active");
    $("#franmnu").removeClass("active");
    $("#brandmnu").removeClass("active");
    $("#galmnu").removeClass("active");
    $("#cntmnu").removeClass("active");
 });   
</script>
<script>
var j=jQuery.noConflict();
j(document).ready(function(){
map_data();
j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master',
          type: 'post',
          data: {'action': 'Country'},
          success: function(data) {
           
           var obj = j.parseJSON(data);
           j('#state').append("<option value=''>Select State</option>");
         
           for(i=0;i<obj.length;i++)
              { 
                 j('#state').append("<option value=\""+obj[i].state_id+"\">"+obj[i].name+"</option>");
                
               }

           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      });


j('#state').change(function(){
         j('#Discipline').empty();
         j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/get_Franch',
          type: 'post',
          data: {'cntid':j(this).val()},
          success: function(data, status) {
           var obj = j.parseJSON(data);
           j('#Discipline').append("<option value="+" "+">Select Franchisee</option>");
          
           for(i=0;i<obj.length;i++)
              { 
                j('#Discipline').append("<option value=\""+obj[i].fran_id+"\">"+obj[i].institute_name+"</option>");
              }
                

           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      }); 


});

});


function get_details(pi)
{
    
    
    
    
    var st_id=j('#Discipline').val();
    
    var fname="";
    j('#tdata').empty();
     j('#dett').html("");
    j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/get_placed_details',
          type: 'post',
          data: {'frid':st_id,'page_index':pi},
          success: function(data, status) {
          var obj = j.parseJSON(data);
          var obj1=obj['data1'];
          var obj2=obj['data2'];
          var obj3=obj['data3'];
          var obj4=obj['data4'];
          var obj5=obj['data5'];

          var obj6=obj['data6'];

          for(i=0;i<obj2.length;i++)
              { 
                 var op="";
                 fname=obj2[i].fname; 
                 var path='<?php echo base_url(); ?>uploads/FranPlacement/'+obj2[i].image;
                 
                 op ="<div class='col-md-3'>";
                 op +="<div class='lms_our_partner_item'> <img src="+path+" alt="+obj2[i].sname+" /><br/>";
                 op +="<p class='stname'><i class=\"fa fa-user\"></i> "+obj2[i].sname+"</p><hr />";
                 op +="<p class='odet'><b>Company</b> - <span>"+obj2[i].cname+"</span><br/>";
                 op +="<b>Post</b> - <span style='padding-left:28px;'>"+obj2[i].designation+"</span></br/>";
                 op +="<b>Package</b> - <span style='padding-left:10px;'>"+obj2[i].salary+"</span></p>";
                 op +="</div></div>";

                 j('.std_det').append(op);

              }
               
                  

               j('#tdata').append("<tr align='center'><td>"+fname+"</td><td>"+obj4.length+"</td><td>"+obj3.length+"</td></tr>");
               j('.add').html("<p>"+obj1[0].address+"</p>");
               
               var map = new google.maps.Map(document.getElementById('map-canvas'), {
                zoom: 6,
                center: new google.maps.LatLng(obj5[0].lati, obj5[0].longi),
                mapTypeId: google.maps.MapTypeId.ROADMAP
              });
                
                var infowindow = new google.maps.InfoWindow();

                var marker, i;
                    marker = new google.maps.Marker({
                    position: new google.maps.LatLng(obj5[0].lati, obj5[0].longi),
                    map: map
                  });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent("<h6>"+fname+"<h6>"+obj5[0].address);
                       
                        infowindow.open(map, marker);
                        }
                    })(marker, i));


                     j(".pager").ASPSnippets_Pager({
                    ActiveCssClass: "current",
                    PagerCssClass: "pager",
                    PageIndex: pi,
                    PageSize: 8,
                    RecordCount:obj6.length
                   });

                j(".pager .page").on('click', function () {
                            get_details(parseInt(j(this).attr('page')));
                            PageIndexCurrent = parseInt(j(this).attr('page'));
                        });

               
           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      });

}
</script>

<style>
.lms_our_partner_item {
    border: 1px solid #ccc;
}
.lms_our_partner_item img{
    margin-left:50px;
}
.stname {
    font-size: 16px;
    font-weight: 400;
    padding-left: 68px;
}
.odet {
    font-family: calibri;
    font-size: 13px;
    padding-left: 10px;
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

</style>

<!-- page title Start -->
<div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
   <div class="container"> 
    
    <div class="lms_title">FRANCHISEE PLACEMENT</div>
    <div class="pull-right">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active"> FRANCHISEE PLACEMENT</li>
      </ol>
    </div>
    
   </div>
  </div>
</div>
<!-- page title end -->

<!--main container start-->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="lms_title_center">
           
            
          </div>
        </div>
      </div>
      
      
       <div class="row"> 
    <!--blog single page start-->
    
    <div class="col-lg-6 col-md-6 col-sm-7">
   <h4 class="widget-title"><i class="fa fa-info-circle"></i> Our Placements</i></h4>
       <div class="col-md-4">
         <div class="form-group">
                  <label for="login_email">Select State</label>
                  <select name="state" id="state" class="form-control">
                                                          
                  </select>
           </div>
     </div>
     
     <div class="col-md-4">
        <div class="form-group">
                  <label for="login_email">Select Franchise</label>
                  <select name="Discipline" id="Discipline" class="form-control">
          
                   </select>
           </div>
     </div>
     
   
     
     <div class="col-md-4">
     
       <button type="button" onclick="get_details(1)" class="btn btn-default" style="margin-top: 22px; !important">View</button>
     </div>
  
  
<div class="row">
      <div class="col-lg-12 col-md-12">
          <div class="google-map-canvas" id="map-canvas" style="height: 230px; width:100%;">
      </div>        
  </div>
</div>
  
  <!--Our Partners start-->
<div  style="margin-top:70px;"class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="lms_title_center">
        
       
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="lms_our_partner">
        <div id="" class="std_det">
            
            


        </div>
        
      </div>
    </div>
  </div>
</div>
<!--Our Partners end-->

  
  
  
  
  
  
  </div>
  
  
  
    
    <!--blog single page end--> 
    
    <!--sidebar start-->
    <div  class="col-lg-6 col-md-6 col-sm-5">
  
  
  
      <div class="lms_sidebar_item">
        <div class="panel-group" id="accordion">
          <div style="margin-top:10px;" class="panel panel-default">
            
      <div class="widget-main-title tt" style="padding:20px;">
                        <h4 class="widget-title"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Franchisee Address</h4>
            
                    </div>
                    <p class="add"></p>

                    <hr />
          
          <div class="widget-main">
                    <div class="widget-main-title tt" style="padding-bottom: 10px; padding-left: 14px; padding-top:11px;">
                        <h4 class="widget-title"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Placement Info</h4>
                    </div>
                    <div class="widget-inner wt wtt">
                           <div class="table-responsive">
                                  <table id="ProductDa" class="table table-hover table-bordered" name="table">
                                      <thead style="background-color:#3678B2;color:#FFF;">
                                          <tr align="center">
                                               
                                              <th style="text-align:center;">Franchisee</th>
                                              <th style="text-align:center;">Student Placed</th> 
                                              <th style="text-align:center;">No Of Employer's</th>      
                                             
                                             
                                          </tr>
                                      </thead>
                                      <tbody id="tdata"> 
<td>CCA</td>                    
          <td>10</td>                   

<td>20</td>                   
      
                                      </tbody>
                                  </table>    

                          </div>
                    </div> <!-- /.widget-inner -->
            </div>
          
           
          </div>
          
        </div>
      </div>
     
      
    </div>
    <!--sidebar end--> 
  </div>
  
</div>
<!--main container end-->
</div>

 <script type="text/javascript">
           /*var locations = [
                ['Mahalaxmi Market, Near Desai Bandhu,hanipar Chowk, Mandai Road, Shukrawar PethPune', -33.890542, 151.274856],
                ['Jaihind Highschool Chowk,Opp. Ganesh Hotel,Pimpri, Pune', -33.923036, 151.259052],
                ['Cronulla Beach', -34.028249, 151.157507],
                ['Manly Beach', -33.80010128657071, 151.28747820854187],
                ['Maroubra Beach', -33.950198, 151.259302]
            ];*/
      function map_data()
      {      
            var locations = [
                ['10/65,3 Shrinath Appartment, Dhanya Galli, Near Federal Bank ,Kolhapur, 416115', 16.676676, 74.458424],
                ['Saoner Road Brahmani Phata Kalmeshwar Nagpur,  441501', 21.232102, 78.917960],
                ['Sudarshan Colony, Near Bagal High Scholl, Temblaiwadi, Kolhapur 416005', 16.695060, 74.269284],
                ['1st Floor ,Swastik Apartment,Opp.Old Hudkeshwar Naka,Hudkeshwar Road,Nagpur 440034', 21.085950, 79.124584],
                ['Pawade Complex, Near Dattawadi Bus Stand, Wadi Nagpur-23  440023', 21.135081, 79.058613],
                ['Pradeep Plaza, Near Tahsil Kacheri, Daund  Pune  413801', 18.463056, 74.578889],
                ['Vishnuprasad Apartment, Nr. Dandekar Bazar, Vishrambag, Sangli  416415', 16.845357, 74.601978],
                ['9a,Nira Palm Soc., Near Ashok Nagar, Vijapur Road,Solapur , 413004',17.631645, 75.894552],
                ['R-98 Awanti Nagar First Phase Behind Ganesh Vitthal Mandir Old Poona Naka Murarji Peth Solapur - 413001',17.673044, 75.907127],
                ['Vittal Market , Karanja Chowk Akalkot , solapur 413216',17.524216, 76.205442],
                ['Opp Tahsil Office College Road Partur Jalna 431501',19.585756, 76.213349],
                ['A-244, Karnik Nagaer, Solapur  413006',17.667248, 75.936889],
                [' At-Post-Zirad , Alibag  402201',18.655394, 72.867082],
                ['Opp. Market Yard Raod Near Shivanubhav Mantap Ram Building Jath 416404',17.049996, 75.213501],
                ['Atharva Complex, Navanathnagar , Rahata Ahemadnagar  423107',19.670072, 74.476009]
            ];

            var map = new google.maps.Map(document.getElementById('map-canvas'), {
                zoom: 6,
                center: new google.maps.LatLng(19.751480, 75.713888),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }

       }     
        </script>