<?php
class Queue{
    private $elements;

    public function __construct()
    {
        $this->elements = array();
    }

    public function enqueue($num)
    {
        array_unshift($this->elements, $num);
    }

    public function dequeue()
    {
        if (!$this->isEmpty()){
            unset($this->elements[sizeof($this->elements) - 1]);
        }
    }

    public function front()
    {
        if (!$this->isEmpty()){
            return $this->elements[sizeof($this->elements) - 1];
        }

        return null;
    }

    public function isEmpty()
    {
        return empty($this->elements);
    }
}

$queue = new Queue();
$queue->enqueue("A");
$queue->enqueue("B");
$queue->enqueue("C");

while(!$queue->isEmpty()){
    echo $queue->front()." ";
    $queue->dequeue();
}

?>