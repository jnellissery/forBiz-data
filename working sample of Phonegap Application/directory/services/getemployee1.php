<?php
include 'config.php';
$in_array=$_POST["id"]; 
   $posts = json_decode(stripslashes($_POST["id"]));
  $arraypost=explode(",",$posts);
$cArr =array();
foreach($arraypost as $value)
{
array_push($cArr, $value); 
//array_push($cArr, $arraypost[0]); 
//array_push($cArr, $arraypost[1]);
//array_push($cArr, $arraypost[2]);
}
$in  = str_repeat('?,', count($cArr)-1) . '?';
$sql = "select e.id, e.firstName, e.lastName, e.managerId, e.title, e.department, e.city, e.officePhone, e.cellPhone, " .
		"e.email, e.picture, m.firstName managerFirstName, m.lastName managerLastName, count(r.id) reportCount " . 
		"from employee e left join employee r on r.managerId = e.id left join employee m on e.managerId = m.id " .
		"where e.id in($in) group by e.lastName order by e.lastName, e.firstName";
try {
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $dbh->prepare($sql); 
	$stmt->execute($cArr);
	$employee = $stmt->fetchAll();
	$dbh = null;
	echo '{"items":'. json_encode($employee) .'}';   
} 
catch(PDOException $e) 
{
	echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}

?>