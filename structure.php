<?php

class structure
{
    public $bdd;
    public function __construct(){
        $this->bdd = new PDO('mysql:host=localhost;dbname=AMAC;charset=utf8', 'root', ''); #connexion à la base de donnée
    }

    public function users_list()
    {
            $annonces = $this->bdd->query("SELECT * from membres"); #recuperation

            return $annonces->fetchAll(\PDO::FETCH_ASSOC); #transformation en liste
    }
   
    public function list()
    {
            $uid = $_SESSION['user']['id'];
            if($_SESSION['user']['admin']){
                $annonces = $this->bdd->query("SELECT * from structure "); #recuperation

            } else {
            $annonces = $this->bdd->query("SELECT * from structure WHERE user_id='$uid'"); #recuperation

            }
            return $annonces->fetchAll(\PDO::FETCH_ASSOC); #transformation en liste
    }
}

?>