 // Añadimos un event listener a todos los botones de inscripción
 document.querySelectorAll('.inscribirButton').forEach(function(button) {
    button.addEventListener('click', function() {
        const cursoId = this.getAttribute('data-id'); // Obtener el ID del curso desde el atributo 'data-id'

        // Mostrar el ID del curso en un lugar específico de la página (por ejemplo, en un div con id 'resultado')
        document.getElementById('resultado').innerText = "ID del curso seleccionado: " + cursoId;
    });
});