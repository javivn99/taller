<?php
session_start();

include 'head.php';
//Variables de las tablas
$base="taller";
$tabla="cliente_cita";

//Variables del formulario
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$dni = $_REQUEST['dni'];

//Conectar con el usuario y la base
$c=mysqli_connect("localhost","javier","root");
mysqli_select_db($c,$base);

if(isset($_REQUEST['btn_mostrar']))//si has pulsado el boton de enviar
{
  mysqli_query($c,"SELECT * FROM $tabla WHERE dni_c=$dni");
  
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

print ' 
         <strong>SELECCIONA EL TIPO DE INCIDENCIA A LISTAR<BR><BR></strong>
                                     
        <div   class="postcontent"><form action="" method="post">
            <table align="center" class="content-layout">

              <tr><td align="right"><strong>Introduce tu DNI :</strong></td><td>
              <div align="left">
                    <input type="text" name="dni"/>
              </div></td></tr>

              <tr >
              <td colspan="2"><div align="center"><strong>
                <input name="btn_mostrar" type="submit" id="listar" value="Mostrar"/>
                </strong>
                </div>
              </td>
            </tr>
              
        </table>
    </form>
        </div>';
include 'pie.php';
