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

echo "<table align=center border=2 bgcolor='#03439C'>";
echo "<td colspan=4 style='text-align: center; padding:5px; color:white;'>PARA MODIFICAR ESCRIBE EN LA CASILLA CORRESPONDIENTE</td><tr>";
echo "<td a style='text-align: center; padding:5px; color:white;'>ID</td>";
echo "<td style='text-align: center; padding:5px; color:white;'>Producto</td>";
echo "<td  style='text-align: center; padding:5px; color:white;'>Precio</td>";
echo "<td style='text-align: center; padding:5px; color:white;'>Stock</td></tr><tr>";



echo "<form name='modificar' method=\"POST\" action='recambios1.php'>";

while($salida = mysqli_fetch_array($resultado)){
  for ($i=0;$i<4;$i++){
   if ($i==0){
     echo "<td  style='text-align: center; padding:5px; color:white;'>",$salida[$i],"</td>";
   }
   if ($i==1){
     echo "<td  style='text-align: center; padding:5px; color:white;'>",$salida[$i],"</td>";
   }
   if ($i==2){
     echo "<td style='text-align: center; padding:5px;' color:white;><input type=text size=10 name=precio[$salida[0]] value=$salida[$i]></td>";
   }
   if ($i==3){
    echo "<td style='text-align: center; padding:5px;' color:white;><input type=text size=10 name=stock[$salida[0]] value=$salida[$i]></td>";
  }
  }
  echo "</tr><tr>";
}
mysqli_close($c);

echo "
<td colspan=4  style='text-align: center; padding:5px;'><br><input type=submit value='Modificar'>
&nbsp;<input type=reset value='Restablecer'>&nbsp;
<div>
<h4 style='text-align: center;'><a style='color: white; text-decoration: none;' href='productoAdd.php'>Añadir producto</a></h4>
</div>
</td></tr></table><br>
";

include 'pie.php';
?>