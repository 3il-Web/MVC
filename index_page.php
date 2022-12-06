
        <?php include('RubriqueMenu.php')?><br>
        <div class="binfo">
            <h1>Vous êtes artiste, auteur, ou une association culturelle</h1><br>
            <h3>Pour apparaître dans notre base de données d'artistes, inscrivez-vous ici</h3>
            <a class="btn-register" href="<?= $routes_bp['inscription.php'] ?>">S'inscrire</a>
        </div>

                

<?php
require_once('annonce.php');
$art = new annonce();
if(isset($_GET['user_id'])){
$uid = htmlspecialchars(addslashes($_GET['user_id']));
$annonces = $art->lire($uid);

} else {
$annonces = $art->lire();

}
$annonces = array_reverse($annonces);

?>
<h1 style="margin-top:5rem;margin-bottom:4rem;border-bottom:solid black;"><b>Les dernières annonces pour vous</b></h1>
<main class="cartes" style="display:flex">
    <?php
        foreach($annonces as $k => $v):
            if($k>=3) { break; }
    ?>
    <article class="carte">
        <img src="img/img-annonce.jpg" alt="Sample photo">
        <div class="text">
                <h3>Annonce : <?php echo $v['titre']?></h3>
                <p><?php echo $v['contenu'] ?></p>
                <button>Contacter</button>
        </div>
    </article>
    <?php
    endforeach;
    ?>
    
</main>
