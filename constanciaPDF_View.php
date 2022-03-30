<?php
    //include "constanciaPDF.php";
    $nombre=$_GET['nombre'];
?>

    <iframe src="constancia/<?php echo $nombre; ?>.pdf" style="width:100vw;height:100vh;"></iframe>

<?php

?>
