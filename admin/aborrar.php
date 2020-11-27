<?php
include 'head.php';

session_start();

//Variables de las tablas
$base="taller";
$tabla="cliente_cita";

//Variables del formulario
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$dni = $_REQUEST['dni'];
$num_cita = $_REQUEST['num_cita'];


//Conectar con el usuario y la base
$c=mysqli_connect("localhost","javier","root");
mysqli_select_db($c,$base); 



 print' 
            <strong>INTRODUCE EL Nº DE LA CITA<BR><BR></strong>
                                     
        <div   class="postcontent"><form action="" method="post">
            <table align="center" class="content-layout">
              
            <tr><td align="right"><strong>Introduce tu DNI :</strong></td><td>
            <div align="left">
                  <input type="text" name="dni"/>
            </div></td></tr>

              <tr><td align="right"><strong>Num de Cita :</strong></td><td>
              <div align="left">
                    <input type="text" name="num_cita"/>
              </div></td></tr>
              
              <tr ><td colspan="2"><div align="center"><strong>
            <input name="btn_borrar" type="submit" id="borrar" value="Cancelar"/>
            </strong></div></td></tr>
        </table>
    </form>
        </div><br><br>';


 //Añadir a cliente_citas sus datos
if(isset($_REQUEST['btn_borrar']))//si has pulsado el boton de enviar
{
  mysqli_query($c,"DELETE FROM $tabla WHERE (dni_c='$dni') AND (n_cita='$num_cita')");
  
  if (mysqli_errno($c)==0){
    echo "<h3>Registro ELIMINADO</b></h3>";
  }
  else{
    if (mysqli_errno($c)==1062){
      echo "<h2>No se ha podido eliminar el registro</h2>";
    }
    else{
      $numerror=mysqli_errno($c);
      $descrerror=mysqli_error($c);
      echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
    }
  }
}

include 'pie.php';