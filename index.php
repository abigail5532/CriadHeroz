<?php
session_start();
if (!empty($_SESSION['active'])) {
    header('location: src/');
} else {
    if (!empty($_POST)) {
        $alert = '';
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Ingrese usuario y contraseña
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        } else {
            require_once "conexion.php";
            $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
            $clave = md5(mysqli_real_escape_string($conexion, $_POST['clave']));
            $query = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$user' AND clave = '$clave'");
            mysqli_close($conexion);
            $resultado = mysqli_num_rows($query);
            if ($resultado > 0) {
                $dato = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['idUser'] = $dato['idusuario'];
                $_SESSION['nombre'] = $dato['nombre'];
                $_SESSION['user'] = $dato['usuario'];
                header('Location: src/');
            } else {
                $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Contraseña incorrecta
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                session_destroy();
            }
        }
    }
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X=UA=Compatible" content ="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>IntranetCriadheroz</title>
   <link rel="stylesheet">
   <!-- ÍCONOS -->
   <script src="https://kit.fontawesome.com/a20b11dfdd.js" crossorigin="anonymous"></script>
   <!-- CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="cssLogin/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="cssLogin/style.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon">
</head>

<body>
   <img class="wave" src="fondologin.png">
   <div class="container">
      <div class="img">
         <img src="papagayo.png">
      </div>
      <div class="login-content">
         <form action="" id="login-form" method="POST">
            <img src="Usuario.png">
            <h2 class="title">BIENVENIDO</h2>
               <?php echo (isset($alert)) ? $alert : '' ; ?>
            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
                  <input type="text" class="input-field" name="usuario" id="usuario" placeholder="Usuario" autocomplete="off" required>
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <input type="password" class="input-field" name="clave" id="clave" placeholder="Contraseña" autocomplete="off" required>
               </div>
            </div>
            <div class="view">
               <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
            </div>
            <input class="btn" type="submit" value="INICIAR SESION">
         </form>
      </div>
   </div>
   <script src="jsLogin/fontawesome.js"></script>
   <script src="jsLogin/main.js"></script>
   <script src="jsLogin/main2.js"></script>
   <script src="jsLogin/jquery.min.js"></script>
   <script src="jsLogin/bootstrap.js"></script>
   <script src="jsLogin/bootstrap.bundle.js"></script>

</body>

</html>