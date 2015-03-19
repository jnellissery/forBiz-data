<?php
/*$a=array(1,2,3,4,5,6,7,8);
$b= array_reverse($a);
echo "The reverse order </br>";
foreach($b as $value)
{
	echo $value ."</br>";
}*/

function fib1($n)
{
 $x = 1;
 $y = 0; 
$z=0;
while($z <$n)
 {
    $z = $x + $y; 
     echo($z."<br />"); 
     $x = $y;
     $y = $z;
 }

}

echo fib1(100);
?>