
<?php $this->load->view('Front_view/contact_from'); ?>
<div class="container slidecontent">
        <div class="page-title clearfix">
            <div class="row">
                <div class="col-md-12">
                    <h6><a href="index.html">Home</a></h6>
                    <h6><span class="page-active">Employer's Request</span></h6>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
           
            <div class="col-md-8">
                <div class="contact-page-content">
                    <div class="contact-heading">
                        <h4><i class="fa fa-info-circle"></i>&nbsp;&nbsp;&nbsp;EMPLOYER DETAIL</h4>
                        <p></p>
                    </div>
                    <div class="contact-form clearfix">
                        <p class="full-row">
                            <span class="contact-label">
                                <label for="name-id">Name Of Company:</label>
                            </span>
                            <input type="text" id="cname" name="cname">
                        </p>
                        <p class="full-row"> 
                            <span class="contact-label">
                                <label for="surname-id">Name Of Organisation:</label>
                            </span>
                            <input type="text" id="onmae" name="oname">
                        </p>
                        <p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Name of Contact Person</label>
                            </span>
                            <input type="text" id="name" name="name">
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">E-Mail</label>
                            </span>
                            <input type="email" id="email" name="email">
                        </p>
						<p class="full-row">
                            <span class="contact-label">
                                <label for="email-id">Contact No:</label>
                            </span>
                            <input type="text" id="contact" name="contact">
                        </p>
                        <p class="full-row">
                            <span class="contact-label">
                                <label for="message">Select State:</label>
                            </span>
                            <select name="state" id="state" class="postform">
                                        <option value="">Select State</option>
                                        <option>Maharashtra</option>
                                        <!--<option class="level-0" value="49">Germany</option>
                                        <option class="level-0" value="56">United Kingdom</option>
                                        <option class="level-0" value="59">Italy</option>
                                        <option class="level-0" value="76">France</option>
                                        <option class="level-0" value="77">Belgium</option>
                                        <option class="level-0" value="79">Monaco</option>-->
                            </select>
                             
                        </p>
                         <p class="full-row">
                            <span class="contact-label">
                                <label for="message">Select City:</label>
                            </span>
                             <select name="city" id="city" class="postform">
                                        <option value="">Select City</option>
                                        <option>Maharashtra</option>
                                        <!--<option class="level-0" value="49">Germany</option>
                                        <option class="level-0" value="56">United Kingdom</option>
                                        <option class="level-0" value="59">Italy</option>
                                        <option class="level-0" value="76">France</option>
                                        <option class="level-0" value="77">Belgium</option>
                                        <option class="level-0" value="79">Monaco</option>-->
                            </select>
                        </p>
                        <p class="full-row">
                            <input class="mainBtn" type="submit" name="submit" value="Send Request">
                        </p>
                    </div>
                </div>
            </div> <!-- /.col-md-7 -->

              <div class="col-md-4">
                
                <?php $this->load->view('Front_view/emp_sidebar'); ?>

            </div> <!-- /.col-md-4 -->

        </div> <!-- /.row -->


    </div> <!-- /.container -->