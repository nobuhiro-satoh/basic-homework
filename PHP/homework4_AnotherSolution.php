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

function searchPrimeNumbers($n)
{

	$primeNumbers = array();

	for($i = 2; $i < $n; $i++)
	{
		if(primeNumberCheak($i))
		{
			$primeNumbers[] = $i;
		}

	}

	return $primeNumbers;

}

$target = 15;

echo "Prime Numbers between 2 and $target:<br>";

foreach(searchPrimeNumbers($target) as $num)
{
	echo $num."<br>";
}

?>


