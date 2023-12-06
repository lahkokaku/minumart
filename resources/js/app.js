import '@popperjs/core';
import './bootstrap';
import './script.js';
import AOS from 'aos';
import 'aos/dist/aos.css';
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
    $('#dataTables').DataTable({
        processing: true,
        pageLength: 5,
        lengthMenu: [
            [5, 10, -1],
            [5, 10, 'All']
        ],
    });
});

// AOS Init
$(document).ready(function(){
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out'
    });
});