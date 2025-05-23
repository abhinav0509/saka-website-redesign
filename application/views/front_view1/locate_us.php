<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<style>
.search-form-item {
margin-right:-7%;
}
.search-form-item .searchselect{width:128px;}
</style>
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
           j('#state').append("<option>Select</option>");
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
         j('#city').empty();
         j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/getcity',
          type: 'post',
          data: {'cntid':j(this).val()},
          success: function(data, status) {
           var obj = j.parseJSON(data);
           j('#city').append("<option>Select</option>");
           for(i=0;i<obj.length;i++)
              { 
                j('#city').append("<option value=\""+obj[i].city_id+"\">"+obj[i].name+"</option>");
              }
                         
           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      }); 
});

  j('#city').change(function(){
      j('#franch').empty();
       j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/getfranch',
          type: 'post',
          data: {'sid': j('#state').val(),'cid':j(this).val()},
          success: function(data, status) {
           var obj = j.parseJSON(data);
           j('#franch').append("<option>Select</option>");
           for(i=0;i<obj.length;i++)
              { 
                j('#franch').append("<option value=\""+obj[i].cus_id+"\">"+obj[i].institute_name+"</option>");
                 
               }
               
              
           },
         error: function(xhr, desc, err) {
          alret("error");
         }
      }); 
       
   });

   j('.mainBtn').click(function(){

    var sid=j('#state').val();
    var cid=j('#city').val();
    var fr=j('#franch').val();

    /*j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/getfranchadd',
          type: 'post',
          data: {'sid': sid,'cid':cid,'fr':fr},
          success: function(data, status) {
           var obj = j.parseJSON(data);
               
                 for(i=0;i<obj.length;i++)
                 {
                    var add=obj[i].address+","+obj[i].name+","+obj[i].State;      
                    getlatlong(obj[i].address+","+obj[i].name+","+obj[i].State,obj[i].cus_id,add);
                }          
              
           },
         error: function(xhr, desc, err) {
          alret("error");
         }
      }); */
       

        j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/getmapdata',
          type: 'post',
          data: {'sid': sid,'cid':cid,'fr':fr},
          success: function(data, status) {
          var obj = j.parseJSON(data);
               
              var map = new google.maps.Map(document.getElementById('map-canvas'), {
                zoom: 7,
                center: new google.maps.LatLng(19.751480, 75.713888),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;


                 for(i=0;i<obj.length;i++)
                 {
                      marker = new google.maps.Marker({
                    position: new google.maps.LatLng(obj[i].lati, obj[i].longi),
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(obj[i].institute_name);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
        
              
              j('#add').append("<div class='col-md-6' style='margin-top:-26px; margin-left:-15px;'><div class='grid-event-item'><div class='box-content-inner'><h5 class='event-title'><a href='javascript:void(0)'>"+obj[i].institute_name+"</a></h5><p>"+obj[i].address+"</p><p><ul style=\"list-style:none; margin-left:-41px;\"><li><i class=\"fa fa-phone\" ></i>  "+obj[i].cus_mobile+"</li><li><i class=\"fa fa-envelope\" ></i>  "+obj[i].femail+"</li></ul></p></div></div></div>");
                    //getlatlong(obj[i].address+","+obj[i].name+","+obj[i].State,obj[i].cus_id,add);
                }     
              
           },
         error: function(xhr, desc, err) {
          alret("error");
         }
      }); 

   });





});

/*function save_loc(cust_id,lat1,lng1,add)
{
  
      j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master/insertinloc',
          type: 'post',
          data: {'add': add,'f_id':cust_id,'lat':lat1,'lang':lng1},
          success: function(data, status) {
           //alert("saved");           
              
           },
         error: function(xhr, desc, err) {
          alret("error");
         }
      }); 


}*/



