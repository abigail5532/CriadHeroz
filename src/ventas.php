<?php
session_start();
require("../conexion.php");
$id_user = $_SESSION['idUser'];
$permiso = "nueva_venta";
$sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$permiso'");
$existe = mysqli_fetch_all($sql);
if (empty($existe) && $id_user != 1) {
    header('Location: permisos.php');
}
include_once "includes/header.php";
?>
<div class="card shadow-lg">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-danger text-white text-center">
                        <strong>DATOS DEL CLIENTE</strong>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="row"> 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" id="idcliente" value="1" name="idcliente" required>
                                        <label class="text-dark font-weight-bold">Nombre</label>
                                        <input type="text" name="nom_cliente" id="nom_cliente" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Teléfono</label>
                                        <input type="number" name="tel_cliente" id="tel_cliente" class="form-control" disabled required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark font-weight-bold">Dirección</label>
                                        <input type="text" name="dir_cliente" id="dir_cliente" class="form-control" disabled required>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-danger text-white text-center">
                        DETALLES DE LA VENTA
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="producto" class=" text-dark font-weight-bold">Código o Nombre</label>
                                    <input id="producto" class="form-control" type="text" name="producto">
                                    <input id="id" type="hidden" name="id">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="cantidad" class=" text-dark font-weight-bold">Cantidad</label>
                                    <input id="cantidad" class="form-control" type="text" name="cantidad" onkeyup="calcularPrecio(event)">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="precio" class=" text-dark font-weight-bold">Precio</label>
                                    <input id="precio" class="form-control" type="text" name="precio" disabled>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="sub_total" class=" text-dark font-weight-bold">Sub Total</label>
                                    <input id="sub_total" class="form-control" type="text" name="sub_total" disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table" id="tblDetalle" style="color: #fff; background-color: #000">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Aplicar</th>
                                <th>Desc</th>
                                <th>Precio</th>
                                <th>Precio Total</th>
                                <th>Opción</th>
                            </tr>
                        </thead>
                        <tbody id="detalle_venta">

                        </tbody>
                        <tfoot>
                            <tr class="font-weight-bold">
                                <td>Total Pagar</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <div class="col-md-6">
                <a href="#" class="btn btn-primary" id="btn_generar"><i class="fas fa-save"></i> Generar Venta</a>
            </div>

        </div>
    </div>
</div>
<?php include_once "includes/footer.php"; ?>