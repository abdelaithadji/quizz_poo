<?php
 /* TP Finale: Programmation POO
    * Annee 2012/2014
    * Date de remise 18-05-2014
    * Page Classe reponse 
    */

include_once "Institue.class.php";

class Reponse extends Institue
{   
    private $bonneReponse;
    private $categorie;
    
    public function __construct($resultat)
    {
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
    
    public function setBonneReponse($cle, $valeur)
    {
        $this->bonneReponse[$cle] = $valeur;
    }
    
    public function getBonneReponse()
    {
        return $this->bonneReponse;
    }
    
    public function setCategorie($cle, $valeur)
    {
        $this->categorie[$cle] = $valeur ;  
    }
    
    public function getCategorie()
    {
        return $this->categorie;
    }
    
    
    //public function setVariable($resultat, $donneVoulu)
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
                //echo $donneVoulu;
                
                //if($donneVoulu == $ligne["categorie_reponse"])
                //{
                    
                    $this->setId(htmlspecialchars($ligne["id_reponse"]),htmlspecialchars($ligne["id_reponse"]));
                    $this->setIntitule(htmlspecialchars($ligne["id_reponse"]), htmlspecialchars($ligne["titre_reponse"]));
                    $this->setBonneReponse(htmlspecialchars($ligne["id_reponse"]), htmlspecialchars($ligne["bonne_reponse"]));
                    $this->setCategorie(htmlspecialchars($ligne["id_reponse"]), htmlspecialchars($ligne["categorie_reponse"]));
                //}
                
                //echo "<pre>".print_r($ligne,true)."</pre>";
            }
        }       
        return $this;
    }
    
}

//$reponse = new Reponse();
?>