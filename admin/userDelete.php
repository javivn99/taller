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
   
   
           <h2 class="seleccion">ELIMINAR CLIENTE</h2>
                                        
           <div class="formPedirCita"><form  class="formMod" action="" method="post">
             
           <label for="uemail"><b>DNI :</b></label>
           <input type="text" placeholder="Introduce su DNI" name="dni" required><br><br>

           <button name="btn_eliminar">Eliminar</button><br><br>';

if(isset($_REQUEST['btn_eliminar'])){

    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    htmlspecialchars($dni=$_REQUEST['dni']);

    $sql="SELECT * FROM cliente WHERE dni_c='$dni'";
    $result=mysqli_query($c,$sql);
    $mostrar=mysqli_fetch_array($result);

    if($mostrar==true){

        mysqli_query($c,"DELETE FROM $tabla  WHERE (dni_c='$dni')");

        if (mysqli_errno($c)==0){
            echo "<h4 style='color:green;'>Cliente eliminado</h4>"; 
        }else{ 
            if (mysqli_errno($c)==1062){
                echo "<h4 style='color:red;'>No ha podido eliminarse al cliente</h4>"; 
            }else{  
                $numerror=mysqli_errno($c); 
                $descrerror=mysqli_error($c); 
                echo "<h4 style='color:red;'>Se ha producido un error nº $numerror que corresponde a: $descrerror</h4>"; 
            } 
        }
    
    }else{
        echo "<h4 style='color:red;'>No existe un cliente con ese DNI.</h4>";
    }
    mysqli_close($c);    
}
   
   


 include 'pie.php';