<?php
   /* TP Finale: Programmation POO
    * Annee 2012/2014
    * Date de remise 18-05-2014
    * Page Classe categorie 
   */
   
   include_once "Institue.class.php";
   
   class Categorie extends Institue
   {
      /*constructeur de la classe categorie*/
   public function __construct($r)
      {
    $this->setVariable($r);
   }
   
      /*Methode qui change le titre de la categorie*/
   public function setIntitule($position, $intitule)
      {
          $this->intitule[$position] = $intitule;
   }
      
      /*Methode qui retourne la variable titre de la categorie*/
   public function getIntitule()
      {
    return $this->intitule;
   }
      
      public function setId($p, $v)
      {
          $this->id[$p] = $v ;
      }
      
      public function getId()
      {
          return $this->id;
      }
   
      
      public function setVariable($resultat)
      {
                  
          if ($resultat == "erreur")
          {
              return "mauvaise requete";
          }
          else
          {
              foreach ($resultat as $ligne)
              {   
                  $this->setId(htmlspecialchars($ligne["id_categorie"]),htmlspecialchars($ligne["id_categorie"]));
                  $this->setIntitule(htmlspecialchars($ligne["id_categorie"]), htmlspecialchars($ligne["titre_categorie"]));
                  //echo "<pre>".print_r($ligne,true)."</pre>";
              }
          }       
          return $this;
      }
   }
   ?>
