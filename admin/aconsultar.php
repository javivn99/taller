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


print '                              
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

        if(isset($_REQUEST['btn_mostrar']))//si has pulsado el boton de enviar
{

  $resultado=mysqli_query($c,"SELECT cliente_cita.DNI_C,cliente_cita.n_cita FROM cliente_cita WHERE (dni_c='$dni')");
  
  if (mysqli_errno($c)==0){
    echo "<table align=center border=2 bgcolor='#F0FFFF'>";
    echo "<td colspan=2 align=center>Datos solicitados</td><tr>";
    echo "<td align=center>DNI</td>";
    echo "<td align=center>Nº de cita</td>";
    echo "<tr>";

    while($salida = mysqli_fetch_array($resultado)){
      for ($i=0;$i<2;$i++){
       if ($i==0){
         echo "<td>",$salida[$i],"</td>";
       }
       if ($i==1){
         echo "<td><input type=text size=10 name=nom[$salida[0]] value=$salida[$i]></td>";
       }
      }
      echo "<tr>";
    }
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

include 'pie.php';
