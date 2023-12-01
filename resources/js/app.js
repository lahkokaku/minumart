import '@popperjs/core';
import './bootstrap';

window.$ = $;
window.bootstrap = bootstrap;

$(document).ready(function(){
    var myModal = new bootstrap.Modal(document.getElementById("alert"));
    myModal.show();
})