/*function getlatlong(obj,cust_id,add)
{
  
   j.ajax({
                type: "GET",
                dataType: "json",
                url: "http://maps.googleapis.com/maps/api/geocode/json",
                data: { 'address': obj, 'sensor': false },
                success: function (data) {
                    lat1 = data.results[0].geometry.location.lat;
                    lng1 = data.results[0].geometry.location.lng;
                   
                    save_loc(cust_id,lat1,lng1,add);
                },
                error: function () {
                    alert("Fail..");
                }
            });
}*/


function show_map()
{
    
    j.ajax({
                type: "GET",
                dataType: "json",
                url: "http://maps.googleapis.com/maps/api/geocode/json",
                data: { 'address': obj, 'sensor': false },
                success: function (data) {
                    lat1 = data.results[0].geometry.location.lat;
                    lng1 = data.results[0].geometry.location.lng;
                   
                    save_loc(cust_id,lat1,lng1,add);
                },
                error: function () {
                    alert("Fail..");
                }
            });

}

</script>





<?php $this->load->view('Front_view/contact_from'); ?>
<div class="container coursecontent">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="index.html">Home</a></h6>
                    <h6><span class="page-active">Franchisee</span></h6>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <!-- Here begin Main Content -->
            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-12">
                        <div class="widget-main">
                            <div class="widget-inner">
                                <div class="course-search">
                                    <h3><i class="fa fa-map-marker" ></i>&nbsp;&nbsp;&nbsp;Locate Us</h3>

                                    <form action="#" method="" id="quick_form" class="course-search-form">

                                       

                                        <div id="search_advanced" class="clearfix" style="margin-top:-25px;">
                                            <p class="search-form-item">
                                            <label class="alabel" for="Discipline">Select:</label>
                                            <select class="searchselect" id="city1" name="br">
                                                <option>Select</option>
                                                <option>Branch</option>
                                                <option>Franchise</option>
                                               
                                            </select>
                                           <p class="search-form-item">
                                            <label class="alabel" for="Campus">State:</label>
                                            <select class="searchselect" id="state" name="Campus">
                                                
                                                <!--<option value="Ballarat">Ballarat</option>
                                                <option value="Brisbane">Brisbane</option>
                                                <option value="Canberra">Canberra</option>
                                                <option value="Melbourne">Melbourne</option>
                                                <option value="North Sydney">North Sydney</option>
                                                <option value="Strathfield">Strathfield</option>-->
                                            </select>
                                            </p>
                                            <p class="search-form-item">
                                            <label class="alabel" for="Discipline">City:</label>
                                            <select class="searchselect" id="city" name="Discipline">
                                                
                                               
                                            </select>
                                            </p>
                                            <p class="search-form-item">
                                            <label class="alabel" for="Study_Level">Franchisee:</label>
                                            <select class="searchselect" id="franch" name="Study_Level">
                                                
                                                
                                            </select>
                                            </p>
                                           <!-- <p class="search-form-item select-yes">
                                            <label class="alabel" for="Online">Online:</label>
                                            <input value="Yes" id="Online" name="Online" type="checkbox">
                                            <span>Yes</span>
                                            
                                            <p class="search-form-item select-yes">
                                            <label class="alabel" for="International">International:</label>
                                            <input value="Yes" id="International" name="International" type="checkbox">
                                            <span>Yes</span>
                                            
                                            <p class="search-form-item select-yes">
                                            <label class="alabel" for="Midyear">Midyear Entry:</label>
                                            <input value="1" id="Midyear" type="checkbox" name="Midyear">
                                            <span>Yes</span>-->
                                            <p class="search-form-item select-yes">
                                            <input class="mainBtn" value="Search" type="button" style="margin-top:26px;" >
                                        </p>
                                        </div>
                                        
                                        <div class="widget-inner">
                                
                                    <div class="contact-map contact-map1">
                                            <div class="google-map-canvas" id="map-canvas" style="height: 325px;">
                                            </div>




                                    </div>

                                 

                            </div> <!-- /.widget-inner -->
                                        
                                        
                                    </form>





                                </div>

                          

                            </div> <!-- /.widget-inner -->

                               <div class="col-md-12">
                <div class="row" id="add">


                    

                </div> <!-- /.row -->

                

            </div> <!-- /.col-md-8 -->
                           


                        </div> <!-- /.widget-main -->
                        



                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->

                
               

            </div> <!-- /.col-md-8 -->
            



            <!-- Here begin Sidebar -->
            <div class="col-md-4">

               <div class="widget-main">
                    <div class="widget-main-title">
                       <h4 class="widget-title">Head office</h4>
                    </div> <!-- /.widget-main-title -->
                    <div class="widget-inner">
                      
                    <div class="prof-list-item clearfix">
                           
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Betty Hunt</h5>-->
                                <p class="small-text">
                                   <span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;College Of Computer Accountants
                                    311, 3rd Floor,
                                    Mahalaxmi Market, Near Desai Bandhu,
                                    Shanipar Chowk, Mandai Road, Shukrawar Peth
                                    Pune -411002
                                    
                                </p>
                                <p class="small-text">
                                    <i class="fa fa-phone"></i>&nbsp;&nbsp;020-32392121 / 09373703928
                                </p>
                                                              
                           </div> <!-- /.prof-details -->
                   </div> <!-- /.prof-list-item -->
                   
          
                </div> <!-- /.widget-inner -->
               </div> <!-- /.widget-main -->

               <div class="widget-main">
                    <div class="widget-main-title">
                        <h4 class="widget-title">Other branches</h4>
                    </div>
                    <div class="widget-inner">
                        <div class="prof-list-item clearfix">
                           <h5 class="prof-name-list"><span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;Pimpri- Branch</h5>
                            <div class="prof-details">
                                <!--<h5 class="prof-name-list">Prof. Betty Hunt</h5>-->
                                <p class="small-text">
                                        Office No 1,Jamthani Corner,
                                        Jaihind Highschool Chowk,
                                        Opp. Ganesh Hotel,
                                        Pimpri, Pune-411017
                                       
                                </p>
                                <p class="small-text">
                                        <i class="fa fa-phone"></i>&nbsp;&nbsp;09373703928 / 09145706205
                                </p>
                                                              
                           </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                          
                            <div class="prof-details">
                                <h5 class="prof-name-list"><span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;Corporate Office Dhule</h5>
                                <p class="small-text">
                                        23, Muncipal Colony,
                                        Neharu Nagar, Behind Deopur Church,
                                        W.B. Road,
                                        Deopur, Dhule - 424001
                                </p>
                                <p class="small-text">
                                     <i class="fa fa-phone"></i>&nbsp;&nbsp;09326059560 / 09373381119
                                </p>
                                
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                           
                            <div class="prof-details">
                                <h5 class="prof-name-list"><span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;Akurdi - Branch</h5>
                                <p class="small-text">
                                    Office No 4,
                                    ABC Complex, 
                                    opp. Akurdi Railway Station,
                                    Akurdi, Pune-411035
                                </p>
                                <p class="small-text">
                                    <i class="fa fa-phone"></i>&nbsp;&nbsp;9372499988 / 09326427400
                                </p>
                                
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                           
                            <div class="prof-details">
                                <h5 class="prof-name-list"><span><i class="fa fa-map-marker"></i></span>&nbsp;&nbsp;Hadapsar- Branch</h5>
                                <p class="small-text">
                                    Off.No 10, 3nd Floor,
                                    Dashmesh Aprt. Opp Nilkamal Mangal Karyalaya
                                    Pune- Solapur Road, Gadital
                                    Hadapsar, Pune.
                                </p>
                                <p class="small-text">
                                    <i class="fa fa-phone"></i>&nbsp;&nbsp;09326427400
                                </p>
                                
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->

                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->
               

            </div> <!-- /.col-md-4 -->
           
          


        </div> <!-- /.row -->
    </div> <!-- /.container -->

             
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
                zoom: 7,
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