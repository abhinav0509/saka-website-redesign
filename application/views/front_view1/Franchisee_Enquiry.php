
<script>
var j=jQuery.noConflict();
function sval()
{
    
    j("#stud").validate({

            rules:{
                    name_id:"required",
                    cont:"required",
                    cmp:"required",
                    msg:"required",
                    email_id:"required"
                },
            message:{
                    name_id:"Please Enter Your Full Name",
                    cont:"Please Enter Your Contact No",
                    cmp:"Please Enter Subject",
                    msg:"Please Fill The Information",
                    email_id:"Please Enter Your Email Id"
            }
        });
}

function sval1()
{
    
    j("#stud1").validate({

            rules:{
                    fname:"required",
                    finst:"required",
                    bAdd:"required",
                    stat:"required",,
                    cit:"required",
                    femail:"required",
                    fCont1:"required",
                },
            message:{
                    fname:"Please Enter Your Full Name",
                    finst:"Please Enter Your Institute Name",
                    bAdd:"Please Enter Buissness Address",
                    stat:"Please Select State",
                    cit:"Please Select City",
                    femail:"Please Enter Your Email Id",
                    fCont1:"Please Enter Contact No",
            }
        });
}


</script>

<div class="container">
        <div class="page-title clearfix coursecontent">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="index.html">Home</a></h6>
                    <h6><span class="page-active">Enquiry</span></h6>
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
			
				<form class="request-info clearfix" id="stud1" method="post" action="<?php echo base_url(); ?>index.php/welcome/franch_enquiry"> 
                  
				  <div class="col-sm-12">
				  <p><center><h2>Franchisee Enquiry Form</h2></center></p>
				  </div>
				  <div class="col-sm-6">
				  <div class="contact-form clearfix">
				  <p class="full-row">
                            <span class="contact-label">
                                <label for="name-id">Name:</label>
                                
                            </span>
                            <input type="text" id="fname" name="fname">
                        </p>
                       
                        <p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Instiute Name:</label>
                               
                            </span>
                            <input type="text" id="finst" name="finst">
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Current Business Address:</label>
                                
                            </span>
                            <!--<textarea name="bAdd" id="bAdd" rows="4" style="width:273px;"></textarea>--->
							<input type="text" id="bAdd" name="bAdd">
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">State:</label>
                                
                            </span>
                           <!--<input type="text" id="stat" name="stat">--->
						  <div class="input-select">
                                    <select name="stat" style="color:#999; -moz-appearance: none; width:46%;" id="stat" class="postform" placeholder="State">
                                        <option value="">Select</option>
										<option>Gujarat</option>
										<option>Maharastra</option>
										<option>Himachal Pradesh</option>
										<option>Mp</option>
										<option>Punjab</option>
										<option>Rajasthan</option>
										<option>Uttarakhand</option>
										<option>Other</option>
                                     </select>
                                </div> <!-- /.input-select -->  
						 
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">City:</label>
                                
                            </span>
                            <!--- <input type="text" id="cit" name="cit">--->
							 <div class="input-select">
                                    <select name="cit" style="color:#999; -moz-appearance: none; width:46%;" id="cit" class="postform" placeholder="">
                                        <option value="">Select</option>                                       
									   <option>Ahemadnagar</option>
										<option>Akola</option>
										<option>Amravati</option>
										<option>Aurangabad</option>
										<option>Beed</option>
										<option>Bhandara</option>
										<option>Buldhana</option>
										<option>Chalisgaon</option>
										<option>Chandrapur</option>
										<option>Chittaurgarh</option>
										<option>Chittorgarh</option>
										<option>Dehradun</option>
										<option>Dholpur</option>
										<option>Dhule</option>
										<option>Gadchirolli</option>
										
                                     </select>
                                </div> <!-- /.input-select -->  
                        </p>
						
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Email_ID:</label>
                                
                            </span>
                             <input type="email" id="femail" name="femail">
                        </p>
							
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Phone No(Std Code):</label>
                                
                            </span>
                             <input type="text" id="fCont1" name="fCont1">
                        </p>
						
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Mobile:</label>                                
                            </span>
                             <input type="text" id="fCont3" name="fCont3">
                        </p>	
							
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id"> Apply For Franchise at :</label>
                                </span>
                             <input type="text" id="grateful" name="grateful">
                        </p>	
							
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">In District :</label>
                                </span>
                             <input type="text" id="fDist" name="fDist">
                        </p>		
							<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Call on (Date):</label>
                                </span>
                             <input type="text" id="Call" name="Call">
                        </p>
						
						 <p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Between (eg.10am to 11am)</label>
                                </span>
                             <input type="text" id="Time" name="Time">
                        </p>
						
						
						
				  </div>
				   </div>
				   
				    <div class="col-sm-6">
				  <div class="contact-form clearfix">
				 
					<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">No_Of Computers :</label>
                                </span>
                             <input type="text" id="Comp" name="Comp">
                        </p>
				 
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">No. of Employees :</label>
                                </span>
                             <input type="text" id="No_Emp" name="No_Emp">
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">No of Trainers :</label>
                                </span>
                             <input type="text" id="trainer" name="trainer">
                        </p>
						
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">No of Counselors :</label>
                                </span>
                             <!---<input type="text" id="Conclusin" name="Conclusin">--->
							<div class="input-select">
                                    <select name="Conclusin" style="color:#999; -moz-appearance: none; width:46%;" id="Conclusin" class="postform" placeholder="">
                                        <option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
										<option>9</option>
										<option>10</option>
										<option>10+</option>
                                     </select>
                                </div> <!-- /.input-select -->  
							 
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Since (Year):</label>
                                </span>
                             <!--<input type="text" id="Since_Year" name="Since_Year">--->
							 <div class="input-select">
                                    <select name="Since_Year" style="color:#999; -moz-appearance: none; width:46%;" id="Since_Year" class="postform" placeholder="">
                                        <option>1980</option>
										<option>1981</option>
										<option>1982</option>
										<option>1983</option>
										<option>1984</option>
										<option>1985</option>
										<option>1986</option>
										<option>1987</option>
										<option>1988</option>
										<option>1989</option>
										<option>1990</option>
										<option>1991</option>
										<option>1992</option>
										<option>1993</option>
										<option>1994</option>
										<option>1995</option>
										<option>1996</option>
										<option>1997</option>
										<option>1998</option>
										<option>1999</option>
										<option>2000</option>
										<option>2001</option>
										<option>2002</option>
										<option>2003</option>
										<option>2004</option>
										<option>2005</option>
										<option>2006</option>
										<option>2007</option>
										<option>2008</option>
										<option>2009</option>
										<option>2010</option>
										<option>2011</option>
										<option>2012</option>
										<option>2013</option>
										<option>2014</option>
										<option>2015</option>
                                     </select>
                                </div> <!-- /.input-select -->  
                        </p>
						
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">To(Year):</label>
                                </span>
                            <!-- <input type="text" id="To_Year" name="To_Year">-->
							 <div class="input-select" style="">
                                    <select name="To_Year" style="color:#999;-moz-appearance: none; width:46%;" id="To_Year" class="postform" placeholder="">
                                        <option>1980</option>
										<option>1981</option>
										<option>1982</option>
										<option>1983</option>
										<option>1984</option>
										<option>1985</option>
										<option>1986</option>
										<option>1987</option>
										<option>1988</option>
										<option>1989</option>
										<option>1990</option>
										<option>1991</option>
										<option>1992</option>
										<option>1993</option>
										<option>1994</option>
										<option>1995</option>
										<option>1996</option>
										<option>1997</option>
										<option>1998</option>
										<option>1999</option>
										<option>2000</option>
										<option>2001</option>
										<option>2002</option>
										<option>2003</option>
										<option>2004</option>
										<option>2005</option>
										<option>2006</option>
										<option>2007</option>
										<option>2008</option>
										<option>2009</option>
										<option>2010</option>
										<option>2011</option>
										<option>2012</option>
										<option>2013</option>
										<option>2014</option>
										<option>2015</option>
                                     </select>
                                </div> <!-- /.input-select -->  
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Students passed out previous year :</label>
                                </span>
                             <input type="text" id="Stud" name="Stud">
                        </p>
						
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">No of Year in Current Business :</label>
                                </span>
                             <input type="text" id="Busi" name="Busi">
                        </p>
						
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Branches (If any):</label>
                                </span>
                             <input type="text" id="Bran" name="Bran">
                        </p>
						
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Locations (If any) :</label>
                                </span>
                             <input type="text" id="Loc_Bran" name="Loc_Bran">
                        </p>
						
						<p class="full-row">
						<span class="contact-label">
						<label for="email-id">User Name</label>
						</span>
						<input type="text" name="uname" name="uname">
						</p>
						
						<p class="full-row">
						<span class="contact-label">
						<label for="email-id">Password</label>
						</span>
						<input type="password" name="psw" name="psw">
						</p>
						
				  </div>
				  <p class="full-row">
                            <input class="mainBtn" type="submit" name="submit" value="Send Message" onclick="return sval()" />
                        </p>
				   </div>
				   
                    </form>
			
			
		</div>
				</div>
            </div> <!-- /.col-md-8 -->

        </div> <!-- /.row -->
    </div> <!-- /.container -->