<?php
session_start();

include 'head.php';

print '
    <div class="nav">
        <h2 class="seleccion">Seleccione una opcion</h2><br>
        <div class="menu_citas">
            <li><a href="userAdd.php">Añadir usuario</a></li>
            <li><a href="userDelete.php">Eliminar usuario</a></li>
            <li><a href="userModif.php">Modificar usuario</a></li>
            <li><a href="userConsult.php">Consultar datos de usuario</a></li>
        </div>
    </div>

';
include 'pie.php';
