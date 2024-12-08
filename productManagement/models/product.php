<?php
namespace Models;

class Product
{
  public $id;
  public $name;
  public $price;
  public $description;
  public $vendor;

  public function __construct($name, $price, $description, $vendor)
  {
    $this->name = $name;
    $this->price = $price;
    $this->description = $description;
    $this->vendor = $vendor;
  }
}