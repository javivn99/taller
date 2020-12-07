<?php
session_start();

include 'head.php';

print '
    <div class="nav">
        <h2 class="seleccion">Bienvenido al area de citas</h2><br>
        <div class="menu_citas">
                <li><a href="aalta.php">Añadir cita</a></li>
                <li><a href="aborrar.php">Cancelar cita</a></li>
                <li><a href="amodificar.php">Modificar cita</a></li>
                <li><a href="aconsultar.php">Consultar</a></li>
        </div>
    </div>

';
include 'pie.php';