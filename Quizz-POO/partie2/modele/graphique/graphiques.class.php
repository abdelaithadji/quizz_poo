<!--
  /* Autor: Abdellah Ait hadji
   * Quizz:  en POO
   * Date de modif 22-06-2014
  -->
<?php
class BD {

    private static $instance = null;
    private $idbd;
    

    private function __construct($base, $param) {
        require_once(BASE."/conf/".$param.".inc.php");
        $this->idbd = new mysqli(HOST,USER,PASS,$base);
        if (!$this->idbd) {
            throw new Exception("Connexion Impossible à la base de données : ".HOST);
        }
    }
    
    public static function getInstance($base, $param) {
        if(is_null(self::$instance)) {
            self::$instance = new BD($base, $param);
        }
        return self::$instance;
    }

    public function getBD(){
        return $this->idbd;
    }

    public function get_reponse_repondu() {

        $mecategorie = ['Internet et web','CSS','XHTML'];

        for($i=0;$i<3;$i++){
       
            $req1 = $this->getBD()->query("SELECT reponse_repondu FROM question
                                            WHERE categorie_question ='Internet et web'");
            
            $req2 = $this->getBD()->query("SELECT reponse_repondu FROM question
                                            WHERE categorie_question ='CSS'");
           
            $req3 = $this->getBD()->query("SELECT reponse_repondu FROM question
                                            WHERE categorie_question ='XHTML'");

            /*###############################################################*/
            $req5 = $this->getBD()->query("SELECT total_repondu FROM question
                                            WHERE categorie_question ='Internet et web'");
            
            $req6 = $this->getBD()->query("SELECT total_repondu FROM question
                                            WHERE categorie_question ='CSS'");
           
            $req7 = $this->getBD()->query("SELECT total_repondu FROM question
                                            WHERE categorie_question ='XHTML'");

           // Partie qui selectionne les tables reponse

            $req4 = $this->getBD()->query("SELECT titre_categorie FROM categorie");
            if(!$req1 && !$req2 && !$req3 && !$req4 && !$req5 && !$req6 && !$req7) {
                
                throw new Exception("Connexion Impossible au serveur : ".HOST);

            }else {

                    while ($reponses1 = $req1->fetch_all(PDO::FETCH_ASSOC)) {
                        $reponses[0] = $reponses1;
                    }
                    while ($reponses2 = $req2->fetch_all(PDO::FETCH_ASSOC)) {
                        $reponses[1] = $reponses2;
                    }
                    while ($reponses3 = $req3->fetch_all(PDO::FETCH_ASSOC)) {
                        $reponses[2] = $reponses3;
                    }
                    while ($reponses4 = $req4->fetch_all(PDO::FETCH_ASSOC)) {
                       // $reponses[3] = $reponses4;
                    }
                    while ($reponses5 = $req5->fetch_all(PDO::FETCH_ASSOC)) {
                       // $reponses[4] = $reponses5;
                    }
                    while ($reponses6 = $req6->fetch_all(PDO::FETCH_ASSOC)) {
                       // $reponses[5] = $reponses6;
                    }
                    
                     return $reponses; 
                    
                }

        }
        
    }

     public function get_total_repondu() {

        for($i=0;$i<3;$i++){
       
            
            $req5 = $this->getBD()->query("SELECT total_repondu FROM question
                                            WHERE categorie_question ='Internet et web'");
            
            $req6 = $this->getBD()->query("SELECT total_repondu FROM question
                                            WHERE categorie_question ='CSS'");
           
            $req7 = $this->getBD()->query("SELECT total_repondu FROM question
                                            WHERE categorie_question ='XHTML'");

            if(!$req5 && !$req6 && !$req7) {
                
                throw new Exception("Connexion Impossible au serveur : ".HOST);

            }else {

                    while ($reponses5 = $req5->fetch_all(PDO::FETCH_ASSOC)) {
                       $totalRepondu[0] = $reponses5;
                    }
                    while ($reponses6 = $req6->fetch_all(PDO::FETCH_ASSOC)) {
                       $totalRepondu[1] = $reponses6;
                    }
                    while ($reponses7 = $req7->fetch_all(PDO::FETCH_ASSOC)) {
                       $totalRepondu[2] = $reponses7;
                    }
                    
                     return $totalRepondu; 
                    
                }

        }
        
    }




}
?>
