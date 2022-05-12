<?php
session_start();
include('config.php');
include_once 'class/mascotas.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
$crud = new crud($conn);
//validacion del boton actualizar
if (isset($_POST['btn-update'])) {
    $id_mascota = $_GET['edit_id'];
    $nombre = $_POST['nombre'];
    $raza = $_POST['raza'];
    $peso = $_POST['peso'];
    $color = $_POST['color'];
    //hace referencia a la funcion update
    if ($crud->update($id_mascota, $nombre, $raza, $peso, $color)) {
        $msg =' <b>WOW, Actualizacion exitosa!</b> <br> <a href="admin_Mascotas.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i>Ok</a>
        ';
        
    } else {
        $msg = "<b>ERROR, algo anda mal</b>";
    }
}
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    extract($crud->getID($id));
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php require_once "menu.php" ?>
    <title>USUARIOS</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <h3>Actualizar datos de la mascota</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" value="<?php echo $nombre; ?>" class="form-control" type="text" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="raza">Raza</label>
                        <input id="raza" value="<?php echo $raza; ?>" class="form-control" type="text" name="raza">
                    </div>
                    <div class="form-group">
                        <label for="peso">Peso</label>
                        <input id="peso" value="<?php echo $peso; ?>" class="form-control" type="text" name="peso">
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input id="color" value="<?php echo $color; ?>" class="form-control" type="text" name="color">
                    </div>
                    <br>
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#guardar">Actualizar</button>

                    <a href="admin_Mascotas.php" class="btn btn-large btn-danger"><i class="glyphicon glyphicon-backward"></i>Cancelar</a>
                    
                    <div class="modal fade" tabindex="-1" id="guardar" aria-labelledby="ModalFade" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><strong>Alerta!</strong></h5>
                                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"><button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Desea Guardar cambios?</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" name="btn-update" type="submit">SI</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>