<?php
header("Content-type: text/html; charset=utf-8");

class Class_Course{
    public function Get_Course()
    {
    	$link = mysql_connect(SAE_MYSQL_HOST_M .':'. SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
		if($link)
		{
			mysql_select_db(SAE_MYSQL_DB,$link);
			$mysql = new SaeMysql();
            
            $sql = "select max(id) from `linux_lecture`";
           	$id = $mysql->getVar( $sql );
            
            $sql = "select link from `linux_lecture` where id='{$id}'";
            $link = $mysql->getVar( $sql ); 
            
            $sql = "select topic from `linux_lecture` where id='{$id}'";
            $content = $mysql->getVar($sql);
            
            $sql = "select pcurl from `linux_lecture` where id='{$id}'";
            $pcurl = $mysql->getVar($sql);
            if (!$pcurl)
            	$pcurl = "http://mmsns.qpic.cn/mmsns/gevfraSxro0sAWnQmn60f9APiaPnicuYxzib5Bjm0FXNShtdhcp7VPZCA/0";
            
        	$mysql->closeDb();
		}
        
        $info = array("link"=>$link, "content"=>$content, "pcurl"=>$pcurl);
        return $info;
    }
}
?>