<?php
  /* Autor: Abdellah Ait hadji
   * Quizz:  en POO
   * Date de remise 18-05-2014
   * Page Classe intitule
*/
abstract class Institue
{
    private $intitule;
    private $id;
    
    abstract public function setIntitule($position, $valeur);
    abstract public function getIntitule();
    
    abstract public function setId($position, $valeur);
    abstract public function getId();
}

?>