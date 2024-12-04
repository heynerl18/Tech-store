<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="../js/productModal.js"></script>

  <?php
  include_once "../business/productbusiness.php";
  include_once "../business/categorybusiness.php";
  ?>


</head>

<body>

  <?php include '../view/shared/navbar.php'; ?>

  <div class="container">
    <?php

    $productBusiness = new ProductBusiness();
    $categoryBusiness = new CategoryBusiness();

    $products = $productBusiness->getProducts();
    $categories = $categoryBusiness->getCategories();

    if (empty($products)) {
      echo "<p class='text-center text-danger mt-5'>No hay productos registrados. Seleccione \"Agregar Producto\" para registrar</p>";
    } else {
    ?>
      <button class="btn btn-success mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#productModal" onclick="openModal('create')"><i class="bi bi-plus-circle"></i> Agregar Producto</button>
      <table id="productsTable" class="display table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Categor&iacute;a</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $index = 0;
          foreach ($products as $product) {
          ?>
            <tr>
              <td><?php echo $product->getId(); ?></td>
              <td><?php echo $product->getName(); ?></td>
              <td><?php echo $product->getPrice(); ?></td>
              <td><?php echo $product->getStock(); ?></td>
              <td>
                <?php

                foreach ($categories as $category) {

                  if ($category->getId() == $product->getCategoryId()) {
                    echo '<span>' . $category->getName() . '</span>';
                    break;
                  }
                }
                ?>
              </td>
              <td>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#productModal"
                  onclick="openModal('edit',{
                     id: '<?php echo $product->getID(); ?>',
                     name: '<?php echo $product->getName(); ?>',
                     price: '<?php echo $product->getPrice(); ?>',
                     stock: '<?php echo $product->getStock(); ?>',
                     categoryId: '<?php echo $product->getCategoryId(); ?>'
                    } 
                  )">
                  Editar
                </button>
                <a href="#" class="btn btn-danger" onclick="confirmDelete(<?php echo $product->getId(); ?>)">Eliminar</a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    <?php
    }
    ?>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="productModalLabel">Agregar / Editar Producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="../business/productaction.php" method="POST">
            <div class="modal-body">

              <input type="hidden" id="productId" name="id" value="">
              <input type="hidden" id="action" name="action" value="">

              <div class="mb-3">
                <label for="productName" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="productName" name="name" placeholder="Ingrese el nombre" required>
              </div>

              <div class="mb-3">
                <label for="productPrice" class="form-label">Precio</label>
                <input type="number" class="form-control" id="productPrice" name="price" step="0.01" min="0" placeholder="Ingrese el precio" required>
              </div>

              <div class="mb-3">
                <label for="productStock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="productStock" name="stock" min="0" placeholder="Ingrese el stock" required>
              </div>

              <div class="mb-3">
                <label for="productCategory" class="form-label">Categoría</label>
                <select class="form-select" id="productCategory" name="categoryId" required>
                  <option value="" disabled selected>Selecciona una categoría</option>
                  <?php

                  foreach ($categories as $category) {
                  ?>
                    <option value="<?php echo $category->getId(); ?>"><?php echo $category->getName() ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>


  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
  <script src="../js/datatables-init.js"></script>

</body>

</html>