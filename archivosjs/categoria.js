// Datos de los cursos
const cursos = [
    {
        titulo: "Java",
        descripcion: "Domina Java desde cero: POO, colecciones, multithreading, Spring Boot y desarrollo de aplicaciones empresariales.",
        icono: "☕"
    },
    {
        titulo: "Desarrollo Web con HTML",
        descripcion: "Aprende desarrollo web moderno con HTML, CSS y JavaScript. Crea sitios web responsive y dinámicos.",
        icono: "🌐"
    },
    {
        titulo: "C++ Avanzado",
        descripcion: "Programación en C++ moderna: STL, templates, programación genérica, optimización y patrones de diseño.",
        icono: "👨🏾‍💻"
    },
    {
        titulo: "SQL",
        descripcion: "Aprende SQL desde lo básico hasta consultas avanzadas. Optimización de consultas y gestión de bases de datos.",
        icono: "📊"
    },
    {
        titulo: "MongoDB",
        descripcion: "Domina MongoDB: CRUD, framework de agregación, índices, replicación y arquitecturas NoSQL.",
        icono: "🍃"
    }
];

// Crear tarjetas de cursos
function crearTarjetas(cursos) {
    const contenedor = document.getElementById('contenedor-cursos');
    contenedor.innerHTML = '';

    cursos.forEach(curso => {
        const tarjeta = document.createElement('div');
        tarjeta.className = 'tarjeta-curso';
        tarjeta.innerHTML = `
            <div>${curso.icono}</div>
            <h3>${curso.titulo}</h3>
        `;
        tarjeta.addEventListener('click', () => abrirModal(curso));
        contenedor.appendChild(tarjeta);
    });
}

// Mostrar el modal con información del curso
function abrirModal(curso) {
    const modal = document.getElementById('modal');
    document.getElementById('modal-title').textContent = curso.titulo;
    document.getElementById('modal-description').textContent = curso.descripcion;
    modal.style.display = 'flex';
}

// Cerrar el modal
document.getElementById('close-modal').addEventListener('click', () => {
    document.getElementById('modal').style.display = 'none';
});

// Buscar cursos
document.getElementById('buscador').addEventListener('input', function () {
    const textoBusqueda = this.value.toLowerCase();
    const cursosFiltrados = cursos.filter(curso => curso.titulo.toLowerCase().includes(textoBusqueda));
    crearTarjetas(cursosFiltrados);
});

// Inicializar
crearTarjetas(cursos);

// Cerrar modal al hacer clic fuera del contenido
window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
