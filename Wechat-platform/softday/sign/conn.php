<?php
/*class Conn{
	private $hostname;
	private $dbuser;
	private $dbpwd;
	private $dbname;
	private $charName;
	private $db;

	private $res;
	
	function __construct()
	{
		$hostname = "localhost";
		$dbuser = "";
		$dbpwd = "";
		$dbname = "";
		$charName = "utf8";

		$this->db = new mysqli($hostname, $dbuser, $dbpwd, $dbname);

		if (mysqli_connect_errno())
		{
			echo "链接失败".mysqli_connect_errno();
			exit();
		}

		return $this->db;
	}

	public function handle($sql)
	{
		$this->res = $this->db->query($sql);
		return $this->res;
	}

	function __destruct()
	{
		$this->res->free();
		$this->db->close();
	}
}*/

//$c = new Conn();
//$c->handle("select * from register where num=04121041;");
class Conn
{
    
    function __construct()
    {
  
    }
    
    public function handle($sql)
    {
		$link = mysql_connect(SAE_MYSQL_HOST_M .':'. SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);
    
    
		if($link)
		{
		mysql_select_db(SAE_MYSQL_DB,$link);
        mysql_set_charset("utf8");
		$mysql = new SaeMysql();
           
        //$result = mysql_query($sql);
        
        $result = mysql_query ( $sql );
        while ( $row = mysql_fetch_array ( $result, MYSQL_NUM ) ) {
            //var_dump($row);
            //echo ("<td>$row[0]</td><td>$row[1]</td>");
            
			mysql_free_result($result);            
       		$mysql->closeDb();
            
        	return $row;

  	   }
       }
    }
}
        
?>
