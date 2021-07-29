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
}

function extractMonth($date)
{
    $timestamp = strtotime($date);
    return date("m", $timestamp);
}

$set = new Set();

$set->add(extractMonth("2019/01/14")); // add month 01, set (1)
$set->add(extractMonth("2019/10/04")); // add month 10, set (1, 10)
$set->add(extractMonth("2019/01/02")); // add month 01, set (1, 10)
$set->add(extractMonth("2019/03/02")); // add month 03, set (1, 10, 3)
$set->add(extractMonth("2019/01/02")); // add month 01, set (1, 10, 3)

print_r($set->get());

?>