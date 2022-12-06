<!-- Barre de recherche -->

<form method="post">
    <div class="topnav">
        <div class="search-container">
            <input type="text" name="search" id="search" placeholder="Recherche offres, villes">
            <button type="submit" name="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>

<!-- Reponse barre de recherche -->

<?php
if (isset($_POST["submit"])) {
    $str = $_POST["search"];

    // Filtre en fonction de la ville et la catégorie de l'offre
    $sth = $pdo->prepare("SELECT * FROM structure WHERE ville='$str' OR offre='$str'");

    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
    $sql = "SELECT * FROM structure WHERE ville='$str' OR offre='$str'";

        include('annonceDetail.php');
        require_once('annonce.php');
        $an = new annonce();
    if ($row = $sth->fetch()) {
    
        $annonces = $an->lire(false, $str);
?>

        <main class="cartes">
            <?php
            foreach ($annonces as $k => $v) :
            ?>
                <article class="carte">
                    <img width="100%" height="50" src="<?= $v['images_name'] ?>" alt="...">
                    <div class="text">
                        <h3>Annonce : <?php echo $v['titre'] ?></h3>
                        <p><?php echo $v['contenu'] ?></p>
                        <p><?php echo $an->getStructNameByAnnonceId($v['s_id']); ?></p>
                        <button>Contacter</button>
                    </div>
                </article>

            <?php
            endforeach; ?>


        </main>


<?php
    } else {
        echo "<br>Pas de résultat pour : " . $str;
    }
}

//Rajouter le niveau 
?>