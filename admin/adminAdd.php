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
       
           <input class="boton" type="submit" value="Crear" name="btn_registro">';  
           
   
         if(isset($_REQUEST['btn_registro'])){
            //Variables del formulario
         error_reporting(E_ERROR | E_WARNING | E_PARSE);
         htmlspecialchars($dni = $_REQUEST['dni']);
         htmlspecialchars($name =$_REQUEST['name']);
         htmlspecialchars($apellidos = $_REQUEST['apellidos']);
         htmlspecialchars($email = $_REQUEST['email']);
         htmlspecialchars($password = $_REQUEST['password']);
        
             if(preg_match("/^[a-zA-Z0-9._-]+[@admin]+\.([a-zA-Z]{2,4})+$/",$email)){   
                if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{4,15}/",$password)){ //Min una mayusc y minusc. Entre 4 y 15 difigitos. Min 1 special char. No espacios.
                    if(preg_match("/^\d{8}[a-zA-Z]$/",$dni)){ 
                        if(preg_match("/^[A-Z]{1}[a-z]+|[A-Z]{1}[a-z]+\s[A-Z]{1}[a-z]+$/",$name)){
                            if(preg_match("/^[A-Z]{1}[a-z]+|[A-Z]{1}[a-z]+\s[A-Z]{1}[a-z]+$/",$apellidos)){

                                mysqli_query($c,"INSERT INTO $tabla (dni_m,nombre,apellidos,email_m,contraseña_m) VALUES ('$dni','$name','$apellidos','$email','$password')");
                            
                                if (mysqli_errno($c)==0){
                                    mysqli_query($c,"INSERT INTO taller_mecanico (nif, dni_m) VALUES ('1','$dni')");
                                    echo "<h2 style='color:green;'>Administrador creado correctamente</h2>";
                                }else{
                                    if (mysqli_errno($c)==1062){
                                        echo "<h2 style='color:red;'>Error. Ya existe un administrador asociado a ese DNI</h2>";
                                    }else{ 
                                        $numerror=mysqli_errno($c);
                                        $descrerror=mysqli_error($c);
                                        echo "<h2  style='color:red;'>Se ha producido un error nº $numerror que corresponde a: $descrerror</h2>  <br>";
                                    }
                                }
                            }else{
                                echo "<h2 style='color:red;'>Introduce unos apellidos validos</h2>";
                            }
                        }else{
                            echo "<h2 style='color:red;'>Introduce un nombre valido</h2>";
                        }

                    }else{
                        echo "<h2 style='color:red;'>Introduce un dni valido</h2>";
                    }
                }else{
                    echo "<h2 style='color:red;'>Introduce una contraseña valida</h2>";
                }
            }else{
                echo "<h2 style='color:red;'>Introduce un email valido</h2>";
            }
    
        mysqli_close($c); 
    }
                
 include 'pie.php';