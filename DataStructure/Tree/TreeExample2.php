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

class SearchBinaryTree extends BinaryTree {
    public function insert($data) {

        if ($this->root == NULL){

            $this->root = new Node($data);

        } else {

            $current = $this->root;

            while(true){

                if ($data < $current->getData()){

                    if($current->getLeft()){
                        $current = $current->getLeft();
                    } else {
                        $current->setLeft(new Node($data));
                        break;
                    }

                } else if($data > $current->getData()) {

                    if($current->getRight()) {
                        $current = $current->getRight();
                    } else {
                        $current->setRight(new Node($data));
                        break;
                    }
                } else {
                    break;
                }
            }
        }
    }
}

$arr = array(8,3,1,6,4,7,10,14,13);

$tree = new SearchBinaryTree();

for($i = 0, $n = count($arr); $i < $n; $i++){
    $tree->insert($arr[$i]);
}

echo "\nShow SBT preorder: \n";
$tree->traverse('inorder');

?>