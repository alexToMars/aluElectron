$(document).ready(function() {
    // Llamar a la función obtener_datos cuando la página se cargue
    obtenerDatosUsuario();

    function obtenerDatosUsuario() {
        $.post('../Controllers/UsuarioController.php', { funcion: 'obtener_datos' }, function(response) {
            let datos = JSON.parse(response);
            let usuario = datos[0];
            console.log(usuario.id);
            console.log(response);
            console.log(datos);
            if (usuario.id) {
                // Mostrar los datos del usuario
                let template = `
                    <h2>Datos del Usuario</h2>
                    <p><strong>ID:</strong> ${usuario.id}</p>
                    <p><strong>Usuario:</strong> ${usuario.user}</p>
                    <p><strong>Nombres:</strong> ${usuario.nombres}</p>
                    <p><strong>Apellidos:</strong> ${usuario.apellidos}</p>
                    <p><strong>Email:</strong> ${usuario.email}</p>
                    <p><strong>Teléfono:</strong> ${usuario.telefono}</p>
                    <p><strong>DNI:</strong> ${usuario.dni}</p>
                    <button id="edit-button">Editar</button>
                `;
                $('#datos-usuario').html(template);

                // Mostrar el modal al hacer clic en "Editar"
                $('#edit-button').on('click', function() {
                    $('#edit-id').val(usuario.id);
                    $('#edit-user').val(usuario.user);
                    $('#edit-nombres').val(usuario.nombres);
                    $('#edit-apellidos').val(usuario.apellidos);
                    $('#edit-email').val(usuario.email);
                    $('#edit-telefono').val(usuario.telefono);
                    $('#edit-dni').val(usuario.dni);
                    $('#editModal').show();
                });
            } else {
                // Mostrar un mensaje si no se encontraron datos
                $('#datos-usuario').html('<p>No se encontraron datos del usuario.</p>');
            }
        });
    }

    // Cerrar el modal al hacer clic en el botón de cerrar
    $('.close').on('click', function() {
        $('#editModal').hide();
    });

    // Cerrar el modal al hacer clic fuera del contenido del modal
    $(window).on('click', function(event) {
        if ($(event.target).is('#editModal')) {
            $('#editModal').hide();
        }
    });

    // Manejar el envío del formulario de edición
    $('#form-edit-user').on('submit', function(e) {
        e.preventDefault();
        let formData = $(this).serialize();
        $.post('../Controllers/UsuarioController.php', { funcion: 'actualizar_datos', ...formData }, function(response) {
            let resultado = JSON.parse(response);
            alert(resultado.mensaje);
            if (resultado.exito) {
                $('#editModal').hide();
                obtenerDatosUsuario(); // Refrescar los datos del usuario
            }
        });
    });
});

