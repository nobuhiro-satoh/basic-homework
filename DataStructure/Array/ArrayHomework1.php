<?php
$arr = array(5, 12, 17, 9, 3);

$max = $arr[0];
$min = $arr[0];

$sum = 0;

foreach($arr as $value)
{
	if($value > $max)
	{
		$max = $value;
	}

	if($value < $min)
	{
		$min = $value;
	}

	$sum += $value;
}

$avg = $sum / sizeof($arr);

echo "Max:$max, Min:$min, Sum:$sum, Average:$avg";

?>

