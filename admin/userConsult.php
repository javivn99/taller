<?php
session_start();

include 'head.php';
//Variables de las tablas
$base="taller";
$tabla="cliente";

//Conectar con el usuario y la base
$c=mysqli_connect("localhost","javier","root");
mysqli_select_db($c,$base);


print '    

<div class="nav">
           <h2 class="seleccion">Bienvenido al area de clientes</h2><br>
           <div class="menu_citas">
            <li><a href="userAdd.php">Añadir usuario</a></li>
            <li><a href="userDelete.php">Eliminar usuario</a></li>
            <li><a href="userModif.php">Modificar usuario</a></li>
            <li><a href="userConsult.php">Consultar datos de usuario</a></li>
           </div>
       </div>

<h2 class="seleccion">CONSULTAR DATOS DE LOS CLIENTES</h2><br>
<div ><form  class="formMod" action="" method="post">
            
<strong>Introduce su DNI :</strong><input type="text" name="dni"/><br><br>


<br>

<button name="btn">Consultar</button><button name="btn_todos">Mostrar todos</button><br><br>';

if(isset($_REQUEST['btn']))//si has pulsado el boton de enviar
{ 
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  htmlspecialchars($dni = $_REQUEST['dni']);

  $sql="SELECT * FROM cliente WHERE dni_c='$dni'";
    $result=mysqli_query($c,$sql);
    $mostrar=mysqli_fetch_array($result);

    if($mostrar==true){

  $resultado=mysqli_query($c,"SELECT dni_c,nombre,apellidos,email_c,matricula FROM $tabla WHERE (dni_c='$dni')");
  
  if (mysqli_errno($c)==0){
    echo "<table align=center border=2 bgcolor='#03439C'>";
    echo "<tr><td colspan=5 style='text-align:center; padding:5px;'><b>DATOS DEL CLIENTE</b></td></tr>";
    echo "<tr><td style='text-align: center; padding:5px;'><b>DNI</b></td>";
    echo "<td style='text-align: center; padding:5px;'><b>Nombre</b></td>";
    echo "<td style='text-align: center; padding:5px;'><b>Apellidos</b></td>";
    echo "<td style='text-align: center; padding:5px;'><b>Email</b></td>";
    echo "<td style='text-align: center; padding:5px;'><b>Matricula</b></td>";
    echo "</tr><tr>";

    while($salida = mysqli_fetch_array($resultado)){
      for ($i=0;$i<5;$i++){
       if ($i==0){
         echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
       }
       if ($i==1){
         echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
       }
       if ($i==2){
        echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
      }
      if ($i==3){
        echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
      }
      if ($i==4){
        echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
      }
    }
      echo "</tr>";
    }
    echo"</form></table>";


  }
  else{
    if (mysqli_errno($c)==1062){
      echo "<h2>No se puede mostrar esa consulta</h2>";
    }
    else{
      $numerror=mysqli_errno($c);
      $descrerror=mysqli_error($c);
      echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
    }
  }
}else{
  echo "<h4 style='color:red;'>No existe un cliente con ese DNI.</h4>";
}
  
} 

if(isset($_REQUEST['btn_todos']))//si has pulsado el boton de enviar
{ 
    $resultado=mysqli_query($c,"SELECT dni_c,nombre,apellidos,email_c,matricula FROM $tabla");
  
  if (mysqli_errno($c)==0){
    echo "<table align=center border=2 bgcolor='#03439C'>";
    echo "<tr><td colspan=5 style='text-align:center; padding:5px;'><b>DATOS DEL CLIENTE</b></td></tr>";
    echo "<tr><td style='text-align: center; padding:5px;'><b>DNI</b></td>";
    echo "<td style='text-align: center; padding:5px;'><b>Nombre</b></td>";
    echo "<td style='text-align: center; padding:5px;'><b>Apellidos</b></td>";
    echo "<td style='text-align: center; padding:5px;'><b>Email</b></td>";
    echo "<td style='text-align: center; padding:5px;'><b>Matricula</b></td>";
    echo "</tr><tr>";

    while($salida = mysqli_fetch_array($resultado)){
      for ($i=0;$i<5;$i++){
       if ($i==0){
         echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
       }
       if ($i==1){
         echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
       }
       if ($i==2){
        echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
      }
      if ($i==3){
        echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
      }
      if ($i==4){
        echo "<td style='text-align:center; padding:5px;'>",$salida[$i],"</td>";
      }
    }
      echo "</tr>";
    }
    echo"</form></table>";


  }
  else{
    if (mysqli_errno($c)==1062){
      echo "<h2>No hay ningun cliente registrado</h2>";
    }
    else{
      $numerror=mysqli_errno($c);
      $descrerror=mysqli_error($c);
      echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
    }
  }
  
} 


include 'pie.php';
