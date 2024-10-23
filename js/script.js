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

function Desifrado(pass) {
    if (pass.type === "password") {
        pass.type = "text";
    } else {
        pass.type = "password";
    }
}
function Desifrado_adm() {
    var pass = document.getElementById('pass')    
    var ojo = document.getElementById('ojo')
    var ojo_cerrado = document.getElementById('ojo_cerrado')
    if (pass.type === "password") {
        pass.type = "text";
        ojo.style.display ='none'
        ojo_cerrado.style.display = 'block'

    } else {
        pass.type = "password";
        ojo.style.display ='block'
        ojo_cerrado.style.display = 'none'
    }
}