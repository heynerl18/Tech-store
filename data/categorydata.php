<?php

include_once 'data.php';
include_once '../domain/category.php';

class CategoryData
{

  public function getCategories()
  {
    try {
      $connection = Data::getInstance();
      $sql = $connection->prepare("SELECT * FROM categories");
      $sql->execute();

      $categories = [];

      foreach ($sql->fetchAll() as $row) {
        $categories[] = new Category(
          $row['id'],
          $row['name'],
          $row['description']
        );
      }

      return $categories;
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return [];
    }
  }

  public function createCategory($category)
  {
    try {
      $conn = Data::getInstance();
      $sql = $conn->prepare("INSERT INTO categories (id, name, description) VALUES (?, ?, ?)");
      $sql->execute([0, $category->getName(), $category->getDescription()]);
      return 1;
    } catch (PDOException $e) {
      return 0;
    }
  }

  public function updateCategory($category)
  {
    try {
      $conn = Data::getInstance();
      $sql = $conn->prepare("UPDATE categories SET name = ?, description = ? WHERE id = ?");
      $sql->execute([$category->getName(), $category->getDescription(), $category->getID()]);
      return 1;
    } catch (PDOException $e) {
      return 0;
    }
  }

  public function deleteCategoryById($categoryId)
  {
    try {
      $conn = Data::getInstance();
      $sql = $conn->prepare("DELETE FROM categories WHERE id = ?");
      $sql->execute([$categoryId]);
      return $sql->rowCount();
    } catch (PDOException $e) {
      return 0;
    }
  }
}
