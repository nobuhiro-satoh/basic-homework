<?php
$arr_a = array(1, 2, 3, 4, 5);
$arr_b = array(10, 8, 6, 4, 2);

$arr_c = array();

for($i = 0; $i < sizeof($arr_a); $i++)
{
    $arr_c[] = $arr_a[$i] + $arr_b[$i];
}

foreach($arr_c as $value)
{
    echo $value.' ';
}

?>
