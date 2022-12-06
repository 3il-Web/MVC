<!DOCTYPE HTML>
<html>
    <head>
        <title>Enseignement</title>
        <meta charset="utf-8" />

    </head>
<body>

<h1 style="color:black">Catégorie : Enseignement</h1><br>
<h3>Cliquez sur les instruments que vous souhaitez découvrir :</h3> </br>

<?php              
                     
    include ('connect.php');
    $sql="SELECT * FROM instrument";
    $result = $pdo->query($sql);
                
    for($i=0; $i<$result->rowCount(); $i++){                       
                    
        /* Les differents instruments */
        if ($result->rowCount()>0){                 
            while ($row = $result->fetch()){ ?>
                <button class="btn-instru"> <?php
                echo $row["Nom"] ."<br>"; ?>
                </button> 
                <?php
            }
                            
        }            
    }
                
    /* Exception si pas d'instrument */
    if($result->rowCount()<0){
        echo "<br>Pas d'instrument :"."<br>";
    }  

    if(isset($_POST['valider'])){
        if(!isset($_POST['nom'])){
            echo "Un des champs n'est pas reconnu.";
        } else {
            $mysqli=mysqli_connect('localhost','root','','amac');
            $instru=htmlentities($_POST['nom'],ENT_QUOTES,"UTF-8");
            if(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM instrument WHERE nom='$instru'"))!=0) {
                echo "Cet instrument a déjà renseigné par une autre structure. Pour voir les structure proposant une offre avec cet instrument, cliquez dessus.";
            } else {
                $requete = "INSERT INTO `instrument` (nom) VALUES ('$instru')";
                $resultat = $pdo->query($requete);
                if ($resultat) {
                    echo "<p>L'instrument a été ajouté</p>";
                } else {
                    echo "<p>Erreur</p>";
                }
                
            }            
        }
    } ?>

    <div class="container">
        <h3>Ajouter un instrument :</h3><br>
        <form method="post" >
            <div class="row">
                <div class="col-75">
                    <input type="text" name="nom" placeholder="Votre instrument.." required>
                </div>
            </div><br>
            <div class="row">
                <input type="submit" name="valider" value="Enregistrer" style="padding: 14px 14px;"> <?= @$error ?>
            </div>
        </form>
    </div><br>

    </body>
    </html>
