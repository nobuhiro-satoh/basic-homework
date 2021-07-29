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
    
    public function getHead(){
        return $this->head;
    }

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
    
    public function mergeList($list1, $list2){
        
        if ($list1->getHead() == null){
            return $list2;
        }

        if ($list2->getHead() == null){
            return $list1;
        }

        if ($list1->getHead()->getData() < $list2->getHead()->getData()){
            return $this->mergeList_AscendingOrder($list1, $list2);
        } else{
            return $this->mergeList_AscendingOrder($list2, $list1);
        }
    }
    // merge two lists and sort merged list
    public function mergeList_AscendingOrder($list1, $list2){
        
        // If $list1 have one node,
        if ($list1->getHead()->getNext() == null){
            // set $list2 next to $list1 and return the list
            $list1->getHead()->setNext($list2);
            return $list1;
        }

        // Initialize current and next pointers of both lists
        $currentList1 = $list1->getHead();
        $nextList1 = $list1->getHead()->getNext();
        $currentList2 = $list2->getHead();
        $nextList2 = $list2->getHead()->getNext();

        // while $nextList1 exists and $currentList2 exists
        while ($nextList1 != null && $currentList2 != null){
            // if currentList1 <= currentList2 <= nextList1, currentList1 -> currentList2 -> nextList1
            if ($currentList1->getData() <= $currentList2->getData() && $currentList2->getData() <= $nextList1->getData()){
                $currentList1->setNext($currentList2);  // currentList1 -> currentList2 (currentList1 -> currentList2->head ->next2)
                $nextList2 = $currentList2->getNext();  // Proceed to the next node of currentList2

                $currentList2->setNext($nextList1);  // currentList2 -> nextList1

                // Advance currentList1 and currentList2 to the next
                $currentList1 = $currentList2;
                $currentList2 = $nextList2;

            // if currentList1 < nextList1 < currentList2
            } else {
                // if next Node of next1 exists
                if ($nextList1->getNext() != null){
                    // Advance currentList1 and nextList1 to the next
                    $currentList1 = $currentList1->getNext();
                    $nextList1 = $nextList1->getNext();
                } else {
                    $nextList1->setNext($currentList2);
                    return $list1;
                }
            }
        }
        return $list1;
    }
}

$list1 = new LinkedList();
$list1->insert(5);
$list1->insert(7);
$list1->insert(9);

$list2 = new LinkedList();
$list2->insert(4);
$list2->insert(6);
$list2->insert(8);

$list = new LinkedList();
$list = $list1->mergeList($list1, $list2);
$list->visit();

?>
