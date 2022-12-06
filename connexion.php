
<?php include('connect.php');
//si une session est déjà "isset" avec ce visiteur, on l'informe:
    if (isset($_SESSION['user'])) {
        ?>
        <h1>Bienvenue sur votre espace !</h1>Vous êtes déjà connecté, vous pouvez accéder à l'espace membre en <a href="<?=$routes_bp['espace-membre.php']?>">cliquant ici</a><br><br><a href="<?=$routes_bp['index_page.php']?>">Retour accueil</a>
        <?php
    } else {
        //si le formulaire est envoyé ("envoyé" signifie que le bouton submit est cliqué)
        if (isset($_POST['valider'])) {
            //vérifie si tous les champs sont bien pris en compte:
                if (!isset($_POST['pseudo'], $_POST['mdp'])) {
                    echo "Un des champs n'est pas reconnu.";
                } else {
                    //tous les champs sont précisés, on regarde si le membre est inscrit dans la bdd:
                    //d'abord il faut créer une connexion à la base de données dans laquelle on souhaite regarder:
                    $mysqli = mysqli_connect('localhost', 'root', '', 'amac');
                    if (!$mysqli) {
                        echo "Erreur connexion BDD";
                    } else {
                        //on défini nos variables:
                        $pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "UTF-8"); //htmlentities avec ENT_QUOTES permet de sécuriser la requête pour éviter les injections SQL, UTF-8 pour dire de convertir en ce format
                        $mdp = sha1($_POST['mdp']);
                        $stmt = $pdo->query("SELECT * FROM membres WHERE pseudo='$pseudo' and mdp='$mdp' ");
                        
                        $error="Compte incorrect";
                        foreach ($stmt->fetchAll() as $k => $v) {
                            $isBeenLog = true;
                            $_SESSION['user'] = $v;
                            $traitementFini = true;
                            $error="Compte ok.";
                            
                        } 
                        
                        if(isset($traitementFini)){
                            ?>
                            
                            <h1>Bienvenue <?= $pseudo ?> !</h1><hr width="10%" color="noir"> <br>
                            <h3>Vous êtes connecté !</h3>
                            
                            <?php if($_SESSION['user']['admin']){ ?>
                                <h3><b>Vous êtes admin,</b> vous pouvez accéder à votre espace admin en <a href='espace-membre.php'>cliquant ici</a></h3><br><br>
                                <a href="<?=$routes_bp['index_page.php']?>" style="text-decoration: none; background-color:blueviolet;color: white;padding:14px 14px;border: none;border-radius: 4px;cursor: pointer;">Retour accueil</a>
                                <?php } else { ?>
                                <h3>Vous pouvez accéder à l'espace membre en <a href="<?=$routes_bp['espace-membre.php']?>">cliquant ici</a></h3><br>
                                <a href="<?=$routes_bp['index_page.php']?>" style="text-decoration: none; background-color:blueviolet;color: white;padding:14px 14px;border: none;border-radius: 4px;cursor: pointer;">Retour accueil </a>
                                    <?php }
                                    
                                }
                            }
                        }
                    }
                    if (!isset($traitementFini)) { //quand le membre sera connecté, on définira cette variable afin de cacher le formulaire
                        ?>
                        <h1>Se connecter [ <a href="<?=$routes_bp['inscription.php']?>">Créer un compte</a> ]</h1><br>
                        <h3>Remplissez le formulaire ci-dessous pour vous connecter :</h3><br>
                        <div class="container">
                            <form method="post" >
                                <div class="row">
                                    <div class="col-75">
                                        <input type="text" name="pseudo" placeholder="Votre pseudo.." required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-75">
                                        <input type="password" name="mdp" placeholder="Votre mot de passe..." required>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <input type="submit" name="valider" value="Connexion" style="padding: 12px 12px;"> <?= @$error ?>
                                </div>
                            </form>
                        </div>
                            <br>
                            <a href="<?=$routes_bp['index_page.php']?>"></a>
                    <?php
                        }
                    }
                    ?>