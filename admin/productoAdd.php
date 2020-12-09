<?php
session_start();

include 'head.php';
//Variables de las tablas
$base="taller";
$tabla="recambio";

//Conectar con el usuario y la base
$c=mysqli_connect("localhost","javier","root");
mysqli_select_db($c,$base);


print' 

              <h2 class="seleccion">AÑADIR PRODUCTO</h2>
                                        
           <div class="formPedirCita"><form  class="formMod" action="" method="post">
             
           <label for="name"><b>Nombre del producto :</b></label>
           <input type="text" placeholder="Introduce su nombre" name="name" required><br><br>

           <label for="precio"><b>Precio :</b></label>
           <input type="text" placeholder="Introduce el precio" name="precio" required><br><br>

           <label for="precio"><b>Stock :</b></label>
           <input type="text" placeholder="Introduce el stock disponible" name="stock" required><br><br>
   
           <input class="boton" type="submit" value="Añadir" name="btn"><br><br>';

if(isset($_REQUEST['btn'])){
   //Variables del formulario
error_reporting(E_ERROR | E_WARNING | E_PARSE);
htmlspecialchars($name =$_REQUEST['name']);
htmlspecialchars($precio = $_REQUEST['precio']);
htmlspecialchars($stock = $_REQUEST['stock']);     

        if(preg_match("/[A-Z]$/",$name)){
            if(preg_match("/^[0-9]*$/",$stock)){
                mysqli_query($c,"INSERT INTO $tabla (producto,precio,stock,nif) VALUES ('$name','$precio','$stock','1')");
            
                if (mysqli_errno($c)==0){
                    echo "<h2 style='color:green;'>Producto añadido correctamente</h2>";
                }else{
                    if (mysqli_errno($c)==1062){
                        echo "<h2 style='color:red;'>Error al añadir el producto</h2>";
                    }else{ 
                        $numerror=mysqli_errno($c);
                        $descrerror=mysqli_error($c);
                        echo "<h2 style='color:red;'>Se ha producido un error nº $numerror que corresponde a: $descrerror</h2>  <br>";
                    }
                } 
            }else{
                echo "<div style='text-align:center;'><h2 style='color:red;'>Introduce un nº de stock valido</h2></div>";
            }
        }else{
            echo "<div style='text-align:center;'><h2 style='color:red;'>Introduce un nombre valido</h2></div>";
        }   

    mysqli_close($c); 
        }
   
include 'pie.php';