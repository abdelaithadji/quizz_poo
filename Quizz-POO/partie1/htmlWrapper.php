<!--
   /* Autor: Abdellah Ait hadji
    * Quizz:  en POO
    * Annee 2012/2014
    * Date de remise 18-05-2014
    * Page Wrapper (recoit a chaque fois une page dans la partie contenu)
   -->
<?php
   include "includes/entete.inc.html";
   include_once("./connexionObjet.inc.php");
   include_once("./includes/classes/Categorie.class.php");
   ?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <link href="./css/style.css" rel="stylesheet" type="text/css" />
      <title>TP PROGRAMMATION PHP-POO</title>
   </head>
   <body>
      <main>
         <!-- l'enssemble d contenu de la page -->
         <!-- le header --> 
         <header>
            <h1> QUIZ <span> (ABDELLAH AIT HADJI)</span></h1>
            <!-- le titre -->
         </header>
         <!-- fin header -->
         <article>
            <?php
               echo $content;
               ?>
         </article>
      </main>
   </body>
   </footer>
   </footer>
</html>