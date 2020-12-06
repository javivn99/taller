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

                                             


//Añadir a cliente_citas sus datos
if(isset($_REQUEST['btn_registro'])){
   //Variables del formulario
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$email = mysqli_real_escape_string($c, $_REQUEST['email']);
$password = mysqli_real_escape_string($c, $_REQUEST['password']);
$dni = mysqli_real_escape_string($c, $_REQUEST['dni']);
$name = mysqli_real_escape_string($c, $_REQUEST['name']);
$apellidos = mysqli_real_escape_string($c, $_REQUEST['apellidos']);
$fnac = mysqli_real_escape_string($c, $_REQUEST['fnac']);
$matricula = mysqli_real_escape_string($c, $_REQUEST['matricula']);
$marca = mysqli_real_escape_string($c, $_REQUEST['marcacoche']);

    if(!preg_match("/^[a-zA-Z0-9._-]+[@admin]+\.([a-zA-Z]{2,4})+$/",$email)){
        if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})+$/",$email)){
            mysqli_query($c,"INSERT INTO $vehiculo (matricula, marca) VALUES ('$matricula', '$marca')");
            mysqli_query($c,"INSERT INTO $cliente (dni_c,nombre,apellidos,email_c,contraseña_c,f_nacimiento) VALUES ('$dni','$nombre','$apellidos','$email','$password','$fnac')");
        
            if (mysqli_errno($c)==0){
                echo "<br><br><h2>USUARIO AÑADIDO</b></H2><br><br>";
            }else{
                if (mysqli_errno($c)==1062){
                    echo "<h2>No ha podido añadirse el registro<br>Ya existe un campo con estos datos</h2>";
                }else{ 
                    $numerror=mysqli_errno($c);
                    $descrerror=mysqli_error($c);
                    echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
                }
            }
        }else{
            echo "EL FORMATO DEL EMAIL NO ES CORRECTO";
        }
    }else{
        echo "NO ES POSIBLE CREAR UN USUARIO CLIENTE COMO ADMINISTRADOR";
    }

    mysqli_close($c); 
}
else{
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
   
   
           <h2 class="seleccion">REGISTRO DE CLIENTE</h2>
                                        
           <div class="formPedirCita"><form  class="formMod" action="" method="post">
             
           <label for="uemail"><b>Email :</b></label>
           <input type="text" placeholder="Introduce tu email" name="email" required><br><br>

           <label for="psw"><b>Password :</b></label>
           <input type="password" placeholder="Introduce tu contraseña" name="password" required><br><br>
   
           <label for="udni"><b>DNI :</b></label>
           <input type="text" placeholder="Introduce tu DNI" name="dni" required><br><br>
   
           <label for="uname"><b>Nombre :</b></label>
           <input type="text" placeholder="Introduce tu nombre" name="name" required><br><br>
   
           <label for="uapellidos"><b>Apellidos :</b></label>
           <input type="text" placeholder="Introduce tus apellidos" name="apellidos" required><br><br>
   
           <label for="ufnac"><b>Fecha de nacimiento :</b></label>
           <input type="date" placeholder="Introduce tu fecha de nacimiento" name="fnac" required><br><br>
   
           <label for="umatricula"><b>Matricula :</b></label>
           <input type="text" placeholder="Introduce la matricula de tu vehiculo" name="matricula" required><br><br>

           <label for="marcacoche"><b>Marca :</b></label>
           <input type="text" placeholder="Introduce la marca del vehiculo" name="marca" required><br><br>
       
           <input class="boton" type="submit" value="Registarse" name="btn_registro">';  
         }    
   


 include 'pie.php';