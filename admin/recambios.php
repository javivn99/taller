<?php

include 'head.php';

echo '
<div >
    <h2 style="color: white; text-align: center;"> Suministros y recambios del taller</h2>
    
</div>';

$base="taller";
$tabla="recambio";

# establecemos la conexión con el servidor

$c=mysqli_connect ("localhost","javier","root");

#Seleccionamos la BASE DE DATOS en la que PRETENDEMOS TRABAJAR

mysqli_select_db ($c,$base);

#creamos una consulta de la tabla tabla1

$resultado=mysqli_query($c,"SELECT * FROM $tabla ");

# presentamos la salida en forma de tabla HTML

# encabezados

echo "<table align=center border=2 bgcolor='#F0FFFF'>";
echo "<td colspan=3 align=center>Para modificar escribe en la casilla correspondiente</td><tr>";
echo "<td align=center>ID</td>";
echo "<td align=center>Producto.</td>";
echo "<td align=center>Precio</td></tr><tr>";



echo "<form name='modificar' method=\"POST\" action='recambios1.php'>";

while($salida = mysqli_fetch_array($resultado)){
  for ($i=0;$i<3;$i++){
   if ($i==0){
     echo "<td>",$salida[$i],"</td>";
   }
   if ($i==1){
     echo "<td>",$salida[$i],"</td>";
   }
   if ($i==2){
     echo "<td><input type=text size=10 name=precio[$salida[0]] value=$salida[$i]></td>";
   }
  }
  echo "</tr><tr>";
}
mysqli_close($c);

echo "
<td colspan=3 align=center><br><input type=submit value='Modificar'>
&nbsp;<input type=reset value='Restablecer'></td></tr></table><br>
";

echo '
<div>
<h2 style="text-align: center;"><a style="color: white; text-decoration: none;" href="productoAdd.php">Añadir producto</a></h2>
</div>';

include 'pie.php';
?>