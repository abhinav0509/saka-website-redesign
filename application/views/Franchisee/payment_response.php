<script src="http://code.jquery.com/jquery-1.9.1.js"></script> 
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$(window).load(function(){
    window.setTimeout(function() { redirect(); }, 5000);  
});

function redirect()
{
   $("#payment_form").submit();  
}
</script>

<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

$secret_key = "Your Secret Key";	 // Pass Your Registered Secret Key from EBS secure Portal
if(isset($_REQUEST)){
	 $response = $_REQUEST;	
   	 
}
?>
<HTML>

<form name="frm" action="<?php echo base_url(); ?>index.php/Order_management/save_paid_data" method="post" id="payment_form">
    <input type="hidden" name="rmsg" value="<?php echo $_REQUEST['ResponseMessage'];?>" />
    <input type="hidden" name="amt" value="<?php echo $_REQUEST['Amount']; ?>" />
    <input type="hidden" name="refno" value="<?php echo $_REQUEST['MerchantRefNo']; ?>" />
</form>

<HEAD>
<TITLE>E-Billing Solutions Pvt Ltd - Payment Page</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<style>
	h1       { font-family:Arial,sans-serif; font-size:24pt; color:#08185A; font-weight:100; margin-bottom:0.1em}
    h2.co    { font-family:Arial,sans-serif; font-size:24pt; color:#FFFFFF; margin-top:0.1em; margin-bottom:0.1em; font-weight:100}
    h3.co    { font-family:Arial,sans-serif; font-size:16pt; color:#000000; margin-top:0.1em; margin-bottom:0.1em; font-weight:100}
    h3       { font-family:Arial,sans-serif; font-size:16pt; color:#08185A; margin-top:0.1em; margin-bottom:0.1em; font-weight:100}
    body     { font-family:Verdana,Arial,sans-serif; font-size:11px; color:#08185A;}
	th 		 { font-size:12px;background:#015289;color:#FFFFFF;font-weight:bold;height:30px;}
	td 		 { font-size:12px;background:#DDE8F3}
	.pageTitle { font-size:24px;}
</style>
</HEAD>
<BODY LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0 bgcolor="#ECF1F7">
<center>
<table width='100%' cellpadding='0' cellspacing="0" ><tr><th width='90%'>&nbsp;</th></tr></table>
	<center><h3>Response<br></H3>
           <img src="<?php echo base_url(); ?>Style/images/299.gif" />
           <br><span>Please do not refresh the page or do not click on back button</span><br><br><br>
    </center>
    <table width="600" cellpadding="2" cellspacing="2" border="0">
        <tr>
            <th colspan="2">Transaction Details</th>
        </tr>
<?php
		foreach($response as $key => $value) {
?>			
        <tr>
            <td class="fieldName" width="50%"><?php echo $key; ?></td>
            <td class="fieldName" align="left" width="50%"><?php echo $value; ?></td>
        </tr>
<?php
		}
?>		
	</table>
</center>
<table width='100%' cellpadding='0' cellspacing="0" ><tr><th width='90%'>&nbsp;</th></tr></table>
</body>
</html>
