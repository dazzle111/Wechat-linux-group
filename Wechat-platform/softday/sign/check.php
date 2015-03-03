<?php

class Check{
private $username;
private $password;
function __construct($username, $password)
{
	$this->username = $username;
	$this->password = $password;
}
public function getResult()
{
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
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 curl_setopt($ch, CURLOPT_POST, 1);
	 curl_setopt($ch, CURLOPT_POSTFIELDS, "TextBox1=$this->username&TextBox2=$this->password&__VIEWSTATE=dDw1MjQ2ODMxNzY7Oz799QJ05KLrvCwm73IGbcfJPI91Aw==&RadioButtonList1=3&Button1=登陆");

	$tmpInfo = curl_exec($ch);
 
 
	if (curl_errno($ch)) {
	  print_r( curl_error($ch));
	 }

	curl_close($ch);
	preg_match("/alert\('(.*?)'\)/s", $tmpInfo, $result);

	if ($result)
		return $result[1];
	else
		return ;
}

}
?>

