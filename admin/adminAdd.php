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
           <h2 class="seleccion">Seleccione una opcion</h2><br>
           <div class="menu_citas">
            <li><a href="adminAdd.php">Añadir administrador</a></li>
            <li><a href="adminDelete.php">Eliminar administrador</a></li>
            <li><a href="adminModif.php">Modificar administrador</a></li>
            <li><a href="adminConsult.php">Consultar datos de administrador</a></li>
           </div>
       </div>
   
   
           <h2 class="seleccion">CREAR ADMINISTRADOR</h2>
                                        
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
       
           <input class="boton" type="submit" value="Crear" name="btn_registro">';  
           
   
         if(isset($_REQUEST['btn_registro'])){
            //Variables del formulario
         error_reporting(E_ERROR | E_WARNING | E_PARSE);
         htmlspecialchars($email = $_REQUEST['email']);
         htmlspecialchars($password = $_REQUEST['password']);
         htmlspecialchars($dni = $_REQUEST['dni']);
         htmlspecialchars($name =$_REQUEST['name']);
         htmlspecialchars($apellidos = $_REQUEST['apellidos']);
         htmlspecialchars($fnac =$_REQUEST['fnac']);
         
             if(preg_match("/^[a-zA-Z0-9._-]+[@admin]+\.([a-zA-Z]{2,4})+$/",$email)){
                
                     mysqli_query($c,"INSERT INTO $tabla (dni_m,nombre,apellidos,email_m,contraseña_m,f_nacimiento) VALUES ('$dni','$name','$apellidos','$email','$password','$fnac')");
                 
                     if (mysqli_errno($c)==0){
                         echo "<h4 style='color:green;'>Administrador creado correctamente</h4>";
                     }else{
                         if (mysqli_errno($c)==1062){
                             echo "<h4 style='color:red;'>Error al crear administrador</h4>";
                         }else{ 
                             $numerror=mysqli_errno($c);
                             $descrerror=mysqli_error($c);
                             echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
                         }
                     }
                 }else{
                     echo "<h4 style='color:red;'>Introduce un email correcto</h4>";
                 }
             
         
             mysqli_close($c); 
                }
                
 include 'pie.php';