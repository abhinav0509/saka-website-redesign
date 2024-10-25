<script src="<?php echo base_url(); ?>Style/js/jquery.tabSlideOut.v1.3.js"></script> 
<style> 
.handle{
    top:37px;
}
.slide-out-div {
          padding: 20px;
          width: 250px;
          background-color: #fff;
          border: 1px solid #CCC;
          z-index:1000;
          top:237px;
      }   

 .slide-out-div input[type="email"],
.slide-out-div input[type="text"],
.slide-out-div textarea {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  box-shadow: inset 0 0 2px #fff;
  border: 1px solid #000;
  height: 33px;
  color: #394041;
  border-radius: 0;
  width:196px;
  padding-left: 10px;
}

.slide-out-div select{
    padding-left: 10px;
    border:1px solid black;
}
.slide-out-div input[type="text"]:hover{
   border-color: red;
    }
    .slide-out-div textarea:hover
    {
         border-color: red;
    }

    .slide-out-div input[type="email"]:hover
    {
        border-color: red;
    }
.slide-out-div input[type="submit"]{

   width: 150px;
}
.slide-out-div textarea{
    margin-top:7px;
    border:1px solid black;
}
.slide-out-div select:hover{
    
    border-color:red;
}

</style>

<script>
var j=jQuery.noConflict();

j('document').ready(function(){
   
    j("#alert").delay(3200).fadeOut(300);


    j(function(){
        j('.slide-out-div').show();
        j('.slide-out-div').tabSlideOut({
            tabHandle: '.handle',                     
            pathToTabImage: '<?php echo base_url(); ?>Style/images/contact5.gif', 
            imageHeight: '150px',                     
            imageWidth: '67px',                     
            tabLocation: 'left',                      
            speed: 1000,                              
            action: 'click',                          
            topPos: '191px',                          
            leftPos: '20px',   
            fixedPosition: true,
            onLoadSlideOut:false                      
        });
       });
       function show() {
            j('.handle').click();
        }
 

});
</script>
<!--<div class="slide-out-div" style="display:none;">
                    <a class="handle" href="http://link-for-non-js-users.html">Content</a>
            <h4 style="color:red;">Quick connect CCA!</h4>
            <form method='post' action='#'>
            <input type='text' placeholder='Enter Name' name='name' required >
            <input type='email' placeholder='Enter Email' name='email' style="margin-top:8px;" required>
            <input type='text' placeholder='Enter Mobile No' name='mobile' style="margin-top:8px;" required>
    <input type='text' placeholder='Message' name='mobile' style="margin-top:8px;" required>
            <select id="interest" name="interest1" style="width:195px; margin-top:8px; height:33px;">
            <option selected=''>Enquiry For</option>
            <option value='lg_himacs'>Course</option>
            <option value='interior_styling'>Franchise</option>
            <option value='Home_decor'>Student</option>
            <option value='Home_decor'>Call Back</option>
            <option value='call'></option>
            </select>
            <textarea name="msg" id="msg" placeholder='Enter Name' rows="3" > </textarea>
            <input type='submit' class='btn btn-warning' value='submit' name='submit' id='submit' style="margin-top:4px; margin-bottom:2px; border:none;margin-left:25px;color:#fff;background-color:#3678B2;">
            </form>
        </div>-->