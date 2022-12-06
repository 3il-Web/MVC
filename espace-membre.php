<?php

$uid = $_SESSION['user']['id'];
$pid = $_SESSION['user']['pseudo'];
$aid = $_SESSION['user']['admin'];

$mysqli=mysqli_connect('localhost','root','','amac');
if(!$mysqli) {
    echo "Erreur connexion BDD";
    exit(0);
}

/*on récupère les infos du membre si on souhaite les afficher dans la page:
$req=mysqli_query($mysqli,"SELECT * FROM structure WHERE id='$uid'");
$info=mysqli_fetch_assoc($req); */

require_once('annonce.php');
require('structure.php');

$struc = new structure();

if(count($struc->list()) <=0){
    $noStruct=true;
}

?>

<h1>Bienvenue <?php echo $pid; ?> !</h1>
<hr width="15%" color="noir"><br>

<?php
if($aid): //si le membre est admin
    ?>
    <a href="<?=$routes_bp['admin/addUser.php']?>" style="text-decoration: none;background-color:blueviolet;color: white;padding:14px 14px;border: none;border-radius: 4px;cursor: pointer;">Ajouter un utilisateur</a><br>
    <a href="<?=$routes_bp['admin/deleteUser.php']?>" style="text-decoration: none;background-color:blueviolet;color: white;padding:14px 14px;border: none;border-radius: 4px;cursor: pointer;">Supprimer un utilisateur</a><br>
    
    <hr width="35%" color="noir"><br>
    <h3>Vous êtes admin, ainsi vous avez donc la possibilité d'assigner à un utlisateur les droits d'une structure afin qu'elle puisse créer des annonces</h3><br>
    <div class="container">
        <form action="">
            <div class="row">
                <div class="col-75">
                    <select name="">
                        <option value="">Structure</option>
                        <?php foreach($struc->list() as $k => $v): ?>
                        <option value="<?= $v['id'] ?>">#<?= $v['id'] ?> | <?= $v['nom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-75">
                    <select name="">
                        <option value="">Utilisateur</option>
                        <?php foreach($struc->users_list() as $k => $v): ?>
                        <option value="<?= $v['id'] ?>">#<?= $v['id'] ?> | <?= $v['pseudo'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div><br>
            <div class="row">
                <input type="submit" value="Confirmer" style="padding: 12px 12px;">
            </div>
        </form>
    </div>
