const cursos = [
    {
        titulo: "Java ",
        descripcion: "Domina Java desde cero: POO, colecciones, multithreading, Spring Boot y desarrollo de aplicaciones empresariales.",
        icono: "☕",
        nivel: "Todos los niveles",
        tecnologia: "Java",
        
    },
    {
        titulo: "Desarrollo Web con HTML",
        descripcion: "Aprende desarrollo web moderno con HTML, CSS y JavaScript. Crea sitios web responsive y dinámicos.",
        icono: "🌐",
        nivel: "Principiante - intermedio",
        tecnologia: "HTML",
        
    },
    {
        titulo: "C++ Avanzado",
        descripcion: "Programación en C++ moderna: STL, templates, programación genérica, optimización y patrones de diseño.",
        icono: "👨🏾‍💻",
        nivel: "Intermedio - Avanzado",
        tecnologia: "C++",
        
    },
    {
        titulo: "SQL",
        descripcion: "Aprende SQL desde lo básico hasta consultas avanzadas. Optimización de consultas bases de datos.",
        icono: "📊",
        nivel: "Todos los niveles",
        tecnologia: "SQL",
    },
    {
        titulo: "MongoDB",
        descripcion: "Domina MongoDB: CRUD, framework de agregación, índices, replicación y arquitecturas NoSQL.",
        icono: "🍃",
        nivel: "Principiante - intermedio",
        tecnologia: "MongoDB",
       
    },
    {
        titulo: "MySQL",
        descripcion: "Gestión profesional de bases de datos MySQL: diseño, optimización, respaldo y recuperación.",
        icono: "🐬",
        nivel: "Principiante - intermedio",
        tecnologia: "MySQL",
    }
];
function filtrarCursos(textoBusqueda) {
    return cursos.filter(curso => {
        const contenidoCurso = `
            ${curso.titulo.toLowerCase()} 
            ${curso.descripcion.toLowerCase()} 
            ${curso.tecnologia.toLowerCase()} 
            ${curso.nivel.toLowerCase()}
        `;
        return contenidoCurso.includes(textoBusqueda.toLowerCase());
    });
}

function crearTarjetas(cursosFiltrados) {
    const contenedor = document.getElementById('contenedor-cursos');
    contenedor.innerHTML = ''; // Limpiar contenedor

    if (cursosFiltrados.length === 0) {
        contenedor.innerHTML = `
            <div class="mensaje-sin-resultados">
                <p>No se encontraron cursos que coincidan con tu búsqueda</p>
            </div>
        `;
        return;
    }

    cursosFiltrados.forEach(curso => {
        const tarjeta = document.createElement('div');
        tarjeta.className = 'tarjeta-curso';
        
        tarjeta.innerHTML = `
            <div class="imagen-curso">
                ${curso.icono}
                <span class="etiqueta-tecnologia">${curso.tecnologia}</span>
            </div>
            <div class="contenido-curso">
                <h3 class="titulo-curso">${curso.titulo}</h3>
                <div class="caracteristicas">
                    <span class="caracteristica">📚 ${curso.nivel}</span>
                    ${curso.certificado ? '<span class="caracteristica">🏆 Certificado</span>' : ''}
                </div>
                <p class="descripcion">${curso.descripcion}</p>
                <button class="boton-inscripcion" onclick="inscribirCurso('${curso.titulo}')">
                    Inscribirse Ahora
                </button>
            </div>
        `;
        
        contenedor.appendChild(tarjeta);
    });
}

// Inicializar la búsqueda y los eventos
document.addEventListener('DOMContentLoaded', () => {
    crearTarjetas(cursos); // Mostrar todos los cursos inicialmente

    const buscador = document.getElementById('buscador');
    let timeoutId;

    buscador.addEventListener('input', (e) => {
        // Cancelar la búsqueda anterior si existe
        if (timeoutId) {
            clearTimeout(timeoutId);
        }

        // Esperar 300ms después de que el usuario deje de escribir
        timeoutId = setTimeout(() => {
            const cursosFiltrados = filtrarCursos(e.target.value);
            crearTarjetas(cursosFiltrados);
        }, 300);
    });
});

function inscribirCurso(tituloCurso) {
    // Tu lógica de inscripción aquí
    console.log(`Inscripción al curso: ${tituloCurso}`);
}

document.getElementById("generarCodigo").addEventListener("click", function () {
    // Crear una solicitud AJAX
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../paginas/agregar_curso.php", true); // Cambia la ruta según tu estructura de carpetas
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (xhr.status === 200) {
            alert(xhr.responseText); // Mensaje de éxito o error
        } else {
            alert("Error al enviar la solicitud.");
        }
    };

    // Enviar la solicitud al servidor
    xhr.send();
});