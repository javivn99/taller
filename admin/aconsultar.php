<?php
session_start();

include 'head.php';

print ' 
         <strong>SELECCIONA EL TIPO DE INCIDENCIA A LISTAR<BR><BR></strong>
                                     
        <div   class="postcontent"><form action="" method="post">
            <table align="center" class="content-layout">

              <tr><td align="right"><strong>Introduce tu DNI :</strong></td><td>
              <div align="left">
                    <input type="text" name="dni"/>
              </div></td></tr>

              <tr >
              <td colspan="2"><div align="center"><strong>
                <input name="mostrar" type="submit" id="listar" value="Mostrar"/>
                </strong>
                </div>
              </td>
            </tr>
              
        </table>
    </form>
        </div>';
include 'pie.php';
