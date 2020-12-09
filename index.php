<?php
session_start();

$base = "taller";

$c=mysqli_connect("localhost","javier","root");
mysqli_select_db($c,$base);


if ($c ->connect_error) {
    die("Error  al conectar con la base de datos: " . $c ->connect_error);
} else {
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
            
                <h1>Inicio de sesion</h1>
            
            
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Introduce tu email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Introduce tu contraseña" name="password" required>
                <br><br>
                <p><a style="text-decoration:none; color: deeppink;" href="crearUsuario.php">¿Eres nuevo? Crea aqui una cuenta</a></p>
                <p><a style="text-decoration:none; color: deeppink;" href="indexAdmin.php">¿Eres empleado?</a></p>
            
                <input class="boton" type="submit" value="Log in" name="btn_login">
            </div>
            <br><br>
            
        </div>
    </form>

</body>
</html>
    ';
}




if(isset($_REQUEST['btn_login']))//si has pulsado el boton login
{
    htmlspecialchars($email=$_REQUEST['email']);
    $_SESSION['email']=$_REQUEST['email'];
    htmlspecialchars($password=$_REQUEST['password']);

    if(empty($email) && empty($password)){
        echo '<h4>Rellene todos los campos</h4>';
    } 
    
    $sql="SELECT * FROM cliente WHERE email_c='$email'";
    $result=mysqli_query($c,$sql);
    $mostrar=mysqli_fetch_array($result);

    if($mostrar==true){

        $sql = "SELECT * FROM cliente WHERE email_c='$email' AND contraseña_c = '$password'";
        $resultado = mysqli_query($c, $sql);

        if($mostar=mysqli_fetch_array($resultado)==true){
            header('Location:user/uprincipal.php');
        } else {
            echo "<div style='text-align:center;'><h4 style='color:red; align:center;'>Email o contraseña incorrecta</h4><div>";

        }
    }else{
        echo "<h2 style='color:red;'>Error. Usuario o contraseña incorrectos</h2>";
    }
    
        
}
