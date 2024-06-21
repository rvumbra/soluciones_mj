//#region Expandir contenido junto con el menú.
document.addEventListener('DOMContentLoaded', function() {
    // Assuming you have a button or some element to toggle the sidebar
    var toggleSidebarButton = document.querySelector('#menuBtn');

    if (toggleSidebarButton) {
        toggleSidebarButton.addEventListener('click', function() {
            var sidebar = document.querySelector('.sidebar');
            var app = document.querySelector('#app');

            if (sidebar) {
                sidebar.classList.toggle('collapsed');
            }

            if (app) {
                app.classList.toggle('shifted');
            }
        });
    }
});
//#endregion
