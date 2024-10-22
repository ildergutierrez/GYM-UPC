// filtarTabla() - Función que filtra la tabla de acuerdo a los valores ingresados en los campos de texto
function filtrarTabla() {
    const nombreFiltro = document.getElementById('filtro').value.toLowerCase();
    const tabla = document.getElementById("tabla");
    const filas = tabla.getElementsByTagName("tr");

    for (let i = 1; i < filas.length; i++) {
        const celdas = filas[i].getElementsByTagName("td");
        const nombreTexto = celdas[0].innerText.toLowerCase();
        const mostrar = nombreTexto.includes(nombreFiltro);
        filas[i].style.display = mostrar ? "" : "none";
    }
}