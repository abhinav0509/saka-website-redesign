<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/Style/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/Style/js/jquery.slimscroll.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#about").removeClass("active");
    $("#home").removeClass("active");
    $("#course").removeClass("active");
    $("#placement").removeClass("active");
    $("#studmnu").removeClass("active");
    $("#franmnu").addClass("active");
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
       j('#details').html("");

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
        
              
                 j('#details').append("<div class='col-lg-4 col-md-4 col-sm-4'><h4 style='font-size:14px;'><i class='fa fa-map-marker'></i> "+obj[i].institute_name+"</h4><hr ><p>"+obj[i].address+"</p></div>");
                   
                }     
              
           },
         error: function(xhr, desc, err) {
          alret("error");
         }
      }); 

   });

	

j('#accordion').slimScroll({
    position: 'right',
   height:'420px',
    railVisible: true,
    alwaysVisible: true
});
j('#accord').slimScroll({
    position: 'right',
   height:'250px',
    railVisible: true,
    alwaysVisible: true
});
});  
</script>
<style>
#accord{
border: 1px solid #CCCCCC;
}
.lms_sidebar_rp ul li {
    width: 100%;
    float: left;
    margin-bottom: 2px;
    padding: 11px;
}
</style>

<!-- page title Start -->
<div class="lms_page_title">
  <div class="lms_page_title_bg" data-stellar-background-ratio="0.5"></div>
  <div class="lms_page_title_bg_overlay">
   <div class="container"> 
    
    <div class="lms_title"> Locate Us</div>
    <div class="pull-right">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active"> Locate Us</li>
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
      
      
       <div style="margin-top:30px;" class="row"> 
    <!--blog single page start-->
    
    <div class="col-lg-8 col-md-8 col-sm-7">
       <div class="col-md-3">
         <div class="form-group">
                  <label for="login_email">Select State</label>
                  <select name="state" id="state" class="form-control">
                                                          
                  </select>
           </div>
     </div>
     
     <div class="col-md-3">
        <div class="form-group">
                  <label for="login_email">Select City</label>
                  <select name="city" id="city" class="form-control">
           
                  </select>
           </div>
     </div>
     
     <div class="col-md-3">
          <div class="form-group">
                  <label for="login_email">Select Branch</label>
                  <select name="franch" id="franch" class="form-control">
            
                  </select>
           </div>
     </div>
     
     <div class="col-md-3">
     
       <button type="button" class="mainBtn btn btn-default" style="margin-top: 22px; !important">Submit</button>
     </div>
  
  
  
  <div class="row">
      <div class="col-lg-12 col-md-12">
          <div class="google-map-canvas" id="map-canvas" style="height: 350px; width:100%;">
      </div>        
  </div>




 
  </div>
  
  
  
  
   <div style="margin-top:26px;" class="row" id="details">
    
  </div>
  
  
  
  
  
  </div>
    
    <!--blog single page end--> 
    
    <!--sidebar start-->
    <div  class="col-lg-4 col-md-4 col-sm-5">
  
  
  
    <div class="lms_sidebar_item" >
        <div class="panel-group" id="accordion" style="height:420px;" >
         <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><b>Our Own Franchisee</b></a> </h4>
            </div>

            <div class="panel-body" id="panel_body" >
                <div class="lms_sidebar_rp" style="margin-left:5px;">
                <ul style="list-style:none;" > 
					  <?php 
					  foreach($contact as $cont){ 
					  if($cont['ftype']=="Our Own Franchisee"){
					?>
					<li>
                    <p><?php echo '<b>'.$cont['fname'].'</b>'; ?></p>
                    <p><?php echo $cont['Addd'];?></p>
					<?php $no=explode(',', $cont['Contact']);
					foreach($no as $n)
					{
						$nn="+91-".$n;
					
					?>
					<p style="display: inline-block; padding-left: 5px;"> <i class="fa fa-phone"></i>&nbsp;<?php echo $nn;}?></p>
					</li>
					  <?php  }} ?>  
				</ul>
				</div>
			</div>
		</div>
		
        </div> </br></br>
		 <div class="panel-group" id="accord" >
		<div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><b>Associate Franchise Partner</b></a> </h4>
            </div>

            <div class="panel-body" id="panel_body">
                <div class="lms_sidebar_rp" style="margin-left:5px;">
				<ul style="list-style:none;">
				<?php 
				  foreach($contact as $cont){  
				  if($cont['ftype']=="Associate Franchise Partner"){
				 ?>
				<li>
                    <?php echo '<b>'.$cont['fname'].'</b>'; ?>
                    <p><?php echo $cont['Add'];?></p>
					<?php $no=explode(',', $cont['Contact']);
					foreach($no as $n)
					{
						$nn="+91-".$n;
					
					?>
					<p> <i class="fa fa-phone"></i>&nbsp;<?php echo $nn; }?></p>
				</li>
				  <?php } } ?>
				  </ul>
				</div>
            </div>
          </div>
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