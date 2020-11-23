<?php


if(isset($_REQUEST['btn_registro']))//si has pulsado el boton login
{
$uemail=$_REQUEST['uemail'];
$upass=$_REQUEST['upassword'];
$udni=$_REQUEST['udni'];
$uname=$_REQUEST['uname'];
$uapellidos=$_REQUEST['uapellidos'];
$ufnac=$_REQUEST['ufnac'];
$umatricula=$_REQUEST['umatricula'];
//Mirar los pattern de form15 y copiarlos
$mensaje = "Usuario registrado correctamente";
echo "<script type='text/javascript'>alert('$mensaje');</script>
    
";



    
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
            
                <h1>Registro de usuario</h1>
            
            
                <label for="uemail"><b>Email</b></label>
                <input type="text" placeholder="Introduce tu email" name="uemail" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Introduce tu contraseña" name="upassword" required>

                <label for="udni"><b>DNI</b></label>
                <input type="text" placeholder="Introduce tu DNI" name="udni" required>

                <label for="uname"><b>Nombre</b></label>
                <input type="text" placeholder="Introduce tu nombre" name="uname" required>

                <label for="uapellidos"><b>Apellidos</b></label>
                <input type="text" placeholder="Introduce tus apellidos" name="uapellidos" required>

                <label for="ufnac"><b>Fecha de nacimiento</b></label><br>
                <input type="date" placeholder="Introduce tu fecha de nacimiento" name="ufnac" required><br><br>

                <label for="umatricula"><b>Matricula</b></label>
                <input type="text" placeholder="Introduce la matricula de tu vehiculo" name="umatricula" required><br><br>
            
                <input class="boton" type="submit" value="Registarse" name="btn_registro">
            </div>
        </div>
    </form>

</body>
</html>';
}