    
    <h1>Catégorie : Pratique</h1>

    <br><br><br><br>

    <!-- Affichage searchbar avec son resultat -->
    <?php
    include('connect.php');
    require_once('annonce.php');

    include('searchBar.php')
    ?>

    <br>
    <hr width="50%" color="noir"><br><br>

    <!-- Affichage de toutes les annonces -->

    <h2><b>Voici les dernières annonces que proposent les différentes structures</b></h2>

    <?php

    $art = new annonce();
    $structAvecPratique = $art->ref('Pratique');
    $data = $art->lire(false, 'Pratique');
    ?>

    <main class="cartes">
        <?php
        foreach ($data as $k => $v) :
        ?>
            <article class="carte">
                <img width="100%"  style="max-width:100px" height="50px" src="<?= $v['images_name'] ?>" alt="...">
                <div class="text">
                    <h3>Annonce : <?php echo $v['titre'] ?></h3>
                    <p><?php echo $v['contenu'] ?></p>
                    <p><?php echo $art->getStructNameByAnnonceId($v['s_id']); ?></p>
                    <button>En savoir plus</button>
                </div>
            </article>

        <?php
        endforeach; ?>
    </main>