<?php
session_start();

include 'head.php';
//Variables de las tablas
$base="taller";
$tabla="cliente";

//Conectar con el usuario y la base
$c=mysqli_connect("localhost","javier","root");
mysqli_select_db($c,$base);

 
print' 

    <div class="nav">
           <h2 class="seleccion">Bienvenido al area de clientes</h2><br>
           <div class="menu_citas">
            <li><a href="userAdd.php">Añadir usuario</a></li>
            <li><a href="userDelete.php">Eliminar usuario</a></li>
            <li><a href="userModif.php">Modificar usuario</a></li>
            <li><a href="userConsult.php">Consultar datos de usuario</a></li>
           </div>
       </div>
   
   
           <h2 class="seleccion">MODIFICAR CONTRASEÑA DEL CLIENTE</h2>
                                        
           <div class="formPedirCita"><form  class="formMod" action="" method="post">
             
           <label for="uemail"><b>DNI :</b></label>
           <input type="text" placeholder="Introduce su dni" name="dni" required><br><br>
   
           <label for="contraseñaAntigua"><b>Contraseña actual :</b></label>
           <input type="password" placeholder="*******" name="contraseñaAntigua" required><br><br>

           <label for="contraseñaNueva"><b>Contraseña nueva :</b></label>
           <input type="password" placeholder="*******" name="contraseñaNueva" required><br><br>

           <button name="btn">Modificar</button><br><br>';

if(isset($_REQUEST['btn'])){

    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    htmlspecialchars($dni=$_REQUEST['dni']);
    htmlspecialchars($contraseñaAntigua=$_REQUEST['contraseñaAntigua']);
    htmlspecialchars($contraseñaNueva=$_REQUEST['contraseñaNueva']);

    $sql="SELECT * FROM cliente WHERE dni_c='$dni'";
    $result=mysqli_query($c,$sql);
    $mostrar=mysqli_fetch_array($result);

    if($mostrar==true){
    
        mysqli_query($c,"UPDATE $tabla SET contraseña_c='$contraseñaNueva' WHERE contraseña_c='$contraseñaAntigua'  AND dni_c='$dni'");
        
        if (mysqli_errno($c)==0){
            echo "<h4 style='color:green;'>Contraseña actualizada</h4>"; 
        }else{ 
            if (mysqli_errno($c)==1062){
                echo "<h4 style='color:red;'>No se ha podido actualizar la contraseña del cliente<br>Comprueba que has introducido bien todos los datos</h4>"; 
            }else{  
                $numerror=mysqli_errno($c); 
                $descrerror=mysqli_error($c); 
                echo "<h4 style='color:red;'>Se ha producido un error nº $numerror que corresponde a: $descrerror</h4>"; 
            } 
        
        }
    }else{
        echo "No existe un cliente con ese DNI.";
    }
    mysqli_close($c);    
}

 include 'pie.php';