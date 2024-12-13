document.addEventListener("DOMContentLoaded", () => {
    async function cargarDatosUsuario() {
        try {
            const respuesta = await fetch("../archivosphp/get_user_info.php");
            const usuario = await respuesta.json();

            if (usuario && usuario.nombre && usuario.correo) {
                const datosUsuario = document.getElementById("datosUsuario");
                datosUsuario.innerHTML = `
                    <h2>${usuario.nombre}</h2>
                    <p><strong>Correo electrónico:</strong> ${usuario.correo}</p>
                    <p><strong>Fecha de registro:</strong> ${usuario.fecha_registro}</p>
                    <p><strong>Teléfono:</strong> ${usuario.telefono}</p>
                `;
            } else {
                console.error("Error: Datos incompletos");
                document.getElementById("datosUsuario").innerHTML = `
                    <p>Error al cargar los datos del usuario.</p>
                `;
            }
        } catch (error) {
            console.error("Error al conectar con el servidor:", error);
            document.getElementById("datosUsuario").innerHTML = `
                <p>Error al conectar con el servidor.</p>
            `;
        }
    }

    cargarDatosUsuario();
});
