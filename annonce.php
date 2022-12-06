<?php

class annonce
{
    public $bdd;
    public function __construct(){
        $this->bdd = new PDO('mysql:host=localhost;dbname=amac;charset=utf8', 'root', ''); #connexion à la base de donnée
    }

    public function ref($ref){
        $sql = $this->bdd->query("SELECT * FROM structure WHERE offre='$ref' "); 
        return $sql->fetchAll(\PDO::FETCH_ASSOC); #transformation en liste

    }
    public function nouvelle_annonce($titre, $contenu, $media,$s_id) {

        if (empty($titre) or empty($contenu)) { # Si jamais il manque un argument, la fonction ne s'exécute pas
            echo "il manque un argument";
            return;
            //créer un else..
            
        }
        $this->bdd->exec("INSERT INTO annonce(titre, contenu, images_name, s_id) VALUES('$titre', '$contenu', '$media', '$s_id')"); 
    }

    public function lire($user_id = false, $struc_name = false)
    {

        if($struc_name){
            $annonces = $this->bdd->query("SELECT * from structure WHERE offre='$struc_name'"); #recuperation
            $struclist =  $annonces->fetchAll(\PDO::FETCH_ASSOC); #transformation en liste
            foreach($struclist as $k => $v){
                $idcompatible[] = $v["user_id"];
            }
            $list_annonces =[];
            foreach($idcompatible as $id){
                $req = $this->bdd->query("SELECT * from annonce WHERE user_id='$id'"); #recuperation
                $list = $req->fetchAll(\PDO::FETCH_ASSOC); #transformation en liste
                foreach($list as $a => $data){
                    $list_annonces[] = $data;
                }
                
            }
         
            return $list_annonces;

        } else {

            if(!$user_id){
                $annonces = $this->bdd->query('SELECT * from annonce'); #recuperation
                return $annonces->fetchAll(\PDO::FETCH_ASSOC); #transformation en liste
            } else {
                $annonces = $this->bdd->query("SELECT * from annonce WHERE user_id='$user_id'"); #recuperation
                return $annonces->fetchAll(\PDO::FETCH_ASSOC); #transformation en liste
            }
        
        }


    }

    public function getStructNameByAnnonceId($id){

        $sql = $this->bdd->query("SELECT * from structure WHERE id='$id'"); #recuperation
        $s = $sql->fetch(\PDO::FETCH_ASSOC); #transformation en liste
        if(!isset( $s['nom'])){
            return "Nom indefini";
        }
        return $s['nom'];
    }
}




