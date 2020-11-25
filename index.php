<?php
session_start();//primera sentencia para trabajar con sesiones
//las variables de session son globales al proyecto
error_reporting(E_ERROR | E_WARNING | E_PARSE);
htmlspecialchars($email=$_REQUEST['email']);
htmlspecialchars($pass=$_REQUEST['password']);


$nombreServidor = "localhost";
$nombreUsuario = "javier";
$passwordBaseDeDatos = "root";
$nombreBaseDeDatos = "taller";

$conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

if ($conn ->connect_error) {
    die("Error  al conectar con la base de datos: " . $conn ->connect_error);
}



if(isset($_REQUEST['btn_login']))//si has pulsado el boton login
{
// MECANICO. Consulta segura para evitar inyecciones SQL.
$sql1 = sprintf("SELECT * FROM mecanico WHERE email_m='%s' AND contraseña_m = '%s'", $conn -> escape_string ($email), $conn -> escape_string ($pass));
$resultadoM = $conn->query($sql1);    

//CLIENTE
$sql2 = sprintf("SELECT * FROM cliente WHERE email_c='%s' AND contraseña_c = '%s'", $conn -> escape_string ($email), $conn -> escape_string ($pass));
$resultadoC = $conn->query($sql2);  

// Verificando si el usuario existe en la base de datos.
if($resultadoM){
    // Guardo en la sesión el email del usuario.
    $_SESSION['email'] = $_REQUEST['email'];
     
    // Redirecciono al usuario a la página principal del sitio.
    header('Location:admin/aprincipal.php');
}
else if($resultadoC){
    // Guardo en la sesión el email del usuario.
    $_SESSION['email'] = $_REQUEST['email'];
        
    // Redirecciono al usuario a la página principal del sitio.
    header('Location:user/uprincipal.php');

}

/*
if(!preg_match("^\w+([\.-]?\w+)+(@admin.com)+$", $email)){
    // Return Error - Invalid Email
    header('Location:user/uprincipal.php');
}
if(!preg_match("^\w+([\.-]?\w+)+(@admin.com)+$", $email)) {
    // Return Success - Valid Email
    header('Location:admin/aprincipal.php');
}*/
}
else{
echo'<!DOCTYPE html>

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
            
                <h1>Inicio de sesion</h1>
            
            
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Introduce tu email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Introduce tu contraseña" name="password" required>
                <a href="crearUsuario.php">¿Eres nuevo? Crea aqui una cuenta</a>
            
                <input class="boton" type="submit" value="Log in" name="btn_login">
            </div>
        </div>
    </form>

</body>
</html>';
}
