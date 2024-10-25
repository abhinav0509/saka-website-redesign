<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
 <script src="<?php echo base_url(); ?>style/js/animationEnigne.js"></script> 
 <script src="<?php echo base_url();?>Style/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
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
<style>
.search-form-item input[type="button"] {
    margin-top: 0;
    width: 53%;
}
.course-search-form select {
    border: 1px solid;
    height: 32px;
    padding: 0 2px;
    width: 195px;
}
.small-text1 {
    margin-left: 2px;
    margin-top: -10px;
    width: auto;
}
.small-text2 {
    margin-left: 2px;
    width: auto;
}
.wtt{padding: 6px;}
.wt p{text-align: left;}
#get_search{margin-left: 85px;}
#Discipline {
    margin-left: 43px;
}
.course-search-form input{
    border: 1px solid;
    height: 32px;
    padding: 0 22px;
}
</style>
<script>
var j=jQuery.noConflict();
j(document).ready(function(){

j.ajax({
          url: '<?php echo base_url(); ?>index.php/State_master',
          type: 'post',
          data: {'action': 'Country'},
          success: function(data) {
           
           var obj = j.parseJSON(data);
           j('#campus').append("<option value=''>Select State</option>");
         
           for(i=0;i<obj.length;i++)
              { 
                 j('#campus').append("<option value=\""+obj[i].state_id+"\">"+obj[i].name+"</option>");
                
               }

           },
         error: function(xhr, desc, err) {
          alert("error");
         }
      });


j('#campus').change(function(){
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
    var op="";
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
                 fname=obj2[i].fname; 
                 var path='<?php echo base_url(); ?>uploads/FranPlacement/'+obj2[i].image;
                 op ="<div class=\"col-md-4\">";
                 op +="<div class='widget-main animated1' data-animtype='rollIn' data-animrepeat='0' data-animspeed='1s' data-animdelay='0s'>";
                 op +="<div class='blog-comments-content' style='margin-top:-17px; margin-bottom:5px;'>";
                 op +="<div class=\"media\"><div class=\"pull-left\" href='#'>";
                 op +=" <img class=\"media-object\" src='"+path+"' style='height:100px; width:90px;' alt=''>";
                 op +="</div><div class=\"media-body\">";  
                 op +="<h4 class=\"media-heading\">"+obj2[i].sname+"</h4>";
                 op +="<p class=\"small-text2\"><i class=\"fa fa-globe\"></i>&nbsp;"+obj2[i].designation+"</p></div>";
                 op +="<p class=\"small-text small-text1\"><i class=\"fa fa-building\"></i>&nbsp;"+obj2[i].cname+"</p>"
                 op +="<p class=\"small-text small-text1\"><i class=\"fa fa-inr\"></i>&nbsp;"+obj2[i].salary+"</p> ";
                 op +="</div></div></div></div>";
                 j('#dett').append(op);   
              }
               j('#tdata').append("<tr align='center'><td>"+fname+"</td><td>"+obj4.length+"</td><td>"+obj3.length+"</td></tr>");
               j('.add').html("<p>"+obj1[0].address+"</p>");
               zEng();
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
                    PageSize: 6,
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


<?php $this->load->view('Front_view/contact_from'); ?>
<div class="container slidecontent">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="index.html">Home</a></h6>
                    <h6><span class="page-active">Franchisee Placement</span></h6>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <!-- Here begin Main Content -->
            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12">
                        <div class="widget-main">
                            <div class="widget-inner">
                                <div class="course-search">
                                    <h3>Our Placements</h3>

                                    <form action="#" method="" id="quick_form" class="course-search-form">
										<div id="search_advanced" class="clearfix" style="height:190px;">
                                            
                                            <p class="search-form-item">
                                            <label class="alabel" for="Campus">Sate:</label>
                                            <select class="searchselect" id="campus" name="campus">
                                              
                                            </select>
                                            </p>
                                            <p class="search-form-item">
                                            <label class="alabel" for="Discipline" style="margin-left:45px;">Franchisee:</label>
                                            <select class="searchselect" id="Discipline" name="Discipline">
                                               
                                            </select>

                                            <p class="search-form-item btt">
                                            
                                             <input class="mainBtn bttn" id="get_search" onclick="get_details(1)" value="View" type="button" style="margin-top:25px;">
                                            
                                            
                                        </div>
                                       
                                    </form>

                                    <div class="contact-map2">
                                            <div class="google-map-canvas" id="map-canvas" style="height: 170px;">
                                            </div>
                                    </div>

                                </div>
                            </div> <!-- /.widget-inner -->
                        </div> <!-- /.widget-main -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
						
                

              
            </div> <!-- /.col-md-8 -->


            <!-- Here begin Sidebar -->
            <div class="col-md-6">

                <div class="widget-main">
                    <div class="widget-main-title tt" style="padding:20px;">
                        <h4 class="widget-title"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Franchisee Address</h4>
                    </div>
                    <div class="widget-inner wt add">
                       
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->

				<div class="widget-main">
                    <div class="widget-main-title tt" style="margin-top:24px; padding:22px;">
                        <h4 class="widget-title"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Placement Info</h4>
                    </div>
          					<div class="widget-inner wt wtt">
                           <div class="table-responsive" >
                                  <table id="ProductDa" class="table table-hover table-bordered" name="table">
                                      <thead style="background-color:#3678B2;color:#FFF;">
                                          <tr align="center">
                                               
                                              <th style="text-align:center;">Franchisee</th>
                                              <th style="text-align:center;">Student Placed</th> 
                                              <th style="text-align:center;">No Of Employer's</th>      
                                             
                                             
                                          </tr>
                                      </thead>
                                      <tbody id="tdata">      
                                          
                                      </tbody>
                                  </table>    

                          </div>
                    </div> <!-- /.widget-inner -->
      			</div> <!-- /.widget-main -->
				
				
                <div class="widget-main">
                  
                </div> <!-- /.widget-main -->

            </div> <!-- /.col-md-4 -->
    
        </div> <!-- /.row -->
		
		<div class="col-md-12">
		<div class="row" >
                    <div class="col-md-12" id="dett">
                        
                        
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
                <div class="pager">
                                 
                 </div>
            </div>
		
		
    </div> <!-- /.container -->

      