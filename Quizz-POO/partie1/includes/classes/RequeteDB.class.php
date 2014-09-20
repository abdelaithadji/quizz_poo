<?php
   /* Autor: Abdellah Ait hadji
    * Quizz:  en POO
    * Date de remise 18-05-2014
    * Page Classe pour requettes 
*/
include_once "./connexionObjet.inc.php";
/*classe utilitaire pour aller cherchez des informations dans une base de donnee*/
class requeteServeur
{ 
    /*Requete vers une base de donne Mysql*/
    static function requeteMysql($req)
    {  
        $id= connexionObjet("questionnaire","dbconnect");
        $id->query("SET NAMES UTF8");
        $resultat = $id->query($req);
        
        if(!$resultat)
        {
            //echo "PROBLEME!!!!";
            return "erreur";
        }
        else
        { 
            //echo "OK!!!";
            return $resultat;
        }	    
    } 
}


//echo "<pre>".print_r($test,true)."</pre>";
/*
$req = "SELECT titre_categorie, titre_question, titre_reponse, bonne_reponse
            FROM categorie, question, reponse
            WHERE (categorie_reponse = id_question)AND(categorie_question = id_categorie)";
$test = requeteServeur::requeteMysql($req);
setTitre($test);
echo "<pre>".print_r($test,true)."</pre>";
function setTitre($resultat ="erreur")
{
    $temp;
    if ($resultat == "erreur")
    {
        return "mauvaise requete";
    }
    else
    {
        $compteur = 1;
        
        foreach($resultat as $ligne)
        {
            echo $compteur."<br/>";
            $compteur++;
            foreach($ligne as $valeur)
            {  
                $temp[$compteur] = htmlspecialchars($valeur);
                echo $temp[$compteur]."<br/>";   
            }
            //echo "<br/>";
        }
    }       
    return $temp; 
}
*/
/*
$req = "SELECT titre_categorie, titre_question, titre_reponse, bonne_reponse
            FROM categorie, question, reponse
            WHERE (categorie_reponse = id_question)AND(categorie_question = id_categorie)";
*/

?>	