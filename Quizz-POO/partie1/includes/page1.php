<?php
   session_start();

   ?>
<!--
   /* Autor: Abdellah Ait hadji
    * Quizz:  en POO
    * Date de remise 18-05-2014
    * Page numero 1 (question du quiz, internet et web)
   -->
<?php
   include_once("./includes/classes/Categorie.class.php");
   
   // creation des objet
   // boucle 
   
   
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
   $requeteReponse = requeteServeur::requeteMysql($requetePreFais);
   $reponse = new Reponse($requeteReponse);
   
   
    /*$categorie->getIntitule()[1] represente la premiere categorie 1=Internet et Web
                                                                    2= CSS
                                                                    3= XHTML
   */   
       echo '<form action="index.php?p=page2" method="post"> ';  
   echo '<h2> I. ' . $categorie->getIntitule()[1] . '</h2>';
   echo '<ul>';
   
   foreach($question->getId() as $valeur1)
   {
       if($question->getCategorie()[$valeur1] == $categorie->getIntitule()[1])
       {                
           echo '<li>' . $question->getIntitule()[$valeur1] . '</li>';
                       
           foreach($reponse->getId() as $valeur2)
           {
               if($reponse->getCategorie()[$valeur2] == $question->getIntitule()[$valeur1])
               {
                   echo '<input type="radio" id="'.$reponse->getId()[$valeur2].'" name="question'.$question->getId()[$valeur1].'" value="'.$reponse->getId()[$valeur2].'">';
                   echo '<label class="label" for="'.$reponse->getId()[$valeur2].'">'. $reponse->getIntitule()[$valeur2] .'</label>'; 
                   echo "</br>";
               }      
           }
       }            
   }
   echo '</ul>';
   
   if (isset($_POST["envoi"])) 
   {    
       $tabs =array();
       for($i=0;$i< count($question->getId());$i++)
       {
           if (isset($_POST["question".$i])) 
           {   
               array_push($tabs,$_POST["question".$i]);  
                     
           }
           else
           {
               //echo $i."vide";
           }           
       }   
       $_SESSION["question"]=$tabs;
   }     
   
   ?>
<input type="submit" name="envoi" value="Prochaine étape">
</form>
