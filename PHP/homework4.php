<?php

function searchPrimeNumbers($n)
{

	$primeNumbers = array();

	for($i = 2; $i < $n; $i++)
	{
		$flag = true;

		for($j = 2; $j < $i; $j++)
		{
			if($i%$j == 0)
			{
				$flag = false;
				break;
			}
		}

		if($flag)
		{
			$primeNumbers[] = $i;
		}

	}

	return $primeNumbers;

}

$target = 10;

echo "Prime Numbers between 2 and $target:<br>";

foreach(searchPrimeNumbers($target) as $num)
{
	echo $num."<br>";
}
?>


