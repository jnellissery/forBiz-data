<?php
//header('location:test.php');
//preg_match("/^http:\/\/.+@(.+)$/","http://info@pcds.co.in",$matches);
// echo $matches[1];

ini_set('display_errors',1);
error_reporting(E_ALL);
$host="localhost";
$username="root";
$password="";

  $con = @mysql_connect($host,$username,$password,false) ;
if (!$con)
   {
   die('Could not connect: ' . mysql_error());
   }
 else
 {
   if (mysql_query("create database test123",$con))
   	{
	
		echo "Successfully createe database";
	}
	else
	{
		echo "can't create database";
	}
 }
// some code
 
mysql_close($con);
 $variable = 10;
 echo "myfunc($variable) = " . myfunc($variable);
function myfunc($argument)
		 {
        return  $argument + 10;
      	 }
      
 

 
?>