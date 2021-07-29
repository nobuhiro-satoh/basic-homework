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

$input = [1, 2, 3, 4, 5, 2, -1, 5, 2, 7, 11, 11, -5];

$set->addArrayToSet($input);

print_r($set->get());

?>