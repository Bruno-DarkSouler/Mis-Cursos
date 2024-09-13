
const titulo = document.querySelectorAll('.titulo');


titulo.forEach(titulo => {
    titulo.addEventListener('click', function() {
     
        const respuesta = this.nextElementSibling;
        respuesta.style.display = respuesta.style.display === 'block' ? 'none' : 'block';
        const flecha = this.querySelector('.flecha');
        flecha.style.transform = flecha.style.transform === 'rotate(180deg)' ? 'rotate(0deg)' : 'rotate(180deg)';

    });
});