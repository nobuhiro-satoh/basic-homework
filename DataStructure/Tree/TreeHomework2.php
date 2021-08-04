<?php

class Node{

    private $data;
    private $left;
    private $right;

    public function __construct($data, $left = null, $right = null)
    {
        $this->data = $data;
        $this->left = $left;
        $this->right = $right;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getLeft()
    {
        return $this->left;
    }

    public function setLeft($left)
    {
        $this->left = $left;
    }

    public function getRight()
    {
        return $this->right;
    }

    public function setRight($right)
    {
        $this->right = $right;
    }
}

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

class BinaryTree{
    protected $root;

    public function __construct($root = null)
    {
        $this->root = $root;
    }

    public function isEmpty(){
        return $this->root === null;
    }

    public function getRoot()
    {
        return $this->root;
    }

    public function setRoot($root)
    {
        $this->root = $root;
    }

    public function traverse($method){
        switch ($method){
            case 'inorder':
                $this->_inorder($this->root);
                break;

            case 'postorder':
                $this->_postorder($this->root);
                break;
                
            case 'preorder':
                $this->_preorder($this->root);
                break;
        }
    }

    private function _inorder($node) {

        if ($node->getLeft()){
            $this->_inorder($node->getLeft());
        }

        echo $node->getData(). " ";

        if ($node->getRight()){
            $this->_inorder($node->getRight());
        }

    }

    private function _preorder($node) {

        echo $node->getData(). " ";

        if ($node->getLeft()){
            $this->_preorder($node->getLeft());
        }

        if ($node->getRight()){
            $this->_preorder($node->getRight());
        }

    }

    private function _postorder($node) {

        if ($node->getLeft()) {
            $this->_postorder($node->getLeft());
        }

        if ($node->getRight()) {
            $this->_postorder($node->getRight());
        }

        echo $node->getData(). " ";

    }

    public function insertNewKey($key)
    {
        if ($this->root === null)
        {
            $this->root = new Node($key);
            return;
        }

        $queue = new Queue();

        $queue->enqueue($this->root);

        while(!$queue->isEmpty()){

            if ($queue->front()->getLeft() === null){
                $queue->front()->setLeft(new Node($key));
                return;
            } else {
                $queue->enqueue($queue->front()->getLeft());
            }

            if ($queue->front()->getRight() === null){
                $queue->front()->setRight(new Node($key));
                return;
            } else {
                $queue->enqueue($queue->front()->getRight());
            }

            $queue->dequeue();

        }

    }
}

$leaf1 = new Node(7);
$leaf2 = new Node(15);
$leaf3 = new Node(8);

$parent1 = new Node(11, $leaf1);
$parent2 = new Node(9, $leaf2, $leaf3);

$root = new Node(10, $parent1, $parent2);

$bt = new BinaryTree($root);

$bt->traverse('inorder');

echo "\n";

$bt->insertNewKey(12);

$bt->traverse('inorder');

?>