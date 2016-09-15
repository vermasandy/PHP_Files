<?php

            // log ALL entered phone numbers. after 24 hours if no download, send ONE reminder sms
            // later on we can cross reference the taxi_users table against this collected data
            //  to market to those who still haven't downloaded the app yet


            include("../webapp/conn.php");
            include_once('../twilio-php-master/Services/Twilio.php');

            $subj = "none";
            
            // TODO ***********************************************
            // SET IN ADMIN PANEL ALLOW TO MODIFY MESSAGE IF NEEDED
            // ****
            $messages = "TaxiASAP FREE App Download: Android - https://play.google.com/store/apps/details?id=com.offsure.taxiasap&hl=en /// iPhone - https://itunes.apple.com/us/app/taxiasap/id958925779?mt=8";

            $Xquery = mysql_query("select * from admin where id='1'");
            $Xrows = mysql_fetch_assoc($Xquery);	
            $XadminData = mysql_num_rows($Xquery);
			  
            if(count($XadminData)>0)
            {
		$sms = $Xrows['sms'];
            }

            // set your AccountSid and AuthToken from www.twilio.com/user/account
            $AccountSid = "AC4cb6cda9831f760270f93eec2f4e0477";
            $AuthToken = "4b0ec7ffb404915a9783f1d439f66549";
		 
            $client = new Services_Twilio($AccountSid, $AuthToken);
             try {
            	$message = $client->account->messages->create(array(
			"From" => $sms,
			"To" => '+1'.$_REQUEST['phone'],
			"Body" => $messages,
		)); }
             catch (Services_Twilio_RestException $e) { echo $e->getMessage(); }
             
//             echo $sms . " - " . $_REQUEST['phone'] . " - " . $_REQUEST['messages'];
?>