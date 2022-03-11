<?php

class Furniture extends Product
{

    protected $height;
    protected $width;
    protected $length;

    // setters
    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function setProduct_specific()
    {
        $this->product_specific = $this->height . 'x' . $this->width . 'x' . $this->length;
    }

    // getters
    public function getHeight()
    {
        return $this->height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getLength()
    {
        return $this->length;
    }
}
