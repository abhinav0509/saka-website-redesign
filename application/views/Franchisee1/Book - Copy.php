<!--<script src="<?php echo base_url(); ?>Style/dist/js/Book.js"></script>
 -->
 <!--<script src="<?php echo base_url();?>Style/try/jquery.min.js"> </script>-->
<script src="<?php echo base_url();?>Style/try/AutoComplete/Autojquery-ui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>Style/try/AutoComplete/ASPSnippets_Pager.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>Style/try/AutoComplete/AutoComplete.css" rel="stylesheet" type="text/css"/> 

<script type="text/javascript" src="<?php echo  base_url(); ?>Style/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
/*$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
    $.ajax({
    type: "POST",
    url: "<?php echo base_url(); ?>index.php/Book_Data/Search",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
}return false;    
});

jQuery("#result").live("click",function(e){ 
    var $clicked = $(e.target);
    var $name = $clicked.find('.book_name').html();
    var decoded = $("<div/>").html($name).text();
    $('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search")){
    jQuery("#result").fadeOut(); 
    }
});
$('#searchid').click(function(){
    jQuery("#result").fadeIn();
});
});*/
</script>
<script>
$("#searchid").autocomplete({
           
              source: function (request, response) {
                  //var status=$("#enqui").val();
                  $.ajax({
                      type: "POST",
                      contentType: "application/json; charset=utf-8",
                        url: "Book_Data/GetInboxData",
                       data: { term: $("#searchid").val(),action:status},
                      dataType: "json",

                      success: function (data) {
                          response($.map(data, function (item) {
                              return {
                                  label: item.book_name,// Name must be column name in table which you want to show Ex:- Username
                                  json: item
                              }
                          }))
                      },
                      error: function (result) {
                      }
                  });
              },
              search: function () { $(this).addClass('working'); },
              open: function () { $(this).removeClass('working'); },
              minLength: 0,
              select: function (event, ui) {
                alert(ui.item.label);
                  $('#searchid').val(ui.item.label);
                  
                  return false;
              }
          });
</script>
<script>
var obj1;
  var j=jQuery.noConflict();
  j(document).ready(function(){
  j("#book").addClass("open");
   CKEDITOR.replace( 'Desc');
  
});

function Delete(id)
{
    if (confirm("Are you sure, you want to Delete It.."))
        j.ajax({  
            url: '<?php echo base_url(); ?>index.php/Book_Data/Delete',
            type: 'POST',
           data:{'action':'delbook','id':id},
      
            success: function (data) {
                 if(data)
				{
				window.location="<?php echo base_url().'index.php/Admin/Book'; ?>"
				}
        
            },
            error: function () {
                
            }
        });
}

function Edit(obj1,id)
{

	$('#state1').hide();
	$('#city1').hide();
	$('#fran').hide();
	j("#t1").removeClass("active");
    j("#t2").addClass("active");
   
    j("#tab1-1").removeClass("active");
    j("#tab1-2").addClass("active");
	
     var r;
      for(i=0;i<obj1[0].length;i++)
      {
         if(obj1[0][i].id==id)
         {
          r=i;
         }	
      }
      var editor1 = CKEDITOR.instances.Desc;
      if( editor1.mode == 'wysiwyg' )
      {
                  editor1.insertHtml(obj1[0][r].description);
      }
	  $('#photo').attr('src', '<?php echo base_url().'uploads/Book/'?>'+obj1[0][r].image+' ');
	  $('#photo').show();
     
	  
     $('#author').val(obj1[0][r].author_name);
	 $('#book').val(obj1[0][r].book_name);
	 $('#title').val(obj1[0][r].book_title);
	 $('#price').val(obj1[0][r].book_price);
	 j('#bid').val(id);
     j("#UpdateBtn").show();
     j("#CancelBtn").show();
     j("#SaveBtn").hide();
}
</script>
<style>
 td p{
  text-align:justify;
  margin-right:12%;
   width:160px; 
   height: 150px;
   overflow-y: auto;
   }  
</style>
<script>
 function val()
 { 
  	j("#formVideo").validate({
	rules:{
		   book:"required",
		   author:"required",
		   title:"required",
		   price:"required",
		   upload:"required",
		   },
		message:{
			book:"Please Provide The Book Name",
			author:"Please Provide The Author Name",
			title:"Please Provide The Tilte",
			price:"Please Provide The Price Of Book",
			upload:"Please Upload The Image"
			}
	});
 }
 
 
function show(input) {
  if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function (e) {
  $('#photo').attr('src', e.target.result);
  $('#photo').show();
  }
  reader.readAsDataURL(input.files[0]);
  }
  }
 
