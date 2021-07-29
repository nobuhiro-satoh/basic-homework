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

$set = new Set(); // init set: ()
$set->add(1); // add 1 to set: (1)
$set->add(3); // add 3 to set: (1, 3)
$set->add(1); // add 1 to set: (1, 3), 1 is existed
$set->add(2); // add 2 to set: (1, 3, 2)
print_r($set->get()); // print set

?>