<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, " ");
curl_setopt($ch, CURLOPT_POSTFILEDS, $_POST);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

$info = curl_exec($ch);
if (curl_errno($ch)){
	return curl_error($ch);
}
curl_close($ch);

/*对info进行处理
 * */
?>
