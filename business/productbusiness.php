<?php

include_once '../data/productdata.php';

class ProductBusiness {

  private $data;

  public function __construct()
  {
    $this->data = new ProductData();
  }

  // Read
  public function getProducts()
  {
    return $this->data->getProducts();
  }
  // Create
  public function createProduct($product)
  {
    return $this->data->createProduct($product);
  }
  // Update
  public function updateProduct($product)
  {
    return $this->data->updateProduct($product);
  }
  // Delete
  public function deleteProductById($productId)
  {
    return $this->data->deleteProductById($productId);
  }
}

?>