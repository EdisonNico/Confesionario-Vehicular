document.addEventListener("DOMContentLoaded", function () {
    fetch('../controller/colleccioncontroller.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('contenedor-tarjetas').innerHTML = data;
        })
        .catch(error => {
            console.error('Error al cargar las tarjetas:', error);
        });
});