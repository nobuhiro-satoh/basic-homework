<?php

function primeNumberCheak($n)
{

	$flag = true;

	for($i = 2; $i < $n; $i++)
	{
		if($n%$i == 0)
		{
			$flag = false;
			break;
		}
	}

	if($flag){
		echo "$n is prime number.";
	}else{
		echo "$n is not prime number.";
	}

}

$target = 2;

primeNumberCheak($target);


?>
