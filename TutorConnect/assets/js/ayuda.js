document.getElementById('crearForm').addEventListener('submit', function(e) {
    e.preventDefault();
    if (validarFormularioSoporte()) {
        alert('Mensaje enviado');
    }
});

function validarFormularioSoporte() {
    const nombre = document.getElementById('nombre').value;
    const correo = document.getElementById('correo').value;
    const asunto = document.getElementById('asunto').value;
    const mensaje = document.getElementById('mensaje').value;

    if (!nombre || !correo || !asunto || !mensaje) {
        alert('Complete todos los campos.');
        return false;
    }
    return true;
}