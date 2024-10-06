function inicio() {
    var Registro = document.getElementById('Registro');
    var inicio = document.getElementById('Iniciar');
    var div = document.querySelector('#Iniciar');
    var inputs = document.querySelector('#Registro');
    if (Registro.style.display === 'none') {

        Registro.style.display = 'flex';
        inicio.style.display = 'none';
        inputs.style.animation = "logo 2s";


    }
    else {
        Registro.style.display = 'none';
        inicio.style.display = 'flex';
        div.style.animation = "logo 2s";
    }

}

