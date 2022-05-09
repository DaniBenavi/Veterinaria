<?php
include_once 'config.php';
include_once 'class/mascotas.php';
$crud = new crud($conn);
if (isset($_POST['btn-delete'])) {
    $id = $_GET['delete_id'];
    $crud->delete($id);
    header("Location:eliminar_mascota.php?alerta");
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
    <title>DELETE</title>
</head>

<body>
    <div class="container"><br>
        <?php
        if (isset($_GET['alerta'])) {
        ?>
            <div class="alert alert-success">
                <strong>Hecho!</strong> Mascota Eliminado Correcctamente! <br>
                
                <a href="admin_Mascotas.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i>Ok</a>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger">
                <strong>Alerta!</strong> Esta Seguro que requiere Eliminar el Ususario
            </div>
        <?php
        }
        ?>
        <?php
        if (isset($_GET['delete_id'])) {
        ?>
            <table class='table table-bordered'>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Raza</th>
                </tr>
                <?php
                $stmt = $conn->prepare("SELECT * FROM mascotas WHERE id_mascota=:id_mascota");
                $stmt->execute(array(":id_mascota" => $_GET['delete_id']));
                while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
                ?>
                    <tr>
                        <td><?php echo ($row['id_mascota']); ?></td>
                        <td><?php echo ($row['nombre']); ?></td>
                        <td><?php echo ($row['raza']); ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <?php
        }
        ?>
    </div>
    <div class="container">
        <p>
            <?php
            if (isset($_GET['delete_id'])) {
            ?>
        <form method="POST">
            <input type="hidden" name="id_mascota" value="<?php echo $row['id_mascota']; ?>" />
            <button class="btn btn-large btn-primary" type="submit" name="btn-delete"><i class="glyphicon glyphicon-trash"></i> Yes</button>
            <a href="admin_Mascotas.php" class="btn btn-large btn-danger"><i class="glyphicon glyphicon-backward"></i> No</a>
        </form>
    <?php
            } else {
    ?>

    <?php
            }
    ?>
    </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>