<?php
 session_start();session_destroy();
 session_start();
if($_GET["regname"] && $_GET["regemail"] && $_GET["regpass1"] && $_GET["regpass2"] )
{
	if($_GET["regpass1"]==$_GET["regpass2"])
	{
	$serverName = "tcp:mssqlserver011.database.windows.net";  
$connectionOptions = array(  
    "Database" => "mssql",  
    "UID" => "meet",  
    "PWD" => "Qwerty123456"  
);  
$conn = sqlsrv_connect($serverName, $connectionOptions);  
  
if ($conn === false)  
    {  
    die(print_r(sqlsrv_errors() , true));  
    }  
    mysql_select_db("test",$conn);
    $sql="insert into users (name,email,password)values('$_GET[regname]','$_GET[regemail]','$_GET[regpass1]')";
    $result=mysql_query($sql,$conn) or die(mysql_error());		
    print "<h1>you have registered sucessfully</h1>";
   
    print "<a href='index.php'>go to login page</a>";
	}
	else print "passwords doesnt match";
}
else print"invaild input data";

?>
