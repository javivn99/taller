<?php
session_start();

$base="taller";
$cliente="cliente";

$c=mysqli_connect("localhost","javier","root");
mysqli_select_db($c,$base);


echo '
<!DOCTYPE html>

<html>
<head>
    <link href="index.css" rel="stylesheet" type="text/css">
    <title>Pagina principal del taller</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>
<body>

    <form>
        <div class="container">
            
                <h1>Registro de usuario</h1>
            
            
                <label for="uemail"><b>Email</b></label>
                <input type="text" placeholder="Introduce tu email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Introduce tu contraseña" name="password" required>

                <label for="udni"><b>DNI</b></label>
                <input type="text" placeholder="Introduce tu DNI" name="dni" required>

                <label for="uname"><b>Nombre</b></label>
                <input type="text" placeholder="Introduce tu nombre" name="name" required>

                <label for="uapellidos"><b>Apellidos</b></label>
                <input type="text" placeholder="Introduce tus apellidos" name="apellidos" required>

                <label for="umatricula"><b>Matricula</b></label>
                <input type="text" placeholder="Introduce la matricula de tu vehiculo" name="matricula" required><br><br>

                <p><a style="text-decoration:none; color: deeppink;" href="index.php">Volver</a></p>
            
                <input class="boton" type="submit" value="Registarse" name="btn_registro">
            </div>
        </div>
    </form>

</body>
</html>
';

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
               echo "<div style='text-align:center;'><h4 style='color:green;'>Usuario añadido correctamente</h4></div>";
           }else{
               if (mysqli_errno($c)==1062){
                   echo "<div style='text-align:center;'><h4 style='color:red;'>Error al añadir usuario. El usuario ya existe</h4></div>";
               }else{ 
                   $numerror=mysqli_errno($c);
                   $descrerror=mysqli_error($c);
                   echo "<div style='text-align:center;'><h4 style='color:red;'>Se ha producido un error nº $numerror que corresponde a: $descrerror</h4></div>  <br>";
               }
           }
       }else{
           echo "<div style='text-align:center;'><h4 style='color:red;'>Introduce un email correcto</h4></div>";
       }
   

   mysqli_close($c); 
}   