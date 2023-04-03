<?php
session_start();
ob_start();

if(isset($_SESSION["connecter"])){
	if(isset($_GET['page'])){
		$page = $_GET['page'] ;
	} 
	else { 
		$page = 'accueil';
	}

	switch($page) :

		case 'accueil' :
			$title = "Accueil du site" ;
			?> <style>
    			.accueil{background: #7160D6;}
				</style> <?php
			include 'pages/accueil.php' ;
		break;
	
		case 'search' :
			$title = "Resultat de recherche" ;
			include 'pages/search.php' ;
		break;

		case 'admin' :
			$title = "Page administration" ;
			?> <style>
    			.admin{background: #7160D6;}
				</style> <?php
			include 'pages/admin.php' ;
		break;

		case 'profil' :
			$title = "Profil" ;
			?> <style>
    			.profil{background: #7160D6;}
				</style> <?php
			include 'pages/profil.php' ;
		break;

		case 'profilAmis' :
			$title = "Profil" ;
			?> <style>
    			.profil{background: #7160D6;}
				</style> <?php
			include 'pages/profilAmis.php' ;
		break;

		case 'message' :
			$title = "Liste des Message" ;
			?> <style>
    			.message{background: #7160D6;}
				</style> <?php
			include 'pages/message.php' ;
		break;

		case 'parametre' :
			$title = "Parametres" ;
			?> <style>
    			.parametre{background: #7160D6;}
				</style> <?php
			include 'pages/parametre.php' ;
		break;

		case 'listeUtilisateur' :
			$title = "Liste des Utilisateurs" ;
			?> <style>
    			.amis{background: #7160D6;}
				</style> <?php
			include 'pages/listeUtilisateurs.php' ;
		break;

		case 'utilisateur' :
			$title = "profil autre" ;
			?> <style>
    			.amis{background: #7160D6;}
				</style> <?php
			include 'pages/utilisateur.php' ;
		break;

		case 'listeJeux' :
			$title = "Liste des Jeux" ;
			?> <style>
    			.jeux{background: #7160D6;}
				</style> <?php
			include 'pages/listeJeux.php' ;
		break;

		case 'jeu' :
			$title = "Page de jeu" ;
			?> <style>
    			.jeux{background: #7160D6;}
				</style> <?php
			include 'pages/jeu.php' ;
		break;

		case 'listeSalons' :
			$title = "Liste des Salons" ;
			?> <style>
    			.salons{background: #7160D6;}
				</style> <?php
			include 'pages/listeSalons.php' ;
		break;

		case 'salon' :
			$title = "Page de salon" ;
			?> <style>
    			.salons{background: #7160D6;}
				</style> <?php
			include 'pages/salon.php' ;
		break;

		case 'deconnexion' :
			$title = 'deconnexion';
			include 'pages/deconnexion.php';
		break;

		case 'delete' :
			$title = 'Suppression de compte';
			include 'pages/delete.php';
		break;

		default :
			$title = "erreur page inexistante" ;
			include 'pages/404.php' ; 
		break;

	endswitch;

	$contenu = ob_get_clean() ;

	include 'template/template.php' ;
}
else {
	if(isset($_GET['page'])){
		$page = $_GET['page'] ;
	} 
	else { 
		$page = 'connexion';
	}

	switch($page) :

		case 'connexion' :
			$title = 'page de connexion';
			include 'pages/connexion.php';
		break;

		case 'inscription' :
			$title = 'page d\'inscription';
			include 'pages/inscription.php';
		break;

		default :
			$title = 'page de connexion';
			include 'pages/connexion.php';
		break;

	endswitch;
}
?>