<?php
include("connection.php");
connection();
 $con=$GLOBALS["conn"];
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$sql = "SELECT  column_name FROM information_schema.`COLUMNS` WHERE table_name='test'  AND table_schema='test'  order by column_name desc limit 26 offset 3";
$result = $con->query($sql);
if ($result->num_rows > 0)
 {
    
    echo '<select name="select" onchange="showUser(this.value)" id="select">';
	echo '<option value=0 > select GE</option>' ;
         
    while($row = $result->fetch_assoc()) 
	{
         echo '<option value="' . htmlspecialchars($row['column_name']) . '">' 
        . htmlspecialchars($row['column_name']) 
        . '</option>';
    }
	echo '</select>';
   
} 
else
 {
    echo "0 results";
}

$sql = "SELECT DISTINCT  Chromosome from test";
 $result = mysqli_query($con, $sql);
if ( $result->num_rows > 0)
 {
    echo '<select name="Chromosome"   id="Chromosome" >';
	echo '<option value=0 > select Chromosome</option>' ;
    while($row = $result->fetch_assoc()) 
	{
         echo '<option value="' . htmlspecialchars($row['Chromosome']) . '">' 
        . htmlspecialchars($row['Chromosome']) 
        . '</option>';
    }
	echo '</select>';
} 
else
 {
    echo "0 results";
}
?>
<input  type="button" value="Multiple" id="search" name="search"  onclick="showMultiple()"/>
<div id="divHint"></div>
  <script language="javascript1.5" type="text/javascript">
function showUser(str) {
if (str == "") {
		document.getElementById("divHint").innerHTML = "Select any one !!!";
	return;
}
 else { 
if (window.XMLHttpRequest) {
// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else {
// code for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() 
{

if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	{
	document.getElementById("divHint").innerHTML = xmlhttp.responseText;
	}
}
xmlhttp.open("GET","getresult.php?q="+str +"&p=",true);
xmlhttp.send();
}
}
 function showMultiple() 
 {
	 str=document.getElementById("select").value;
	 str1=document.getElementById("Chromosome").value;
	if (str == "0"|| str1=="0") 
		{
			document.getElementById("divHint").innerHTML = "Select any Chromesome !!!";
			return;
		}
	 else
	  { 
		if (window.XMLHttpRequest) 
			{
			xmlhttp = new XMLHttpRequest();
			}
		else 
			{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.onreadystatechange = function() 
			{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
				{
				document.getElementById("divHint").innerHTML = xmlhttp.responseText;
				}
			}
		xmlhttp.open("GET","getresult.php?q="+str +"&p="+str1,true);
		xmlhttp.send();
	  }
}
  </script>