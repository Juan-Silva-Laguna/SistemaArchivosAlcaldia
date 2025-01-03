$(document).ready(function(){   

    $("#olvido").on( 'change', function() {
        if($('#UserEmail').val() != '') {
            user = $('#UserEmail').val();
            $.post('../../Controlador/usuario.recuperarClave.php', {user}, function (retorno) {
                let respuesta = JSON.parse(retorno);
            if (respuesta[0] == '1') {
                (function(){
                    emailjs.init("user_byEQvmqnhWJ1OiqfrbDSW");
                })();
                emailjs.send("gmail", "datos_de_acceso", {"to_email":respuesta[1],"from_name":"Cigarreria Perez sistema","from_email":"Sistema cigarreria perez","intro":respuesta[2],"enlace":respuesta[4],"pass":respuesta[3],"subject":"Recuperando tu contraseña"})
                .then(function(){ 
                    alerta(respuesta[5]+" tu nueva contraseña fue enviada a el correo", "alert alert-success", "nada");
                }, function(err) {
                    alerta(respuesta[1]+" no se logro enviar tu nueva contraseña", "alert alert-danger", "nada");
                });
            }else if (respuesta[0] == '0') {
                alerta(`No se logro restablecer su contraseña, intente mas tarde`, 'alert alert-danger', 'nada');
            }else if(respuesta[0] == '2'){
                alerta(`El ${respuesta[1]} usuario no existe`, 'alert alert-danger', 'nada');
            }
            })
            
        } else {
            alerta("Por favor ingrese unicamente su correo", "alert alert-warning", "nada");
        }
    });

    $(document).on('click', '#ingresar', function (event) {
        event.preventDefault();
        const datos = {
            user: $('#user').val(),
            pass: $('#pass').val(), 
            operacion: 'ingresar'
        };
        $.post('../Controlador/usuarios.controlador.php', datos, function (respuesta) {
            console.log(respuesta);
            let datos = JSON.parse(respuesta);
            if (datos[0] == 1) {
                alert(datos[1]);
                window.location.href = "index.php";
            }else{
                alert(datos[1]);
            } 
        })
      });
      
    

});
