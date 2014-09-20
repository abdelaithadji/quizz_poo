<?php
   session_start();
   
   if (isset($_SESSION["question"]))
   {
       //print_r($_SESSION["question"]);
       $tabs = array();
       $tabs = $_SESSION["question"]; 
   }
   else
   {
       $tabs = array();
       //echo ":(";
   }
   ?>
<!--
   /* Autor: Abdellah Ait hadji
    * Quizz:  en POO
    * Date de remise 18-05-2014
    * Page numero 3 (question du quiz, XHTML)
   -->

   <?php
      include_once("./includes/classes/Categorie.class.php");
      
      /******************************************************************/
      
      
      /*
      autheur: Alexandre Lacerte
      Projet: Travaille pratique 2
      */
      
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
      
      
       /*$categorie->getIntitule()[1] represente la premiere categorie 1=Internet et Web
                                                                       2= CSS
                                                                       3= XHTML
      */      
      echo '<h2> III. ' . $categorie->getIntitule()[3] . '</h2>';
      echo '<ul>';
      echo '<form action="index.php?p=evaluation" method="post">';
      foreach($question->getId() as $valeur1)
      {
          if($question->getCategorie()[$valeur1] == $categorie->getIntitule()[3])
          {                
              echo '<li>' . $question->getIntitule()[$valeur1] . '</li>';
                          
              foreach($reponse->getId() as $valeur2)
              {
                  if($reponse->getCategorie()[$valeur2] == $question->getIntitule()[$valeur1])
                  {
                      echo '<input type="radio" id="'.$reponse->getId()[$valeur2].'" name="question'.$question->getId()[$valeur1].'" value="'.$reponse->getId()[$valeur2].'">';
                      echo '<label for="'.$reponse->getId()[$valeur2].'">'. $reponse->getIntitule()[$valeur2] .'</label>'; 
                      echo "</br>";
                  }      
              }
          }            
      }
      echo '</ul>';
       
      if (isset($_POST["envoi"])) 
      {   
          
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
