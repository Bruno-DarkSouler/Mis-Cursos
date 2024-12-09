document.addEventListener('DOMContentLoaded', function() {
    const perfilTitulo = document.querySelector('.pregunta .titulo');
    const opcionesPerfil = document.getElementById('opciones-perfil');
    const checkboxes = document.querySelectorAll('#opciones-perfil input[type="checkbox"]');
    const editarPerfilBtn = document.getElementById('editar-perfil');
    const cerrarSesionBtn = document.getElementById('cerrar-sesion');
    const descripcionTextarea = document.getElementById('descripcion');
    let modoEdicion = false;

    // Función para alternar la visibilidad de las opciones de perfil
    function toggleOpcionesPerfil() {
        opcionesPerfil.style.display = opcionesPerfil.style.display === 'none' ? 'block' : 'none';
        perfilTitulo.querySelector('.flecha').textContent = opcionesPerfil.style.display === 'none' ? '▼' : '▲';
    }

    // Inicialmente, ocultar las opciones de perfil
    opcionesPerfil.style.display = 'none';

    // Función para habilitar/deshabilitar la edición
    function toggleEdicion() {
        modoEdicion = !modoEdicion;
        
        // Habilitar/deshabilitar checkboxes
        checkboxes.forEach(checkbox => {
            checkbox.disabled = !modoEdicion;
        });

        // Habilitar/deshabilitar textarea
        descripcionTextarea.readOnly = !modoEdicion;

        // Cambiar el texto del botón
        editarPerfilBtn.textContent = modoEdicion ? 'Guardar cambios' : 'Editar perfil';

        if (!modoEdicion) {
            // Guardar cambios
            const opcionesSeleccionadas = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);
            
            const descripcion = descripcionTextarea.value;
            
            // Aquí podrías enviar los datos a un servidor
            console.log('Guardando cambios:', {
                cursos: opcionesSeleccionadas,
                descripcion: descripcion
            });
            
            alert('Cambios guardados exitosamente');
        }
    }

    // Función para cerrar sesión
    function cerrarSesion() {
        if (confirm('¿Estás seguro que deseas cerrar sesión?')) {
            // Aquí irían las acciones de cierre de sesión
            alert('Sesión cerrada exitosamente');
            window.location.href = 'login.html'; // Redirigir a la página de login
        }
    }

    // Event Listeners
    perfilTitulo.addEventListener('click', toggleOpcionesPerfil);
    editarPerfilBtn.addEventListener('click', toggleEdicion);
    cerrarSesionBtn.addEventListener('click', cerrarSesion);

    // Accesibilidad
    perfilTitulo.setAttribute('tabindex', '0');
    perfilTitulo.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            toggleOpcionesPerfil();
        }
    });
});

