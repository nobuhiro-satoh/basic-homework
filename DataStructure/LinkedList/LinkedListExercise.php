<?php
class Node{
    private $data;
    private $next;

    public function __construct($data = 0, $next = null)
    {
        $this->data = $data;
        $this->next = $next;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setNext($next)
    {
        $this->next = $next;
    }
}

class LinkedList{
    private $head;

    public function insert($data)
    {
        $newNode = new Node($data);
        
        if($this->head == null){
            $this->head = $newNode;
        }else{
            $last = $this->head;
            while($last->getNext() != null){
                $last = $last->getNext();
            }

            $last = $last->setNext($newNode);
        }
    }

    public function visit()
    {
        $currNode = $this->head;

        echo "Linked List: ";
        
        while($currNode != null)
        {
            echo $currNode->getData()." ";
            $currNode = $currNode->getNext();
        }
    }

    public function deleteFirst($data)
    {
        if ($this->head == null){
            echo "List is empty.";
            return;
        }

        if ($this->head->getData() == $data){
            $this->head = $this->head->getNext();
        } else {
            $current = $this->head;
            while ($current->getNext() != null){
                if ($current->getNext()->getData() == $data){
                    $current->setNext($current->getNext()->getNext());
                    return;
                }
                $current = $current->getNext();
            }
            echo "Not found.";
        }

    }
}

$list = new LinkedList(); // init linked list: $head = null
$list->insert(5); //insert first node with value equal 5, $head->value = 5
$list->insert(4); // (5) -> (4)
$list->insert(10); // (5) -> (4) -> (10)

$list->visit(); // visit linked list

$list->deleteFirst(4);
$list->visit(); // 5 10

$list->deleteFirst(5);
$list->visit(); // 10

$list->deleteFirst(1); // Not found.
$list->visit(); // 10

?>
