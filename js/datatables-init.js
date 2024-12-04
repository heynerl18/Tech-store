
document.addEventListener('DOMContentLoaded', function () {

  $('#categoryTable').DataTable({
    paging: true,
    searching: true,
    ordering: true,
    info: true,
    pageLength: 10,
    language: {
      url: 'https://cdn.datatables.net/plug-ins/2.1.8/i18n/es-MX.json'
    }
  });
  
  $('#productsTable').DataTable({
    paging: true,
    searching: true,
    ordering: true,
    info: true,
    pageLength: 10,
    language: {
      url: 'https://cdn.datatables.net/plug-ins/2.1.8/i18n/es-MX.json',
    }
  });
});