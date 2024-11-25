
let datat;
let inicio = false;
// Opciones de DataTables
const dataopciones = {
    searching: false,  // Deshabilita la búsqueda en la tabla, ya que se hará desde el input externo
    paging: true,            // Habilita la paginación
    pageLength: 10,           // Define el número de registros por página
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
        const respuest = await fetch("../../php/Adm/Listar.php");
        const usuarios = await respuest.json();
        let contenido = ``;
        usuarios.forEach(user => {
            if (user.rol == '1') {
                user.rol = 'Admin';
            } else if (user.rol == '2') {
                user.rol = 'Instructor';
            } else if (user.rol == '3') {
                user.rol = 'Afiliado';
            }
            contenido += `
                <tr>
                    <td>${user.documento || ''}</td>
                    <td>${user['nombre completo'] || ''}</td>
                    <td>${user.correo || ''}</td>
                    <td>${user.celular || ''}</td>
                    <td>${user.rol || ''}</td>
                    <td>${user['fecha de ingreso'] || ''}</td>
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
