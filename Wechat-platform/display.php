<?php
/*
//测试ACC_TOCKEN的值
$APPID="wx0184a7e3de922b62";
$APPSECRET="6000a92ac03958eb91c405de65b0d9e2";

$TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$APPID."&secret=".$APPSECRET;

$json=file_get_contents($TOKEN_URL);
$result=json_decode($json,true);

$ACC_TOKEN=$result['access_token'];

echo $ACC_TOKEN;
*/
header("Content-type: text/html; charset=utf-8");
define("ACCESS_TOKEN", '2OU9nu77MTunIxqxNISCPB6906nJkd7HjFa21ROl4SkmrRplb3m1_YrxKyYhCYzDv6lqiWbsZfXFEg7gdXdBpw');

//创建菜单
function createMenu($data){
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".ACCESS_TOKEN);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
 curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $tmpInfo = curl_exec($ch);
 if (curl_errno($ch)) {
  return curl_error($ch);
 }
 curl_close($ch);
 return $tmpInfo;
}

$menu = '{
		"button":[
        {
        	"name":"关于我们",
            "sub_button":[
            {
            	"name":"小组简介",
                "type":"click",
                "key":"group_introduction"
            },
            {
            	"name":"联系我们",
                "type":"click",
                "key":"about_us"
            },
            {
            	"name":"使用帮助",
                "type":"click",
                "key":"use_help"
            },
            {            
            	"name":"捐助我们",
                "type":"click",
                "key":"donate"
            }
            
            ]
        },
        {
        	"name":"Linux学习",
            "sub_button":[
            {
            	"name":"Linux编程",
                "type":"click",
                "key":"linux_programmer"
            },
            {
            	"name":"Linux运维",
                "type":"click",
                "key":"linux_operation"
            },
            {
            	"name":"算法资料",
                "type":"click",
                "key":"data_algorithm"
            },
            {
            	"name":"内核资料",
                "type":"click",
                "key":"data_kernel"
            }
            ]
        },
       
        {
        	"name":"其他功能",
            "sub_button":[
            {
            	"name":"建议留言",
                "type":"click",
                "key":"suggestion"
            },
            {
            	"name":"讲座查询",
                "type":"click",
                "key":"find_institute"
            }
            
          
            ]
        }
        ]
}';

/*$menu = '{
		"button":[
        {
        	"name":"关于我们",
            "sub_button":[
            {
            	"name":"小组简介",
                "type":"click",
                "key":"group_introduction"
            },
            {
            	"name":"联系我们",
                "type":"click",
                "key":"about_us"
            },
            {
            	"name":"使用帮助",
                "type":"click",
                "key":"use_help"
            },
            {            
            	"name":"捐助我们",
                "type":"click",
                "key":"donate"
            }
            
            ]
        },
        {
        	"name":"Linux学习",
            "sub_button":[
            {
            	"name":"Linux编程",
                "type":"click",
                "key":"linux_programmer"
            },
            {
            	"name":"Linux运维",
                "type":"click",
                "key":"linux_operation"
            },
            {
            	"name":"算法资料",
                "type":"click",
                "key":"data_algorithm"
            },
            {
            	"name":"内核资料",
                "type":"click",
                "key":"data_kernel"
            }
            ]
        },
       
        {
        	"name":"活动报名",
            "type":"click",
            "key":"softday_register"
        }
        ]
}';*/



echo createMenu($menu);

?>