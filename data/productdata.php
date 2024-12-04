<?php

include_once 'data.php';
include_once '../domain/product.php';

class ProductData {

  public function getProducts(){
    try {
      $connection = Data::getInstance();
      $sql = $connection->prepare("SELECT * FROM products");
      $sql->execute();

      $products = [];

      foreach ($sql->fetchAll() as $row) {
        $products[] = new Product(
          $row['id'],
          $row['name'],
          $row['price'],
          $row['stock'],
          $row['category_id']
        );
      }

      return $products;
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return [];
    }
  }

  public function createProduct($product)
  {
    try {
      $conn = Data::getInstance();
      $sql = $conn->prepare("INSERT INTO products (id, name, price, stock, category_id) VALUES (?, ?, ?, ?, ?)");
      $sql->execute(
        [
          0,
          $product->getName(),
          $product->getPrice(),
          $product->getStock(),
          $product->getCategoryId()
        ]
      );
      return 1;
    } catch (PDOException $e) {
      return 0;
    }
  }

  public function updateProduct($product)
  {
    try {
      $conn = Data::getInstance();
      $sql = $conn->prepare("UPDATE products SET name = ?, price = ?, stock = ?, category_id = ? WHERE id = ?");
      $sql->execute(
        [
          $product->getName(),
          $product->getPrice(),
          $product->getStock(),
          $product->getCategoryId(),
          $product->getId()
        ]
      );
      return 1;
    } catch (PDOException $e) {
      return 0;
    }
  }

  public function deleteProductById($productId)
  {
    try {
      $conn = Data::getInstance();
      $sql = $conn->prepare("DELETE FROM products WHERE id = ?");
      $sql->execute([$productId]);
      return $sql->rowCount();
    } catch (PDOException $e) {
      return 0;
    }
  }

}

?>