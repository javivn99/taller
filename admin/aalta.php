<?php
include 'head.php';
                                             
 print' 
        <h2 class="postheader">FORMULARIO PARA PEDIR CITA</h2>
                                     
        <div   class="postcontent"><form action="" method="post">
            <table align="center" class="content-layout">
              <tr>
              <td align="right"><strong>Urgente? :</strong></td>
              <td>

              <input type="checkbox" name="urgente" value="urg"/>Si											  </td></tr>
              <tr><td align="right"><strong>Tipo :</strong></td><td>
              <div align="left">
                    <select name="tipo">
                      <option value="compraCoche">Compra de coche</option>
                      <option value="reparacionVehiculo">Reparacion de vehiculo</option>
                      
                    </select>
              </div></td></tr>
              
              <tr><td align="right"><strong>Taller :</strong></td><td>
              <div align="left">
                    <select name="taller">
                      <option value="cocheRepair">Coche Repair</option>
                      <option value="arreglaTodo">Arregla Todo</option>
                      <option value="tallerPiston">Taller Piston</option>
                      
                    </select>
              </div></td></tr>
              <tr><td align="right"><strong>Especifique el tipo de everia: </strong></td><td>
              <div align="left">
                    <textarea cols=50 rows=4 name="averia"></textarea>
              </div></td></tr>
              <tr ><td colspan="2"><div align="center"><strong>
            <input name="enviar" type="submit" id="enviar" value="Enviar"/>
            </strong></div></td></tr>
        </table>
    </form>
        </div>
<div id="imagen1">
        

        </div>        
';

 include 'pie.php';
											
                           