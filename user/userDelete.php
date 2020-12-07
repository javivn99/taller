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
<h2 class="seleccion">Bienvenido a tu area personal</h2><br>
<div class="menu_citas">
 <li><a href="userConsult.php">Consultar datos personales</a></li>
 <li><a href="userDelete.php">Eliminar usuario</a></li>
 <li><a href="userModif.php">Modificar contraseña</a></li>
</div>
</div>
   
   
           <h2 class="seleccion">ELIMINAR CUENTA</h2>
                                        
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
            mysqli_query($c,"DELETE FROM cliente_cita  WHERE (dni_c='$dni')");
            mysqli_close($c);  
            header('Location:../index.php'); 
        }else{ 
            if (mysqli_errno($c)==1062){
                echo "<h2 style='color:red;'>No se ha podido eliminar el usuario</h2>"; 
            }else{  
                $numerror=mysqli_errno($c); 
                $descrerror=mysqli_error($c); 
                echo "<h2 style='color:red;'>Se ha producido un error nº $numerror que corresponde a: $descrerror</h2>"; 
            } 
        }
    
    }else{
        echo "<h2 style='color:red;'>Compruebe el DNI</h2>";
    }    
}
   
   


 include 'pie.php';