document.addEventListener('DOMContentLoaded', function() {
    const perfilTitulo = document.querySelector('.pregunta .titulo');
    const opcionesPerfil = document.getElementById('opciones-perfil');
    const checkboxes = document.querySelectorAll('#opciones-perfil input[type="checkbox"]');
    const editarPerfilBtn = document.getElementById('editar-perfil');

    // Función para alternar la visibilidad de las opciones de perfil
    function toggleOpcionesPerfil() {
        opcionesPerfil.style.display = opcionesPerfil.style.display === 'none' ? 'block' : 'none';
        perfilTitulo.querySelector('.flecha').textContent = opcionesPerfil.style.display === 'none' ? '▼' : '▲';
    }

    // Inicialmente, ocultar las opciones de perfil
    opcionesPerfil.style.display = 'none';

    // Evento click para mostrar/ocultar opciones de perfil
    perfilTitulo.addEventListener('click', toggleOpcionesPerfil);

    // Función para actualizar el perfil con las opciones seleccionadas
    function actualizarPerfil() {
        const opcionesSeleccionadas = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        console.log('Opciones seleccionadas:', opcionesSeleccionadas);
        alert('Perfil actualizado con las opciones: ' + opcionesSeleccionadas.join(', '));
    }

    // Evento click para el botón "Editar perfil"
    editarPerfilBtn.addEventListener('click', actualizarPerfil);

    // Accesibilidad: permitir toggle con la tecla Enter
    perfilTitulo.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            toggleOpcionesPerfil();
        }
    });

    // Hacer el título del perfil focusable para accesibilidad
    perfilTitulo.setAttribute('tabindex', '0');
});