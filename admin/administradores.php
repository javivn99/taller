<?php
session_start();

include 'head.php';

print '
    <div class="nav">
        <h2 class="seleccion">Seleccione una opcion</h2><br>
        <div class="menu_citas">
            <li><a href="adminAdd.php">Añadir administrador</a></li>
            <li><a href="adminDelete.php">Eliminar administrador</a></li>
            <li><a href="adminModif.php">Modificar administrador</a></li>
            <li><a href="adminConsult.php">Consultar datos de administrador</a></li>
        </div>
    </div>

';
include 'pie.php';
