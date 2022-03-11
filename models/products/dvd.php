<?php

class Dvd extends Product
{

    protected $size;

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function setProduct_specific()
    {
        $this->product_specific = $this->size;
    }

    public function getSize()
    {
        return $this->size;
    }
}
