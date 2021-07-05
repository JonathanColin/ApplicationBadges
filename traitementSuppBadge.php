
<?php
	
	include 'fonctions.php';
	sessionExiste();
	include 'bd.php';

	$id = $_POST['id'];
	$nom = $_POST['nomB'];
	$prenom = $_POST['prenomB'];

	$connexion = connexion();

	if(isset($_POST['Télécommande'])){
		foreach($_POST['Télécommande'] as $tele){
			$query = mysqli_query($connexion,"UPDATE telecommande SET Id_Identité = NULL, Statut = 'RENDU' WHERE Id_Identité = '$id' AND Id_Télécommande = '$tele'");
		}
	}
	
	if(isset($_POST['badge_noir'])){
		foreach($_POST['badge_noir'] as $badgeN){
			$query = mysqli_query($connexion,"UPDATE badge_noir SET Id_Identité = NULL, Statut = 'RENDU' WHERE Id_Identité = '$id' AND Id_Badge_Noir = '$badgeN'");
		}
	}
	
	if(isset($_POST['badge_bleu'])){
		foreach($_POST['badge_bleu'] as $badgeB){
			$query = mysqli_query($connexion,"UPDATE badge_bleu SET Id_Identité = NULL, Statut = 'RENDU' WHERE Id_Identité = '$id' AND Id_Badge_Bleu = '$badgeB'");
		}
	}
	
	if(isset($_POST['cafe'])){
		foreach($_POST['cafe'] as $cafe){
			$query = mysqli_query($connexion,"UPDATE cafe SET Id_Identité = NULL, Statut = 'RENDU' WHERE Id_Identité = '$id' AND Id_Café = '$cafe'");
		}
	}
	
	if(isset($_POST['indigo'])){
		foreach($_POST['indigo'] as $indigo){
			$query = mysqli_query($connexion,"UPDATE indigo SET Id_Identité = NULL, Statut = 'RENDU' WHERE Id_Identité = '$id' AND Id_Parking = '$indigo'");
		}
	}
	
	if(isset($_POST['alarme'])){
		foreach($_POST['alarme'] as $alarme){
			$query = mysqli_query($connexion,"UPDATE alarme SET Id_Identité = NULL, Statut = 'RENDU' WHERE Id_Identité = '$id' AND Id_Alarme = '$alarme'");
		}
	}
	
	header("Location: badges.php?id=$id&nom=$nom&prenom=$prenom");
	mysqli_close($connexion);			
	

?>






