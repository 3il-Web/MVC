<!DOCTYPE HTML>
<html>
    <head>
        <title>Ajouter une structure</title>
        <meta charset="utf-8" />

    </head>
    <body>
        <?php
        //si le formulaire est envoyé ("envoyé" signifie que le bouton submit est cliqué)
        if(isset($_POST['valider'])){
            //vérifie si tous les champs sont bien pris en compte:
            //on peut combiner isset() pour valider plusieurs champs à la fois
            if(!isset($_POST['nom'],$_POST['mdp'],$_POST['mail'],$_POST['tel'],$_POST['ville'])){
                echo "Un des champs n'est pas reconnu.";
            } else {
                //on vérifie le contenu de tous les champs, savoir si ils sont correctement remplis avec les types de valeurs qu'on souhaitent qu'ils aient
                if(!preg_match("#^[a-z0-9]{1,15}$#",$_POST['nom'])){
                    //la preg_match définie: ^ et $ pour dire commence et termine par notre masque;
                    //notre masque défini a-z pour toutes les lettres en minuscules et 0-9 pour tous les chiffres;
                    //d'une longueur de 1 min et 15 max
                    echo "Le nom est incorrect, doit contenir seulement des lettres minuscules et/ou des chiffres, d'une longueur minimum de 1 caractère et de 15 maximum.";
                    //Il est préférable que le pseudo soit en lettres minuscules ceci afin d'être unique, par exemple si le choix peut être avec majuscule, deux structures pourraient avoir le même pseudo, par exemple Admin et admin et ce n'est pas ce que l'on veut.
                } else {
                    //on vérifie le mot de passe:
                    if(strlen($_POST['mdp'])<5 or strlen($_POST['mdp'])>15){
                        echo "Le mot de passe doit être d'une longueur minimum de 5 caractères et de 15 maximum.";
                    } else {
                        //on vérifie que l'adresse est correcte:
                        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i",$_POST['mail'])){
                            echo "L'adresse mail est incorrecte.";
                            //normalement l'input type="email" vérifie que l'adresse mail soit correcte avant d'envoyer le formulaire mais il faut toujours être prudent et vérifier côté serveur (ici) avant de valider définitivement
                        } else {
                            if(strlen($_POST['mail'])<7 or strlen($_POST['mail'])>50){
                                echo "Le mail doit être d'une longueur minimum de 7 caractères et de 50 maximum.";
                            } else {
                                //tout est précisés correctement, on inscrit la structure dans la base de données si le pseudo n'est pas déjà utilisé par un autre utilisateur
                                //d'abord il faut créer une connexion à la base de données dans laquelle on souhaite l'insérer:
                                $mysqli=mysqli_connect('localhost','root','','AMAC');
                                if(!$mysqli) {
                                    echo "Erreur connexion BDD";
                                    //Dans ce script, je pars du principe que les erreurs ne sont pas affichées sur le site, vous pouvez donc voir qu'elle erreur est survenue avec mysqli_error(), pour cela décommentez la ligne suivante:
                                    //echo "<br>Erreur retournée: ".mysqli_error($mysqli);
                                } else {
                                    $nom=htmlentities($_POST['nom'],ENT_QUOTES,"UTF-8");
                                    $tel=htmlentities($_POST['tel'],ENT_QUOTES,"UTF-8");
                                    $ville=htmlentities($_POST['ville'],ENT_QUOTES,"UTF-8");
                                    $cp=htmlentities($_POST['codePostal'],ENT_QUOTES,"UTF-8");
                                    $mail=htmlentities($_POST['mail'],ENT_QUOTES,"UTF-8");
                                    $user_id = $_SESSION['user']['id'];
                                    if(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM structure WHERE nom='$nom'"))!=0)
                                    {//si mysqli_num_rows retourne pas 0
                                        echo "Ce nom est déjà utilisé par une autre structure, veuillez en choisir un autre.";
                                    } else {
                                        //insertion du membre dans la base de données:
                                        if(mysqli_query($mysqli,"INSERT into `structure` (nom, tel, ville, user_id, mail, codePostal) VALUES ('$nom', '$tel', '$ville', '$user_id', '$mail', '$cp')")){ ?>
                                            <h1>La structure a été créée avec succès !</h1>
                                            <h3>Votre inscription a bien été validée</h3><br>
                                            <a href="<?=$routes_bp['index_page.php']?>" style="text-decoration: none;background-color:blueviolet;color: white;padding:14px 14px;border: none;border-radius: 4px;cursor: pointer;">Retour accueil</a>
                                            <?php
                                            $traitementFini=true;//pour cacher le formulaire
                                        } else {
                                            echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                                        }
                                    }
                                }
                            }                       
                        }
                    }
                }
            }
        }
            
        if(!isset($traitementFini)){//quand le membre sera inscrit, on définira cette variable afin de cacher le formulaire ?>                
            <br>
            <div class="container">
                <h3>Vous souhaitez déposer une annonce ? Remplissez le formulaire ci-dessous pour ajouter une <u>nouvelle structure</u> :</h3><br>
                <form method="post" >
                    <div class="row">
                        <div class="col-75">
                            <input type="email" name="mail" placeholder="E-mail.." required><!--permet d'empêcher l'envoi du formulaire si le champ est vide-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-75">
                            <input type="text" name="nom" placeholder="Nom structure.." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-75">
                            <input type="tel" name="tel" placeholder="Téléphone.." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-75">
                            <input type="text" name="ville" placeholder="Ville.."required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-75">
                            <input type="text" name="codePostal" placeholder="Code Postal.."required>
                        </div>
                    </div><br>
                    <div class="row">
                        <input type="submit" name="valider "value="Valider" style="padding: 12px 12px;"> <?= @$error ?>
                    </div>
                    </form><br>
            </div>
    </body>
</html>
<?php } ?>