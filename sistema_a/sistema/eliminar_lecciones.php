<?php
if (!empty($_GET['id'])) {
    require("../conexion.php");
    $idLec = $_GET['id'];
    $query_delete = mysqli_query($conexion, "DELETE FROM Lecciones WHERE IdLec = $idLec");
    mysqli_close($conexion);
    header("location: lista_lecciones.php");
}
?>