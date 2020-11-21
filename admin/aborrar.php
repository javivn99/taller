<?php
session_start();

include 'head.php';
unset($_SESSION['incidencias'][0]); //Esto lo he puesto yo. Seria para borrar la incidencia nº 0.
 print' 
            <strong>INTRODUCE EL Nº DE LA CITA<BR><BR></strong>
                                     
        <div   class="postcontent"><form action="" method="post">
            <table align="center" class="content-layout">
              
              
              <tr><td align="right"><strong>Num de Cita :</strong></td><td>
              <div align="left">
                    <input type="text" name="num_cita"/>
              </div></td></tr>
              
              <tr ><td colspan="2"><div align="center"><strong>
            <input name="borrar" type="submit" id="borrar" value="Cancelar"/>
            </strong></div></td></tr>
        </table>
    </form>
        </div>';
 include 'pie.php';

 //Poner un alert que diga "Cita cancelada con exito"