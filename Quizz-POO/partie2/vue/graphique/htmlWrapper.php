<!--
   /* TP Finale: Programmation POO
    * Annee 2012/2014
    * Date de remise 18-05-2014
    * Page Wrapper (recoit a chaque fois une page dans la partie contenu)
   -->
<?php
   include_once(BASE."/vue/graphique/entete.inc.html");
   include_once(BASE."/modele/graphique/graphiques.class.php");
   
   ?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <link href="./vue/graphique/css/style.css" rel="stylesheet" type="text/css" />
      <title>TP PROGRAMMATION PHP-POO</title>
   </head>
   <body>
      <main>
         <!-- l'enssemble d contenu de la page -->
         <!-- le header --> 
         <header>
            <h1 class="titre-quiz"> QUIZ <span> (Abdellah Ait Hadji / Alexandre Lacerte)</span></h1>
            <a href="index.php"><span class='retour'>Changer les couleurs</span></a>
            <!-- le titre -->
         </header>
         <!-- fin header -->
         <div class="content">
            <?php
               echo $content;
               ?>
         </div>
      </main>
   </body>
   </footer>
   </footer>
</html>