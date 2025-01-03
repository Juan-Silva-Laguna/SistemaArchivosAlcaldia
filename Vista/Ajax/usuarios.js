$(document).ready(function(){   

    mostrar();
    $(document).on('click', '#btnGuardar', function (event) {
        event.preventDefault();
        if ($('#proceso').val() != ''|| $('#archivohidden').val() != '' || $('#descripcion').val() != '') {
            const datos = {
                nombre: $('#nombre').val(), 
                correo: $('#correo').val(),
                celular: $('#celular').val(), 
                usuario: $('#usuario').val(),
                password: $('#password').val(),
                operacion: 'guardar'
            };
    
            $.post('../Controlador/usuarios.controlador.php', datos, function (respuesta) {
                alert(respuesta);
                mostrar();
                limpiar();
            })
        }else{
            alert("Verifique que todos los campos esten llenos");
        }
    });
    
    $(document).on('click', '.editaUsuario', function (event) {
        event.preventDefault();
        $.post('../Controlador/usuarios.controlador.php', {id: $(this).attr('id'), operacion: 'mostrarEditar'}, function (respuesta) {
            console.log(respuesta);
            $.each(JSON.parse(respuesta), function(index, val) {
                $('#idUsuario').val(val.idUsuario); 
                $('#nombre').val(val.nombre); 
                $('#usuario').val(val.usuario); 
                $('#correo').val(val.correo);
                $('#celular').val(val.celular);
                $('#password').val('Privada por seguridad');

                $('html, body').animate({scrollTop: 0}, 1000);
                
            });  
        })
    });

    $(document).on('click', '#btnBuscar', function (event) {
        event.preventDefault();
            const datos = {
                nombre: $('#nombre').val(), 
                correo: $('#correo').val(),
                celular: $('#celular').val(), 
                usuario: $('#usuario').val(),
                operacion: 'buscar'
            };
    
            $.post('../Controlador/usuarios.controlador.php', datos, function (respuesta) {
                var table = null;                 
                $.each(JSON.parse(respuesta), function(index, val) {
                    table += '<tr class="editaUsuario" id='+val.idUsuario+'>';
                    table += '<td>'+val.nombre+'</td>';
                    table += '<td>'+val.usuario+'</td>';
                    table += '<td>'+val.celular+'</td>';
                    table += '<td>'+val.correo+'</td>';
                    table += '</tr>';
                });            
                $('#cuerpoTabla').html(table);
            })
            $('html, body').animate({scrollTop: 500}, 1000);
    });

    $(document).on('click', '#btnActualizar', function (event) {
        event.preventDefault();
        if ($('#idUsuario').val()!='') {
            if ($('#usuarioLogueado').val()==$('#idUsuario').val()) {
                    const datos = {
                        id: $('#idUsuario').val(),
                        nombre: $('#nombre').val(), 
                        correo: $('#correo').val(),
                        celular: $('#celular').val(), 
                        usuario: $('#usuario').val(),
                        password: $('#password').val(),
                        operacion: 'actualizar'
                    };
            
                    $.post('../Controlador/usuarios.controlador.php', datos, function (respuesta) {
                        alert(respuesta);
                        mostrar();
                        limpiar();
                        $('html, body').animate({scrollTop: 500}, 1000);
                    })
                
            }else{
                alert("Solo si eres tu puedes actualizar tu datos,\nlastimosamente este es otro usuario.");
                limpiar();
            }
        }
        else{
            alert("Por favor seleccione algun usuario de la tabla para eliminar");
        } 
    });

    $(document).on('click', '#limpiar', function (event) {
        event.preventDefault();
        limpiar();
    });

    $(document).on('click', '#btnEliminar', function (event) {
        event.preventDefault();

        if ($('#idUsuario').val()!='') {
            if ($('#usuarioLogueado').val()==$('#idUsuario').val()) {
                if (confirm('Esta seguro de eliminar su cuenta?')) {
                    $.post('../Controlador/eliminarArchivo.php', {archivo: $('#archivohidden').val()})
                    $.post('../Controlador/usuarios.controlador.php', {id: $('#idUsuario').val(), operacion: 'eliminar'}, function (respuesta) {
                        $.post('../Controlador/usuarios.controlador.php', {operacion: 'salir'}, function (respuesta) {
                            alert(respuesta);
                            window.location.href = "login.html";
                        })
                    })
                }                
            }else{
                alert("Solo si eres tu puedes eliminar tu cuenta,\nlastimosamente este es otro usuario.");
            }
        }else{
            alert("Por favor seleccione algun usuario de la tabla para eliminar");
        } 
        limpiar();
    });

    function mostrar(){
        $.post('../Controlador/usuarios.controlador.php', {operacion: 'mostrar'}, function (respuesta) {
            var table = null;                 
            $.each(JSON.parse(respuesta), function(index, val) {
                table += '<tr class="editaUsuario" id='+val.idUsuario+'>';
                table += '<td>'+val.nombre+'</td>';
                table += '<td>'+val.usuario+'</td>';
                table += '<td>'+val.celular+'</td>';
                table += '<td>'+val.correo+'</td>';
                table += '</tr>';
            });
            
            $('#cuerpoTabla').html(table);	
        })        
    }

    $(document).on('click', '#salir', function (event) {
        event.preventDefault();
        $.post('../Controlador/usuarios.controlador.php', {operacion: 'salir'}, function (respuesta) {
            alert(respuesta);
            window.location.href = "login.html";
        })
    });

    function limpiar() {
        $('#idUsuario').val(''); 
        $('#nombre').val(''); 
        $('#correo').val('');
        $('#celular').val(''); 
        $('#usuario').val('');
        $('#password').val('');
    }
      
    

});
