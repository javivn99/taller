<?php
session_start();//primera sentencia para trabajar con sesiones
//las variables de session son globales al proyecto

$base="taller";
$mecanico="mecanico";
$cliente="cliente";

if(isset($_REQUEST['btn_login']))//si has pulsado el boton login
{
htmlspecialchars($email=$_REQUEST['email']);
//declaro una variable de sesion
$_SESSION['email']=$_REQUEST['email'];    
htmlspecialchars($pass=$_REQUEST['password']);

if(!preg_match("^\w+([\.-]?\w+)+(@admin.com)+$", $email)){
    // Return Error - Invalid Email
    header('Location:user/uprincipal.php');
}
if(!preg_match("^\w+([\.-]?\w+)+(@admin.com)+$", $email)) {
    // Return Success - Valid Email
    header('Location:admin/aprincipal.php');
}
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
