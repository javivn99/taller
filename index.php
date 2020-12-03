<?php
session_start();//primera sentencia para trabajar con sesiones
//las variables de session son globales al proyecto
error_reporting(E_ERROR | E_WARNING | E_PARSE);
htmlspecialchars($email=$_REQUEST['email']);
htmlspecialchars($password=$_REQUEST['password']);


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
$sql1 = "SELECT * FROM mecanico WHERE email_m='$email' AND contraseña_m = '$password'";
$resultadoM = mysqli_query($conn, $sql1);

//CLIENTE
/*
$sql2 = "SELECT * FROM cliente WHERE email_c='$email' AND contraseña_c = '$password'";
$resultadoC = mysqli_query($conn, $sql2); */ 

if($mostar=mysqli_fetch_array($sql1)==true){
    while($mostar=mysqli_fetch_array($sql1)) {
        $email2=$mostrar['email'];
        $password2=$mostrar['password'];
    }
    if($email=="$email2" && $password=="$password2"){
        header('Location:admin/aprincipal.php');
    }
}

} else {
    print '<br><h4>Email o contraseña incorrectos</h4>';
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
