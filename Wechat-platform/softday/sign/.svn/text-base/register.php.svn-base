<!DOCTYPE html>
<html>
<head>
   <title>登陆结果</title>
   <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
   <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<div class="panel panel-primary">
   <div class="panel-heading">
      <h3 class="panel-title">登陆结果</h3>
   </div>
   <div class="panel-body">
		<?php
//date_default_timezone_set("PRC");
//		$logfile = fopen("register.log", "a");
//		$log_data ="\n\n".date('Y-m-d H:i:s')."\t".$_SERVER["REMOTE_ADDR"]."\t".$_POST["num"]."\t".$_POST["name"]."\t".$_POST["tel"]."\t";

//fwrite($logfile, $log_data);

			require_once("conn.php");
//		require_once("check.php");
			require_once("filter.php");
			
			$num = $_POST["num"];
//		$passwd = $_POST["passwd"];
			$name = $_POST["name"];
			$tel = $_POST["tel"];

//$check = new Check($num, $passwd);
//			$result = $check->getResult();
		
			if (true)
			{

				$db = new Conn();
				$sql = "insert into register(num,name,tel) values('$num','$name','$tel') on DUPLICATE key update name=values(name),tel=values(tel)";
				$res = $db->handle($sql);

                //if (!$res)
                //echo "数据插入错误";
				$res = $db->handle("select * from register where num=$num;");
				if (!$res)
					echo "数据查询错误";
                //if (is_object($res))
                //$info = $res->fetch_assoc();
	
                /*echo "序号：".$inf["id"]."</br>";
				echo "名字：".$info["name"]."</br>";
				echo "手机号".$info["tel"]."</br>";
                */
                
                echo "序号：".$res[0]."</br>";
				echo "名字：".$res[2]."</br>";
				echo "手机号".$res[3]."</br>";

			}else{
				$result = iconv('GBK','UTF-8', $result);
				echo $result;
                //fwrite($logfile, "SIGN FAIL\n");
			}
//fclose($logfile);
?>
   </div>
   <button type="button" class="btn btn-link btn-primary btn-block"><a href="index.html">点击返回</a></button>
   
</div>
</body>
</html>


