import '@popperjs/core';
import './bootstrap';
import './script.js';
import DataTable from 'datatables.net-bs5';
window.DataTable = DataTable;
window.$ = $;
window.bootstrap = bootstrap;

// Alert Modal
$(document).ready(function(){
    var myModal = new bootstrap.Modal(document.getElementById("alert"));
    myModal.show();
})

// DataTable
$(document).ready(function(){
    $('#dataTables').DataTable();
});