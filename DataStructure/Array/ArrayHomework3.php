<?php

$arr = array(
    array(1, 2, 3, 4, 5, 6),
    array(2, 4, 6, 8, 10, 12),
    array(30, 22, 26, 2, 6, 10),
);

$min = $arr[0][0];
$max = $arr[0][0];
$sum = 0;
$cnt = 0;

foreach($arr as $rows)
{
    foreach($rows as $value)
    {
        if($value < $min)
        {
            $min = $vlaue;
        }

        if($value > $max)
        {
            $max = $value;
        }

        $sum += $value;

        $cnt++;
    }
}

$avg = $sum / $cnt;

echo "Average:$avg Sum:$sum Min:$min Max:$max";

?>
