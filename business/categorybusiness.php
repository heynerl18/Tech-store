<?php

include_once '../data/categorydata.php';

class CategoryBusiness
{

  private $data;

  public function __construct()
  {
    $this->data = new CategoryData();
  }
  // Read
  public function getCategories()
  {
    return $this->data->getCategories();
  }
  // Create
  public function createCategory($category)
  {
    return $this->data->createCategory($category);
  }
  // Update
  public function updateCategory($category)
  {
    return $this->data->updateCategory($category);
  }
  // Delete
  public function deleteCategoryById($categoryId)
  {
    return $this->data->deleteCategoryById($categoryId);
  }
}
