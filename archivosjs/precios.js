const cursos = [
    {
        titulo: "Java ",
        descripcion: "Domina Java desde cero: POO, colecciones, multithreading, Spring Boot y desarrollo de aplicaciones empresariales.",
        precio: "$USD 19.99",
        icono: "☕",
        nivel: "Todos los niveles",
        tecnologia: "Java",
        
    },
    {
        titulo: "Desarrollo Web con HTML",
        descripcion: "Aprende desarrollo web moderno con HTML, CSS y JavaScript. Crea sitios web responsive y dinámicos.",
        precio: "$USD 20.99",
        icono: "🌐",
        nivel: "Principiante - intermedio",
        tecnologia: "HTML",
        
    },
    {
        titulo: "C++ Avanzado",
        descripcion: "Programación en C++ moderna: STL, templates, programación genérica, optimización y patrones de diseño.",
        precio: "$USD 12.99",
        icono: "👨🏾‍💻",
        nivel: "Intermedio - Avanzado",
        tecnologia: "C++",
        
    },
    {
        titulo: "SQL",
        descripcion: "Aprende SQL desde lo básico hasta consultas avanzadas. Optimización de consultas bases de datos.",
        precio: "$USD 11.99",
        icono: "📊",
        nivel: "Todos los niveles",
        tecnologia: "SQL",
    },
    {
        titulo: "MongoDB",
        descripcion: "Domina MongoDB: CRUD, framework de agregación, índices, replicación y arquitecturas NoSQL.",
        precio: "$USD 23.99",
        icono: "🍃",
        nivel: "Principiante - intermedio",
        tecnologia: "MongoDB",
       
    },
    {
        titulo: "MySQL",
        descripcion: "Gestión profesional de bases de datos MySQL: diseño, optimización, respaldo y recuperación.",
        precio: "$USD 20.99",
        icono: "🐬",
        nivel: "Principiante - intermedio",
        tecnologia: "MySQL",
    }
];
function handleImageError(img) {
    img.onerror = null; 
    img.src = '../icon.jpg'; 
}
function crearTarjetasCursos() {
    const contenedor = document.getElementById('contenedor-cursos');
    
    cursos.forEach(curso => {
        const tarjeta = document.createElement('div');
        tarjeta.className = 'tarjeta-curso';
        
        tarjeta.innerHTML = `
            <div class="imagen-curso">
                ${curso.icono}
                <span class="tecnologia-curso">${curso.tecnologia}</span>
            </div>
            <div class="contenido-curso">
                <h3 class="titulo-curso">${curso.titulo}</h3>
                <div class="caracteristicas-curso">
                    <span class="caracteristica">📚 ${curso.nivel}</span>
                    ${curso.certificado ? '<span class="caracteristica">🏆 Certificado</span>' : ''}
                </div>
                <p class="descripcion-curso">${curso.descripcion}</p>
                <p class="precio-curso">${curso.precio}</p>
                <button class="boton" onclick="inscribirCurso('${curso.titulo}')">Inscribirse Ahora</button>
            </div>
        `;
        
        contenedor.appendChild(tarjeta);
    });
}

document.addEventListener('DOMContentLoaded', crearTarjetasCursos);

