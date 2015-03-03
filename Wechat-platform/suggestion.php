<?php
header("content-Type: text/html; charset=utf-8");

class Class_Suggestion{
    public function suggestion($content)
    {
       	$link = mysql_connect(SAE_MYSQL_HOST_M .':'. SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
       	if($link)
       	{
            
           	$mysql = new SaeMysql();
           	mysql_select_db(SAE_MYSQL_DB,$link); 
            
           	$sql="INSERT INTO SuggestionForUs (Words) values ('{$content}')";
           	$ret=$mysql->runsql($sql);
           	if($ret)
            {
                $msg = "感谢您对于xiyoulinux小组的宝贵建议，我们正在一步步完善中！";
           	}else{
                $msg = "服务技术原因,建议未被采纳到数据库。sorry";
           	}
       	}
       	$mysql->closeDb();
       	return $msg;   
    }
    
}
?>