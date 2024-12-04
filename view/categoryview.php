<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Categor&iacute;a</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="../js/categoryModal.js"></script>

  <?php include_once "../business/categorybusiness.php"; ?>
</head>

<body>

  <?php include '../view/shared/navbar.php'; ?>

  <div class="container">

    <?php
    $categoriesBusiness = new CategoryBusiness();
    $categories = $categoriesBusiness->getCategories();

    if (empty($categories)) {
      echo "<p class='text-center text-danger mt-5'>No hay categorías registrados. Seleccione \"Agregar Categoría\" para registrar</p>";
    } else {
    ?>

      <button class="btn btn-success mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#categoryModal" onclick="openModal('create')"><i class="bi bi-plus-circle"></i> Agregar Categoría</button>
      <table id="categoryTable" class="display table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripci&oacute;n</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $index = 0;
          foreach ($categories as $category) {
          ?>
            <tr>
              <td><?php echo $category->getId(); ?></td>
              <td><?php echo $category->getName(); ?></td>
              <td><?php echo $category->getDescription(); ?></td>
              <td>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#categoryModal"
                  onclick="openModal('edit', <?php echo $category->getId(); ?>, '<?php echo $category->getName(); ?>', '<?php echo $category->getDescription(); ?>')">
                  Editar
                </button>
                <a href="#" class="btn btn-danger" onclick="confirmDelete(<?php echo $category->getId(); ?>)">Eliminar</a>
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

    <!-- Modals -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="categoryModalLabel">Agregar Categoría</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form id="categoryForm" action="../business/categoryaction.php" method="POST">
            <div class="modal-body">
              <input type="hidden" id="categoryId" name="id" value="">
              <input type="hidden" id="action" name="action" value="">

              <div class="mb-3">
                <label for="categoryName" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="categoryName" name="name" placeholder="Ingrese el nombre" required>
              </div>
              <div class="mb-3">
                <label for="categoryDescription" class="form-label">Descripción</label>
                <textarea class="form-control" id="categoryDescription" name="description" rows="3" placeholder="Escribe..." required></textarea>
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