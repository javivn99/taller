<?php
session_start();

include 'head.php';
//Variables de las tablas
$base="taller";
$tabla="cliente_cita";

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

<h2 class="seleccion">FORMULARIO PARA CONSULTAR CITAS</h2><br>
<div  ><form  class="formMod" action="" method="post">
            
<strong>Introduce tu DNI :</strong><input type="text" name="dni"/><br><br>


<br>

<button name="btn_mostrar">Mostrar</button><button name="btn_todos">Mostrar todas</button><br><br>';

if(isset($_REQUEST['btn_mostrar']))//si has pulsado el boton de enviar
{ 
  //Variables del formulario
error_reporting(E_ERROR | E_WARNING | E_PARSE);
htmlspecialchars($dni = $_REQUEST['dni']);

  $sql="SELECT * FROM cliente WHERE dni_c='$dni'";
    $result=mysqli_query($c,$sql);
    $mostrar=mysqli_fetch_array($result);

    if($mostrar==true){

  $resultado=mysqli_query($c,"SELECT cliente_cita.DNI_C,cliente_cita.n_cita FROM cliente_cita WHERE (dni_c='$dni')");
  
  if (mysqli_errno($c)==0){
    echo "<table align=center border=2 bgcolor='#03439C'>";
    echo "<tr><td colspan=3 style='text-align:center; padding:5px;'><b>DATOS SOLICITADOS</b></td></tr>";
    echo "<tr><td style='text-align: center; padding:5px;'><b>DNI</b></td>";
    echo "<td style='text-align: center; padding:5px;'><b>Nº de cita</b></td>";
    echo "<td style='text-align: center; padding:5px;'><b>Motivo</b></td></tr>";
    echo "<tr>";

    while($salida = mysqli_fetch_array($resultado)){
      for ($i=0;$i<2;$i++){
       if ($i==0){
         echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
       }
       if ($i==1){
         echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
         if($salida[$i]==1){
           echo "<td style='text-align:center; padding:5px;'>CAMBIO DE NEUMATICOS</td>";
         }
         if($salida[$i]==2){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE ACEITE</td>";
        }
        if($salida[$i]==3){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE PASTILLAS DE FRENO</td>";
        }
        if($salida[$i]==4){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE PARACHOQUES</td>";
        }
        if($salida[$i]==5){
          echo "<td style='text-align:center; padding:5px;'>LUNA FRONTAL</td>";
        }
        if($salida[$i]==6){
          echo "<td style='text-align:center; padding:5px;'>LIMPIEZA DEL TUBO DE ESCAPE</td>";
        }
        if($salida[$i]==7){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO LIQUIDO ANTI-CONGELANTE</td>";
        }
        if($salida[$i]==8){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE RETROVISOR</td>";
        }
        if($salida[$i]==9){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE PINTURA DEL COCHE</td>";
        }
        if($salida[$i]==10){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE LLANTAS</td>";
        }
        if($salida[$i]==11){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE LIMPIA PARABRISAS</td>";
        }
        if($salida[$i]==12){
          echo "<td style='text-align:center; padding:5px;'>COCHE DE SUSTITUCION</td>";
        }
        if($salida[$i]==13){
          echo "<td style='text-align:center; padding:5px;'>PASAR ITV</td>";
        }
        if($salida[$i]==14){
          echo "<td style='text-align:center; padding:5px;'>LIMPIEZA DE COCHE</td>";
        }
        if($salida[$i]==15){
          echo "<td style='text-align:center; padding:5px;'>OTROS</td>";
        }
       }
      }
      echo "</tr>";
    }
    echo"</form></table>";
  }
  else{
    if (mysqli_errno($c)==1062){
      echo "<h2  style='color:green;'>Ha ocurrido un error al realizar la consulta</h2>";
    }
    else{
      $numerror=mysqli_errno($c);
      $descrerror=mysqli_error($c);
      echo "<h2  style='color:red;'>Se ha producido un error nº $numerror que corresponde a: $descrerror</h2>  <br>";
    }
  }
}else{
  echo "<h2 style='color:red;'>No existe ningun cliente con ese DNI</h2>";
}
  
} 

if(isset($_REQUEST['btn_todos']))//si has pulsado el boton de enviar
{
  $resultado=mysqli_query($c,"SELECT cliente_cita.DNI_C,cliente_cita.n_cita FROM cliente_cita");

  
  if (mysqli_errno($c)==0){
    echo "<table align=center border=2 bgcolor='#03439C'>";
    echo "<tr><td colspan=3 style='text-align:center; padding:5px;'><b>DATOS SOLICITADOS</b></td></tr>";
    echo "<tr><td style='text-align: center; padding:5px;'><b>DNI</b></td>";
    echo "<td style='text-align: center; padding:5px;'><b>Nº de cita</b></td>";
    echo "<td style='text-align: center; padding:5px;'><b>Motivo</b></td></tr>";
    echo "<tr>";

    while($salida = mysqli_fetch_array($resultado)){
      for ($i=0;$i<2;$i++){
       if ($i==0){
         echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
       }
       if ($i==1){
         echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
         if($salida[$i]==1){
           echo "<td style='text-align:center; padding:5px;'>CAMBIO DE NEUMATICOS</td>";
         }
         if($salida[$i]==2){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE ACEITE</td>";
        }
        if($salida[$i]==3){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE PASTILLAS DE FRENO</td>";
        }
        if($salida[$i]==4){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE PARACHOQUES</td>";
        }
        if($salida[$i]==5){
          echo "<td style='text-align:center; padding:5px;'>LUNA FRONTAL</td>";
        }
        if($salida[$i]==6){
          echo "<td style='text-align:center; padding:5px;'>LIMPIEZA DEL TUBO DE ESCAPE</td>";
        }
        if($salida[$i]==7){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO LIQUIDO ANTI-CONGELANTE</td>";
        }
        if($salida[$i]==8){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE RETROVISOR</td>";
        }
        if($salida[$i]==9){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE PINTURA DEL COCHE</td>";
        }
        if($salida[$i]==10){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE LLANTAS</td>";
        }
        if($salida[$i]==11){
          echo "<td style='text-align:center; padding:5px;'>CAMBIO DE LIMPIA PARABRISAS</td>";
        }
        if($salida[$i]==12){
          echo "<td style='text-align:center; padding:5px;'>COCHE DE SUSTITUCION</td>";
        }
        if($salida[$i]==13){
          echo "<td style='text-align:center; padding:5px;'>PASAR ITV</td>";
        }
        if($salida[$i]==14){
          echo "<td style='text-align:center; padding:5px;'>LIMPIEZA DE COCHE</td>";
        }
        if($salida[$i]==15){
          echo "<td style='text-align:center; padding:5px;'>OTROS</td>";
        }
       }
      }
      echo "</tr>";
    }
    echo"</form></table>";
  }
  else{
    if (mysqli_errno($c)==1062){
      echo "<h2  style='color:green;'>Error al realizar la consulta. Prueba otra vez.</h2>";
    }
    else{
      $numerror=mysqli_errno($c);
      $descrerror=mysqli_error($c);
      echo "<h2  style='color:red;>'Se ha producido un error nº $numerror que corresponde a: $descrerror</h2>  <br>";
    }
  }
}
include 'pie.php';
