<?php
include 'head.php';

session_start();

//Variables de las tablas
$base="taller";
$tabla="cliente_cita";

//Variables del formulario



//Conectar con el usuario y la base
$c=mysqli_connect("localhost","javier","root");
mysqli_select_db($c,$base); 



 print' 

 <div class="nav">
        <h2 class="seleccion">Seleccione una opcion</h2><br>
        <div class="menu_citas">
                <li><a href="aalta.php">Añadir cita</a></li>
                <li><a href="aborrar.php">Cancelar cita</a></li>
                <li><a href="amodificar.php">Modificar cita</a></li>
                <li><a href="aconsultar.php">Consultar</a></li>
        </div>
    </div>
            
    <h2 class="seleccion">FORMULARIO PARA CANCELAR CITA</h2>
                                     
        <div  class="formPedirCita"><form  class="formMod" action="" method="post">
            <table align="center" class="content-layout">
              
            <strong>Introduce el DNI :</strong><input type="text" name="dni"/><br><br>

            <strong>Introduce el numero de cita :</strong><input type="text" name="num_cita"/><br><br>
              
            <button name="btn_borrar">Cancelar</button><br><br>';


 //Añadir a cliente_citas sus datos
if(isset($_REQUEST['btn_borrar']))//si has pulsado el boton de enviar
{
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
$dni = $_REQUEST['dni'];
$num_cita = $_REQUEST['num_cita'];

    //Compruebo si existe el dni
    $sql="SELECT * FROM cliente WHERE dni_c='$dni'";
    $result=mysqli_query($c,$sql);
    $mostrar=mysqli_fetch_array($result);

    if($mostrar==true){

          mysqli_query($c,"DELETE FROM $tabla WHERE (dni_c='$dni') AND (n_cita='$num_cita')");
          
          if (mysqli_errno($c)==0){
            echo "<h3  style='color:green;'>Cita eliminada</b></h3>";
          }
          else{
            if (mysqli_errno($c)==1062){
              echo "<h4  style='color:red;'>No se ha podido cancelar la cita</h4>";
            }
            else{
              $numerror=mysqli_errno($c);
              $descrerror=mysqli_error($c);
              echo "<h4 style='color:red;'>e ha producido un error nº $numerror que corresponde a: $descrerror </h4> <br>";
            }
          }
}else{
  echo "<h4 style='color:red;'>No existe ningun cliente con ese DNI.</h4>";
}
mysqli_close($c); 
}

include 'pie.php';