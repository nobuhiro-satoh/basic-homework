<?php
class Shape{
	protected $width;
	protected $height;

	function __construct($width, $height){
		$this->width = $width;
		$this->height = $height;
	}

}

class Triangle extends Shape{
	public function area(){
		return $this->width * $this->height / 2;
	}
}

class Rectangle extends Shape{
	public function area(){
		return $this->width * $this->height;
	}
}

$widthOfTriangle = 6;
$heightOfTriangle = 7;

$triangle = new Triangle($widthOfTriangle, $heightOfTriangle);

echo "When width is {$widthOfTriangle} and height is {$heightOfTriangle}, the area of the triangle is {$triangle->area()}.<br>";

$widthOfRectangle = 7;
$heightOfRectangle = 8;

$rectangle = new Rectangle($widthOfRectangle, $heightOfRectangle);

echo "When width is {$widthOfRectangle} and height is {$heightOfRectangle}, the area of the rectangle is {$rectangle->area()}.<br>";
?>
