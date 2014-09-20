<?php

function connexionObjet($base,$param){

	require_once($param.".inc.php");

	$id= new mysqli(HOST,USER,PASS,"mettre_ici_bdd");

	   if(!$id){
	     echo "<script type=text/javascript>"
	     ."alert('connexion a la base de donnee est impossible')"
	     ."</script>";
	   }else {

	   return $id;

       }

}
	   

?>