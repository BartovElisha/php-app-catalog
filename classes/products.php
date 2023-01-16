<?php

class Product
{
    public
    $barcode = 'A001',
    $name = 'default product',
    $description = 'description of product',
    $price = 1,
    $rating = 1;

    public function totalPrice()
    {
        return $this->price * 1.17;
    }
}