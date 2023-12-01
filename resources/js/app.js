import '@popperjs/core';
import './bootstrap';
import './script.js';
window.$ = $;
window.bootstrap = bootstrap;

$(document).ready(function(){
    var myModal = new bootstrap.Modal(document.getElementById("alert"));
    myModal.show();
})