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

    public function reverseList(){
        $prevNode = null;
        $currentNode = $this->head;
        $nextNode = null;

        // Execute $currentNode is not null
        while ($currentNode != null){
            // Set next of $currentNode to $nextNode
            $nextNode = $currentNode->getNext();
            // Set $prevNode to next of $currentNode
            $currentNode->setNext($prevNode);
            // Set $currentNode to $prevNode
            $prevNode = $currentNode;
            // Set $nextNode to $currentNode
            $currentNode = $nextNode;
        }

        // Set $prevNode to head
        $this->head = $prevNode;
    }
}

$list = new LinkedList(); // init linked list: $head = null
$list->insert(1);
$list->insert(2);
$list->insert(3);
$list->insert(4);
$list->insert(5); // (1) -> (2) -> (3) -> (4) -> (5) 

$list->visit();

$list->reverseList();  // (5) -> (4) -> (3) -> (2) -> (1) 

$list->visit();

?>
