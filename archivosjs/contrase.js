let contra1 = document.getElementsByName('contra1');
let contra2 = document.getElementsByName('contra2');

if (contra1.value == contra2.value){
    contra2.innerHTML="HOLAAAA"
}

function toggleEspecialidad() {
    var especialidadContainer = document.getElementById('especialidad-container');
    var selectedRole = document.querySelector('input[name="gender"]:checked');
    
    if (selectedRole && selectedRole.value === 'instructores') {
        especialidadContainer.style.display = 'flex';
    } else {
        especialidadContainer.style.display = 'none';
    }
}