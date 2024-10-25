<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class CI_Mail {

public function __construct()
	{
		
		
  	}

	public function sent_mail($body,$from,$to,$sub)
	{
       
        foreach ($body as $key => $value)
			{
			    $data.="$key:-$value"."<br>";
			}
           
			
			
			

        $headers="Content-Type: text/html; charset=\"iso-8859-1\"\n";
		
		ini_set('sendmail_from', $from);
       // $data=implode("<br>",$body);
        $body="<strong>anand</strong>";
        if(mail($to,$sub,$data,$headers))
        {
    	  		  return true;
		}
		else
		{
			return false;
		}
	}
    


}