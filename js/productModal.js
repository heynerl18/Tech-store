
const openModal = (action, product = {}) => {

  const modalTitle = document.getElementById('productModalLabel');
  const productId = document.getElementById('productId');
  const productName = document.getElementById('productName');
  const productPrice = document.getElementById('productPrice');
  const productStock = document.getElementById('productStock');
  const productCategory = document.getElementById('productCategory');

  const productAction = document.getElementById('action');

  if (action === 'create') {
    modalTitle.textContent = 'Agregar Producto';
    productId.value = '';
    productName.value = '';
    productPrice.value = '';
    productStock.value = '';
    productCategory.value = '';
    productAction.value = 'create';
  } else if (action === 'edit') {
    modalTitle.textContent = 'Editar Producto';
    productId.value = product.id;
    productName.value = product.name;
    productPrice.value = product.price;
    productStock.value = product.stock;
    productCategory.value = product.categoryId;
    productAction.value = 'update';

    // Seleccionar la categoría en el dropdown
    if (product.categoryId) {
      Array.from(productCategory.options).forEach(option => {
        option.selected = option.value === product.categoryId;
      });
    }

  }
}

const confirmDelete = (productId) => {

  Swal.fire({
    title: '¿Estás seguro?',
    text: "¡Esta acción no se puede deshacer!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, eliminar',
    cancelButtonText: 'Cancelar',
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = '../business/productaction.php?id=' + productId + '&action=delete';
    }
  });
}