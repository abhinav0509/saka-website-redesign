<?php 
include 'sendsms.php';
$sendsms=new sendsms("http://alerts.valueleaf.com/api/v3",'sms'
                      , "A46dc1705723c21960a525f9ce18b705e", "OOOCCA");
echo $api=$sendsms->send_sms("8551022077", "message from Site", 'http://alerts.valueleaf.com/index.php&custom=1,2', 'xml');

$jsondata =  '{
                    "sender": "000CCA",
                    "message": "message From CCA",
                    "unicode": 1,
                    "flash": 0,
                    "dlrurl": "http://ccaindia.in/sendsms/index.php",
                    "sms":[
                        {
                        "to": 8551022077,
                        "custom": 12,
                        }
                     ]
                }';

//$api_url ='http://alerts.valueleaf.com/api/v3/index.php?method=sms&api_key=A46dc1705723c21960a525f9ce18b705e&to=8551022077&sender=OOOCCA&message=testing&format=json&custom=1,2&flash=0';

/*$sendsms->schedule_sms("99XXXXXXXX", "message"
                     , "http://www.yourdomainname.domain/yourdlrpage&custom=XX", 'xml',
                      'YYYY-MM-DD HH:MM PM/AM');
$sendsms->unicode_sms("99XXXXXXXX","unicode message",
                      "http://www.yourdomainname.domain/yourdlrpage&custom=XX",'xml','1');*/
					  
//$sendsms->messagedelivery_status("99XXXXXX-X");

//$sendsms->groupdelivery_status("99XXXXXX");
//$sendsms->setWorkingKey("1i6xxxxxxxxxxxxxx");
//$sendsms->setSenderId("BUxxxx");
//$sendsms->setapiurl("URL/api/v3");

//$response = file_get_contents($api_url);

print_r($api);

?>  


/*Note  : Download the source code from here.  Download source code
Step 1: Extract the downloaded file
Step 2: Copy the above sample code and save it with extension .php (say trigger.php) in 
        extracted folder
Step 3: Now call trigger.php*/