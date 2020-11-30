<?php
session_start();
$errors = array();

$db = mysqli_connect('localhost', 'javier', 'root', 'taller');

if(isset($_REQUEST['btn_registro']))//si has pulsado el boton login
{

 // receive all input values from the form
 error_reporting(E_ERROR | E_WARNING | E_PARSE);
 $email = mysqli_real_escape_string($db, $_REQUEST['email']);
 $password = mysqli_real_escape_string($db, $_REQUEST['password']);
 $dni = mysqli_real_escape_string($db, $_REQUEST['dni']);
 $name = mysqli_real_escape_string($db, $_REQUEST['name']);
 $apellidos = mysqli_real_escape_string($db, $_REQUEST['apellidos']);
 $fnac = mysqli_real_escape_string($db, $_REQUEST['fnac']);
 $matricula = mysqli_real_escape_string($db, $_REQUEST['matricula']);


 // form validation: ensure that the form is correctly filled ...
 // by adding (array_push()) corresponding error unto $errors array
 if (empty($email)) { array_push($errors, "Email es obligatorio"); }
 if (empty($password)) { array_push($errors, "Contraseña es obligatoria"); }
 if (empty($dni)) { array_push($errors, "DNI es obligatorio"); }
 if (empty($name)) { array_push($errors, "Nombre es obligatorio"); }
 if (empty($apellidos)) { array_push($errors, "Apellidos son obligatorios"); }
 if (empty($fnac)) { array_push($errors, "Fecha de nacimiento obligatoria"); }
 if (empty($matricula)) { array_push($errors, "Matricula es obligatorio"); }

 // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM cliente WHERE email_c='$email' OR dni_c='$dni' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "El email ya existe");
    }

    if ($user['dni'] === $dni) {
      array_push($errors, "Este dni ya esta asociado a otra cuenta");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO cliente (dni_c, nombre, apellidos, email_c, contraseña_c, f_nacimiento, matricula) 
  			  VALUES('$dni', '$name', '$apellidos', '$email', '$password', '$fnac', '$matricula')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "Ahora estas logeado";
  	header('location: index.php');
    }
 } else{
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
                <input type="text" placeholder="Introduce tu email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Introduce tu contraseña" name="password" required>

                <label for="udni"><b>DNI</b></label>
                <input type="text" placeholder="Introduce tu DNI" name="dni" required>

                <label for="uname"><b>Nombre</b></label>
                <input type="text" placeholder="Introduce tu nombre" name="name" required>

                <label for="uapellidos"><b>Apellidos</b></label>
                <input type="text" placeholder="Introduce tus apellidos" name="apellidos" required>

                <label for="ufnac"><b>Fecha de nacimiento</b></label><br>
                <input type="date" placeholder="Introduce tu fecha de nacimiento" name="fnac" required><br><br>

                <label for="umatricula"><b>Matricula</b></label>
                <input type="text" placeholder="Introduce la matricula de tu vehiculo" name="matricula" required><br><br>
            
                <input class="boton" type="submit" value="Registarse" name="btn_registro">
            </div>
        </div>
    </form>

</body>
</html>';
 }