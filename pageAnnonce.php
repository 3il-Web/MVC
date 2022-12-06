<?php

require_once('annonce.php');
require('structure.php');

$art = new annonce();
if(isset($_GET['user_id'])){
    $uid = htmlspecialchars(addslashes($_GET['user_id']));
    $annonces = $art->lire($uid);
    
} else {
    $annonces = $art->lire();
    
}
$annonces = array_reverse($annonces);

?>
    
    <!doctype html>
    <title>Annonces</title>
    
    <main class="cartes">
        <?php
            foreach($annonces as $k => $v): 
        ?>
        <article class="carte">
            <img src="<?= $v['images_name']?>" alt="...">
            <div class="text">
                <h3>Annonce : <?php echo $v['titre']?></h3>
                <p><?php echo $v['contenu'] ?></p>
                <p><?php echo $art->getStructNameByAnnonceId($v['s_id']); ?></p>
                <button>Voir plus</button>
            </div>
        </article>
        
        <?php
            endforeach;?>
    </main>
<?php


    
    
    
    
    