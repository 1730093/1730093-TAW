const btnEnviar = document.getElementById('enviar');
const texto = document.getElementById('texto');

btnEnviar.addEventListener('click', btnEnviar_click);


function btnEnviar_click(e) {
    if (!texto.value) {
        alert('No ha escrito un texto.');
        texto.focus();
        return;
    }
    //alert('Sexo es  ' + txtNombre.value);
    //alert('Fecha ES ' + txtFecha.value);

}