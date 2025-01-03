<?php
    session_start();
    if ($_SESSION['id'] === '' || $_SESSION['id'] === null) {
        header('Location: login.html');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Archivos</title>
    <link rel="stylesheet" href="../Recursos/css/bootstrap.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../Recursos/img/escudo.png" width="55" height="55">
                <img src="../Recursos/img/logo.png" width="75" height="55">
            </a>
            <h3 class="navbar-brand"> Alcaldia De Armenia</h3>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <<li class="nav-item">
                        <a class="nav-link" href="index.php">Registros</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="usuarios.php">Usuarios
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item" id="salir">
                        <a class="nav-link" href="#">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                
                <div class="card card-signin my-5">
                    <div style="text-align: right" id="limpiar">
                        <img src="../Recursos/img/reload.png" width="35" height="35">
                    </div>                    
                    <div class="card-body">
                        <form class="form-signin row">
                            <input type="hidden" id="idUsuario">
                            <input type="hidden" id="usuarioLogueado" value="<?php echo $_SESSION['id']?>">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <label class="font-weight-bold">Nombre</label>
                                    <input type="text" class="form-control text-center" id="nombre" autofocus><br> 

                                    <label class="font-weight-bold">Correo</label>
                                    <input type="email" class="form-control text-center" id="correo" ><br> 
                                    
                                    <label class="font-weight-bold">Password</label>
                                    <input type="password" class="form-control text-center" id="password"><br> 
                                </div>
                            </div>
                            <br>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <label class="font-weight-bold">Celular</label>
                                    <input type="number" class="form-control text-center" id="celular"><br> 

                                    <label class="font-weight-bold">Usuario</label>
                                    <input type="text" class="form-control text-center" id="usuario" ><br> <br>   
                                </div>
                            </div>
                            <br>
                            <div class="col-md-3">
                                <button class="btn btn-lg btn-success btn-block text-uppercase" id="btnGuardar" type="submit">Guardar</button><br>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" id="btnActualizar" type="submit">Actualizar</button><br>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-lg btn-warning btn-block text-uppercase" id="btnBuscar" type="submit">Consultar</button><br>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-lg btn-danger btn-block text-uppercase" id="btnEliminar" type="submit">Eliminar</button><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container">
        <div class="card card-signin">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Correo</th>
                    </tr>
                </thead>
                <tbody id="cuerpoTabla">
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container -->
    <br><br>
    <footer class="navbar-dark bg-dark">
        <div class="text-center py-3">
            <p style="color: #fff;">© 2020 Todos los derechos reservados</p>
        </div>
    </footer>
    <script src="../Recursos/js/jquery-3.5.1.min.js"></script>
    <script src="../Recursos/js/bootstrap.min.js"></script>
    <script src="Ajax/usuarios.js"></script>
</body>
</html>

