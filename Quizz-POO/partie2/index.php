<?php
define("BASE", dirname(__FILE__));
if (!isset($_GET['section']) || $_GET['section'] == 'graphiques'){
    //include_once(BASE."/controleur/graphique/graphiques.php");
} /*else if($_GET['section'] == 'commentaires'){
    $idBillet = $_GET['billet'];
    include_once(BASE."/controleur/blog/commentaires.php");
}*/

// si tous va bien la page va s'afficher

ob_start();
include "./controleur/graphique/graphiques.php";
$content = ob_get_contents();
ob_end_clean();
// htmWrapper qui va recevoir chaque page dans la partie  contenu
include_once(BASE."/vue/graphique/htmlWrapper.php");
?>
