
let datat;
let inicio = false;
// Opciones de DataTables
const dataopciones = {
    columnDefs: [
        { className: "centered", targets: [0, 2] },
        { className: "justified", targets: [1] },
        { orderable: false, targets: [0, 1, 2,3,4] },

    ],
    searching: false,  // Deshabilita la búsqueda en la tabla, ya que se hará desde el input externo
    paging: true,            // Habilita la paginación
    pageLength: 5,           // Define el número de registros por página
    info: false,             // Oculta el texto de información (ej. "Mostrando de _START_ a _END_ de _TOTAL_ registros")
    lengthChange: false,     // Oculta el selector de cantidad de registros
    language: {              // Configuración del texto de la paginación
        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
        }
    }
};

// Función para iniciar DataTable
const iniciodatatable = async () => {
    if (inicio) {
        datat.destroy();
    }
    await cargarUsuarios();
    datat = $("#tabla").DataTable(dataopciones);
    inicio = true;

    // Asocia el filtro del input externo al evento input para buscar en la tabla
    document.getElementById("filtro").addEventListener("input", function() {
        datat.search(this.value).draw();
    });
};

// Función para cargar los usuarios
const cargarUsuarios = async () => {
    try {
        // Obtiene los datos de los usuarios
        const respuest = await fetch("../../php/Instructor/Listar.php");
        const usuarios = await respuest.json();
        console.log(usuarios);
        let contenido = ``;
        usuarios.forEach(user => {
            if (user['lugar_id'] == '137') {
                user.lugar = 'Peso';
            } else if (user['lugar_id'] == '125') {
                user.lugar = 'Cardio';
            } 
            contenido += `
                <tr>
                    <td>${user['id'] || ''}</td>
                    <td>${user['nombre'] || ''}</td>
                    <td>${user.lugar || ''}</td>
                    <td> ${user['fecha'] || ''}</td>
                    <td>${user['hora'] || ''}</td>
                </tr>`;
        });
    
        // Insertamos el contenido en el cuerpo de la tabla
        document.getElementById("tablebody_usuario").innerHTML = contenido;
    } catch (error) {
        console.error('Error al obtener los datos: ', error);
    }
};

// Llama a la función para iniciar DataTable cuando la página cargue
window.addEventListener("load", async () => {
    await iniciodatatable();
});
