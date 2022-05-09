<?php


class crud
{

    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }
    //Muestra los datos en la tabla
    public function dataview($query)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute() > 0;
        echo '<a class="btn btn-large btn-success" href="new_mascota.php"> Agregar Mascota</a><br>';
        echo '<br>';



        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>

            <tr>
                <td><?php echo $row['id_mascota']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['raza']; ?></td>
                <td><?php echo $row['peso']; ?></td>
                <td><?php echo $row['color']; ?></td>
                <td>
                    <a class="btn btn-large btn-success" href="edit_mascota.php?edit_id=<?php echo $row['id_mascota'] ?>"> Editar</a>
                </td>
                <td>
                <a class="btn btn-large btn-danger" href="eliminar_mascota.php?delete_id=<?php echo $row['id_mascota'] ?>"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                </td>

                

            </tr>

<?php

        }
    }

    public function update($id_mascota, $nombre, $raza, $peso, $color)
    {
        try {
            $stmt = $this->db->prepare("UPDATE mascotas SET nombre=:nombre, raza=:raza,peso=:peso,color=:color
            WHERE id_mascota=:id_mascota");
            $stmt->bindparam(":nombre", $nombre);
            $stmt->bindparam(":raza", $raza);
            $stmt->bindparam(":peso", $peso);
            $stmt->bindparam(":color", $color);
            $stmt->bindparam(":id_mascota", $id_mascota);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getID($id_mascota)
    {
        $stmt = $this->db->prepare("SELECT * FROM mascotas WHERE id_mascota=:id_mascota");
        $stmt->execute(array(":id_mascota" => $id_mascota));
        $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editRow;
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM  mascotas WHERE id_mascota=:id_mascota");
        $stmt->bindparam(":id_mascota", $id);
        $stmt->execute();
        return true;
    }
}
