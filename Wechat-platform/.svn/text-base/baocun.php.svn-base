<?php
$username = $_POST['username'];
$password = $_POST['password'];

 $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://222.24.19.202/default_ysdx.aspx");
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
 curl_setopt($ch, CURLOPT_HEADER, 1);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
 curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, "TextBox1=$username&TextBox2=$password&__VIEWSTATE=dDw1MjQ2ODMxNzY7Oz799QJ05KLrvCwm73IGbcfJPI91Aw==&RadioButtonList1=3&Button1=登陆");

$tmpInfo = curl_exec($ch);
 
//var_dump(curl_getinfo($ch, CURLINFO_HTTP_CODE));
 
if (curl_errno($ch)) {
  print_r( curl_error($ch));
 }
if(strstr( $tmpInfo ,"xs_main.aspx?xh=")){
	echo "ok";
}
curl_close($ch);
preg_match("/alert\('(.*?)'\)/s", $tmpInfo, $result);
print_r($result);
//$info = explode("alert('", $tmpInfo);
//if（$info[1] == ""
//print_r($info);

?>