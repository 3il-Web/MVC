
<head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


    <h1>Catégorie : Eveil</h1>

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
    $saveceveil = $art->ref('Eveil');
    $xa = $art->lire(false, 'Eveil');
    ?>

    <main class="cartes">
        <?php
        foreach ($xa as $k => $v) :
        ?>
            <article class="carte">
                <img width="100%"  style="max-width:100px" height="50px" src="<?= $v['images_name'] ?>" alt="...">
                <div class="text">
                    <h3>Annonce : <?php echo $v['titre'] ?></h3>
                    <p><?php echo $v['contenu'] ?></p>
                    <p><?php echo $art->getStructNameByAnnonceId($v['s_id']); ?></p>
                    <button>Contacter</button>
                </div>
            </article>

        <?php
        endforeach; ?>
    </main>



    
<script src="app.js"></script>
