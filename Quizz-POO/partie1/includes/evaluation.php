<?php
  
   /*
    * TP Finale: Programmation POO
    * Annee 2012/2014
    * Date de remise 18-05-2014
    * Page numero 4 (resultat du quiz, evaluation)
   */
  
   if (isset($_SESSION["question"]) && count($_SESSION["question"]) ==18)
   {
       //print_r($_SESSION["question"]);
       $resultat = $_SESSION["question"]; 
  }
   else
   {   /*variable backup si session a planter en chemin*/
       $resultat = array(
               1 => 1,
               2 => 6,
               3 => 11,
               4 => 13,
               5 => 16,
               6 => 20,
               7 => 21,
               8 => 24,
               9 => 28,
               10 => 32,
               11 => 34,
               12 => 39,
               13 => 42,
               14 => 43,
               15 => 48,
               16 => 53,
               17 => 58,
               18 => 59,
               );
       //echo "nexiste pas";
   }
   
  // echo count($resultat);
   ?>
<form action="index.php?p=get_evaluation" method="post">
<?php
   include_once("./includes/classes/Categorie.class.php");
   
   
   
   //echo "<pre>".print_r($resultat,true)."</pre>";
   
   
   include_once "./includes/classes/Categorie.class.php";
   include_once "./includes/classes/Question.class.php";
   include_once "./includes/classes/Reponse.class.php";
   include_once "./includes/classes/RequeteDB.class.php";
   
   $requetePreFais = "SELECT * FROM categorie";   
   $requeteCategorie = requeteServeur::requeteMysql($requetePreFais);
   $categorie = new Categorie($requeteCategorie);
   
   $requetePreFais = "SELECT * FROM question"; 
   $requeteQuestion = requeteServeur::requeteMysql($requetePreFais);
   $question = new Question($requeteQuestion); 
   
   $requetePreFais = "SELECT * FROM reponse"; 
   $requeteQuestion = requeteServeur::requeteMysql($requetePreFais);
   $reponse = new Reponse($requeteQuestion);
   
   $reponduCorrectement = 1;
   $variableTemporaire = "testing de zone votre reponse";
   
   /*Variable test car session est tres capricieux*/
   
   
    /*$categorie->getIntitule()[1] represente la premiere categorie 1=Internet et Web
                                                                    2= CSS
                                                                    3= XHTML
   */ 
   
   $totalbon=0;
   echo "ÉVALUATION";
   foreach($categorie->getId() as $valeur)
   {
       $calculBon = 0;
       $nbQuestion = 0;
       echo "<article>";
       echo '<h2>' . $categorie->getIntitule()[$valeur] . '</h2>';
       echo "<hr />";
       echo '<ul>';
       foreach($question->getId() as $valeur1)
       {
           
           if($question->getCategorie()[$valeur1] == $categorie->getIntitule()[$valeur])/*changer le chiffre pour la categorie*/
           {  
               $nbQuestion++ ;
               echo '<li>' . $question->getIntitule()[$valeur1] . '</li>';
   
               foreach($reponse->getId() as $valeur2)
               {   
                   /*verifie si a bonne  place avec premier argument et deuxieme permet de savoir si la reponse est la bonne*/
                   if($reponse->getCategorie()[$valeur2] == $question->getIntitule()[$valeur1])
                   {   
                       /*circule en boucle tous les reponse recu*/
                       foreach($resultat as $cle => $val)
                       {
                           /*boucle qui compare le id des question a ceux des reponse recu*/
                           if($reponse->getId()[$valeur2] == $val)
                           {
                               
                               echo "Votre réponse: ".$reponse->getIntitule()[$val]."<br />";
                               //echo $reponse->getId()[$valeur2]." / ".$val."<br/>";
                               
                               if($reponse->getBonneReponse()[$valeur2] == 1)
                               {    
                                   echo "<strong>correct</strong><br/>";
                                   $calculBon++ ;
                                   $totalbon++;
                               }
                               else /*si la reponse n'est pas bonne, retourne lautre mesasge*/
                               {
                                   echo "<strong>Incorrect;</strong> la bonne réponse est: ".$reponse->getIntitule()[$valeur2]; 
                               }   
                           }
                       }
                   }
               }
               echo "<hr />";
           }            
       }
       echo '</ul>';
       $calculPourcentage = round(($calculBon/$nbQuestion)*100);
       echo "Évaluation pour <strong>".$categorie->getIntitule()[$valeur].":</strong> ".$calculPourcentage."% (".$calculBon."/".$nbQuestion.")"; 
       echo "</article>";
       $pourc[] = $calculPourcentage;
   }
   echo "<hr />";
   $calculPourcentage = round(($totalbon/count($question->getId()))*100);
   echo "<strong>Évaluation Globale:</strong> ".$calculPourcentage."% (".$totalbon."/".count($question->getId()).")";
   echo "<hr />";
   
     
   ?>
<input type="submit" name="envoi" value="Afficher graphique">
</form>