<?php endif;
            
            if(!$aid AND !isset($noStruct)){ //si le membre possède une structure et n'est pas admin
                
                $art = new annonce();
                $annonces = $art->lire($_SESSION['user']['id']);
                
                $annonces = array_reverse($annonces); ?>
                
                <!doctype html>
                <title>Annonces</title>
                
                <main class="cartes" style="margin-bottom:3rem">
                <?php
                foreach($annonces as $k => $v): ?>
                    <article class="carte">
                        <img style="height:200px;object-fit:cover;" src="<?= $v['images_name']?>" alt="...">
                        <div class="text">
                            <h3>Annonce : <?php echo $v['titre']?></h3>
                            <p><?php echo $v['contenu'] ?></p>
                            <p><?php echo $art->getStructNameByAnnonceId($v['s_id']); ?></p>
                            <button>Contacter</button>
                        </div>
                    </article>
                    
                    <?php
                endforeach;?>
                
                </main>
                    
                    <h1>Espace structure</h1>
                    <hr /><br>
                    Pour modifier votre structure, <a href="<?= $routes_bp['espace-membre.php'] ?>?modifierStructure"><b>cliquez ici</b></a>
                    <br>
                    Pour supprimer votre structure, <a href="<?= $routes_bp['espace-membre.php'] ?>?supprimerStructure"><b>cliquez ici</b></a>
                    <br>
                    Pour vous déconnecter, <a href="<?= $routes_bp['deconnexion.php']?>"><b>cliquez ici</b></a>

                    <br><h2>Vos structures :</h2>
                    <div>
                        <table>
                            <tr>
                                <th>Nom </th>
                                <th>E-mail</th>
                            </tr>
                            <?php foreach($struc->list() as $k => $v): ?>
                            <tr>
                                <td><?=$v['nom']?></td>
                                <td><?=$v['mail']?></td>
                            </tr>
                                <?php endforeach; ?>
                        </table><br>
                    </div>
                    
                    <br><hr width="30%" color="noir"><br>
                    <h1>Administration des annonces</h1>
                    <hr /><br>
                    <a href="<?= $routes_bp['createAnnonce.php']?>" style="text-decoration: none;background-color:blueviolet;color: white;padding:14px 14px;border: none;border-radius: 4px;cursor: pointer;">Créer une annonce</a>
                    <br>
                    
                    <?php
                    //si "?supprimer" est dans l'URL:
                    if(isset($_GET['supprimerStructure'])){ 
                        //on supprime le membre avec "DELETE"
                        if(mysqli_query($mysqli,"DELETE FROM structure WHERE pseudo='$uid'")){
                            echo "Votre structure vient d'être supprimée définitivement.";
                            session_destroy();
                            header('Location: '.$routes_bp['index_page.php']);
                        } else {
                            echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                        }
                    }
                        //si "?modifier" est dans l'URL:
                            if(isset($_GET['modifierStructure'])){
                                ?>
                                <br><br>
                                <h1>Modification de la structure</h1>
                                <p><b><a href="<?= $routes_bp['espace-membre.php'] ?>?modifierStructure=mail">Modifier mon adresse mail</a></b><br>
                    
                                <?php
                                if($_GET['modifierStructure']=="mail"){
                                    if(isset($_POST['valider'])){
                                        if(!isset($_POST['mail'])){
                                            echo "Le champ mail n'est pas reconnu.";
                                        } else {
                                            if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i",$_POST['mail'])){
                                                // 
                                                echo "L'adresse mail est incorrecte.";
                                                //normalement l'input type="email" vérifie que l'adresse mail soit correcte avant d'envoyer le formulaire mais il faut toujours être prudent et vérifier côté serveur (ici) avant de valider définitivement
                                            } else {
                                                //tout est OK, on met à jour son compte dans la base de données:
                                                if(mysqli_query($mysqli,"UPDATE structure SET mail='".htmlentities($_POST['mail'],ENT_QUOTES,"UTF-8")."' WHERE id='$uid'")){
                                                    echo "Adresse mail {$_POST['mail']} modifiée avec succès!";
                                                    $traitementFini=true;//pour cacher le formulaire
                                                } else {
                                                    echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";

                                                }
                                            }
                                        }
                                    }
                                    if(!isset($traitementFini)){
                                        ?>
                                        <br><p>Renseignez le formulaire ci-dessous pour modifier vos informations:</p>
                                        <div class="container">
                                            <form method="post" action="<?= $routes_bp["espace-membre.php"] ?>?modifierStructure=mail">
                                                <div class="row">
                                                    <div class="col-75">
                                                        <input type="email" name="mail" value="<?php echo $info['mail']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <input type="submit" name="valider" value="Confirmer" style="padding: 12px 12px;">
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                                    }
                                } 
                            } 
            } elseif($aid) { //if admin
                
                ?><br><h1>Espace Membre</h1><br>
                    <hr width="20%" color="noir"><br>
                    Pour modifier vos informations, <a href="<?= $routes_bp['espace-membre.php'] ?>?modifierMembre"><b>cliquez ici</b></a>
                    <br>
                    Pour supprimer votre compte, <a href="<?= $routes_bp['espace-membre.php'] ?>?supprimerMembre"><b>cliquez ici</b></a>
                    <br>
                    Pour vous déconnecter, <a href="<?= $routes_bp['deconnexion.php']?>"><b>cliquez ici</b></a>
                
                    <?php
                    //si "?supprimer" est dans l'URL:
                        if(isset($_GET['supprimerMembre'])){ 
                                //on supprime le membre avec "DELETE"
                                if(mysqli_query($mysqli,"DELETE FROM membres WHERE pseudo='$pid'")){
                                    echo "Votre compte vient d'être supprimé définitivement.";
                                    session_destroy();
                                    header('Location: '.$routes_bp['index_page.php']);
                                } else {
                                    echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                                }
                        }
                        //si "?modifier" est dans l'URL:
                            if(isset($_GET['modifierMembre'])){
                                ?>
                                <br><br>
                                <h1>Modification du compte</h1>
                                <p><b><a href="<?= $routes_bp['espace-membre.php'] ?>?modifierMembre=mail">Modifier mon adresse mail</a></b><br>
                    
                                <?php
                                if($_GET['modifierMembre']=="mail"){
                                    if(isset($_POST['valider'])){
                                        if(!isset($_POST['mail'])){
                                            echo "Le champ mail n'est pas reconnu.";
                                        } else {
                                            if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i",$_POST['mail'])){
                                                // 
                                                echo "L'adresse mail est incorrecte.";
                                                //normalement l'input type="email" vérifie que l'adresse mail soit correcte avant d'envoyer le formulaire mais il faut toujours être prudent et vérifier côté serveur (ici) avant de valider définitivement
                                            } else {
                                                //tout est OK, on met à jour son compte dans la base de données:
                                                if(mysqli_query($mysqli,"UPDATE membres SET mail='".htmlentities($_POST['mail'],ENT_QUOTES,"UTF-8")."' WHERE pseudo='$pid'")){
                                                    echo "Votre nouvelle adresse mail : {$_POST['mail']} est bien active ! ";
                                                    $traitementFini=true;//pour cacher le formulaire
                                                } else {
                                                    echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                                                }
                                            }
                                        }
                                    }
                                    if(!isset($traitementFini)){
                                        ?>
                                        <br>
                                        <div class="container">
                                        <p>Renseignez le formulaire ci-dessous pour modifier votre mail:</p>
                                            <form method="post" action="<?= $routes_bp['espace-membre.php'] ?>?modifierMembre=mail">
                                                <div class="row">
                                                    <div class="col-75">
                                                        <input type="email" name="mail" placeholder="Nouveau mail.." required>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div>
                                                        <input type="submit" name="valider" value="Confirmer" style="padding: 14px 14px;">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                                    }
                                } 
                            }

                        } elseif(!$aid) {
                if(isset($_POST['valider'])){
                    if(!isset($_POST['nom'],$_POST['mail'],$_POST['tel'],$_POST['ville'])){
                        echo "Un des champs n'est pas reconnu.";
                    } else {
                        if(!preg_match("#^[a-z0-9]{1,15}$#",$_POST['nom'])){
                            echo "Le nom est incorrect, doit contenir seulement des lettres minuscules et/ou des chiffres, d'une longueur minimum de 1 caractère et de 15 maximum.";
                        } else {
                            if(strlen($_POST['mail'])<7 or strlen($_POST['mail'])>50){
                                echo "Le mail doit être d'une longueur minimum de 7 caractères et de 50 maximum.";
                            } else {
                                $mysqli=mysqli_connect('localhost','root','','amac');
                                if(!$mysqli) {
                                    echo "Erreur connexion BDD";
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
</html>

    <?php  } 
            } elseif($aid){ ?>

                <br><h2>Toutes les structures :</h2>
                <div>
                    <table>
                        <tr>
                            <th>Nom </th>
                            <th>E-mail</th>
                        </tr>
                        <?php foreach($struc->list() as $k => $v): ?>
                        <tr>
                            <td><?=$v['nom']?></td>
                            <td><?=$v['mail']?></td>
                        </tr>
                            <?php endforeach; ?>
                    </table><br>
                </div>


            
        <?php } ?>
                                
                                