<?php
$base="taller";
$tabla="recambio";
$c=mysqli_connect ("localhost","javier","root");
mysqli_select_db ($c,$base);

foreach ($_POST['precio'] as $indice=>$valor){
    $resultado=mysqli_query($c,"UPDATE $tabla SET precio='$valor'
                            WHERE id='$indice' ");
}

mysqli_close($c);
?>

<script language="JavaScript">
  window.self.location="recambios.php";
</script>