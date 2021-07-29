<?php
class Set{
    private $elements;

    public function __construct(){
        $this->elements = array();
    }

    public function isExist($ele)
    {
        return in_array($ele, $this->elements);
    }

    public function add($ele)
    {
        if (!$this->isExist($ele)){
            $this->elements[] = $ele;
        }
    }

    public function get()
    {
        return $this->elements;
    }

    public function addArrayToSet($arr)
    {
        foreach($arr as $i)
        {
            $this->add($i);
        }
    }
}

function extractMonth($date)
{
    $timestamp = strtotime($date);
    return date("m", $timestamp);
}

$set = new Set();

$day1Words = ["Hello", "Hi", "Good morning", "Good night"];
$day2Words = ["Name", "Age"];
$day3Words = ["How are you", "Fine", "Thank"];

$allDaysWords = [$day1Words, $day2Words, $day3Words];

foreach($allDaysWords as $dayWords)
{
    $set->addArrayToSet($dayWords);
}

print_r($set->get());

?>