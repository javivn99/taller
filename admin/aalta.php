<?php
session_start();

include 'head.php';
//Variables de las tablas
$base="taller";
$tabla="cliente_cita";

//Variables del formulario
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$fecha = $_REQUEST['fecha'];
$motivo = $_REQUEST['motivo'];
$dni = $_REQUEST['dni'];

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


        <h2 class="seleccion">FORMULARIO PARA PEDIR CITA</h2>
                                     
        <div class="formPedirCita"><form  class="formMod" action="" method="post">
          
            <strong>Introduzca su DNI :</strong><input type="text" name="dni"/><br><br>

            <strong>Fecha que desea :</strong><input type="date" name="fecha"/><br><br>

            <strong>Indique el motivo de la cita :</strong>

                    <select name="motivo">
                    
                      <option selected value="1">Cambio de neumaticos</option>
                      <option value="2">Cambio de aceite</option>
                      <option value="3">Cambio de pastillas de freno</option>
                      <option value="4">Cambio de parachoques</option>
                      <option value="5">Cambio de luna frontal</option>
                      <option value="6">Limpieza del tubo de escape</option>
                      <option value="7">Cambio liquido anti-congelante</option>
                      <option value="8">Cambio de retrovisor</option>
                      <option value="9">Cambio pintura del coche</option>
                      <option value="10">Cambio de llantas</option>
                      <option value="11">Cambio de limpia parabrisas</option>
                      
                    </select><br><br>

                    <button name="btn_enviar">Solicitar</button><br><br>';       


//Añadir a cliente_citas sus datos
if(isset($_REQUEST['btn_enviar']))//si has pulsado el boton de enviar
{
  
  mysqli_query($c,"INSERT INTO $tabla (dni_c, n_cita) VALUES ('$dni','$motivo')");
  
  if (mysqli_errno($c)==0){
    echo "<h3 style='color:green;'>Cita añadida</b></h3>";
  }
  else{
    if (mysqli_errno($c)==1062){
      echo "<h2  style='color:red;'>No se ha podido añadir la cita</h2>";
    }
    else{
      $numerror=mysqli_errno($c);
      $descrerror=mysqli_error($c);
      echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
    }
  }
} 



 include 'pie.php';
											
                           