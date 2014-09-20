<?php
/* TP Finale: Programmation POO
    * Annee 2012/2014
    * Date de remise 18-05-2014
*/

include_once "./classes/Categorie.class.php";
include_once "./classes/Question.class.php";
include_once "./classes/Reponse.class.php";
include_once "./classes/RequeteDB.class.php";

$test = creationQuestionnaire();
//echo "<pre>".print_r($test,true)."</pre>";
//echo "<pre>".print_r($test->getQuestion(),true)."</pre>";

function creationQuestionnaire()
{   

    $question;
    $reponse;
    
    $requeteCategorie = requeteServeur::requeteMysql("SELECT * FROM categorie");
    $categorie = new Categorie($requeteCategorie);
    //echo "<pre>".print_r($categorie,true)."</pre>";
    
    $requeteQuestion = requeteServeur::requeteMysql("SELECT * FROM question");
    //echo "<pre>".print_r($requeteQuestion,true)."</pre>";
    //$question = new Question($requeteQuestion, 3);
    //echo "<pre>".print_r($question,true)."</pre>";
    
    $requeteReponse = requeteServeur::requeteMysql("SELECT * FROM reponse");
    //$reponse = new Reponse($requeteReponse, 17);
    
    /*separer les reponses*/
    for ($i = 1; $i <= $requeteQuestion->num_rows; $i++)
    {
        $reponse[$i] = new Reponse($requeteReponse, $i); 
    }
    
    //echo "<pre>".print_r($reponse[1],true)."</pre>";
    
    
    //echo $requeteCategorie->num_rows;

    /*Va creez les question et leur inserez les reponse approprie*/
    for ($i = 1; $i <= $requeteCategorie->num_rows; $i++)
    {
        $question[$i] = new Question($requeteQuestion, $i);
        /*Utilise un foreach pour sortir la valeur des Id*/
        foreach($question[$i]->getId() as $test )
        {
            //echo $test."</br>";
            $question[$i]->setReponse($test, $reponse[$test]);
        }
     }  
    
    //echo "<pre>".print_r(count($question[2]->getId()),true)."</pre>";

    for($i = 1; $i <= $requeteCategorie->num_rows;  $i++)
    {
        $categorie->setQuestion($i , $question[$i]);
    }
    
    //echo "<pre>".print_r($categorie,true)."</pre>";
    
    /*Zone Test*/
    /*
        echo "QUESTION1<br/>";
        echo "<pre>".print_r($question[1],true)."</pre>"; 
        echo "QUESTION2<br/>";
        echo "<pre>".print_r($question[2],true)."</pre>";
        echo "QUESTION3<br/>";
        echo "<pre>".print_r($question[3],true)."</pre>";
        //selectionner les element creux dans questionnaire
        //echo "<pre>".print_r($question[3]->getReponse()[7],true)."</pre>";
    */
    
    /*retourne objet*/
    return '$categorie';
}

?>