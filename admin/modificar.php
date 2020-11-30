<?php
include 'head.php';


$base="taller";
$conexion=mysqli_connect ("localhost","javier","root");
mysqli_select_db ($conexion,$base);
foreach ($_POST['n_cita'] as $indice=>$valor){
    $resultado=mysqli_query($conexion,"UPDATE cliente_cita SET n_cita='$valor'
                            WHERE DNI_C='$indice' ");
}

print '                              
    <h3>Cita modificada con exito</h3>        
';


include 'pie.php';