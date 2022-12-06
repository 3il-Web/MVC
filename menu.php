

<head>
    <link rel="stylesheet" href="styleW.css?v=1.x.x" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<nav>
    <h2 class="titre">
        Pratique Musique 12
    </h2>               
    
       
    <div class="logo">
        <i class="fa fa-music music" aria-hidden="true"></i>           
    </div> 


    <div class="toggle">
        <i class="fas fa-bars ouvrir"></i>
        <i class="fas fa-times fermer"></i>
    </div>


    
    <ul class="menu">
            <li class="ongletMenu"><a href="<?=$routes_bp['index_page.php']?>">Accueil</a></li>
            <li class="ongletMenu"><a href="<?=$routes_bp['pageAnnonce.php']?>">Annonces</a></li>
            <li class="ongletMenu"><a href="<?=$routes_bp['eveil.php']?>">Eveil</a></li>
            <li class="ongletMenu"><a href="<?=$routes_bp['pratique.php']?>">Pratique</a></li>
            <li class="ongletMenu"><a href="<?=$routes_bp['enseignement.php']?>">Enseignement</a></li>
            <li class="ongletMenu"><a href="<?=$routes_bp['accompagnement.php']?>">Accompagnement</a></li>
            <li class="ongletMenu"><a href="<?=$routes_bp['diffusion.php']?>">Diffusion</a></li>

        <?php        
        if(isset($_SESSION['user']) && $_SESSION['user']['admin']) 
        { // Si x est connecté on lui affiche la deconnexion
        ?>
            <li><a href="<?=$routes_bp['deconnexion.php']?>"><button class="btn">Se déconnecter</button></a></li>
            <li><a href="<?=$routes_bp['espace-membre.php']?>"><button class="btn btn-secondary">Espace admin</button></a></li>
        <?php
        }

        elseif(isset($_SESSION['user']) && !$_SESSION['user']['admin'])
        { // Si x est connecté on lui affiche la deconnexion
        ?>

            <li><a href="<?=$routes_bp['deconnexion.php']?>"><button class="btn">Se déconnecter</button></a></li>
            <li><a href="<?=$routes_bp['espace-membre.php']?>"><button class="btn btn-secondary">Compte</button></a></li>
        <?php
        }
        else {
        ?> <!-- Si x est déconnecté on lui montre la connexion et l'inscription. -->
            

            <li><a href="<?=$routes_bp['inscription.php']?>"><button class="btn">Inscription</button></a></li>
            <li><a href="<?=$routes_bp['connexion.php']?>"><button class="btn btn-secondary">Connexion</button></a></li>
        <?php
        }
        ?>
    </ul>

</nav>

<script src="app.js"></script>