function contraseña() {
    const contraseña = document.getElementById('password');
    const ver = document.getElementById('ver');
    const no_ver = document.getElementById('no_ver');
    if (contraseña.type === 'password') {
        contraseña.type = 'text';
        ver.style.display = 'none';
        no_ver.style.display = 'block';
    }
    else {
        contraseña.type = 'password';
        ver.style.display = 'block';
        no_ver.style.display = 'none';
    }
}

function R_contraseña() {
    var r_contraseña = document.getElementById('contra');
    var r_ver = document.getElementById('Remplazo');
    var r_no_ver = document.getElementById('Remplazo2');

    if (r_contraseña.type === 'password') {
        r_contraseña.type = 'text';
        r_ver.style.display = 'none';
        r_no_ver.style.display = 'block';
    }
    else {
        r_contraseña.type = 'password';
        r_ver.style.display = 'block';
        r_no_ver.style.display = 'none';
    }


}
function inicio() {
    const Registro = document.getElementById('Registro');
    const inicio = document.getElementById('Iniciar');
    if (Registro.style.display === 'none') {
        Registro.style.display = 'flex';
        inicio.style.display = 'none';

    }
    else {
        Registro.style.display = 'none';
        inicio.style.display = 'flex';
    }

}

