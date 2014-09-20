<?php


include_once(BASE . '/modele/graphique/graphiques.class.php');

try {
    $bdd      = BD::getInstance("ici_bdd", "dbconnect");
    $reponses = $bdd->get_reponse_repondu();
    $total_repondu = $bdd->get_total_repondu();
    //$CalculPercReponses = ($reponses * $total_repondu)/100;
    $total;
    for ($i = 0; $i < 3; $i++) {

       for ($j = 0; $j < count($reponses[$i]); $j++) {
            for ($k = 0; $k < count($reponses[$i][$j]); $k++) {

                    $rep_correc = $reponses[$i][$j][0];
                    $total_rep = $total_repondu[$i][$j][0];
                    $total = round(($rep_correc * 100)/$total_rep);
                    $reponses[$i][$j][0] = $total;
                    
             }
       

        }

    }
   
    foreach ($reponses as $result1) {
        $tb[] = $result1;
    }

    for ($i = 0; $i < 3; $i++) {
        
        foreach ($reponses[$i] as $val) {
            $tabs[] = implode($val);
        }
    }
    $tabs_categ = ['Internet et web','css','XHTML'];
    
    // On affiche la page (vue)
    //include_once(BASE.'/controleur/graphique/monImage.php');
    include_once(BASE . '/vue/graphique/graphiques.php');
    
}
catch (Exception $e) {
    //echo $e->getMessage();
}


for ($i = 0; $i < 7; $i++) {
    gen_images(20, 'image0', count($reponses[0]), $reponses[0], $reponses[0]);
    gen_images(20, 'image1', count($reponses[1]), $reponses[0], $reponses[0]);
    gen_images(20, 'image2', count($reponses[2]), $reponses[0], $reponses[0]);
}

function gen_images($width, $monImage, $nbrImg, $tailleImage)
{
    
    //header ("Content-type: image/png");
    
   
    $idimg = imagecreate(350, 295);
    
    //Création des couleurs
    $fond = imagecolorallocate($idimg, 241, 241, 241);
    $noir = imagecolorallocate($idimg, 0, 0, 0);
    
    imagesetthickness($idimg, 30);
    for ($i = 0; $i < 20; $i++) {
        $R          = rand(0, 255);
        $V          = rand(0, 255);
        $B          = rand(0, 255);
        $tabcolor[] = imagecolorallocate($idimg, $R, $V, $B);
    }
    for ($i = 0, $j = 0; $i < $nbrImg, $j < $nbrImg; $i += 43, $j++) {
        
        imagefilledrectangle($idimg, 0, 8 + $i, $tailleImage[$j][0], 33 + $i, $tabcolor[$j]);
        
    }
    
    //******************
    //TRACER DES FORMES
    //******************
    
    //Enregistrement de l'image dans un fichier
    imagepng($idimg, "./images/" . $monImage . ".png");
    
    imagedestroy($idimg);
}


?>




