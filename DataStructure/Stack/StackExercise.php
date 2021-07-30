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

function balancedParenthese($expression)
{
    if(empty($expression)){
        return 'Expression is empty.';
    }

    $matches = array(
        ')' => '(',
        ']' => '[',
        '}' => '{'
    );

    $stack = new Stack();
    for ($i = 0; $i <  strlen($expression); $i++){
        switch($expression[$i]){
            case '(':
            case '{':
            case '[':
                $stack->push($expression[$i]);
                break;
            case ')':
            case '}':
            case ']':
                $top = $stack->top();
                $stack->pop();
                if ($top != $matches[$expression[$i]]){
                    return "Not Balanced";
                }
            default:
                break;
        }
    }

    if (!$stack->isEmpty()){
        return "Not Balanced";
    }

    return "Balaneced";
}

echo balancedParenthese('(a + b - (c + d))') . "\n";
echo balancedParenthese('{a * [b - (c + d)]}') . "\n";
echo balancedParenthese('a + (c - d))') . "\n";
echo balancedParenthese('[(a - b] * c)') . "\n";


?>