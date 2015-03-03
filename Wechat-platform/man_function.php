<?php
header("content-Type: text/html; charset=utf-8");

class manFunction{
    public function manCommand($command)
    {
        
		$link = mysql_connect(SAE_MYSQL_HOST_M .':'. SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
		if($link)
		{
			mysql_select_db(SAE_MYSQL_DB,$link);
			$mysql = new SaeMysql();
			$sql = "select order_value from `linuxname` where uc_name= '{$command}'";

			$ID = $mysql->getVar( $sql ); 
			$mysql->closeDb();
		}
		$url = "http://linuxso.duapp.com/article.php?id={$ID}";
		$f = new SaeFetchurl();
		$output = $f->fetch($url);
		$output = preg_replace("/\r\n/","\n",$output);
		$str1 = strip_tags($output);
		$str2 = str_replace('baidu.app.autoHeight();', '', $str1);
		$str3 = str_replace('baidu.app.setHeight(335);', '', $str2);
		$str4 = trim($str3);

		$str5 = strstr($str4,"：");
		$str5 = substr($str5,3);
	
		if( strlen($str5) < 350)
		{
			$str5 = strstr($str4,":");
			$str5 = substr($str5,1);
		}
	
		$msg = "【{$command}】\n{$str5}";
		return $msg;
    }
    
    public function manCommand_english($command)
	{
    	$link = mysql_connect(SAE_MYSQL_HOST_M .':'. SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
		if($link)
		{
			mysql_select_db(SAE_MYSQL_DB,$link);
			$mysql = new SaeMysql();
    	    $sql = "select bash_mean from `bash_man` where bash_man= '{$command}'";
    	    $mean= $mysql->getVar( $sql ); 
    	    $mysql->closeDb();
		}
    	$msg = $mean;
		return $msg;
    }
}

?>