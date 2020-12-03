<?php
session_start();

include 'head.php';
//Variables de las tablas
$base="taller";
$tabla="cliente_cita";


//Variables del formulario
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$dni = $_REQUEST['dni'];
$citaAntigua = $_REQUEST['n_cita1'];
$citaNueva = $_REQUEST['n_cita2'];

//Conectar con el usuario y la base
$c=mysqli_connect("localhost","javier","root");
mysqli_select_db($c,$base);


print '                              
        <div   class="postcontent"><form action="" method="post">
            
          <strong>Introduce tu DNI :</strong><input type="text" name="dni"/><br><br>
        
          <strong>Introduce el numero de cita que deseas cambiar :</strong></td><td><input type="text" name="n_cita1"/><br><br>

          <br>

          <strong>Introduce el nuevo numero de cita que deseas :</strong></td><td><input type="text" name="n_cita2"/><br><br>

          <br>

          <button name="btn_cambiar">Cambiar</button><br><br>';

if(isset($_REQUEST['btn_cambiar']))//si has pulsado el boton de enviar
{ 

  $resultado=mysqli_query($c,"UPDATE cliente_cita SET n_cita='$citaNueva' WHERE (dni_c='$dni') AND (n_cita='$citaAntigua')");
  
  if (mysqli_errno($c)==0){
    echo "<h4 style='color:green;'>Cita modificada correctamente</h4>";
  }
  else{
    if (mysqli_errno($c)==1062){
      echo "<h4 style='color:red;'>No se ha podido añadir el registro</h4>";
    }
    else{
      $numerror=mysqli_errno($c);
      $descrerror=mysqli_error($c);
      echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
    }
  }
  
} 


include 'pie.php';
