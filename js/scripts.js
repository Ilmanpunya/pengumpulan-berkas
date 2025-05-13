/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Tambahkan ini untuk memaksa sidebar disembunyikan di awal
    if (!localStorage.getItem('sb|sidebar-toggle')) {
        document.body.classList.add('sb-sidenav-toggled');
    }

    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();

            if (document.body.classList.contains('sb-sidenav-toggled')) {
                document.body.classList.remove('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', 'false');
            } else {
                document.body.classList.add('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', 'true');
            }
        });
    }

});
