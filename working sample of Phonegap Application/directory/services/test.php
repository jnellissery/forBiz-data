<?php
$host="localhost";
$database="directory";
$username="root";
$password="";

 $conn= mysqli_connect($host,$username,$password,$database) or die(mysql_errno());
 /*if(!mysql_select_db($database))
 {
 die("No Such database exist!!!");
 }*/

$result = mysqli_query($conn,"SELECT * FROM order_details");
while($row=mysqli_fetch_assoc($result))
{
echo  $row["id"]."    ". $row["qty"]."    ";

}
 
mysqli_close($conn);
?>