<?php
session_start();//primera sentencia para trabajar con sesiones
//las variables de session son globales al proyecto


if(isset($_REQUEST['btn_login']))//si has pulsado el boton login
{
$email=$_REQUEST['email'];
    //declaro una variable de sesion
$_SESSION['email']=$_REQUEST['email'];    
$pass=$_REQUEST['password'];
if($email=="admin1@gmail.com" || $email=="admin2@gmail.com" || $email=="admin3@gmail.com" || $email=="admin4@gmail.com" || $email=="admin5@gmail.com" || $email=="admin6@gmail.com"){
    header('Location:admin/aprincipal.php');//redirigir a otra pagina
}

if($email!="admin1@gmail.com" || $email!="admin2@gmail.com" || $email!="admin3@gmail.com" || $email!="admin4@gmail.com" || $email!="admin5@gmail.com" || $email!="admin6@gmail.com"){
    header('Location:user/uprincipal.php');//redirigir a otra pagina
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
