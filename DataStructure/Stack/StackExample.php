<?php

class Stack{
    private $elements;

    public function __construct()
    {
        $this->elements = array();
    }

    public function push($num)
    {
        $this->elements[] = $num;
    }

    public function pop()
    {
        if(!$this->isEmpty()){
            array_pop($this->elements);
        }
    }

    public function top()
    {
        if(!$this->isEmpty()){
            return $this->elements[sizeof($this->elements) - 1];
        }

        return null;
    }

    public function isEmpty()
    {
        return empty($this->elements);
    }
}


?>