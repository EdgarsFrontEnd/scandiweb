<?php

class Book extends Product
{

    protected $weight;

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function setProduct_specific()
    {
        $this->product_specific = $this->weight;
    }

    public function getWeight()
    {
        return $this->weight;
    }
}
