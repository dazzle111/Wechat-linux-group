<?php

header("Content-type: text/html; charset=utf-8");

class Class_Lianjie{
    public function lianjie($key)
    {
        switch($key)
        {
            case "linux_programmer":
            $sql_name = "linux_program";
            break;
            
            case "linux_operation":
            $sql_name = "linux_operation";
            break;
            
            case "data_algorithm":
            $sql_name = "linux_algorithm";
            break;
            
            case "data_kernel":
            $sql_name = "linux_kernel";
            break;
        }
        
        $link = mysql_connect(SAE_MYSQL_HOST_M .':'. SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
		if($link)
		{
			mysql_select_db(SAE_MYSQL_DB,$link);
			$mysql = new SaeMysql();
            
            $sql = "select max(id) from `{$sql_name}`";
           	$max_id = $mysql->getVar( $sql );
            
            srand(time());
            //srand((double)microtime()*1000000); 
            $id = rand(1, $max_id); 
            
            $sql = "select link from `{$sql_name}` where id='{$id}'";
            $link = $mysql->getVar( $sql ); 
            
            $sql = "select topic from `{$sql_name}` where id='{$id}'";
            $topic = $mysql->getVar($sql);
            
            $sql = "select pcurl from `{$sql_name}` where id='{$id}'";
            $pcurl = $mysql->getVar($sql);
            if (!$pcurl)
            	$pcurl = "http://mmsns.qpic.cn/mmsns/gevfraSxro0sAWnQmn60f9APiaPnicuYxzib5Bjm0FXNShtdhcp7VPZCA/0";
            
        	$mysql->closeDb();
		}
        
        $info = array("link"=>$link, "topic"=>$topic, "pcurl"=>$pcurl);
        return $info;
    }
    
    public function Noticepublish_News($object)
    {
        $fromUsername = $object->FromUserName;
        $toUsername = $object->ToUserName;
        $time = time();
        $newsTp1 = "<xml>
                            <ToUserName><![CDATA[%s]]></ToUserName>
                            <FromUserName><![CDATA[%s]]></FromUserName>
                            <CreateTime>%s</CreateTime>
                            <MsgType><![CDATA[news]]></MsgType>
                            <ArticleCount>1</ArticleCount>
                            <Articles>
                            <item>
                            <Title><![CDATA[%s]]></Title> 
                            <Description><![CDATA[%s]]></Description>
                            <PicUrl><![CDATA[%s]]></PicUrl>
                            <Url><![CDATA[%s]]></Url>
                            </item>
                            </Articles>
                            <FuncFlag>1</FuncFlag>
                            </xml> ";
        $title = "西邮Linux本期讲座-压缩理论";
        $description = "点击查看大图";
        $picUrl = "http://mmbiz.qpic.cn/mmbiz/gevfraSxro3VkHLZIXDZOw1gJFOMca4BWOMgMBYzqQ7x1bg3V8VNVnkkunbiaAp8r19caCd2tErTqV1kEAiaQWsA/0";
        $url = "http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5NDQ3MDY0MA==&appmsgid=100017413&itemidx=1&sign=8e88e7d020a6aa3bce6de161851fef6c#wechat_redirect";
        $resultStr = sprintf($newsTp1, $fromUsername, $toUsername, $time, $title, $description, $picUrl, $url);
        echo $resultStr;
    }
}
?>