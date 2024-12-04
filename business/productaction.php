<?php

include_once "./productbusiness.php";
include_once "../domain/product.php";

if (isset($_POST['action'])) {

  $productBusiness = new ProductBusiness();

  if (strcmp($_POST['action'], 'create') == 0) {

    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_POST['categoryId'])) {

      $result = $productBusiness->createProduct(
        new Product(0, $_POST['name'], $_POST['price'], $_POST['stock'], $_POST['categoryId'])
      );
      if ($result) {
        header("Location: ../view/productview.php?message=inserted");
        exit();
      } else {
        header("Location: ../view/productview.php?message=error");
        exit();
      }
    }
  } else if(strcmp($_POST['action'], 'update') == 0){

    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_POST['categoryId'])) {

      $result = $productBusiness->updateProduct(
        new Product($_POST['id'], $_POST['name'], $_POST['price'], $_POST['stock'], $_POST['categoryId'])
      );
      if ($result) {
        header("Location: ../view/productview.php?message=updated");
        exit();
      } else {
        header("Location: ../view/productview.php?message=error");
        exit();
      }
    }
  }
} else {

  if (isset($_GET['action']) && strcmp($_GET['action'], 'delete') == 0) {

    if (isset($_GET['id'])) {

      $productId = $_GET['id'];

      $productBusiness = new ProductBusiness();
      $result = $productBusiness->deleteProductById($productId);

      if ($result) {
        header("Location: ../view/productview.php?message=deleted");
        exit();
      } else {
        header("Location: ../view/productview.php?message=error");
        exit();
      }
    }
  }
}

?>