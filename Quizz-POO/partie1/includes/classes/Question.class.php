<?php
 /* TP Finale: Programmation POO
    * Annee 2012/2014
    * Date de remise 18-05-2014
    * Page Classe question 
*/

include_once "Institue.class.php";
    
class Question extends Institue
{    
    private $categorie;
    
    public function __construct($resultat){
        //$this->setVariable($resultat, $cVoulu);
        $this->setVariable($resultat);
    }
    
    public function setIntitule($cle, $valeur)
    {
        $this->intitule[$cle] = $valeur;
    }
    
    public function getIntitule()
    {
        return $this->intitule;
    }
    
    public function setId($cle, $valeur)
    {
        $this->id[$cle] = $valeur ;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setCategorie($cle, $valeur)
    {
        $this->categorie[$cle] = $valeur ;  
    }
    
    public function getCategorie()
    {
        return $this->categorie;
    }
    //public function setVariable($resultat, $cVoulu)
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
                //if($cVoulu == $ligne["categorie_question"])
                //{
                    $this->setId(htmlspecialchars($ligne["id_question"]),htmlspecialchars($ligne["id_question"]));
                    $this->setIntitule(htmlspecialchars($ligne["id_question"]), htmlspecialchars($ligne["titre_question"]));
                    $this->setCategorie(htmlspecialchars($ligne["id_question"]), htmlspecialchars($ligne["categorie_question"]));
                //}    
            }
        }       
        return $this;
    }  
}
?>