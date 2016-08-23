<?php
$contenido="poseame";
$fp=fopen("C:\\wamp\\www\\ejemplo\\archivo.txt","r+");
fwrite($fp,$contenido);
fclose($fp);
   echo     "Ya fue creado el arhivo" ."  ". "$contenido";
?>	