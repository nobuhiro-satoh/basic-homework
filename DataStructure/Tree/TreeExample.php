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
}

$leaf1 = new Node(4);
$leaf2 = new Node(9);
$leaf3 = new Node(15);

$parent1 = new Node(5, $leaf1);
$parent2 = new Node(7, null, $leaf2);
$parent3 = new Node(10, $parent2, $leaf3);

$root = new Node(6, $parent1, $parent3);

$bt = new BinaryTree($root);

echo "Inorder\n";
$bt->traverse('inorder');
echo "\nPostorder\n";
$bt->traverse('postorder');
echo "\nPreorder\n";
$bt->traverse('preorder');

?>