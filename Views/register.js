$(document).ready(function() {

    var funcion;

    $('#form-register').submit(function(e) {
        funcion = 'register';
        let user =  $('#username').val();
        let telefono = $('#telefono').val();
        let pass = $('#pass').val();
        let nombres = $('#nombres').val();
        let dni = $('#dni').val();
        let apellidos = $('#apellidos').val();
        let email = $('#email').val();
        
        let data = {
            funcion : funcion,
            user : user,
            telefono : telefono,
            pass : pass,
            nombres : nombres,
            dni : dni,
            apellidos : apellidos,
            email : email
        };

        console.log(data);

        $.post('../Controllers/UsuarioController.php', data, function(response){
            if(response == 'Registrado'){
                toastr.success(" Registrado!");
                location.href = 'login.php';
            }else{
                location.href = 'login.php';
            }
        });

        e.preventDefault();
    });
})