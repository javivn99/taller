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

<div class="nav">
<h2 class="seleccion">Bienvenido al area de citas</h2><br>
<div class="menu_citas">
        <li><a href="aalta.php">Añadir cita</a></li>
        <li><a href="aborrar.php">Cancelar cita</a></li>
        <li><a href="amodificar.php">Modificar cita</a></li>
        <li><a href="aconsultar.php">Consultar</a></li>
</div>
</div>


<h2 class="seleccion">FORMULARIO PARA MODIFICAR CITA</h2><br>
        <div  ><form  class="formMod" action="" method="post">
            
          <strong>Introduce tu DNI :</strong><input type="text" name="dni"/><br><br>
        
          <strong>Introduce el numero de cita que deseas cambiar :</strong></td><td><input type="text" name="n_cita1"/><br><br>

          <br>

          <strong>Introduce el nuevo numero de cita que deseas :</strong></td><td><input type="text" name="n_cita2"/><br><br>

          <br>

          <button name="btn_cambiar">Cambiar</button><br><br>';

if(isset($_REQUEST['btn_cambiar']))//si has pulsado el boton de enviar
{ 

  $sql="SELECT * FROM cliente WHERE dni_c='$dni'";
  $result=mysqli_query($c,$sql);
  $mostrar=mysqli_fetch_array($result);

  if($mostrar==true){

        $resultado=mysqli_query($c,"UPDATE cliente_cita SET n_cita='$citaNueva' WHERE (dni_c='$dni') AND (n_cita='$citaAntigua')");
        
        if (mysqli_errno($c)==0){
          echo "<h2 style='color:green;'>Cita modificada correctamente</h2>";
        }
        else{
          if (mysqli_errno($c)==1062){
            echo "<h2 style='color:red;'>Error. No se ha podido añadir el registro</h2>";
          }
          else{
            $numerror=mysqli_errno($c);
            $descrerror=mysqli_error($c);
            echo "<h2 style='color:red;>Se ha producido un error nº $numerror que corresponde a: $descrerror </h2> <br>";
          }
        }
  }else{
    echo "<h2 style='color:red;'>Error. Compruebe los datos introducidos</h2>";
  }
mysqli_close($c); 
  
} 


include 'pie.php';
