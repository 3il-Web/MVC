<?php
    /*************************
    * Page: deconnexion.php
    * Page encodée en UTF-8
    **************************/
session_destroy();//unset() détruit une variable, si vous enregistrez aussi l'id du membre (par exemple) vous pouvez comme avec isset(), mettre plusieurs variables séparés par une virgule:
header("Refresh: 2; url=".$burl);//redirection vers le formulaire de connexion dans 5 secondes
echo "Vous avez été correctement déconnecté du site.<br><br><i>Redirection en cours, vers la page d'accueil...</i>";
?>