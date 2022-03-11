<?php

class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $product_specific;
    protected $product_type;

    public function getPropertiesArray()
    {
        return get_object_vars($this);
    }

    // executes method for each present input field, with option to pass array of input fields to exclude
    public function performActionForEachInput($className, $action, array $exclude = null)
    {
        $objProperties = $this->getPropertiesArray();

        if ($exclude === NULL) {
            $exclude = array('No exclude parameter passed');
        }

        foreach ($objProperties as $property => $value) {
            if (isset($_POST["$property"]) && !in_array($property, $exclude)) {
                $className->$action($_POST["$property"]);
            }
        }
    }

    // setters
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setProduct_specific()
    {
    }

    public function setProduct_type($product_type)
    {
        $this->product_type = $product_type;
    }

    // getters
    public function getSku()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getProduct_specific()
    {
        return $this->product_specific;
    }

    public function getProduct_type()
    {
        return $this->product_type;
    }
}
