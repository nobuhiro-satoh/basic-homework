<?php

function factorialOfNumber($n)
{
	$result = 1;

	for($i = 1; $i <= $n; $i++)
	{
		$result *= $i;
	}

	return $result;

}

echo factorialOfNumber(10);
?>

