<?php
    //include "constanciaPDF.php";
    $nombre=$_GET['nombre'];
   

        $nom = $nombre.".pdf";    
        $documento = "constancia/".$nombre.".pdf";
        if(file_exists($documento)){
            // Define headers
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$nom");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");
            // Read the file
            readfile($documento);
        }else{
            echo 'The file does not exist.';
        }
   
    
        ?>
        <iframe src="constancia/<?php echo $nombre; ?>.pdf" style="width:100%;height:50%;"></iframe>
    <?php
  
?>
