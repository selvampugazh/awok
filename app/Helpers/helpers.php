<?php

namespace App\Helpers;
class Helper{

	public static function sendSMS($data){
		/** try{
			$mobile_number =  $data['mobile'];
			$message = $data['msgtxt'];
			$authKey = "239784AXggfgfgfdgfdggfg";
	        $senderId = "SELVAM";
	        $route = "4";
	        
	        //Prepare you post parameters
	        $postData = array(
	            'authkey' => $authKey,
	            'mobiles' => $mobile_number,
	            'message' => $message,
	            'sender' => $senderId,
	            'route' => $route
	        );

	        //API URL
	        $url="http://api.msg91.com/api/sendhttp.php";

	        // init the resource
	        $ch = curl_init();
	        curl_setopt_array($ch, array(
	            CURLOPT_URL => $url,
	            CURLOPT_RETURNTRANSFER => true,
	            CURLOPT_POST => true,
	            CURLOPT_POSTFIELDS => $postData
	        ));

	        //Ignore SSL certificate verification
	        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	        //get response
	        $output = curl_exec($ch);

	        //Print error if any
	        if(curl_errno($ch)) {
	            return 'error:' . curl_error($ch);
	        }

	        curl_close($ch);

	        if(empty($output)){
	        	return false;
	        }

	        return $output;
		}
		catch(Exception $e){
			return false;
		}	**/	
		return true;
	}
}
