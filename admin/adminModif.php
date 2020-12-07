<?php
session_start();

include 'head.php';
//Variables de las tablas
$base="taller";
$tabla="mecanico";

//Conectar con el usuario y la base
$c=mysqli_connect("localhost","javier","root");
mysqli_select_db($c,$base);

 
print' 

    <div class="nav">
        <h2 class="seleccion">Bienvenido al area de administradores</h2><br>
        <div class="menu_citas">
            <li><a href="adminAdd.php">Añadir administrador</a></li>
            <li><a href="adminDelete.php">Eliminar administrador</a></li>
            <li><a href="adminModif.php">Modificar administrador</a></li>
            <li><a href="adminConsult.php">Consultar datos de administrador</a></li>
        </div>
       </div>
   
   
           <h2 class="seleccion">MODIFICAR CONTRASEÑA DE ADMINISTRADOR</h2>
                                        
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

    $sql="SELECT * FROM $tabla WHERE dni_m='$dni'";
    $result=mysqli_query($c,$sql);
    $mostrar=mysqli_fetch_array($result);

    if($mostrar==true){
        if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{4,15}/",$password)){
    
            mysqli_query($c,"UPDATE $tabla SET contraseña_m='$contraseñaNueva' WHERE contraseña_m='$contraseñaAntigua' AND dni_m='$dni'");
            
            if (mysqli_errno($c)==0){
                echo "<h4 style='color:green;'>Contraseña actualizada</h4>"; 
            }else{ 
                if (mysqli_errno($c)==1062){
                    echo "<h4 style='color:red;'>No se ha podido actualizar la contraseña del administrador<br>Comprueba que has introducido bien todos los datos</h4>"; 
                }else{  
                    $numerror=mysqli_errno($c); 
                    $descrerror=mysqli_error($c); 
                    echo "<h4 style='color:red;'>Se ha producido un error nº $numerror que corresponde a: $descrerror</h4>"; 
                } 
            }
        }else{
            echo "<h4 style='color:red;'>Introduce una nueva contraseña valida</h4>";
        }
    }else{
        echo "<h4 style='color:red;'>No existe un administrador asociado a ese DNI</h4>";
    }
    mysqli_close($c);    
}

 include 'pie.php';