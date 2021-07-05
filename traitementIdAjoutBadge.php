
<?php
	
	include 'fonctions.php';
	sessionExiste();
	include 'bd.php';

	$typeBadge = $_POST['radioBadge'];
	$idIdentite = $_POST['id'];
	$nom = $_POST['nomB'];
	$prenom = $_POST['prenomB'];
	
	
	if($_POST["valider"] == "Retour"){
		header("Location: accueil.php");
		exit(0);
	}
	
	if($typeBadge == "telecommande"){
		$typeId = "Id_Télécommande";
		$idBadge = $_POST['tele'];
	}elseif($typeBadge == "badge_noir"){
		$typeId = "Id_Badge_Noir";
		$idBadge = $_POST['noir'];
	}elseif($typeBadge == "badge_bleu"){
		$typeId = "Id_Badge_Bleu";
		$idBadge = $_POST['bleu'];
	}elseif($typeBadge == "cafe"){
		$typeId = "Id_Café";
		$idBadge = $_POST['bCafe'];
	}
	elseif($typeBadge == "indigo"){
		$typeId = "Id_Parking";
		$idBadge = $_POST['indigo'];
	}
	else{
		$typeId = "Id_Alarme";
		$idBadge = $_POST['alarme'];
	}
	
	$connexion = connexion();

	$queryAjoutBadge = mysqli_query($connexion,"UPDATE $typeBadge SET Id_Identité='$idIdentite' WHERE $typeId='$idBadge'");
	header("Location: badges.php?id=$idIdentite&nom=$nom&prenom=$prenom");
	mysqli_close($connexion);			
	

?>






