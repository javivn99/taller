<?php
session_start();

include 'head.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Clientes</title>
    <link href="clientes.css" rel="stylesheet">

</head>
<body>
    <br><h2 class="seleccion">Seleccione una opcion</h2><br>
    <div class="menu_cliente">
            <li><a href="userAdd.php">Añadir usuario</a></li>
            <li><a href="userDelete.php">Eliminar usuario</a></li>
            <li><a href="userModif.php">Modificar usuario</a></li>
            <li><a href="userConsult.php">Consultar datos de usuario</a></li>
    </div>
</body>
</html>
    




<?php
include 'pie.php';
?>
