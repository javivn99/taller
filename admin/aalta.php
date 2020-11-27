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


//Añadir a cliente_citas sus datos
if(isset($_REQUEST['btn_enviar']))//si has pulsado el boton de enviar
{
  mysqli_query($c,"INSERT INTO $tabla (dni_c, n_cita) VALUES ('$dni','$motivo')");
  
  if (mysqli_errno($c)==0){
    echo "<h3>Registro AÑADIDO</b></h3>";
  }
  else{
    if (mysqli_errno($c)==1062){
      echo "<h2>No se ha podido añadir el registro</h2>";
    }
    else{
      $numerror=mysqli_errno($c);
      $descrerror=mysqli_error($c);
      echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
    }
  }
} 




                                             
 print' 
        <h2 class="postheader">FORMULARIO PARA PEDIR CITA</h2>
                                     
        <div   class="postcontent"><form action="" method="post">
            <table align="center" class="content-layout">


            <tr><td align="right"><strong>Introduzca su DNI :</strong></td><td>
            <div align="left">
                  <input type="text" name="dni"/>
            </div></td></tr>


            <tr><td align="right"><strong>Fecha que desea :</strong></td><td>
            <div align="left">
                  <input type="date" name="fecha"/>
            </div></td></tr>

              <tr>

              <td align="right"><strong>Indique el motivo de la cita :</strong></td>

              <td>
              <div align="left">
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
                      
                    </select>
              </div>
              </td>
              </tr>

              <tr ><td colspan="2"><div align="center"><strong>
            <input name="btn_enviar" type="submit" id="btn_enviar" value="Enviar"/>
            </strong></div></td></tr>
        </table>
    </form>
        </div>
<div id="imagen1">
        

        </div>        
';

 include 'pie.php';
											
                           