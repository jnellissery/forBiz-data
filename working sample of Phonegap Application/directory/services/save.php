<?php
include 'config.php';
$in_array=$_POST["id"]; 
$posts = json_decode(stripslashes($_POST["id"]));
$posts1 = json_decode(stripslashes($_POST["qty"]));
$arraypost=explode(",",$posts);
$arraypost1=explode(",",$posts1);
$cArr =array();
$i=0;
foreach ($arraypost as $value)
{
array_push($cArr,$value,$arraypost1[$i]);
$i=$i+1;
}
$in  = str_repeat('(?,?),', count($arraypost)-1) . '(?,?)';

$sql = "INSERT INTO order_details(id,Qty)  VALUES " . $in ;
try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql); 
	$stmt->execute($cArr);
	$dbh = null;
	//echo '{"items":'. json_encode('Success') .'}';   
} 
catch(PDOException $e) 
{
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}

?>