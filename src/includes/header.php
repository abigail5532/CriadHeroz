<?php
if (empty($_SESSION['active'])) {
    header('Location: ../');
}
?>
<?php
include "../conexion.php";
$id_user = $_SESSION['idUser'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CRIADHEROZ</title>
    <!-- ÍCONOS -->
    <script src="https://kit.fontawesome.com/a20b11dfdd.js" crossorigin="anonymous"></script>
    <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
    <link href="../assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/js/jquery-ui/jquery-ui.min.css">
    <script src="../assets/js/all.min.js" crossorigin="anonymous"></script>
</head>


<body style="background-color: #000">
    <div class="wrapper ">
        <div class="sidebar">
            <div class="logo"><a class="simple-text logo-normal">
                <strong style="color: #000">
                    <i class="fa-solid fa-user"></i>
                    <?php
                        echo $_SESSION["nombre"];
                    ?>
                </strong>
                </a></div>
            <div class="sidebar-wrapper" >
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="./" style="color: #000">
                            <i class="fas fa-home mr-2 fa-2x"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="clientes.php" style="color: #000">
                            <i class=" fas fa-users mr-2 fa-2x"></i>
                            <p> Clientes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="productos.php" style="color: #000">
                            <i class="fas fa-dove mr-2 fa-2x"></i>
                            <p> Productos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="ventas.php" style="color: #000">
                            <i class="fas fa-cart-plus mr-2 fa-2x"></i>
                            <p> Nueva Venta</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="lista_ventas.php" style="color: #000">
                            <i class="fas fa-clipboard mr-2 fa-2x"></i>
                            <p> Ventas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="usuarios.php" style="color: #000">
                            <i class="fas fa-user-plus mr-2 fa-2x"></i>
                            <p> Usuarios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" href="salir.php" style="color: #000">
                            <i class="fas fa-power-off mr-2 fa-2x"></i>
                            <p>Cerrar sesión</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top bg-warning">
                <div class="container-fluid">
                    <div class="navbar-wrapper" style="color: #fff">
                        <a class="navbar-brand" href="javascript:;"><strong>CRIADHEROZ</strong></a>
                    </div>
                    <button class="navbar-toggler"  type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">