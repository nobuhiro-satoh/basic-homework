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

    public function size()
    {
        return sizeof($this->elements);
    }
}

function destroyPairWords($words)
{
    $stack = new Stack();

    foreach ($words as $word)
    {
        if ($stack->isEmpty()){
            $stack->push($word);
        } else {
            $top = $stack->top();

            if ($top == $word){
                $stack->pop();
            } else {
                $stack->push($word);
            }
        }
    }

    return $stack->size();
}

$words = ["aa", "ab", "abc", "abc", "ab", "bb"];
echo destroyPairWords($words);

?>