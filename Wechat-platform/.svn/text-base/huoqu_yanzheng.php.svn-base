<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
<meta content="telephone=no" name="format-detection" />
<?php
 	$ch = curl_init();   
  	curl_setopt($ch, CURLOPT_URL, "join.xiyoulinux.org/register.php");   
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
        echo '<p style="font-size:18pt;color:black">'.$result.'<p>';
        //preg_match("/alert\('(.*?)'\)/s", $result, $result);
        /*for ($i=0; $result[$i] && $result[$i+1]; $i=$i+2)
        {
        	echo '<p style="font-size:36pt;color:black;text-align:center">'.$result[$i].$result[$i+1].'<p>';
            //if ($i%10 == 0)
            // echo "/n";
        }*/
        //echo $result;
}
?>
