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

	return $flag;

}

$target = 2;

if(primeNumberCheak($target)){
	echo "$target is prime number.";
}else{
	echo "$target is not prime number.";
}

?>


