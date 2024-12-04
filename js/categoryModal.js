
const openModal = (action, id = '', name = '', description = '') => {
  
  const modalTitle = document.getElementById('categoryModalLabel');
  const categoryIdInput = document.getElementById('categoryId');
  const categoryAction = document.getElementById('action');
  const categoryNameInput = document.getElementById('categoryName');
  const categoryDescriptionInput = document.getElementById('categoryDescription');
  
  if (action === 'create') {
    modalTitle.textContent = 'Agregar Categoría';
    categoryIdInput.value = '';
    categoryNameInput.value = '';
    categoryDescriptionInput.value = '';
    categoryAction.value = 'create';
    
  } else if (action === 'edit') {
    modalTitle.textContent = 'Editar Categoría';
    categoryIdInput.value = id;
    categoryNameInput.value = name;
    categoryDescriptionInput.value = description;
    categoryAction.value = 'update';
  }
}

const confirmDelete = (categoryId) => {

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
      window.location.href = '../business/categoryaction.php?id=' + categoryId + '&action=delete';
    }
  });
}