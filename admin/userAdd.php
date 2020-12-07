<?php
session_start();

include 'head.php';
//Variables de las tablas
$base="taller";
$cliente="cliente";

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

           <label for="uapellidos"><b>Matricula :</b></label>
           <input type="text" placeholder="Introduce la matricula de tu vehiculo" name="matricula" required><br><br>
   
           <input class="boton" type="submit" value="Registarse" name="btn_registro"><br><br>';

if(isset($_REQUEST['btn_registro'])){
   //Variables del formulario
error_reporting(E_ERROR | E_WARNING | E_PARSE);
htmlspecialchars($dni = $_REQUEST['dni']);
htmlspecialchars($name =$_REQUEST['name']);
htmlspecialchars($apellidos = $_REQUEST['apellidos']);
htmlspecialchars($email = $_REQUEST['email']);
htmlspecialchars($password = $_REQUEST['password']);
htmlspecialchars($matricula = $_REQUEST['matricula']);

    if(!preg_match("/^[a-zA-Z0-9._-]+[@admin]+\.([a-zA-Z]{2,4})+$/",$email) && preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})+$/",$email)){
        

            mysqli_query($c,"INSERT INTO $cliente (dni_c,nombre,apellidos,email_c,contraseña_c, matricula) VALUES ('$dni','$name','$apellidos','$email','$password','$matricula')");
        
            if (mysqli_errno($c)==0){
                echo "<h4 style='color:green;'>Usuario añadido correctamente</h4>";
            }else{
                if (mysqli_errno($c)==1062){
                    echo "<h4 style='color:red;'>Error al añadir usuario. El usuario ya existe</h4>";
                }else{ 
                    $numerror=mysqli_errno($c);
                    $descrerror=mysqli_error($c);
                    echo "<h4 style='color:red;'>Se ha producido un error nº $numerror que corresponde a: $descrerror</h4>  <br>";
                }
            }
        }else{
            echo "<h4 style='color:red;'>Introduce un email correcto</h4>";
        }
    

    mysqli_close($c); 
}   


 include 'pie.php';