<?php
include 'head.php';
//Variables de las tablas
$base="taller";
$cita="cita";

//Variables del formulario
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$fecha = $_REQUEST['fecha'];
$motivo = $_REQUEST['motivo'];

//Nº aleat cita
function citaAleatorio() {
      $nCitaAleat = rand(1,100);
      return $nCitaAleat;
}

//Conectar con el usuario y la base
$c=mysqli_connect("localhost","javier","root");
mysqli_select_db($c,$base);


//Añadir a citas sus datos
if(isset($_REQUEST['btn_enviar']))//si has pulsado el boton de enviar
{
$resultado=$conexion->query("SELECT EXISTS (SELECT * FROM $cita WHERE n_cita='$nCitaAleat');");
$row=mysqli_fetch_row($resultado);

    if ($row[0]=="1") {                 

            //Aqui colocas el código que tu deseas realizar cuando el dato existe en la base de datos
            $nCitaAleat=citaAleatorio();
    }else{
           //Aqui colocas el código que tu deseas realizar cuando el dato NO existe en la base de datos
           mysqli_query($c,"INSERT $cita (n_cita, motivo, fecha)
            VALUES ('$nCitaAleat','$motivo','$fecha')");

    } 



if(mysqli_errno($nCitaAleat)==1062)
if (mysqli_errno($c)==0){
  echo "<h2>Registro AÑADIDO</b></H2>";
}
else{
  if (mysqli_errno($c)==1062){
    echo "<h2>No ha podido añadirse el registro<br>Ya existe un campo con este DNI</h2>";
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


            <tr><td align="right"><strong>Fecha que desea :</strong></td><td>
            <div align="left">
                  <input type="date" name="fecha"/>
            </div></td></tr>

              <tr>

              <td align="right"><strong>Indique el motivo de la cita :</strong></td>

              <td>
              <div align="left">
                    <select name="motivo">
                      <option selected>Cambio de neumaticos</option>
                      <option>Cambio de aceite</option>
                      <option>Cambio de pastillas de freno</option>
                      <option>Cambio de parachoques</option>
                      <option>Cambio de luna frontal</option>
                      <option>Cambio de retrovisor</option>
                      <option>Limpieza del tubo de escape</option>
                      <option>Cambio liquido anti-congelante</option>
                      <option>Cambio pintura del coche</option>
                      <option>Cambio de llantas</option>
                      <option>Cambio de limpia parabrisas</option>
                      
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
											
                           