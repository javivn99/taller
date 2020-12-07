<?php
session_start();

include 'head.php';

print '
<div class="nav">
<h2 class="seleccion">Bienvenido a tu area personal</h2><br>
<div class="menu_citas">
 <li><a href="userConsult.php">Consultar datos personales</a></li>
 <li><a href="userDelete.php">Eliminar usuario</a></li>
 <li><a href="userModif.php">Modificar contraseña</a></li>
</div>
</div>

';
include 'pie.php';
