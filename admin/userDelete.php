<?php
session_start();

include 'head.php';
//Variables de las tablas
$base="taller";
$cliente="cliente";
$vehiculo="vehiculo";

//Conectar con el usuario y la base
$c=mysqli_connect("localhost","javier","root");
mysqli_select_db($c,$base);

 
print' 

    <div class="nav">
           <h2 class="seleccion">Seleccione una opcion</h2><br>
           <div class="menu_citas">
            <li><a href="userAdd.php">Añadir usuario</a></li>
            <li><a href="userDelete.php">Eliminar usuario</a></li>
            <li><a href="userModif.php">Modificar usuario</a></li>
            <li><a href="userConsult.php">Consultar datos de usuario</a></li>
           </div>
       </div>
   
   
           <h2 class="seleccion">ELIMINAR CLIENTE</h2>
                                        
           <div class="formPedirCita"><form  class="formMod" action="" method="post">
             
           <label for="uemail"><b>Email :</b></label>
           <input type="text" placeholder="Introduce su email" name="email" required><br><br>
   
           <label for="umatricula"><b>Matricula :</b></label>
           <input type="text" placeholder="Introduce la matricula de tu vehiculo" name="matricula" required><br><br>

           <button name="btn_eliminar">Eliminar</button><br><br>';

if(isset($_REQUEST['btn_eliminar'])){

    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    htmlspecialchars($email=$_REQUEST['email']);
    htmlspecialchars($matricula=$_REQUEST['matricula']);
    
    mysqli_query($c,"DELETE FROM $vehiculo  WHERE (matricula='$matricula')");
    mysqli_query($c,"DELETE FROM $cliente  WHERE (dni_c='$dni')");

    if (mysqli_errno($c)==0){
        echo "<h4 style='color:green;'>Cliente eliminado</h4>"; 
    }else{ 
        if (mysqli_errno($c)==1062){
            echo "<h4 style='color:red;'>No ha podido eliminarse al cliente<br>No hay ningun usuario asociado a ese DNI</h4>"; 
        }else{  
            $numerror=mysqli_errno($c); 
            $descrerror=mysqli_error($c); 
            echo "<h4 style='color:red;'>Se ha producido un error nº $numerror que corresponde a: $descrerror</h4>"; 
        } 
    
    }
    mysqli_close($c);    
}
   
   


 include 'pie.php';