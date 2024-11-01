
const titulos = document.querySelectorAll('.titulo');

titulos.forEach(titulo => {
    titulo.addEventListener('click', function() {
        const respuesta = this.nextElementSibling;
        respuesta.style.display = respuesta.style.display === 'block' ? 'none' : 'block';
        
        const flecha = this.querySelector('.flecha');
        flecha.style.transform = respuesta.style.display === 'block' ? 'rotate(180deg)' : 'rotate(0deg)';
    });
});
