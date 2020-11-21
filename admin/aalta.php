<?php
include 'head.php';
                                             
 print' 
        <h2 class="postheader">FORMULARIO PARA PEDIR CITA</h2>
                                     
        <div   class="postcontent"><form action="" method="post">
            <table align="center" class="content-layout">
              
            <tr><td align="right"><strong>DNI :</strong></td><td>
            <div align="left">
                  <input type="text" name="dni"/>
            </div></td></tr>

            <tr><td align="right"><strong>Matricula :</strong></td><td>
            <div align="left">
                  <input type="text" name="matricula"/>
            </div></td></tr>

            <tr><td align="right"><strong>Marca del vehiculo :</strong></td><td>
            <div align="left">
                  <input type="text" name="marca"/>
            </div></td></tr>

              <tr>

              <td align="right"><strong>Indique el tipo de incidencia :</strong></td>

              <td>
              <div align="left">
                    <select name="incidencia">
                      <option value="compraCoche">Cambio de neumaticos</option>
                      <option value="reparacionVehiculo">Cambio de aceite</option>
                      <option value="compraCoche">Cambio de pastillas de freno</option>
                      <option value="reparacionVehiculo">Cambio de parachoques</option>
                      <option value="reparacionVehiculo">Cambio de luna frontal</option>
                      <option value="compraCoche">Cambio de retrovisor</option>
                      <option value="reparacionVehiculo">Limpieza del tubo de escape</option>
                      <option value="compraCoche">Cambio liquido anti-congelante</option>
                      <option value="reparacionVehiculo">Cambio pintura del coche</option>
                      <option value="reparacionVehiculo">Cambio de llantas</option>
                      <option value="reparacionVehiculo">Cambio de limpia parabrisas</option>
                      
                    </select>
              </div>
              </td>
              </tr>

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
											
                           