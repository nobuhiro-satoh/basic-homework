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

/**
 * $priorityArray :Priority tasks
 * $dependentArray:Dependent list
 */
function calcProcessTime($priorityArray, $dependentArray)
{
    if (sizeof($priorityArray) != sizeof($dependentArray)){
        echo "Priority tasks and dependent list have different counts of tasks.";
        return -1;
    }
    
    $time = 0;
    
    $pri_queue = new Queue();
    $dep_queue = new Queue();
    
    foreach ($priorityArray as $priTask)
    {
        if (in_array($priTask, $dependentArray)){
            $pri_queue->enqueue($priTask);
        } else {
            echo "Priority task is not included in dependent list.";
            return -1;
        }
    }

    foreach ($dependentArray as $depTask)
    {
        if (in_array($depTask, $priorityArray)){
            $dep_queue->enqueue($depTask);
        } else {
            echo "A task in dependent list is not included in priority tasks.";
            return -1;
        }
    }

    while(!$pri_queue->isEmpty()){
        if($pri_queue->front() == $dep_queue->front()){
            
            $pri_queue->dequeue();
            $dep_queue->dequeue();
            
            $time += 2;

        } else {

            $pri_queue->enqueue($pri_queue->front());
            $pri_queue->dequeue();

            $time += 1;
        }
    }
    
    return $time;
}

$priority = [3, 2, 4, 1];
$dependent = [1, 2, 3, 4];

$time = calcProcessTime($priority, $dependent);

if ($time >= 0){
    echo $time;
}

?>