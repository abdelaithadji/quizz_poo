	<?php
   /* Autor: Abdellah Ait hadji
    * Quizz:  en POO
    * Date de remise 18-05-2014
    * Page index (géroite, envoi a chaque appel une page a wrapperHtml)
*/
// déclaration par défault la variable "p" (represente la page) si elle n'est pas déclaré
if(!isset($_GET["p"])){$_GET["p"]="page1";}
//si la variable "p" (la page)  n'existe pas 404 va s'afficher à la place
if(!file_exists("includes/".$_GET["p"].".php")){$_GET["p"]="404";}
// si tous va bien la page va s'afficher

ob_start();
include "includes/".$_GET["p"].".php";
 
$content = ob_get_contents();
ob_end_clean();
// htmWrapper qui va recevoir chaque page dans la partie  contenu
include "htmlWrapper.php";
?>