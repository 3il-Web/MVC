

<?php
session_start();
ob_start();

if(isset($_GET['page'])){
	$burl = "/pratique-musique-12/"; // before url ( pour dossier wampp )
	$page = $burl.$_GET['page']; // page recuperer depuis le htaccess
	if($page === $burl){
		$page = $burl."index";
	}

	$routes[$burl.'index'] = 'index_page.php';
	$routes[$burl.'annonces'] = 'pageAnnonce.php';
	$routes[$burl.'eveil-musical'] = 'eveil.php';
	$routes[$burl.'pratique-musicale'] = 'pratique.php';
	$routes[$burl.'accompagnement-musical'] = 'accompagnement.php';
	$routes[$burl.'enseignement-musical'] = 'enseignement.php';
	$routes[$burl.'diffusion-musicale'] = 'diffusion.php';
	$routes[$burl.'auth/login'] = 'connexion.php';
	$routes[$burl.'auth/register'] = 'inscription.php';
	$routes[$burl.'auth/logout'] = 'deconnexion.php';
	$routes[$burl.'user/account'] = 'espace-membre.php';
	$routes[$burl.'createAnnonce'] = 'createAnnonce.php';
	$routes[$burl.'admin/addUser'] = 'admin/addUser.php';
	$routes[$burl.'admin/delUser'] = 'admin/deleteUser.php';




	// Need login
	if(str_contains($page, 'user')){
		if(!isset($_SESSION['user'])){
			die('Vous devez être connecté');
		} else {
			$routes[$burl.'user/account'] = 'espace-membre.php';
		}
	}

	// Need admin log
	if(str_contains($page, 'admin')){
		if(!isset($_SESSION['user']['admin'])){
			die('Vous devez être admin');
		} else {
			$routes[$burl.'user/account'] = 'espace-membre.php';
		}
	}

	foreach($routes as $k => $v){
		$routes_bp[$v] = $k;
	}
	
	if(isset($routes[$page])){
		include($routes[$page]);
	} else {
		die('404');
	}


}


$content = ob_get_clean();
include('template.php');