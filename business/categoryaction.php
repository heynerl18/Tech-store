<?php

include_once "./categorybusiness.php";
include_once "../domain/category.php";

if (isset($_POST['action'])) {

  $categoryBusiness = new CategoryBusiness();

  if (strcmp($_POST['action'], 'create') == 0) {

    if (isset($_POST['name']) && isset($_POST['description'])) {
      $result = $categoryBusiness->createCategory(new Category(0, $_POST['name'], $_POST['description']));
      if ($result) {
        header("Location: ../view/categoryview.php?message=inserted");
        exit();
      } else {
        header("Location: ../view/categoryview.php?message=error");
        exit();
      }
    }
  } else if (strcmp($_POST['action'], 'update') == 0) {

    if (isset($_POST['name']) && isset($_POST['description'])) {
      $result = $categoryBusiness->updateCategory(new Category($_POST['id'], $_POST['name'], $_POST['description']));
      if ($result) {
        header("Location: ../view/categoryview.php?message=updated");
        exit();
      } else {
        header("Location: ../view/categoryview.php?message=error");
        exit();
      }
    }
  }
} else {
  if (isset($_GET['action']) && strcmp($_GET['action'], 'delete') == 0) {

    if (isset($_GET['id'])) {

      $categoryId = $_GET['id'];

      $categoryBusiness = new CategoryBusiness();
      $result = $categoryBusiness->deleteCategoryById($categoryId);

      if ($result) {
        header("Location: ../view/categoryview.php?message=deleted");
        exit();
      } else {
        header("Location: ../view/categoryview.php?message=error");
        exit();
      }
    }
  }
}