</script>
  <div class="container-fluid-md">
     
     <div class="row">
           <div class="col-md-12">
              <ul class="nav nav-tabs">
                <li class="active" id="t1"><a href="#tab1-1" data-toggle="tab">View Book</a></li>
                 <li id="t2" class=""><a href="#tab1-2" data-toggle="tab"><i class="fa fa-book"></i>Add Book</a></li>
           </ul>
				<div class="row">
              <div class="tab-content">
			  
			  
			  
                <div class="tab-pane active" id="tab1-1">
                  <div class="table-responsive">
				  <div class="row">
				  <div class="col-md-12" style="margin-bottom:36px;">
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="searchid" name="searchid" class="form-control" placeholder="Search By Book" required/>
			      <div id="result"></div>
				  </div>
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="city1" name="city1" class="form-control" placeholder="Search By Aurthor" required/>
			      </div>
			      <div class="col-sm-3" style="margin-top:0px;margin-bottom:-29px">
			      <input type="text" id="fran" name="fran" class="form-control" placeholder="Search By Book Title" required/>
			      </div>
			      </div>
			    </div>
                    <!--<table id="table-hidden-row-details" class="table table-striped">-->
					<table class="table">
                      <thead>
                        <tr style="background-color:#d7dadc;">
                          <th width="1%">Id</th>
                          <th width="5%">Student Name</th>
                          <th width="8%">Book Name</th>
                          <th width="5%">Price</th>
                          <th width="5%">Quantity</th>
						  <th width="5%">Total</th>
						  <th width="5%">Status</th>
						  <th width="5%">Payment Mode</th>
                          <th width="5%">Edit</th>
                          <th width="5%">Delete</th>
                        </tr>
						</thead>
						<script>
                            var jArray=[];
                           jArray.push(<?php //echo json_encode($results); ?>);
						</script>
						 <tbody id="tdata" style="font-size:12px;">
						<?php		
						foreach($Order1 as $row)
						{ 
						?>
						<!--<tr>
						<td><?php //print $row->id; ?></td>
						<td><?php //print $row->book_name; ?></td>
						<td><?php //print $row->author_name; ?></td>
						<td><?php //print $row->book_title; ?></td>
						<td><?php //print $row->book_price; ?></td>
						<td><img src="<?php //echo base_url(); ?>uploads/Book/<?php //echo $row->image; ?>" style="height:115px; width:192px;"></img></td>
						<td><?php //print $row->description; ?></td>
						<td style="text-align:center"><i style="color:#275273;font-size:25px;" id="EditB" onclick="Edit(jArray,<?php //echo $row->id; ?>);" class="fa fa-edit"></i></td>
      					<td  style="text-align:center"><i style="color:#275273;font-size:25px;" id="DeleteN" onclick="Delete(<?php //echo $row->id; ?>);" class="fa fa-trash-o"></i></td>
      					}
						-->
						<?php } ?>
						</tbody>
                    </table>
					<div id="links" style="border:1px solid;text-align:center;background-color:#d7dadc;">
					<?php //echo "Select The Records"; ?>
					<?php //echo $links; ?>
					</div>
                  </div>
                </div>
                <div class="tab-pane" id="tab1-2">
         <form id="formVideo" class="form-horizontal" action="<?php echo base_url()."index.php/Order_Data/Insert"; ?>"  enctype="multipart/form-data" method="post" name="frm">
         <div class="col-sm-6">

                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Franchisee Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="fname" name="fname" class="form-control" required />
                            </div>
                          </div>
						   <input type="hidden" id="bid" name="bid" value="" />
						  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Contact<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="cont" name="cont" class="form-control" required/>
                            </div>
                          </div>
						  
						  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Book Name<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="book1" name="book1" class="form-control" required/>
                            </div>
                          </div>
						  
						  <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Price<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="price" name="price" class="form-control" required/>
                            </div>
                          </div>
						  
						   <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Quantity<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="qty" name="qty" class="form-control" required/>
                            </div>
                          </div>
                           
						   <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3">Payment Mode<span class="asterisk">*</span>
                          </label>
                            <div class="col-sm-8">
                             <input type="text" id="pmode" name="pmode" class="form-control" required/>
                            </div>
                          </div>
                           
                          
                          
                          
                        </div>
						
						
						  <div class="col-sm-6">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" for="inputPassword3" style="display:none;" id="prelbl">Image Preview
                            </label>
                            <div class="col-sm-8">
                              <img  src="" style="height:142px; width:100%; display:none;" id="photo"/>                                
                              </div>
                          </div>
                        </div>
						
						
						
                       
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="btn btn-primary" type="submit" value="Save" name="save" id="SaveBtn" onclick="return val()"/>
                              <input class="btn btn-primary " id="UpdateBtn" type="submit" style=" display:none;" value="Update" name="update" onclick="return val1()"/>

							<input class="btn btn-primary " id="CancelBtn" type="submit" style=" display:none;" value="Cancel" name="cancel"/>

                            </div>
                          </div>
          </form>           
                
                
                
                
                    
                </div>
               
              </div>
           </div>
		   
		 
     </div>
   </div>
  