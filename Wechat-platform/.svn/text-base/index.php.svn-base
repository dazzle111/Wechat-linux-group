<?php
/**
  * wechat php test
  */

//define your token

define("TOKEN", "xiyoulinux");

$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();	//用于申请成为开发者时向微信发送验证信息
$wechatObj->responseMsg();

class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        //接收微信公众平台发送过来的用户消息，该消息数据结构为XML，不是php默认的识别数据类型，因此这里用了$GLOBALS['HTTP_RAW_POST_DATA']来接收，同时赋值给了$postStr

      	//extract post data
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            	//使用simplexml_load_string() 函数将接收到的XML消息数据载入对象$postObj中。这个严谨的写法后面还得加个判断是否载入成功的条件语句，不过不写也没事。
            	$RX_TYPE = trim($postObj->MsgType);   
            	//接收信息的类型
            	
            	switch($RX_TYPE)
                {
                    case "text":
                    $resultStr = $this->handleText($postObj);
                    break;
                    
                    case "event":
                    $resultStr = $this->handleEvent($postObj);
                    break;
                    
                    default:
                    $resultStr = "Unknow msg type:".$RX_TYPE."\n".$postObj->Event."\n".$postObj->EventKey;
                    break;
                }
            	echo $resultStr;
            
        }else{            
            	echo "";
            	exit;
        }
    }

    
    public function handleText($postObj)
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        //trim() 函数从字符串的两端删除空白字符和其他预定义字符，这里就可以得到用户输入的关键词
        $time = time();
        $textTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[%s]]></MsgType>
					<Content><![CDATA[%s]]></Content>
                    <FuncFlag>0</FuncFlag>
					</xml>";             
		if(!empty( $keyword ))
        {
            $contentStr = "";
            $contentStr = $this->matchText($postObj);
            $msgType = "text";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
         }else{
                echo "Input something...";
         }

    }
    
    public function matchText($object)
    {
        $keyword = trim($object->Content);
        
        if (strncmp($keyword, "man", 3) == 0)
        {
            include('./man_function.php');	
			$manfunction = new manFunction();
            if (strncmp($keyword, "mane", 4) == 0)
            {
                $command = substr($keyword, 4);
                $command = trim($command);
                $contentStr = $manfunction->manCommand_english($command);
             }else
             {
                $command = substr($keyword, 3);
                $command = trim($command);
                $contentStr = $manfunction->manCommand($command);
            }
        }
        else if(strncmp($keyword, "建议", 4) == 0)
        {
            include ('./suggestion.php');
            $suggestion = new Class_Suggestion($keyword);
            $content = substr($keyword, 6);
            $content = trim($content);
            $contentStr = $suggestion->suggestion($content);
        }else if ($keyword == "I_love_xiyoulinux.__")
        {
            $contentStr = "恭喜，你已经成功解出我们的免试题！请回复你的联系方式。欢迎你在方便的时候，来东区教学楼西北角FZ111西邮Linux兴趣小组实验室，我们期待与你见面。";
            
        }
        else if ($keyword == "donate")
        {
            $contentStr = "感谢您对小组的关注!"."\n"."银行：中国银行"."\n"."收款人：王亚刚 "."\n"."卡号:6217 8536 0001 2221 486"."\n"."支付宝:foundation@xiyoulinux.org";
        }
        /*   else if(strstr($keyword, "纳新"))
        {
         	  $contentStr = $this->responseNaxin($object);
        }*/
        /* else if(strstr($keyword,"状态"))
        {
        	$contentStr = "面试结果可点击菜单右侧【报名状态查询】";
        }*/
        else if(strstr($keyword, "面试"))
        {
         	  $contentStr = $this->responseMianshi($object);
        }
        else
        {
            //$contentStr = "点击右下角'活动报名',参与即有机会获得奖品";
            $contentStr = "欢迎来到xiyou linux!";
            //  $contentStr = "查询面试结果可点击菜单右侧【报名状态查询】";
        }
        return $contentStr;
    }
    
    public function handleEvent($object)
    {   
        switch($object->Event)
        {
            case "subscribe":
            $contentStr = "欢迎你关注 xiyoulinux"."\n";
            //$contentStr = "点击右下角'活动报名',参与即有机会获得奖品"."\n";
            $resultStr = $this->responseText($object,$contentStr);
        	return $resultStr;
            
            case "SCAN":
            $contentStr = "点击右下角'活动报名',参与即有机会获得奖品";
            $resultStr = $this->responseText($object,$contentStr);
        	return $resultStr;
            
            case "scan":
            $contentStr = "点击右下角'活动报名',参与即有机会获得奖品";
            $resultStr = $this->responseText($object,$contentStr);
        	return $resultStr;
            
            case "CLICK":
            $resultStr = $this->handleClick($object);
            return $resultStr;
            
        }
     
    }
    
    public function handleClick($object)
    {
        $clickValue = $object->EventKey;
        
        switch ($clickValue)
        {
            case "group_introduction":
            /*$title = "小组简介";
        	$description = "西邮Linux兴趣小组，由王亚刚老师，王聪、刘洋等同学于2006年9月策划并组建。现已成为陕西高校中具有深远影响力的开源技术社区。";
        	$picUrl = "http://222.24.19.63/img/laptop.png";
        	$url = "http://222.24.19.63/";
        	$resultStr = $this->responseNews($object, $title, $description, $picUrl, $url);*/
            $content = "西邮Linux兴趣小组，由王亚刚老师，王聪、刘洋等同学于2006年9月策划并组建。现已成为陕西高校中具有深远影响力的开源技术社区。";
            $resultStr = $this->responseText($object,$content);;
            return $resultStr;
            
            case "about_us":
            $content = "1. QQ公开群:312674502"."\n"."2. 人人网:http://page.renren.com/601367653"."\n"."3. 微博:http://q.weibo.com/758026"."\n"."4. 官网:www.xiyoulinux.org";
            $resultStr = $this->responseText($object,$content);
            return $resultStr;
         
            case "join_us":
            $content = "加入我们:"."\n"."1)熟练使用Linux"."\n"."2)熟练使用C"."\n"."3)有着积极的态度"."\n"."4)联系方式(对外QQ群):312674502"."\n";
            $resultStr = $this->responseText($object,$content);
            return $resultStr;
            
            case "use_help":
            $content = "1.输入man+你需要查询的命令,可以查询中文示意"."\n"."2.输入mane+你需要查询的命令,可以查询英文示意"."\n"."3.输入donate可查询捐助相关信息";
            $resultStr = $this->responseText($object,$content);
            return $resultStr;
            
            case "linux_programmer":
            $resultStr = $this->get_lianjie($object, "linux_programmer");
            return $resultStr;
            
            case "linux_operation":
            $resultStr = $this->get_lianjie($object, "linux_operation");
            return $resultStr;
            
            case "data_algorithm":
            $resultStr = $this->get_lianjie($object, "data_algorithm");
            return $resultStr;
            
            case "data_kernel":
            $resultStr = $this->get_lianjie($object, "data_kernel");
            return $resultStr;
            
            case "suggestion":
            $content = "请输入你要提的建议："."\n"."输入格式：建议+你的留言";
            $resultStr = $this->responseText($object,$content);
            return $resultStr;
            
            case "find_institute":
            $resultStr = $this->get_course($object);
            return $resultStr;
            
            case "donate":
            $content = "感谢您对小组的关注!"."\n"."银行：中国银行"."\n"."收款人：王亚刚 "."\n"."卡号:6217 8536 0001 2221 486"."\n"."支付宝:foundation@xiyoulinux.org";
            $resultStr = $this->responseText($object,$content);
            return $resultStr;
            
            case "naxin":
            $result = $this->responseNews($object, "纳新入口", "","http://mmbiz.qpic.cn/mmbiz/gevfraSxro0q357AHNBRvRhCYiaHgib2bnxS8ADuT9Mnt5QIrPM9xjia7K00qseVjcspFwSg6mlD37rukQDYXeiaLQ/0", "http://5.dazzle11.sinaapp.com/yanzheng.php");
            return $result;
            
            case "zhuantai":
            $result = $this->responseNews($object, "报名状态查询", "","http://mmbiz.qpic.cn/mmbiz/gevfraSxro0q357AHNBRvRhCYiaHgib2bnxS8ADuT9Mnt5QIrPM9xjia7K00qseVjcspFwSg6mlD37rukQDYXeiaLQ/0", "http://5.dazzle11.sinaapp.com/check.php");
            return $result;
            
            case "softday_register":
            $result = $this->responseNews($object, "软件自由日报名入口", "报名即有机会获取礼品","http://5.dazzle11.sinaapp.com/images/QQ%E6%88%AA%E5%9B%BE20140712160358.jpg", "http://5.dazzle11.sinaapp.com/softday/sign/index.html");
            return $result;
        }
        
    }
    
    public function responseNaxin($object)
    {
        $fromUsername = $object->FromUserName;
        $toUsername = $object->ToUserName;
        $time = time();
        $newsTp1 = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[news]]></MsgType>
                    <ArticleCount>3</ArticleCount>
                    <Articles>
                    <item>
                    <Title><![CDATA[西邮Linux兴趣小组纳新啦!!!]]></Title> 
                    <Description><![CDATA[]]></Description>
                    <PicUrl><![CDATA[http://mmbiz.qpic.cn/mmbiz/gevfraSxro0m7icXspGf8mvo5KicFBXVeBrrWqTv1hkFQVGFaiaNUqyeaKEVGXNKhqJYUwDAN7MibfkOn750PE3Hww/0]]></PicUrl>
                    <Url><![CDATA[http://mp.weixin.qq.com/s?__biz=MjM5NDQ3MDY0MA==&mid=200132660&idx=1&sn=71ecd31d8d31605eb43a505b48a70b4e#rd]]></Url>
                    </item>
                    <item>
                    <Title><![CDATA[小组纳新问题集锦]]></Title> 
                    <Description><![CDATA[]]></Description>
                    <PicUrl><![CDATA[https://mmbiz.qlogo.cn/mmbiz/gevfraSxro0m7icXspGf8mvo5KicFBXVeBZAIG6JVTNWjjVPdITbDNLDHKsYTfTzcowQGG8kQr2gAGj4VdMiasq7w/0]]></PicUrl>
                    <Url><![CDATA[http://mp.weixin.qq.com/s?__biz=MjM5NDQ3MDY0MA==&mid=200132660&idx=2&sn=f2bba692427ae2b487c531d0d80b3644#rd]]></Url>
                    </item>
                    <item>
                    <Title><![CDATA[实验室都有什么？]]></Title> 
                    <Description><![CDATA[]]></Description>
                    <PicUrl><![CDATA[https://mmbiz.qlogo.cn/mmbiz/gevfraSxro0m7icXspGf8mvo5KicFBXVeBapHeib83VTGwiaFlY8OtR6QgGbYGaOlG7ibXxdYLuqxUIEupOGWEYwSibA/0]]></PicUrl>
                    <Url><![CDATA[http://mp.weixin.qq.com/s?__biz=MjM5NDQ3MDY0MA==&mid=200132660&idx=3&sn=61ea6c8478e4d72e647ab3da9060d9d3#rd]]></Url>
                    </item>
                    </Articles>
                    </xml>";
        $resultStr = sprintf($newsTp1, $fromUsername, $toUsername, $time);
        echo $resultStr;
        return "";
    }
     public function responseMianshi($object)
    {
        $fromUsername = $object->FromUserName;
        $toUsername = $object->ToUserName;
        $time = time();
        $newsTp1 = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[news]]></MsgType>
                    <ArticleCount>2</ArticleCount>
                    <Articles>
                    <item>
                    <Title><![CDATA[面试指南]]></Title> 
                    <Description><![CDATA[]]></Description>
                    <PicUrl><![CDATA[http://mmbiz.qpic.cn/mmbiz/gevfraSxro0nvbpzJibgZEPfPNUZPD6M3GOrxxI00ib5KhJYtTicSUUc0Hw8dge5tMYSdT2ticicR2EYZlBqEozfNpA/0]]></PicUrl>
                    <Url><![CDATA[http://mp.weixin.qq.com/s?__biz=MjM5NDQ3MDY0MA==&mid=200181174&idx=1&sn=b7dfa5b65a9780ca4cff77415e8d4add#rd]]></Url>
                    </item>
                    <item>
                    <Title><![CDATA[面试题勘误]]></Title> 
                    <Description><![CDATA[]]></Description>
                    <PicUrl><![CDATA[https://mmbiz.qlogo.cn/mmbiz/gevfraSxro0nvbpzJibgZEPfPNUZPD6M3JkOsiawSftuRj0bbpBg8PAJDYjyCBqaHTkBHj0E7Lyz4c1LZHmAfOwQ/0]]></PicUrl>
                    <Url><![CDATA[http://mp.weixin.qq.com/s?__biz=MjM5NDQ3MDY0MA==&mid=200181174&idx=2&sn=7c39a721a7c5abe87f76853fe0d9a423#rd]]></Url>
                    </item>
                    </Articles>
                    </xml>";
        $resultStr = sprintf($newsTp1, $fromUsername, $toUsername, $time);
        echo $resultStr;
        return "";
    }
    
    public function responseNews($object, $title, $description, $picUrl, $url)
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
                    </xml>";
        $resultStr = sprintf($newsTp1, $fromUsername, $toUsername, $time, $title, $description, $picUrl, $url);
        return $resultStr;
    }
    
    public function responseText($object,$content)
    {
        $fromUsername = $object->FromUserName;
        $toUsername = $object->ToUserName;
        $time = time();
        $msgType = "text";
        $textTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[%s]]></MsgType>
					<Content><![CDATA[%s]]></Content>
                    <FuncFlag>0</FuncFlag>
					</xml>";        
        $resultStr = sprintf($textTpl,$fromUsername,$toUsername,$time,$msgType,$content);
        return $resultStr;
    }

    public function get_lianjie($object, $key)
    {
        include('./lianjie_function.php');	
        $lianjie = new Class_Lianjie();
        $info = $lianjie->lianjie($key);
                                  
        $title = $info['topic'];
        $description = "此文章为随机挑选，更多内容请继续点击....";
        $picUrl = $info['pcurl'];
        $url = $info['link'];
        $resultStr = $this->responseNews($object, $title, $description, $picUrl, $url);
        return $resultStr;
    }
    
    public function get_course($object)
    {
        include('./get_course_function.php');	
        $course = new Class_Course();
        $info = $course->Get_course();
            
        $title = "本周讲座";
        $description = $info['content'];
        $picUrl = $info['pcurl'];
        $url = $info['link'];
        $resultStr = $this->responseNews($object, $title, $description, $picUrl, $url);
        return $resultStr;
    }
    
    private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        //sort($tmpArr);
        sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr);
		$tmpStr = sha1( $tmpStr );
		
        if( $tmpStr == $signature ){
            return false;	//官方文档应为true
		}else{
            return true; 	//官方文档应为false
		}
       
	}
    
   
}

?>