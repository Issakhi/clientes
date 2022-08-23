<?php
  $bd ="app_test";
  $localhost ="127.0.0.1";
  $user ="root";
  $pass ="";
  $conex = new mysqli( $localhost, $user, $pass,$bd) or die (" No se ha podido conectar");
  
  return $conex;  
        ?>