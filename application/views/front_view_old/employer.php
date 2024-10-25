<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

 <script src="<?php echo base_url();?>Style/bootstrap-datepicker.js"></script>
<script>
var j=jQuery.noConflict();
j(document).ready(function(){

var dt= new Date();

   j('#doa').datepicker({
        autoclose: true,
        todayHighlight: true,
       dateFormat: 'dd-mm-yy',
       onSelect: function(dateText){
            getDuration();
       }
    });

   
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
	
	
	

});

</script>


<style>
.mainBtn {
    margin-left: 500px;
    margin-top: 25px;
}
</style>

<div class="container">
        <div class="page-title clearfix coursecontent">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="index.html">Home</a></h6>
                    <h6><span class="page-active">Employee Request</span></h6>
                    <div class="grid-or-list">
                        <ul>
                            <li><a href="#"><i class="fa fa-th"></i></a></li>
                            <li><a href="#"><i class="fa fa-list"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">

            <!-- Here begin Main Content -->
            <div class="col-md-12">
			<div class="widget-main">
			
				<form class="request-info clearfix" id="stud1" name="stud1" role="form" method="post" action="<?php echo base_url(); ?>index.php/Employee1/Save_Data" enctype="multipart/form-data"> 
                  <div class="row">
				  <div class="col-sm-12">
						   <div class="contact-heading">
								<p><center><h2><i class="fa fa-user"></i>Employer Detail</h2></center></p>
							</div>
                            <hr />


				  </div>
        
          <div class="col-md-12" style="margin-left: 50px !important;">    
			<div class="col-sm-6">
          <p class="full-row">
                        <?php if(isset($message)) { ?>
                            <div class="alert alert-success">
                                    <strong><?php echo $message; ?></strong>
                                </div>
                         <?php } ?>       
                            
                        </p>

              <input type="hidden" name="st_name" id="st_name" />
              <input type="hidden" name="ct_name" id="ct_name" />
              <input type="hidden" name="lat" id="lat" />           
              <input type="hidden" name="lng" id="lng" />

				  <div class="contact-form clearfix">
				        <p class="full-row">
                            <span class="contact-label">
                                <label for="name-id">Name Of Company:</label>
                            </span>
                            <input type="text" id="cname" name="cname" required>
                        </p>
						
                        <p class="full-row"> 
                            <span class="contact-label">
                                <label for="surname-id">Address:</label>
                            </span>
                             <input type="text" id="add1" name="add1" required>
                        </p>
                        
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Name of Contact Person</label>
                            </span>
                            <input type="text" id="name" name="name" required>
                        </p>
						
						
                 <p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">E-Mail</label>
                            </span>
                            <input type="email" id="email" name="email" required>
                        </p>
						
						
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Contact No:</label>
                            </span>
                            <input type="text" id="contact" name="contact" required>
                        </p>  
								  
						 
                        					
				  </div>
			</div>
				
			<div class="col-sm-6">
				  <div class="contact-form clearfix">
						<p class="full-row">
                            <span class="contact-label">
                                <label for="message">Select State:</label>
                            </span>
                          <select class="searchselect" id="state" name="state" value="dddd" required>
                                                
                          </select>
                             
                        </p>
                
				<p class="full-row">
                            <span class="contact-label">
                                <label for="message">Select City:</label>
                            </span>
                            <select class="searchselect" id="city" name="city" required>
                            </select>
                                            
                        </p>
						
						<p class="full-row">
                            <span class="contact-label">
                                <label for="message">Vacancy:</label>
                            </span>
                             <input type="text" id="vacancy" name="vacancy" required>
                        </p>
							
						<p class="full-row">
                            <span class="contact-label">
							<label for="message">Date:</label>
                            </span>
						<input type="text" id="doa" name="doa" class="form-control" data-rel="datepicker" value="<?php echo date('d/m/Y'); ?>" required title="Please Select Admission Date" />
						</p>
							
						
						<p class="full-row">
                            <span class="contact-label">
							<label for="message">Logo:</label>
                            </span>
							<input type="file" name="upload" id="upload" required>
						</p>
						
						 <p class="full-row">
                            <input class="mainBtn" type="submit" name="submit" value="Send Request">
                        </p>
				
				 
					
		    </div>

		</div>	
      </div>
    
                    </form>
			
			
		</div>
				
				
            </div> <!-- /.col-md-8 -->

        </div> <!-- /.row -->
    </div>
    </div> <!-- /.container -->
