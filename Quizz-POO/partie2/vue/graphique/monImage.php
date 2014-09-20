<?php
  header("location: ../vue/graphique/graphiques.php");
  header ("Content-type: image/png");
  
  //Création du cadre 200x50 pixels
  $idimg = imagecreate(400,400);
  
  //Création des couleurs
  $fond = imagecolorallocate($idimg,255,255,255);
  $noir = imagecolorallocate($idimg,0,0,0);
      
  
  //******************
  //TRACER DES FORMES
  //******************
  
  //Enregistrement de l'image dans un fichier
  imagepng($idimg,"./images/img.png");
  //Envoi de l'image au navigateur
  //imagepng($idimg);
  //Libération de l'espace mémoire
  imagedestroy($idimg);
?>
