<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
<meta content="telephone=no" name="format-detection" />
<?php
 	$ch = curl_init();   
  	curl_setopt($ch, CURLOPT_URL, "join.xiyoulinux.org/check.php");   
 	curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);   
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
  	curl_setopt($ch, CURLOPT_TIMEOUT, 30);
  	$tmpInfo = curl_exec($ch);
  	if (curl_errno($ch)) {
  		return curl_error($ch);
  	}
  	curl_close($ch);
  	if(strstr( $tmpInfo ,"alert")){
        $result =  strstr( $tmpInfo, "alert");
      	$index = strpos($result, "\")");
      	$result = substr($result, 7, $index-7);
       	//preg_match("/alert\('(.*?)'\)/s", $result, $result);
        $info = explode("\\n", $result);
        echo '<p style="font-size:18pt;color:black">'.implode("<br>", $info) .'<p>';
        //echo '<p style="font-size:18pt;color:black">'.$result.'<p>';
   	}
?>