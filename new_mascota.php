<?php
include('config.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
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
    <title>Clientes</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <h3>Nueva Mascota</h3>
                <hr>
                <form method="post" action="registro_mascota.php">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" class="form-control" type="text" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="raza">Raza:</label>
                        <input id="raza" class="form-control" type="text" name="raza">
                    </div>
                    <div class="form-group">
                        <label for="peso">Peso:</label>
                        <input id="peso" class="form-control" type="text" name="peso">
                    </div>
                    <div class="form-group">
                        <label for="color">Color:</label>
                        <input id="color" class="form-control" type="text" name="color">
                    </div>
                    <!--<div class="form-group">

                        <label for="">
                            <select name="usuario" id="usuario">
                            <?php
                                include('config.php');
                                $query = $conn->prepare("SELECT * FROM usuarios");
                                $query->execute();
                                ?>
                                <?php foreach ($query as $opciones) : ?>
                                    <option value="<?php echo $opciones['username']?>"><?php echo $opciones['username']?></option>
                                <?php endforeach ?>
                            </select>
                        </label>
                    </div>-->
                    
                    <br>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#guardar" type="button">Guardar</button>

                    <a href="admin_Mascotas.php" class="btn btn-large btn-danger"><i class="glyphicon glyphicon-backward"></i>Cancelar</a>

                    <div class="modal fade" tabindex="-1" id="guardar" aria-labelledby="ModalFade" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><strong>Alerta!</strong></h5>
                                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"><button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Desea Guardar el registro?</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" name="registro" type="submit">SI</button>
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