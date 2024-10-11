function Desifrado(pass) {
    if (pass.type === "password") {
        pass.type = "text";
    } else {
        pass.type = "password";
    }
}

function Actualiza_Contrasena() {
    var activador = document.getElementById('activar');
    var seccion = document.getElementById('contra');
    var accion = document.getElementById('cancelar');
    if (seccion.style.display === "none") {
        seccion.style.display = "block";
        seccion.style.position="relative";
        accion.style.display = "block";
        activador.style.display = "none";
    }
    else {
        seccion.style.display = "none";
        accion.style.display = "none";
        activador.style.display = "block";
    }
}