<?php
$a= array(1,2,3);
$len1=count($a);
$b=array_unique($a);
$len2= count($b);
if ($len1==$len2)
{
	echo "Has no duplicate";
}
else
{
	check_each_duplicate($a);
	
}

function check_each_duplicate($a)
{
$b= array_count_values($a);
	foreach($b as $value=>$key)
	{
	if ($key>1)
		{
		echo "The number is ".$value . " Duplicated ". $key . " time </br>";
		}
	}
}
?>
