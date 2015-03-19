<?php
function factorial($n)
	{
	if($n>0)
		if ($n==1 || $n==2)
			{
				return $n;
			}
		 else
		 {
		 	return $n*factorial($n-1);
		 }
	}
echo factorial(6);
?>