<?php

class Product
{
  private $id;
  private $name;
  private $price;
  private $stock;
  private $categoryId;

  public function __construct($id, $name, $price, $stock, $categoryId)
  {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->stock = $stock;
    $this->categoryId = $categoryId;
  }

  // Getters
  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function getStock()
  {
    return $this->stock;
  }

  public function getCategoryId()
  {
    return $this->categoryId;
  }

}
